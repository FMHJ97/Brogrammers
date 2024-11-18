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

<<<<<<< HEAD
function updateDropdownText(element) {
    var dropdownButton = document.getElementById('dropdownMenuButton');
    dropdownButton.textContent = 'Ordenar por: ' + element.textContent;
}
=======
>>>>>>> da20e2a5d0babbc7694c23af79fd5b1fe2fbb46a
