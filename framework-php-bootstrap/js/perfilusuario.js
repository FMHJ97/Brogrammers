document.addEventListener('DOMContentLoaded', function() {

// JavaScript para manejar el hover y el click
const imageContainer = document.querySelector('.image-container');
const imageOverlay = document.getElementById('imageOverlay');
const imagenInput = document.getElementById('imagenInput');

// Mostrar overlay al hacer hover
imageContainer.addEventListener('mouseenter', () => {
    imageOverlay.style.opacity = '1';
});

// Ocultar overlay al quitar el hover
imageContainer.addEventListener('mouseleave', () => {
    imageOverlay.style.opacity = '0';
});

// Click en el overlay abre el selector de archivos
imageOverlay.addEventListener('click', (e) => {
    e.preventDefault();
    imagenInput.click();
});

// Previsualización de imagen
function previsualizarImagen(event) {
    const input = event.target;
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            document.getElementById('imagenPrevisualizacion').src = e.target.result;
        };
        
        reader.readAsDataURL(input.files[0]);
    }
}

// Actualizar previsualización cuando cambia el archivo
imagenInput.addEventListener('change', previsualizarImagen);

});