<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <script src="./js/tickets.js"></script>
    <?php include("includes/head_tags.php"); ?>
</head>

<body>
    <!-- Navigation Bar -->
    <?php include("includes/navbar.php"); ?>

    <main>
        <section class="page-section">

            <div class="container mb-4 page-section-heading">
                <h1 class="text-center ">GroundSound Festival Tickets</h1>
                <h2 class="text-center">Consulta el precio de las entradas a nuestro festival</h2>
            </div>

            <div class="container">

                <!-- Row Tabs -->
                <div class="row mb-4">
                    <div class="col btn-category-group">
                        <button type="button" class="btn btn-category-item selected">General Access</button>
                        <button type="button" class="btn btn-category-item">VIPs</button>
                    </div>
                </div>

                <!-- Row Cards with prices -->
                <div class="row" id="rowGeneralPrices">

                    <!-- 1 - Day Card -->
                    <div class="col-md-4">
                        <div class="ticket-card mb-4">
                            <div class="ticket-body">
                                <h3 class="ticket-title text-center">1 - Day Pass</h3>
                                <p class="ticket-text">Entrada que te permite disfrutar de un día de festival</p>
                                <p class="ticket-price text-center">Por 25€</p>
                                <a href="cart.php" class="button-ticket">Comprar</a>
                            </div>
                        </div>
                    </div>

                    <!-- 2 - Day Card -->
                    <div class="col-md-4">
                        <div class="ticket-card mb-4">
                            <div class="ticket-body">
                                <h3 class="ticket-title text-center">2 - Day Pass</h3>
                                <p class="ticket-text">Con esta entrada podrás vivir la experiencia del festival 2 días</p>
                                <p class="ticket-price text-center">Por 50€</p>
                                <a href="cart.php" class="button-ticket">Comprar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Weekend Card -->
                    <div class="col-md-4">
                        <div class="ticket-card mb-4">
                            <div class="ticket-body">
                                <h3 class="ticket-title text-center">Weekend Pass</h3>
                                <p class="ticket-text">Con esta entrada podrás disfrutar de todo el fin de semana de festival</p>
                                <p class="ticket-price text-center">Por 70€</p>
                                <a href="cart.php" class="button-ticket">Comprar</a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Row Cards with VIPs prices -->
                <div class="row d-none" id="rowVipPrices">

                    <!-- 1 - Day Card -->
                    <div class="col-md-4">
                        <div class="ticket-card mb-4">
                            <div class="ticket-body">
                                <h3 class="ticket-title text-center">1 - Day Pass</h3>
                                <p class="ticket-text">Entrada para disfrutar de la experiencia VIP un día</p>
                                <p class="ticket-price text-center">Por 25€</p>
                                <a href="cart.php" class="button-ticket">Comprar</a>
                            </div>
                        </div>
                    </div>

                    <!-- 2 - Day Card -->
                    <div class="col-md-4">
                        <div class="ticket-card mb-4">
                            <div class="ticket-body">
                                <h3 class="ticket-title text-center">2 - Day Pass</h3>
                                <p class="ticket-text">Para disfrutar el espectáculo desde la zona VIP 2 días</p>
                                <p class="ticket-price text-center">Por 50€</p>
                                <a href="cart.php" class="button-ticket">Comprar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Weekend Card -->
                    <div class="col-md-4">
                        <div class="ticket-card mb-4">
                            <div class="ticket-body">
                                <h3 class="ticket-title text-center">Weekend Pass</h3>
                                <p class="ticket-text">A disfrutar del festival desde la zona VIP todos los días</p>
                                <p class="ticket-price text-center">Por 70€</p>
                                <a href="cart.php" class="button-ticket">Comprar</a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Row with map -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="ticket-card">
                            <div class="ticket-body">
                                <img src="assets/img/mapaFestival.jpg" class="ticket-img" alt="Mapa del festival">
                                <button class="button-ticket" id="map">Ver Mapa</button>
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