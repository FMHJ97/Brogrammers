<?php
/* Importamos los ficheros necesarios. */
require_once '../framework-php-bootstrap/controller/usuarioController.php';
require_once '../framework-php-bootstrap/model/usuario.php';

// Propago la sesión si existe la cookie PHPSESSID.
if (isset($_COOKIE['PHPSESSID']))
    session_start();

/* Si pulsamos sobre el botón Cerrar Sesión. */
if (isset($_POST['logout'])) {
    // Destruimos la sesión.
    session_unset();
    session_destroy();
    setcookie("PHPSESSID", "", time() - 3600, "/"); // Eliminación en el cliente.
    // Cargamos la página actual.
    header('Location: ' . $_SERVER['REQUEST_URI']);
}

/* Si pulsamos sobre el botón Iniciar Sesión. */
if (isset($_POST['login'])) {
    // Recogemos los datos del formulario.
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    // Comprobamos si el usuario existe en la base de datos.
    $usu = UserController::find($email);

    // Si el usuario existe.
    if ($usu) {
        // Comprobamos si la contraseña es correcta.
        if (UserController::validate($usu, $pwd)) {
            // Iniciamos la sesión.
            session_start();
            $_SESSION['logged'] = $usu;
            // Cargamos la página actual.
            header('Location: ' . $_SERVER['REQUEST_URI']);
        } else {
            // Si la contraseña no es correcta, mostramos un mensaje de error.
            echo "<script>alert('Contraseña incorrecta.')</script>";
        }
    } else {
        // Si el usuario no existe, mostramos un mensaje de error.
        echo "<script>alert('Usuario no encontrado.')</script>";
    }
}
?>

<nav class="navbar navbar-expand-md">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">
            <img src="../assets/img/Logo.svg" alt="Festival Logo">
        </a>

        <!-- Right side of the navbar -->

        <!-- The icon cart that will be displayed on mobile devices before the hamburger menu -->
        <a class="nav-link cart-icon d-md-none ms-auto" href="./cart.php"><i class="bi bi-cart2"></i></a>

        <!-- The hamburguer menu -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list"></i>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./lineup.php">LineUp</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./tickets.php">Tickets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./merch.php">Merch</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./gallery.php">Galería</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./infogeneral.php">Info</a>
                </li>
                <?php
                if (isset($_SESSION["logged"])) {


                    if ($_SESSION["logged"]->rol === "admin") {
                ?>

                        <li class="nav-item">
                            <div class="dropdown dd-user">
                                <!-- Icono de Ordenación -->
                                <!-- Botón de Ordenación -->
                                <button id="dropdownMenuButton" type="button" class="btn dropdown-toggle"
                                    data-bs-toggle="dropdown">
                                    Administración
                                </button>
                                <!-- Opciones de Ordenación -->
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a class="dropdown-item" href="./gestion_usuarios.php">Usuarios</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="./gestion_galeria.php">Galería</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="./gestion_merch.php">Merch</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php
                    }
                }

                if (isset($_SESSION['logged'])) {
                    if ($_SESSION['logged']->rol !== 'admin') {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link cart-icon d-none d-md-block" href="./cart.php"><i class="bi bi-cart2"></i></a>
                        </li>
                    <?php
                    }
                    ?>
                    <li class="nav-item">
                        <div class="dropdown dd-user">
                            <!-- Icono de Ordenación -->
                            <!-- Botón de Ordenación -->
                            <button id="dropdownMenuButton" type="button" class="btn dropdown-toggle"
                                data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle"></i>
                                <?php echo $_SESSION['logged']->nombre; ?>
                            </button>
                            <!-- Opciones de Ordenación -->
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li>
                                    <a class="dropdown-item" href="./perfilusuario.php">Ver Perfil</a>
                                </li>
                                <li>
                                    <form action="" method="POST">
                                        <button type="submit" class="dropdown-item" name="logout">Cerrar Sesión</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link-auth" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <i class="bi bi-person-circle"></i>
                        </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>

    </div>
    <!-- Login Modal -->
    <div class="modal" id="loginModal">
        <div class="modal-dialog custom-modal-dialog-login">
            <div class="modal-content custom-modal-content-login">
                <!-- Modal body -->
                <div class="modal-body custom-modal-body-login">
                    <div class="container p-4 my-5 authentication-form p-md-5">
                        <!-- Encabezado -->
                        <div class="row">
                            <!--CF2: No puede haber nada entre row y col-->
                            <h1>Iniciar Sesión</h1>
                            <div class="mb-3 col d-flex flex-column flex-md-row mb-md-4">
                                <p class="mb-0">¿No tienes una cuenta?&nbsp;</p>
                                <!-- Link a Registro -->
                                <a href="register.php">Regístrate</a>
                            </div>
                        </div>
                        <!-- Formulario -->
                        <form action="" method="POST">
                            <!-- Email Input -->
                            <div class="mt-3 mb-3">
                                <label for="email">Correo electrónico</label><span> *</span>
                                <input type="email" class="form-control" id="email"
                                    placeholder="Introduzca su correo electrónico" name="email" required
                                    pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
                            </div>
                            <!-- Password Input -->
                            <div class="mb-3">
                                <label for="pwd">Contraseña</label><span> *</span>
                                <input type="password" class="form-control" id="pwd"
                                    placeholder="Introduzca su contraseña" name="pwd">
                            </div>
                            <!-- Remember me checkbox -->
                            <div class="mb-4 form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="remember"> Recuérdame
                                </label>
                            </div>
                            <!-- Botón Iniciar Sesión y Link a Recuperar Contraseña -->
                            <div>
                                <button type="submit" class="mb-3 btn" name="login">Iniciar sesión</button>
                                <div class="gap-2 d-flex justify-content-between flex-column flex-md-row align-items-end align-items-md-center">
                                    <a href="login.php" id="loginGoogle"><img src="../assets/img/google-imagotipo.svg"
                                            alt="Login con Google"></a>
                                    <a id="reset_pwd" href="restore_password.php" class="">¿Olvidó su
                                        contraseña?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</nav>