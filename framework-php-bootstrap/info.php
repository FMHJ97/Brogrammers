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
        <!--Seleccion Info -->
        <div class="container">
            <div class="row btn-category-group px-0 justify-content-center">
                <div class="col-lg-3 col-6 mb-2">
                    <button type="button" id="history" class="btn btn-category-item selected w-100">Fest History</button>
                </div>
                <div class="col-lg-3 col-6 mb-2">
                    <button type="button" id="tickets" class="btn btn-category-item w-100">Tickets Info</button>
                </div>
                
                <div class="col-lg-3 col-6 mb-2">
                    <button type="button" id="camping" class="btn btn-category-item w-100">Camping</button>
                </div>
                <div class="col-lg-3 col-6 mb-2">
                    <button type="button" id="accessibility" class="btn btn-category-item w-100">Accessibility</button>
                </div>
            </div>
        </div>


        </section>
        <!-- CONTENEDOR INFO 1 -->
        <section class="container page-section">
            <!-- First Row -->
            <div class="row row-cols-1 row-cols-md-3 merch-products">
                
            </div>
        </section>

    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>