(function () {
  "use strict";

  // Localizamos a los actores implicados.
  var cookieAlert = document.getElementById("cookieBanner"); // El contenedor de la alerta de cookies
  var acceptCookies = document.getElementById("acceptcookie"); // Botón para aceptar las cookies
  var rejectCookie = document.getElementById("rejectcookie"); // Botón para rechazar las cookies
  var newsBanner = document.getElementById("newsBanner"); // El contenedor del banner de novedades
  var closeNewsBanner = document.getElementById("closenews"); // Botón para cerrar el banner de novedades
  var blockWeb = document.getElementById("blockWeb"); // Contenedor de bloqueo de la web



  // Buscamos la cookie "groundSoundCookie", si no está en el cliente decidimos mostrar el contenedor de la alerta
  if (!getCookie("groundSoundCookie")) {
    cookieAlert.classList.add("show");
    blockWeb.classList.add("show");
    document.body.classList.add("banner-visible"); // Bloquear el scroll del fondo
  }
  // Si se encuentra la cookie en el cliente y además su valor es "true" decidimos pasar directamente a la página de login
  else if (getCookie("groundSoundCookie") == "true") {
    if (!getCookie("gsNews") || getCookie("gsNews") === "false") {
      newsBanner.classList.add("show");
      
      setCookie("gsNews", false, 30); // Establecemos la cookie de novedades con valor false
    }
  }

  // Evento al botón de "aceptar el comportamiento". Cuando se pulse se crea una cookie con una validez de 365 días y valor "true"
  // Además, ya que el usuario ha decidido que siempre quiere ir directamente a la página de "login", le redirijimos
  acceptCookies.addEventListener("click", function () {
    setCookie("groundSoundCookie", true, 365);
    setCookie("gsNews", false, 30); // Establecemos la cookie de novedades con valor false
    
    cookieAlert.classList.remove("show");
    blockWeb.classList.remove("show");
    document.body.classList.remove("banner-visible"); // Desbloquear el scroll del fondo


    // Mostrar el banner de novedades si la cookie gsNews no existe o es false
    if (!getCookie("gsNews") || getCookie("gsNews") === "false") {
      newsBanner.classList.add("show");
    }
  });

  // Evento al botón de "rechazar el comportamiento". Guardamos la cookie con validez de 365 días y valor "false"
  rejectCookie.addEventListener("click", function () {
    setCookie("groundSoundCookie", false, 365);
    cookieAlert.classList.remove("show");
    blockWeb.classList.remove("show");
    document.body.classList.remove("banner-visible"); // Desbloquear el scroll del fondo
  });

  // Evento al botón de cerrar el banner de novedades
  if (closeNewsBanner) {
    closeNewsBanner.addEventListener("click", function () {
      setCookie("gsNews", true, 30); // Establecemos la cookie de novedades con valor true
      
      newsBanner.classList.remove("show");
    });
  }

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
