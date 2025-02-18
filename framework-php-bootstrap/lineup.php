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
                <div class="flex-wrap d-flex justify-content-center">
                    <div class="px-2 mb-2 col-12 col-md-3 d-flex justify-content-center">
                        <button type="button" id="fullLineUp" class="btn btn-fullLineup selected">Lineup
                            Completa</button>
                    </div>
                    <div class="px-2 mb-2 col-4 col-md-3 d-flex justify-content-center">
                        <button type="button" id="thursday" class="btn btn-days">Jueves</button>
                    </div>
                    <div class="px-2 mb-2 col-4 col-md-3 d-flex justify-content-center">
                        <button type="button" id="friday" class="btn btn-days">Viernes</button>
                    </div>
                    <div class="px-2 mb-2 col-4 col-md-3 d-flex justify-content-center">
                        <button type="button" id="saturday" class="btn btn-days">Sábado</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bandas Principales -->
        <section class="container page-section">
            <div class="container mb-3">
                <div class="mt-4 mb-2 text-center row mt-md-5">
                    <h2 class="col-12">CABEZAS DE CARTEL</h2>
                </div>
                <div class="row">
                    <?php include("includes/artistas.php"); ?>
                    <?php foreach ($artists as $artist) {
                        if ($artist["type"] == "headliner") { ?>
                            <div class="colB col-md-4" data-headline="1" data-day="<?php echo $artist['day']; ?>">
                                <div class="titleDays">
                                    <h3><?php echo $artist['day']; ?></h3>
                                </div>
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div
                                            class="flip-card-front card cardBand bandPrincipal <?php echo $artist['class']; ?>">
                                            <div class="artist-name"><?php echo $artist['name']; ?></div>
                                        </div>
                                        <div class="flip-card-back">
                                            <div class="container back-content">
                                                <div class="mt-1 row">
                                                    <h4><?php echo $artist['name']; ?></h4>
                                                </div>
                                                <div class="mb-2 row">
                                                    <div class="col-4">
                                                        <a aria-label="Enlace a nuestro perfil en Instagram" href="<?php echo $artist['socials']['instagram']; ?>"><i
                                                                class="bi bi-instagram"></i></a>
                                                        </a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a aria-label="Enlace a nuestro perfil en TikTok" href="<?php echo $artist['socials']['tiktok']; ?>"><i
                                                                class="bi bi-tiktok"></i></a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a aria-label="Enlace a nuestro perfil en Twitter" href="<?php echo $artist['socials']['twitter']; ?>"><i
                                                                class="bi bi-twitter-x"></i></a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a aria-label="Enlace a nuestro perfil en Youtube" href="<?php echo $artist['socials']['youtube']; ?>"><i
                                                                class="bi bi-youtube"></i></a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a aria-label="Enlace a nuestro perfil en Facebook" href="<?php echo $artist['socials']['facebook']; ?>"><i
                                                                class="bi bi-facebook"></i></a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a aria-label="Enlace al email del festival" href="<?php echo $artist['socials']['email']; ?>"><i
                                                                class="bi bi-envelope-fill"></i></a>
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <iframe style="border-radius:12px" src="<?php echo $artist['spotify']; ?>"
                                                        width="100%" height="152" frameBorder="0" allowfullscreen=""
                                                        allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                                                        loading="lazy"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>

            <!-- Rest Bands -->
            <div class="container my-5">
                <div class="text-center row">
                    <h3>INCLUYENDO</h3>
                </div>
                <div class="row cols-4">
                    <?php foreach ($artists as $artist) {
                        if ($artist["type"] == "secondary") { ?>
                            <div class="col-12 col-md-3 colB" data-day="<?php echo $artist['day']; ?>">
                                <div class="flip-card">
                                    <div class="flip-card-inner">
                                        <div
                                            class="flip-card-front card cardBand bandSecundary <?php echo $artist['class']; ?>">
                                            <div class="artist-name"><?php echo $artist['name']; ?></div>
                                        </div>
                                        <div class="flip-card-back">
                                            <div class="container back-content">
                                                <div class="mt-1 row">
                                                    <h4><?php echo $artist['name']; ?></h4>
                                                </div>
                                                <div class="mb-2 row">
                                                    <div class="col-4">
                                                        <a aria-label="Enlace a nuestro perfil en Instagram"
                                                            href="<?php echo $artist['socials']['instagram']; ?>"><i
                                                                class="bi bi-instagram"></i></a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a aria-label="Enlace a nuestro perfil en TikTok"
                                                            href="<?php echo $artist['socials']['tiktok']; ?>"><i
                                                                class="bi bi-tiktok"></i></a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a aria-label="Enlace a nuestro perfil en Twitter"
                                                            href="<?php echo $artist['socials']['twitter']; ?>"><i
                                                                class="bi bi-twitter-x"></i></a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a aria-label="Enlace a nuestro perfil en Youtube"
                                                            href="<?php echo $artist['socials']['youtube']; ?>"><i
                                                                class="bi bi-youtube"></i></a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a aria-label="Enlace a nuestro perfil en Facebook"
                                                            href="<?php echo $artist['socials']['facebook']; ?>"><i
                                                                class="bi bi-facebook"></i></a>
                                                    </div>
                                                    <div class="col-4">
                                                        <a aria-label="Enlace al email del festival"
                                                            href="<?php echo $artist['socials']['email']; ?>"><i
                                                                class="bi bi-envelope-fill"></i></a>
                                                    </div>
                                                </div>
                                                <div class="mb-1 row">
                                                    <iframe style="border-radius:12px" src="<?php echo $artist['spotify']; ?>"
                                                        width="100%" height="152" frameBorder="0" allowfullscreen=""
                                                        allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                                                        loading="lazy"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
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