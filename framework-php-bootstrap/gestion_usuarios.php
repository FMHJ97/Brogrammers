<?php include("includes/a_config.php");

require_once '../framework-php-bootstrap/controller/usuarioController.php';
require_once '../framework-php-bootstrap/model/usuario.php';

// Variables para mostrar mensajes de alerta.
$alertMessage = "";
$alertType = "";

// Si pulsamos el botón de confirmar cambios.
if (isset($_POST["confirm"])) {
    $uNuevo = new Usuario(null, $_POST["name"], $_POST["surname1"], $_POST["surname2"], $_POST["email"], $_POST["pswd"], $_POST["birth"], $_POST["country"], $_POST["postal"], $_POST["phone"], null, $_POST["role"]);
    if (UserController::modificar($uNuevo)) {
        $alertMessage = "Usuario modificado correctamente.";
        $alertType = "success";
    } else {
        $alertMessage = "Error al modificar el usuario.";
        $alertType = "danger";
    }
    // Recargamos la página enviando el mensaje de alerta.
    header("Location: gestion_usuarios.php?alertMessage=" . urlencode($alertMessage) . "&alertType=" . urlencode($alertType));
    exit();
}

// Si pulsamos el botón de eliminar usuario.
if (isset($_POST["delete"])) {
    if (UserController::delete($_POST["email"])) {
        $alertMessage = "Usuario eliminado correctamente.";
        $alertType = "success";
    } else {
        $alertMessage = "Error al eliminar el usuario.";
        $alertType = "danger";
    }
    // Recargamos la página enviando el mensaje de alerta.
    header("Location: gestion_usuarios.php?alertMessage=" . urlencode($alertMessage) . "&alertType=" . urlencode($alertType));
    exit();
}

// Obtener usuarios según los filtros.
$users = null;
if (isset($_POST["todos"]) && !isset($_POST["edit"])) {
    $users = UserController::getAll();
} else if (isset($_POST["admin"]) && !isset($_POST["edit"])) {
    $users = UserController::getAllByRole("admin");
} else if (isset($_POST["editor"]) && !isset($_POST["edit"])) {
    $users = UserController::getAllByRole("editor");
} else if (isset($_POST["usuario"]) && !isset($_POST["edit"])) {
    $users = UserController::getAllByRole("usuario");
} else if (isset($_POST["buscaNombre"]) && !isset($_POST["edit"])) {
    $users = UserController::getAllByName($_POST["search"]);
} else {
    $users = UserController::getAll();
}

// Si hay un mensaje de alerta, lo mostramos.
if (isset($_GET['alertMessage']) && isset($_GET['alertType'])) {
    $alertMessage = urldecode($_GET['alertMessage']);
    $alertType = urldecode($_GET['alertType']);
}
?>

<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>
    <script src="./js/gestion.js"></script>
</head>

