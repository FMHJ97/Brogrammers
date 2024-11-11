<nav class="navbar navbar-expand-md">
    <div class="container-fluid">

        <div class="d-flex align-items-center justify-content-start">
            <a class="navbar-brand" href="./index.php">
                <img src="../assets/img/Logo.svg" alt="Festival Logo">
            </a>
        </div>

        <!-- Right side of the navbar -->

        <div class="d-flex flex-row justify-content-end align-items-center">

            <!-- The icon cart that will be displayed on mobile devices before the hamburger menu -->
            <a class="nav-link cart-icon d-md-none" href="./cart.php"><i class="bi bi-cart2"></i></a>

            <!-- The hamburguer menu -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>

            <!-- Navbar links -->

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
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
                        <a class="nav-link" href="./gallery.php">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./info.php">Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cart-icon d-none d-md-block" href="./cart.php"><i
                                class="bi bi-cart2"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./login.php"><i class="bi bi-person-circle"></i></a>
                    </li>
                </ul>
            </div>

        </div>

    </div>

</nav>