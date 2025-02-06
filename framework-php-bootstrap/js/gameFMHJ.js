// Se ejecuta cuando el documento esté completamente cargado.
document.addEventListener('DOMContentLoaded', () => {

    // Obtenemos el contenedor del juego.
    var gameContainer = document.getElementById('gameContainer');

    // Variables de configuración del juego.
    var width = 1024;
    var height = 640;
    var altura_personajes = 40;

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
        fill: '#29F2B9',
        cornerRadius: 10,
        shadowBlur: 10,
        shadowColor: '#0A0F0F',
        shadowOffset: { x: 2, y: 2 }
    });

    // Crear el texto del botón
    var startText = new Konva.Text({
        x: width / 2 - 100,
        y: height / 2 - 10,
        text: 'Iniciar Juego',
        fontSize: 28,
        fontFamily: 'Arial',
        fontStyle: 'bold',
        fill: '0A0F0F',
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
        const nombre_festival = "GroundSound Festival 2025";
        const ubicacion = "Prudencio Uzar Town Square";
        const lugar_festival = "Lucena, Córdoba";
        const fecha_festival = ["17, Abril 2025", "18, Abril 2025", "19, Abril 2025"];
        const puerta_general = ["A", "D"];
        const puerta_vip = ["B", "C"];
        const precio_general = [25, 40];
        const precio_vip = [50, 70];
        const patron_codigo = /^[A-Z]{2}[0-9]{7}[A-Z]{1}$/;

        // Datos para el ticket de entrada de NPC.

        // Nombre del festival.
        const t_nombre_festival = [
            "GroundSound Festival 2025", "GroundSound Festival 2025",
            "GroundSound Festival 2025", "GroundSound Festival 2025",
            "GroundSound Festival 2025", "GroundSound Festival 2025",
            "SoundGround Festival 2025", "GroudSound Festival 2025" // Incorrectos
        ];

        // Fecha del festival.
        const t_fecha_festival = [
            "17, Abril 2025", "18, Abril 2025", "19, Abril 2025",
            "17, Abril 2025", "18, Abril 2025", "19, Abril 2025",
            "17, Abril 202S" // Incorrectos
        ];

        // Lugar del festival.
        const t_lugar_festival = [
            "Lucena, Córdoba", "Lucena, Córdoba",
            "Lucena, Córdoba", "Lucena, Córdoba",
            "Lucena, Córdoba", "Lucena, Córdoba",
            "Lucena, Córdoda" // Incorrectos
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
            "OG917GS43C", // Incorrecto
            "A1234567C" // Incorrecto
        ];

        // Tipo de entrada.
        const t_tipo_entrada = ["General", "VIP"];

        // Precio Ticket (General).
        const t_precio_general = [25, 40, 25, 40, 30];

        // Precio Ticket (VIP).
        const t_precio_vip = [50, 70, 50, 70, 40];

        // Puerta (General).
        const t_puerta_general = ["A", "D", "A", "D", "B"];

        // Puerta (VIP).
        const t_puerta_vip = ["B", "C", "B", "C", "A"];

        // Ubicación del festival.
        const t_ubicaciones = [
            "Prudencio Uzar Town Square", // Correcto
            "Prudencio Uzar Town Square", // Correcto
            "Prudencio Uzar Town Square", // Correcto
            "Prudencio Uzar Town Square", // Correcto
            "Prudencio Usar Town Square" // Incorrecto
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
            let codigo = generarDatoAleatorio(t_codigo_ticket);
            let nombre_festival = generarDatoAleatorio(t_nombre_festival);
            let fecha_festival = generarDatoAleatorio(t_fecha_festival);
            let lugar_festival = generarDatoAleatorio(t_lugar_festival);
            let ubicacion = generarDatoAleatorio(t_ubicaciones);

            // Generamos un tipo de entrada aleatorio.
            let tipo_entrada = generarDatoAleatorio(t_tipo_entrada);

            // Generamos la puerta y el precio según el tipo de entrada.
            let puerta = "";
            let precio = 0;

            if (tipo_entrada === "General") {
                puerta = generarDatoAleatorio(t_puerta_general);
                precio = generarDatoAleatorio(t_precio_general);
            } else if (tipo_entrada === "VIP") {
                puerta = generarDatoAleatorio(t_puerta_vip);
                precio = generarDatoAleatorio(t_precio_vip);
            }

            // Creamos el ticket.
            return new Ticket(codigo, tipo_entrada, nombre_festival, lugar_festival, ubicacion, fecha_festival, puerta, precio);

        }

        // Función para validar un ticket.
        function validarTicket(ticket) {

            // Damos por hecho que el ticket es válido.
            let isValid = true;

            // Validamos el nombre del festival.
            if (ticket.nombre_festival !== nombre_festival) {
                isValid = false;
                errores_ticket.push(`El nombre del festival no es correcto (${ticket.nombre_festival}).`);
            }

            // Validamos la ubicación del festival.
            if (ticket.ubicacion !== ubicacion) {
                isValid = false;
                errores_ticket.push(`El nombre de la ubicación no es correcto (${ticket.ubicacion}).`);
            }

            // Validamos el lugar del festival.
            if (ticket.lugar_festival !== lugar_festival) {
                isValid = false;
                errores_ticket.push(`El lugar del festival no es correcto (${ticket.lugar_festival}).`);
            }

            // Validamos la fecha del festival.
            if (!fecha_festival.includes(ticket.fecha_festival)) {
                isValid = false;
                errores_ticket.push(`La fecha del festival no es correcta (${ticket.fecha_festival}).`);
            }

            // Validamos el código del ticket.
            if (!patron_codigo.test(ticket.codigo)) {
                isValid = false;
                errores_ticket.push(`El código del ticket NO CUMPLE el patrón (${ticket.codigo}).`);
            }

            // Comprobamos el tipo de entrada.
            if (ticket.tipo_entrada === "General") {
                // Validamos la puerta.
                if (!puerta_general.includes(ticket.puerta)) {
                    isValid = false;
                    errores_ticket.push(`Para los tickets generales, la Puerta ${ticket.puerta} NO es correcta.`);
                }

                // Validamos el precio.
                if (!precio_general.includes(ticket.precio)) {
                    isValid = false;
                    errores_ticket.push(`Para los tickets generales, el precio ${ticket.precio}€ NO es correcto.`);
                }
            } else if (ticket.tipo_entrada === "VIP") {
                // Validamos la puerta.
                if (!puerta_vip.includes(ticket.puerta)) {
                    isValid = false;
                    errores_ticket.push(`Para los tickets VIP, la Puerta ${ticket.puerta} NO es correcta.`);
                }

                // Validamos el precio.
                if (!precio_vip.includes(ticket.precio)) {
                    isValid = false;
                    errores_ticket.push(`Para los tickets VIP, el precio ${ticket.precio}€ NO es correcto.`);
                }
            }

            return isValid;
        }

        // Creamos todas las capas del juego.
        var layer_action = new Konva.Layer();
        var layer_npc = new Konva.Layer();
        var layer_background = new Konva.Layer();
        var layer_signal = new Konva.Layer();
        var layer_hud = new Konva.Layer();

        // Configuración de los NPCs.
        var npc_conf = [{
            imgSrc: "../assets/games/juegoFMHJ/npc_1.png",
            startX: width,
            startY: height - altura_personajes - 133,
            width: 120,
            height: 133,
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
        }, {
            imgSrc: "../assets/games/juegoFMHJ/npc_2.png",
            startX: width,
            startY: height - altura_personajes - 130,
            width: 95,
            height: 130,
            frameRate: 7,
            animations: {
                walk_right: [90, 126, 95, 130,
                    346, 126, 95, 130,
                    602, 126, 95, 130,
                    858, 126, 95, 130,
                    1114, 126, 95, 130,
                    1370, 126, 95, 130,
                    1626, 126, 95, 130,
                    1882, 126, 95, 130
                ],
                walk_left: [1863, 382, 95, 130,
                    1607, 382, 95, 130,
                    1351, 382, 95, 130,
                    1095, 382, 95, 130,
                    839, 382, 95, 130,
                    583, 382, 95, 130,
                    327, 382, 95, 130,
                    71, 382, 95, 130
                ],
                standing: [90, 638, 95, 130,
                    346, 638, 95, 130,
                    602, 638, 95, 130,
                    858, 638, 95, 130,
                    1114, 638, 95, 130,
                    1370, 638, 95, 130,
                    1626, 638, 95, 130
                ]
            }
        }, {
            imgSrc: "../assets/games/juegoFMHJ/npc_3.png",
            startX: width,
            startY: height - altura_personajes - 148,
            width: 120,
            height: 148,
            frameRate: 7,
            animations: {
                walk_right: [70, 108, 120, 148,
                    326, 108, 120, 148,
                    582, 108, 120, 148,
                    838, 108, 120, 148,
                    1094, 108, 120, 148,
                    1350, 108, 120, 148,
                    1606, 108, 120, 148,
                    1862, 108, 120, 148,
                    2118, 108, 120, 148,
                    2374, 108, 120, 148
                ],
                walk_left: [2370, 364, 120, 148,
                    2114, 364, 120, 148,
                    1858, 364, 120, 148,
                    1602, 364, 120, 148,
                    1346, 364, 120, 148,
                    1090, 364, 120, 148,
                    834, 364, 120, 148,
                    578, 364, 120, 148,
                    322, 364, 120, 148,
                    66, 364, 120, 148
                ],
                standing: [70, 620, 120, 148,
                    324, 620, 120, 148,
                    582, 620, 120, 148,
                    838, 620, 120, 148,
                    1094, 620, 120, 148,
                    1350, 620, 120, 148
                ]
            }
        }];

        // Creamos los NPCs.
        createNPC(getRandomNPC(npc_conf));

        // Variables de los botones.
        var greenButton = null;
        var redButton = null;

        // Creamos los botones de acción.
        function createButtons(npc) {
            // Creamos el botón verde (imagen).
            var greenButtonImg = new Image();
            greenButtonImg.src = "../assets/games/juegoFMHJ/btn_green.png";

            // Creamos el botón rojo (imagen).
            var redButtonImg = new Image();
            redButtonImg.src = "../assets/games/juegoFMHJ/btn_red.png";

            // Manejamos el evento onload para ambas imágenes.
            greenButtonImg.onload = function () {
                greenButton = new Konva.Image({
                    x: main_character.x() - 50,
                    y: main_character.y() - 75,
                    width: 50,
                    height: 50,
                    image: greenButtonImg
                });

                // Evento de click en el botón verde.
                greenButton.on('click', () => {
                    // Borramos los botones.
                    greenButton.destroy();
                    redButton.destroy();

                    // Paramos el temporizador.
                    stopTemporizador();

                    // Limpiamos la imagen del ticket y los datos del mismo.
                    clearTicketAndData(layer_action);

                    // Movemos al NPC a la izquierda.
                    moveNPCToPositionWithAnimation(npc, -npc.width(), npc.y(), 4, 'walk_left', () => {
                        // Borramos el NPC.
                        npc.destroy();

                        // Validamos el ticket.
                        if (validarTicket(generated_ticket)) {
                            console.log("El ticket es válido.");

                            // Aumentamos el contador de validaciones realizadas.
                            incrementContadorValidaciones();

                            // Creamos un nuevo NPC.
                            createNPC(getRandomNPC(npc_conf));

                            errores_ticket = []; // Limpiamos los errores.
                            generated_ticket = null; // Limpiamos el ticket.
                        } else {
                            console.log("El ticket no es válido.");
                            console.log(errores_ticket);

                            // Terminamos el juego.
                            endGame();

                            errores_ticket = []; // Limpiamos los errores.
                            generated_ticket = null; // Limpiamos el ticket.
                        }
                    });
                });

                // Añadimos el botón verde a la capa.
                layer_action.add(greenButton);
                stage.add(layer_action);
            };

            redButtonImg.onload = function () {
                redButton = new Konva.Image({
                    x: main_character.x() + main_character.width(),
                    y: main_character.y() - 75,
                    width: 50,
                    height: 50,
                    image: redButtonImg
                });

                // Evento de click en el botón rojo.
                redButton.on('click', () => {
                    // Borramos los botones.
                    greenButton.destroy();
                    redButton.destroy();

                    // Paramos el temporizador.
                    stopTemporizador();

                    // Limpiamos la imagen del ticket y los datos del mismo.
                    clearTicketAndData(layer_action);

                    // Movemos al NPC a la derecha.
                    moveNPCToPositionWithAnimation(npc, width, npc.y(), 4, 'walk_right', () => {
                        // Borramos el NPC.
                        npc.destroy();

                        if (!validarTicket(generated_ticket)) {
                            console.log("El ticket NO es válido.");

                            // Aumentamos el contador de validaciones realizadas.
                            incrementContadorValidaciones();

                            // Creamos un nuevo NPC.
                            createNPC(getRandomNPC(npc_conf));

                            errores_ticket = []; // Limpiamos los errores.
                            generated_ticket = null; // Limpiamos el ticket.
                        } else {

                            // Agregamos al array de errores.
                            errores_ticket.push("El ticket ES VÁLIDO.");

                            console.log("El ticket ES válido.");
                            console.log(errores_ticket);

                            // Terminamos el juego.
                            endGame();

                            errores_ticket = []; // Limpiamos los errores.
                            generated_ticket = null; // Limpiamos el ticket.
                        }
                    });
                });

                // Añadimos el botón rojo a la capa.
                layer_action.add(redButton);
                stage.add(layer_action);
            };
        }


        // Creamos la imagen de la carretera.
        var fondo_img = new Image();
        fondo_img.src = "../assets/games/juegoFMHJ/fondo.png";

        // Añadimos el fondo a la capa.
        var fondo = null;
        // Cargamos la imagen del fondo.
        // Cuando la imagen se haya cargado, creamos el fondo.
        fondo_img.onload = function () {
            fondo = new Konva.Image({
                x: 0,
                y: 0,
                image: fondo_img
            });
            // Añadimos la carretera a la capa.
            layer_background.add(fondo);

            // Añadimos la capa a la escena.
            stage.add(layer_background);

            // Creamos el personaje principal.
            createMC();

            // Creamos la señal de entrada.
            createSignal();

            // Creamos el HUD del juego.
            createHUD();
        };

        // Creamos el sprite del personaje.
        var main_character = null;

        // Función para cargar la imagen del personaje.
        function createMC() {
            // Creamos el personaje.
            var mc = new Image();
            mc.src = "../assets/games/juegoFMHJ/idle.png";

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

            // Cargamos la imagen del personaje.
            // Cuando la imagen se haya cargado, creamos el sprite del personaje.
            mc.onload = function () {
                main_character = new Konva.Sprite({
                    x: width / 3,
                    y: height - altura_personajes - 135, // 135 es la altura del personaje.
                    width: 58,
                    image: mc,
                    animation: 'standing',
                    animations: motions_mc,
                    frameRate: 7,
                    frameIndex: 0
                });

                // Añadimos el personaje a la capa.
                layer_npc.add(main_character);

                // Añadimos la capa a la escena.
                stage.add(layer_npc);

                // Iniciamos la animación del personaje.
                main_character.start();

                // Crear el primer NPC solo después de que el personaje principal esté listo.
                createNPC(getRandomNPC(npc_conf));
            };
        }

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
        function createNPC(npc_conf) {

            // Solo creamos un NPC si el personaje principal está listo.
            if (main_character) {

                // Cargamos la imagen del NPC.
                var npc_img = new Image();
                npc_img.src = npc_conf.imgSrc;

                // Creamos el NPC.
                let npc = null;
                npc_img.onload = () => {
                    npc = new Konva.Sprite({
                        x: npc_conf.startX,
                        y: npc_conf.startY,
                        width: npc_conf.width,
                        image: npc_img,
                        animation: 'standing',
                        animations: npc_conf.animations,
                        frameRate: npc_conf.frameRate,
                        frameIndex: 0
                    });

                    // Añadimos el NPC a la capa.
                    layer_npc.add(npc);
                    // Añadimos la capa a la escena.
                    stage.add(layer_npc);
                    // Iniciamos la animación del NPC.
                    npc.start();

                    // Añadimos la capa de señal a la escena.
                    // De esta manera, la señal estará por encima de los personajes.
                    stage.add(layer_signal);

                    // Movemos al NPC hacia la izquierda.
                    moveNPCToPositionWithAnimation(npc, main_character.x() + main_character.width(), npc.y(), 4, 'walk_left', () => {

                        // Creamos los botones de acción.
                        createButtons(npc);

                        // Generamos un ticket aleatorio.
                        generated_ticket = generarTicketAleatorio();

                        // Mostramos el ticket en pantalla.
                        getImageTicket();

                        // Mostramos el ticket en la consola.
                        console.log(generated_ticket);

                        // Iniciamos el temporizador.
                        startTemporizador();

                    });

                };
            }

        }

        // Función para mostrar el ticket.
        function getImageTicket() {
            // Creamos la imagen del ticket.
            var ticket_img = new Image();

            // Ruta de la imagen del ticket.
            let ruta = "";

            // Cargamos la imagen del ticket según el tipo de entrada.
            if (generated_ticket.tipo_entrada === "General") {
                ruta = "../assets/games/juegoFMHJ/ticket_general.png";
            } else if (generated_ticket.tipo_entrada === "VIP") {
                ruta = "../assets/games/juegoFMHJ/ticket_vip.png";
            }

            // Asignamos la ruta de la imagen del ticket.
            ticket_img.src = ruta;

            // Añadimos el ticket a la capa.
            let new_ticket = null;
            // Cargamos la imagen del ticket.
            // Cuando la imagen se haya cargado, creamos el ticket.
            ticket_img.onload = function () {
                new_ticket = new Konva.Image({
                    x: width - 700 - 50,
                    y: height / 2 - 250,
                    image: ticket_img
                });

                // Añadimos el ticket a la capa.
                layer_action.add(new_ticket);

                // Insertamos los datos del ticket.
                insertDataTicket(generated_ticket, new_ticket, layer_action);

                // Añadimos la capa a la escena.
                stage.add(layer_action);
            };

        }

        // Función para mostrar los datos del ticker por pantalla.
        function insertDataTicket(datos_ticket, new_ticket, layer) {

            // Cargamos la fuente personalizada.
            var font = new FontFace('PostNoBillsColombo', 'url(../assets/fonts/postnobillscolombo/PostNoBillsColombo-ExtraBold.ttf)');

            // Cuando la fuente se haya cargado, la añadimos a la lista de fuentes.
            // Después, mostramos los datos del ticket sobre la imagen.
            font.load().then(() => {
                document.fonts.add(font);

                // Mostramos los datos del ticket sobre la imagen.

                // Código del ticket.
                let codigo_ticket = new Konva.Text({
                    x: new_ticket.x() + 175,
                    y: new_ticket.y() + 205,
                    text: datos_ticket.codigo,
                    fontSize: 16,
                    fontFamily: 'PostNoBillsColombo',
                    fill: '#0A0F0F',
                    letterSpacing: 2
                });

                // Nombre del festival.
                let nombre_festival = new Konva.Text({
                    x: new_ticket.x() + 156,
                    y: new_ticket.y() + 75,
                    text: datos_ticket.nombre_festival,
                    fontSize: 20,
                    fontFamily: 'PostNoBillsColombo',
                    fill: '#0A0F0F',
                    letterSpacing: 2
                });

                // Fecha del festival.
                let fecha_festival = new Konva.Text({
                    x: new_ticket.x() + 150,
                    y: new_ticket.y() + 104,
                    text: datos_ticket.fecha_festival,
                    fontSize: 16,
                    fontFamily: 'PostNoBillsColombo',
                    fill: '#0A0F0F',
                    letterSpacing: 2
                });

                // Puerta del festival.
                let puerta_festival = new Konva.Text({
                    x: new_ticket.x() + 393,
                    y: new_ticket.y() + 103,
                    text: datos_ticket.puerta,
                    fontSize: 16,
                    fontFamily: 'PostNoBillsColombo',
                    fill: '#0A0F0F'
                });

                // Ubicación del festival.
                let ubicacion_festival = new Konva.Text({
                    x: new_ticket.x() + 133,
                    y: new_ticket.y() + 127,
                    text: datos_ticket.ubicacion,
                    fontSize: 14,
                    fontFamily: 'PostNoBillsColombo',
                    fill: '#0A0F0F',
                    letterSpacing: 1
                });

                // Lugar del festival.
                let lugar_festival = new Konva.Text({
                    x: new_ticket.x() + 323,
                    y: new_ticket.y() + 127,
                    text: "(" + datos_ticket.lugar_festival + ")",
                    fontSize: 14,
                    fontFamily: 'PostNoBillsColombo',
                    fill: '#0A0F0F',
                    letterSpacing: 1
                });

                // Precio del ticket.
                let precio_ticket = new Konva.Text({
                    x: new_ticket.x() + 370,
                    y: new_ticket.y() + 189,
                    text: datos_ticket.precio + ".00 €",
                    fontSize: 20,
                    fontFamily: 'PostNoBillsColombo',
                    fill: '#0A0F0F'
                });

                layer.add(codigo_ticket);
                layer.add(nombre_festival);
                layer.add(fecha_festival);
                layer.add(puerta_festival);
                layer.add(ubicacion_festival);
                layer.add(lugar_festival);
                layer.add(precio_ticket);

            });

        }

        // Función para limpiar el ticket y los datos del ticket de la capa.
        function clearTicketAndData(layer) {
            layer.find('Image, Text').forEach((element) => {
                element.destroy();
            });
            layer.batchDraw(); // Redibuja la capa para reflejar los cambios
        }

        // Creamos la señal de entrada.
        var signal = null;

        // Función para crear la señal de entrada.
        function createSignal() {
            // Creamos la imagen de la señal de entrada.
            var signal_img = new Image();
            signal_img.src = "../assets/games/juegoFMHJ/signal.png";

            // Cargamos la imagen del fondo.
            // Cuando la imagen se haya cargado, creamos el fondo.
            signal_img.onload = function () {
                signal = new Konva.Image({
                    x: signal_img.width / 2,
                    y: height - signal_img.height,
                    image: signal_img
                });
                // Añadimos la carretera a la capa.
                layer_signal.add(signal);
            };
        }

        // Función para obtener un NPC al azar.
        function getRandomNPC(config) {
            return config[Math.floor(Math.random() * config.length)];
        }

        // Variables para el HUD del juego.
        var contador_validaciones = 0;
        var temporizador = null; // Temporizador del juego.
        var game_over = false; // Indica si el juego ha terminado.
        var contador_text = null; // Texto del contador de validaciones.
        var temporizador_text = null; // Texto del temporizador.

        // Creamos los textos del contador y del temporizador.
        function createHUD() {

            // Creamos el fondo para el contador y el temporizador.
            var fondo_contador = new Konva.Rect({
                x: 20,
                y: 20,
                width: 240,
                height: 25,
                fill: 'gold'
            });

            // Creamos el contador de validaciones.
            contador_text = new Konva.Text({
                x: 35,
                y: 25,
                text: 'Validaciones realizadas: 0',
                fontSize: 16,
                fontFamily: 'Arial',
                fill: 'black',
                fontStyle: 'bold'
            });

            // Creamos el fondo para el contador y el temporizador.
            var fondo_temporizador = new Konva.Rect({
                x: 20,
                y: 60,
                width: 190,
                height: 25,
                fill: 'crimson'
            });

            // Creamos el temporizador.
            temporizador_text = new Konva.Text({
                x: 35,
                y: 65,
                text: 'Tiempo restante: 10s',
                fontSize: 16,
                fontFamily: 'Arial',
                fill: 'white',
                fontStyle: 'bold'
            });

            // Añadimos los textos a la capa.
            layer_hud.add(fondo_contador);
            layer_hud.add(contador_text);
            layer_hud.add(fondo_temporizador);
            layer_hud.add(temporizador_text);

            // Añadimos la capa al escenario.
            stage.add(layer_hud);
        }

        // Función para implementar el temporizador.
        function startTemporizador() {
            let tiempo = 10;

            // Actualiza el texto del temporizador.
            updateTemporizadorText(tiempo);

            // Función de cuenta regresiva. Se ejecuta cada segundo.
            function countdown() {
                // Si el tiempo restante es mayor que 0 y
                // el juego no ha terminado.
                if (tiempo > 0 && !game_over) {
                    // Reducimos el tiempo restante en 1 segundo.
                    temporizador = setTimeout(() => {
                        tiempo--;
                        updateTemporizadorText(tiempo);
                        countdown();
                    }, 1000);
                } else if (tiempo === 0) {
                    game_over = true;
                    endGame(); // Llama a Game Over si el tiempo se agota.
                }
            }

            countdown(); // Inicia la cuenta regresiva.
        }

        // Actualiza el texto del temporizador.
        function updateTemporizadorText(seconds) {
            temporizador_text.text(`Tiempo restante: ${seconds}s`);
            // Redibuja la capa para reflejar los cambios.
            layer_hud.batchDraw();
        }

        // Función para incrementar el contador de validaciones.
        function incrementContadorValidaciones() {
            if (!game_over) {
                contador_validaciones++;
                updateContadorValidaciones();
            }
        }

        // Actualiza el texto del contador de validaciones.
        function updateContadorValidaciones() {
            contador_text.text(`Validaciones realizadas: ${contador_validaciones}`);
            // Redibuja la capa para reflejar los cambios.
            layer_hud.batchDraw();
        }

        // Función para finalizar el juego.
        function endGame() {
            // Indicamos que el juego ha terminado.
            game_over = true;

            // Fondo para el mensaje de Game Over.
            var fondo_game_over = new Konva.Rect({
                x: 100,
                y: 100,
                width: width - 200,
                height: height - 200,
                fill: 'black',
                stroke: 'red',
                strokeWidth: 5,
                cornerRadius: 10
            });

            // Mostramos un mensaje de Game Over.
            var mensaje_game_over = new Konva.Text({
                x: 165,
                y: 160,
                text: 'Game Over',
                fontSize: 128,
                fontFamily: 'Arial',
                fontStyle: 'bold',
                fill: 'white',
                align: 'center'
            });

            // Añadimos el fondo a la capa.
            layer_hud.add(fondo_game_over);

            // Añadimos el mensaje de Game Over a la capa.
            layer_hud.add(mensaje_game_over);

            var errores_text = new Konva.Text({
                x: 160,
                y: 300,
                text: (errores_ticket.length > 0) ? errores_ticket.join('\n') : 'Se ha agotado el tiempo!',
                fontSize: 28,
                fontFamily: 'Arial',
                fill: 'white',
                width: width - 300,
                align: 'center'
            });

            // Añadimos los errores a la capa.
            layer_hud.add(errores_text);

            // Eliminamos la capa de acción.
            layer_action.destroy();

            // Movemos la capa de HUD al frente.
            layer_hud.moveToTop();

            // Redibujamos la capa para reflejar los cambios.
            layer_hud.batchDraw();

            fetch('../includes/save_score.php', {
                method: 'POST',  
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'  
                },
                body: `score=${encodeURIComponent(contador_validaciones)}&game=1`  
            })
            .then(response => response.text())  
            .catch(error => console.error('Error:', error));  
        }

        // Función para detener el temporizador.
        function stopTemporizador() {
            if (temporizador) {
                clearTimeout(temporizador); // Detiene el temporizador.
                temporizador = null; // Reinicia el temporizador.

                // Actualiza el texto del temporizador.
                updateTemporizadorText(10);
            }
        }

    }

});