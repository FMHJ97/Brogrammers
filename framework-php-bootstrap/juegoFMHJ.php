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
            };

            // Creamos la capa para el NPC.
            var layerNPC = new Konva.Layer();
            stage.add(layerNPC);

            // Función para calcular la distancia entre dos sprites.
            function calculateDistance(sprite1, sprite2) {
                return Math.abs(sprite1.x() - sprite2.x());
            }

            // Función para mover el NPC hacia el personaje principal.
            function moveNPCToMainCharacter(npcSprite, mainCharacter, config, onComplete) {
                // Cambiamos la animación del NPC a 'walk_left'.
                npcSprite.animation('walk_left');

                // Velocidad de movimiento del NPC (ajustable).
                const speed = 2;

                // Función de movimiento.
                const anim = new Konva.Animation((frame) => {
                    const distance = calculateDistance(npcSprite, mainCharacter);

                    // Si la distancia es mayor que el límite, el NPC se mueve hacia el personaje principal.
                    if (distance > 50) {
                        npcSprite.x(npcSprite.x() - speed);
                    } else {
                        // Cuando el NPC alcanza al personaje principal, detiene la animación.
                        anim.stop();

                        // Cambiamos la animación del NPC a 'standing'.
                        npcSprite.animation('standing');

                        // Ejecutamos el callback al completar el movimiento.
                        if (onComplete) onComplete();
                    }
                }, npcSprite.getLayer());

                // Iniciamos la animación.
                anim.start();
            }

            // Función principal para manejar el NPC más cercano.
            function handleClosestNPC(mainCharacter, npcs) {
                let closestNPC = null;
                let minDistance = Infinity;

                // Encontramos el NPC más cercano.
                npcs.forEach(npc => {
                    const distance = calculateDistance(npc, mainCharacter);
                    if (distance < minDistance) {
                        minDistance = distance;
                        closestNPC = npc;
                    }
                });

                // Si hay un NPC cercano, lo movemos hacia el personaje principal.
                if (closestNPC && !closestNPC.isMoving) {
                    // Indicamos que el NPC está en movimiento.
                    closestNPC.isMoving = true;
                    // Movemos el NPC hacia el personaje principal.
                    moveNPCToMainCharacter(closestNPC, mainCharacter, npc_1_conf, () => {
                        console.log('El NPC ha llegado al personaje principal.');
                    });
                }
            }

            // Array para almacenar todos los NPCs creados.
            const npcs = [];

            // Modificamos la función createNPC para añadir los NPCs al array.
            function createNPC(config) {
                var npcImage = new Image();
                npcImage.src = config.imgSrc;

                npcImage.onload = function () {
                    var npcSprite = new Konva.Sprite({
                        x: (width / 3) * 2 - (config.width / 2), // Posición inicial (ajustable según diseño).
                        y: height - height_road - (config.height), // Posición inicial (ajustable según diseño).
                        image: npcImage,
                        animation: 'standing',
                        animations: config.animations,
                        frameRate: config.frameRate,
                        frameIndex: 0
                    });

                    layerNPC.add(npcSprite);

                    // Iniciamos la animación del NPC.
                    npcSprite.start();

                    // Añadimos el NPC al array.
                    npcs.push(npcSprite);
                };
            }

            // Función para mover el NPC hacia la derecha y eliminarlo al salir del stage.
            function moveNPCAway(npcs, mainCharacter, stageWidth) {
                let closestNPC = null;
                let minDistance = Infinity;

                // Encontramos el NPC más cercano.
                npcs.forEach(npc => {
                    const distance = calculateDistance(npc, mainCharacter);
                    if (distance < minDistance) {
                        minDistance = distance;
                        closestNPC = npc;
                    }
                });

                // Comprobamos que el NPC más cercano está al lado del personaje principal.
                if (closestNPC && minDistance <= 50) {
                    // Cambiamos la animación del NPC a 'walk_right'.
                    closestNPC.animation('walk_right');

                    // Velocidad de movimiento del NPC (ajustable).
                    const speed = 2;

                    // Función de movimiento.
                    const anim = new Konva.Animation((frame) => {
                        // Movemos el NPC hacia la derecha.
                        closestNPC.x(closestNPC.x() + speed);

                        // Comprobamos si el NPC ha salido del stage.
                        if (closestNPC.x() > stageWidth) {
                            // Detenemos la animación.
                            anim.stop();

                            // Eliminamos el NPC de su capa.
                            closestNPC.getLayer().remove(closestNPC);

                            // Eliminamos el NPC del array.
                            const index = npcs.indexOf(closestNPC);
                            if (index !== -1) {
                                npcs.splice(index, 1);
                            }

                            console.log('NPC eliminado.');
                        }
                    }, closestNPC.getLayer());

                    // Iniciamos la animación.
                    anim.start();
                } else {
                    console.log('El NPC más cercano no está al lado del personaje principal.');
                }
            }

            // Llamada al método para manejar el NPC más cercano.
            document.addEventListener('keydown', (event) => {
                if (event.key === 'n') { // Puedes cambiar esta tecla por cualquier otra.
                    handleClosestNPC(main_character, npcs);
                }
                if (event.key === 'm') { // Puedes cambiar esta tecla por cualquier otra.
                    moveNPCAway(npcs, main_character, width);
                }
            });

            // Creamos los NPCs.
            createNPC(npc_1_conf);

        });

    </script>

</body>

</html>