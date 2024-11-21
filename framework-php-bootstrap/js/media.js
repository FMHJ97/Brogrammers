document.addEventListener('DOMContentLoaded', function () {
    var grid = document.querySelector('.grid');
    var masonry = new Masonry(grid, {
        itemSelector: '.grid-item',
        columnWidth: '.grid-item',
        percentPosition: true
    });

    function loadImages() {
        fetch('media-url.json')
            .then((response) => response.json())
            .then((json) => {
                appendImages(json);
            });
    }

    function appendImages(imageData) {
        let imagesLoaded = 0;
        const totalImages = imageData.length;

        imageData.forEach((item) => {
            const gridItem = document.createElement("div");

            if (item.width > 500 && item.height > 500) {
                gridItem.className = "grid-item col-12 p-3";
            } else if (item.height > 500) {
                gridItem.className = "grid-item col-md-6 p-3";
            } else if (item.width > 500) {
                gridItem.className = "grid-item col-md-6 p-3";
            } else {
                gridItem.className = "grid-item col-sm-6 col-lg-3 p-3";
            }

            const foto = document.createElement("img");
            foto.src = item.url;
            foto.className = "img-fluid";

            // Wait for the image to load
            foto.onload = function () {
                imagesLoaded++;
                if (imagesLoaded === totalImages) {
                    masonry.layout();
                }
            };

            gridItem.appendChild(foto);
            document.getElementById("mediaContainer").appendChild(gridItem);

            // Notify Masonry of the new item
            masonry.appended(gridItem);
        });
    }



    loadImages();
    //esto se cambia cuando usemos BBDD, por el momento es un ejemplo de la funcionalidad
    document.getElementById("addImages").addEventListener("click", loadImages);
});
