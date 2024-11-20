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
        <!--Seleccion Info -->
        <div class="container">
            <div class="row btn-category-group justify-content-center border border-light">
                <div class="d-flex flex-wrap justify-content-center">
                    <div class="col-lg-3 col-md-6 col-6 mb-2">
                        <button type="button" id="history" class="btn btn-category-item selected w-100">Fest History</button>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6 mb-2">
                        <button type="button" id="tickets" class="btn btn-category-item w-100">Tickets Info</button>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6 mb-2">
                        <button type="button" id="camping" class="btn btn-category-item w-100">Camping</button>
                    </div>
                    <div class="col-lg-3 col-md-6 col-6 mb-2">
                        <button type="button" id="accessibility" class="btn btn-category-item w-100">Accessibility</button>
                    </div>
                </div>
            </div>
        </div>





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




        <!-- TICKETS INFO -->
        <section id="terms" class="container page-section">
            <!-- Título fuera del recuadro -->
            <div class="container page-section-heading  mb-4">
                <h2 class="text-center text-white">TICKETS INFO</h2>
            </div>

            <!-- Recuadro con contenido -->
            <div class="container box-area-fondo">
                <div class=" row text-white d-flex justify-content-center align-items-center">
                    <p>Ground Sound is an all ages event, patrons of any age require a pass for entry.</p>
                    <p> All pass sales are final, no refunds or exchanges.</p>

                    <p>All price levels are available in limited quantities. Buy early to save the most money.
                        Once an allotment is sold out, passes will be available at the next price level.
                        There is no difference in access between the levels. </p>

                    <p>Your pass will come in the form of an RFID Festival Wristband. </p>
                    <p>Festival admission, camping and parking are sold separately.</p>

                    <p> We recommend you purchase directly via our TICKETS Page, we are not responsible
                        for any purchases made through unofficial or secondary sites. </p>

                    <p> The re-sale of passes at a higher price point is prohibited, and if discovered,
                        will result in the pass being voided without refund.</p>

                    <p> Passes may not be used for advertising, promotion (including contests and sweepstakes),
                        or other trade purposes without the express written consent of the festival. </p>
                </div>
                <div class="row bgroundTicketInfo d-flex">
                    <button class="btn btn-primary">Haz clic aquí</button>
                </div>
            </div>
        </section>





        <!-- CAMPING/PARKING -->
        <section id="terms" class="container page-section">
            <!-- Título fuera del recuadro -->
            <div class="container page-section-heading  mb-4">
                <h2 class="text-center text-white">CAMPING/PARKING</h2>
            </div>

            <!-- Recuadro con contenido -->
            <div class="container box-area-fondo">
                <div class=" row text-white d-flex justify-content-center align-items-center">
                    <p>Ground Sound is an all ages event, patrons of any age require a pass for entry.</p>
                    <p> All pass sales are final, no refunds or exchanges.</p>

                    <p>All price levels are available in limited quantities. Buy early to save the most money.
                        Once an allotment is sold out, passes will be available at the next price level.
                        There is no difference in access between the levels. </p>

                    <p>Your pass will come in the form of an RFID Festival Wristband. </p>
                    <p>Festival admission, camping and parking are sold separately.</p>

                    <p> We recommend you purchase directly via our TICKETS Page, we are not responsible
                        for any purchases made through unofficial or secondary sites. </p>

                    <p> The re-sale of passes at a higher price point is prohibited, and if discovered,
                        will result in the pass being voided without refund.</p>

                    <p> Passes may not be used for advertising, promotion (including contests and sweepstakes),
                        or other trade purposes without the express written consent of the festival. </p>
                </div>
                <div class="row bgroundCampingInfo d-flex ">
                    <button class="btn btn-primary">Haz clic aquí</button>
                </div>
            </div>
        </section>




        <!-- ACCESSIBILITY -->
        <section id="terms" class="container page-section">
            <!-- Título fuera del recuadro -->
            <div class="container page-section-heading  mb-4">
                <h2 class="text-center text-white">ACCESSIBILITY</h2>
            </div>

            <!-- Recuadro blanco con contenido -->
            <div class="container box-area">
                <div class=" row text-white pt-3 ">


                    <p class="mb-5">
                        Our festivals are committed to making the events accessible to everyone.
                        The festival is held outdoors. There are sometimes great distances between parking lots, camping, and stages.
                    </p>
                    <p>
                        The campgrounds and festival grounds are a combination of concrete, asphalt and natural terrain.
                        There will be an elevated viewing area at the main stages for those with mobility limitations.
                        An Access Center with professionally trained staff will be set up next to the info booth at the festival
                        entrance to assist at the event who can answer all questions, provide wristbands for the viewing platform,
                        and additional services listed below.

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