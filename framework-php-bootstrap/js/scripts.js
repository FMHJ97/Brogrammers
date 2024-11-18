src="/path/to/masonry.pkgd.min.js"

// Poner aquí los scripts 
// 

// Ticketing scripts
// When a tab is clicked, the tab is activated and the other tabs are deactivated
// and the content of the tab selected is shown and the other contents are hidden
// When the page is loaded, the first tab is activated and the content of the first tab is shown by default

document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.btn-category-item');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            buttons.forEach(btn => btn.classList.remove('selected'));
            this.classList.add('selected');
        });
    });
});

