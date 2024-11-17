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
                <div class="row align-items-center gap-3 merch-filter">
                    <!-- Buttons -->
                    <div class="col-auto btn-category-group">
                        <button type="button" class="btn btn-category-item selected">Todos los productos</button>
                        <button type="button" class="btn btn-category-item">Ropa</button>
                        <button type="button" class="btn btn-category-item">Accesorios</button>
                        <button type="button" class="btn btn-category-item">Música</button>
                    </div>
                    <!-- Search Bar -->
                    <div class="col-auto ms-auto">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.btn-category-item');

            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    buttons.forEach(btn => btn.classList.remove('selected'));
                    this.classList.add('selected');
                });
            });
        });
    </script>

</body>

</html>