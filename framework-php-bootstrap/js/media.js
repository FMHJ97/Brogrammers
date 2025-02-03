document.addEventListener('DOMContentLoaded', function () {
    var grid = document.querySelector('.grid');
    var masonry = new Masonry(grid, {
        itemSelector: '.grid-item',
        columnWidth: '.grid-item',
        percentPosition: true
    });

    function loadImages() {
        fetch('../controller/get_images.php')  
            .then((response) => response.json())
            .then((json) => {
                appendImages(json); 
            })
            .catch((error) => {
                console.error('Error fetching images:', error);
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
    
            // If the image is a Blob, use createObjectURL to generate a URL
            if (item.img instanceof Blob) {
                const objectURL = URL.createObjectURL(item.img);
                foto.src = objectURL;
            } else {
                foto.src = item.img; // Fallback for normal image URLs
            }
            
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
