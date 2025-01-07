var game = (function () {

    var stage, layer;
    var speed = 2;
    var x = 0;
    var y = 50;
    var imgCargadas = 0;
    const objectWidth = 40;
    const objectHeight = 80;

    let anim; // Make sure anim is declared here
    let fallingObjects = [];
    let fallingObjectIntervalId, cruzcampoIntervalId;
    let cruzcampos = [];
    var maxCruzcampos = 5;
    var imgAlhambra, imgEstrella, imgCruzcampo, imgCaja;
    var imageNodes = {};
    var varInterval = 1500;

    var playerX = window.innerWidth / 2;
    var playerY = window.innerHeight - 100;
    var playerSpeed = 8;
    var playerWidth = 100;
    var playerHeight = 80;

    let score = 0;
    var maxFallingObjects = 15;
    let lives = 3;

    let leftPressed = false;
    let rightPressed = false;

    document.addEventListener("keydown", (event) => {
        if (event.key === "ArrowLeft") leftPressed = true;
        if (event.key === "ArrowRight") rightPressed = true;
    });

    document.addEventListener("keyup", (event) => {
        if (event.key === "ArrowLeft") leftPressed = false;
        if (event.key === "ArrowRight") rightPressed = false;
    });

    function preloadImages() {
        imgAlhambra = new Image();
        imgEstrella = new Image();
        imgCruzcampo = new Image();
        imgCaja = new Image();

        imgAlhambra.src = 'assets/img/cervestival/alhambra.png';
        imgEstrella.src = 'assets/img/cervestival/estrella.png';
        imgCruzcampo.src = 'assets/img/cervestival/cruzcampo.png';
        imgCaja.src = 'assets/img/cervestival/crate.png';

        const images = [imgAlhambra, imgEstrella, imgCruzcampo, imgCaja];
        images.forEach((img) => {
            img.onload = () => {
                imgCargadas++;
                if (imgCargadas === images.length) {
                    startGame();
                }
            };
        });
    }

    function startGame() {
        var container = document.getElementById('gameContainer');
        var containerWidth = container.getBoundingClientRect().width;
        var containerHeight = container.getBoundingClientRect().height;

        stage = new Konva.Stage({
            container: 'gameContainer',
            width: containerWidth,
            height: containerHeight,
        });

        layer = new Konva.Layer();
        stage.add(layer);

        imageNodes.scoreText = new Konva.Text({
            x: 10,
            y: 10,
            fontSize: 20,
            fontFamily: 'Arial',
            fill: 'white',
            text: 'Score: 0',
        });

        layer.add(imageNodes.scoreText);

        imageNodes.player = new Konva.Image({
            x: playerX,
            y: playerY,
            image: imgCaja,
            width: playerWidth,
            height: playerHeight,
        });
        layer.add(imageNodes.player);

        setInterval(createFallingObject, 500);
        setInterval(createFallingAlhambra, 5000);
        restartCruzcampoInterval();
        animate();
    }

    function animate() {
        anim = new Konva.Animation(function (frame) { // Use the global anim reference
            y += speed;
            if (y > stage.width()) y = 0;

            fallingObjects.forEach((obj, index) => {
                obj.img.y(obj.img.y() + obj.speed);

                if (obj.img.y() > stage.height()) {
                    obj.img.remove();
                    fallingObjects.splice(index, 1);
                }

                if (
                    obj.img.y() + objectHeight >= playerY + 20 &&
                    obj.img.x() + objectWidth >= playerX +20 &&
                    obj.img.x() <= playerX + playerWidth
                ) {
                    if (obj.img.image().src.includes('alhambra.png')) {
                        score += 50;
                    } else score += 10;
                    obj.img.remove();
                    fallingObjects.splice(index, 1);
                    updateMax();
                    updateScore();
                }
            });

            cruzcampos.forEach((obj, index) => {
                obj.img.y(obj.img.y() + obj.speed);

                if (obj.img.y() > stage.height()) {
                    obj.img.remove();
                    cruzcampos.splice(index, 1);
                }

                if (
                    obj.img.y() + objectHeight >= playerY + 20 &&
                    obj.img.x() + objectWidth >= playerX +20 &&
                    obj.img.x() <= playerX + playerWidth
                ) {
                    obj.img.remove();
                    cruzcampos.splice(index, 1);
                    lives -= 1;
                    updateScore();
                }
            });

            if (leftPressed && playerX > 0) {
                playerX -= playerSpeed;
            }
            if (rightPressed && playerX < stage.width() - playerWidth) {
                playerX += playerSpeed;
            }

            imageNodes.player.x(playerX);

            // Stop the game if lives reach 0
            if (lives <= 0) {
                endGame();
                return; // Stop the animation loop
            }

            layer.batchDraw();
        }, layer);

        anim.start(); // Start the animation loop
    }

    function updateScore() {
        imageNodes.scoreText.text('Score: ' + score);
        layer.batchDraw();
    }

    function updateMax() {
        maxFallingObjects = 15 + (Math.floor(score / 100));
        maxCruzcampos = 5 + (Math.floor(score / 100));
        if (varInterval >= 0) {
            varInterval = 1500 - (Math.floor(score / 2));
            restartCruzcampoInterval();
        } else {
            varInterval = 0;
            restartCruzcampoInterval();
        }
    }

    function restartCruzcampoInterval() {
        if (cruzcampoIntervalId) {
            clearInterval(cruzcampoIntervalId);
        }
        cruzcampoIntervalId = setInterval(createFallingCruzcampo, varInterval);
    }

    function createFallingObject() {
        if (fallingObjects.length < maxFallingObjects) {
            const x = Math.random() * (stage.width() - objectWidth);
            const speed = Math.random() * (5 - 1) + 1;
            const img = new Konva.Image({
                x: x,
                y: -objectHeight,
                image: imgEstrella,
                width: objectWidth,
                height: objectHeight,
            });

            fallingObjects.push({ img, speed });
            layer.add(img);
        }
    }

    function createFallingAlhambra() {
        if (fallingObjects.length < maxFallingObjects) {
            const x = Math.random() * (stage.width() - objectWidth);
            const speed = Math.random() * (5 - 1) + 1;
            const img = new Konva.Image({
                x: x,
                y: -objectHeight,
                image: imgAlhambra,
                width: 30,
                height: objectHeight,
            });

            fallingObjects.push({ img, speed });
            layer.add(img);
        }
    }

    function createFallingCruzcampo() {
        if (cruzcampos.length < maxCruzcampos) {
            const x = Math.random() * (stage.width() - objectWidth);
            const speed = Math.random() * (8 - 1) + 1;
            const img = new Konva.Image({
                x: x,
                y: -objectHeight,
                image: imgCruzcampo,
                width: 40,
                height: objectHeight,
            });

            cruzcampos.push({ img, speed });
            layer.add(img);
        }
    }

    function endGame() {
        // Stop the Konva animation
        if (anim) anim.stop();

        // Clear all object creation intervals
        clearInterval(fallingObjectIntervalId);
        clearInterval(cruzcampoIntervalId);

        // Show "Game Over" message
        const gameOverText = new Konva.Text({
            x: stage.width() / 2 - 100,
            y: stage.height() / 2 - 50,
            fontSize: 30,
            fontFamily: 'Arial',
            fill: 'red',
            text: `Game Over\nFinal Score: ${score}`,
            align: 'center',
        });

        layer.add(gameOverText);
        layer.batchDraw();

        console.log("Game Over - Final Score:", score); // Debugging log
    }

    function init() {
        preloadImages();
    }

    return {
        init: init
    };
})();

game.init();
