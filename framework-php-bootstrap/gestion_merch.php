<?php include("includes/a_config.php");

require_once '../framework-php-bootstrap/controller/productoController.php';
require_once '../framework-php-bootstrap/model/producto.php';

// Obtenemos todos los productos disponibles de la BD.
$productos = ProductoController::findAll();

// Si pulsamos el botón de borrar producto.
if (isset($_POST['delete'])) {
    // Obtenemos el id del producto a borrar.
    $id = $_POST['delete'];
    // Borramos el producto de la BD.
    ProductoController::delete($id);
    // Recargamos la página.
    header("Location: gestion_merch.php");
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
    if (!empty($_FILES['imagen']['name']) && is_uploaded_file($_FILES['imagen']['tmp_name'])
        && in_array($_FILES['imagen']['type'], ["image/jpeg", "image/png", "image/jpg"])) {
        
        // Generamos un nombre único para la imagen.
        $fichero = time() . "_" . $_FILES['imagen']['name'];
        // En la BD guardamos la ruta completa del fichero.
        $ruta = "assets/img/merch/" . $fichero;
        // Movemos el fichero subido a la ubicación deseada.
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
        // Asignamos la nueva ruta de la imagen.
        $imagen = $ruta;
    }

    // Si estamos editando un producto, obtenemos su id, de lo contrario, es null.
    $id = isset($_POST['id_product']) ? $_POST['id_product'] : null;

    // Creamos un objeto Producto con los datos del formulario.
    $prod = new Producto($id, $nombre, $imagen, $descripcion, $precio, $categoria);

    // Si estamos editando un producto, actualizamos el producto en la BD.
    if (isset($id)) {
        ProductoController::update($prod);
    } else {
        // Si no estamos editando un producto, insertamos un nuevo producto en la BD.
        ProductoController::insert($prod);
    }

    // Recargamos la página.
    header("Location: gestion_merch.php");
    exit();
}

// Si se pulsa el botón de editar producto.
if (isset($_POST['edit'])) {
    // Recogemos el id del producto a editar.
    $id = $_POST['edit'];
    // Obtenemos el producto a editar.
    $producto_edit = ProductoController::find($id);
}

?>

<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>

</head>

<body>
    <!-- Barra de navegación -->
    <?php include("includes/navbar.php"); ?>

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
                <div class="col-6 table-responsive-md">
                    <h3 class="mb-4 text-center">Listado de Productos</h3>
                    <div style="max-height: 705px; overflow-y: auto;">
                        <table class="table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center ">Imagen</th>
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
                <div class="col-6">
                    <h3 class="mb-4 text-center">Guardar producto</h3>
                    <!-- Formulario -->
                    <form action="" id="form-product" class="p-3" method="POST" enctype="multipart/form-data" style="background-color: lightslategray;">
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
                            <div class="col-4 d-flex flex-column">
                                <img src="./<?php echo $producto_edit->imagen; ?>"
                                    alt="<?php echo $producto_edit->nombre; ?>" height="150px" width="150px">
                            </div>
                            <?php
                            }
                            ?>
                            <div class="col-8 d-flex flex-column">
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
                            <div class="col d-flex flex-column">
                                <label for="categoria">Categor&iacute;a</label>
                                <select class="form-select" id="categoria" name="categoria" required>
                                    <option value="ropa" <?php if (isset($producto_edit) && $producto_edit->categoria == "ropa") echo "selected"; ?>>Ropa</option>
                                    <option value="accesorio" <?php if (isset($producto_edit) && $producto_edit->categoria == "accesorio") echo "selected"; ?>>Accesorio</option>
                                    <option value="musica" <?php if (isset($producto_edit) && $producto_edit->categoria == "musica") echo "selected"; ?>>Música</option>
                                </select>
                            </div>
                        </div>
                        <!-- Precio -->
                        <div class="row">
                            <div class="col d-flex flex-column">
                                <label for="precio">Precio (€)</label>
                                <input type="number" class="form-control" id="precio" placeholder="Introduzca el precio"
                                    name="precio" value="<?php if (isset($producto_edit)) echo $producto_edit->precio; ?>" required>
                            </div>
                        </div>
                        <!-- Botón Guardar -->
                        <div class="d-flex flex-column ">
                            <button type="submit" name="save" class="btn btn-success">Guardar producto</button>
                        </div>
                        <!-- Botón Cancelar -->
                        <div class="mt-3 d-flex flex-column">
                            <a href="gestion_merch.php" class="btn btn-danger">Cancelar</a>
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
                    [{
                        header: [1, 2, false]
                    }],
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
            placeholder: 'Escriba aquí su valoración...',
        });

        // Al enviar el formulario, copiar contenido de Quill al input oculto
        document.getElementById("form-product").addEventListener("submit", function() {
            document.querySelector("#descripcion").value = quill.root.innerHTML;
        });

        <?php
        // Si hemos pulsado sobre el botón de editar producto.
        if (isset($producto_edit)) {
        ?>
            // Insertamos la descripción del producto a editar en el editor Quill.
            var contenidoDesdeBD = `<?php echo addslashes($producto_edit->descripcion); ?>`;
            // Verificamos si la variable contenidoDesdePHP está definida antes de usarla.
            if (typeof contenidoDesdeBD !== "undefined") {
                // Insertamos el contenido HTML en el editor Quill de forma segura.
                // Este método permite pegar contenido con formato HTML, asegurando que 
                // las etiquetas como <ul>, <li>, <p>, etc., se mantengan correctamente.
                quill.clipboard.dangerouslyPasteHTML(contenidoDesdeBD);
            }
        <?php
        }
        ?>
    </script>

</body>

</html>