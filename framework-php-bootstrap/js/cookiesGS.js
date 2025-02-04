(function () {
  "use strict";

  // Localizamos a los actores implicados.
  var cookieAlert = document.querySelector(".cookiealert");
  //var bloqAlert = document.querySelector(".bloqueoalert");

  var acceptCookies = document.querySelector("#acceptcookies");
  var rejectCookies = document.querySelector("#rejectcookies");

  // Si no se encuentra el contenedor, directamente terminamos
  if (!cookieAlert) {
    return;
  }

  // Buscamos la cookie "cookieGeneral", si no está en el cliente decidimos mostrar el contenedor de la alerta
  if (!getCookie("cookieGeneral")) {
    cookieAlert.classList.add("show");
  }
  // Si se encuentra la cookie en el cliente y además su valor es "true" decidimos pasar directamente a la página de login
  else if (getCookie("cookieGeneral") == "true") {
    cookieAlert.classList.remove("show");
  }

  // Evento al botón de "aceptar el comportamiento".
  acceptCookies.addEventListener("click", function () {
    setCookie("cookieGeneral", true, 365); // Creamos la cookie
    cookieAlert.classList.remove("show"); // Cerramos el banner
  });

  // Evento al botón de "rechazar el comportamiento".
  rejectCookies.addEventListener("click", function () {
    setCookie("cookieGeneral", false, 365); // Creamos la cookie
    cookieAlert.classList.remove("show"); // Cerramos el banner
  });

  // Funciones set y get para establecer y obtener cookies del sistema, extraídas de W3Schools
  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(";");
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) === " ") {
        c = c.substring(1);
      }
      if (c.indexOf(name) === 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
})();
