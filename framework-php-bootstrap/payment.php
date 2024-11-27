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

            <div class="container ">
                <!-- Row with titles (Carrito, dirección, pago) -->
                <div class="row d-flex text-center page-section-heading">
                    <div class="col">
                        <h3 class="step-title">Carrito</h3>
                    </div>

                    <div class="col">
                        <h3 class="step-title">Dirección</h3>
                    </div>

                    <div class="col">
                        <h3 class="step-title active">Pago</h3>
                    </div>
                </div>

                <!-- Row with billing and summary -->

                <div class="row">
                    <div class="col-md-7 authentication-form me-2 mb-2 p-3">

                        <!-- Billing form -->
                        <div class="row">
                            <div class="col text-center">
                                <h4>Método de pago</h4>
                            </div>
                        </div>

                        <!-- Payment Method in two boxes when clicked will show the inputs for credit card or paypal -->
                        
                        <div class="row ">
                            <div class="col-md-6">
                                <div class="payment-method-box" id="credit-card-box">
                                    <button class="btn btn-payment-method"><img src="./assets/img/visa.svg" alt="Tarjeta de crédito" class="payment-method-img img-fluid"></button>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="payment-method-box" id="paypal-box">
                                    <button class="btn btn-payment-method"><img src="./assets/img/paypal.png" alt="Paypal" class="payment-method-img img-fluid"></button>
                                </div>
                            </div>
                        </div>

                        <!-- Credit Card Inputs -->
                        <div class="row">
                            <div class="col">
                                <label><h5>Número de tarjeta</h5></label><span> *</span>
                                <input type="text" class="form-control" placeholder="Introduzca su número de tarjeta">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label><h5>Nombre del titular</h5></label><span> *</span>
                                <input type="text" class="form-control" placeholder="Introduzca el nombre del titular">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label><h5>Fecha de caducidad</h5></label><span> *</span>
                                <input type="text" class="form-control" placeholder="MM/AA">
                            </div>
                            <div class="col-md-6">
                                <label><h5>CVC</h5></label><span> *</span>
                                <input type="text" class="form-control" placeholder="Introduzca el código de seguridad">
                            </div>
                        </div>

                        <!-- Paypal Inputs -->
                        <div class="row">
                            <div class="col">
                                <label><h5>Correo electrónico de Paypal</h5></label><span> *</span>
                                <input type="email" class="form-control" placeholder="Introduzca su correo electrónico de Paypal">
                            </div>
                        </div>


                        

                    </div>

                    <!-- Summary -->
                    <div class="col-md-4 container-summary p-3">
                        <div class="row mb-3">
                            <div class="col text-center">
                                <h4>Resumen</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">

                                <p>Detalles del pedido</p>

                                <div class="row">
                                    <div class="col-8 text-end">
                                        <p>Precio sin IVA</p>
                                    </div>
                                    <div class="col-4 text-end">
                                        <p>50€</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-8 text-end">
                                        <p>IVA</p>
                                    </div>
                                    <div class="col-4 text-end">
                                        <p>10€</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-8 text-end">
                                        <p>Cupón de descuento</p>
                                    </div>
                                    <div class="col-4 text-end">
                                        <p>0€</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-8 text-end">
                                        <p>Gastos de envío</p>
                                    </div>
                                    <div class="col-4 text-end">
                                        <p>5€</p>
                                    </div>
                                </div>

                            </div>

                        </div>


                        <p class="mb-0 discount-text">¿Tienes un código de descuento?</p>
                        <div class="row mb-3">

                            <div class="col-md-7 mb-1">
                                <input type="text" class="form-control-discount" placeholder="Introduzca código">
                            </div>

                            <div class="col-md-5">
                                <button type="button" class="button-apply-discount">Aplicar</button>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-8">
                                <h5>Total</h5>
                            </div>

                            <div class="col-4 text-end">
                                <h5>65€</h5>
                            </div>
                        </div>

                        <a href="payment.php" class="button-ticket">Confirmar</a>

                    </div>

                </div>
            </div>

        </section>
    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>