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
                let imagesLoaded = 0;
                const totalImages = json.length;

                json.forEach((item) => {
                    const gridItem = document.createElement("div");

                    // Apply appropriate Bootstrap column classes
                    if (item.width > 500 && item.height > 500) {
                        gridItem.className = "grid-item col-12";
                    } else if (item.height > 500) {
                        gridItem.className = "grid-item col-md-6";
                    } else if (item.width > 500) {
                        gridItem.className = "grid-item col-md-6";
                    } else {
                        gridItem.className = "grid-item col-sm-6 col-lg-3";
                    }

                    const foto = document.createElement("img");
                    foto.src = item.url;
                    foto.className = "img-fluid";
                    
                    // When the image is loaded, check if all images are loaded
                    foto.onload = function () {
                        imagesLoaded++;
                        if (imagesLoaded === totalImages) {
                            // Trigger Masonry layout after all images have loaded
                            masonry.layout();
                        }
                    };

                    gridItem.appendChild(foto);
                    document.getElementById("mediaContainer").appendChild(gridItem);

                    // Notify Masonry of the new item
                    masonry.appended(gridItem);
                });
            });
    }

    loadImages();
});
