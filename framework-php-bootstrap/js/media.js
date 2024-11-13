document.addEventListener('DOMContentLoaded', function () {
    // Initialize Masonry grid
    var grid = document.querySelector('.grid'); // Get the grid element
    var masonry = new Masonry(grid, {
        itemSelector: '.grid-item', // Class for individual grid items
        columnWidth: '.grid-item',  // Define the column width
        percentPosition: true       // Ensure positions are relative to the container
    });

    function loadImages() {
        fetch('media-url.json')
            .then((response) => response.json())
            .then((json) => {
                json.forEach((item) => {
                    const gridItem = document.createElement("div");
                    gridItem.className = "grid-item"; // Apply the grid item class

                    const card = document.createElement("div");
                    card.className = "card"; // Card class for styling (optional)

                    const foto = document.createElement("img");
                    foto.src = item.url; // Set image URL

                    // Wait for the image to load before checking its size
                    foto.onload = function () {
                        console.log("Image loaded: " + foto.naturalWidth + "x" + foto.naturalHeight);

                        // Optionally, perform any actions based on image dimensions
                        if (foto.naturalWidth > 500 && foto.naturalHeight > 500) { 
                            foto.className = "grid-item--height4 grid-item--width4"; // Larger images
                        } else if (foto.naturalHeight > 500) {
                            foto.className = "grid-item--height4"; // Taller images
                        } else if (foto.naturalWidth > 500) {
                            foto.className = "grid-item--width4"; // Wider images
                        } 

                        // Append the image to the grid item (not the card)
                        gridItem.appendChild(foto);

                        // Append the card to the grid container
                        document.getElementById("mediaContainer").appendChild(gridItem);

                        // Trigger Masonry layout refresh after new item is added
                        masonry.appended(gridItem); // Notify Masonry of the new item
                    };
                });
            });
    }

    // Call the function to load images
    loadImages();
});
