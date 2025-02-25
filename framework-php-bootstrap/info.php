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
                        <a href="./info.php#festhistory" type="button" id="buttonhistory" aria-label="Ir a Historia del Festival"
                            class="btn btn-category-item selected w-100">Historia</a>
                    </div>
                    <!-- Botón Filtrar por: Tickets Info -->
                    <div class="col-md-3 col-6 mb-2 px-2">
                        <a href="./info.php#ticketsinfo" type="button" id="buttontickets" aria-label="Ir a Tickets Info"
                            class="btn btn-category-item w-100">Tickets Info</a>
                    </div>
                    <!-- Botón Filtrar por: Camping -->
                    <div class="col-md-3 col-6 mb-2 px-2">
                        <a href="./info.php#campinginfo" type="button" id="buttoncamping" aria-label="Ir a Camping"
                            class="btn btn-category-item w-100">Camping</a>
                    </div>
                    <!-- Botón Filtrar por: Accesibilidad -->
                    <div class="col-md-3 col-6 mb-2 px-2">
                        <a href="./info.php#festaccess" type="button" id="buttonaccessibility" aria-label="Ir a Accesibilidad"
                            class="btn btn-category-item w-100">Accesibilidad</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Festival History -->
        <section id="festhistory" class="container page-section">
            <!-- Título fuera del recuadro -->
            <div class="container text-center my-4 mt-md-5 pt-md-4">
                <h2>HISTORIA DEL FESTIVAL</h2>
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
                                A partir de ese momento comienza la leyenda...
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
                            <h3 class="my-0">Localización</h3>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1884.310581447972!2d-4.4966540999422735!3d37.41300154474919!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6d71d07e333ccb%3A0xb8eac06a2792e13!2sParque%20Infantil%20Plaza%20Prudencio%20Uzar4!5e0!3m2!1ses!2ses!4v1734435108208!5m2!1ses!2ses"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade" class="py-4"></iframe>
                        </div>
                        <div class="row">
                            <img src="./assets/img/info/HISTORIAFESTIVAL.JPG" alt="Foto con luces en un festival" class="imgHistory pw-90 h-90">
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
                    <p>Ground Sound es un evento para todas las edades; los asistentes de cualquier edad requieren un
                        pase para ingresar.</p>
                    <p>Todas las ventas de pases son finales, no hay reembolsos ni cambios.</p>

                    <p>Todos los niveles de precios están disponibles en cantidades limitadas. Compra temprano para
                        ahorrar más dinero.
                        Una vez que se agote un lote, los pases estarán disponibles al siguiente nivel de precio.
                        No hay diferencia en el acceso entre los niveles.</p>

                    <p>Tu pase vendrá en forma de una pulsera RFID para el festival.</p>
                    <p>La entrada al festival, el camping y el estacionamiento se venden por separado.</p>

                    <p>Recomendamos comprar directamente a través de nuestra página de ENTRADAS; no somos responsables
                        por compras realizadas en sitios no oficiales o secundarios.</p>

                    <p>La reventa de pases a un precio más alto está prohibida y, si se descubre,
                        el pase será anulado sin derecho a reembolso.</p>

                    <p>Los pases no pueden utilizarse con fines publicitarios, promocionales
                        (incluidos concursos y sorteos) u otros fines comerciales sin el consentimiento
                        expreso por escrito del festival.</p>
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
                    <p>Ground Sound es un evento para todas las edades; los asistentes de cualquier edad requieren un
                        pase para ingresar.</p>
                    <p>Todas las ventas de pases son finales, no hay reembolsos ni cambios.</p>

                    <p>Todos los niveles de precios están disponibles en cantidades limitadas. Compra temprano para
                        ahorrar más dinero.
                        Una vez que se agote un lote, los pases estarán disponibles al siguiente nivel de precio.
                        No hay diferencia en el acceso entre los niveles.</p>

                    <p>Tu pase vendrá en forma de una pulsera RFID para el festival.</p>
                    <p>La entrada al festival, el camping y el estacionamiento se venden por separado.</p>

                    <p>Recomendamos comprar directamente a través de nuestra página de ENTRADAS; no somos responsables
                        por compras realizadas en sitios no oficiales o secundarios.</p>

                    <p>La reventa de pases a un precio más alto está prohibida y, si se descubre,
                        el pase será anulado sin derecho a reembolso.</p>

                    <p>Los pases no pueden utilizarse con fines publicitarios, promocionales
                        (incluidos concursos y sorteos) u otros fines comerciales sin el consentimiento
                        expreso por escrito del festival.</p>
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
                        Nuestros festivales están comprometidos a hacer que los eventos sean accesibles para todos.
                        El festival se lleva a cabo al aire libre. A veces hay grandes distancias entre los
                        estacionamientos,
                        las áreas de camping y los escenarios.
                    </p>
                    <p>
                        Los campamentos y las áreas del festival son una combinación de concreto, asfalto y terreno
                        natural.
                        Habrá una zona de observación elevada en los escenarios principales para personas con
                        limitaciones de movilidad.
                        Un Centro de Acceso con personal profesionalmente capacitado estará ubicado junto al puesto de
                        información
                        en la entrada del festival para brindar asistencia durante el evento, responder todas las
                        preguntas,
                        proporcionar pulseras para la plataforma de observación y servicios adicionales enumerados a
                        continuación.
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
            <?php include("includes/map.php"); ?>
            <?php include("includes/mapmodal.php"); ?>

        </section>

        <!-- Patrocinadores -->
        <?php include("includes/patrocinadores.php"); ?>
    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>