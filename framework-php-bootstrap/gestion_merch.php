<?php include("includes/a_config.php");

require_once '../framework-php-bootstrap/controller/productoController.php';
require_once '../framework-php-bootstrap/model/producto.php';

// Obtenemos todos los productos disponibles de la BD.
$productos = ProductoController::findAll();

// Variables para mostrar mensajes de alerta.
$alertMessage = "";
$alertType = "";

// Si pulsamos el botón de borrar producto.
if (isset($_POST['delete'])) {
    // Obtenemos el id del producto a borrar.
    $id = $_POST['delete'];
    // Borramos el producto de la BD.
    if (ProductoController::delete($id)) {
        $alertMessage = "Producto eliminado correctamente.";
        $alertType = "success";
    } else {
        $alertMessage = "Error al eliminar el producto.";
        $alertType = "danger";
    }
    // Recargamos la página enviando el mensaje de alerta.
    header("Location: gestion_merch.php?alertMessage=" . urlencode($alertMessage) . "&alertType=" . urlencode($alertType));
    exit();
}

// Si pulsamos el botón de guardar producto.
if (isset($_POST['save'])) {

    // Obtenemos los datos del formulario.
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    $imagen = null;

    // Si el nombre está vacío o contiene espacios en blanco, mostramos un mensaje de error.
    if (empty($nombre) || trim($nombre) == "") {
        $alertMessage = "El nombre no puede estar vacío ni contener espacios en blanco.";
        $alertType = "danger";
        header("Location: gestion_merch.php?alertMessage=" . urlencode($alertMessage) . "&alertType=" . urlencode($alertType));
        exit();
    }

    // Si el precio no es un número o es menor que 0, mostramos un mensaje de error.
    if (!is_numeric($precio) || $precio < 0) {
        $alertMessage = "El precio debe ser un número mayor o igual a 0.";
        $alertType = "danger";
        header("Location: gestion_merch.php?alertMessage=" . urlencode($alertMessage) . "&alertType=" . urlencode($alertType));
        exit();
    }

    // Si la descripción está vacía, mostramos un mensaje de error.
    if (empty($descripcion)) {
        $alertMessage = "La descripción no puede estar vacía.";
        $alertType = "danger";
        header("Location: gestion_merch.php?alertMessage=" . urlencode($alertMessage) . "&alertType=" . urlencode($alertType));
        exit();
    }

    // Verificamos si estamos editando un producto.
    if (isset($_POST['id_product'])) {
        // Obtenemos el id del producto a editar.
        $id = $_POST['id_product'];
        // Obtenemos el producto actual de la base de datos.
        $producto_edit = ProductoController::find($id);
        // Asignamos la imagen actual del producto.
        $imagen = $producto_edit->imagen;
    }

    // Si el fichero se ha subido correctamente al servidor y es una imagen válida.
    if (
        !empty($_FILES['imagen']['name']) && is_uploaded_file($_FILES['imagen']['tmp_name'])
        && in_array($_FILES['imagen']['type'], ["image/jpeg", "image/png", "image/jpg"])
    ) {

        // Generamos un nombre único para la imagen.
        $fichero = time() . "_" . $_FILES['imagen']['name'];
        // En la BD guardamos la ruta completa del fichero.
        $ruta = "assets/img/merch/" . $fichero;
        // Movemos el fichero subido a la ubicación deseada.
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
        // Asignamos la nueva ruta de la imagen.
        $imagen = $ruta;
    }

    // Si no se ha subido una imagen, mostramos un mensaje de error.
    if (empty($imagen) && !isset($producto_edit)) {
        $alertMessage = "Debe subir una imagen para el producto.";
        $alertType = "danger";
        header("Location: gestion_merch.php?alertMessage=" . urlencode($alertMessage) . "&alertType=" . urlencode($alertType));
        exit();
    }

    // Si estamos editando un producto, obtenemos su id, de lo contrario, es null.
    $id = isset($_POST['id_product']) ? $_POST['id_product'] : null;

    // Creamos un objeto Producto con los datos del formulario.
    $prod = new Producto($id, $nombre, $imagen, $descripcion, $precio, $categoria);

    // Si estamos editando un producto, actualizamos el producto en la BD.
    if (isset($id)) {
        if (ProductoController::update($prod)) {
            $alertMessage = "Producto actualizado correctamente.";
            $alertType = "success";
        } else {
            $alertMessage = "Error al actualizar el producto.";
            $alertType = "danger";
        }
    } else {
        // Si no estamos editando un producto, insertamos un nuevo producto en la BD.
        if (ProductoController::insert($prod)) {
            $alertMessage = "Producto insertado correctamente.";
            $alertType = "success";
        } else {
            $alertMessage = "Error al insertar el producto.";
            $alertType = "danger";
        }
    }

    // Recargamos la página.
    header("Location: gestion_merch.php?alertMessage=" . urlencode($alertMessage) . "&alertType=" . urlencode($alertType));
    exit();
}

