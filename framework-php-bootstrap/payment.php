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

                <!-- Fila con formulario de facturación y resumen -->
                <div class="row gap-2">
                    <div class="col-md-7 authentication-form mb-2 p-3">

                        <!-- Formulario de pago -->
                        <div class="row">
                            <div class="col text-center">
                                <h4>Método de pago</h4>
                            </div>
                        </div>

                        <!-- Métodos de pago en dos botones que, al hacer clic, mostrarán los campos para tarjeta de crédito o Paypal -->
                        <div class="row mb-3 g-2">
                            <div class="col-md-6">
                                <button class="btn btn-payment-method selected p-5">
                                    <img src="./assets/img/visa.svg" alt="Tarjeta de crédito" class="payment-method-img img-fluid">
                                </button>
                            </div>

                            <div class="col-md-6">
                                <button class="btn btn-payment-method p-5">
                                    <img src="./assets/img/paypal.svg" alt="Paypal" class="payment-method-img img-fluid">
                                </button>
                            </div>
                        </div>

                        <!-- Campos para tarjeta de crédito -->
                        <div class="row">
                            <div class="col">
                                <label>Número de tarjeta</label><span> *</span>
                                <input type="text" class="form-control" placeholder="Introduzca su número de tarjeta">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label>Nombre del titular</label><span> *</span>
                                <input type="text" class="form-control" placeholder="Introduzca el nombre del titular">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label>Fecha de caducidad</label><span> *</span>
                                <input type="text" class="form-control" placeholder="MM/AA">
                            </div>
                            <div class="col-md-6">
                                <label>CVC</label><span> *</span>
                                <input type="text" class="form-control" placeholder="Introduzca el código de seguridad">
                            </div>
                        </div>

                        <!-- Campos para Paypal -->
                        <div class="row d-none">
                            <div class="col">
                                <label>
                                    <h5>Correo electrónico de Paypal</h5>
                                </label><span> *</span>
                                <input type="email" class="form-control"
                                    placeholder="Introduzca su correo electrónico de Paypal">
                            </div>
                        </div>

                    </div>

                    <!-- Resumen -->
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

                        <!-- Este botón debería mostrar un mensaje de confirmación de compra -->
                        <a href="#" class="button-ticket">Confirmar pedido</a>

                    </div>

                </div>
            </div>

        </section>
    </main>

    <!-- Pie de página -->
    <?php include("includes/footer.php"); ?>

</body>

</html>