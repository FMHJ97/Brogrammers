<?php include("includes/a_config.php");

// Importamos las clases necesarias.
require_once '../framework-php-bootstrap/controller/productoController.php';
require_once '../framework-php-bootstrap/model/producto.php';

// Obtenemos el producto seleccionado.
$producto = ProductoController::find($_GET['id']);

// Si no se ha encontrado el producto, redirigimos a la página de merch.
if (!$producto) {
    header("Location: merch.php");
}

// Obtenemos todos los productos disponibles de la BD.
$productos = ProductoController::findAll();

if ($productos) {
    // Obtenemos 3 productos aleatorios para mostrar como recomendados.
    // Dichos productos no pueden estar duplicados ni ser el producto actual.
    $productosRecomendados = array();
    // Recorremos todos los productos disponibles.
    while (count($productosRecomendados) < 3) {
        $randomProduct = $productos[array_rand($productos)];
        // Si el producto aleatorio no está ya en el array de recomendados y
        // no es el producto actual, lo añadimos.
        if (!in_array($randomProduct, $productosRecomendados) && $randomProduct->id != $producto->id) {
            $productosRecomendados[] = $randomProduct;
        }
    }
} else {
    $productosRecomendados = null;
}

?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>
    <script src="./js/scripts.js"></script>
</head>

<body>
    <!-- Componente NavBar -->
    <?php include("includes/navbar.php"); ?>

    <main>
        <!-- Sección de Producto -->
        <section class="container px-3 my-4 page-section mt-md-5 px-md-5">
            <!-- Nombre y Precio (Oculto en dispositivos superiores a md) -->
            <div class="mb-5 row d-block d-md-none">
                <div class="col item-heading">
                    <h1><?php echo $producto->nombre; ?></h1>
                    <h2>€<?php echo $producto->precio; ?> EUR</h2>
                </div>
            </div>
            <div class="row">
                <!-- Imágenes del Producto -->
                <div class="col item-image-section">
                    <!-- Imagen Principal -->
                    <div class="row">
                        <div class="col main-image">
                            <img src="./assets/img/merch/<?php echo $producto->imagen; ?>" alt="<?php echo $producto->nombre; ?>"
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
                                        <img src="./assets/img/merch/<?php echo $producto->imagen; ?>"
                                            alt="<?php echo $producto->nombre; ?>" class="img-fluid
                                            <?php echo $coloresHue[$i]; ?>">
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
                                <button type="button" class="btn btn-item-size selected">S</button>
                                <button type="button" class="btn btn-item-size">M</button>
                                <button type="button" class="btn btn-item-size">L</button>
                                <button type="button" class="btn btn-item-size">XL</button>
                                <button type="button" class="btn btn-item-size">2XL</button>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <!-- Cantidad de Producto -->
                    <div class="row">
                        <p>Cantidad</p>
                        <div class="col item-quantity">
                            <button type="button" id="restar" class="btn btn-quantity">-</button>
                            <span id="quantity">1</span>
                            <button type="button" id="sumar" class="btn btn-quantity">+</button>
                        </div>
                    </div>
                    <!-- Botón Añadir al Carrito -->
                    <div class="row">
                        <div class="py-3 col btn-cart">
                            <form action="cart.php" method="POST" novalidate>
                                <button type="submit" class="btn btn-cart">Añadir al Carrito</button>
                            </form>
                        </div>
                    </div>
                    <!-- Descripción del Producto -->
                    <div class="row">
                        <div class="col item-description">
                            <h3>Descripción</h3>
                            <?php echo $producto->descripcion; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Sección de Comentarios -->
        <section class="container px-3 page-section px-md-5">
            <!-- Encabezado -->
            <div class="row">
                <div class="pb-4 col">
                    <h2>Valoraciones de los clientes</h2>
                </div>
            </div>
            <!-- Comentarios -->
            <div class="row">
                <!-- Principales Comentarios -->
                <div class="col-6">

                </div>
                <?php
                // Se mostrará solo a los usuarios con rol "usuario".
                if (isset($_SESSION['logged']) && $_SESSION['logged']->rol == "usuario") {
                ?>
                    <!-- Formulario de Comentarios -->
                    <div class="col-6 form-comments">
                        <h3>Deja tu valoración</h3>
                        <!-- Formulario -->
                        <form action="" method="POST" class="mx-3">
                            <div class="mt-3 mb-3">
                                <label for="stars">¿En qué estado estaba el producto?</label>
                                <!-- Contenedor de estrellas -->
                                <div id="stars" class="rating-stars" data-rating="1">
                                    <i class="bi bi-star-fill" data-value="1"></i>
                                    <i class="bi bi-star-fill" data-value="2"></i>
                                    <i class="bi bi-star-fill" data-value="3"></i>
                                    <i class="bi bi-star-fill" data-value="4"></i>
                                    <i class="bi bi-star-fill" data-value="5"></i>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="eq-editor">Escribe una reseña</label>
                                <div id="eq-editor"></div>
                            </div>
                            <button type="submit" class="mb-3 btn btn-success" name="send">Enviar</button>
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
                        <a href="./merch_item.php?id=<?php echo $p->id; ?>" class="col-12 col-md-4 card card-merch-item all-items <?php echo $p->categoria; ?>"
                            data-precio="<?php echo $p->precio; ?>" data-nombre="<?php echo $p->nombre; ?>">
                            <img class="card-img-top" src="./assets/img/merch/<?php echo $p->imagen; ?>"
                                alt="<?php echo $p->nombre; ?>">
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $p->nombre; ?></h3>
                                <span>€<?php echo $p->precio; ?> EUR</span>
                            </div>
                        </a>
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

</body>

</html>