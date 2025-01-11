// Vamos a hacer un Tetris con Konva

// Variables globales
var stage;
var layer;
var tetris;

// Variables de configuración
var config = {
    width: 10,
    height: 20,
    blockSize: 30,
    speed: 500
};

// Variables de estado
var state = {
    tetromino: null,
    interval: null,
    score: 0,
    gameOver: false
};

// Tetrominos
var tetrominos = [
    {
        color: 'red',
        blocks: [
            [1, 1, 1],
            [0, 1, 0]
        ]
    },
    {
        color: 'blue',
        blocks: [
            [1, 1, 1],
            [1, 0, 0]
        ]
    },
    {
        color: 'green',
        blocks: [
            [1, 1, 1],
            [0, 0, 1]
        ]
    },
    {
        color: 'yellow',
        blocks: [
            [1, 1],
            [1, 1]
        ]
    },
    {
        color: 'purple',
        blocks: [
            [1, 1, 0],
            [0, 1, 1]
        ]
    },
    {
        color: 'orange',
        blocks: [
            [0, 1, 1],
            [1, 1, 0]
        ]
    },
    {
        color: 'cyan',
        blocks: [
            [1, 1, 1, 1]
        ]
    }
];

// Funciones

function init() {
    stage = new Konva.Stage({
        container: 'gameContainerTetris',
        width: config.width * config.blockSize,
        height: config.height * config.blockSize
    });

    layer = new Konva.Layer();
    stage.add(layer);

    tetris = new Array(config.width * config.height).fill(null);

    document.addEventListener('keydown', onKeyDown);

    startGame();
}

function startGame() {
    state.score = 0;
    state.gameOver = false;

    state.tetromino = randomTetromino();
    state.interval = setInterval(() => {
        moveTetromino(0, 1);
    }, config.speed);
}

function stopGame() {
    clearInterval(state.interval);
    state.interval = null;
}

// Mostrar la puntuación dinámica
function updateScore() {
    document.getElementById('score').textContent = 'Puntuación: ' + state.score;
}

function randomTetromino() {
    var tetromino = tetrominos[Math.floor(Math.random() * tetrominos.length)];
    tetromino.x = Math.floor(config.width / 2 - tetromino.blocks[0].length / 2);
    tetromino.y = 0;
    return tetromino;
}

function moveTetromino(dx, dy) {
    if (state.gameOver) {
        return;
    }

    var x = state.tetromino.x + dx;
    var y = state.tetromino.y + dy;

    if (collides(state.tetromino, x, y)) {
        if (dy > 0) {
            placeTetromino();
        }
        return;
    }

    state.tetromino.x = x;
    state.tetromino.y = y;

    render();
}

function rotateTetromino() {
    if (state.gameOver) {
        return;
    }

    var blocks = state.tetromino.blocks;
    var size = blocks.length;

    var rotated = new Array(size).fill(null).map(() => new Array(size).fill(0));

    for (var y = 0; y < size; y++) {
        for (var x = 0; x < size; x++) {
            rotated[x][y] = blocks[y][size - 1 - x];
        }
    }

    if (!collides(state.tetromino, state.tetromino.x, state.tetromino.y, rotated)) {
        state.tetromino.blocks = rotated;
    }

    render();
}

function collides(tetromino, x, y, blocks = tetromino.blocks) {
    for (var j = 0; j < blocks.length; j++) {
        for (var i = 0; i < blocks[j].length; i++) {
            if (blocks[j][i]) {
                var px = x + i;
                var py = y + j;

                if (px < 0 || px >= config.width || py >= config.height) {
                    return true;
                }

                if (py >= 0 && tetris[py * config.width + px]) {
                    return true;
                }
            }
        }
    }

    return false;
}

function placeTetromino() {
    var blocks = state.tetromino.blocks;

    for (var j = 0; j < blocks.length; j++) {
        for (var i = 0; i < blocks[j].length; i++) {
            if (blocks[j][i]) {
                var x = state.tetromino.x + i;
                var y = state.tetromino.y + j;
                tetris[y * config.width + x] = state.tetromino.color;
            }
        }
    }

    var lines = 0;

    for (var y = 0; y < config.height; y++) {
        var line = tetris.slice(y * config.width, y * config.width + config.width);

        if (line.every(cell => cell)) {
            tetris.splice(y * config.width, config.width);
            tetris = new Array(config.width).fill(null).concat(tetris);
            lines++;
        }
    }

    state.score += lines;

    if (lines > 0) {
        render();
        updateScore();  // Actualiza la puntuación cada vez que se complete una línea
    }

    state.tetromino = randomTetromino();

    if (collides(state.tetromino, state.tetromino.x, state.tetromino.y)) {
        stopGame();
        state.gameOver = true;
    }
}

function render() {
    layer.removeChildren();

    tetris.forEach((color, index) => {
        if (color) {
            var x = index % config.width;
            var y = Math.floor(index / config.width);

            var block = new Konva.Rect({
                x: x * config.blockSize,
                y: y * config.blockSize,
                width: config.blockSize,
                height: config.blockSize,
                fill: color
            });

            layer.add(block);
        }
    });

    var blocks = state.tetromino.blocks;

    for (var j = 0; j < blocks.length; j++) {
        for (var i = 0; i < blocks[j].length; i++) {
            if (blocks[j][i]) {
                var x = (state.tetromino.x + i) * config.blockSize;
                var y = (state.tetromino.y + j) * config.blockSize;

                var block = new Konva.Rect({
                    x: x,
                    y: y,
                    width: config.blockSize,
                    height: config.blockSize,
                    fill: state.tetromino.color
                });

                layer.add(block);
            }
        }
    }

    layer.draw();
}

function onKeyDown(event) {
    switch (event.key) {
        case 'ArrowLeft':
            moveTetromino(-1, 0);
            break;
        case 'ArrowRight':
            moveTetromino(1, 0);
            break;
        case 'ArrowDown':
            moveTetromino(0, 1);
            break;
        case 'ArrowUp':
            rotateTetromino();
            break;
    }
}

// Función para reiniciar el juego
function resetGame() {
    clearInterval(state.interval);
    state = {
        tetromino: null,
        interval: null,
        score: 0,
        gameOver: false
    };
    tetris = new Array(config.width * config.height).fill(null);
    layer.removeChildren();
    startGame();
}

// Inicialización
init();
