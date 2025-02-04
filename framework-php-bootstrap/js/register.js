document.addEventListener("DOMContentLoaded", function() {
    const termsCheckbox = document.getElementById("termsCheckbox");
    const btnCrearCuenta = document.getElementById("btnCrearCuenta");

    termsCheckbox.addEventListener("change", function() {
        btnCrearCuenta.disabled = !this.checked;
    });
});

const divMensaje = document.getElementById('mensajeAlert')
const alertTrigger = document.getElementById('btnCrearCuenta')
// Función para agregar alertas de Bootstrap
const appendAlert = (message, type) => {
    const wrapper = document.createElement('div');
    wrapper.innerHTML = `
        <div class="alert alert-${type} alert-dismissible fade show" role="alert">
            <div>${message}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>`;
        divMensaje.append(wrapper);
};

// Mostrar error si PHP ha pasado un mensaje
const errorMessage = divMensaje.getAttribute('data-error');
if (errorMessage) {
    appendAlert(errorMessage, 'danger');
}
