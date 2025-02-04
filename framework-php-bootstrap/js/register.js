document.addEventListener("DOMContentLoaded", function() {
    const termsCheckbox = document.getElementById("termsCheckbox");
    const btnCrearCuenta = document.getElementById("btnCrearCuenta");

    termsCheckbox.addEventListener("change", function() {
        btnCrearCuenta.disabled = !this.checked;
    });
});

const alertPlaceholder = document.getElementById('mensajeAlert')
const appendAlert = (message, type) => {
  const wrapper = document.createElement('div')
  wrapper.innerHTML = [
    `<div class="alert alert-${type} alert-dismissible" role="alert">`,
    `   <div>${message}</div>`,
    '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
    '</div>'
  ].join('')

  alertPlaceholder.append(wrapper)
}

const alertTrigger = document.getElementById('btnCrearCuenta')
if (alertTrigger) {
  alertTrigger.addEventListener('click', () => {
    appendAlert('No se ha podido registrar. Revise los datos introducidos!', 'danger')
  })
}