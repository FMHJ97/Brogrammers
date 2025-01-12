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
    gameOver: false,
    nextTetromino: null,
};

var savedTetromino = null; // Para la pieza guardada
var canHold = true; // Controla si se puede guardar

// Tetrominos
var tetrominos = [
    { color: 'red', blocks: [[1, 1, 1], [0, 1, 0]] },
    { color: 'blue', blocks: [[1, 1, 1], [1, 0, 0]] },
    { color: 'green', blocks: [[1, 1, 1], [0, 0, 1]] },
    { color: 'yellow', blocks: [[1, 1], [1, 1]] },
    { color: 'purple', blocks: [[1, 1, 0], [0, 1, 1]] },
    { color: 'orange', blocks: [[0, 1, 1], [1, 1, 0]] },
    { color: 'cyan', blocks: [[1, 1, 1, 1]] }
];

// Vincular el evento click del botón "Iniciar"
document.getElementById('startButton').addEventListener('click', init);

// Inicializar el juego
function init() {
    // Ocultar el botón de inicio
    document.getElementById('startButtonContainer').style.display = 'none';

    stage = new Konva.Stage({
        container: 'gameContainerTetris',
        width: config.width * config.blockSize,
        height: config.height * config.blockSize
    });

    layer = new Konva.Layer();
    stage.add(layer);

    tetris = new Array(config.width * config.height).fill(null);

    // Vincular la función onKeyDown al evento keydown
    document.addEventListener('keydown', onKeyDown);

    startGame();
}

// Función que inicia el juego
function startGame() {
    state.score = 0;
    state.gameOver = false;

    state.nextTetromino = randomTetromino();
    state.tetromino = randomTetromino();

    // Mostrar la siguiente y la guardada pieza
    updateNextPiece();
    updateSavedPiece();

    state.interval = setInterval(function () {
        moveTetromino(0, 1);
    }, config.speed);
}

// Mostrar la siguiente pieza en el contenedor
function updateNextPiece() {
    const nextPieceContainer = document.getElementById('nextPiece');
    nextPieceContainer.innerHTML = ''; // Limpiar el contenedor de la siguiente pieza

    const nextTetromino = state.nextTetromino;
    const nextStage = new Konva.Stage({
        container: 'nextPiece',
        width: 100,
        height: 100
    });

    const nextLayer = new Konva.Layer();
    nextStage.add(nextLayer);

    nextTetromino.blocks.forEach((row, y) => {
        row.forEach((block, x) => {
            if (block) {
                const blockRect = new Konva.Rect({
                    x: x * config.blockSize,
                    y: y * config.blockSize,
                    width: config.blockSize,
                    height: config.blockSize,
                    fill: nextTetromino.color
                });
                nextLayer.add(blockRect);
            }
        });
    });

    nextLayer.draw();
}

// Mostrar la pieza guardada en el contenedor
function updateSavedPiece() {
    const savedPieceContainer = document.getElementById('savedPiece');
    savedPieceContainer.innerHTML = ''; // Limpiar el contenedor de la pieza guardada

    if (!savedTetromino) return; // Si no hay pieza guardada, salir

    const savedStage = new Konva.Stage({
        container: 'savedPiece',
        width: 100,
        height: 100
    });

    const savedLayer = new Konva.Layer();
    savedStage.add(savedLayer);

    savedTetromino.blocks.forEach((row, y) => {
        row.forEach((block, x) => {
            if (block) {
                const blockRect = new Konva.Rect({
                    x: x * config.blockSize,
                    y: y * config.blockSize,
                    width: config.blockSize,
                    height: config.blockSize,
                    fill: savedTetromino.color
                });
                savedLayer.add(blockRect);
            }
        });
    });

    savedLayer.draw();
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

    // Actualizamos la siguiente pieza
    state.tetromino = state.nextTetromino;
    state.nextTetromino = randomTetromino();  // Generamos una nueva siguiente pieza

    // Mostrar la siguiente pieza
    updateNextPiece();

    if (collides(state.tetromino, state.tetromino.x, state.tetromino.y)) {
        gameOver();  // Llamar a gameOver si colisiona
    }
}


