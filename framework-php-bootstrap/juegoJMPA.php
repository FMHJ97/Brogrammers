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
            <div class="row page-section-heading text-center">
                <h1>GroundSound Festival Games</h1>
                <h2>Videojuego Tetris</h2>
            </div>
        </section>

        <!-- Sección de Juego -->
        <section class="container page-section">
            <div class="row">
                <div class="col-3 ">
                    <div id="scoreContainer">
                        <h3>Puntuación</h3>
                        <div id="score">Puntuación: 0</div>
                    </div>

                    <div id="nextPieceContainer">
                        <h3 class="mt-3">Siguiente Pieza</h3>
                        <div id="nextPiece" class="next-piece mt-3"></div> <!-- Aquí se mostrará la siguiente pieza -->
                    </div>

                    <div id="savedPieceContainer">
                        <h3 class="mt-3">Pieza Guardada</h3>
                        <div id="savedPiece" class="mt-3 d-flex justify-content-center"></div>
                        <!-- Aquí se mostrará la pieza guardada -->
                    </div>

                </div>

                <!-- Contenedor del juego -->
                <div class="col-6 d-flex justify-content-center">
                    <div id="gameContainerTetris"></div>
                    <div id="gameOverMessage">
                        <p id="gameOverText"></p>
                    </div>
                    <div id="startButtonContainer">
                        <button id="startButton" class="button-ticket">Iniciar Juego</button>
                    </div>
                </div>


                <!-- Marcador y Leaderboard -->
                <div class="col-3">
                    <h3>Leaderboard</h3>
                    <div id="leaderboard" class="mb-3"></div>
                    <button id="resetButton" class="button-ticket mt-3" onclick="restartGame()">Reiniciar Juego</button>
                    <button id="pauseButton" class="button-ticket mt-3" onclick="pauseGame()">Pausar Juego</button>
                    <!-- Botón de pausa -->
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
                        <li>Completa filas para ganar puntos. (Cada fila completada sumará 100 puntos).</li>
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