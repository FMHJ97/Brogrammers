<?php include("includes/a_config.php");

if (isset($_SESSION["logged"])) {
    header("location: index.php");
}
require_once '../framework-php-bootstrap/controller/usuarioController.php';
if (isset($_POST["submit"])) {
    $success = true;
    $validEmail = true;
    if (UserController::exists($_POST["email"])) {
        $validEmail = false;
    } else {
        $u = new Usuario(null, $_POST["name"], $_POST["surname1"], $_POST["surname2"], $_POST["email"], $_POST["pswd"], $_POST["birth"], $_POST["country"], $_POST["postal"], $_POST["phone"], null, "usuario");

        if ($u = UserController::insertar($u)) {
            $_SESSION["logged"] = $u;
            header("location: index.php?register=success");
        } else {
            $success = false;
        }
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
        <!-- Sección Crear Cuenta -->
        <section class="py-3 py-md-5">
            <div class="container p-4 my-5 authentication-form p-md-5">
                <!-- Encabezado -->
                <div class="row">
                    <h1>Crear cuenta</h1>
                    <div class="mb-3 col d-flex flex-column flex-md-row mb-md-4">
                        <p class="mb-0">¿Ya tienes una cuenta?&nbsp;</p>
                        <!-- Enlace a Iniciar Sesión -->
                        <a href="login.php">Inicia sesión</a>
                    </div>
                </div>
                <!-- Formulario -->
                <form action="" method="post">
                    <!-- Nombre Input-->
                    <div class="mt-3 mb-3 row">
                        <div class="mb-3 col-12 col-md-6 mb-md-0">
                            <label for="name">Nombre</label><span> *</span>
                            <input type="text" class="form-control" id="name" placeholder="Introduzca su nombre"
                                name="name" required>
                        </div>
                    </div>
                    <!-- Primer y Segundo apellido Input-->
                    <div class="mt-3 mb-3 row">
                        <!-- Primer apellido -->
                        <div class="mb-3 col-12 col-md-6 mb-md-0">
                            <label for="surname1">Primer Apellido</label><span> *</span>
                            <input type="text" class="form-control" id="surname1"
                                placeholder="Introduzca su primer apellido" name="surname1" required>
                        </div>
                        <!-- Segundo apellido -->
                        <div class="col-12 col-md-6">
                            <label for="surname2">Segundo Apellido</label>
                            <input type="text" class="form-control" id="surname2"
                                placeholder="Introduzca su segundo apellido (opcional)" name="surname2">
                        </div>
                    </div>
                    <!-- Fecha y País Input -->
                    <div class="mt-3 mb-3 row">
                        <!-- Fecha nacimiento -->
                        <div class="mb-3 col-12 col-md-6 mb-md-0">
                            <label for="birth">Fecha de Nacimiento</label><span> *</span>
                            <input type="date" class="form-control" id="birth"
                                placeholder="Introduzca su fecha de nacimiento" name="birth" required>
                        </div>
                        <!-- País -->
                        <div class="col-12 col-md-6">
                            <label for="country">Pa&iacute;s</label><span> *</span>
                            <input type="text" class="form-control" id="country" placeholder="Introduzca su país"
                                name="country" required>
                        </div>
                    </div>
                    <!-- Código postal y Teléfono Input -->
                    <div class="mt-3 mb-3 row">
                        <!-- Código postal -->
                        <div class="mb-3 col-12 col-md-6 mb-md-0">
                            <label for="postal">C&oacute;digo Postal</label><span> *</span>
                            <input type="text" class="form-control" id="postal"
                                placeholder="Introduzca su c&oacute;digo postal" name="postal" required>
                        </div>
                        <!-- Teléfono -->
                        <div class="col-12 col-md-6">
                            <label for="phone">Tel&eacute;fono</label><span> *</span>
                            <input type="text" class="form-control" id="phone" placeholder="Introduzca su tel&eacute;fono"
                                name="phone" required>
                        </div>
                    </div>
                    <!-- Email Input -->
                    <div class="mb-3">
                        <label for="email">Correo electr&oacute;nico</label><span> *</span>
                        <input type="email" class="form-control" id="email"
                            placeholder="Introduzca su correo electr&oacute;nico" name="email" required>
                    </div>
                    <!-- Password y Confirm Password Input -->
                    <div class="mt-3 mb-3 row">
                        <!-- Password -->
                        <div class="mb-3 col-12 col-md-6 mb-md-0">
                            <label for="pwd">Contraseña</label><span> *</span>
                            <input type="password" class="form-control" id="pwd" placeholder="Introduzca su contraseña"
                                name="pswd" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}">
                        </div>
                        <!-- Confirm Password -->
                        <div class="col-12 col-md-6">
                            <label for="pwd2">Confirmar contraseña</label><span> *</span>
                            <input type="password" class="form-control" id="pwd2" placeholder="Confirme su contraseña"
                                name="pswd2" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <small id="passwordHelp" class="form-help">La contraseña debe tener al menos 8
                            caracteres, una mayúscula, una minúscula y un caracter no alfanumérico.</small>
                    </div>
                    <!-- News checkbox-->
                    <div class="mb-3 form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="news"> Deseo recibir noticias e
                            información sobre GroundSound Festival.
                        </label>
                    </div>
                    <!-- Terms checkbox-->
                    <div class="mb-5 form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="terms"> Acepto los <a
                                href="legal.php">Términos de Uso</a>.
                        </label>
                    </div>
                    <!-- Botón Crear Cuenta -->
                    <div class="d-flex flex-column ">
                        <button type="submit" name="submit" class="btn">Crear cuenta</button>
                    </div>
                    <?php
                    if (isset($_POST["submit"])) {
                        if (!$success) {
                            echo "<p class='error'>Ha sido un errro. Por favor comuníquelo al administrador</p>";
                        } else if (!$validEmail) {
                            echo "<p class='error'>El correo que has eligido ya existe. Por favor, elige otro.</p>";
                        }
                    }
                    ?>

                </form>
            </div>
        </section>
    </main>

    <!-- Componente Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>