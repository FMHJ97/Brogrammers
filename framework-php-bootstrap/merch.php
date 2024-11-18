<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>
</head>

<body>
    <!-- Navigation Bar -->
    <?php include("includes/navbar.php"); ?>

    <main>
        <!-- Merch Heading Section -->
        <section class="page-section">
            <div class="container-fluid">
                <div class="row page-section-heading">
                    <h1>GroundSound Festival Merch</h1>
                    <h2>Productos exclusivos</h2>
                </div>
            </div>
        </section>
        <!-- Merch Filter & Order by Section -->
        <section class="page-section">
            <div class="container-fluid">
                <!-- Merch Filter -->
                <div class="row d-flex gap-5">
                    <!-- Buttons -->
                    <div class="col btn-category-group">
                        <button type="button" class="btn btn-category-item selected">Todos los productos</button>
                        <button type="button" class="btn btn-category-item">Ropa</button>
                        <button type="button" class="btn btn-category-item">Accesorios</button>
                        <button type="button" class="btn btn-category-item">Música</button>
                    </div>
                    <!-- Search Bar -->
                    <div class="col">
                        <form action="#">
                            <div class="input-group search-bar">
                                <input type="text" class="form-control-search flex-grow-1"
                                    placeholder="Buscar productos..." name="search">
                                <button class="btn btn-search" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Merch Order by -->
                <div class="row mt-3">
                    <div class="dropdown dropend dropdown-order-by">
                        <i class="bi bi-filter"></i>
                        <button id="dropdownMenuButton" type="button" class="btn dropdown-toggle"
                            data-bs-toggle="dropdown">
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
            </div>
        </section>
        <!-- Merch Products Section -->
        <section class="page-section">
            <div class="container">
                <div class="row">
                    <!-- Product Card -->
                    <div class="col-3">
                        <div class="merch-item-card">
                        <img class="card-img-top" src="./assets/img/merch/Camiseta 1.png" alt="Camiseta GroundSound Blanca (Black Logo)">
                            <div class="merch-item-body">
                                <h3 class="merch-item-title text-center">Camiseta GroundSound Blanca (Black Logo)</h3>
                                <p class="merch-item-price text-center">€25,00 EUR</p>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card -->
                    <div class="col-3">
                        <div class="merch-item-card">
                        <img class="card-img-top" src="./assets/img/merch/Camiseta 1.png" alt="Camiseta GroundSound Blanca (Black Logo)">
                            <div class="merch-item-body">
                                <h3 class="merch-item-title text-center">Camiseta GroundSound Blanca (Black Logo)</h3>
                                <p class="merch-item-price text-center">€25,00 EUR</p>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card -->
                    <div class="col-3">
                        <div class="merch-item-card">
                        <img class="card-img-top" src="./assets/img/merch/Camiseta 1.png" alt="Camiseta GroundSound Blanca (Black Logo)">
                            <div class="merch-item-body">
                                <h3 class="merch-item-title text-center">Camiseta GroundSound Blanca (Black Logo)</h3>
                                <p class="merch-item-price text-center">€25,00 EUR</p>
                            </div>
                        </div>
                    </div>
                    <!-- Product Card -->
                    <div class="col-3">
                        <div class="merch-item-card">
                        <img class="card-img-top" src="./assets/img/merch/Camiseta 1.png" alt="Camiseta GroundSound Blanca (Black Logo)">
                            <div class="merch-item-body">
                                <h3 class="merch-item-title text-center">Camiseta GroundSound Blanca (Black Logo)</h3>
                                <p class="merch-item-price text-center">€25,00 EUR</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>