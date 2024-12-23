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

            // Configuración del NPC 1.
            var npc_1_conf = {
                imgSrc: "assets/games/juegoFMHJ/npc_1.png",
                frameRate: 7,
                animations: {
                    walk_right: [81, 123, 84, 133,
                        336, 123, 84, 133,
                        592, 123, 84, 133,
                        848, 123, 84, 133,
                        1104, 123, 84, 133,
                        1360, 123, 84, 133,
                        1616, 123, 84, 133,
                        1872, 123, 84, 133,
                        2128, 123, 84, 133,
                        2384, 123, 84, 133
                    ],
                    walk_left: [2480, 379, -84, 133,
                        2224, 379, -84, 133,
                        1968, 379, -84, 133,
                        1712, 379, -84, 133,
                        1456, 379, -84, 133,
                        1200, 379, -84, 133,
                        944, 379, -84, 133,
                        688, 379, -84, 133,
                        432, 379, -84, 133,
                        176, 379, -84, 133
                    ],
                    standing: [100, 635, 70, 133,
                        356, 635, 70, 133,
                        612, 635, 70, 133,
                        868, 635, 70, 133,
                        1124, 635, 70, 133,
                        1380, 635, 70, 133
                    ]
                }
            };

            // Creamos la capa para el NPC.
            var layerNPC = new Konva.Layer();
            stage.add(layerNPC);

            // Método para crear un NPC con su sprite y configurarlo.
            function createNPC(config) {
                var npcImage = new Image();
                npcImage.src = config.imgSrc;

                npcImage.onload = function () {
                    var npcSprite = new Konva.Sprite({
                        x: (width / 3) * 2 - 35, // Posición inicial (puedes ajustar según tu diseño).
                        y: height - height_road - 133, // Posición inicial (puedes ajustar según tu diseño).
                        image: npcImage,
                        animation: 'standing',
                        animations: config.animations,
                        frameRate: config.frameRate,
                        frameIndex: 0
                    });

                    layerNPC.add(npcSprite);

                    npcSprite.start();
                };
            }

            createNPC(npc_1_conf);

        });

    </script>

</body>

</html>