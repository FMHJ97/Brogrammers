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

                // Variables del juego.

                var generated_ticket = null; // Ticket generado aleatoriamente.
                var errores_ticket = []; // Guarda los errores del ticket para mostrarlos.

                /* INICIO - DATOS TICKET */

                // Datos válidos para ticket o entrada.
                const nombre_festival = "GroundSound Festival";
                const ubicacion = "Prudencio Uzar Town Square";
                const lugar_festival = "Lucena, Córdoba";
                const fecha_festival = ["2025-04-17", "2025-04-18", "2025-04-19"];
                const puerta_general = ["A", "B"];
                const puerta_vip = ["C", "D"];
                const precio_general = [25, 50, 70];
                const precio_vip = [40, 80, 110];
                const patron_codigo = /^[A-Z]{2}[0-9]{7}[A-Z]{1}$/;

                // Datos para el ticket de entrada de NPC.

                // Nombre del festival.
                const t_nombre_festival = [
                    "GroundSound Festival", "GroundSound Festival", "GroundSound Festival",
                    "GroundSound Festival", "GroundSound Festival", "GroundSound Festival",
                    "GroundSound Festival", "GroundSound Festival", "GroundSound Festival",
                    "GroundSound Festival", "GroundSound Festival", "GroundSound Festival",
                    "SoundGround Festival", "GroudSound Festival" // Incorrectos
                ];

                // Fecha del festival.
                const t_fecha_festival = [
                    "2025-04-17", "2025-04-18", "2025-04-19",
                    "2025-04-17", "2025-04-18", "2025-04-19",
                    "2025-04-17", "2025-04-18", "2025-04-19",
                    "2025-04-17", "2025-04-18", "2025-04-19",
                    "2025-04-16", "2025-05-19" // Incorrectos
                ];

                // Lugar del festival.
                const t_lugar_festival = [
                    "Lucena, Córdoba", "Lucena, Córdoba", "Lucena, Córdoba",
                    "Lucena, Córdoba", "Lucena, Córdoba", "Lucena, Córdoba", "Lucena, Córdoba",
                    "Lucena, Córdoda", "Lusena, Córdoba" // Incorrectos
                ];

                // Código del ticket.
                const t_codigo_ticket = [
                    "AB1234567Q", // Correcto
                    "XY9876543W", // Correcto
                    "AB1334567E", // Correcto
                    "XY9476543R", // Correcto
                    "AB1534567T", // Correcto
                    "XY9676543A", // Correcto
                    "AB1734567S", // Correcto
                    "XY9176543D", // Correcto
                    "NM1534567F", // Correcto
                    "MN9676543Z", // Correcto
                    "FG1734567X", // Correcto
                    "RE9176543C", // Correcto
                    "OO12345670", // Incorrecto
                    "AB123A5678A", // Incorrecto
                    "OG917GS43C", // Incorrecto
                    "A1234567C", // Incorrecto
                    "aB1234567L", // Incorrecto
                ];

                // Tipo de entrada.
                const t_tipo_entrada = ["General", "VIP"];

                // Precio Ticket.

                // Precio Ticket (VIP).
                const t_precio = [25, 50, 70, 40, 80, 110];

                // Puerta (General).
                const t_puerta = ["A", "B", "C", "D"];

                // Ubicación del festival.
                const t_ubicaciones = [
                    "Prudencio Uzar Town Square", // Correcto
                    "Prudencio Uzar Town Square", // Correcto
                    "Prudencio Uzar Town Square", // Correcto
                    "Prudencio Uzar Town Square", // Correcto
                    "Prudencio Uzar Town Square", // Correcto
                    "Prudencio Usar Town Square", // Incorrecto
                    "Prudencio Uzar Tow Square", // Incorrecto
                ];

                /* FIN - DATOS TICKET */

                // Creamos la clase Ticket.
                class Ticket {
                    constructor(codigo, tipo_entrada, nombre_festival, lugar_festival, ubicacion, fecha_festival, puerta, precio) {
                        this.codigo = codigo;
                        this.tipo_entrada = tipo_entrada;
                        this.nombre_festival = nombre_festival;
                        this.lugar_festival = lugar_festival;
                        this.ubicacion = ubicacion;
                        this.fecha_festival = fecha_festival;
                        this.puerta = puerta;
                        this.precio = precio;
                    }
                }

                // Función para generar un dato aleatorio para el ticket.
                function generarDatoAleatorio(datos) {
                    return datos[Math.floor(Math.random() * datos.length)];
                }

                // Función para generar un ticket aleatorio.
                function generarTicketAleatorio() {
                    return new Ticket(
                        generarDatoAleatorio(t_codigo_ticket),
                        generarDatoAleatorio(t_tipo_entrada),
                        generarDatoAleatorio(t_nombre_festival),
                        generarDatoAleatorio(t_lugar_festival),
                        generarDatoAleatorio(t_ubicaciones),
                        generarDatoAleatorio(t_fecha_festival),
                        generarDatoAleatorio(t_puerta),
                        generarDatoAleatorio(t_precio)
                    );
                }

                // Función para validar un ticket.
                function validarTicket(ticket) {

                    // Damos por hecho que el ticket es válido.
                    let isValid = true;

                    // Validamos el nombre del festival.
                    if (ticket.nombre_festival !== nombre_festival) {
                        isValid = false;
                        errores_ticket.push("El nombre del festival no es correcto.");
                    }

                    // Validamos la ubicación del festival.
                    if (ticket.ubicacion !== ubicacion) {
                        isValid = false;
                        errores_ticket.push("La ubicación del festival no es correcta.");
                    }

                    // Validamos el lugar del festival.
                    if (ticket.lugar_festival !== lugar_festival) {
                        isValid = false;
                        errores_ticket.push("El lugar del festival no es correcto.");
                    }

                    // Validamos la fecha del festival.
                    if (!fecha_festival.includes(ticket.fecha_festival)) {
                        isValid = false;
                        errores_ticket.push("La fecha del festival no es correcta.");
                    }

                    // Validamos el código del ticket.
                    if (!patron_codigo.test(ticket.codigo)) {
                        isValid = false;
                        errores_ticket.push("El código del ticket no es correcto.");
                    }

                    // Comprobamos el tipo de entrada.
                    if (ticket.tipo_entrada === "General") {
                        // Validamos la puerta.
                        if (!puerta_general.includes(ticket.puerta)) {
                            isValid = false;
                            errores_ticket.push("La puerta no es correcta.");
                        }

                        // Validamos el precio.
                        if (!precio_general.includes(ticket.precio)) {
                            isValid = false;
                            errores_ticket.push("El precio no es correcto.");
                        }
                    } else if (ticket.tipo_entrada === "VIP") {
                        // Validamos la puerta.
                        if (!puerta_vip.includes(ticket.puerta)) {
                            isValid = false;
                            errores_ticket.push("La puerta no es correcta.");
                        }

                        // Validamos el precio.
                        if (!precio_vip.includes(ticket.precio)) {
                            isValid = false;
                            errores_ticket.push("El precio no es correcto.");
                        }
                    }

                    return isValid;
                }

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
                            // Borramos el NPC.
                            npc.destroy();

                            // Validamos el ticket.
                            if (validarTicket(generated_ticket)) {
                                // Mostramos un mensaje en la consola.
                                console.log("El ticket es válido.");

                                // Limpiamos las variables de errores y ticket.
                                errores_ticket = [];
                                generated_ticket = null;

                                // Creamos un nuevo NPC.
                                createNPC(npc_conf[0]);
                            } else {
                                // Mostramos un mensaje en la consola.
                                console.log("El ticket no es válido.");

                                // Mostramos los errores en la consola.
                                console.log(errores_ticket);
                            }
                        });
                    });

                    // Evento de click en el botón rojo.
                    redButton.on('click', () => {
                        // Borramos los botones.
                        greenButton.destroy();
                        redButton.destroy();
                        // Movemos al NPC a la derecha.
                        moveNPCToPositionWithAnimation(npc, width, npc.y(), 4, 'walk_right', () => {
                            // Borramos el NPC.
                            npc.destroy();

                            // Validamos el ticket.
                            if (!validarTicket(generated_ticket)) {
                                // Mostramos un mensaje en la consola.
                                console.log("El ticket NO es válido.");

                                // Limpiamos las variables de errores y ticket.
                                errores_ticket = [];
                                generated_ticket = null;

                                // Creamos un nuevo NPC.
                                createNPC(npc_conf[0]);
                            } else {
                                // Mostramos un mensaje en la consola.
                                console.log("El ticket ES válido.");

                                // Mostramos los errores en la consola.
                                console.log(errores_ticket);
                            }
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

                            // Añadimos el NPC a la capa.
                            layer_npc.add(npc);
                            // Añadimos la capa a la escena.
                            stage.add(layer_npc);
                            // Iniciamos la animación del NPC.
                            npc.start();

                            // Movemos al NPC hacia la izquierda.
                            moveNPCToPositionWithAnimation(npc, main_character.x() + main_character.width(), npc.y(), 4, 'walk_left', () => {

                                // Creamos los botones de acción.
                                createButtons(npc);

                                // Generamos un ticket aleatorio.
                                generated_ticket = generarTicketAleatorio();

                                // Mostramos el ticket en la consola.
                                console.log(generated_ticket);
                            });
                        };
                    }

                }
            }

        });

    </script>

</body>

</html>