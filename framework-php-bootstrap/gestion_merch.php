<?php include("includes/a_config.php");

require_once '../framework-php-bootstrap/controller/productoController.php';
require_once '../framework-php-bootstrap/model/producto.php';

// Obtenemos todos los productos disponibles de la BD.
$productos = ProductoController::findAll();

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
                                                        name="edit">Modificar</button>
                                                    <button class="btn btn-category-item" type="submit"
                                                        name="delete">Borrar</button>
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
                    <form action="" class="p-3" method="POST" style="background-color: lightslategray;">
                        <!-- Nombre Input-->
                        <div class="row">
                            <div class="col d-flex flex-column">
                                <label for="name">Nombre de producto</label>
                                <input type="text" class="form-control" id="name"
                                    placeholder="Introduzca el nombre del producto" name="name" required>
                            </div>
                        </div>
                        <!-- Imagen Input -->
                        <div class="row">
                            <div class="col d-flex flex-column">
                                <label for="image">Imagen</label>
                                <input type="file" class="form-control" id="image" name="image" required>
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
                                <label for="category">Categor&iacute;a</label>
                                <select class="form-select" id="category" name="category" required>
                                    <option value="1">Ropa</option>
                                    <option value="2">Accesorios</option>
                                    <option value="3">Música</option>
                                </select>
                            </div>
                        </div>
                        <!-- Precio -->
                        <div class="row">
                            <div class="col d-flex flex-column">
                                <label for="price">Precio (€)</label>
                                <input type="number" class="form-control" id="price" placeholder="Introduzca el precio"
                                    name="price" required>
                            </div>
                        </div>
                        <!-- Botón Guardar -->
                        <div class="d-flex flex-column ">
                            <button type="submit" name="save" class="btn btn-success">Guardar producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </main>

    <!-- Pie de página -->
    <?php include("includes/footer.php"); ?>

</body>

</html>