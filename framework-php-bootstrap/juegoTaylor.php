<?php include("includes/a_config.php"); ?>

<head>
    <?php include("includes/head_tags.php"); ?>
    <script src="node_modules/konva/konva.min.js"></script>
    <script src="js/animacionTay.js" type="text/javascript"></script>
</head>
<style>
#gameContainer {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    background-color: black;
    display: block;
    border: 2px solid red;
    box-sizing: border-box;
    /* Include border in width/height */
    overflow: hidden;
    /* Prevent any scrollbars */
}
</style>

<body onload="game.init()">
    <?php include("includes/navbar.php"); ?>
    <div id="gameContainer">
    </div>

    </div>

    <?php include("includes/patrocinadores.php"); ?>
    <?php include("includes/footer.php"); ?>
</body>

</html>