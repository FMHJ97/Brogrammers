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

        <section class="py-3 py-md-5">
            <!-- Primera Fila -->
            <div class="container p-4 my-5 authentication-form p-md-5">


                <!-- Imagen e Información -->
                <div class="row">
                    <!-- Imagen del Usuario -->
                    <div class="mb-4 col-md-4 about-us-img">
                        <img src="assets/img/dummy/dummy_user.png" alt="Foto de perfil del usuario"
                            class="w-100 rounded-circle" style="width: 150px;">
                    </div>
                    <!-- Información del Usuario -->
                    <div class="col-md-8">
                        <div class="gap-3 row">
                            <div class="col-md-12 about-us-info">
                                <h3>Nombre y Apellidos</h3>
                                
                                <!-- Hueco para el nombre y apellidos del usuario -->
                                <p>Nombre Apellido1 Apellido2</p>

                                <h3>Correo Electrónico</h3>
                                <!-- Hueco para el correo electrónico del usuario -->

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h3>Información Personal</h3>

                    <div class="col-md-6 ">
                        <div class="mt-3 mb-3">
                            <label for="pais">País</label>
                            <input type="text" class="form-control" id="pais" placeholder="Introduzca su país"
                                name="pais">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-3 mb-3">
                            <label for="cp">Código Postal</label>
                            <input type="text" class="form-control" id="cp" placeholder="Introduzca su código postal"
                                name="cp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-3 mb-3">
                            <label for="tlf">Tel&eacute;fono</label>
                            <input type="text" class="form-control" id="tlf" placeholder="Introduzca su tel&eacute;fono"
                                name="tlf">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-3 mb-3">
                            <label for="email">Correo electr&oacute;nico</label>
                            <input type="email" class="form-control" id="email"
                                placeholder="Introduzca su correo electr&oacute;nico" name="email"
                                pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h3>Modificar contraseña</h3>
                    <div class="col-md-6">
                        <div class="mt-3 mb-3">
                            <label for="pwd">Contraseña</label>
                            <input type="password" class="form-control" id="pwd" placeholder="Introduzca su contraseña"
                                name="pwd">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="mt-3 mb-3">
                            <label for="pwd2">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="pwd2" placeholder="Introduzca su contraseña"
                                name="pwd2">
                        </div>
                    </div>
                </div>

                <!-- Botón que aparecerá si se modifica algún campo -->
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn">Guardar Cambios</button>
                    </div>
                </div>

            </div>

        </section>

    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>