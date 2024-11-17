
  const targetDate = new Date("April 17, 2025 00:00:00").getTime();

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
