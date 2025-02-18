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
        <!-- Sección Recuperar Contraseña -->
        <section class="py-3 py-md-5">
            <div class="container p-4 my-5 authentication-form p-md-5">
                <!-- Encabezado -->
                <div class="row">
                    <h1>Recuperar contraseña</h1>
                </div>
                <!-- Formulario-->
                <form action="login.php">
                    <!-- Email Input-->
                    <div class="mt-3 mb-5 mt-md-5">
                        <label for="email1">Correo electrónico</label><span> *</span>
                        <input type="email" class="form-control" id="email1"
                            placeholder="Introduzca su correo electrónico" name="email">
                    </div>
                    <!-- Botón Recuperar Contraseña -->
                    <div class="d-flex flex-column ">
                        <button type="submit" class="btn">Recuperar contraseña</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>