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
                    <button type="button" id="all-items" class="btn btn-category-item selected">Todos los productos</button>
                    <button type="button" id="clothes" class="btn btn-category-item">Ropa</button>
                    <button type="button" id="accesories" class="btn btn-category-item">Accesorios</button>
                    <button type="button" id="music" class="btn btn-category-item">Música</button>
                </div>
                <!-- Barra de Búsqueda -->
                <div class="col">
                    <form action="#">
                        <div class="input-group search-bar">
                            <!-- Input de Búsqueda -->
                            <input type="text" class="form-control-search"
                                placeholder="Buscar productos..." name="search">
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
                    <img class="card-img-top" src="./assets/img/merch/camiseta_1.png"
                        alt="Camiseta GroundSound Blanca (Black Logo)">
                    <div class="card-body">
                        <h3 class="card-title">Camiseta GroundSound Blanca (Black Logo)</h3>
                        <span>€25,00 EUR</span>
                    </div>
                </a>
                <!-- Producto 2 -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items clothes">
                    <img class="card-img-top" src="./assets/img/merch/camiseta_2.png"
                        alt="Camiseta GroundSound Negra (Neon Logo)">
                    <div class="card-body">
                        <h3 class="card-title">Camiseta GroundSound Negra (Neon Logo)</h3>
                        <span>€30,00 EUR</span>
                    </div>
                </a>
                <!-- Producto 3 -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items accesories">
                    <img class="card-img-top" src="./assets/img/merch/bolsa.png" alt="Mochila Saco GroundSound Negra">
                    <div class="card-body">
                        <h3 class="card-title">Mochila Saco GroundSound<br>Negra</h3>
                        <span>€15,00 EUR</span>
                    </div>
                </a>
                <!-- Producto 4 -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items music">
                    <img class="card-img-top" src="./assets/img/merch/Vinilo_SoundGarden_SuperUnknow_2LP.png"
                        alt="Sound Garden Superunknow (Vinilo 2LP)">
                    <div class="card-body">
                        <h3 class="card-title">Sound Garden Superunknow<br>(Vinilo 2LP)</h3>
                        <span>€55,00 EUR</span>
                    </div>
                </a>
                <!-- Producto 5 -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items clothes">
                    <img class="card-img-top" src="./assets/img/merch/camiseta_queen.png"
                        alt="Camiseta Queen 'Jazz' 40 Aniversario">
                    <div class="card-body">
                        <h3 class="card-title">Camiseta Queen<br>"Jazz"<br>40 Aniversario</h3>
                        <span>€32,00 EUR</span>
                    </div>
                </a>
                <!-- Producto 6 -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items music">
                    <img class="card-img-top" src="./assets/img/merch/Eminem_Vinilo.png"
                        alt="The Death of Slim Shady - Coup de Grâce (Vinilo 2LP)">
                    <div class="card-body">
                        <h3 class="card-title">The Death of Slim Shady - Coup de Grâce (Vinilo 2LP)</h3>
                        <span>€50,00 EUR</span>
                    </div>
                </a>
                <!-- Producto 7 -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items clothes">
                    <img class="card-img-top" src="./assets/img/merch/camiseta_fallinginreverse.png"
                        alt='Camiseta "Floating" Falling in Reverse'>
                    <div class="card-body">
                        <h3 class="card-title">Camiseta<br>"Floating"<br>Falling in Reverse</h3>
                        <span>€40,00 EUR</span>
                    </div>
                </a>
                <!-- Producto 8 -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items accesories">
                    <img class="card-img-top" src="./assets/img/merch/gorra.png" alt="Gorra GroundSound Golden Forrest">
                    <div class="card-body">
                        <h3 class="card-title">Gorra<br>GroundSound<br>Golden Forrest</h3>
                        <span>€24,50 EUR</span>
                    </div>
                </a>
                <!-- Producto 9 -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items clothes">
                    <img class="card-img-top" src="./assets/img/merch/ElFary_camiseta.png"
                        alt='Camiseta "Mandanga" El Fary'>
                    <div class="card-body">
                        <h3 class="card-title">Camiseta<br>"Mandanga"<br>El Fary</h3>
                        <span>23,00 EUR</span>
                    </div>
                </a>
            </div>
        </section>

    </main>

    <!-- Componente Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>