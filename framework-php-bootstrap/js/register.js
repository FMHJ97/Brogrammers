document.addEventListener("DOMContentLoaded", function() {
    const termsCheckbox = document.getElementById("termsCheckbox");
    const btnCrearCuenta = document.getElementById("btnCrearCuenta");

    termsCheckbox.addEventListener("change", function() {
        btnCrearCuenta.disabled = !this.checked;
    });
});
