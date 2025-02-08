<?php include("includes/a_config.php"); 

require_once("../framework-php-bootstrap/controller/fotoController.php");

// Variables para alertas
$alertMessage = "";
$alertType = ""; // Puede ser "success" o "danger"

if (isset($_SESSION['logged'])) {
    if ($_SESSION['logged']->rol !== "admin") {
        header("Location:index.php");
        exit();
    }
} else {
    header("Location:index.php");
    exit();
}

// Eliminar imagen
if (isset($_POST["delete"])) {
    if (FotoController::delete($_POST["id"])) {
        unlink("$_POST[url]");
        $alertMessage = "Imagen borrada correctamente.";
        $alertType = "success";
    } else {
        $alertMessage = "Error al borrar la imagen.";
        $alertType = "danger";
    }
}

// Buscar imágenes por usuario
if (isset($_POST["buscaUsuario"]) && !isset($_POST["edit"])) {
    if ($_POST["usuario"] == "") {
        $fotos = FotoController::getAll();
    } else {
        $fotos = FotoController::getAllByUsuario($_POST["usuario"]);
    }
} 
// Buscar imágenes por fecha
else if (isset($_POST["buscaFecha"]) && !isset($_POST["edit"])) {
    $fotos = FotoController::getAllByFecha($_POST["date"]);
} 
// Obtener todas las imágenes
else {
    $fotos = FotoController::getAll();
}

// Modificar descripción de la imagen
if (isset($_POST["confirm"])) {
    if (FotoController::modificar($_POST["id"], $_POST["text"])) {
        $alertMessage = "Descripción de la imagen modificada correctamente.";
        $alertType = "success";
    } else {
        $alertMessage = "Error al modificar la descripción de la imagen.";
        $alertType = "danger";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>
    <script src="js/gestion.js"></script>
</head>

<body>
    <!-- Barra de navegación -->
    <?php include("includes/navbar.php"); ?>

    <!-- Mostrar alertas -->
    <?php if (!empty($alertMessage)): ?>
        <div class="alert alert-<?php echo $alertType; ?> alert-dismissible fade show custom-alert-gestion" role="alert">
            <?php if ($alertType == "success"): ?>
                <!-- Ícono de éxito -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
            <?php else: ?>
                <!-- Ícono de error -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                </svg>
            <?php endif; ?>
            <strong><?php echo $alertMessage; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <main class="d-block px-3 px-md-0">

        <section class="page-section">

            <div class="container">
                <!-- Fila con títulos (Carrito, Dirección, Pago) -->
                <div class="row d-flex text-center page-section-heading mb-3">
                    <div class="col">
                        <h3 class="step-title active">Imagenes</h3>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-10 mx-auto px-0 px-md-2">
                        <form class="mb-3" action="" method="post">
                            <div class="row g-2">
                                <!-- Search bar -->
                                <div class="col-12 col-md">
                                    <div class="search-bar-media justify-content-center">
                                        <input type="text" placeholder="<?php
                                                                        if (isset($_POST["buscaUsuario"]) && $_POST["usuario"] != "") {
                                                                            echo "Busca otra vez para ver todos →";
                                                                        } else echo "Buscar por usuario";
                                                                        ?>
                                        " class="form-control-search w-100 no-margin"
                                            name="usuario">
                                        <button class="btn btn-search" name="buscaUsuario" type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                        <input type="date" class="form-control-search w-100"
                                            name="date" placeholder="Buscar por fecha">
                                        <button class="btn btn-search" name="buscaFecha" type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>

                                    </div>

                                </div>
                            </div>
                        </form>

                        <?php
                        if ($fotos != null && !isset($_POST["edit"])) {
                        ?>
                            <div class="table-responsive-md">
                                <table class="table table-cart table-borderless table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center col-2">
                                                <h5>Imagen</h5>
                                            </th>
                                            <th class="text-center col-2">
                                                <h5>Usuario</h5>
                                            </th>
                                            <th class="text-center col-4">
                                                <h5>Fecha</h5>
                                            </th>
                                            <th class="text-center col-4">
                                                <h5>Acción</h5>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($fotos as $f) { ?>
                                            <tr>
                                                <form method="post">
                                                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="img-model">
                                                                <div class="modal-body text-center">
                                                                    <img id="modalImage" src="" class="img-fluid" alt="Imagen">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id" value="<?php echo $f->id ?>">
                                                    <input type="hidden" name="url" value="<?php echo $f->img ?>">
                                                    <td class="text-center align-middle col-2">
                                                        <img class="img gallery-thumbnail" src="<?php echo $f->img ?>" height="100px" width="100px"
                                                            alt="<?php echo $f->nombre ?>" data-bs-toggle="modal" data-bs-target="#imageModal"
                                                            onclick="showImageModal('<?php echo $f->img ?>')">
                                                    </td>
                                                    <td class="text-center align-middle col-2">
                                                        <?php echo $f->usuario ?>
                                                    </td>
                                                    <td class="text-center align-middle col-4">
                                                        <?php echo $f->fecha_subida ?>
                                                    </td>
                                                    <td class="text-center align-middle col-4">
                                                        <button class="btn btn-category-item d-inline-block" type="submit"
                                                            name="edit">Modificar</button>
                                                        <button class="btn btn-category-item d-inline-block" type="submit"
                                                            name="delete">Borrar</button>
                                                    </td>
                                                </form>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        <?php
                        } else if (!isset($_POST["edit"]))
                            echo "<p style='error'>No se ha encontrado ningún imagen</p>";
                        ?>
                    </div>
                </div>

            </div>
        </section>
        <?php
        if (isset($_POST["edit"])) {
            $f = FotoController::find($_POST["id"]);
        ?>
            <section>
                <div class="container p-4 my-5 authentication-form p-md-5">

                    <!-- Formulario -->
                    <form action="" method="post">
                        <!-- Nombre Input-->
                        <input type="hidden" name="id" value="<?php echo $_POST["id"] ?>">
                        <div class="mt-3 mb-3 row">
                            <div class="mb-3 col-12 col-md-6 mb-md-0 text-center">
                                <img class="img img-form-gestion img-fluid" src="<?php echo $f->img ?>"
                                    alt="<?php echo $f->nombre ?>">
                            </div>
                            <div class="mb-3 col-12 col-md-6 mb-md-0">
                                <label for="name">Descripción</label><span> *</span>
                                <input type="text" class="form-control" id="name" value="<?php echo $f->nombre ?>"
                                    name="text" required>
                            </div>
                            <div class="d-flex mt-2 flex-column ">
                                <button type="submit" name="confirm" class="btn">Confirmar cambios</button>
                            </div>
                        </div>

                        <!-- Botón Crear Cuenta -->


                </div>
                </form>
                </div>
            <?php
        }
            ?>
    </main>

    <!-- Pie de página -->
    <?php include("includes/footer.php"); ?>

</body>
<script>
    function showImageModal(imageSrc) {
        document.getElementById('modalImage').src = imageSrc;
    }
</script>

</html>