<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>
    <script src="./js/scripts.js"></script>
</head>

<body>
    <!-- Navigation Bar -->
    <?php include("includes/navbar.php"); ?>

    <main>
        <!-- Merch Heading Section -->
        <section class="container page-section">
            <div class="row page-section-heading">
                <h1>GroundSound Festival Merch</h1>
                <h2>Productos exclusivos</h2>
            </div>
        </section>
        <!-- Merch Filter & Order by Section -->
        <section class="container page-section">
            <!-- Merch Filter -->
            <div class="row">
                <!-- Buttons -->
                <div class="col btn-category-group px-0">
                    <button type="button" id="all-items" class="btn btn-category-item selected">Todos los productos</button>
                    <button type="button" id="clothes" class="btn btn-category-item">Ropa</button>
                    <button type="button" id="accesories" class="btn btn-category-item">Accesorios</button>
                    <button type="button" id="music" class="btn btn-category-item">Música</button>
                </div>
                <!-- Search Bar -->
                <div class="col px-0">
                    <form action="#">
                        <div class="input-group search-bar">
                            <input type="text" class="form-control-search"
                                placeholder="Buscar productos en la tienda..." name="search">
                            <button class="btn btn-search" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Merch Order by -->
            <div class="row mt-3">
                <div class="dropdown dropend dropdown-order-by px-0">
                    <i class="bi bi-filter"></i>
                    <button id="dropdownMenuButton" type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                        Ordenar por: Relevancia
                    </button>
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
        <!-- Merch Products Section -->
        <section class="container page-section">
            <!-- First Row -->
            <div class="row row-cols-1 row-cols-md-3 merch-products">
                <!-- Merch Item 1 -->
                <a href="#" class="card card-merch-item all-items clothes">
                    <img class="card-img-top" src="./assets/img/merch/camiseta_1.png"
                        alt="Camiseta GroundSound Blanca (Black Logo)">
                    <div class="card-body">
                        <h3 class="card-title">Camiseta GroundSound Blanca (Black Logo)</h3>
                        <span>€25,00 EUR</span>
                    </div>
                </a>
                <!-- Merch Item 2 -->
                <a href="#" class="card card-merch-item all-items clothes">
                    <img class="card-img-top" src="./assets/img/merch/camiseta_2.png"
                        alt="Camiseta GroundSound Negra (Neon Logo)">
                    <div class="card-body">
                        <h3 class="card-title">Camiseta GroundSound Negra (Neon Logo)</h3>
                        <span>€30,00 EUR</span>
                    </div>
                </a>
                <!-- Merch Item 3 -->
                <a href="#" class="card card-merch-item all-items accesories">
                    <img class="card-img-top" src="./assets/img/merch/bolsa.png" alt="Mochila Saco GroundSound Negra">
                    <div class="card-body">
                        <h3 class="card-title">Mochila Saco GroundSound<br>Negra</h3>
                        <span>€15,00 EUR</span>
                    </div>
                </a>
                <!-- Merch Item 4 -->
                <a href="#" class="card card-merch-item all-items music">
                    <img class="card-img-top" src="./assets/img/merch/Vinilo_SoundGarden_SuperUnknow_2LP.png"
                        alt="Sound Garden Superunknow (Vinilo 2LP)">
                    <div class="card-body">
                        <h3 class="card-title">Sound Garden Superunknow<br>(Vinilo 2LP)</h3>
                        <span>€55,00 EUR</span>
                    </div>
                </a>
                <!-- Merch Item 5 -->
                <a href="#" class="card card-merch-item all-items clothes">
                    <img class="card-img-top" src="./assets/img/merch/camiseta_queen.png"
                        alt="Camiseta Queen 'Jazz' 40 Aniversario">
                    <div class="card-body">
                        <h3 class="card-title">Camiseta Queen<br>"Jazz"<br>40 Aniversario</h3>
                        <span>€32,00 EUR</span>
                    </div>
                </a>
                <!-- Merch Item 6 -->
                <a href="#" class="card card-merch-item all-items music">
                    <img class="card-img-top" src="./assets/img/merch/Eminem_Vinilo.png"
                        alt="The Death of Slim Shady - Coup de Grâce (Vinilo 2LP)">
                    <div class="card-body">
                        <h3 class="card-title">The Death of Slim Shady - Coup de Grâce (Vinilo 2LP)</h3>
                        <span>€50,00 EUR</span>
                    </div>
                </a>
                <!-- Merch Item 7 -->
                <a href="#" class="card card-merch-item all-items clothes">
                    <img class="card-img-top" src="./assets/img/merch/camiseta_fallinginreverse.png"
                        alt='Camiseta "Floating" Falling in Reverse'>
                    <div class="card-body">
                        <h3 class="card-title">Camiseta<br>"Floating"<br>Falling in Reverse</h3>
                        <span>€40,00 EUR</span>
                    </div>
                </a>
                <!-- Merch Item 8 -->
                <a href="#" class="card card-merch-item all-items accesories">
                    <img class="card-img-top" src="./assets/img/merch/gorra.png" alt="Gorra GroundSound Golden Forrest">
                    <div class="card-body">
                        <h3 class="card-title">Gorra<br>GroundSound<br>Golden Forrest</h3>
                        <span>€24,50 EUR</span>
                    </div>
                </a>
                <!-- Merch Item 9 -->
                <a href="#" class="card card-merch-item all-items clothes">
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

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>