// Si se pulsa el botón de editar producto.
if (isset($_POST['edit'])) {
    // Recogemos el id del producto a editar.
    $id = $_POST['edit'];
    // Obtenemos el producto a editar.
    $producto_edit = ProductoController::find($id);
}

// Si hay un mensaje de alerta, lo mostramos.
if (isset($_GET['alertMessage']) && isset($_GET['alertType'])) {
    $alertMessage = urldecode($_GET['alertMessage']);
    $alertType = urldecode($_GET['alertType']);
}

// Si no hay un usuario logueado, redirigimos a la página de inicio.
// Si el usuario logueado no es un administrador, redirigimos a la página de inicio.
if (!isset($_SESSION["logged"]) || $_SESSION["logged"]->rol != "admin") {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>
    <script src="./js/gestion.js"></script>
</head>

<body>
    <!-- Barra de navegación -->
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

    <main class="px-3 d-block px-md-0">

        <!-- Sección de Cabecera -->
        <section class="container page-section">
            <div class="row page-section-heading">
                <h1>Administración de Merch</h1>
                <h2>Añade, modifica y borra productos</h2>
            </div>
        </section>

        <!-- Sección de los Productos de Merch -->
        <section class="container px-3 mb-5 page-section px-md-5">
            <div class="row">
                <div class="col-12 col-md-6 table-responsive-md">
                    <h3 class="mb-4 text-center">Listado de Productos</h3>
                    <div id="listado-productos" class="pe-2">
                        <table class="table table-productos table-borderless table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Imagen</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Mostramos los productos disponibles en una tabla.
                                if ($productos) {
                                    foreach ($productos as $p) {
                                ?>
                                        <tr>
                                            <td class="align-middle">
                                                <img src="./<?php echo $p->imagen; ?>"
                                                    alt="<?php echo $p->nombre; ?>" height="150px" width="150px">
                                            </td>
                                            <td class="align-middle">
                                                <?php echo $p->nombre; ?>
                                            </td>
                                            <td class="align-middle">
                                                <form action="" method="POST" class="gap-3 d-flex flex-column justify-content-center">
                                                    <button class="btn btn-category-item" type="submit"
                                                        name="edit" value="<?php echo $p->id; ?>">Modificar</button>
                                                    <button class="btn btn-category-item" type="submit"
                                                        name="delete" value="<?php echo $p->id; ?>">Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-5 mt-md-0 col-12 col-md-6">
                    <h3 class="mb-4 text-center">Guardar producto</h3>
                    <!-- Formulario -->
                    <form action="" id="form-product" method="POST" enctype="multipart/form-data">
                        <!-- Nombre Input-->
                        <div class="row">
                            <div class="col d-flex flex-column">
                                <label for="nombre">Nombre de producto</label>
                                <input type="text" class="form-control" id="nombre"
                                    placeholder="Introduzca el nombre del producto" name="nombre"
                                    value="<?php if (isset($producto_edit)) echo $producto_edit->nombre; ?>" required>
                            </div>
                        </div>
                        <!-- Imagen Input -->
                        <div class="row">
                            <?php
                            // Si estamos editando un producto, mostramos la imagen actual.
                            if (isset($producto_edit)) {
                            ?>
                                <div class="pb-4 col-4 d-flex flex-column">
                                    <img src="./<?php echo $producto_edit->imagen; ?>"
                                        alt="<?php echo $producto_edit->nombre; ?>" height="150px" width="150px">
                                </div>
                            <?php
                            }
                            ?>
                            <div class="col d-flex flex-column">
                                <label for="imagen">Imagen</label>
                                <input type="file" class="form-control" id="imagen" name="imagen">
                            </div>
                        </div>
                        <!-- Descripción Quill.js -->
                        <div class="row">
                            <div class="col d-flex flex-column">
                                <label for="eq-editor">Descripci&oacute;n</label>
                                <div id="eq-editor"></div>
                            </div>
                        </div>
                        <!-- Categoria Select -->
                        <div class="row">
                            <div class="py-4 col-12 col-md-6 d-flex flex-column">
                                <label for="categoria">Categor&iacute;a</label>
                                <select class="form-select" id="categoria" name="categoria" required>
                                    <option value="ropa" <?php if (isset($producto_edit) && $producto_edit->categoria == "ropa") echo "selected"; ?>>Ropa</option>
                                    <option value="accesorio" <?php if (isset($producto_edit) && $producto_edit->categoria == "accesorio") echo "selected"; ?>>Accesorio</option>
                                    <option value="musica" <?php if (isset($producto_edit) && $producto_edit->categoria == "musica") echo "selected"; ?>>Música</option>
                                </select>
                            </div>
                            <div class="py-4 col-12 col-md-6 d-flex flex-column">
                                <label for="precio">Precio (€)</label>
                                <input type="number" step="0.01" class="form-control" id="precio" placeholder="Introduzca el precio"
                                    name="precio" value="<?php if (isset($producto_edit)) echo $producto_edit->precio; ?>" required>
                            </div>
                        </div>
                        <!-- Botón Guardar -->
                        <div class="d-flex flex-column ">
                            <button type="submit" id="btn-save" name="save" class="btn">Guardar producto</button>
                        </div>
                        <!-- Botón Cancelar -->
                        <div class="mt-3 d-flex flex-column">
                            <a href="gestion_merch.php" id="btn-cancel" class="btn">Cancelar</a>
                        </div>
                        <!-- Campo oculto para enviar la descripción de Quill -->
                        <input type="hidden" id="descripcion" name="descripcion">
                        <!-- Campo oculto para enviar el id del producto a editar -->
                        <?php
                        // Si estamos editando un producto, añadir un campo oculto con el id del producto.
                        if (isset($producto_edit)) {
                        ?>
                            <input type="hidden" name="id_product" value="<?php echo $producto_edit->id; ?>">
                        <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
        </section>

    </main>

    <!-- Pie de página -->
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
            placeholder: 'Escriba aquí la descripción...',
        });

        function getCleanQuillContent() {
            let quillContent = quill.root.innerHTML.trim(); // Obtiene el HTML limpio
            let plainText = quill.getText().trim(); // Obtiene solo el texto sin etiquetas

            // Si el contenido está vacío, lo dejamos así.
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

        // Al enviar el formulario, copiar contenido limpio de Quill al input oculto
        document.getElementById("form-product").addEventListener("submit", function() {
            document.querySelector("#descripcion").value = getCleanQuillContent();
        });

        <?php
        // Si hemos pulsado sobre el botón de editar producto.
        if (isset($producto_edit)) {
        ?>
            var contenidoDesdeBD = `<?php echo addslashes($producto_edit->descripcion); ?>`;

            if (typeof contenidoDesdeBD !== "undefined" && contenidoDesdeBD.trim() !== "") {
                // Insertamos el contenido HTML en el editor Quill manteniendo el formato
                quill.clipboard.dangerouslyPasteHTML(contenidoDesdeBD);
            }
        <?php
        }
        ?>
    </script>

</body>

</html>