<body>
    <!-- Barra de navegación -->
    <?php include("includes/navbar.php"); ?>

    <!-- Alerta -->
    <?php if (!empty($alertMessage)): ?>
        <div class="alert alert-<?php echo $alertType; ?> alert-dismissible fade show custom-alert-gestion" role="alert">
            <?php if ($alertType == "success"): ?>
                <!-- Ícono de éxito -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
            <?php else: ?>
                <!-- Ícono de error -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill"
                    viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z" />
                </svg>
            <?php endif; ?>
            <strong><?php echo $alertMessage; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <main class="px-3 d-block px-md-0">
        <section class="page-section">
            <div class="container">
                <!-- Fila con títulos -->
                <div class="text-center row d-flex page-section-heading">
                    <div class="col">
                        <h3 class="step-title active">Usuarios</h3>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="px-0 mx-auto col-md-10 px-md-2">
                        <form class="mb-3" action="" method="post">
                            <div class="row g-2">
                                <!-- Categorías -->
                                <div class="col-12 col-md-auto">
                                    <div
                                        class="flex-wrap btn-category-group d-flex justify-content-center justify-content-md-start">
                                        <button type="input" name="todos"
                                            class="btn btn-category-item <?php if (isset($_POST["todos"])) echo "selected" ?>">Todos</button>
                                        <button type="input" name="admin"
                                            class="btn btn-category-item <?php if (isset($_POST["admin"])) echo "selected" ?>">Admin</button>
                                        <button type="input" name="editor"
                                            class="btn btn-category-item <?php if (isset($_POST["editor"])) echo "selected" ?>">Editor</button>
                                        <button type="input" name="usuario"
                                            class="btn btn-category-item <?php if (isset($_POST["usuario"])) echo "selected" ?>">Usuario</button>
                                    </div>
                                </div>
                                <!-- Barra de búsqueda -->
                                <div class="col-12 col-md">
                                    <div class="search-bar d-flex justify-content-center justify-content-md-end">
                                        <label for="search" class="visually-hidden">Buscar usuarios</label>
                                        <input id="search" type="text" class="form-control-search w-100"
                                            placeholder="Buscar usuarios" name="search"
                                            value="<?php if (isset($_POST["buscaNombre"])) echo $_POST["search"] ?>">
                                        <button class="btn btn-search" name="buscaNombre" type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <?php if ($users != null && !isset($_POST["edit"])): ?>
                            <div class="table-responsive-md">
                                <table class="table table-cart table-borderless table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center col-4">
                                                <h5>Nombre</h5>
                                            </th>
                                            <th class="text-center col-4">
                                                <h5>Correo</h5>
                                            </th>
                                            <th class="text-center col-2">
                                                <h5>Rol</h5>
                                            </th>
                                            <th class="text-center col-2">
                                                <h5>Acción</h5>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $u): ?>
                                            <tr>
                                                <form method="post">
                                                    <input type="hidden" name="email" value="<?php echo $u->correo ?>">
                                                    <td class="text-center align-middle col-4">
                                                        <?php echo $u->nombre . " " . $u->apellido1 . " " . $u->apellido2 ?>
                                                    </td>
                                                    <td class="text-center align-middle col-4">
                                                        <?php echo $u->correo ?>
                                                    </td>
                                                    <td class="text-center align-middle col-2">
                                                        <?php echo $u->rol ?>
                                                    </td>
                                                    <td class="text-center align-middle col-2">
                                                        <button class="mx-auto btn btn-category-item" type="submit"
                                                            name="edit">Modificar</button>
                                                    </td>
                                                </form>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php elseif (!isset($_POST["edit"])): ?>
                            <p class="error">No se ha encontrado dicho(s) usuario(s)</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <?php if (isset($_POST["edit"])): ?>
            <?php
            $u = UserController::find($_POST["email"]);
            ?>
            <section>
                <div class="container p-4 my-5 authentication-form p-md-5">
                    <!-- Formulario de edición -->
                    <form action="" method="post">
                        <!-- Nombre Input -->
                        <div class="mt-3 mb-3 row">
                            <div class="mb-3 col-12 col-md-6 mb-md-0">
                                <label for="name">Nombre</label><span> *</span>
                                <input type="text" class="form-control" id="name" value="<?php echo $u->nombre ?>"
                                    name="name" required>
                            </div>
                            <!-- Rol -->
                            <div class="mb-3 col-12 col-md-6 mb-md-0">
                                <label for="role">Rol</label><span> *</span>
                                <select name="role" id="role" class="form-control">
                                    <option value="usuario" <?php if ($u->rol == "usuario") echo "selected" ?>>Usuario
                                    </option>
                                    <option value="editor" <?php if ($u->rol == "editor") echo "selected" ?>>Editor</option>
                                    <option value="admin" <?php if ($u->rol == "admin") echo "selected" ?>>Admin</option>
                                </select>
                            </div>
                        </div>
                        <!-- Primer y Segundo apellido Input -->
                        <div class="mt-3 mb-3 row">
                            <!-- Primer apellido -->
                            <div class="mb-3 col-12 col-md-6 mb-md-0">
                                <label for="surname1">Primer Apellido</label><span> *</span>
                                <input type="text" class="form-control" id="surname1" value="<?php echo $u->apellido1 ?>"
                                    name="surname1" required>
                            </div>
                            <!-- Segundo apellido -->
                            <div class="col-12 col-md-6">
                                <label for="surname2">Segundo Apellido</label>
                                <input type="text" class="form-control" id="surname2" value="<?php echo $u->apellido2 ?>"
                                    name="surname2">
                            </div>
                        </div>
                        <!-- Fecha y País Input -->
                        <div class="mt-3 mb-3 row">
                            <!-- Fecha nacimiento -->
                            <div class="mb-3 col-12 col-md-6 mb-md-0">
                                <label for="birth">Fecha de Nacimiento</label><span> *</span>
                                <input type="date" class="form-control" id="birth" value="<?php echo $u->fecha_nac ?>"
                                    name="birth" required>
                            </div>
                            <!-- País -->
                            <div class="col-12 col-md-6">
                                <label for="country">País</label><span> *</span>
                                <input type="text" class="form-control" id="country" value="<?php echo $u->pais ?>"
                                    name="country" required>
                            </div>
                        </div>
                        <!-- Código postal y Teléfono Input -->
                        <div class="mt-3 mb-3 row">
                            <!-- Código postal -->
                            <div class="mb-3 col-12 col-md-6 mb-md-0">
                                <label for="postal">Código Postal</label><span> *</span>
                                <input type="text" class="form-control" id="postal" value="<?php echo $u->codigo_postal ?>"
                                    name="postal" required>
                            </div>
                            <!-- Teléfono -->
                            <div class="col-12 col-md-6">
                                <label for="phone">Teléfono</label><span> *</span>
                                <input type="text" class="form-control" id="phone" value="<?php echo $u->telefono ?>"
                                    name="phone" required>
                            </div>
                        </div>
                        <!-- Email Input -->
                        <div class="mb-3">
                            <label for="email">Correo electrónico</label><span> *</span>
                            <input readonly type="email" class="form-control" id="email" value="<?php echo $u->correo ?>"
                                name="email" required>
                        </div>
                        <!-- Password y Confirm Password Input -->
                        <div class="mt-3 mb-3 row">
                            <!-- Password -->
                            <div class="mb-3 col-12 col-md-6 mb-md-0">
                                <label for="pwd">Contraseña</label><span> *</span>
                                <input type="password" class="form-control" id="pwd" placeholder="Introduzca su contraseña"
                                    name="pswd">
                            </div>
                            <!-- Confirm Password -->
                            <div class="col-12 col-md-6">
                                <label for="pwd2">Confirmar contraseña</label><span> *</span>
                                <input type="password" class="form-control" id="pwd2" placeholder="Confirme su contraseña"
                                    name="pswd2">
                            </div>
                        </div>
                        <div class="mb-3">
                            <small id="passwordHelp" class="form-help">La contraseña debe tener al menos 8 caracteres, una
                                mayúscula, una minúscula y un caracter no alfanumérico.</small>
                        </div>
                        <!-- Botón Confirmar cambios -->
                        <div class="mb-2 d-flex flex-column">
                            <button type="submit" name="confirm" class="btn">Confirmar cambios</button>
                        </div>
                        <div class="d-flex flex-column">
                            <!-- Botón Borrar Usuario -->
                            <button id="button1" class="btn" type="button">Borrar Usuario</button>
                            <!-- Botón Confirmar Eliminación -->
                            <button id="button2" style="display: none;" type="submit" name="delete" class="btn">¿Estás
                                Seguro?</button>
                        </div>
                    </form>
                </div>
            </section>
        <?php endif; ?>
    </main>

    <!-- Pie de página -->
    <?php include("includes/footer.php"); ?>

    <!-- Script para alertas -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Limpiar parámetros de la URL
            if (window.location.search.includes('alertMessage')) {
                history.replaceState(null, null, window.location.pathname);
            }

            // Auto cerrar alertas después de 5 segundos
            const alert = document.querySelector('.custom-alert-gestion');
            if (alert) {
                setTimeout(() => {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                    setTimeout(() => alert.remove(), 150);
                }, 5000);
            }

            // Lógica para el botón de borrar usuario
            const button1 = document.getElementById("button1");
            const button2 = document.getElementById("button2");

            if (button1 && button2) {
                button1.addEventListener("click", function(event) {
                    button2.style.display = "inline";
                    button1.style.display = "none";
                    event.preventDefault();
                });

                const form = document.querySelector("form");
                form.addEventListener("submit", function(event) {
                    if (button2.style.display === "none") {
                        event.preventDefault();
                    }
                });
            }
        });
    </script>
</body>

</html>