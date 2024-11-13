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
        <!-- Register Section-->
        <section>
            <div class="container authentication-form">
                <!-- Register Section Heading-->
                <div class="row">
                    <h1>Crear cuenta</h1>
                    <div class="col d-flex flex-column flex-md-row mb-3 mb-md-4">
                        <p class="mb-0">¿Ya tienes una cuenta?&nbsp;</p>
                        <a href="login.php">Inicia sesión</a>
                    </div>
                </div>
                <!-- Register Form-->
                <form action="">
                    <!-- Full name Input-->
                    <div class="mb-3 mt-3">
                        <label for="full_name">Nombre completo</label>
                        <input type="text" class="form-control" id="full_name"
                            placeholder="Introduzca su nombre completo" name="full_name">
                    </div>
                    <!-- Email Input-->
                    <div class="mb-3">
                        <label for="email">Correo electrónico</label><span> *</span>
                        <input type="email" class="form-control" id="email"
                            placeholder="Introduzca su correo electrónico" name="email">
                    </div>                    
                    <!-- Password Input-->
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
                    <div class="form-check mb-3">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="news"> Deseo recibir noticias e información sobre GroundSound Festival.
                        </label>
                    </div>
                    <!-- Terms checkbox-->
                    <div class="form-check mb-5">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="terms"> Acepto los Términos de Uso.
                        </label>
                    </div>                    
                    <!-- Register Button -->
                    <div class="d-flex flex-column ">
                        <button type="submit" class="btn">Crear cuenta</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>