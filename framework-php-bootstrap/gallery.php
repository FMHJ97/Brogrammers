<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <script src="js/media.js"></script>

    <?php include("includes/head_tags.php"); ?>
</head>

<body>
    <?php include("includes/navbar.php"); ?>
    <section class="container page-section">
        <div class="row page-section-heading">
            <h1>GALLERY</h1>
        </div>
    </section>
    <div class="container page-section">
        <div id="mediaContainer" class="grid row mt-4">
        </div>
        <div class="row my-3 px-4 py-3">
            <!-- Esto en el paso de funcionalidad es posible que se cambie -->
            <button href="" id="addImages" class="btn-gallery mx-auto my-3">↓ see more ↓</button>
        </div>

    </div>
    <div class="container page-section">

        <div class="row my-3 py-3">
            <button id="submitImageTODO" class="btn-index ">Send us your pics</button>
        </div>

    </div>




    <?php include("includes/patrocinadores.php"); ?>
    <?php include("includes/footer.php"); ?>
</body>

</html>