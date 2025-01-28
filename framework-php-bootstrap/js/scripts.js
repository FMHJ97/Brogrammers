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
// document.addEventListener('DOMContentLoaded', function() {
//     const buttons = document.querySelectorAll('.btn-category-item');
//     const products = document.querySelectorAll('.card-merch-item');

//     buttons.forEach(button => {
//         button.addEventListener('click', function() {
//             buttons.forEach(btn => btn.classList.remove('selected'));
//             this.classList.add('selected');

//             // Obtengo el valor del ID del botón seleccionado.
//             const categoryId = this.id;
//             // Recorro todos los productos en busca de coincidencias con las clases.
//             products.forEach(product => {
//                 product.classList.remove('hide');
//                 if (!product.classList.contains(categoryId)) {
//                     product.classList.add('hide');
//                 }
//             });

//         });
//     });
// });

// const allProducts = Array.from(document.querySelectorAll('.card-merch-item'));

// function updateDropdownText(element) {
//     var dropdownButton = document.getElementById('dropdownOrderButton');
//     dropdownButton.textContent = 'Ordenar por: ' + element.textContent;

//     // Obtenemos todos los productos que no contengan la clase 'hide'.
//     var products = allProducts.filter(product => !product.classList.contains('hide'));

//     // Ordenamos los productos según el valor del atributo 'data-price'.
//     products = Array.from(products).sort(function(a, b) {
//         if (element.id === 'asc') {
//             return a.getAttribute('data-precio') - b.getAttribute('data-precio');
//         } else if (element.id === 'desc') {
//             return b.getAttribute('data-precio') - a.getAttribute('data-precio');
//         }
//     });
    
//     // Obtenemos el contenedor de productos.
//     var contenedor = document.querySelector('.merch-products');
//     // Vaciando el contenedor de productos.
//     contenedor.innerHTML = '';
//     // Insertamos los productos ordenados.
//     products.forEach(product => contenedor.appendChild(product));
// }


document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.btn-category-item');
    const dropdownButton = document.getElementById('dropdownOrderButton');
    const allProducts = Array.from(document.querySelectorAll('.card-merch-item'));
    const productContainer = document.querySelector('.merch-products');
    let currentCategory = 'all-items'; // Por defecto, mostrar todos los productos.

    // Función para actualizar los productos mostrados
    function updateProductDisplay() {
        const filteredProducts = allProducts.filter(product => 
            currentCategory === 'all-items' || product.classList.contains(currentCategory)
        );

        // Ordenamos los productos filtrados según el atributo 'data-precio'
        const sortedProducts = filteredProducts.sort((a, b) => {
            if (dropdownButton.dataset.order === 'asc') {
                return a.getAttribute('data-precio') - b.getAttribute('data-precio');
            } else if (dropdownButton.dataset.order === 'desc') {
                return b.getAttribute('data-precio') - a.getAttribute('data-precio');
            }
            return 0; // Sin orden específico (relevancia)
        });

        // Limpiamos e insertamos los productos ordenados y filtrados en el contenedor
        productContainer.innerHTML = '';
        sortedProducts.forEach(product => productContainer.appendChild(product));
    }

    // Evento para cambiar de categoría
    buttons.forEach(button => {
        button.addEventListener('click', function () {
            buttons.forEach(btn => btn.classList.remove('selected'));
            this.classList.add('selected');
            currentCategory = this.id; // Actualizamos la categoría seleccionada
            updateProductDisplay();
        });
    });

    // Evento para cambiar el orden de los productos
    function updateDropdownText(element) {
        dropdownButton.textContent = 'Ordenar por: ' + element.textContent;
        dropdownButton.dataset.order = element.id; // Guardamos el tipo de orden en un atributo de datos
        updateProductDisplay();
    }

    // Asociamos la función a los botones del dropdown
    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function () {
            updateDropdownText(this);
        });
    });

    // Inicializamos el estado por defecto
    dropdownButton.dataset.order = ''; // Sin orden por defecto
    updateProductDisplay();
});
