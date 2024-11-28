document.addEventListener('DOMContentLoaded', function () {
    // Función para obtener el valor de un parámetro en la URL
    function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    // Leer el valor del parámetro 'tab'
    const selectedTab = getQueryParam('tab');

    // Elementos del DOM para las pestañas y las filas de contenido
    const campingTab = document.getElementById('btnCamping');
    const parkingTab = document.getElementById('btnParking');
    const campingPrices = document.getElementById('rowCamping');
    const parkingPrices = document.getElementById('rowParking');

    // Mostrar la sección correcta según el parámetro 'tab' sin depender de clics
    if (selectedTab === 'camping') {
        parkingTab.classList.remove('selected');
        campingTab.classList.add('selected');
        campingPrices.classList.remove('d-none');
        parkingPrices.classList.add('d-none');
    } else if (selectedTab === 'parking') {
        campingTab.classList.remove('selected');
        parkingTab.classList.add('selected');
        parkingPrices.classList.remove('d-none');
        campingPrices.classList.add('d-none');
    }

    // Eliminar el parámetro 'tab' de la URL después de cargar la página
    history.replaceState(null, null, window.location.pathname);

    // Evento para manejar la selección de pestañas de precios generales y VIP
    const buttons = document.querySelectorAll('.btn-category-item');
    const generalPrices = document.getElementById('rowGeneralPrices');
    const vipPrices = document.getElementById('rowVipPrices');

    // Manejar clics en los botones de selección de pestañas
    buttons.forEach(button => {
        button.addEventListener('click', function () {
            buttons.forEach(btn => btn.classList.remove('selected'));
            this.classList.add('selected');
        
            // Mostrar la sección correcta según la pestaña seleccionada
            if (button.id === 'btnGeneralPrices') {
                generalPrices.classList.remove('d-none');
                vipPrices.classList.add('d-none');
            } else if (this.id === 'btnVips') {
                generalPrices.classList.add('d-none');
                vipPrices.classList.remove('d-none');
            } else if (button.id === 'btnCamping') {
                campingPrices.classList.remove('d-none');
                parkingPrices.classList.add('d-none');
            } else if (this.id === 'btnParking') {
                campingPrices.classList.add('d-none');
                parkingPrices.classList.remove('d-none');
            }
        });
    });
});
