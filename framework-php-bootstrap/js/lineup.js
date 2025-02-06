document.addEventListener("DOMContentLoaded", function () {
  const fullLineUpButton = document.getElementById("fullLineUp");
  const thursdayButton = document.getElementById("thursday");
  const fridayButton = document.getElementById("friday");
  const saturdayButton = document.getElementById("saturday");

  const artistCards = document.querySelectorAll(".colB"); // Selecciono todos los elementos con la clase colB

  function showAllArtists() {
    artistCards.forEach((card) => (card.style.display = "flex"));
    // Restablece la clase 'selected' y la elimina de los otros botones
    fullLineUpButton.classList.add("selected");
    [thursdayButton, fridayButton, saturdayButton].forEach((button) =>
      button.classList.remove("selected")
    );
  }

  function filterArtistsByDay(day) {
    artistCards.forEach((card) => {
      const cardDay = card.dataset.day; //Al modificar mi lineup no pusieron los días en cada tarjeta. Sí en la info de la que se obtiene. Por eso no filtraba.
      if (cardDay === day) {
        card.style.display = "flex";
        if(card.dataset.headline === "1") {
          card.setAttribute("style", "margin-inline: auto;");
        }
      } else {
        card.style.display = "none";
      }
    });

    // Actualizo la clase 'selected'
    switch (day) {
      case "Jueves":
        thursdayButton.classList.add("selected");
        break;
      case "Viernes":
        fridayButton.classList.add("selected");
        break;
      case "Sábado":
        saturdayButton.classList.add("selected");
        break;
    }
    fullLineUpButton.classList.remove("selected"); // Quito la clase 'selected' del botoón "FullLineup"
    [thursdayButton, fridayButton, saturdayButton].forEach((button) => {
      if (button.textContent !== day) {
        button.classList.remove("selected");
      }
    });
  }

  fullLineUpButton.addEventListener("click", showAllArtists);
  thursdayButton.addEventListener("click", () => filterArtistsByDay("Jueves"));
  fridayButton.addEventListener("click", () => filterArtistsByDay("Viernes"));
  saturdayButton.addEventListener("click", () => filterArtistsByDay("Sábado"));

  // Muestro todos los artistas de primeras.
  showAllArtists();
});
