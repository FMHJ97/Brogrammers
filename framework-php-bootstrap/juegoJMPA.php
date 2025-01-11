<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>
</head>

<body>

<body>
    <main>
        <!-- Sección de Cabecera -->
        <section class="container page-section">
            <div class="row page-section-heading text-center">
                <h1>GroundSound Festival Games</h1>
                <h2>Videojuego Tetris</h2>
            </div>
        </section>

        <!-- Sección de Juego -->
        <section class="container page-section">
            <div class="row">
                <!-- Contenedor del juego -->
                <div class="col-8 d-flex justify-content-center">
                    <div id="gameContainerTetris"></div>
                </div>

                <!-- Marcador y Leaderboard -->
                <div class="col-4">
                    <div id="scoreContainer">
                        <h3>Puntuación</h3>
                        <div id="score">Puntuación: 0</div>
                    </div>
                    <div id="leaderboard"></div>
                    <button id="resetButton" class="button-ticket mt-3" onclick="resetGame()">Reiniciar Juego</button>
                </div>
            </div>
        </section>

        <!-- Sección de Instrucciones del Juego -->
        <section class="container page-section">
            <div class="row">
                <div class="col-12">
                    <h3>Cómo Jugar</h3>
                    <ol>
                        <li>Usa las flechas para mover y rotar las piezas:</li>
                        <ul>
                            <li><span class="highlight">Flecha Izquierda:</span> Mover a la izquierda.</li>
                            <li><span class="highlight">Flecha Derecha:</span> Mover a la derecha.</li>
                            <li><span class="highlight">Flecha Abajo:</span> Acelerar la caída.</li>
                            <li><span class="highlight">Flecha Arriba:</span> Rotar la pieza.</li>
                        </ul>
                        <li>Completa filas para ganar puntos.</li>
                        <li>Evita que las piezas lleguen a la parte superior del tablero.</li>
                    </ol>
                </div>
            </div>
        </section>
    </main>

    <!-- Script del Juego -->
    <script src="js/juegoJMPA.js"></script>

</body>

</html>

