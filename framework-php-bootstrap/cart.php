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
        <section class="page-section">

            <div class="container">

                <!-- Row with titles (Carrito, dirección, pago) -->
                <div class="row d-flex text-center page-section-heading">
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
                    <div class="col-md-8 container-article">

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
                            <div class="col-6 d-flex align-items-center p-0">
                                <img src="../assets/img/merch/camiseta_1.png" alt="Camiseta" class="img-article-cart">
                                <div>
                                    <p class="mb-1">Camiseta GroundSound</p>
                                    <p class="mb-1">Color - Blanco</p>
                                    <p class="mb-0">Talla - L</p>
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="col-2 text-center align-self-center">
                                <p>25€</p>
                            </div>

                            <!-- Quantity -->
                            <div class="col-2 text-center align-self-center quantity-group">
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

                        <div class="row article-row">
                            <div class="col-6 d-flex align-items-center p-0">
                                <img src="../assets/img/merch/camiseta_1.png" alt="Camiseta" class="img-article-cart">
                                <div>
                                    <p class="mb-1">Camiseta GroundSound</p>
                                    <p class="mb-1">Color - Blanco</p>
                                    <p class="mb-0">Talla - L</p>
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="col-2 text-center align-self-center">
                                <p>25€</p>
                            </div>

                            <!-- Quantity -->
                            <div class="col-2 text-center align-self-center quantity-group">
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
                    <div class="col-md-4 container-summary">
                        <div class="row">
                            <div class="col text-center">
                                <h5>Resumen</h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">

                                <p>Detalles del pedido</p>
                                
                                <div class="row">
                                    <div class="col-md-8 text-end">
                                        <p>Precio sin IVA</p>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <p>50€</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 text-end">
                                        <p>IVA</p>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <p>10€</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 text-end">
                                        <p>Cupón de descuento</p>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <p>0€</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 text-end">
                                        <p>Gastos de envío</p>
                                    </div>
                                    <div class="col-md-4 text-end">
                                        <p>5€</p>
                                    </div>
                                </div>

                            </div>

                        </div>


                        <p class="mb-0">¿Tienes un código de descuento?</p>
                        <div class="row mb-3">

                            <div class="col-md-7">
                                <input type="text" class="form-control-discount" placeholder="Introduzca su código">
                            </div>

                            <div class="col-md-5">
                                <button type="button" class="button-apply-discount">Aplicar</button>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-8">
                                <h5>Total</h5>
                            </div>

                            <div class="col-md-4">
                                <h5>65€</h5>
                            </div>
                        </div>

                        <a href="address.php" class="button-ticket">Confirmar</a>

                    </div>
            
                </div>
            </div>

        </section>
    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>
