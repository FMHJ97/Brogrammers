<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
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
                    <div class="col-12 col-md-3 mb-2 px-2">
                        <button type="button" id="history" class="btn btn-category-item selected w-100">Full
                            Lineup</button>
                    </div>
                    <div class="col-4 col-md-3  mb-2 px-2">
                        <button type="button" id="tickets" class="btn btn-category-item w-100">Thursday</button>
                    </div>
                    <div class="col-4 col-md-3  mb-2 px-2">
                        <button type="button" id="camping" class="btn btn-category-item w-100">Friday</button>
                    </div>
                    <div class="col-4 col-md-3  mb-2 px-2">
                        <button type="button" id="accessibility" class="btn btn-category-item w-100">Saturday</button>
                    </div>
                </div>
            </div>
        </section>



        <!--Lista de Bandas -->
        <section class="container page-section">
            <!--Bandas Principales -->
            <div class="container my-3">
                <div class="row text-center text-white mt-5 mb-2">
                    <h2 class="col-12">HEADLINERS</h2>
                </div>
                <div class="row ">
                    <div class="colB col-md-4 ">
                        <div class="titleDays">
                            <h3>Thursday</h3>
                        </div>
                        <!--  Flip Card  -->
                        <div class="flip-card">
                            <div class="flip-card-inner">
                                <!-- Front -->
                                <div class="flip-card-front card cardHeadline headB1">
                                    <div class="artist-name">Eminem</div>
                                </div>
                                <!-- Back -->
                                <div class="flip-card-back">
                                    <div class="container back-content">
                                        <div class="row mt-1">
                                            <h4>Eminem</h4>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-4">
                                                <a href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a>
                                            </div>
                                            <!-- TikTok -->
                                            <div class="col-4">
                                                <a href="https://www.tiktok.com/"><i class="bi bi-tiktok"></i></a>
                                            </div>
                                            <!-- Twitter - X  -->
                                            <div class="col-4">
                                                <a href="https://www.x.com/"><i class="bi bi-twitter-x"></i></a>
                                            </div>
                                            <!-- Youtube -->
                                            <div class="col-4">
                                                <a href="https://www.youtube.com/"><i class="bi bi-youtube"></i></a>
                                            </div>
                                            <!-- Facebook -->
                                            <div class="col-4 ">
                                                <a href="https://www.facebook.com/"><i class="bi bi-facebook"></i></a>
                                            </div>
                                            <!-- Email -->
                                            <div class="col-4">
                                                <a href="https://www.gmail.com/"><i class="bi bi-envelope-fill"></i></a>
                                            </div>
                                        </div>
                                        <div class="row mb-1"><!-- Tres formas diferentes de iframe para spotify-->
                                            <!-- <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/4xkOaSrkexMciUUogZKVTS?utm_source=generator&theme=0" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>-->
                                            <iframe style="border-radius:12px"
                                                src="https://open.spotify.com/embed/playlist/37i9dQZF1DZ06evO4gTUOY?utm_source=generator"
                                                width="100%" height="152" frameBorder="0" allowfullscreen=""
                                                allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                                                loading="lazy"></iframe>
                                            <!--  <iframe src="https://open.spotify.com/embed?uri=spotify:album:2cWBwpqMsDJC1ZUwz813lo" width="250" height="280" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>   -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="colB col-md-4 ">
                        <div class="titleDays">
                            <h3>Friday</h3>
                        </div>
                        <div class="card cardHeadline headB2 ">
                            <div class="artist-name">Los del Río</div>
                        </div>
                    </div>
                    <div class="colB col-md-4 ">
                        <div class="titleDays">
                            <h3>Saturday</h3>
                        </div>
                        <div class="card cardHeadline headB3">
                            <div class="artist-name">SoundGarden</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bandas Secundarias -->
            <div class="container my-5">
                <div class="row text-center text-white">
                    <h3>INCLUDING</h3>
                </div>
                <div class="row  cols-4">
                    <div class="col-12 col-md-3 colB ">
                        <div class="card cardIncluding incB1">
                            <div class="artist-name">Alice in Chains</div>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 colB">
                        <div class="card cardIncluding incB2">
                            <div class="artist-name">50 cent</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 colB ">
                        <div class="card cardIncluding incB3">
                            <div class="artist-name">Queen</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 colB ">
                        <div class="card cardIncluding incB4">
                            <div class="artist-name">Pearl Jam</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 colB">
                        <div class="card cardIncluding incB5">
                            <div class="artist-name">Falling in Reverse</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 colB">
                        <div class="card cardIncluding incB6">
                            <div class="artist-name">Parchís</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 colB">
                        <div class="card cardIncluding incB7">
                            <div class="artist-name">Los Chichos</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 colB">
                        <div class="card cardIncluding incB8">
                            <div class="artist-name">Rush</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 colB">
                        <div class="card cardIncluding incB9">
                            <div class="artist-name">2 Pac</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 colB">
                        <div class="card cardIncluding incB10">
                            <div class="artist-name">Lola Flores</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 colB">
                        <div class="card cardIncluding incB11">
                            <div class="artist-name">Lamb of God</div>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 colB">
                        <div class="card cardIncluding incB12">
                            <div class="artist-name">Snoop Dog</div>
                        </div>
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