<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>
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
            <div class="row">

                <!-- Primer Miembro -->
                <div class="col-md-6 about-us-member">

                    <!-- Imagen e Información -->
                    <div class="row">
                        <!-- Imagen del Miembro -->
                        <div class="col-md-4 about-us-img">
                            <img src="assets/img/dummy/dummy_user.jpg" alt="Miembro del Equipo 1" class="img-fluid">
                        </div>
                        <!-- Información del Miembro -->
                        <div class="col-md-8 about-us-info">
                            <h3>Francisco Manuel Hernández (aka FMHJ)</h3>
                            <p>Desarrollador Web Full Stack y amante de los videojuegos. Con más de 5 años de
                                experiencia en
                                programación, ha decidido unir sus dos pasiones para crear un proyecto innovador y
                                divertido.</p>
                            <p>¡No dudes en contactarle para saber más sobre su trabajo!</p>
                        </div>
                    </div>

                    <!-- Enlace del Videjuego -->
                    <div class="row">
                        <div class="col-md-12 about-us-btn">
                            <a href="juegoFMHJ.php" target="_blank" class="btn btn-primary">Iniciar Juego</a>
                        </div>
                    </div>
                </div>

                <!-- Segundo Miembro -->
                <div class="col-md-6">
                    <!-- Imagen e Información -->
                    <div class="row">
                        <!-- Imagen del Miembro -->
                        <div class="col-md-4">
                            <img src="img/team_member_1.jpg" alt="Miembro del Equipo 1" class="img-fluid">
                        </div>
                        <!-- Información del Miembro -->
                        <div class="col-md-8">
                            <h3>Francisco Manuel Hernández (aka FMHJ)</h3>
                            <p>Desarrollador Web Full Stack y amante de los videojuegos. Con más de 5 años de
                                experiencia en
                                programación, ha decidido unir sus dos pasiones para crear un proyecto innovador y
                                divertido.
                                ¡No dudes en contactarle para saber más sobre su trabajo!</p>
                        </div>
                    </div>
                    <!-- Enlace del Videjuego -->
                    <div class="row">
                        <div class="col-md-12">
                            <a href="juegoFMHJ.php" target="_blank" class="btn btn-primary">Iniciar Juego</a>
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