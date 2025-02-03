document.addEventListener("DOMContentLoaded", function () {
    const quill = new Quill('#eq-editor', {
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                [{ list: 'ordered' }, { list: 'bullet' }]
            ]
        },
        theme: 'snow',
        placeholder: 'Escriba aquí su valoración...',
    });

    function setStars(rating, container) {
        const stars = container.querySelectorAll(".bi-star-fill");
        stars.forEach(star => {
            const value = parseInt(star.getAttribute("data-value"));
            star.classList.toggle("active", value <= rating);
        });
    }

    document.querySelectorAll(".rating-stars").forEach(container => {
        let rating = parseInt(container.getAttribute("data-rating")); // Cargar de la BD
        setStars(rating, container);

        container.addEventListener("click", function (event) {
            if (event.target.classList.contains("bi-star-fill")) {
                let newRating = parseInt(event.target.getAttribute("data-value"));
                container.setAttribute("data-rating", newRating);
                setStars(newRating, container);

                console.log("Nueva valoración:", newRating); // Aquí puedes enviar a la BD con fetch/AJAX
            }
        });
    });

});