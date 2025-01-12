document.addEventListener('DOMContentLoaded', function() {
    showStartButton();  // Muestra el botón de inicio cuando la página se cargue
});

// Variables globales
var stage;
var layer;
var tetris;

let layerLimit; // Capa para la línea del límite
let layerGame;  // Capa para las piezas del juego


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



// Inicializar el juego
function init() {
    // Ocultar el botón de inicio cuando el juego empieza
    document.getElementById('startButtonContainer').style.display = 'none';

    // Mostrar el área de juego
    stage = new Konva.Stage({
        container: 'gameContainerTetris',
        width: config.width * config.blockSize,
        height: config.height * config.blockSize
    });

    // Crear dos capas: una para las piezas y otra para la línea del límite
    layerGame = new Konva.Layer();
    stage.add(layerGame);

    layerLimit = new Konva.Layer();
    stage.add(layerLimit);

    tetris = new Array(config.width * config.height).fill(null);

    // Dibujar la línea de límite superior a 2 bloques de distancia del borde superior
    drawTopLimitLine();

    // Vincular la función onKeyDown al evento keydown
    document.addEventListener('keydown', onKeyDown);

    startGame(); // Comienza el juego
}


// Mostrar el botón de inicio si no se ha comenzado el juego
function showStartButton() {
    document.getElementById('startButtonContainer').style.display = 'block';
}

// Iniciar el juego
document.getElementById('startButton').addEventListener('click', init);

// Función que inicia el juego
function startGame() {
    state.score = 0;
    state.gameOver = false;

    savedTetromino = null; // Reiniciar la pieza guardada al comenzar una nueva partida

    state.nextTetromino = randomTetromino();
    state.tetromino = randomTetromino();

    // Mostrar la siguiente y la guardada pieza
    updateNextPiece();
    updateSavedPiece();

    state.interval = setInterval(function () {
        moveTetromino(0, 1);
    }, config.speed);

    // Ocultar el mensaje de fin del juego al iniciar
    hideGameOverMessage();
    hideStartButton(); // Ocultar el botón de inicio
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

    // Colocar la pieza actual en el tablero
    for (var j = 0; j < blocks.length; j++) {
        for (var i = 0; i < blocks[j].length; i++) {
            if (blocks[j][i]) {
                var x = state.tetromino.x + i;
                var y = state.tetromino.y + j;
                tetris[y * config.width + x] = state.tetromino.color;
            }
        }
    }

    // Comprobar si hay líneas completas
    var lines = 0;
    for (var y = 0; y < config.height; y++) {
        var line = tetris.slice(y * config.width, y * config.width + config.width);

        if (line.every(cell => cell)) {
            tetris.splice(y * config.width, config.width);
            tetris = new Array(config.width).fill(null).concat(tetris);
            lines++;
        }
    }

    state.score += 100 * lines; // Añadir puntos por cada línea completada  (100 puntos por línea)
    if (lines > 0) {
        render();
        updateScore();  // Actualizar la puntuación
    }

    // Actualizar las piezas
    state.tetromino = state.nextTetromino;
    state.nextTetromino = randomTetromino();  // Nueva pieza siguiente

    updateNextPiece();

    // Comprobar si el juego terminó
    if (collides(state.tetromino, state.tetromino.x, state.tetromino.y)) {
        gameOver();  // Terminar el juego si colisiona
    }

    canHold = true; // Habilitar la opción de guardar una nueva pieza
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
    if (state.gameOver) return; // No se puede guardar si el juego terminó

    if (!canHold) return; // Si no se puede guardar, salir

    // Si no hay pieza guardada, guardar la pieza actual y obtener la siguiente
    if (!savedTetromino) {
        savedTetromino = state.tetromino;
        state.tetromino = state.nextTetromino;
        state.nextTetromino = randomTetromino(); // Obtener una nueva pieza
    } else {
        // Si ya hay una pieza guardada, intercambiarla con la pieza actual
        [savedTetromino, state.tetromino] = [state.tetromino, savedTetromino];
    }

    // Colocar la nueva pieza en la parte superior del tablero
    state.tetromino.x = Math.floor(config.width / 2 - state.tetromino.blocks[0].length / 2);
    state.tetromino.y = 0;

    // Actualizar las piezas mostradas
    updateSavedPiece();
    updateNextPiece();
    render();

    canHold = false; // Deshabilitar la opción de guardar hasta que la pieza actual sea colocada
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
    // Limpiar la capa de las piezas del juego, pero no la capa del límite
    layerGame.destroyChildren();

    // Dibujar las piezas del tablero
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
                layerGame.add(block);
            }
        }
    }

    // Dibujar la pieza activa del tetromino
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
                layerGame.add(blockRect);
            }
        });
    });

    layerGame.draw(); // Redibujar la capa del juego
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
        showStartButton();  // Mostrar el botón para iniciar nuevamente


    }
}

function drawTopLimitLine() {
    const topLimitLine = new Konva.Line({
        points: [0, 2 * config.blockSize, config.width * config.blockSize, 2 * config.blockSize], // Dibujar la línea 2 bloques por debajo del borde superior
        stroke: 'red', // Color de la línea
        strokeWidth: 5, // Grosor de la línea
        lineCap: 'round',
        lineJoin: 'round'
    });

    // Agregar la línea a la capa de límite
    layerLimit.add(topLimitLine);
    layerLimit.draw(); // Redibujar la capa para mostrar la línea
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

// Reiniciar el juego
function restartGame() {
    stopGame(); // Detener el juego si estaba en progreso

    // Reiniciar el estado del juego
    state = {
        tetromino: randomTetromino(),  // Inicializa la pieza actual
        nextTetromino: randomTetromino(),  // Inicializa la siguiente pieza
        interval: null,
        score: 0,
        gameOver: false
    };

    tetris = new Array(config.width * config.height).fill(null);  // Limpiar el tablero

    hideGameOverMessage();  // Ocultar el mensaje de fin de juego
    updateScore();  // Reiniciar la puntuación en pantalla

    // Mostrar las piezas
    updateNextPiece();
    updateSavedPiece();  // Si hay una pieza guardada, actualizarla

    startGame();  // Comenzar el juego

    hideStartButton();  // Ocultar el botón de inicio
}

// Ocultar el botón de inicio
function hideStartButton() {
    document.getElementById('startButtonContainer').style.display = 'none';
}


// Inicialización
// init();

