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
        <section class="page-section">

            <div class="container mb-4 page-section-heading">
                <h1 class="text-center ">GroundSound Festival Tickets</h1>
                <h2 class="text-center">Consulta el precio de las entradas a nuestro festival</h2>
            </div>

            <div class="container">

                <!-- Row Cards with prices -->
                <div class="row">

                    <!-- Ticket Card -->
                    <div class="col-md-4">
                        <div class="ticket-card mb-4">
                            <div class="ticket-body">
                                <h3 class="ticket-title text-center">Tickets Festival</h3>
                                <p class="ticket-text">Encuentra tus entradas para el GroundSound Festival</p>
                                <p class="ticket-price text-center">Desde 25€</p>
                                <a href="ticketing.php" class="button-ticket">Comprar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Parking Card -->
                    <div class="col-md-4">
                        <div class="ticket-card mb-4">
                            <div class="ticket-body">
                                <h3 class="ticket-title text-center">Parking</h3>
                                <p class="ticket-text">Encuentra tu sitio para guardar tu vehículo mientras disfrutas
                                </p>
                                <p class="ticket-price text-center">Desde 75€</p>
                                <a href="parking_camping.php?tab=parking" class="button-ticket">Comprar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Camping Card -->
                    <div class="col-md-4">
                        <div class="ticket-card mb-4">
                            <div class="ticket-body">
                                <h3 class="ticket-title text-center">Camping</h3>
                                <p class="ticket-text">Reserva tu parcela de camping para descansar en el mismo festival
                                </p>
                                <p class="ticket-price text-center">Desde 89€</p>
                                <a href="parking_camping.php?tab=camping" class="button-ticket">Comprar</a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Row with map -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="ticket-card">
                            <div class="ticket-body">
                                <img src="assets/img/mapaFestival.jpg" class="ticket-img" alt="Mapa del festival">
                                <button class="button-ticket" data-bs-toggle="modal" data-bs-target="#myModal"
                                    id="map">Ver Mapa</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Modal -->

            <div class="modal" id="myModal">
                <div class="modal-dialog custom-modal-dialog">
                    <div class="modal-content custom-modal-content">

                        <!-- Modal body -->
                        <div class="modal-body custom-modal-body">
                            <img src="assets/img/mapaFestival.jpg" class="img-fluid" alt="Mapa del festival">
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer custom-modal-footer justify-content-center">
                            <button type="button" class="button-ticket" data-bs-dismiss="modal">Cerrar</button>
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
