<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>
    <script src="./js/scripts.js"></script>
</head>

<body>
    <!-- Componente NavBar -->
    <?php include("includes/navbar.php"); ?>

    <main>
        <!-- Sección de Producto -->
        <section class="container page-section my-4 my-md-5 px-3 px-md-5">
            <!-- Nombre y Precio (Oculto en dispositivos superiores a md) -->
            <div class="row d-block d-md-none mb-5">
                <div class="col item-heading">
                    <h1>Camiseta GroundSound Blanca<br>(Black Logo)</h1>
                    <h2>€14,00 EUR</h2>
                </div>
            </div>
            <div class="row">
                <!-- Imágenes del Producto -->
                <div class="col item-image-section">
                    <!-- Imagen Principal -->
                    <div class="row">
                        <div class="col main-image">
                            <img src="./assets/img/merch/camiseta_blanca_01.png" alt="Camiseta GroundSound Blanca (Black Logo)"
                                class="img-fluid">
                        </div>
                    </div>
                    <!-- Imágenes Adicionales -->
                    <div class="row">
                        <div class="col">
                            <div class="row additional-images">
                                <div class="col-3">
                                    <img src="./assets/img/merch/camiseta_blanca_01.png"
                                        alt="Camiseta GroundSound Blanca (Black Logo)" class="img-fluid">
                                </div>
                                <div class="col-3">
                                    <img src="./assets/img/merch/camiseta_blanca_01.png"
                                        alt="Camiseta GroundSound Blanca (Black Logo)" class="img-fluid">
                                </div>
                                <div class="col-3">
                                    <img src="./assets/img/merch/camiseta_blanca_01.png"
                                        alt="Camiseta GroundSound Blanca (Black Logo)" class="img-fluid">
                                </div>
                                <div class="col-3">
                                    <img src="./assets/img/merch/camiseta_blanca_01.png"
                                        alt="Camiseta GroundSound Blanca (Black Logo)" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Detalles del Producto -->
                <div class="col merch-item-details">
                    <!-- Nombre y Precio (Oculto en dispositivos móviles) -->
                    <div class="row d-none d-md-block">
                        <div class="col item-heading">
                            <h1>Camiseta GroundSound Blanca (Black Logo)</h1>
                            <h2>€14,00 EUR</h2>
                        </div>
                    </div>
                    <!-- Apartado Tallas (según producto) -->
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
                    <!-- Cantidad de Producto -->
                    <div class="row">
                        <p>Cantidad</p>
                        <div class="col item-quantity">
                            <button type="button" id="restar" class="btn btn-quantity">-</button>
                            <span id="quantity">1</span>
                            <button type="button" id="sumar" class="btn btn-quantity">+</button>
                        </div>
                    </div>
                    <!-- Botón Añadir al Carrito -->
                    <div class="row">
                        <div class="col btn-cart py-3">
                            <form action="cart.php" method="POST" novalidate>
                                <button type="submit" class="btn btn-cart">Añadir al Carrito</button>
                            </form>
                        </div>
                    </div>
                    <!-- Descripción del Producto -->
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
        <!-- Sección Productos Recomendados -->
        <section class="container page-section px-3 px-md-5">
            <!-- Encabezado -->
            <div class="row">
                <div class="col suggested-items-heading pb-4">
                     <h2>También te pueden interesar</h2>
                </div>
            </div>
            <!-- Productos Sugeridos -->
            <div class="row merch-products">
                <!-- Producto -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items clothes">
                    <img class="card-img-top" src="./assets/img/merch/camiseta_negra_03.png"
                        alt="Camiseta Negra GroundSound (Trinity Logo)">
                    <div class="card-body">
                        <h3 class="card-title">Camiseta Negra GroundSound<br>(Trinity Logo)</h3>
                        <span>€22,00 EUR</span>
                    </div>
                </a>
                <!-- Producto -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items accesories">
                    <img class="card-img-top" src="./assets/img/merch/gorra.png" alt="Gorra GroundSound (Golden Dream)">
                    <div class="card-body">
                        <h3 class="card-title">Gorra<br>GroundSound<br>(Golden Dream)</h3>
                        <span>€18,50 EUR</span>
                    </div>
                </a>
                <!-- Producto -->
                <a href="./merch_item.php" class="col-12 col-md-4 card card-merch-item all-items music">
                    <img class="card-img-top" src="./assets/img/merch/vinilo_groundsound_2024.png"
                        alt="GroundSound Festival 2024 (Vinilo - Disco)">
                    <div class="card-body">
                        <h3 class="card-title">GroundSound Festival 2024<br>(Vinilo - Disco)</h3>
                        <span>€32,80 EUR</span>
                    </div>
                </a>
            </div>
        </section>
    </main>

    <!-- Componente Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>