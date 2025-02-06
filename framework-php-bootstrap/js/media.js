document.addEventListener('DOMContentLoaded', function () {
    var grid = document.querySelector('.grid');
    var masonry = new Masonry(grid, {
        itemSelector: '.grid-item',
        columnWidth: '.grid-item',
        percentPosition: true
    });

    let allImages = []; // Store all image data
    let currentIndex = 0; // Track how many images have been displayed
    const imagesPerBatch = 50; // Number of images to load per click

    function fetchAllImages() {
        fetch('../controller/get_images.php')
            .then((response) => response.json())
            .then((json) => {
                allImages = json; // Store all images in memory
                appendImages(); // Load the first batch
            })
            .catch((error) => {
                console.error('Error fetching images:', error);
            });
    }

    function appendImages() {
        const nextBatch = allImages.slice(currentIndex, currentIndex + imagesPerBatch);
        currentIndex += nextBatch.length; // Update current index

        if (nextBatch.length === 0) {
            console.log("No more images to load.");
            document.getElementById("addImages").style.display = "none"; // Hide button when done
            return;
        }

        let imagesLoaded = 0;
        const totalImages = nextBatch.length;

        nextBatch.forEach((item) => {
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

            // If the image is a Blob, use createObjectURL
            if (item.img instanceof Blob) {
                const objectURL = URL.createObjectURL(item.img);
                foto.src = objectURL;
            } else {
                foto.src = item.img;
            }

            foto.className = "img-fluid";

            foto.onload = function () {
                imagesLoaded++;
                if (imagesLoaded === totalImages) {
                    masonry.layout();
                }
            };

            gridItem.appendChild(foto);
            document.getElementById("mediaContainer").appendChild(gridItem);

            masonry.appended(gridItem);
        });
    }

    fetchAllImages(); // Load all images into memory first

    document.getElementById("addImages").addEventListener("click", appendImages);
});
