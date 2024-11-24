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
        <section class="">

            <div class="container">

                <!-- Row with titles (Carrito, dirección, pago) -->
                <div class="row text-center">
                    <div class="col">
                        <h4 class="step-title active">Carrito</h4>
                    </div>

                    <div class="col">
                        <h4 class="step-title">Dirección</h4>
                    </div>

                    <div class="col">
                        <h4 class="step-title">Pago</h4>
                    </div>
                </div>

                <!-- Row with articles and summary -->

                <div class="row">
                    <div class="col-md-8">

                    <!-- Titles -->
                        <div class="row">
                            <div class="col-6">
                                <p>Artículo</p>
                            </div>
                            <div class="col-2 text-center">
                                <p>Precio</p>
                            </div>
                            <div class="col-2 text-center">
                                <p>Cantidad</p>
                            </div>
                            <div class="col-2 text-center">
                                <p>Subtotal</p>
                            </div>
                        </div>

                        <!-- Each row is an article -->
                        <div class="row article-row">
                            <div class="col-6 d-flex align-items-center">
                                <img src="../assets/img/merch/camiseta_1.png" alt="Camiseta" class="img-article-cart">
                                <div>
                                    <p>Camiseta GroundSound</p>
                                    <p>Color - Blanco</p>
                                    <p>Talla - L</p>
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="col-2 text-center align-self-center">
                                <p>25€</p>
                            </div>

                            <!-- Quantity -->
                            <div class="col-2 text-center align-self-center">
                                <div class="item-quantity">
                                    <button type="button" id="restar" class="btn btn-quantity">-</button>
                                    <span id="quantity">1</span>
                                    <button type="button" id="sumar" class="btn btn-quantity">+</button>
                                </div>
                            </div>

                            <!-- Subtotal -->
                            <div class="col-2 text-center align-self-center">
                                <p>50€</p>
                            </div>
                        </div>
                    </div>

                        

                    <!-- Summary -->
                    <div class="col-md-4 bg-danger">
                        <div class="row">
                            <div class="col">
                                <p>Resumen</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p>Subtotal</p>

                                <p>IVA</p>

                                <p>Total</p>

                                <a href="address.php" class="button-ticket">Siguiente</a>

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
