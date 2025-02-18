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

// Lista de países válidos 
$paisesValidos = [
    'España',
    'Francia',
    'Portugal',
    'Alemania',
    'Italia',
    'Andorra',
    'Reino Unido',
    'Estados Unidos',
    'Canadá',
    'México',
    'Argentina',
    'Brasil',
    'Chile',
    'Colombia',
    'Ecuador',
    'Perú',
    'Uruguay',
    'Venezuela',
    'Bolivia',
    'Paraguay',
    'Panamá',
    'Costa Rica',
    'Cuba',
    'Puerto Rico',
    'República Dominicana',
    'Guatemala',
    'Honduras',
    'El Salvador',
    'Suiza',
    'Suecia',
    'Noruega',
    'Finlandia',
    'Dinamarca',
    'Rusia',
    'China',
    'Japón',
    'Corea del Sur',
    'India',
    'Australia',
    'Nueva Zelanda',
    'Sudáfrica',
    'Egipto'
];

// Obtener el objeto Usuario de la sesión.
$usuario = $_SESSION['logged'];

$alertMessage = "";
$alertType = "";

// Procesar actualización de datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errores = [];

    // Validar campos
    if (!preg_match("/^\d{5}$/", $_POST['cp'])) {
        $errores[] = "Código postal inválido";
    }

    if (!preg_match("/^[6789]\d{8}$/", $_POST['tlf'])) {
        $errores[] = "Teléfono inválido";
    }

    if (!in_array($_POST['pais'], $paisesValidos)) {
        $errores[] = "País no válido";
    }

    // Validar contraseña solo si se completa alguno de los campos
    if (!empty($_POST['pwd']) || !empty($_POST['pwd2'])) {
        $passwordRegex = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*\W).{8,}$/";
        if (!preg_match($passwordRegex, $_POST['pwd'])) {
            $errores[] = "La contraseña no cumple los requisitos";
        } elseif ($_POST['pwd'] !== $_POST['pwd2']) {
            $errores[] = "Las contraseñas no coinciden";
        }
    }

    // Procesar imagen subida
    $nuevaImagen = $usuario->img_perfil; // Mantener la imagen actual por defecto

    if (isset($_FILES['imagen_perfil']) && $_FILES['imagen_perfil']['error'] === UPLOAD_ERR_OK) {
        $directorioDestino = 'assets/img/users/';
        $nombreArchivo = uniqid() . '_' . basename($_FILES['imagen_perfil']['name']);
        $rutaCompleta = $directorioDestino . $nombreArchivo;

        // Validar tipo de archivo
        $extensionesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];
        $extension = strtolower(pathinfo($rutaCompleta, PATHINFO_EXTENSION));

        if (in_array($extension, $extensionesPermitidas)) {
            if (move_uploaded_file($_FILES['imagen_perfil']['tmp_name'], $rutaCompleta)) {
                $nuevaImagen = $rutaCompleta;

                // Eliminar imagen anterior si no es la dummy
                if ($usuario->img_perfil && file_exists($usuario->img_perfil) && !str_contains($usuario->img_perfil, 'dummy_user.png')) {
                    unlink($usuario->img_perfil);
                }
            }
        } else {
            $errores[] = "Formato de imagen no válido. Use JPG, PNG o GIF.";
        }
    }

    if (empty($errores)) {
        // Crear usuario actualizado (mantener contraseña actual si no se cambia)
        $nuevaContrasena = !empty($_POST['pwd']) ? password_hash($_POST['pwd'], PASSWORD_DEFAULT) : $usuario->clave;

        $usuarioActualizado = new Usuario(
            $usuario->id,
            $usuario->nombre,
            $usuario->apellido1,
            $usuario->apellido2,
            $usuario->correo,
            $nuevaContrasena,
            $_POST['fecha_nac'],
            $_POST['pais'],
            $_POST['cp'],
            $_POST['tlf'],
            $nuevaImagen,
            $usuario->rol
        );

        if (UserController::modificar2($usuarioActualizado)) {
            $_SESSION['logged'] = $usuarioActualizado;
            // Borraremos la sesión guardando el id para volver a iniciarla y que se actualicen los datos
            $id = $usuarioActualizado->id;
            unset($_SESSION['logged']);
            $_SESSION['logged'] = UserController::getById($id);
            $usuario = $_SESSION['logged'];

            $alertMessage = "Datos actualizados correctamente";
            $alertType = "success";
        } else {
            $alertMessage = "Error al actualizar los datos";
            $alertType = "danger";
        }
    } else {
        $alertMessage = implode("<br>", $errores);
        $alertType = "danger";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>
    <script src="./js/gestion.js"></script>
    <script src="./js/perfilusuario.js"></script>
</head>

<body>
    <!-- Componente NavBar -->
    <?php include("includes/navbar.php"); ?>

    <main>
        <section class="py-3 py-md-5">

            <!-- Mostrar alertas -->
            <?php if (!empty($alertMessage)): ?>
                <div class="alert alert-<?php echo $alertType; ?> alert-dismissible fade show custom-alert-gestion"
                    role="alert">
                    <?php if ($alertType == "success"): ?>
                        <!-- Ícono de éxito -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg>
                    <?php else: ?>
                        <!-- Ícono de error -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                        </svg>
                    <?php endif; ?>
                    <strong><?php echo $alertMessage; ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <!-- Primera Fila -->
            <div class="container p-4 my-5 authentication-form p-md-5">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Imagen e Información -->
                    <div class="mb-3 text-center row justify-content-center text-md-start">
                        <!-- Imagen del Usuario -->
                        <div class="mb-4 col-md-4 ">
                            <div class="image-container">
                                <label for="imagenInput">
                                    <img src="<?php echo ($usuario->img_perfil != null && file_exists($usuario->img_perfil)) ? $usuario->img_perfil : 'assets/img/dummy/dummy_user.png'; ?>"
                                        alt="Foto de perfil" class="img-fluid rounded-circle img-usuario"
                                        id="imagenPrevisualizacion">
                                    <div class="image-overlay" id="imageOverlay">
                                        <span>Cambiar imagen</span>
                                    </div>
                                </label>
                                <input type="file" id="imagenInput" name="imagen_perfil" accept="image/*"
                                    style="display: none;">
                            </div>
                        </div>
                        <!-- Información del Usuario -->
                        <div class="col-md-8 d-flex flex-column justify-content-center align-items-md-end">
                            <div class="gap-3 row">
                                <div
                                    class="col-md-12 d-flex flex-column justify-content-center align-items-center align-items-md-end">
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
                    <!-- Formulario de Modificación de Datos -->
                    <!-- <form action="" method="post"> -->
                    <div class="row">
                        <h3>Información Personal</h3>
                        <div class="col-md-6">
                            <div class="mt-3 mb-3">
                                <label for="pais">País</label>
                                <select class="form-control" id="pais" name="pais">
                                    <?php foreach ($paisesValidos as $pais): ?>
                                        <option value="<?php echo $pais; ?>"
                                            <?php echo ($pais == $usuario->pais) ? 'selected' : ''; ?>>
                                            <?php echo $pais; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mt-3 mb-3">
                                <label for="cp">Código Postal</label>
                                <input type="text" class="form-control" id="cp"
                                    placeholder="Introduzca su código postal" name="cp"
                                    value="<?php echo htmlspecialchars($usuario->codigo_postal); ?>">
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
                                    <label for="pwd1">Contraseña</label>
                                    <input type="password" class="form-control" id="pwd1"
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
                </form>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <?php include("includes/footer.php"); ?>
</body>

</html>