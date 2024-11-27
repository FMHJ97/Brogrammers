<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head_tags.php"); ?>
    <script src="./js/scripts.js"></script>
</head>

<body>
    <!-- Navigation Bar -->
    <?php include("includes/navbar.php"); ?>

    <main>
        <!-- INFO Heading -->
        <section class="container page-section">
            <div class="row page-section-heading">
                <h1>INFO</h1>
            </div>
        </section>


        <!-- Acceso general a Info -->
        <section id="infogeneral" class="container page-section">
            <!-- Recuadro qué engloba los 4 botones -->
            <div class="row mb-4 d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-6">
                    <a href="./info.php#festhistory" class="custom-button infoButton1">
                        <div class="button-text-top">FESTIVAL HISTORY</div>
                        <div class="button-text-bottom">CLICK HERE</div>
                    </a>
                </div>
                <div class="col-12 col-md-6">
                    <a href="./info.php#ticketsinfo" class="custom-button infoButton2">
                        <div class="button-text-top">TICKETS</div>
                        <div class="button-text-bottom">CLICK HERE</div>
                    </a>
                </div>
                <div class="col-12 col-md-6">
                    <a href="./info.php#campinginfo" class="custom-button infoButton3">
                        <div class="button-text-top">CAMPING</div>
                        <div class="button-text-bottom">CLICK HERE</div>
                    </a>
                </div>
                <div class="col-12 col-md-6">
                    <a href="./info.php#festaccess" class="custom-button infoButton4">
                        <div class="button-text-top">ACCESSIBILITY</div>
                        <div class="button-text-bottom">CLICK HERE</div>
                    </a>
                </div>
            </div>
        </section>






        <!-- Contact us -->
        <?php include("includes/contactus.php");  ?>


        <!-- Patrocinadores -->
        <?php include("includes/patrocinadores.php");  ?>
    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>