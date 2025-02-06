<?php include("includes/a_config.php"); ?>
<?php
/* Importamos los ficheros necesarios. */
require_once '../framework-php-bootstrap/controller/usuarioController.php';
require_once '../framework-php-bootstrap/model/usuario.php';


if (!isset($_SESSION['logged'])) {
    // Si no hay sesión, redirigir al inicio de sesión.
    header("Location: login.php");
    exit();
}

// Obtener el objeto Usuario de la sesión.
$usuario = $_SESSION['logged'];
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
                <div class="row justify-content-center text-center text-md-start mb-3">
                    <!-- Imagen del Usuario -->
                    <div class="mb-4 col-md-4 ">
                        <img src="<?php echo (!empty($usuario->img_perfil)) ? $usuario->img_perfil : 'assets/img/dummy/dummy_user.png'; ?>"
                            alt="Foto de perfil del usuario" class="img-fluid rounded-circle img-usuario">
                    </div>
                    <!-- Información del Usuario -->
                    <div class="col-md-8 d-flex flex-column justify-content-center align-items-md-end">
                        <div class="gap-3 row">
                            <div class="col-md-12">
                                <h3>Nombre y Apellidos</h3>
                                <!-- Mostrar el nombre y apellidos del usuario -->
                                <p><?php echo htmlspecialchars($usuario->nombre . ' ' . $usuario->apellido1 . ' ' . $usuario->apellido2); ?>
                                </p>
                                <h3>Correo Electrónico</h3>
                                <!-- Mostrar el correo electrónico del usuario -->
                                <p><?php echo htmlspecialchars($usuario->correo); ?></p>
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
                                name="pais" value="<?php echo htmlspecialchars($usuario->pais); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-3 mb-3">
                            <label for="cp">Código Postal</label>
                            <input type="text" class="form-control" id="cp" placeholder="Introduzca su código postal"
                                name="cp" value="<?php echo htmlspecialchars($usuario->codigo_postal); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-3 mb-3">
                            <label for="tlf">Teléfono</label>
                            <input type="text" class="form-control" id="tlf" placeholder="Introduzca su teléfono"
                                name="tlf" value="<?php echo htmlspecialchars($usuario->telefono); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-3 mb-3">
                            <label for="fecha_nac">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nac" name="fecha_nac"
                                value="<?php echo htmlspecialchars($usuario->fecha_nac); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <h3>Modificar contraseña</h3>
                        <div class="col-md-6">
                            <div class="mt-3 mb-3">
                                <label for="pwd">Contraseña</label>
                                <input type="password" class="form-control" id="pwd"
                                    placeholder="Introduzca su contraseña" name="pwd">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mt-3 mb-3">
                                <label for="pwd2">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="pwd2"
                                    placeholder="Confirme su contraseña" name="pwd2">
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