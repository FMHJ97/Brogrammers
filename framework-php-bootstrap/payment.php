<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>
    <script src="./js/scripts.js"></script>
</head>

<body>
    <!-- Barra de navegación -->
    <?php include("includes/navbar.php"); ?>

    <main class="px-3 px-md-0">
        <section class="page-section">

            <div class="container">
                <!-- Fila con títulos (Carrito, Dirección, Pago) -->
                <div class="text-center row d-flex page-section-heading">
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

                <!-- Fila con formulario de facturación y resumen -->
                <div class="gap-2 row">
                    <div class="p-3 mb-2 col-md-7 authentication-form">

                        <!-- Formulario de pago -->
                        <div class="row">
                            <div class="text-center col">
                                <h4>Método de pago</h4>
                            </div>
                        </div>

                        <!-- Métodos de pago en dos botones que, al hacer clic, mostrarán los campos para tarjeta de crédito o Paypal -->
                        <div class="mb-3 row g-2">
                            <div class="col-md-6">
                                <button class="p-5 btn btn-payment-method selected" aria-label="Botón de tarjeta de crédito">
                                    <img src="./assets/img/visa.svg" alt="Tarjeta de crédito"
                                        class="payment-method-img img-fluid">
                                </button>
                            </div>

                            <div class="col-md-6">
                                <button class="p-5 btn btn-payment-method" aria-label="Botón de Paypal">
                                    <img src="./assets/img/paypal.svg" alt="Paypal"
                                        class="payment-method-img img-fluid">
                                </button>
                            </div>
                        </div>

                        <!-- Campos para tarjeta de crédito -->
                        <div class="row">
                            <div class="col">
                                <label for="numCard">Número de tarjeta</label><span> *</span>
                                <input id="numCard" type="text" class="form-control"
                                    placeholder="Introduzca su número de tarjeta">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="titular">Nombre del titular</label><span> *</span>
                                <input id="titular" type="text" class="form-control"
                                    placeholder="Introduzca el nombre del titular">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="exp">Fecha de caducidad</label><span> *</span>
                                <input id="exp" type="text" class="form-control" placeholder="MM/AA">
                            </div>
                            <div class="col-md-6">
                                <label for="cvc">CVC</label><span> *</span>
                                <input id="cvc" type="text" class="form-control"
                                    placeholder="Introduzca el código de seguridad">
                            </div>
                        </div>

                        <!-- Campos para Paypal -->
                        <div class="row d-none">
                            <div class="col">
                                <label for="emailPaypal">
                                    <h5>Correo electrónico de Paypal</h5>
                                </label><span> *</span>
                                <input id="emailPaypal" type="email" class="form-control"
                                    placeholder="Introduzca su correo electrónico de Paypal">
                            </div>
                        </div>

                    </div>

                    <!-- Resumen -->
                    <div class="p-3 col-md-4 container-summary">
                        <div class="mb-3 row">
                            <div class="text-center col">
                                <h4>Resumen</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">

                                <p>Detalles del pedido</p>
                                <div class="row">
                                    <!-- Cada col-8 representa la columna de la izquierda y cada col-4 la de la derecha -->
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
                        <div class="mb-3 row">
                            <div class="mb-1 col-md-7">
                                <label for="discount" class="visually-hidden">Introduce tu código</label>
                                <input id="discount" type="text" class="form-control-discount" placeholder="Introduzca código">
                            </div>

                            <div class="col-md-5">
                                <button type="button" class="button-apply-discount" aria-label="Botón de aplicar descuento">Aplicar</button>
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

                        <!-- Este botón debería mostrar un mensaje de confirmación de compra -->
                        <a href="#" class="button-ticket" aria-label="Botón para confirmar pedido">Confirmar pedido</a>

                    </div>

                </div>
            </div>

        </section>
    </main>

    <!-- Pie de página -->
    <?php include("includes/footer.php"); ?>

</body>

</html>