function stopGame() {
    clearInterval(state.interval);
    state.interval = null;
}

function clearFullRows() {
    for (var y = 0; y < config.height; y++) {
        var line = tetris.slice(y * config.width, y * config.width + config.width);

        if (line.every(cell => cell)) {
            tetris.splice(y * config.width, config.width);
            tetris = new Array(config.width).fill(null).concat(tetris);
            state.score += 100;
            updateScore();
        }
    }
}

// Mostrar la puntuación dinámica
function updateScore() {
    document.getElementById('score').textContent = 'Puntuación: ' + state.score;
}

function randomTetromino() {
    var tetromino = JSON.parse(JSON.stringify(tetrominos[Math.floor(Math.random() * tetrominos.length)]));
    tetromino.x = Math.floor(config.width / 2 - tetromino.blocks[0].length / 2);
    tetromino.y = 0;
    return tetromino;
}

function moveTetromino(dx, dy) {
    if (state.gameOver) return;

    var x = state.tetromino.x + dx;
    var y = state.tetromino.y + dy;

    if (collides(state.tetromino, x, y)) {
        if (dy > 0) placeTetromino();
        return;
    }

    state.tetromino.x = x;
    state.tetromino.y = y;

    render();
}

function rotateTetromino() {
    if (state.gameOver) return;

    const blocks = state.tetromino.blocks;
    const rows = blocks.length;
    const cols = blocks[0].length;

    const rotated = Array.from({ length: cols }, () => Array(rows).fill(0));
    for (let y = 0; y < rows; y++) {
        for (let x = 0; x < cols; x++) {
            rotated[x][rows - 1 - y] = blocks[y][x];
        }
    }

    if (!collides(state.tetromino, state.tetromino.x, state.tetromino.y, rotated)) {
        state.tetromino.blocks = rotated;
    }
    render();
}

// Guardar o usar la pieza guardada
function holdPiece() {
    if (!canHold) return;

    if (!savedTetromino) {
        savedTetromino = state.tetromino;
        state.tetromino = state.nextTetromino;
        state.nextTetromino = randomTetromino();
    } else {
        [savedTetromino, state.tetromino] = [state.tetromino, savedTetromino];
    }

    state.tetromino.x = Math.floor(config.width / 2 - state.tetromino.blocks[0].length / 2);
    state.tetromino.y = 0;

    updateSavedPiece();
    updateNextPiece();
    render();

    canHold = false;
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
        case ' ':
            holdPiece();
            break;
    }
    event.preventDefault();
}

function collides(tetromino, x, y, blocks = tetromino.blocks) {
    for (let row = 0; row < blocks.length; row++) {
        for (let col = 0; col < blocks[row].length; col++) {
            if (blocks[row][col]) {
                const newX = x + col;
                const newY = y + row;

                // Comprobar límites del tablero
                if (newX < 0 || newX >= config.width || newY >= config.height) {
                    return true;
                }

                // Comprobar colisión con bloques ya colocados
                if (newY >= 0 && tetris[newY * config.width + newX]) {
                    return true;
                }
            }
        }
    }
    return false;
}


// Renderizar el tablero
function render() {
    layer.destroyChildren();

    for (let y = 0; y < config.height; y++) {
        for (let x = 0; x < config.width; x++) {
            const color = tetris[y * config.width + x];
            if (color) {
                const block = new Konva.Rect({
                    x: x * config.blockSize,
                    y: y * config.blockSize,
                    width: config.blockSize,
                    height: config.blockSize,
                    fill: color
                });
                layer.add(block);
            }
        }
    }

    state.tetromino.blocks.forEach((row, j) => {
        row.forEach((block, i) => {
            if (block) {
                const x = (state.tetromino.x + i) * config.blockSize;
                const y = (state.tetromino.y + j) * config.blockSize;
                const blockRect = new Konva.Rect({
                    x: x,
                    y: y,
                    width: config.blockSize,
                    height: config.blockSize,
                    fill: state.tetromino.color
                });
                layer.add(blockRect);
            }
        });
    });

    layer.draw();
}

