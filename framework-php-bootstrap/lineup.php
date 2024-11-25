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
                <h1>INFO</h1>
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



        <!--BANDS Days -->
        <section class="page-section">
            <!--BANDS Days -->
            <div class="container my-3">
                <div class="row text-center text-white mt-5 mb-2">
                    <i class="bi bi-bar-chart-fill lineup-icon-left"></i>
                    <h2>HEADLINERS</h2>
                    <i class="bi bi-bar-chart-fill lineup-icon-right"></i>
                </div>
                <div class="row ">
                    <div class="colB col-md-4 ">
                        <div class="titleDays">
                            <h3>Thursday</h3>
                        </div>
                        <div class="card cardHeadline headB1">
                            <div class="artist-name">Eminem</div>
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

            <!--Rest Bands -->
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




    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>