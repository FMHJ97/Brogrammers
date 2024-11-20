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
                        <button type="button" id="history" class="btn btn-category-item selected w-100">Full Lineup</button>
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
            <div class="container">
                <div class="row">
                    <h2>HEADLINERS</h2>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="title">

                        </div>
                        <div class="card cardHeadline">
                            <div class="artist-name">Band Name</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="title">

                        </div>
                        <div class="card cardHeadline">

                        </div>
                    </div>
                    <div class="col">
                        <div class="title">

                        </div>
                        <div class="card cardHeadline">

                        </div>
                    </div>
                </div>
            </div>

            <!--Rest Bands -->
            <div class="container">
                <div class="row">
                    <h3>INCLUDING</h3>
                </div>
                <div class="row">
                    <div class="card cardIncluding">

                    </div>

                </div>
            </div>
        </section>




    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>