<?php include("includes/a_config.php"); ?>
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
                <form action="index.php">
                    <!-- Nombre Input-->
                    <div class="mt-3 mb-3">
                        <label for="name">Nombre</label><span> *</span>
                        <input type="text" class="form-control" id="name" placeholder="Introduzca su nombre"
                            name="name">
                    </div>
                    <!-- Primer apellido Input-->
                    <div class="mt-3 mb-3">
                        <label for="surname1">Primer Apellido</label><span> *</span>
                        <input type="text" class="form-control" id="surname1"
                            placeholder="Introduzca su primer apellido" name="surname1">
                    </div>
                    <!-- Segundo apellido Input-->
                    <div class="mt-3 mb-3">
                        <label for="surname2">Segundo Apellido</label>
                        <input type="text" class="form-control" id="surname2"
                            placeholder="Introduzca su segundo apellido" name="surname2">
                    </div>
                    <!-- Fecha nacimiento Input-->
                    <div class="mt-3 mb-3">
                        <label for="birth">Fecha de Nacimiento</label><span> *</span>
                        <input type="date" class="form-control" id="birth"
                            placeholder="Introduzca su fecha de nacimiento" name="birth">
                    </div>
                    <!-- Pais Input-->
                    <div class="mt-3 mb-3">
                        <label for="country">Pa&iacute;s</label><span> *</span>
                        <input type="text" class="form-control" id="country" placeholder="Introduzca su pa&iacute;s"
                            name="country">
                    </div>
                    <!-- Codigo postal Input-->
                    <div class="mt-3 mb-3">
                        <label for="postal">C&oacute;digo Postal</label><span> *</span>
                        <input type="text" class="form-control" id="postal"
                            placeholder="Introduzca su c&oacute;digo postal" name="postal">
                    </div>
                    <!-- Teléfono Input-->
                    <div class="mt-3 mb-3">
                        <label for="phone">Tel&eacute;fono</label><span> *</span>
                        <input type="text" class="form-control" id="phone" placeholder="Introduzca su tel&eacute;fono"
                            name="phone">
                    </div>
                    <!-- Email Input -->
                    <div class="mb-3">
                        <label for="email">Correo electr&oacute;nico</label><span> *</span>
                        <input type="email" class="form-control" id="email"
                            placeholder="Introduzca su correo electr&oacute;nico" name="email">
                    </div>
                    <!-- Password Input -->
                    <div class="mb-3">
                        <label for="pwd">Contraseña</label><span> *</span>
                        <input type="password" class="form-control" id="pwd" placeholder="Introduzca su contraseña"
                            name="pswd">
                    </div>
                    <!-- Comfirm Password Input-->
                    <div class="mb-3">
                        <label for="pwd2">Confirmar contraseña</label><span> *</span>
                        <input type="password" class="form-control" id="pwd2" placeholder="Confirme su contraseña"
                            name="pswd2">
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
                        <button type="submit" class="btn">Crear cuenta</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!-- Componente Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>