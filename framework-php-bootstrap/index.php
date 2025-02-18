<?php include("includes/a_config.php");

/* Importamos los ficheros necesarios. */
require_once '../framework-php-bootstrap/controller/usuarioController.php';
require_once '../framework-php-bootstrap/model/usuario.php';

?>
<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head_tags.php"); ?>
  <script src="js/index.js"></script>
</head>

<body>
  <?php include("includes/navbar.php"); ?>

  <?php
  if (isset($_GET['register']) && $_GET['register'] === 'success') {
    echo '<div class="alert alert-success alert-dismissible fade show custom-alert-index" role="alert">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
              </svg>
              
              <div class="d-inline">
              <strong>¡Registro exitoso! Bienvenido</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            </div>';
  }
  ?>

  <main class="bg-none">
    <div class="container-fluid">
      <section>
        <div class="p-0 row position-relative">
          <img class="p-0 opacity-50 img-fluid" src="/assets/img/index/mainPhoto.jpg" alt="Hay un Imagen aqui" />
          <div class="timer-overlay start-0">
            <div id="timer" class="timer-container">
              <div class="time-block d-flex align-items-center">
                <div class="time-item">
                  <div class="time-number" id="days">000</div>
                  <div class="time-label">DÍAS</div>
                </div>
                <div class="time-item">
                  <div class="time-number">:</div>
                  <div class="invisible time-label">A</div>
                </div>
                <div class="time-item">
                  <div class="time-number" id="hours">00</div>
                  <div class="pr-1 time-label">HRS</div>
                </div>
                <div class="time-item">
                  <div class="time-number">:</div>
                  <div class="invisible time-label">A</div> <!-- Use "invisible" to hide while keeping the space -->
                </div>
                <div class="time-item">
                  <div class="time-number" id="minutes">00</div>
                  <div class="time-label">MINS</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="py-3 my-3 row"> <!--CF2: Row sin col? para qué? -->
          <a href="tickets.php" class="btn-index ">COMPRA TUS TICKETS AHORA</a>
        </div>
      </section>

      <section>
        <div id=" carouselExampleInterval" class="carousel slide carousel-fade" data-bs-interval="5000"
          data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="assets/img/index/2.gif" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="assets/img/index/1.gif" alt="Second slide">
            </div>
            <div class="carousel-item ">
              <img class="d-block w-100" src="assets/img/index/3.gif" alt="Third slide">
            </div>
            <div class="carousel-item ">
              <img class="d-block w-100" src="assets/img/index/4.gif" alt="Fourth slide">
            </div>
            <div class="carousel-item ">
              <img class="d-block w-100" src="assets/img/index/5.gif" alt="Fifth slide">
            </div>
            <div class="carousel-item ">
              <img class="d-block w-100" src="assets/img/index/6.gif" alt="Sixth slide">
            </div>
            <div class="carousel-item ">
              <img class="d-block w-100" src="assets/img/index/7.gif" alt="Seventh slide">
            </div>
          </div>
        </div>
      </section>

      <section>
        <div class="py-3 my-3 row">
          <a href="lineup.php" class="btn-index-lineup ">LINE UP</a>
        </div>
      </section>

      <section>
        <div class="py-3 my-3 row">
          <div class="text-center col d-flex flex-column justify-content-center align-items-center">
            <img class="p-3 img-fluid" src="../assets/img/Logo.svg" alt="Festival Logo">
            <div class="py-3 festival px-auto">FESTIVAL</div>
            <div class="festival-date">ABRIL 17-18-19, 2025</div>
            <div class="festival-location">
              <div>LUCENA, CÓRDOBA</div>
              <div>PRUDENCIO UZAR TOWN SQUARE</div>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="px-0 py-3 mx-0 my-3 row">
          <div class="col">
            <div id="video-container">
              <video id="video">
                <source src="assets/videos/festival_1080p.mp4" type="video/mp4">
                <p>
                  Your browser doesn't support HTML5 video.
                  <a href="assets/videos/festival_1080p.mp4">Download</a> the video instead.
                </p>
              </video>
              <div id="video-controls">
                <button type="button" id="play-pause" class="play">Play</button>
                <button type="button" id="mute">Mute</button>
                <input type="range" id="volume-bar" min="0" max="1" step="0.1" value="1" aria-label="Control de volumen">
                <button type="button" id="full-screen">Full-Screen</button>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section>
        <div class="py-3 my-3 row">
          <a href="tickets.php" class="btn-index ">COMPRA TUS TICKETS AHORA</a>
        </div>
      </section>

    </div>
    <?php include("includes/patrocinadores.php"); ?>
    <?php include("includes/cookieGS.php"); ?>
  </main>

  <?php include("includes/footer.php"); ?>
</body>

</html>