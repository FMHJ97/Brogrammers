src="/path/to/masonry.pkgd.min.js"

// Poner aquí los scripts 
// 

document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.btn-category-item');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            buttons.forEach(btn => btn.classList.remove('selected'));
            this.classList.add('selected');
        });
    });
});

function updateDropdownText(element) {
    var dropdownButton = document.getElementById('dropdownMenuButton');
    dropdownButton.textContent = 'Ordenar por: ' + element.textContent;
}