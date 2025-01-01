<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>
</head>

<body>

    <main>
        <!-- Sección de Cabecera -->
        <section class="container page-section">
            <div class="row page-section-heading">
                <h1>GroundSound Festival Games</h1>
                <h2>Videojuego de FMHJ</h2>
            </div>
        </section>

        <!-- Sección de Introducción -->
        <section class="container page-section">
            <div class="row">
                <div class="col-12">
                    <h3>Objetivo del Juego</h3>
                    <p>Eres el encargado de controlar el acceso al festival más esperado del año. Tu tarea es revisar
                        los tickets de los NPCs (personajes no jugables) y decidir si son válidos o no. ¡Pon a prueba
                        tus habilidades de observación y asegúrate de que todo esté en orden para que los verdaderos
                        fans puedan disfrutar del evento!
                    </p>
                </div>
            </div>
        </section>

        <!-- Sección de Juego -->
        <section class="container page-section">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <div id="gameContainer"></div>
                </div>
            </div>
        </section>

        <!-- Sección de Instrucciones del Juego -->
        <section class="container page-section">
            <div class="row">
                <div class="col-12">
                    <h3>Cómo Jugar</h3>
                    <ol>
                        <li>Cada NPC presentará un ticket con diferentes datos.</li>
                        <li>Debes revisar el ticket y decidir si es válido o no.</li>
                        <li>Aspectos a revisar:
                            <ul>
                                <li><strong>Nombre del festival:</strong> Debe coincidir con <span
                                        class="highlight">GroundSound Festival 2025</span>.</li>
                                <li><strong>Ubicación:</strong> Debe ser <span class="highlight">Prudencio Uzar
                                        Town Square</span>.</li>
                                <li><strong>Lugar del festival:</strong> Debe ser <span class="highlight">Lucena,
                                        Córdoba</span>.</li>
                                <li><strong>Fecha del festival:</strong> Solo son válidas las fechas del <span
                                class="highlight">17, 18 y 19 de Abril de 2025</span>.</li>
                                <li><strong>Código del ticket:</strong> Debe seguir el patrón <span class="highlight">2 letras + 7 números + 1
                                    letra</span>.</li>
                                <li><strong>Tipo de ticket:</strong> Puede ser <span
                                class="highlight">General</span> (Ticket negro) o <span
                                class="highlight">VIP</span> (Ticket verde).</li>
                                <li><strong>Puerta entrada:</strong>
                                    <ul>
                                        <li><u>General</u>: Debe tener asignada una de las <span
                                        class="highlight">puertas A</span> o <span
                                                class="highlight">D</span>.</li>
                                        <li><u>VIP</u>: Debe tener asignada una de las <span
                                        class="highlight">puertas B</span> o <span
                                        class="highlight">C</span>.</li>
                                    </ul>
                                </li>
                                <li><strong>Precio del Ticket:</strong>
                                    <ul>
                                        <li><u>General</u>: El precio debe ser <span class="highlight">25€</span>
                                            o <span class="highlight">40€</span>.</li>
                                        <li><u>VIP</u>: El precio debe ser <span class="highlight">50€</span> o
                                            <span class="highlight">70€</span>.
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ol>
                </div>
                <div class="col-12">
                    <h3>Condiciones de Derrota</h3>
                    <ul>
                        <li>Si un ticket es inválido y lo aceptas, <span class="highlight_2">perderás</span>.</li>
                        <li>Si un ticket es válido y lo rechazas, <span class="highlight_2">perderás</span>.</li>
                        <li>No tomar una decisión antes de que se acabe el tiempo asignado.</li>
                    </ul>
                </div>
            </div>
        </section>

    </main>

    <!-- Script del Juego -->
    <script src="js/gameFMHJ.js"></script>

</body>

</html>