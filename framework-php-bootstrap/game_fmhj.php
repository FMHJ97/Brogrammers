<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego Konva - FMHJ</title>
    <script src="node_modules/konva/konva.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #f0f0f0
        }

        #juego {
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        #container {
            background-color: #130A37;
        }
    </style>
</head>

<body>
    <div id="juego">
        <div id="container"></div>
    </div>

    <script>
        // Variables.
        var width = window.innerWidth;
        var height = window.innerHeight;

        // Creamos el objeto Stage que contendrá las capas del juego.
        var stage = new Konva.Stage({
            container: 'container',
            width: width,
            height: height
        });

        // Creamos una capa para el fondo.
        var fondo = new Konva.Layer();

        // Creamos el fondo.
        // Primera imagen.
        var fondoImg = new Image();
        fondoImg.src = "assets/sprites/fmhj/fondo.png";

        // Añadimos la imagen al fondo.
        var bground = null;
        fondoImg.onload = function () {
            bground = new Konva.Image({
                x: 0,
                y: 0,
                image: fondoImg,
                width: width,
                height: height
            });

            fondo.add(bground);
            stage.add(fondo);
        };

        // Creamos una capa para los objetos en primer plano.
        var layer = new Konva.Layer();

        // Creamos el personaje.
        var personaje = new Image();
        personaje.src = "assets/sprites/fmhj/idle.png";


        // Animación del personaje.
        var animations = {
            standing: [93, 121, 58, 135,
                349, 121, 58, 135,
                605, 121, 58, 135,
                861, 121, 58, 135,
                1117, 121, 58, 135,
                1373, 121, 58, 135
            ]
        };

        // Añadimos el personaje a la capa.
        var mc = null;
        personaje.onload = function () {
            mc = new Konva.Sprite({
                x: width / 2,
                y: height / 2,
                image: personaje,
                animation: 'standing',
                animations: animations,
                frameRate: 5,
                frameIndex: 0
            });

            layer.add(mc);
            stage.add(layer);
        };

        // Iniciamos la animación.
        // Todos los elementos deben estar cargados.
        window.onload = function () {
            mc.start();
            fondo.start();
        }
    </script>
</body>

</html>