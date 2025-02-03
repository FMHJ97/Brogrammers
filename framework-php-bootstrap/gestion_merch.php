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
                <div class="col-12 col-md-6">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th colspan="2">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Mostramos los productos disponibles en una tabla.
                            if ($productos) {
                                foreach ($productos as $p) {
                            ?>
                                    <tr>
                                        <td>
                                            <img src="./assets/img/merch/<?php echo $p->imagen; ?>"
                                                alt="<?php echo $p->nombre; ?>">
                                        </td>
                                        <td><?php echo $p->nombre; ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </main>

    <!-- Pie de página -->
    <?php include("includes/footer.php"); ?>

</body>

</html>