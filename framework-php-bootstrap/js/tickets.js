document.addEventListener('DOMContentLoaded', function () {
    // Function to get the value of a parameter in the URL
    function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    // Read the 'tab' parameter value
    const selectedTab = getQueryParam('tab');

    // DOM elements for tabs and content rows
    const campingTab = document.getElementById('btnCamping');
    const parkingTab = document.getElementById('btnParking');
    const campingPrices = document.getElementById('rowCamping');
    const parkingPrices = document.getElementById('rowParking');

    // Show the correct section based on the 'tab' parameter without relying on clicks
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

    // Remove the 'tab' parameter from the URL after loading the page
    history.replaceState(null, null, window.location.pathname);

    // Event to handle the selection of general and VIP price tabs
    const buttons = document.querySelectorAll('.btn-category-item');
    const generalPrices = document.getElementById('rowGeneralPrices');
    const vipPrices = document.getElementById('rowVipPrices');

    // Handle clicks on tab selection buttons
    buttons.forEach(button => {
        button.addEventListener('click', function () {
            buttons.forEach(btn => btn.classList.remove('selected'));
            this.classList.add('selected');
        
            // Show the correct section based on the selected tab
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
