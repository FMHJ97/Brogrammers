src = "/path/to/masonry.pkgd.min.js"

// Poner aquí los scripts 
// 

// Script para aumentar o reducir la cantidad de un producto.
document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.btn-quantity');
    const quantity = document.querySelector('#quantity');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            if (this.id === 'sumar') {
                quantity.textContent++;
            } else if (this.id === 'restar' && quantity.textContent > 1) {
                quantity.textContent--;
            }
        });
    });
});

// Script para seleccionar la talla de los productos.
document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.btn-item-size');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            buttons.forEach(btn => btn.classList.remove('selected'));
            this.classList.add('selected');
        });
    });
});

// Script para filtrar y ordenar productos.
document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.btn-category-item');
    const dropdownButton = document.getElementById('dropdownOrderButton');
    const searchInput = document.querySelector('.form-control-search');
    const allProducts = Array.from(document.querySelectorAll('.card-merch-item'));
    const productContainer = document.querySelector('.merch-products');
    let currentCategory = 'all-items';

    // Función para actualizar los productos mostrados
    function updateProductDisplay() {
        const searchQuery = searchInput.value.toLowerCase().trim();

        // Filtramos los productos por categoría y busqueda.
        const filteredProducts = allProducts.filter(product => {
            // Verificamos si el producto cumple con la categoría y la busqueda.
            // Si la categoría es 'all-items' o el producto contiene la categoría actual.
            const matchesCategory = currentCategory === 'all-items' || product.classList.contains(currentCategory);
            // Si el nombre del producto contiene la busqueda.
            const matchesSearch = product.dataset.nombre.toLowerCase().includes(searchQuery);
            // Retornamos si el producto cumple con la categoría y la busqueda.
            return matchesCategory && matchesSearch;
        });

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

    // Evento para buscar productos por nombre.
    searchInput.addEventListener('input', updateProductDisplay);
    // document.querySelector('.btn-search').addEventListener('click', updateProductDisplay);

    // Inicializamos el estado por defecto
    dropdownButton.dataset.order = ''; // Sin orden por defecto
    updateProductDisplay();
});

document.addEventListener("DOMContentLoaded", function () {
    // Seleccionamos la imagen principal
    const mainImage = document.querySelector(".main-image img");

    // Seleccionamos todas las imágenes adicionales
    const additionalImages = document.querySelectorAll(".additional-images img");

    additionalImages.forEach(image => {
        image.addEventListener("click", function () {
            // Eliminamos cualquier clase de filtro previa en la imagen principal
            mainImage.classList.remove("hue-rotate-0", "hue-rotate-90", "hue-rotate-180", "hue-rotate-270");

            // Obtenemos la clase de la imagen clickeada que contiene el filtro
            const filterClass = [...this.classList].find(cls => cls.startsWith("hue-rotate-"));

            // Aplicamos la misma clase a la imagen principal
            if (filterClass) {
                mainImage.classList.add(filterClass);
            }
        });
    });
});
