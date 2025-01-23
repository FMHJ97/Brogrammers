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
                <li class="nav-item">
                    <a class="nav-link cart-icon d-none d-md-block" href="./cart.php"><i class="bi bi-cart2"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="bi bi-person-circle"></i>
                        <?php
                        if (isset($_SESSION['logged'])) {
                            echo "<span class='username'>" . $_SESSION['logged']->nombre . "</span>";
                        }
                        ?>
                    </a>
                </li>
            </ul>
        </div>

    </div>
    <!-- Login Modal -->
    <div class="modal" id="loginModal">
        <div class="modal-dialog custom-modal-dialog-login">
            <div class="modal-content custom-modal-content-login">
                <!-- Modal body -->
                <div class="modal-body custom-modal-body-login">
                    <div class="authentication-form">
                        <!-- Encabezado -->
                        <h1>Iniciar Sesión</h1>
                        <div class="mb-4 d-flex flex-column flex-md-row justify-content-center">
                            <p class="mb-0">¿No tienes una cuenta?&nbsp;</p>
                            <a href="register.php">Regístrate</a>
                        </div>
                        <!-- Formulario -->
                        <form action="index.php">
                            <div class="mb-3">
                                <label for="email">Correo electrónico</label><span> *</span>
                                <input type="email" class="form-control" id="email"
                                    placeholder="Introduzca su correo electrónico" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="pwd">Contraseña</label><span> *</span>
                                <input type="password" class="form-control" id="pwd"
                                    placeholder="Introduzca su contraseña" name="pswd">
                            </div>
                            <div class="mb-4 form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="remember"> Recuérdame
                                </label>
                            </div>
                            <button type="submit" class="mb-3 btn">Iniciar sesión</button>
                            <a id="reset_pwd" href="restore_password.php">¿Olvidó su contraseña?</a>
                        </form>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer custom-modal-footer-login">
                    <button type="button" class="button-ticket" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>


</nav>