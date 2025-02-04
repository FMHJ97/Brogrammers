<?php include("includes/a_config.php");

require_once '../framework-php-bootstrap/controller/usuarioController.php';

// Si existe una sesión Logueado, redirigimos a menu.
if (isset($_SESSION['logged'])) {
    header("Location:index.php");
    exit();
}

$errorMessage = ""; // Variable para almacenar el mensaje de error

if (isset($_POST["submit"])) {
    $success = true;
    $validEmail = true;
    if (UserController::exists($_POST["email"])) {
        $validEmail = false;
        $errorMessage = "El correo que has elegido ya existe. Por favor, elige otro.";
    } else {
        $u = new Usuario(null, $_POST["name"], $_POST["surname1"], $_POST["surname2"], $_POST["email"], $_POST["pswd"], $_POST["birth"], $_POST["country"], $_POST["postal"], $_POST["phone"], null, "usuario");

        if ($u = UserController::insertar($u)) {
            session_start();
            $_SESSION["logged"] = $u;
            header("location: index.php?register=success");
        } else {
            $success = false;
            $errorMessage = "Ha ocurrido un error. Por favor, comuníquelo al administrador.";
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>
    <script src="js/register.js"></script>
</head>

<body>
    <!-- Componente NavBar -->
    <?php include("includes/navbar.php"); ?>

    <main class="px-3 px-md-0">
        <!-- Sección Crear Cuenta -->
        <section class="py-3 py-md-5">
            <div class="container p-4 my-5 authentication-form p-md-5">
                <div id="mensajeAlert rounded">
                    <?php if (!empty($errorMessage)): ?>
                        <div class="alert alert-danger d-flex align-items-center custom-alerts" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                            </svg>
                            <div class="ms-2">
                                <?php echo $errorMessage; ?>
                            </div>
                        <?php endif; ?>
                    </div>
<<<<<<< HEAD
=======
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
                    <!-- Password Help -->
                    <div class="mb-3">
                        <small id="passwordHelp" class="form-help">La contraseña debe tener al menos 8
                            caracteres, una mayúscula, una minúscula y un caracter no alfanumérico.</small>
                    </div>
                    <!-- Captcha -->
                    <div class="mb-3">
                        <label for="captcha">Captcha</label><span> *</span>
                        <img src="/includes/genCaptchaMath.php" alt="CaptchaImg" class="captcha" id="img-codigo">
                        <input type="text" class="form-control" id="captcha" placeholder="Introduzca el captcha"
                            name="captcha" required>
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
                            <input class="form-check-input" type="checkbox" name="terms" id="termsCheckbox"> Acepto los <a
                                href="legal.php">Términos de Uso</a>.
                        </label>
                    </div>
                    <!-- Botón Crear Cuenta -->
                    <div class="d-flex flex-column ">
                        <button type="submit" name="submit" class="btn" id="btnCrearCuenta" disabled>Crear cuenta</button>
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
>>>>>>> 2008f855b0515dd0fe470cd9017713f2155d700a

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
                                <input type="text" class="form-control" id="phone"
                                    placeholder="Introduzca su tel&eacute;fono" name="phone" required>
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
                                <input type="password" class="form-control" id="pwd"
                                    placeholder="Introduzca su contraseña" name="pswd" required
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{8,}">
                            </div>
                            <!-- Confirm Password -->
                            <div class="col-12 col-md-6">
                                <label for="pwd2">Confirmar contraseña</label><span> *</span>
                                <input type="password" class="form-control" id="pwd2"
                                    placeholder="Confirme su contraseña" name="pswd2" required>
                            </div>
                        </div>
                        <!-- Password Help -->
                        <div class="mb-3">
                            <small id="passwordHelp" class="form-help">La contraseña debe tener al menos 8
                                caracteres, una mayúscula, una minúscula y un caracter no alfanumérico.</small>
                        </div>
                        <!-- Captcha -->
                        <div class="mb-3">
                            <label for="captcha">Captcha</label><span> *</span>
                            <img src="/includes/genCaptcha.php" alt="CaptchaImg" class="captcha" id="img-codigo">
                            <input type="text" class="form-control" id="captcha" placeholder="Introduzca el captcha"
                                name="captcha" required>
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
                                <input class="form-check-input" type="checkbox" name="terms" id="termsCheckbox"> Acepto
                                los
                                <a href="legal.php">Términos de Uso</a>.
                            </label>
                        </div>
                        <!-- Botón Crear Cuenta -->
                        <div class="d-flex flex-column ">
                            <button type="submit" name="submit" class="btn" id="btnCrearCuenta" disabled>Crear
                                cuenta</button>
                        </div>
                        <?php
                        if (isset($_POST["submit"])) {
                            if (!$success) {
                                echo "<p class='error'>Ha sido un errro. Por favor comuníquelo al administrador</p>";
                            } else if (!$validEmail) {
                                $errorMessage = "El correo que has elegido ya existe. Por favor, elige otro.";
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