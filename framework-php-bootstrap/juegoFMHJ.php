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
            background-color: lightseagreen;
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
        
        <!-- Sección de Juego -->
        <section class="container page-section">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <div id="gameContainer"></div>
                </div>
            </div>
        </section>

    </main>

    <script>

        

    </script>

</body>

</html>