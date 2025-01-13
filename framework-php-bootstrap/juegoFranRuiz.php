<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("includes/head_tags.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/konva@8.4.3/konva.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/howler"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>        
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

        #container {
            width: 100%;
            height: 80vh;
        }

        .game-layout {
            display: flex;
            height: calc(100vh - 120px);
        }

        .left-column,
        .right-column {
            width: 15%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: rgba(30, 30, 30, 0.9);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .left-column {
            border-right: 1px solid #444;
        }

        .right-column {
            border-left: 1px solid #444;
        }

        #score-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        #score-label {
            font-size: 28px;
            font-weight: bold;
            color: red;
            margin-bottom: 10px;
        }

        #marker {
            font-size: 48px;
            font-weight: bold;
            padding: 20px 40px;
            text-align: center;
            background-color: white;
            color: black;
            border: 5px solid blue;
            border-radius: 15px;
            box-shadow: 0px 0px 20px 5px white;
            transition: width 0.3s ease, height 0.3s ease;
        }

        .center-column {
            width: 70%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .controls-container {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        button {
            background-color: #444;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 14px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #666;
        }

        button:active {
            background-color: #888;
        }

        #comments {
            margin-top: 20px;
            padding: 10px;
            text-align: center;
            background-color: #111;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            font-size: 16px;
        }

        #multiplier-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        #multiplier {
            font-size: 24px;
            font-weight: bold;
            color: yellow;
            background-color: #111;
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
        }

        #streak,
        #max-streak {
            font-size: 20px;
            font-weight: bold;
            color: lightgreen;
        }

        .konva-container {
            border: 2px solid #fff;
            border-radius: 15px;
            overflow: hidden;
        }
    </style>
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