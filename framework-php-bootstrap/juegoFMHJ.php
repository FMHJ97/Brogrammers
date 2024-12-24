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
            var width = 1024;
            var height = 640;
            var height_road = 113;

            // Creamos la escena (Stage).
            var stage = new Konva.Stage({
                container: gameContainer,
                width: width,
                height: height
            });

            // Crear una capa para el botón
            var startLayer = new Konva.Layer();

            // Crear el botón de inicio (rectángulo)
            var startButton = new Konva.Rect({
                x: width / 2 - 100,
                y: height / 2 - 30,
                width: 200,
                height: 60,
                fill: 'blue',
                cornerRadius: 10,
                shadowBlur: 10,
                shadowColor: 'black',
                shadowOffset: { x: 2, y: 2 }
            });

            // Crear el texto del botón
            var startText = new Konva.Text({
                x: width / 2 - 100,
                y: height / 2 - 10,
                text: 'Iniciar Juego',
                fontSize: 28,
                fontFamily: 'Arial',
                fill: 'white',
                width: 200,
                align: 'center'
            });

            // Añadir el botón y el texto a la capa.
            startLayer.add(startButton);
            startLayer.add(startText);
            stage.add(startLayer);

            // Evento de click en el botón de inicio.
            startText.on('click', () => {
                startLayer.destroy(); // Eliminar la capa de inicio.
                startGame(); // Iniciar el juego.
            });

            // Función para iniciar el juego.
            function startGame() {
                // Creamos todas las capas del juego.
                var layer_buttons = new Konva.Layer();
                var layer_npc = new Konva.Layer();
                var layer_main = new Konva.Layer();
                var layer_road = new Konva.Layer();

                // Configuración de los NPCs.
                var npc_conf = [{
                    imgSrc: "assets/games/juegoFMHJ/npc_1.png",
                    startX: width,
                    startY: height - height_road - 133,
                    width: 120,
                    height: 133,
                    isMoving: false,
                    frameRate: 7,
                    animations: {
                        walk_right: [70, 123, 120, 133,
                            326, 123, 120, 133,
                            582, 123, 120, 133,
                            838, 123, 120, 133,
                            1094, 123, 120, 133,
                            1350, 123, 120, 133,
                            1606, 123, 120, 133,
                            1862, 123, 120, 133,
                            2118, 123, 120, 133,
                            2374, 123, 120, 133
                        ],
                        walk_left: [2370, 379, 120, 133,
                            2114, 379, 120, 133,
                            1858, 379, 120, 133,
                            1602, 379, 120, 133,
                            1346, 379, 120, 133,
                            1090, 379, 120, 133,
                            834, 379, 120, 133,
                            578, 379, 120, 133,
                            322, 379, 120, 133,
                            66, 379, 120, 133
                        ],
                        standing: [70, 635, 120, 133,
                            326, 635, 120, 133,
                            582, 635, 120, 133,
                            838, 635, 120, 133,
                            1094, 635, 120, 133,
                            1350, 635, 120, 133
                        ]
                    }
                }];

                // Creamos los NPCs.
                createNPC(npc_conf[0]);

                // Variables de los botones.
                var greenButton = null;
                var redButton = null;

                // Creamos los botones de acción.
                function createButtons(npc) {

                    // Botón verde (movimiento a la izquierda).
                    greenButton = new Konva.Rect({
                        x: main_character.x() - 80,
                        y: main_character.y(),
                        width: 50,
                        height: 50,
                        fill: 'green',
                        cornerRadius: 5
                    });

                    // Botón rojo (movimiento a la derecha).
                    redButton = new Konva.Rect({
                        x: main_character.x() - 150,
                        y: main_character.y(),
                        width: 50,
                        height: 50,
                        fill: 'red',
                        cornerRadius: 5
                    });

                    // Evento de click en el botón verde.
                    greenButton.on('click', () => {
                        // Borramos los botones.
                        greenButton.destroy();
                        redButton.destroy();
                        // Movemos al NPC a la izquierda.
                        moveNPCToPositionWithAnimation(npc, -npc.width(), npc.y(), 4, 'walk_left', () => {
                            npc.destroy();
                            createNPC(npc_conf[0]);
                        });
                    });

                    // Evento de click en el botón rojo.
                    redButton.on('click', () => {
                        // Borramos los botones.
                        greenButton.destroy();
                        redButton.destroy();
                        // Movemos al NPC a la derecha.
                        moveNPCToPositionWithAnimation(npc, width, npc.y(), 4, 'walk_right', () => {
                            npc.destroy();
                            createNPC(npc_conf[0]);
                        });
                    });

                    // Añadimos los botones a la capa de botones.
                    layer_buttons.add(greenButton, redButton);
                    stage.add(layer_buttons);
                }

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
                    // Añadimos la carretera a la capa.
                    layer_road.add(road);

                    // Añadimos la capa a la escena.
                    stage.add(layer_road);
                };

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
                        x: width / 3,
                        y: height - height_road - 135,
                        width: 58,
                        image: mc,
                        animation: 'standing',
                        animations: motions_mc,
                        frameRate: 7,
                        frameIndex: 0
                    });

                    // Añadimos el personaje a la capa.
                    layer_main.add(main_character);

                    // Añadimos la capa a la escena.
                    stage.add(layer_main);

                    // Iniciamos la animación del personaje.
                    main_character.start();

                    // Crear el primer NPC solo después de que el personaje principal esté listo.
                    createNPC(npc_conf[0]);
                };

                // Método para que un NPC se dirija hacia una posición.
                function moveNPCToPositionWithAnimation(npc, targetX, targetY, duration, animation, callback) {
                    // Cambiamos la animación.
                    npc.animation(animation);

                    // Movemos al NPC hacia la posición objetivo.
                    npc.to({
                        x: targetX,
                        y: targetY,
                        duration: duration,
                        onFinish: () => {
                            // Cambiar a la animación de estar parado cuando termine el movimiento
                            npc.animation('standing');
                            console.log("NPC ha llegado a la posición objetivo.");

                            // Ejecutamos el callback si se ha pasado.
                            if (callback) callback();
                        }
                    });
                }

                // Método para crear un NPC.
                function createNPC(config) {

                    // Solo creamos un NPC si el personaje principal está listo.
                    if (main_character) {

                        // Cargamos la imagen del NPC.
                        var npc_img = new Image();
                        npc_img.src = config.imgSrc;

                        // Creamos el NPC.
                        let npc = null;
                        npc_img.onload = () => {
                            npc = new Konva.Sprite({
                                x: config.startX,
                                y: config.startY,
                                width: config.width,
                                image: npc_img,
                                animation: 'standing',
                                animations: config.animations,
                                frameRate: config.frameRate,
                                frameIndex: 0
                            });

                            layer_npc.add(npc);
                            stage.add(layer_npc);
                            npc.start();

                            moveNPCToPositionWithAnimation(npc, main_character.x() + main_character.width(), npc.y(), 4, 'walk_left', () => {
                                createButtons(npc);
                            });
                        };
                    }

                }
            }

        });

    </script>

</body>

</html>