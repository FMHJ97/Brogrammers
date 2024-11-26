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

                <div class="row g-3">
                    <div class="col-md-8 ">

                        <!-- Titles -->
                        <table class="table table-cart table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Artículo</th>
                                    <th scope="col" class="text-center">Precio</th>
                                    <th scope="col" class="text-center">Cantidad</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>

                            <!-- Each tr is a row with an article -->
                            <tr>

                                <td>
                                    <img src="../assets/img/merch/camiseta_1.png" alt="Camiseta" class="img-article-cart">

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

                            <!-- Each tr is a row with an article -->
                            <tr>

                                <td>
                                    <img src="../assets/img/merch/camiseta_1.png" alt="Camiseta"
                                        class="img-article-cart">
                                    <!-- To place the text in the same line as the image -->

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

                            <!-- Each tr is a row with an article -->
                            <tr>

                                <td>
                                    <img src="../assets/img/merch/camiseta_1.png" alt="Camiseta"
                                        class="img-article-cart">
                                    <!-- To place the text in the same line as the image -->

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

                    <!-- Summary -->
                    <div class="col-md-4 container-summary">
                        <div class="row mb-3">
                            <div class="col text-center">
                                <h5>Resumen</h5>
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