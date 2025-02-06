<?php include("includes/a_config.php");

require_once '../framework-php-bootstrap/controller/fotoController.php';



?>
<!DOCTYPE html>
<html>

<head>
    <script src="js/media.js"></script>

    <?php include("includes/head_tags.php"); ?>
</head>

<body>
    <?php include("includes/navbar.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_FILES['imagen'])) {

            foreach ($_FILES['imagen']['tmp_name'] as $key => $tmp_name) {



                $fich = time() . $_SESSION["logged"]->nombre . $_SESSION["logged"]->apellido1 . "-" . $_FILES["imagen"]["name"][$key];

                $ruta = "assets/img/gallery/" . $fich;



                $fileName = "Imagen de " . $_SESSION["logged"]->nombre . " " . $_SESSION["logged"]->apellido1 . " del " . date('Y-m-d');

                $foto = new Foto(null, $_SESSION["logged"]->id, null, $fileName, $ruta, date('Y-m-d H:i:s'));

                if (FotoController::insertar($foto)) {
                    move_uploaded_file($_FILES["imagen"]["tmp_name"][$key], "assets/img/gallery/" . $fich);
                } else header("location: dificultades.php");
            }
        } else {
            echo "No files uploaded.";
        }
    }

    ?>
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
            <form id="subirFotos" action="" method="post" enctype="multipart/form-data">
                <div class="row my-3 py-3">
                    <div class="button-gallery-wrap text-center">
                        <label class="button-gallery-input" for="upload">Enviar sus fotos</label>
                        <input id="upload" class="no-input" type="file" accept="image/*" name="imagen[]" multiple>
                    </div>

                </div>
            </form>
        </section>
    </main>

    <script>
        document.getElementById('upload').addEventListener('change', function() {
            if (this.files.length > 0) {
                document.getElementById('subirFotos').submit();
            }
        });
    </script>



    <?php include("includes/patrocinadores.php"); ?>
    <?php include("includes/footer.php"); ?>
</body>

</html>