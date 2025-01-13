<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("includes/head_tags.php"); ?>
    <title>GroundSound Hero</title>
    <script src="https://cdn.jsdelivr.net/npm/konva@8.4.3/konva.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/howler"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        /* Al ser un juego le meto los estilos a parte???*/
        body {
            margin: 0;
            background-color: #000;
            font-family: 'Arial', sans-serif;
            color: white;
        }

        .header {
            text-align: center;
            padding: 20px;
            background-color: #222;
            color: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.8);
        }

        .header h1 {
            font-size: 36px;
            margin: 0;
        }

        .header h2 {
            font-size: 18px;
            margin: 5px 0;
            color: #ccc;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>GroundSound Hero</h1>
        <h2>GroundSound Fest Song</h2>
    </div>

    <div class="game-layout">
        <div class="left-column">
            <div id="score-container">
                <div id="score-label">SCORE</div>
                <div id="marker">0</div>
            </div>
        </div>

        <div class="center-column">
            <div id="container" class="konva-container"></div>
            <div class="controls-container">
                <button onclick="play()">▶️ Play</button>
                <button onclick="stop()">⏹ Stop</button>
            </div>
            <div id="comments">Esperando...</div>
        </div>

        <div class="right-column">
            <div id="multiplier-container">
                <p id="multiplier">Multiplicador: X1</p>
                <p id="streak">Racha: 0</p>
                <p id="max-streak">Racha Máxima: 0</p>
            </div>
        </div>
    </div>

    <script src="./js/GSHero.js"></script>
</body>
</html>
