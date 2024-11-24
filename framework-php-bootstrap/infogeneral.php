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
        <!-- INFO Heading -->
        <section class="container page-section">
            <div class="row page-section-heading">
                <h1>INFO</h1>
            </div>
        </section>


        <!-- Festival History -->
        <section id="terms" class="container page-section">
            <!-- Título fuera del recuadro -->
            <div class="container page-section-heading  mb-4">
                <h2 class="text-center text-white">FESTIVAL HISTORY</h2>
            </div>

            <!-- Recuadro blanco con contenido -->
            <div class="container box-area">
                <div class=" row mb-4 text-white d-flex justify-content-center align-items-center">

                    <div class="col-lg-4 d-flex justify-content-center align-items-center">
                        <div class="row d-flex">
                            <p class="mb-5">
                                Este festival nace de la pasión de 4 amigos amantes de la música.
                                Lo que pareció ser una pequeña reunión de artistas poco conocidos, dio paso uno de los festivales más legendarios
                                de todo el multiverso Marvel.
                            </p>
                            <p class="mb-5">
                                Realizada en la gran Urbe de Lucena, famosamente conocida por tirar cohetes por cualquier cosa.
                                Este festival se realizó desde su primera edición en “Prudencio Uzar Town Square”, situado en uno de los barrios
                                con más historia musical de la ciudad. Tanto que utilizaban cualquier recipiente para poder hacer acompañamientos y
                                la zona pasó a llamarse “El Barrio La Lata”.
                            </p>
                            <br><br>
                            <p class="mb-5">
                                A partir de se momento comienza la leyenda...
                            </p>
                            <br><br>
                            <p>
                                GROUND SOUND
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="row text-center pt-3">
                            <h5 class="my-0">Location</h5>
                            <img src="./assets/img/info/MapaBarrioLata.png" class="imgHistory py-4 w-90 h-90">
                        </div>
                        <div class="row">
                            <img src="./assets/img/info/HISTORIAFESTIVAL.JPG" class="imgHistory pw-90 h-90">
                        </div>
                    </div>
                </div>

            </div>
        </section>








        <!-- CONTACT US -->
        <section id="terms" class="container page-section">
            <!-- Título fuera del recuadro -->
            <div class="container page-section-heading ">
                <h2 class="text-center text-white">CONTACT US</h2>
            </div>

            <!-- Recuadro blanco con contenido -->
            <div class="container box-area">
                <div class=" row text-white pt-3 ">

                       <h3>CUSTOMER SERVICE & ALL GENERAL ENQUIRIES</h3> 

                       <p class="mb-4"><strong>Please contact <a href="mailto:info@groundsound.luc">info@groundsound.luc</a></strong></p> 

                       <h4>LOST PROPERTY</h4>
                       <p class="mb-4">Please contact <a href="mailto:lostandfound@groundsound.luc">lostandfound@groundsound.luc</a></p>

                       <h4>MEDIA ENQUIRIES</h4>
                        <p class="mb-4">Please contact <a href="mailto:gsupstream@groundsound.luc">gsupstream@groundsound.luc</a></p>

                        <h4>ACCESSIBILITY ENQUIRIES</h4>
                        <p>Please contact<a href="mailto:accessibility@groundsound.luc">accessibility@groundsound.luc</a></p>

                    </p>

                </div>

            </div>
        </section>




        <?php include("includes/patrocinadores.php");  ?>
    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>