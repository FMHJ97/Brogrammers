<?php include("includes/a_config.php");

// Importamos las clases necesarias.
require_once '../framework-php-bootstrap/controller/valoracionController.php';
require_once '../framework-php-bootstrap/model/valoracion.php';
require_once '../framework-php-bootstrap/controller/productoController.php';
require_once '../framework-php-bootstrap/model/producto.php';
require_once '../framework-php-bootstrap/controller/usuarioController.php';
require_once '../framework-php-bootstrap/model/usuario.php';

// Variables para mostrar mensajes de alerta.
$alertMessage = "";
$alertType = "";

// Si se pulsa el botón de editar reseña.
if (isset($_POST['edit'])) {
    // Obtenemos el ID de la valoración a editar.
    $id = $_POST['edit'];
    // Obtenemos la valoración a editar.
    $edit_valoracion = ValoracionController::findById($id);
}

// Si hemos pulsado el botón de eliminar una reseña, la eliminamos de la BD.
if (isset($_POST['delete'])) {
    // Obtenemos los datos necesarios para eliminar la valoración.
    $id = $_POST['delete'];

    // Obtenemos el ID del producto asociado a la valoración.
    $id_producto = ValoracionController::findById($id)->id_producto;

    // Borramos la valoración de la BD.
    if (ValoracionController::delete($id)) {
        // Mostramos un mensaje de alerta.
        $alertMessage = "Valoración eliminada correctamente.";
        $alertType = "success";
    } else {
        // Mostramos un mensaje de alerta.
        $alertMessage = "Error al eliminar la valoración.";
        $alertType = "danger";
    }

    // Recargamos la página para mostrar la valoración eliminada.
    header("Location: merch_item.php?alertMessage=" . urlencode($alertMessage) . "&alertType=" . urlencode($alertType));
    exit();
}

// Si hemos escrito una reseña, la guardamos en la BD.
if (isset($_POST['send'])) {
    // Obtenemos los datos necesarios para el formulario.
    $id_producto = $_POST['product-id']; // ID del producto.
    $id_usuario = $_SESSION['logged']->id; // ID del usuario logueado.
    $fecha = date("Y-m-d H:i:s");
    $puntuacion = $_POST['value_stars'];
    $titulo = $_POST['review-title'];
    $comentario = $_POST['value_review'];

    // Si la puntuación no es válida, mostramos un mensaje de alerta.
    if ($puntuacion < 1 || $puntuacion > 5) {
        $alertMessage = "La puntuación debe estar entre 1 y 5.";
        $alertType = "danger";
        header("Location: merch_item.php?alertMessage=" . urlencode($alertMessage) . "&alertType=" . urlencode($alertType));
        exit();
    }

    // Si el título está vacío, mostramos un mensaje de alerta.
    if (empty($titulo)) {
        $alertMessage = "El título de la reseña no puede estar vacío.";
        $alertType = "danger";
        header("Location: merch_item.php?alertMessage=" . urlencode($alertMessage) . "&alertType=" . urlencode($alertType));
        exit();
    }

    // Comprobamos si estamos editando una reseña.
    if (isset($_POST['edit-id'])) {
        $id_valoracion = $_POST['edit-id'];
        // Obtenemos la valoración existente.
        $valoracion = ValoracionController::findById($id_valoracion);
        // Actualizamos los datos de la valoración.
        $valoracion->valoracion = $puntuacion;
        $valoracion->titulo = $titulo;
        $valoracion->comentario = $comentario;
        // $valoracion->fecha = $fecha;
        // Guardamos los cambios en la BD.
        if (ValoracionController::update($valoracion)) {
            // Mostramos un mensaje de alerta.
            $alertMessage = "Valoración actualizada correctamente.";
            $alertType = "success";
        } else {
            // Mostramos un mensaje de alerta.
            $alertMessage = "Error al actualizar la valoración.";
            $alertType = "danger";
        }
    } else {
        // Creamos una nueva valoración.
        $valoracion = new Valoracion(null, $id_producto, $id_usuario, $fecha, $puntuacion, $titulo, $comentario);
        // Guardamos la valoración en la BD.
        if (ValoracionController::insert($valoracion)) {
            // Mostramos un mensaje de alerta.
            $alertMessage = "Valoración enviada correctamente.";
            $alertType = "success";
        } else {
            // Mostramos un mensaje de alerta.
            $alertMessage = "Error al enviar la valoración.";
            $alertType = "danger";
        }
    }

    // Recargamos la página para mostrar la nueva valoración.
    header("Location: merch_item.php?alertMessage=" . urlencode($alertMessage) . "&alertType=" . urlencode($alertType));
    exit();
}

