<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>
</head>

<body>
    <!-- Navigation Bar -->
    <?php include("includes/navbar.php"); ?>

    <main>
        <!-- Login Section-->
        <section>
            <div class="container authentication-form">
                <!-- Login Section Heading-->
                <div class="row">
                    <h1>Iniciar Sesión</h1>
                    <div class="col d-flex flex-column flex-md-row">
                        <p>¿No tienes una cuenta?</p>
                        <a href="register.php">Regístrate</a>
                    </div>
                </div>
                <!-- Login Form-->
                <form action="">
                    <!-- Email Input-->
                    <div class="mb-3 mt-3">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" class="form-control" id="email"
                            placeholder="Introduzca su correo electrónico" name="email">
                    </div>
                    <!-- Password Input-->
                    <div class="mb-3">
                        <label for="pwd">Contraseña:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Introduzca su contraseña"
                            name="pswd">
                    </div>
                    <!-- Remember me checkbox-->
                    <div class="form-check mb-3">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Recuérdame
                        </label>
                    </div>
                    <div class="row d-flex flex-column">
                        <!-- Login Button-->
                        <button type="submit" class="btn">Iniciar sesión</button>
                        <!-- Forgot Password Link-->
                        <a id="reset_pwd" href="restore_password.php">¿Olvidó su contraseña?</a>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>