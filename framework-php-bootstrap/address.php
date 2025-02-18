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

    <main class="px-3 d-block px-md-0">
        <section class="page-section">

            <div class="container ">
                <!-- Fila con títulos (Carrito, Dirección, Pago) -->
                <div class="text-center row d-flex page-section-heading">
                    <div class="col">
                        <h2 class="step-title">Carrito</h2>
                    </div>

                    <div class="col">
                        <h2 class="step-title active">Dirección</h2>
                    </div>

                    <div class="col">
                        <h2 class="step-title">Pago</h2>
                    </div>
                </div>

                <!-- Fila con formulario de facturación y resumen -->
                <div class="gap-2 row">
                    <div class="p-3 mb-2 col-md-7 authentication-form">

                        <!-- Título -->
                        <div class="mb-2 row">
                            <div class="col text-start">
                                <h3>Dirección de envío</h3>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="row">
                            <div class="col">
                                <label for="email1">Correo electrónico</label><span> *</span>
                                <input id="email1" type="email" class="form-control"
                                    placeholder="Introduzca su correo electrónico">
                            </div>
                        </div>

                        <!-- Nombre y Apellidos -->
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">Nombre</label><span> *</span>
                                <input id="name" type="text" class="form-control" placeholder="Introduzca su nombre">
                            </div>

                            <div class="col-md-6">
                                <label for="surname">Apellidos</label><span> *</span>
                                <input id="surname" type="text" class="form-control"
                                    placeholder="Introduzca sus apellidos">
                            </div>
                        </div>

                        <!-- Dirección -->
                        <div class="row">
                            <div class="col-md-6">
                                <label for="address">Dirección</label><span> *</span>
                                <input id="address" type="text" class="form-control"
                                    placeholder="Introduzca su dirección">
                            </div>
                            <div class="col-md-6">
                                <label for="block">Bloque, Puerta</label><span> *</span>
                                <input id="block" type="text" class="form-control" placeholder="Introduzca su bloque">
                            </div>
                        </div>

                        <!-- País y Código Postal -->
                        <div class="row">
                            <div class="col-md-6">
                                <label for="country">País</label><span> *</span>
                                <input id="country" type="text" class="form-control" placeholder="Introduzca su país">
                            </div>
                            <div class="col-md-6">
                                <label for="postal">Código Postal</label><span> *</span>
                                <input id="postal" type="text" class="form-control"
                                    placeholder="Introduzca su código postal">
                            </div>
                        </div>

                        <!-- Ciudad y Teléfono Móvil -->
                        <div class="row">
                            <div class="col-md-6">
                                <label for="city">Ciudad</label><span> *</span>
                                <input id="city" type="text" class="form-control" placeholder="Introduzca su ciudad">
                            </div>
                            <div class="col-md-6">
                                <label for="mobile">Teléfono móvil</label><span> *</span>
                                <input id="mobile" type="text" class="form-control"
                                    placeholder="Introduzca su teléfono móvil">
                            </div>
                        </div>

                    </div>

                    <!-- Resumen -->
                    <div class="p-3 col-md-4 container-summary">
                        <div class="mb-3 row">
                            <div class="text-center col">
                                <h3>Resumen</h3>
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
                                <label for="discount" class="visually-hidden">Código de descuento</label>
                                <input id="discount" type="text" class="form-control-discount"
                                    placeholder="Introduzca código">
                            </div>

                            <div class="col-md-5">
                                <button type="button" class="button-apply-discount">Aplicar</button>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-8">
                                <h4>Total</h4>
                            </div>

                            <div class="col-4 text-end">
                                <h4>65€</h4>
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