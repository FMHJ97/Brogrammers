document.addEventListener("DOMContentLoaded", function () {
    const captcha = document.getElementById('captcha');
    const termsCheckbox = document.getElementById("termsCheckbox");
    const btnCrearCuenta = document.getElementById("btnCrearCuenta");
    const divMensaje = document.getElementById('mensajeAlert');

    // Función para comprobar si ambos requisitos están cumplidos
    const validarFormulario = () => {
        const captchaValido = captcha.value.trim() !== ""; // Verifica si el captcha tiene contenido
        const termsChecked = termsCheckbox.checked; // Verifica si el checkbox está marcado
        btnCrearCuenta.disabled = !(captchaValido && termsChecked);
    };

    // Eventos para validar cada cambio
    termsCheckbox.addEventListener("change", validarFormulario);
    captcha.addEventListener("input", validarFormulario);

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

    // Validar en caso de que el usuario haya dejado datos previos
    validarFormulario();
});