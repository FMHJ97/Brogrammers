<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php");
    require_once '../framework-php-bootstrap/controller/userScoresController.php';
    require_once '../framework-php-bootstrap/model/userScores.php';

    $scoresFMHJ = UserScoresController::getAllFMHJ();
    $scoresTH = UserScoresController::getAllTH();
    $scoresJMPA = UserScoresController::getAllJMPA();
    $scoresFRM = UserScoresController::getAllFRM();
    ?>
</head>

<body>

    <!-- Navbar -->
    <?php include("includes/navbar.php"); ?>

    <main>
        <!-- Sección de Cabecera -->
        <section class="container page-section">
            <div class="row page-section-heading">
                <h1>Sobre Nosotros</h1>
                <h2>Conoce más sobre el equipo detrás de este proyecto</h2>
            </div>
        </section>

        <!-- Miembros -->
        <section class="container page-section">
            <!-- Primera Fila -->
            <div class="mb-5 row py-md-4">

                <!-- Primer Miembro -->
                <div class="px-4 mb-5 col-md-6 mb-md-0">

                    <!-- Imagen e Información -->
                    <div class="row">
                        <!-- Imagen del Miembro -->
                        <div class="mb-4 col-md-4 about-us-img">
                            <img src="assets/img/dummy/dummy_user.png" alt="Foto de Francisco Manuel Hernández" class="img-fluid">
                        </div>
                        <!-- Información del Miembro -->
                        <div class="col-md-8">
                            <div class="gap-3 row">
                                <div class="col-md-12 about-us-info">
                                    <h3>Francisco Manuel Hernández</h3>
                                    <p>
                                        Estudiante de 2º de CFGS de Desarrollo de Aplicaciones Web.
                                    </p>
                                    <p>
                                        <strong>Videojuego:</strong> Tickets, please!
                                    </p>
                                </div>
                                <div class="col-md-12 d-flex justify-content-center">
                                    <a href="juegoFMHJ.php" target="_blank" class="btn about-us-btn"
                                        aria-label="Iniciar Juego: Tickets, please!" title="Iniciar Juego: Tickets, please!">Iniciar Juego</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Segundo Miembro -->
                <div class="px-4 col-md-6">

                    <!-- Imagen e Información -->
                    <div class="row">
                        <!-- Imagen del Miembro -->
                        <div class="mb-4 col-md-4 about-us-img">
                            <img src="assets/img/dummy/dummy_user.png" alt="Foto de Taylor Horne" class="img-fluid">
                        </div>
                        <!-- Información del Miembro -->
                        <div class="col-md-8">
                            <div class="gap-3 row">
                                <div class="col-md-12 about-us-info">
                                    <h3>Taylor Horne</h3>
                                    <p>
                                        Estudiante de 2º de CFGS de Desarrollo de Aplicaciones Web.
                                    </p>
                                    <p>
                                        <strong>Videojuego:</strong> Cerveztival
                                    </p>
                                </div>
                                <div class="col-md-12 d-flex justify-content-center">
                                    <a href="juegoTaylor.php" target="_blank" class="btn about-us-btn"
                                        aria-label="Iniciar Juego: Cerveztival" title="Iniciar Juego: Cerveztival">Iniciar Juego</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Segunda Fila -->
            <div class="my-5 row">

                <!-- Tercer Miembro -->
                <div class="px-4 mb-5 col-md-6 mb-md-0">

                    <!-- Imagen e Información -->
                    <div class="row">
                        <!-- Imagen del Miembro -->
                        <div class="mb-4 col-md-4 about-us-img">
                            <img src="assets/img/dummy/dummy_user.png" alt="Foto de José Manuel Ponferrada" class="img-fluid">
                        </div>
                        <!-- Información del Miembro -->
                        <div class="col-md-8">
                            <div class="gap-3 row">
                                <div class="col-md-12 about-us-info">
                                    <h3>José Manuel Ponferrada</h3>
                                    <p>
                                        Estudiante de 2º de CFGS de Desarrollo de Aplicaciones Web.
                                    </p>
                                    <p>
                                        <strong>Videojuego:</strong> Tetris
                                    </p>
                                </div>
                                <div class="col-md-12 d-flex justify-content-center">
                                    <a href="juegoJMPA.php" target="_blank" class="btn about-us-btn"
                                        aria-label="Iniciar Juego: Tetris" title="Iniciar Juego: Tetris">Iniciar Juego</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Cuarto Miembro -->
                <div class="px-4 col-md-6">

                    <!-- Imagen e Información -->
                    <div class="row">
                        <!-- Imagen del Miembro -->
                        <div class="mb-4 col-md-4 about-us-img">
                            <img src="assets/img/dummy/dummy_user.png" alt="Foto de Francisco Ruiz" class="img-fluid">
                        </div>
                        <!-- Información del Miembro -->
                        <div class="col-md-8">
                            <div class="gap-3 row">
                                <div class="col-md-12 about-us-info">
                                    <h3>Francisco Ruiz</h3>
                                    <p>
                                        Estudiante de 2º de CFGS de Desarrollo de Aplicaciones Web.
                                    </p>
                                    <p>
                                        <strong>Videojuego:</strong> GroundSound Hero
                                    </p>
                                </div>
                                <div class="col-md-12 d-flex justify-content-center">
                                    <a href="juegoFranRuiz.php" target="_blank" class="btn about-us-btn"
                                        aria-label="Iniciar Juego: GroundSound Hero" title="Iniciar Juego: GroundSound Hero">Iniciar Juego</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section class="container page-section">
            <div class="row page-section-heading">
                <h1>Récords</h1>
            </div>
        </section>

        <!-- Miembros -->
        <section class="container page-section">
            <!-- Primera Fila -->
            <div class="mb-5 row py-md-4">

                <!-- Primer Miembro -->
                <div class="px-4 mb-5 col-md-6 mb-md-0">

                    <!-- Imagen e Información -->
                    <div class="row">
                        <h3>Tickets, please!</h3>
                        <div class="mx-auto table-responsive-md">
                            <table class="table table-about-us table-borderless table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">
                                            <h5>User</h5>
                                        </th>
                                        <th class="text-center align-middle">
                                            <h5>Puntuación</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($scoresFMHJ != null) {
                                        foreach ($scoresFMHJ as $score): ?>
                                            <tr>
                                                <td class="text-center align-middle"><?php echo $score->nombre ?></td>
                                                <td class="text-center align-middle"><?php echo $score->puntos ?></td>
                                            </tr>
                                        <?php endforeach;
                                    } else {
                                        ?>
                                        <tr>
                                            <td class="text-center align-middle">¡¡Sé la primera persona en jugar!!</td>
                                            <td class="text-center align-middle">0</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Segundo Miembro -->
                <div class="px-4 col-md-6">
                    <!-- Imagen e Información -->
                    <div class="row">
                        <h3>Cerveztival</h3>
                        <div class="mx-auto table-responsive-md">
                            <table class="table table-about-us table-borderless table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">
                                            <h5>User</h5>
                                        </th>
                                        <th class="text-center align-middle">
                                            <h5>Puntuación</h5>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($scoresTH != null) {
                                        foreach ($scoresTH as $score): ?>
                                            <tr>
                                                <td class="text-center align-middle"><?php echo $score->nombre ?></td>
                                                <td class="text-center align-middle"><?php echo $score->puntos ?></td>
                                            </tr>
                                        <?php endforeach;
                                    } else {
                                        ?>
                                        <tr>
                                            <td class="text-center align-middle">¡¡Sé la primera persona en jugar!!</td>
                                            <td class="text-center align-middle">0</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Segunda Fila -->
            <div class="my-5 row">

                <!-- Tercer Miembro -->
                <div class="px-4 mb-5 col-md-6 mb-md-0">

                    <!-- Imagen e Información -->
                    <div class="row">

                        <h3>Videojuego JMPA</h3>

                        <div class="mx-auto table-responsive-md">
                            <table class="table table-about-us table-borderless table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">
                                            <h5>User</h5>
                                        </th>
                                        <th class="text-center align-middle">
                                            <h5>Puntuación</h5>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($scoresJMPA != null) {
                                        foreach ($scoresJMPA as $score): ?>
                                            <tr>
                                                <td class="text-center align-middle"><?php echo $score->nombre ?></td>
                                                <td class="text-center align-middle"><?php echo $score->puntos ?></td>
                                            </tr>
                                        <?php endforeach;
                                    } else {
                                        ?>
                                        <tr>
                                            <td class="text-center align-middle">¡¡Sé la primera persona en jugar!!</td>
                                            <td class="text-center align-middle">0</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <!-- Cuarto Miembro -->
                <div class="px-4 col-md-6">

                    <!-- Imagen e Información -->
                    <div class="row">

                        <h3>GroundSound Hero</h3>

                        <div class="mx-auto table-responsive-md">
                            <table class="table table-about-us table-borderless table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">
                                            <h5>User</h5>
                                        </th>
                                        <th class="text-center align-middle">
                                            <h5>Puntuación</h5>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($scoresFRM != null) {
                                        foreach ($scoresFRM as $score): ?>
                                            <tr>
                                                <td class="text-center align-middle"><?php echo $score->nombre ?></td>
                                                <td class="text-center align-middle"><?php echo $score->puntos ?></td>
                                            </tr>
                                        <?php endforeach;
                                    } else {
                                        ?>
                                        <tr>
                                            <td class="text-center align-middle">¡¡Sé la primera persona en jugar!!</td>
                                            <td class="text-center align-middle">0</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>