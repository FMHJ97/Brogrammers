document.addEventListener("DOMContentLoaded", function () {
    // Verifica si la URL contiene los parámetros de alerta
    if (window.location.search.includes('alertMessage') || window.location.search.includes('alertType')) {
        // Limpia los parámetros de la URL sin recargar la página
        // excepto el parámetro de id.
        history.replaceState(null, null, window.location.pathname);
    }

});

// Cierra la alerta automáticamente después de 5 segundos
document.addEventListener("DOMContentLoaded", function () {
    const alert = document.querySelector('.custom-alert-gestion');
    if (alert) {
        setTimeout(() => {
            alert.remove();
        }, 5000); // El mensaje desaparecerá después de 5 segundos
    }
});