// Showing the row of the tickets of the tab selected

document.addEventListener('click', function() {
    const buttons = document.querySelectorAll('.btn-category-item');

    // When general prices tab is clicked we show the row rowGeneralPrices
    // and when the other tab is clicked we hide the row rowGeneralPrices and show the row rowVipPrices
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            buttons.forEach(btn => btn.classList.remove('selected'));
            this.classList.add('selected');
            if (this.id === 'generalPrices') {
                document.getElementById('rowGeneralPrices').style.display = 'block';
                document.getElementById('rowVipPrices').style.display = 'none';
            } else {
                document.getElementById('rowGeneralPrices').style.display = 'none';
                document.getElementById('rowVipPrices').style.display = 'block';
            }
        });
    });
});

