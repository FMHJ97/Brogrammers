src="/path/to/masonry.pkgd.min.js"

// Poner aquí los scripts 
// 

// Script para aumentar o reducir la cantidad de un producto.
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.btn-quantity');
    const quantity = document.querySelector('#quantity');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            if (this.id === 'sumar') {
                quantity.textContent++;
            } else if (this.id === 'restar' && quantity.textContent > 1) {
                quantity.textContent--;
            }
        });
    });
});

// Script para seleccionar la talla de los productos.
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.btn-item-size');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            buttons.forEach(btn => btn.classList.remove('selected'));
            this.classList.add('selected');
        });
    });
});

// Script para filtrar productos por categoría.
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
    var dropdownButton = document.getElementById('dropdownOrderButton');
    dropdownButton.textContent = 'Ordenar por: ' + element.textContent;
}
