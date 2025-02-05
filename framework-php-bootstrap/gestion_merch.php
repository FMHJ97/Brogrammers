<?php include("includes/a_config.php");

require_once '../framework-php-bootstrap/controller/productoController.php';
require_once '../framework-php-bootstrap/model/producto.php';

// Si existe una sesión Logueado, redirigimos a menu.
if (isset($_SESSION['logged'])) {
    if ($_SESSION['logged']->rol !== "admin") {
        header("Location:index.php");
        exit();
    }
} else {
    header("Location:index.php");
    exit();
}

// Obtenemos todos los productos disponibles de la BD.
$productos = ProductoController::findAll();

// Si se pulsa el botón de guardar producto.
if (isset($_POST['save'])) {
    // Recogemos los datos del formulario.
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $descripcion = $_POST['descripcion'];
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
        <section class="container px-3 page-section px-md-5">
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
                                                <img src="./assets/img/merch/<?php echo $p->imagen; ?>"
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
                    <form action="" id="form-product" class="p-3" method="POST" style="background-color: lightslategray;">
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
                            <div class="col d-flex flex-column">
                                <label for="imagen">Imagen</label>
                                <input type="file" class="form-control" id="imagen" name="imagen"
                                    value="<?php if (isset($producto_edit)) echo $producto_edit->imagen; ?>" required>
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
                                    <option value="accesorios" <?php if (isset($producto_edit) && $producto_edit->categoria == "accesorios") echo "selected"; ?>>Accesorios</option>
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
                            <button type="submit" name="save" class="btn btn-success"
                                value="<?php if (isset($producto_edit)) echo $producto_edit->id; ?>">Guardar producto</button>
                        </div>
                        <!-- Campo oculto para enviar la descripción de Quill -->
                        <input type="hidden" id="descripcion" name="descripcion">
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
            var contenidoDesdePHP = `<?php echo addslashes($producto_edit->descripcion); ?>`;
            quill.root.innerHTML = contenidoDesdePHP;
        <?php
        }
        ?>
    </script>

</body>

</html>