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
    <script src="./js/scripts.js"></script>
</head>

<body>
    <!-- Componente Navbar -->
    <?php include("includes/navbar.php"); ?>

    <main>
        <!-- Sección de Cabecera -->
        <section class="container page-section">
            <div class="row page-section-heading">
                <h1>GroundSound Festival Merch</h1>
                <h2>Productos exclusivos</h2>
            </div>
        </section>
        <!-- Sección de Filtros y Ordenación de Merch -->
        <section class="container px-3 page-section px-md-5">
            <!-- Filtros -->
            <div class="row">
                <!-- Botones de Categoría -->
                <div class="col btn-category-group">
                    <button type="button" id="all-items" class="btn-focus btn-category-item selected"
                        aria-label="Todos los productos" aria-pressed="true">Todos los
                        productos</button>
                    <button type="button" id="ropa" class="btn-focus btn-category-item" aria-label="Productos de ropa"
                        aria-pressed="false">Ropa</button>
                    <button type="button" id="accesorio" class="btn-focus btn-category-item"
                        aria-label="Productos de accesorios" aria-pressed="false">Accesorios</button>
                    <button type="button" id="musica" class="btn-focus btn-category-item"
                        aria-label="Productos de música" aria-pressed="false">Música</button>
                </div>
                <!-- Barra de Búsqueda -->
                <div class="col">
                    <div class="input-group search-bar">
                        <!-- Input de Búsqueda -->
                        <label for="search" class="visually-hidden">Buscar productos...</label>
                        <input type="text" class="form-control-search" placeholder="Buscar productos..." name="search"
                            aria-label="Buscar productos" aria-describedby="search" id="search">
                        <!-- Botón de Búsqueda -->
                        <button class="btn btn-search" arial-label="Botón de búsqueda">
                            <i class="bi bi-search"></i><span class="visually-hidden">Buscar</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Elemento de Ordenación -->
            <div class="mt-3 row">
                <div class="dropdown dropdown-order-by" aria-label="Desplegable de ordenación de productos"
                    aria-expanded="false">
                    <!-- Icono de Ordenación -->
                    <i class="bi bi-filter"></i>
                    <!-- Botón de Ordenación -->
                    <button id="dropdownOrderButton" type="button" class="btn dropdown-toggle"
                        data-bs-toggle="dropdown">
                        Ordenar por: Relevancia
                    </button>
                    <!-- Opciones de Ordenación -->
                    <ul class="dropdown-menu" aria-labelledby="dropdownOrderButton">
                        <li><button class="dropdown-item" onclick="updateDropdownText(this)"
                                aria-label="Ordenar por relevancia">Relevancia</button></li>
                        <li><button id="desc" class="dropdown-item" onclick="updateDropdownText(this)"
                                aria-label="Ordenar por precio descendente">Precio
                                (descendente)</button></li>
                        <li><button id="asc" class="dropdown-item" onclick="updateDropdownText(this)"
                                aria-label="Ordenar por precio ascendente">Precio
                                (ascendente)</button></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- Sección de los Productos de Merch -->
        <section class="container px-3 page-section px-md-5">
            <div class="row merch-products">
                <!-- Mostramos los productos de la BD -->
                <?php
                if ($productos) {
                    // Si hay productos en la BD, los mostramos.
                    foreach ($productos as $p) {
                ?>
                        <form action="./merch_item.php" method="POST"
                            class="col-12 col-md-4 card card-merch-item all-items <?php echo $p->categoria; ?>"
                            data-precio="<?php echo $p->precio; ?>" data-nombre="<?php echo $p->nombre; ?>"
                            onclick="this.submit()" onkeypress="this.submit()" role="button" tabindex="0"
                            aria-label="Producto <?php echo $p->nombre; ?>" aria-pressed="false">
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
                    echo "<h2>No hay productos disponibles en este momento.</h2>";
                }
                ?>
            </div>
        </section>

    </main>

    <!-- Componente Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>