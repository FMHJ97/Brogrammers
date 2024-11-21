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
        <!-- Merch Item Section -->
        <section class="container page-section mt-5">
            <div class="row">
                <!-- Merch Item Image -->
                <div class="col">
                    <!-- Main image -->
                    <div class="row">

                    </div>
                    <!-- Additional images -->
                    <div class="row">

                    </div>
                </div>
                <!-- Merch Item Details -->
                <div class="col merch-item-details">
                    <!-- Merch Item Title & Price -->
                    <div class="row">
                        <div class="col item-heading">
                            <h1>Camiseta GroundSound Blanca (Black Logo)</h1>
                            <h2>€25,00 EUR</h2>
                        </div>
                    </div>
                    <!-- Merch Item Size -->
                    <div class="row">
                        <p>Talla</p>
                        <div class="col btn-size-group">
                            <button type="button" class="btn btn-item-size selected">S</button>
                            <button type="button" class="btn btn-item-size">M</button>
                            <button type="button" class="btn btn-item-size">L</button>
                            <button type="button" class="btn btn-item-size">XL</button>
                            <button type="button" class="btn btn-item-size">2XL</button>
                        </div>
                    </div>
                    <!-- Merch Item Quantity -->
                    <div class="row">
                        <p>Cantidad</p>
                        <div class="col item-quantity">
                            <button type="button" id="restar" class="btn btn-quantity">-</button>
                            <span id="quantity">1</span>
                            <button type="button" id="sumar" class="btn btn-quantity">+</button>
                        </div>
                    </div>
                    <!-- Merch Item Add to Cart Button -->
                    <div class="row">
                        <div class="col py-2">
                            <form action="#" method="POST">
                                <button type="submit" class="btn btn-cart">Añadir al Carrito</button>
                            </form>
                        </div>
                    </div>
                    <!-- Merch Item Description -->
                    <div class="row">
                        <div class="col item-description">
                            <h3>Descripción</h3>
                            <ul>
                                <li>100% algodón</li>
                                <li>Color: Blanco</li>
                                <li>Estampado de GroundSound</li>
                                <li>Fabricado en España</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Suggested Products Section -->
        <section class="container page-section px-3 px-md-5">
            <!-- Suggestions Heading -->
             <div class="row">
                <div class="col pb-4">
                    <h2>También te puede interesar</h2>
                </div>
             </div>
            <!-- Suggested Products -->
            <div class="row merch-products">
                <!-- Merch Item 1 -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items clothes">
                    <img class="card-img-top" src="./assets/img/merch/camiseta_1.png"
                        alt="Camiseta GroundSound Blanca (Black Logo)">
                    <div class="card-body">
                        <h3 class="card-title">Camiseta GroundSound Blanca (Black Logo)</h3>
                        <span>€25,00 EUR</span>
                    </div>
                </a>
                <!-- Merch Item 2 -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items clothes">
                    <img class="card-img-top" src="./assets/img/merch/camiseta_2.png"
                        alt="Camiseta GroundSound Negra (Neon Logo)">
                    <div class="card-body">
                        <h3 class="card-title">Camiseta GroundSound Negra (Neon Logo)</h3>
                        <span>€30,00 EUR</span>
                    </div>
                </a>
                <!-- Merch Item 3 -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items accesories">
                    <img class="card-img-top" src="./assets/img/merch/bolsa.png" alt="Mochila Saco GroundSound Negra">
                    <div class="card-body">
                        <h3 class="card-title">Mochila Saco GroundSound<br>Negra</h3>
                        <span>€15,00 EUR</span>
                    </div>
                </a>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>