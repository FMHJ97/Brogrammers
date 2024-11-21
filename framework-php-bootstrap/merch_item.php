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
                        <div class="col">
                            <form action="#" method="POST">
                                <button type="submit" class="btn btn-cart">Añadir al carrito</button>
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
        <!-- Suggestions Section -->
        <section class="container page-section">

        </section>
    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>