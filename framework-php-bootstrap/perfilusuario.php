<?php include("includes/a_config.php"); ?>

<?php
/* Importamos los ficheros necesarios. */
require_once '../framework-php-bootstrap/controller/usuarioController.php';
require_once '../framework-php-bootstrap/model/usuario.php';

// Si existe una sesión Logueado, redirigimos a menu.
if (isset($_SESSION['logged'])) {
    header("Location:index.php");
    exit();
}

/* Si pulsamos sobre el botón Iniciar Sesión. */
if (isset($_POST['login'])) {
    // Recogemos los datos del formulario.
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    // Comprobamos si el usuario existe en la base de datos.
    $usu = UserController::find($email);

    // Si el usuario existe.
    if ($usu) {
        // Comprobamos si la contraseña es correcta.
        if (UserController::validate($usu, $pwd)) {
            // Iniciamos la sesión.
            session_start();
            $_SESSION['logged'] = $usu;
            // Redirigimos al index.
            header('Location: index.php');
        } else {
            // Si la contraseña no es correcta, mostramos un mensaje de error.
            echo "<script>alert('Contraseña incorrecta.')</script>";
        }
    } else {
        // Si el usuario no existe, mostramos un mensaje de error.
        echo "<script>alert('Usuario no encontrado.')</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>
</head>

<body>
    <!-- Componente NavBar -->
    <?php include("includes/navbar.php"); ?>

    <main>

        <section class="container page-section">
            <!-- Primera Fila -->
            <div class="mb-5 row py-md-4">

                <div class="px-4 mb-5 col-md-6 mb-md-0">

                    <!-- Imagen e Información -->
                    <div class="row">
                        <!-- Imagen del Usuario -->
                        <div class="mb-4 col-md-4 about-us-img">
                            <img src="assets/img/dummy/dummy_user.png" alt="Miembro del Equipo 1" class="img-fluid rounded-circle">
                        </div>
                        <!-- Información del Miembro -->
                        <div class="col-md-8">
                            <div class="gap-3 row">
                                <div class="col-md-12 about-us-info">
                                    <h3>Nombre y Apellidos</h3>
                                    <p>
                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </section>

    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>