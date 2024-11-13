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
        <!-- Restore Password Section-->
        <section>
            <div class="container authentication-form">
                <!-- Restore Password Section Heading-->
                <div class="row">
                    <h1>Recuperar contraseña</h1>
                </div>
                <!-- Restore Password Form-->
                <form action="">
                    <!-- Email Input-->
                    <div class="mb-5 mt-5">
                        <label for="email">Correo electrónico</label><span> *</span>
                        <input type="email" class="form-control" id="email"
                            placeholder="Introduzca su correo electrónico" name="email">
                    </div>
                    <!-- Restore Password Button -->
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