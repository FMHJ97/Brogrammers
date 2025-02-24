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

            <div class="container">
                <!-- Fila con títulos (Carrito, Dirección, Pago) -->
                <div class="text-center row d-flex page-section-heading">
                    <div class="col">
                        <h3 class="step-title active">Carrito</h3>
                    </div>
                    <div class="col">
                        <h3 class="step-title">Dirección</h3>
                    </div>
                    <div class="col">
                        <h3 class="step-title">Pago</h3>
                    </div>
                </div>

                <!-- Fila con artículos y resumen -->
                <div class="row g-3">
                    <div class="px-0 col-md-8 px-md-2">
                        <div class="table-responsive-md"> <!-- Hace que la tabla sea responsive -->
                            <!-- Títulos de la tabla -->
                            <table class="table table-cart table-borderless table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            <!CF2: ¿h5? ¿Dónde estan h2,h3 y h4?-->
                                                <h5>Artículo</h5>
                                        </th>
                                        <th class="text-center">
                                            <h5>Precio</h5>
                                        </th>
                                        <th class="text-center">
                                            <h5>Cantidad</h5>
                                        </th>
                                        <th>
                                            <h5>Subtotal</h5>
                                        </th>
                                    </tr>
                                </thead>

                                <!-- Cada fila representa un artículo -->
                                <tr>
                                    <td>
                                        <img src="../assets/img/merch/camiseta_blanca_01.png" alt="Camiseta" class="img-article-cart">
                                        <div>
                                            <p class="mb-0">Camiseta GroundSound</p>
                                            <p class="mb-0">Color - Blanco</p>
                                            <p class="mb-0">Talla - L</p>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">25€</td>
                                    <td class="align-middle">
                                        <div class="item-quantity-cart">
                                            <button type="button" id="restar" class="btn btn-quantity-cart">-</button>
                                            <span id="quantity-cart">1</span>
                                            <button type="button" id="sumar" class="btn btn-quantity-cart">+</button>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">50€</td>
                                </tr>

                                <!-- Repetimos para más artículos -->
                                <tr>
                                    <td>
                                        <img src="../assets/img/merch/camiseta_blanca_01.png" alt="Camiseta" class="img-article-cart">
                                        <div>
                                            <p class="mb-0">Camiseta GroundSound</p>
                                            <p class="mb-0">Color - Blanco</p>
                                            <p class="mb-0">Talla - L</p>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">25€</td>
                                    <td class="align-middle">
                                        <div class="item-quantity-cart">
                                            <button type="button" id="restar" class="btn btn-quantity-cart">-</button>
                                            <span id="quantity-cart">1</span>
                                            <button type="button" id="sumar" class="btn btn-quantity-cart">+</button>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle">50€</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Resumen del pedido -->
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
                                <label for="discount" class="visually-hidden">Código de descuento</label>
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

                        <a href="address.php" class="button-ticket" aria-label="Botón de continuar">Continuar</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Pie de página -->
    <?php include("includes/footer.php"); ?>

</body>

</html>