// Obtenemos el id del producto seleccionado.
if (isset($_POST['id'])) {
    // Si existe, lo guardamos en la variable de sesión.
    $_SESSION['id_producto_actual'] = $_POST['id'];
    $id = $_POST['id'];
} else if (isset($_SESSION['id_producto_actual'])) {
    // Si no existe, lo obtenemos de la variable de sesión.
    $id = $_SESSION['id_producto_actual'];
} else {
    // Si no existe, redirigimos a la página de merch.
    header("Location: merch.php");
    exit();
}

// Obtenemos el producto seleccionado.
$producto = ProductoController::find($id);

// Si no se ha encontrado el producto, redirigimos a la página de merch.
if (!$producto) {
    header("Location: merch.php");
}

// Obtenemos todos los productos disponibles de la BD.
$productos = ProductoController::findAll();

// Si hay productos en la BD, mostramos hasta 3 productos recomendados.
if ($productos) {
    // Filtramos los productos para excluir el producto actual.
    $productosRecomendados = array_filter($productos, fn($p) => $p->id !== $producto->id);

    // Barajamos los productos recomendados.
    shuffle($productosRecomendados);

    // Tomamos hasta 3 productos recomendados.
    $productosRecomendados = array_slice($productosRecomendados, 0, min(3, count($productosRecomendados)));
} else {
    $productosRecomendados = null;
}

// Obtenemos todas las valoraciones del producto.
$reviews = ValoracionController::findByProducto($id);
// Si hay valoraciones, las ordenamos por fecha descendente.
if ($reviews) {
    usort($reviews, fn($a, $b) => strtotime($b->fecha) - strtotime($a->fecha));
}

// Obtenemos la puntación media del producto.
$valoracionMedia = ValoracionController::getPuntuacionMedia($id);

// Si hay un mensaje de alerta, lo mostramos.
if (isset($_GET['alertMessage']) && isset($_GET['alertType'])) {
    $alertMessage = urldecode($_GET['alertMessage']);
    $alertType = urldecode($_GET['alertType']);
}

?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>
    <script src="./js/scripts.js"></script>
    <script src="./js/gestion.js"></script>
</head>

