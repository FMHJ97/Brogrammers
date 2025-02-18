<?php include("includes/a_config.php");

require_once '../framework-php-bootstrap/controller/fotoController.php';



?>
<!DOCTYPE html>
<html>

<head>
    <script src="js/media.js"></script>

    <?php include("includes/head_tags.php"); ?>
    <script src="js/gestion.js"></script>

</head>

<body>
    <?php include("includes/navbar.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_SESSION["logged"])) {
            if (isset($_FILES['imagen'])) {

                foreach ($_FILES['imagen']['tmp_name'] as $key => $tmp_name) {
                    $fich = time() . $_SESSION["logged"]->nombre . $_SESSION["logged"]->apellido1 . "-" . $_FILES["imagen"]["name"][$key];
                    $ext = strtolower(pathinfo($fich, PATHINFO_EXTENSION));
                    $allowed_exts = ["jpg", "jpeg", "png",];
                    if (in_array($ext, $allowed_exts)) {
                        $ruta = "assets/img/gallery/" . $fich;
                        $fileName = "Imagen de " . $_SESSION["logged"]->nombre . " " . $_SESSION["logged"]->apellido1 . " del " . date('Y-m-d');

                        $foto = new Foto(null, $_SESSION["logged"]->id, null, $fileName, $ruta, date('Y-m-d H:i:s'));

                        if (FotoController::insertar($foto)) {
                            move_uploaded_file($_FILES["imagen"]["tmp_name"][$key], "assets/img/gallery/" . $fich);
                        } else header("location: dificultades.php");
                    }
                }
            } else {
                echo "No files uploaded.";
            }
        } else {
            $alertMessage = "Tienes que estar logueado para subir fotos.";
            $alertType = "danger";
        }
    }
    ?>
    <main>
        <?php if (!empty($alertMessage)): ?>
            <div class="alert alert-<?php echo $alertType; ?> alert-dismissible fade show custom-alert-gestion" role="alert">

                <!-- Ícono de error -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                </svg>
                <strong><?php echo $alertMessage; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
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
                        <button class="button-gallery-input" for="upload">Enviar sus fotos</button>
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