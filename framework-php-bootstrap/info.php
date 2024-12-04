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
        <!--Seleccion Info 
        En la siguiente fase, se implementarán de tal forma que filtren/muestren
        los contenidos según el botón presionado -->
        <section class="container">
            <div class="row btn-category-group justify-content-center">
                <!--CF2: Justo depués de row tiene haber un col-->
                <div class="d-flex flex-wrap justify-content-center">
                    <!-- Botón Filtrar por: Fest History -->
                    <div class="col-md-3 col-6 mb-2 px-2">
                        <a href="./info.php#festhistory" type="button" id="buttonhistory"
                            class="btn btn-category-item selected w-100">Fest History</a>
                    </div>
                    <!-- Botón Filtrar por: Tickets Info -->
                    <div class="col-md-3 col-6 mb-2 px-2">
                        <a href="./info.php#ticketsinfo" type="button" id="buttontickets"
                            class="btn btn-category-item w-100">Tickets Info</a>
                    </div>
                    <!-- Botón Filtrar por: Camping -->
                    <div class="col-md-3 col-6 mb-2 px-2">
                        <a href="./info.php#campinginfo" type="button" id="buttoncamping"
                            class="btn btn-category-item w-100">Camping</a>
                    </div>
                    <!-- Botón Filtrar por: Accesibilidad -->
                    <div class="col-md-3 col-6 mb-2 px-2">
                        <a href="./info.php#festaccess" type="button" id="buttonaccessibility"
                            class="btn btn-category-item w-100">Accessibility</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Festival History -->
        <section id="festhistory" class="container page-section">
            <!-- Título fuera del recuadro -->
            <div class="container text-center my-4 mt-md-5 pt-md-4">
                <h2>FESTIVAL HISTORY</h2>
            </div>

            <!-- Recuadro con contenido -->
            <div class="container box-area">
                <div class=" row mb-4 d-flex justify-content-center align-items-center">
                    <!-- Columna Historia Festival-->
                    <div class="col-lg-4 d-flex justify-content-center align-items-center px-3">
                        <div class="row d-flex">
                            <p class="mb-5">
                                Este festival nace de la pasión de 4 amigos amantes de la música.
                                Lo que pareció ser una pequeña reunión de artistas poco conocidos, dio paso uno de los
                                festivales más legendarios
                                de todo el multiverso Marvel.
                            </p>
                            <p class="mb-5">
                                Realizada en la gran Urbe de Lucena, famosamente conocida por tirar cohetes por
                                cualquier cosa.
                                Este festival se realizó desde su primera edición en “Prudencio Uzar Town Square”,
                                situado en uno de los barrios
                                con más historia musical de la ciudad. Tanto que utilizaban cualquier recipiente para
                                poder hacer acompañamientos y
                                la zona pasó a llamarse “El Barrio La Lata”.
                            </p>
                            <!--CF2: Los elementos <br> están prohibidísimos, ocultan un estilo de padding o margin-->
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
                    <!-- Columna Mapa Localización y Foto Festival -->
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
        <section id="ticketsinfo" class="container page-section">
            <!-- Título fuera del recuadro -->
            <div class="container text-center my-4 mt-md-5 pt-md-4">
                <h2>TICKETS INFO</h2>
            </div>

            <!-- Recuadro con contenido -->
            <div class="container box-area-fondo">
                <div class=" row d-flex justify-content-center align-items-center pt-4 px-3">
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
                <!--CF2: row sin col?-->
                <div class="row bgroundTicketInfo d-flex justify-content-center align-items-center">
                    <a href="./tickets.php" class="btn buttonInfo">Haz click aquí</a>
                </div>
            </div>
        </section>

        <!-- CAMPING/PARKING -->
        <section id="campinginfo" class="container page-section">
            <!-- Título fuera del recuadro -->
            <div class="container text-center my-4 mt-md-5 pt-md-4">
                <h2>CAMPING/PARKING</h2>
            </div>

            <!-- Recuadro con contenido -->
            <div class="container box-area-fondo">
                <div class=" row d-flex justify-content-center align-items-center pt-4 px-3">
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
                <div class="row bgroundCampingInfo d-flex justify-content-center align-items-center">
                    <a href="./parking_camping.php" class="btn buttonInfo">Haz click aquí</a>
                </div>
            </div>
        </section>

        <!-- ACCESSIBILITY -->
        <section id="festaccess" class="container page-section">
            <!-- Título fuera del recuadro -->
            <div class="container text-center my-4 mt-md-5 pt-md-4">
                <h2>ACCESSIBILITY</h2>
            </div>

            <!-- Recuadro con contenido -->
            <div class="container box-area">
                <div class=" row pt-3">
                    <p class="mb-5">
                        Our festivals are committed to making the events accessible to everyone.
                        The festival is held outdoors. There are sometimes great distances between parking lots,
                        camping, and stages.
                    </p>
                    <p>
                        The campgrounds and festival grounds are a combination of concrete, asphalt and natural terrain.
                        There will be an elevated viewing area at the main stages for those with mobility limitations.
                        An Access Center with professionally trained staff will be set up next to the info booth at the
                        festival
                        entrance to assist at the event who can answer all questions, provide wristbands for the viewing
                        platform,
                        and additional services listed below.
                    </p>
                </div>
            </div>
        </section>

        <!-- MAP -->
        <section id="festaccess" class="container page-section">
            <!-- Título fuera del recuadro -->
            <div class="container text-center my-4 mt-md-5 pt-md-4">
                <h2>FESTIVAL MAP</h2>
            </div>
            <!-- Mapa y su Modal -->
            <?php include("includes/map.php");  ?>
            <?php include("includes/mapmodal.php");  ?>

        </section>

        <!-- Patrocinadores -->
        <?php include("includes/patrocinadores.php");  ?>
    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>