<body>
    <!-- Componente NavBar -->
    <?php include("includes/navbar.php"); ?>

    <!-- Alerta -->
    <?php if (!empty($alertMessage)): ?>
        <div class="alert alert-<?php echo $alertType; ?> alert-dismissible fade show custom-alert-gestion" role="alert">
            <?php if ($alertType == "success"): ?>
                <!-- Ícono de éxito -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
            <?php else: ?>
                <!-- Ícono de error -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                </svg>
            <?php endif; ?>
            <strong><?php echo $alertMessage; ?></strong>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <main>
        <!-- Sección de Producto -->
        <section class="container px-3 my-4 page-section mt-md-5 px-md-5">
            <!-- Nombre y Precio (Oculto en dispositivos superiores a md) -->
            <div class="mb-5 row d-block d-md-none">
                <div class="col item-heading">
                    <h1><?php echo $producto->nombre; ?></h1>
                    <h2>€<?php echo $producto->precio; ?> EUR</h2>
                    <div class="average-rating">
                        <?php
                        // Si hay una valoración media, la mostramos.
                        if ($valoracionMedia) {
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= floor($valoracionMedia)) {
                                    echo '<i class="bi bi-star-fill active"></i>';
                                } elseif ($i - $valoracionMedia < 1) {
                                    echo '<i class="bi bi-star-half active"></i>';
                                } else {
                                    echo '<i class="bi bi-star"></i>';
                                }
                            }
                        } else {
                            // Si no hay valoraciones, mostramos estrellas vacías.
                            for ($i = 1; $i <= 5; $i++) {
                                echo '<i class="bi bi-star"></i>';
                            }
                        }
                        // Enlace que muestra el número de reseñas.
                        echo '<a href="#reviews-container" id="reviews-link">';
                        if ($reviews) {
                            echo "(" . count($reviews) . ")";
                        } else {
                            echo "(0)";
                        }
                        echo '</a>';
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Imágenes del Producto -->
                <div class="col item-image-section">
                    <!-- Imagen Principal -->
                    <div class="row">
                        <div class="col main-image">
                            <img src="./<?php echo $producto->imagen; ?>" alt="<?php echo $producto->nombre; ?>"
                                class="img-fluid">
                        </div>
                    </div>
                    <!-- Imágenes Adicionales -->
                    <div class="row">
                        <div class="col">
                            <div class="row additional-images">
                                <?php
                                // Array con 4 clases para los colores de las imágenes.
                                $coloresHue = array("hue-rotate-0", "hue-rotate-90", "hue-rotate-180", "hue-rotate-270");
                                // Mostramos 4 imágenes adicionales del producto.
                                for ($i = 0; $i < 4; $i++) {
                                ?>
                                    <div class="col-3">
                                        <img src="./<?php echo $producto->imagen; ?>"
                                            alt="<?php echo $producto->nombre; ?>" class="img-fluid
                                            <?php echo $coloresHue[$i]; ?>" tabindex="0" role="button">
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Detalles del Producto -->
                <div class="col merch-item-details">
                    <!-- Nombre y Precio (Oculto en dispositivos móviles) -->
                    <div class="row d-none d-md-block">
                        <div class="col item-heading">
                            <h1><?php echo $producto->nombre; ?></h1>
                            <h2>€<?php echo $producto->precio; ?> EUR</h2>
                            <div class="average-rating">
                                <?php
                                // Si hay una valoración media, la mostramos.
                                if ($valoracionMedia) {
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= floor($valoracionMedia)) {
                                            echo '<i class="bi bi-star-fill active"></i>';
                                        } elseif ($i - $valoracionMedia < 1) {
                                            echo '<i class="bi bi-star-half active"></i>';
                                        } else {
                                            echo '<i class="bi bi-star"></i>';
                                        }
                                    }
                                } else {
                                    // Si no hay valoraciones, mostramos estrellas vacías.
                                    for ($i = 1; $i <= 5; $i++) {
                                        echo '<i class="bi bi-star"></i>';
                                    }
                                }
                                // Enlace que muestra el número de reseñas.
                                echo '<a href="#reviews-container" id="reviews-link">';
                                if ($reviews) {
                                    echo "(" . count($reviews) . ")";
                                } else {
                                    echo "(0)";
                                }
                                echo '</a>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    // Si el producto tiene categoria == ropa, mostramos
                    // el apartado de tallas.
                    if ($producto->categoria == "ropa") {
                    ?>
                        <!-- Apartado Tallas (según producto) -->
                        <div class="row">
                            <p>Talla</p>
                            <div class="col btn-size-group">
                                <button type="button" aria-label="Botón para seleccionar talla S" class="btn btn-item-size selected">S</button>
                                <button type="button" aria-label="Botón para seleccionar talla M" class="btn btn-item-size">M</button>
                                <button type="button" aria-label="Botón para seleccionar talla L" class="btn btn-item-size">L</button>
                                <button type="button" aria-label="Botón para seleccionar talla XL" class="btn btn-item-size">XL</button>
                                <button type="button" aria-label="Botón para seleccionar talla 2XL" class="btn btn-item-size">2XL</button>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <!-- Cantidad de Producto -->
                    <div class="row">
                        <p>Cantidad</p>
                        <div class="col item-quantity">
                            <button type="button" id="restar" aria-label="Botón de reducir cantidad del producto" class="btn btn-quantity">-</button>
                            <span id="quantity">1</span>
                            <button type="button" id="sumar" aria-label="Botón de aumentar cantidad del producto" class="btn btn-quantity">+</button>
                        </div>
                    </div>
                    <!-- Botón Añadir al Carrito -->
                    <div class="row">
                        <div class="py-3 col btn-cart">
                            <form action="cart.php" method="POST" novalidate>
                                <button type="submit" aria-label="Botón de añadir al carrito" class="btn-focus btn-cart">Añadir al Carrito</button>
                            </form>
                        </div>
                    </div>
                    <!-- Descripción del Producto -->
                    <div class="row">
                        <div class="col item-description">
                            <h3>Descripción</h3>
                            <?php
                            // Mostramos la descripción del producto.
                            echo htmlspecialchars_decode($producto->descripcion);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sección de Comentarios -->
        <section class="container px-3 page-section px-md-5">
            <!-- Encabezado -->
            <div class="row">
                <div class="pb-2 col">
                    <h2>Opiniones de los clientes</h2>
                </div>
            </div>
            <!-- Herramienta de ordenación -->
            <?php
            // Solo se mostrará si existen valoraciones.
            if ($reviews != null) {
            ?>
                <div class="row">
                    <div class="pb-4 col">
                        <div class="dropdown dropdown-order-by-2">
                            <!-- Icono de Ordenación -->
                            <i class="bi bi-filter"></i>
                            <!-- Botón de Ordenación -->
                            <button id="reviewOrderBy-btn" type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                                Ordenar por: Más recientes
                            </button>
                            <!-- Opciones de Ordenación -->
                            <ul class="dropdown-menu" aria-labelledby="reviewOrderBy-btn">
                                <li><button id="date-desc" class="dropdown-item">Más recientes</button></li>
                                <li><button id="date-asc" class="dropdown-item">Más antiguas</button></li>
                                <li><button id="star-desc" class="dropdown-item">Mayor puntuación</button></li>
                                <li><button id="star-asc" class="dropdown-item">Menor puntuación</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <!-- Opiniones de los Clientes -->
            <div class="row d-flex flex-column flex-md-row">
                <!-- Principales Comentarios -->
                <div class="col d-flex flex-column" id="reviews-container">
                    <?php
                    // Si no hay valoraciones, mostramos un mensaje.
                    if ($reviews == null) {
                    ?>
                        <div id="no-reviews" class="mt-4">
                            <p>No hay reseñas disponibles en este momento.</p>
                            <p>¡Sé el primero en dejar una reseña!</p>
                        </div>
                    <?php
                    } else {
                        // Mostramos las valoraciones.
                    ?>
                        <div class="px-4 row d-flex flex-column">
                            <?php
                            foreach ($reviews as $r) {
                            ?>
                                <div class="mb-3 col review-item"
                                    data-rating="<?php echo $r->valoracion; ?>" data-date="<?php echo $r->fecha; ?>"
                                    data-review="<?php echo $r->id; ?>" tabindex="0">
                                    <!-- Nombre del Usuario -->
                                    <div class="mb-1 d-flex align-items-center review-user">
                                        <?php
                                        // Obtenemos el nombre del usuario que ha realizado la valoración.
                                        $usuario = UserController::getById($r->id_usuario);
                                        ?>
                                        <i class="pe-3 bi bi-person-circle"></i>
                                        <p class="mb-0">
                                            <?php
                                            echo $usuario->nombre . " " . $usuario->apellido1 . " " . $usuario->apellido2;
                                            ?>
                                        </p>
                                    </div>
                                    <!-- Valoración -->
                                    <div class="rating-review d-flex flex-md-row flex-column">
                                        <?php
                                        // Mostramos las estrellas según la valoración.
                                        echo "<div>";
                                        for ($i = 1; $i <= 5; $i++) {
                                        ?>
                                            <i class="bi bi-star-fill <?php echo $i <= $r->valoracion ? "active" : ""; ?>"></i>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <!-- Título -->
                                    <strong><?php echo $r->titulo; ?></strong>
                                </div>
                                <!-- Fecha -->
                                <p class="mt-1 review-date">
                                    <?php
                                    setlocale(LC_TIME, 'es_ES.UTF-8', 'es_ES', 'Spanish_Spain', 'es');
                                    echo "Publicado el " . date("j", strtotime($r->fecha)) . " de " . strftime("%B", strtotime($r->fecha)) . " de " . date("Y", strtotime($r->fecha));
                                    ?>
                                </p>
                                <!-- Comentario -->
                                <p>
                                    <?php
                                    // Mostramos el comentario teniendo en cuenta que es texto HTML y contiene caracteres especiales.
                                    echo htmlspecialchars_decode($r->comentario);
                                    ?>
                                </p>
                                <?php
                                // Si existe un usuario logueado.
                                if (isset($_SESSION['logged'])) {
                                    // Si el usuario logueado tiene rol "admin" o "editor",
                                    // mostramos el botón para eliminar la valoración.
                                    if ($_SESSION['logged']->rol == "admin" || $_SESSION['logged']->rol == "editor") {
                                ?>
                                        <form action="" method="POST" class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-delete-review" name="delete"
                                                value="<?php echo $r->id; ?>">Eliminar</button>
                                        </form>
                                    <?php
                                    }
                                    // Si el usuario logueado tiene rol "usuario",
                                    // mostramos el botón para eliminar su propia valoración.
                                    // También se mostrará el botón de edición.
                                    else if ($_SESSION['logged']->id == $r->id_usuario) {
                                    ?>
                                        <div class="gap-3 d-flex justify-content-end">
                                            <!-- Botón para Editar la Valoración -->
                                            <form action="" method="POST">
                                                <button type="submit" class="btn btn-edit-review" name="edit"
                                                    value="<?php echo $r->id; ?>">Editar</button>
                                            </form>
                                            <!-- Botón para Eliminar la Valoración -->
                                            <form action="" method="POST">
                                                <button type="submit" class="btn btn-delete-review" name="delete"
                                                    value="<?php echo $r->id; ?>">Eliminar</button>
                                            </form>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                        </div>
                    <?php
                            }
                    ?>
                </div>
            <?php
                    }
            ?>
            </div>
            <?php
            // Se mostrará solo a los usuarios con rol "usuario".
            if (isset($_SESSION['logged']) && $_SESSION['logged']->rol == "usuario") {
            ?>
                <!-- Botón para Mostrar Formulario de Comentarios -->
                <div class="mt-5 mb-3 col col-md-4 mt-md-0" id="show-review">
                    <p>Valorar este producto</p>
                    <p>Comparte tu opinión con otros usuarios</p>
                    <button type="button" class="px-4 btn">Dejar reseña</button>
                </div>
                <!-- Formulario de Comentarios -->
                <div class="mt-4 mt-md-0 col col-md-5 d-none ms-md-3" id="form-review">
                    <!-- Formulario -->
                    <form action="" method="POST" class="px-3 pb-2 px-md-4 form-comments">
                        <h3>Deja tu reseña</h3>
                        <div class="px-2 mt-4 mb-3 px-md-4">
                            <label for="stars">¿En qué estado estaba el producto?</label>
                            <!-- Contenedor de estrellas -->
                            <div id="stars" class="rating-stars" data-rating="<?php echo isset($edit_valoracion) ? $edit_valoracion->valoracion : 1; ?>">
                                <i class="bi bi-star-fill" data-value="1" role="button" tabindex="0"></i>
                                <i class="bi bi-star-fill" data-value="2" role="button" tabindex="0"></i>
                                <i class="bi bi-star-fill" data-value="3" role="button" tabindex="0"></i>
                                <i class="bi bi-star-fill" data-value="4" role="button" tabindex="0"></i>
                                <i class="bi bi-star-fill" data-value="5" role="button" tabindex="0"></i>
                            </div>
                        </div>
                        <!-- Título Input-->
                        <div class="px-2 px-md-4">
                            <label for="review-title">Título de la reseña (Obligatorio)</label>
                            <input type="text" class="form-control" id="review-title"
                                placeholder="Introduzca un título para la reseña" name="review-title"
                                value="<?php echo isset($edit_valoracion) ? $edit_valoracion->titulo : ""; ?>">
                        </div>
                        <!-- Editor de Texto -->
                        <div class="px-2 mb-4 px-md-4">
                            <label for="eq-editor">Escribe una reseña (Opcional)</label>
                            <div id="eq-editor"></div>
                        </div>
                        <div class="gap-3 px-5 my-3 d-flex flex-column justify-content-center">
                            <button type="submit" class="px-5 btn" name="send"
                                id="btn-send-review">Enviar reseña</button>
                            <button type="submit" class="px-5 btn" name="cancel"
                                id="btn-cancel-review">Cancelar</button>
                        </div>
                        <!-- Campos Ocultos -->
                        <input type="hidden" id="stars-input" name="value_stars">
                        <input type="hidden" id="review-input" name="value_review">
                        <input type="hidden" id="product-id" name="product-id" value="<?php echo $producto->id; ?>">
                        <?php
                        // Si estamos editando una reseña, añadir un campo oculto con el id de la reseña.
                        if (isset($edit_valoracion)) {
                        ?>
                            <input type="hidden" name="edit-id" value="<?php echo $edit_valoracion->id; ?>">
                        <?php
                        }
                        ?>
                    </form>
                </div>
            <?php
            }
            ?>
            </div>
        </section>
        <!-- Sección Productos Recomendados -->
        <section class="container px-3 page-section px-md-5">
            <!-- Encabezado -->
            <div class="row">
                <div class="pb-4 col suggested-items-heading">
                    <h2>También te pueden interesar</h2>
                </div>
            </div>
            <!-- Productos Sugeridos -->
            <div class="row merch-products">
                <?php
                if ($productosRecomendados != null) {
                    // Si hay productos en la BD, los mostramos.
                    foreach ($productosRecomendados as $p) {
                ?>
                        <form action="./merch_item.php" method="POST" class="col-12 col-md-4 card card-merch-item all-items <?php echo $p->categoria; ?>" data-precio="<?php echo $p->precio; ?>" data-nombre="<?php echo $p->nombre; ?>" onclick="this.submit()" onkeypress="this.submit()" role="button" tabindex="0">
                            <input type="hidden" name="id" value="<?php echo $p->id; ?>">
                            <img class="card-img-top" src="./<?php echo $p->imagen; ?>" alt="<?php echo $p->nombre; ?>">
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $p->nombre; ?></h3>
                                <span>€<?php echo $p->precio; ?> EUR</span>
                            </div>
                        </form>
                <?php
                    }
                } else {
                    // Si no hay productos en la BD, mostramos un mensaje de error.
                    echo "<h3>No hay productos disponibles en este momento.</h3>";
                }
                ?>
            </div>
        </section>
    </main>

    <!-- Componente Footer -->
    <?php include("includes/footer.php"); ?>

    <script>
        var quill = new Quill('#eq-editor', {
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline'],
                    [{
                        list: 'ordered'
                    }, {
                        list: 'bullet'
                    }],
                    ['clean']
                ]
            },
            theme: 'snow',
            placeholder: 'Escriba aquí su opinión...',
        });

        function getCleanQuillContent() {
            let quillContent = quill.root.innerHTML.trim(); // Obtiene el HTML limpio
            let plainText = quill.getText().trim(); // Obtiene solo el texto sin etiquetas

            // Si el comentario es completamente vacío, lo deja así.
            if (plainText === "") {
                return "";
            }

            // Eliminar saltos de línea excesivos (más de 2 seguidos)
            quillContent = quillContent.replace(/(<br\s*\/?>\s*){3,}/g, "<br><br>");

            // Eliminar <p><br></p> al inicio y final (espacios vacíos innecesarios)
            quillContent = quillContent.replace(/^(<p><br><\/p>\s*)+|(\s*<p><br><\/p>)+$/g, "");

            // Convertir listas desordenadas correctamente
            quillContent = quillContent.replace(/<ol>\s*(<li data-list="bullet">[\s\S]*?<\/li>)\s*<\/ol>/g, "<ul>$1</ul>");

            return quillContent;
        }

        // Evento para enviar el contenido limpio del editor de texto y la valoración
        document.getElementById("form-review").addEventListener("submit", function() {
            document.querySelector("#review-input").value = getCleanQuillContent();
            document.querySelector("#stars-input").value = document.querySelector("#stars").getAttribute("data-rating");
        });

        <?php
        // Si hemos pulsado sobre el botón de editar reseña.
        if (isset($edit_valoracion)) {
        ?>
            var contenidoDesdeBD = `<?php echo addslashes($edit_valoracion->comentario); ?>`;

            if (typeof contenidoDesdeBD !== "undefined" && contenidoDesdeBD.trim() !== "") {
                // Insertamos el contenido HTML en el editor Quill manteniendo el formato
                quill.clipboard.dangerouslyPasteHTML(contenidoDesdeBD);
            }

            // Ocultamos el div show-review y mostramos el div form-review.
            document.getElementById("show-review").classList.add("d-none");
            document.getElementById("form-review").classList.remove("d-none");

            // Cambiamos el heading del formulario.
            document.querySelector("#form-review h3").textContent = "Editar tu reseña";
            // Cambiamos el texto del botón de envío.
            document.querySelector("#btn-send-review").textContent = "Guardar cambios";

            // Tras cargar la páginas, se desplaza hasta el formulario de comentarios.
            document.getElementById("form-review").scrollIntoView({
                behavior: "instant",
                block: "start"
            });
        <?php
        }
        ?>
    </script>


</body>

</html>