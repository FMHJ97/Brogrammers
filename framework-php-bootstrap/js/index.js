window.onload = function () {


  const targetDate = new Date("February 28, 2025 00:00:00").getTime();

  function updateCountdown() {
    const now = new Date().getTime(); // Current time in milliseconds
    const timeLeft = targetDate - now; // Time left in milliseconds

    if (timeLeft > 0) {
      const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
      const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));

      document.getElementById("days").textContent = days.toString().padStart(3, "0");
      document.getElementById("hours").textContent = hours.toString().padStart(2, "0");
      document.getElementById("minutes").textContent = minutes.toString().padStart(2, "0");
    } else {
      document.getElementById("timer").innerHTML = "<h2>The day has arrived!</h2>";
    }
  }
  setInterval(updateCountdown, 1000);

  // Video
  var latch = false;
  var time = 0;
  var video = document.getElementById("video");

  // Buttons
  var playButton = document.getElementById("play-pause");
  var muteButton = document.getElementById("mute");
  var fullScreenButton = document.getElementById("full-screen");

  // Sliders
  var volumeBar = document.getElementById("volume-bar");
  
  video.addEventListener("click", function () {
    if (video.paused == true) {
      // Play the video
      video.play();

      // Update the button text to 'Pause'
      playButton.innerHTML = "Pause";
    } else {
      // Pause the video
      video.pause();

      // Update the button text to 'Play'
      playButton.innerHTML = "Play";
    }
  });

  // Event listener for the play/pause button
  playButton.addEventListener("click", function () {
    if (video.paused == true) {
      // Play the video
      video.play();

      // Update the button text to 'Pause'
      playButton.innerHTML = "Pause";
    } else {
      // Pause the video
      video.pause();

      // Update the button text to 'Play'
      playButton.innerHTML = "Play";
    }
  });


  // Event listener for the mute button
  muteButton.addEventListener("click", function () {
    if (video.muted == false) {
      // Mute the video
      video.muted = true;

      // Update the button text
      muteButton.innerHTML = "Unmute";
    } else {
      // Unmute the video
      video.muted = false;

      // Update the button text
      muteButton.innerHTML = "Mute";
    }
  });


  // Event listener for the full-screen button
  fullScreenButton.addEventListener("click", function () {
    if (video.requestFullscreen) {
      video.requestFullscreen();
    } else if (video.mozRequestFullScreen) {
      video.mozRequestFullScreen(); // Firefox
    } else if (video.webkitRequestFullscreen) {
      video.webkitRequestFullscreen(); // Chrome and Safari
    }
  });



  // Event listener for the volume bar
  volumeBar.addEventListener("change", function () {
    // Update the video volume
    video.volume = volumeBar.value;
  });
}