// Pausar el juego
function pauseGame() {
    if (state.gameOver) return; // No se puede pausar si el juego ha terminado

    if (state.interval) {
        clearInterval(state.interval); // Detiene el intervalo del juego
        state.interval = null;
        document.getElementById('pauseButton').textContent = 'Reanudar';
    } else {
        // Usa una función directa en lugar de una cadena
        state.interval = setInterval(() => {
            moveTetromino(0, 1);
        }, config.speed);
        document.getElementById('pauseButton').textContent = 'Pausar';
    }
}

/* // Reiniciar el juego
function restartGame() {
    stopGame(); // Detiene cualquier ejecución actual
    tetris.fill(null); // Limpia el tablero
    savedTetromino = null; // Reinicia la pieza guardada
    canHold = true; // Habilita la funcionalidad de guardar
    startGame(); // Inicia un nuevo juego
    updateScore(); // Reinicia la puntuación en pantalla

    // Restablecer el texto del botón de pausar
    document.getElementById('pauseButton').textContent = 'Pausar';
}
 */

// Actualizar el leaderboard al terminar una partida
function updateLeaderboard() {
    const leaderboardKey = 'tetrisLeaderboard';

    // Obtener las puntuaciones guardadas o inicializar
    let leaderboard = JSON.parse(localStorage.getItem(leaderboardKey)) || [];

    // Añadir la puntuación actual
    leaderboard.push({ name: prompt("Introduce tu nombre:"), score: state.score });

    // Ordenar las puntuaciones de mayor a menor
    leaderboard.sort((a, b) => b.score - a.score);

    // Mantener solo las 5 mejores puntuaciones
    leaderboard = leaderboard.slice(0, 5);

    // Guardar el leaderboard actualizado
    localStorage.setItem(leaderboardKey, JSON.stringify(leaderboard));

    // Mostrar el leaderboard actualizado
    displayLeaderboard(leaderboard);
}

// Mostrar el leaderboard en pantalla
function displayLeaderboard(leaderboard) {
    const leaderboardContainer = document.getElementById('leaderboard');
    leaderboardContainer.innerHTML = ''; // Limpiar contenido existente

    const title = document.createElement('h3');
    title.textContent = 'Mejores puntuaciones';
    leaderboardContainer.appendChild(title);

    const list = document.createElement('ul');

    leaderboard.forEach(entry => {
        const listItem = document.createElement('li');
        listItem.textContent = `${entry.name}: ${entry.score}`;
        list.appendChild(listItem);
    });

    leaderboardContainer.appendChild(list);
}

function gameOver() {
    if (!state.gameOver) {
        stopGame(); // Detener el juego
        showGameOverMessage(); // Mostrar el mensaje de fin del juego
        updateLeaderboard(); // Actualizar el leaderboard
    }
}


function showGameOverMessage() {
    const messageContainer = document.getElementById('gameOverMessage');
    const messageText = document.getElementById('gameOverText');

    // Actualizar el contenido del mensaje
    messageText.innerHTML = `
        <strong>¡Juego Terminado!</strong><br>
        Tu puntuación: ${state.score}
    `;

    // Mostrar el contenedor
    messageContainer.style.display = 'block';
}


// Opción para ocultar el mensaje al reiniciar el juego
function hideGameOverMessage() {
    const messageContainer = document.getElementById('gameOverMessage');
    messageContainer.style.display = 'none';
}

// Modificar `resetGame` para ocultar el mensaje al reiniciar
function restartGame() {
    stopGame(); // Detener el juego si estaba en progreso
    state = {
        tetromino: null,
        interval: null,
        score: 0,
        gameOver: false
    };
    tetris = new Array(config.width * config.height).fill(null);
    hideGameOverMessage(); // Ocultar mensaje al reiniciar
    startGame();
}



// Inicialización
init();

