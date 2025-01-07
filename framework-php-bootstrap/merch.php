<?php include("includes/a_config.php"); ?>
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
        <section class="container page-section px-3 px-md-5">
            <!-- Filtros -->
            <div class="row">
                <!-- Botones de Categoría -->
                <div class="col btn-category-group">
                    <button type="button" id="all-items" class="btn btn-category-item selected">Todos los
                        productos</button>
                    <button type="button" id="clothes" class="btn btn-category-item">Ropa</button>
                    <button type="button" id="accesories" class="btn btn-category-item">Accesorios</button>
                    <button type="button" id="music" class="btn btn-category-item">Música</button>
                </div>
                <!-- Barra de Búsqueda -->
                <div class="col">
                    <form action="#">
                        <div class="input-group search-bar">
                            <!-- Input de Búsqueda -->
                            <input type="text" class="form-control-search" placeholder="Buscar productos..."
                                name="search">
                            <!-- Botón de Búsqueda -->
                            <button class="btn btn-search" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Elemento de Ordenación -->
            <div class="row mt-3">
                <div class="dropdown dropdown-order-by">
                    <!-- Icono de Ordenación -->
                    <i class="bi bi-filter"></i>
                    <!-- Botón de Ordenación -->
                    <button id="dropdownMenuButton" type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                        Ordenar por: Relevancia
                    </button>
                    <!-- Opciones de Ordenación -->
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="#" onclick="updateDropdownText(this)">Relevancia</a></li>
                        <li><a class="dropdown-item" href="#" onclick="updateDropdownText(this)">Precio
                                (descendente)</a></li>
                        <li><a class="dropdown-item" href="#" onclick="updateDropdownText(this)">Precio
                                (ascendente)</a></li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- Sección de los Productos de Merch -->
        <section class="container page-section px-3 px-md-5">
            <div class="row merch-products">
                <!-- Producto 1 -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items clothes">
                    <img class="card-img-top" src="./assets/img/merch/camiseta_blanca_01.png"
                        alt="Camiseta GroundSound Blanca (Black Logo)">
                    <div class="card-body">
                        <h3 class="card-title">Camiseta Blanca GroundSound<br>(Black Logo)</h3>
                        <span>€14,00 EUR</span>
                    </div>
                </a>
                <!-- Producto 2 -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items clothes">
                    <img class="card-img-top" src="./assets/img/merch/camiseta_negra_02.png"
                        alt="Camiseta Negra GroundSound (Neon Logo)">
                    <div class="card-body">
                        <h3 class="card-title">Camiseta Negra GroundSound<br>(Neon Logo)</h3>
                        <span>€16,00 EUR</span>
                    </div>
                </a>
                <!-- Producto 3 -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items accesories">
                    <img class="card-img-top" src="./assets/img/merch/mechero.png" alt="Mechero Zippo de Gasolina (Recargable)">
                    <div class="card-body">
                        <h3 class="card-title">Mechero Zippo de Gasolina<br>(Recargable)</h3>
                        <span>€15,00 EUR</span>
                    </div>
                </a>
                <!-- Producto 4 -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items music">
                    <img class="card-img-top" src="./assets/img/merch/vinilo_groundsound_2024.png"
                        alt="GroundSound Festival 2024 (Vinilo - Disco)">
                    <div class="card-body">
                        <h3 class="card-title">GroundSound Festival 2024<br>(Vinilo - Disco)</h3>
                        <span>€32,80 EUR</span>
                    </div>
                </a>
                <!-- Producto 5 -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items clothes">
                    <img class="card-img-top" src="./assets/img/merch/camiseta_negra_03.png"
                        alt="Camiseta Negra GroundSound (Trinity Logo)">
                    <div class="card-body">
                        <h3 class="card-title">Camiseta Negra GroundSound<br>(Trinity Logo)</h3>
                        <span>€22,00 EUR</span>
                    </div>
                </a>
                <!-- Producto 6 -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items music">
                    <img class="card-img-top" src="./assets/img/merch/vinilo_groundsound_2023.png"
                        alt="GroundSound Festival 2023 (Vinilo - Disco)">
                    <div class="card-body">
                        <h3 class="card-title">GroundSound Festival 2023<br>(Vinilo - Disco)</h3>
                        <span>€28,40 EUR</span>
                    </div>
                </a>
                <!-- Producto 7 -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items clothes">
                    <img class="card-img-top" src="./assets/img/merch/camiseta_blanca_02.png"
                        alt='Camiseta GroundSound Blanca (Neon Logo)'>
                    <div class="card-body">
                        <h3 class="card-title">Camiseta GroundSound Blanca<br>(Neon Logo)</h3>
                        <span>€12,00 EUR</span>
                    </div>
                </a>
                <!-- Producto 8 -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items accesories">
                    <img class="card-img-top" src="./assets/img/merch/gorra.png" alt="Gorra GroundSound (Golden Dream)">
                    <div class="card-body">
                        <h3 class="card-title">Gorra<br>GroundSound<br>(Golden Dream)</h3>
                        <span>€18,50 EUR</span>
                    </div>
                </a>
                <!-- Producto 9 -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items clothes">
                    <img class="card-img-top" src="./assets/img/merch/camiseta_negra_01.png"
                        alt='Camiseta Negra GroundSound (White Logo)'>
                    <div class="card-body">
                        <h3 class="card-title">Camiseta Negra GroundSound<br>(White Logo)</h3>
                        <span>16,00 EUR</span>
                    </div>
                </a>
            </div>
        </section>

    </main>

    <!-- Componente Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>