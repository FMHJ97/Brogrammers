src="/path/to/masonry.pkgd.min.js"

// Poner aquí los scripts 
// 

document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.btn-category-item');
    const products = document.querySelectorAll('.card-merch-item');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            buttons.forEach(btn => btn.classList.remove('selected'));
            this.classList.add('selected');

            // Obtengo el valor del ID del botón seleccionado.
            const categoryId = this.id;
            // Recorro todos los productos en busca de coincidencias con las clases.
            products.forEach(product => {
                product.classList.remove('hide');
                if (!product.classList.contains(categoryId)) {
                    product.classList.add('hide');
                }
            });

        });
    });
});

function updateDropdownText(element) {
    var dropdownButton = document.getElementById('dropdownMenuButton');
    dropdownButton.textContent = 'Ordenar por: ' + element.textContent;
}
