<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>
    <script src="node_modules/konva/konva.min.js"></script>
    <style>
        #gameContainer {
            width: 1024px;
            height: 640px;
            background-color: whitesmoke;
        }
    </style>
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

        <!-- Sección de Instrucciones del Juego -->
        <section class="container page-section">
            <div class="row">
                <div class="col-12">
                    <h3>Instrucciones del Juego</h3>
                    <p>El juego consiste en...</p>
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

    </main>

    <script>
        // Se ejecuta cuando el documento esté completamente cargado.
        document.addEventListener('DOMContentLoaded', () => {
            // Obtenemos el contenedor del juego.
            var gameContainer = document.getElementById('gameContainer');

            // Variables de configuración del juego.
            const width = 1024;
            const height = 640;
            const height_road = 113;

            // Creamos la escena (Stage).
            var stage = new Konva.Stage({
                container: gameContainer,
                width: width,
                height: height
            });

            // Creamos una capa para el fondo.
            var layer_road = new Konva.Layer();

            // Creamos la imagen de la carretera.
            var road_img = new Image();
            road_img.src = "assets/games/juegoFMHJ/fondo_road.png";

            // Añadimos el fondo a la capa.
            var road = null;
            // Cargamos la imagen del fondo.
            // Cuando la imagen se haya cargado, creamos el fondo.
            road_img.onload = function () {
                road = new Konva.Image({
                    x: 0,
                    y: height - 576,
                    image: road_img
                });
                layer_road.add(road);
                stage.add(layer_road);
            };

            // Creamos la capa para el personaje.
            var layer_mc = new Konva.Layer();

            // Creamos el personaje.
            var mc = new Image();
            mc.src = "assets/games/juegoFMHJ/idle.png";

            // Animación del personaje.
            var motions_mc = {
                standing: [93, 121, 58, 135,
                    349, 121, 58, 135,
                    605, 121, 58, 135,
                    861, 121, 58, 135,
                    1117, 121, 58, 135,
                    1373, 121, 58, 135
                ]
            };

            // Creamos el sprite del personaje.
            var main_character = null;
            // Cargamos la imagen del personaje.
            // Cuando la imagen se haya cargado, creamos el sprite del personaje.
            mc.onload = function () {
                main_character = new Konva.Sprite({
                    x: width / 3 - 29, /* Siendo 29 la mitad del ancho del personaje. */
                    y: height - height_road - 135,
                    image: mc,
                    animation: 'standing',
                    animations: motions_mc,
                    frameRate: 7,
                    frameIndex: 0
                });

                // Añadimos el personaje a la capa.
                layer_mc.add(main_character);
                // Añadimos la capa a la escena.
                stage.add(layer_mc);

                // Iniciamos la animación del personaje.
                main_character.start();
            };

            // Creamos la capa para los NPCs.
            var layer_npc = new Konva.Layer();
            stage.add(layer_npc);

            // Función para crear NPCs.
            // startX: Posición X inicial.
            // npcCount: Número de NPCs a crear.
            // npcConfig: Configuración de los NPCs.
            function createNPC(startX, npcCount, npcConfig) {

                // Posición X actual.
                let currentX = startX;

                // Creamos los NPCs.
                for (let i = 0; i < npcCount; i++) {
                    let img = new Image();
                    img.src = npcConfig.imageSrc;

                    img.onload = (function (xPos) {
                        return function () {
                            var npc = new Konva.Sprite({
                                x: xPos,
                                y: height - height_road - npcConfig.height,
                                image: img,
                                animation: 'standing',
                                animations: npcConfig.animations,
                                frameRate: npcConfig.frameRate,
                                frameIndex: 0
                            });

                            layer_npc.add(npc);
                            npc.start();
                            layer_npc.draw();
                        };
                    })(currentX);

                    currentX += npcConfig.width + 5; // Separación de 5px
                }
            }

            // Configuración de los NPCs.
            var npcConfig = {
                imageSrc: "assets/games/juegoFMHJ/npc_1_idle.png",
                width: 66, // Ancho del sprite
                height: 133, // Altura del sprite
                frameRate: 7, // Velocidad de animación
                animations: {
                    standing: [102, 123, 66, 133,
                        358, 123, 66, 133,
                        614, 123, 66, 133,
                        870, 123, 66, 133,
                        1126, 123, 66, 133,
                        1382, 123, 66, 133
                    ]
                }
            };

            // Llamamos a la función para crear NPCs.
            createNPC((width / 3) * 2 - 33, 6, npcConfig);
            
        });

    </script>

</body>

</html>