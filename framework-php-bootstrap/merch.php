<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <script src="js/scripts.js"></script>
    <?php include("includes/head_tags.php"); ?>
</head>

<body>
    <!-- Navigation Bar -->
    <?php include("includes/navbar.php"); ?>

    <main>
        <!-- Merch Heading Section -->
        <section class="page-section">
            <div class="container">
                <div class="row page-section-heading">
                    <h1>GroundSound Festival Merch</h1>
                    <h2>Productos exclusivos</h2>
                </div>
            </div>
        </section>
        <!-- Merch Filter & Order by Section -->
        <section class="page-section">
            <div class="container">
                <!-- Merch Filter -->
                <div class="row gap-5 merch-filter">
                    <!-- Buttons -->
                    <div class="col btn-category-group">
                        <button type="button" class="btn btn-category-item selected">Todos los productos</button>
                        <button type="button" class="btn btn-category-item">Ropa</button>
                        <button type="button" class="btn btn-category-item">Accesorios</button>
                        <button type="button" class="btn btn-category-item">Música</button>
                    </div>
                    <!-- Search Bar -->
                    <div class="col">
                        <form action="#">
                            <div class="input-group search-bar">
                                <input type="text" class="form-control-search" placeholder="Buscar productos..." name="search">
                                <button class="btn btn-search" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Merch Order by -->
                <div class="row">

                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include("includes/footer.php"); ?>

</body>

</html>