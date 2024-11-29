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

            <div class="container ">
                <!-- Fila con títulos (Carrito, Dirección, Pago) -->
                <div class="row d-flex text-center page-section-heading">
                    <div class="col">
                        <h3 class="step-title">Carrito</h3>
                    </div>

                    <div class="col">
                        <h3 class="step-title active">Dirección</h3>
                    </div>

                    <div class="col">
                        <h3 class="step-title">Pago</h3>
                    </div>
                </div>

                <!-- Fila con formulario de facturación y resumen -->
                <div class="row gap-2">
                    <div class="col-md-7 authentication-form mb-2 p-3">

                        <!-- Título -->
                        <div class="row mb-2">
                            <div class="col text-start">
                                <h4>Dirección de envío</h4>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="row">
                            <div class="col">
                                <label>Correo electrónico</label><span> *</span>
                                <input type="email" class="form-control" placeholder="Introduzca su correo electrónico">
                            </div>
                        </div>

                        <!-- Nombre y Apellidos -->
                        <div class="row">
                            <div class="col-md-6">
                                <label>Nombre</label><span> *</span>
                                <input type="text" class="form-control" placeholder="Introduzca su nombre">
                            </div>

                            <div class="col-md-6">
                                <label>Apellidos</label><span> *</span>
                                <input type="text" class="form-control" placeholder="Introduzca sus apellidos">
                            </div>
                        </div>

                        <!-- Dirección -->
                        <div class="row">
                            <div class="col-md-6">
                                <label>Dirección</label><span> *</span>
                                <input type="text" class="form-control" placeholder="Introduzca su dirección">
                            </div>
                            <div class="col-md-6">
                                <label>Bloque, Puerta</label><span> *</span>
                                <input type="text" class="form-control" placeholder="Introduzca su bloque">
                            </div>
                        </div>

                        <!-- País y Código Postal -->
                        <div class="row">
                            <div class="col-md-6">
                                <label>País</label><span> *</span>
                                <input type="text" class="form-control" placeholder="Introduzca su país">
                            </div>
                            <div class="col-md-6">
                                <label>Código Postal</label><span> *</span>
                                <input type="text" class="form-control" placeholder="Introduzca su código postal">
                            </div>
                        </div>

                        <!-- Ciudad y Teléfono Móvil -->
                        <div class="row">
                            <div class="col-md-6">
                                <label>Ciudad</label><span> *</span>
                                <input type="text" class="form-control" placeholder="Introduzca su ciudad">
                            </div>
                            <div class="col-md-6">
                                <label>Teléfono móvil</label><span> *</span>
                                <input type="text" class="form-control" placeholder="Introduzca su teléfono móvil">
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