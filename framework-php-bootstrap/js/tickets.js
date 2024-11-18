// Showing the row of the tickets of the tab selected

document.addEventListener('click', function() {
    const buttons = document.querySelectorAll('.btn-category-item');
    const generalPrices = document.getElementById('rowGeneralPrices');
    const vipPrices = document.getElementById('rowVipPrices');

    // When general prices tab is clicked we show the row rowGeneralPrices
    // and when the other tab is clicked we hide the row rowGeneralPrices and show the row rowVipPrices
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            buttons.forEach(btn => btn.classList.remove('selected'));
            this.classList.add('selected');
        
            if (button.id === 'btnGeneralPrices') {
                generalPrices.classList.remove('d-none');
                vipPrices.classList.add('d-none');
            } else if (this.id === 'btnVips') {
                generalPrices.classList.add('d-none');
                vipPrices.classList.remove('d-none');
            }
        });
    });

});