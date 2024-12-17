<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <script src="js/media.js"></script>

    <?php include("includes/head_tags.php"); ?>
</head>

<body>
    <?php include("includes/navbar.php"); ?>
    <main>

        <section class="container page-section">
            <div class="row page-section-heading">
                <h1>GALERÍA</h1>
            </div>
        </section>

        <section class="container page-section">
            <!-- Todos los imagenes estan cargado a traves de javascript   -->
            <div id="mediaContainer" class="grid row mt-4">
            </div>
            <div class="row my-3 px-4 py-3">
                <!-- Esto en el paso de funcionalidad es posible que se cambie -->
                <button href="" id="addImages" class="btn-gallery mx-auto my-3">↓ ver más ↓</button>
            </div>
        </section>

        <section class="container page-section">
            <!-- Esto en el paso de funcionalidad es posible que se cambie -->
            <div class="row my-3 py-3">
                <a id="submitImageTODO"  href="https://www.gmail.com/"  class="btn-index ">Envíanos tus fotos</a>
            </div>
        </section>
    </main>





    <?php include("includes/patrocinadores.php"); ?>
    <?php include("includes/footer.php"); ?>
</body>

</html>