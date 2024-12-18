<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <script src="js/lineup.js"></script>
    <?php include("includes/head_tags.php"); ?>
</head>

<body>
    <!-- Navigation Bar -->
    <?php include("includes/navbar.php"); ?>

    <main>
        <!-- Line Up Heading Section -->
        <section class="container page-section">
            <div class="row page-section-heading">
                <h1>LINE UP</h1>
            </div>
        </section>

        <!--Festival Days Filter -->
        <section class="container">
            <div class="row btn-category-group justify-content-center">
                <div class="d-flex flex-wrap justify-content-center">
                    <div class="col-12 col-md-3 d-flex justify-content-center mb-2 px-2">
                        <button type="button" id="fullLineUp" class="btn btn-fullLineup selected">Lineup Completa</button>
                    </div>
                    <div class="col-4 col-md-3 mb-2 px-2 d-flex justify-content-center">
                        <button type="button" id="thursday" class="btn btn-days">Jueves</button>
                    </div>
                    <div class="col-4 col-md-3  mb-2 px-2 d-flex justify-content-center">
                        <button type="button" id="friday" class="btn btn-days">Viernes</button>
                    </div>
                    <div class="col-4 col-md-3  mb-2 px-2 d-flex justify-content-center">
                        <button type="button" id="saturday" class="btn btn-days">Sábado</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bandas Principales -->
        <section class="container page-section">
            <div class="container mb-3">
                <div class="row text-center mt-4 mt-md-5 mb-2">
                    <h2 class="col-12">CABEZAS DE CARTEL</h2>
                </div>
                <div class="row">
                    <?php include("includes/artistas.php"); ?>
                    <?php foreach ($artists as $artist) { 
                        if ($artist["type"] == "headliner") { ?>
                            <div class="colB col-md-4">
                                <div class="titleDays">
                                    <h3><?php echo $artist['day']; ?></h3>
                                </div>
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front card cardBand bandPrincipal <?php echo $artist['class']; ?>">
                                            <div class="artist-name"><?php echo $artist['name']; ?></div>
                                        </div>
                                        <div class="flip-card-back">
                                            <div class="container back-content">
                                                <div class="row mt-1">
                                                    <h4><?php echo $artist['name']; ?></h4>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">
                                                        <a href="<?php echo $artist['socials']['instagram']; ?>"><i class="bi bi-instagram"></i></a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a href="<?php echo $artist['socials']['tiktok']; ?>"><i class="bi bi-tiktok"></i></a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a href="<?php echo $artist['socials']['twitter']; ?>"><i class="bi bi-twitter-x"></i></a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a href="<?php echo $artist['socials']['youtube']; ?>"><i class="bi bi-youtube"></i></a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a href="<?php echo $artist['socials']['facebook']; ?>"><i class="bi bi-facebook"></i></a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a href="<?php echo $artist['socials']['email']; ?>"><i class="bi bi-envelope-fill"></i></a>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <iframe style="border-radius:12px"
                                                        src="<?php echo $artist['spotify']; ?>"
                                                        width="100%" height="152" frameBorder="0" allowfullscreen=""
                                                        allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                                                        loading="lazy"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php } } ?>
                </div>
            </div>

            <!-- Rest Bands -->
            <div class="container my-5">
                <div class="row text-center">
                    <h3>INCLUYENDO</h3>
                </div>
                <div class="row cols-4">
                    <?php foreach ($artists as $artist) { 
                        if ($artist["type"] == "secondary") { ?>
                            <div class="col-12 col-md-3 colB">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front card cardBand bandSecundary <?php echo $artist['class']; ?>">
                                            <div class="artist-name"><?php echo $artist['name']; ?></div>
                                        </div>
                                        <div class="flip-card-back">
                                            <div class="container back-content">
                                                <div class="row mt-1">
                                                    <h4><?php echo $artist['name']; ?></h4>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-4">
                                                        <a href="<?php echo $artist['socials']['instagram']; ?>"><i class="bi bi-instagram"></i></a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a href="<?php echo $artist['socials']['tiktok']; ?>"><i class="bi bi-tiktok"></i></a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a href="<?php echo $artist['socials']['twitter']; ?>"><i class="bi bi-twitter-x"></i></a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a href="<?php echo $artist['socials']['youtube']; ?>"><i class="bi bi-youtube"></i></a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a href="<?php echo $artist['socials']['facebook']; ?>"><i class="bi bi-facebook"></i></a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a href="<?php echo $artist['socials']['email']; ?>"><i class="bi bi-envelope-fill"></i></a>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <iframe style="border-radius:12px"
                                                        src="<?php echo $artist['spotify']; ?>"
                                                        width="100%" height="152" frameBorder="0" allowfullscreen=""
                                                        allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                                                        loading="lazy"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php } } ?>
                </div>
            </div>
        </section>

        <!-- Patrocinadores -->
        <?php include("includes/patrocinadores.php");  ?>
    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>
