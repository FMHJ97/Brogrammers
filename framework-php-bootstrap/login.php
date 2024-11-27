<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>
</head>

<body>
    <!-- Componente NavBar -->
    <?php include("includes/navbar.php"); ?>

    <main>
        <!-- Sección Login-->
        <section class="py-md-5">
            <div class="container authentication-form my-5 p-5">
                <!-- Encabezado -->
                <div class="row">
                    <h1>Iniciar Sesión</h1>
                    <div class="col d-flex flex-column flex-md-row mb-3 mb-md-4">
                        <p class="mb-0">¿No tienes una cuenta?&nbsp;</p>
                        <!-- Link a Registro -->
                        <a href="register.php">Regístrate</a>
                    </div>
                </div>
                <!-- Formulario -->
                <form action="">
                    <!-- Email Input -->
                    <div class="mb-3 mt-3">
                        <label for="email">Correo electrónico</label><span> *</span>
                        <input type="email" class="form-control" id="email"
                            placeholder="Introduzca su correo electrónico" name="email">
                    </div>
                    <!-- Password Input -->
                    <div class="mb-3">
                        <label for="pwd">Contraseña</label><span> *</span>
                        <input type="password" class="form-control" id="pwd" placeholder="Introduzca su contraseña"
                            name="pswd">
                    </div>
                    <!-- Remember me checkbox -->
                    <div class="form-check mb-4">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="remember"> Recuérdame
                        </label>
                    </div>
                    <!-- Botón Iniciar Sesión y Link a Recuperar Contraseña -->
                    <div class="d-flex flex-column ">
                        <button type="submit" class="btn mb-3">Iniciar sesión</button>
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