<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head_tags.php"); ?>
</head>

<body>
  <?php include("includes/navbar.php"); ?>

  <main>
    <div class="container-fluid">
      <div class="row p-0 position-relative">
        <img class="img-fluid p-0 opacity-50" src="/assets/img/index/mainPhoto.jpg" alt="Hay un Imagen aqui" />

        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center">
          <div id="timer" class="text-white text-center d-flex justify-content-center">
            <div class="time-block d-flex align-items-center">
              <div class="time-item">
                <div class="time-number" id="days">000</div>
                <div class="time-label">DAYS</div>
              </div>
              <div class="separator">:</div>
              <div class="time-item">
                <div class="time-number" id="hours">00</div>
                <div class="time-label">HRS</div>
              </div>
              <div class="separator">:</div>
              <div class="time-item">
                <div class="time-number" id="minutes">00</div>
                <div class="time-label">MINS</div>
              </div>
            </div>
          </div>
        </div>
      </div>





      <div class="row">
        <button>buy your tickets now</button>
      </div>
      <!--Carrusel-->
      <div class="row">
        <div class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img
                class="d-block w-100"
                src="https://placehold.co/600x400?text=1"
                alt="First slide" />
            </div>
            <div class="carousel-item">
              <img
                class="d-block w-100"
                src="https://placehold.co/600x400?text=2"
                alt="Second slide" />
            </div>
            <div class="carousel-item">
              <img
                class="d-block w-100"
                src="https://placehold.co/600x400?text=3"
                alt="Third slide" />
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <button>Line up</button>
      </div>

      <div class="row">
        <div>AQUI VA EL LOGO</div>
        <div>AQUI VA LA FECHA</div>
        <div>AQUI VA LA DIRECCIÓN</div>
      </div>

      <div class="row">
        <button>buy your tickets now</button>
      </div>

    </div>
    <?php include("includes/patrocinadores.php");  ?>
  </main>

  <?php include("includes/footer.php"); ?>
</body>
<script>
  // Target date for the countdown
  const targetDate = new Date("August 15, 2025 00:00:00").getTime();

  // Function to update the countdown every second
  function updateCountdown() {
    const now = new Date().getTime(); // Current time in milliseconds
    const timeLeft = targetDate - now; // Time left in milliseconds

    if (timeLeft > 0) {
      // Calculate days, hours, minutes
      const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
      const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));

      // Update the respective elements
      document.getElementById("days").textContent = days.toString().padStart(3, "0");
      document.getElementById("hours").textContent = hours.toString().padStart(2, "0");
      document.getElementById("minutes").textContent = minutes.toString().padStart(2, "0");
    } else {
      // If the countdown is over
      document.getElementById("timer").innerHTML = "<h2>The day has arrived!</h2>";
    }
  }

  // Start the countdown and update it every second
  setInterval(updateCountdown, 1000);
</script>

</html>