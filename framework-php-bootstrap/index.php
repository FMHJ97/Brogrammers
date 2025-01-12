<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head_tags.php"); ?>
  <script src="js/index.js"></script>
</head>

<body>
  <?php include("includes/navbar.php"); ?>

  <main class="bg-none">
    <div class="container-fluid">
      <section>
        <div class="row p-0 position-relative">
          <img class="img-fluid p-0 opacity-50" src="/assets/img/index/mainPhoto.jpg" alt="Hay un Imagen aqui" />
          <div class="timer-overlay start-0">
            <div id="timer" class="timer-container">
              <div class="time-block d-flex align-items-center">
                <div class="time-item">
                  <div class="time-number" id="days">000</div>
                  <div class="time-label">DÍAS</div>
                </div>
                <div class="time-item">
                  <div class="time-number">:</div>
                  <div class="time-label invisible">A</div>
                </div>
                <div class="time-item">
                  <div class="time-number" id="hours">00</div>
                  <div class="time-label pr-1">HRS</div>
                </div>
                <div class="time-item">
                  <div class="time-number">:</div>
                  <div class="time-label invisible">A</div> <!-- Use "invisible" to hide while keeping the space -->
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
        <div class="row my-3 py-3"> <!--CF2: Row sin col? para qué? -->
          <a href="tickets.php" class="btn-index ">COMPRA TUS TICKETS AHORA</a>
        </div>
      </section>

      <section ">
        <div id=" carouselExampleInterval" class="carousel slide carousel-fade" data-bs-interval="5000" data-bs-ride="carousel">
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
      <div class="row my-3 py-3">
        <a href="lineup.php" class="btn-index-lineup ">LINE UP</a>
      </div>
    </section>

    <section>
      <div class="row my-3 py-3">
        <div class="col d-flex flex-column justify-content-center align-items-center text-center">
          <img class="img-fluid p-3" src="../assets/img/Logo.svg" alt="Festival Logo">
          <div class="festival py-3 px-auto">FESTIVAL</div>
          <div class="festival-date">ABRIL 17-18-19, 2025</div>
          <div class="festival-location">
            <div>LUCENA, CÓRDOBA</div>
            <div>PRUDENCIO UZAR TOWN SQUARE</div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="row my-3 py-3 mx-0 px-0">
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
              <input type="range" id="volume-bar" min="0" max="1" step="0.1" value="1">
              <button type="button" id="full-screen">Full-Screen</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="row my-3 py-3">
        <a href="tickets.php" class="btn-index ">COMPRA TUS TICKETS AHORA</a>
      </div>
    </section>

    </div>
    <?php include("includes/patrocinadores.php");  ?>
  </main>

  <?php include("includes/footer.php"); ?>
</body>

</html>