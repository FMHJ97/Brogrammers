<?php include("includes/a_config.php"); ?>

<?php
/* Importamos los ficheros necesarios. */
require_once '../framework-php-bootstrap/controller/usuarioController.php';
require_once '../framework-php-bootstrap/model/usuario.php';

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

    <main class="px-3 px-md-0">
        <!-- Sección Login-->
        <section class="py-3 py-md-5">
            <div class="container p-4 my-5 authentication-form p-md-5">
                <!-- Encabezado -->
                <div class="row">
                    <!--CF2: No puede haber nada entre row y col-->
                    <h1>Iniciar Sesión</h1>
                    <div class="mb-3 col d-flex flex-column flex-md-row mb-md-4">
                        <p class="mb-0">¿No tienes una cuenta?&nbsp;</p>
                        <!-- Link a Registro -->
                        <a href="register.php">Regístrate</a>
                    </div>
                </div>
                <!-- Formulario -->
                <form action="" method="POST">
                    <!-- Email Input -->
                    <div class="mt-3 mb-3">
                        <label for="email">Correo electrónico</label><span> *</span>
                        <input type="email" class="form-control" id="email"
                            placeholder="Introduzca su correo electrónico" name="email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
                    </div>
                    <!-- Password Input -->
                    <div class="mb-3">
                        <label for="pwd">Contraseña</label><span> *</span>
                        <input type="password" class="form-control" id="pwd" placeholder="Introduzca su contraseña"
                            name="pwd">
                    </div>
                    <!-- Remember me checkbox -->
                    <div class="mb-4 form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Recuérdame
                        </label>
                    </div>
                    <!-- Botón Iniciar Sesión y Link a Recuperar Contraseña -->
                    <div class="d-flex flex-column ">
                        <button type="submit" class="mb-3 btn" name="login">Iniciar sesión</button>
                        <a id="reset_pwd" href="restore_password.php" class="ms-auto">¿Olvidó su contraseña?</a>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!-- Componente Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>