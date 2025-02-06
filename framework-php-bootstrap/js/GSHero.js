// Crear el escenario y la capa de Konva
const stage = new Konva.Stage({
  container: "container", // Contenedor donde se crea el canvas
  width: 1000, // Ancho del escenario
  height: 800, // Alto del escenario
});

const layer = new Konva.Layer(); // Crear una capa para dibujar
stage.add(layer); // Añadir la capa al escenario


// Marcador de puntuación
let score = 0;
let streak = 0; // Racha
let maxStreak = 0; // Racha máxima
let multiplier = 1; // Multiplicador (X1, X2, X3)

// Actualizar marcador
function updateMarker() {
  const marker = document.getElementById("marker");
  marker.textContent = `${score}`;

  // Mostrar el multiplicador
  const multiplierElement = document.getElementById("multiplier");
  multiplierElement.textContent = `Multiplier: X${multiplier}`;

  // Actualizar la racha
  const streakElement = document.getElementById("streak");
  streakElement.textContent = `Streak: ${streak}`;

  // Actualizar la racha máxima
  const maxStreakElement = document.getElementById("max-streak");
  maxStreakElement.textContent = `Max Streak: ${maxStreak}`;
}

// Cargar la canción con Howler.js
const music = new Howl({
  src: ["./assets/audio/GSFest.mp3"], // Ruta de tu archivo MP3
  onplay: () => {
    addComment("Song started!");
  },
  onend: () => {
    addComment("The song ended.");
    fetch('../includes/save_score.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: `score=${encodeURIComponent(score)}&game=4`
    })
      .then(response => response.text())
      .catch(error => console.error('Error:', error));
  },
});

// Reproducir la música al iniciar
function play() {
  music.play();
}

function stop() {
  music.stop();
  updateStreaks();

  resetGame(); // Reiniciar el juego al detener
}

// Configuración de la pista
const trackWidth = 120; // Ancho de cada carril
const colors = ["red", "green", "blue", "yellow", "purple"]; // Colores de los carriles

// Calculando el ancho total de los carriles y centrando en el escenario
const totalTracksWidth = trackWidth * colors.length; // Ancho total de todos los carriles
const startX = (stage.width() - totalTracksWidth) / 2 + 150; // +50 para ponerlo más a la derecha.

// Crear los carriles como rectángulos
const lanes = colors.map((color, index) => {
  return new Konva.Rect({
    x: startX + index * trackWidth, // Posición inicial del carril en X (centrado)
    y: 0, // Posición inicial en Y
    width: trackWidth, // Ancho del carril
    height: stage.height(), // Altura del carril
    fill: color, // Color del carril
    opacity: 0.2, // Opacidad del carril
  });
});
lanes.forEach((lane) => layer.add(lane)); // Añadir los carriles a la capa

// Crear las zonas de impacto y añadir las teclas (A, S, D, F, G) sobre cada una
const hitZones = colors.map((color, index) => {
  // Crear la zona de impacto
  const hitZone = new Konva.Rect({
    x: startX + index * trackWidth,
    y: stage.height() - 90, // Altura de la zona de impacto
    width: trackWidth,
    height: 100, // Altura del tamaño de la zona de impacto
    fill: color,
    opacity: 0.5,
  });

  // Añadir el texto con la tecla correspondiente
  const keyText = new Konva.Text({
    x: startX + index * trackWidth + trackWidth / 2 - 12, // Ajustado para centrar el texto
    y: stage.height() - 80, // Posición para centrar el texto sobre la zona
    text: ['A', 'S', 'D', 'F', 'G'][index], // Obtener la tecla correspondiente
    fontSize: 24,
    fontFamily: 'Arial',
    fill: 'white',
    align: 'center',
    verticalAlign: 'middle',
  });

  // Añadir la zona de impacto y el texto a la capa
  layer.add(hitZone);
  layer.add(keyText);

  return hitZone;
});


hitZones.forEach((zone) => layer.add(zone));




// Sistema de notas
let notes = [];
function createNote(laneIndex) {
  const note = new Konva.Circle({
    x: startX + laneIndex * trackWidth + trackWidth / 2,
    y: 0,
    radius: 30, // Tamaño de las notas
    fill: colors[laneIndex],
  });
  notes.push(note);
  layer.add(note);
}

// Movimiento de las notas
function updateNotes() {
  notes.forEach((note, index) => {
    note.y(note.y() + 5); // Velocidad de caída
    if (note.y() > stage.height()) {
      note.destroy();
      notes.splice(index, 1);
      addComment("You missed a note!");
      // Al fallar pongo racha a 0 y multiplicador a 1.
      streak = 0;
      multiplier = 1;
      // Actualizo el marcador
      updateMarker();
    }
  });
}

// Detección de teclas
document.addEventListener("keydown", (event) => {
  const keys = ["a", "s", "d", "f", "g"]; // Teclas asignadas a los carriles
  const laneIndex = keys.indexOf(event.key.toLowerCase());
  if (laneIndex !== -1) {
    notes.forEach((note, index) => {
      const hitZone = hitZones[laneIndex];
      if (
        note.x() >= hitZone.x() &&
        note.x() <= hitZone.x() + trackWidth &&
        Math.abs(note.y() - (stage.height() - 50)) < 40 // Si pongo <70 aumento la tolerancia al fallo en 30 pixeles.
      ) {
        addComment("You hit a note!");
        // Al acertar las notas voy sumando a la racha
        streak++;

        // Cambio el sistema de puntos con multiplicador
        if (streak >= 10) {
          multiplier = 3;
        } else if (streak >= 5) {
          multiplier = 2;
        } else {
          multiplier = 1;
        }

        score += 10 * multiplier; // Sumar puntos al acertar
        updateMarker();

        // Actualizar la racha máxima
        if (streak > maxStreak) {
          maxStreak = streak;
        }

        note.destroy();
        notes.splice(index, 1);
      }
    });
  }
});

// Controlador de notas basado en la música
let lastNote = 0;

// restar 2629 milisegundos para ajustar
const notesData = [
  //Intro

  { tiempo: 920, lane: 0 },
  { tiempo: 1101, lane: 1 },
  { tiempo: 1550, lane: 0 },
  { tiempo: 1790, lane: 1 },

  { tiempo: 2411, lane: 3 },
  { tiempo: 2851, lane: 3 },
  { tiempo: 3091, lane: 1 },
  { tiempo: 3310, lane: 0 },
  { tiempo: 3531, lane: 1 },
  { tiempo: 3960, lane: 3 },

  { tiempo: 4429, lane: 0 },
  { tiempo: 4630, lane: 1 },
  { tiempo: 5091, lane: 0 },
  { tiempo: 5310, lane: 1 },

  { tiempo: 5931, lane: 3 },
  { tiempo: 6390, lane: 3 },
  { tiempo: 6630, lane: 1 },
  { tiempo: 6899, lane: 0 },
  { tiempo: 7080, lane: 1 },

  // main riff
  //{ tiempo: 7510, lane: 2 },

  { tiempo: 7979, lane: 1 }, //bajo

  { tiempo: 8360, lane: 3 },
  { tiempo: 8779, lane: 2 },
  { tiempo: 9019, lane: 1 },

  { tiempo: 9459, lane: 1 },
  { tiempo: 9899, lane: 1 },
  { tiempo: 10220, lane: 2 },
  { tiempo: 10431, lane: 0 },
  { tiempo: 10620, lane: 2 },

  { tiempo: 11591, lane: 1 }, //bajo

  { tiempo: 11972, lane: 3 },
  { tiempo: 12391, lane: 2 },
  { tiempo: 12631, lane: 1 },

  { tiempo: 13071, lane: 1 },
  { tiempo: 13511, lane: 1 },
  { tiempo: 13832, lane: 2 },
  { tiempo: 14043, lane: 0 },
  { tiempo: 14252, lane: 2 },

  { tiempo: 14952, lane: 0 }, //bajo

  { tiempo: 15390, lane: 3 },
  { tiempo: 15840, lane: 2 },
  { tiempo: 16059, lane: 1 },

  { tiempo: 16510, lane: 1 },
  { tiempo: 16971, lane: 1 },
  { tiempo: 17179, lane: 2 },
  { tiempo: 17390, lane: 0 },
  { tiempo: 17611, lane: 2 },
  { tiempo: 18051, lane: 1 },
  { tiempo: 18270, lane: 0 },

  { tiempo: 18950, lane: 1 },
  { tiempo: 19350, lane: 3 },
  { tiempo: 19550, lane: 2 },

  { tiempo: 20040, lane: 4 },

  { tiempo: 20720, lane: 4 },
  { tiempo: 21120, lane: 3 },

  // base Lyric
  { tiempo: 22110, lane: 1 }, //x4
  { tiempo: 22979, lane: 1 },
  { tiempo: 23851, lane: 1 },
  { tiempo: 24760, lane: 1 },

  { tiempo: 25579, lane: 2 }, //x3
  { tiempo: 26480, lane: 2 },
  { tiempo: 27360, lane: 2 },

  { tiempo: 28100, lane: 2 }, //riff
  { tiempo: 28215, lane: 3 },
  { tiempo: 28335, lane: 2 }, //--golpe ritmo
  { tiempo: 28555, lane: 1 },
  { tiempo: 28775, lane: 0 },

  { tiempo: 29210, lane: 1 }, //x4
  { tiempo: 30085, lane: 1 },
  { tiempo: 30960, lane: 1 },
  { tiempo: 31835, lane: 1 },

  { tiempo: 32630, lane: 2 }, //x4
  { tiempo: 33520, lane: 2 },
  { tiempo: 34381, lane: 2 },
  { tiempo: 35281, lane: 2 },

  // main riff

  { tiempo: 36181, lane: 1 }, //bajo

  { tiempo: 36562, lane: 3 },
  { tiempo: 36981, lane: 2 },
  { tiempo: 37221, lane: 1 },

  { tiempo: 37661, lane: 1 },
  { tiempo: 38101, lane: 1 },
  { tiempo: 38422, lane: 2 },
  { tiempo: 38633, lane: 0 },
  { tiempo: 38822, lane: 2 },

  // base Lyric
  { tiempo: 39810, lane: 1 }, //x4
  { tiempo: 40239, lane: 1 },
  { tiempo: 40711, lane: 1 },
  { tiempo: 41140, lane: 1 },
  { tiempo: 41540, lane: 1 },
  { tiempo: 41959, lane: 1 },
  { tiempo: 42410, lane: 1 },
  { tiempo: 42850, lane: 1 },

  { tiempo: 43300, lane: 2 }, //x3
  { tiempo: 43751, lane: 2 },
  { tiempo: 44180, lane: 2 },
  { tiempo: 44660, lane: 2 },
  { tiempo: 45079, lane: 2 },
  { tiempo: 45519, lane: 2 },

  { tiempo: 45659, lane: 2 }, //riff
  { tiempo: 45774, lane: 3 },
  { tiempo: 45994, lane: 2 }, //-- golpe ritmo
  { tiempo: 46114, lane: 1 },
  { tiempo: 46334, lane: 0 },

  { tiempo: 46874, lane: 1 }, //x4
  { tiempo: 47320, lane: 1 },
  { tiempo: 47770, lane: 1 },
  { tiempo: 48210, lane: 1 },
  { tiempo: 48660, lane: 2 },
  { tiempo: 49100, lane: 2 },
  { tiempo: 49540, lane: 2 },
  { tiempo: 49990, lane: 2 },

  { tiempo: 50391, lane: 3 }, //x4
  { tiempo: 50780, lane: 3 },
  { tiempo: 51231, lane: 3 },
  { tiempo: 51671, lane: 3 },

  //  { tiempo: 51919, lane: 3 },
  { tiempo: 52151, lane: 0 },

  { tiempo: 53331, lane: 0 },

  { tiempo: 53811, lane: 2 }, //x4
  { tiempo: 55720, lane: 3 },
  { tiempo: 57299, lane: 1 },
  { tiempo: 59070, lane: 4 },

  { tiempo: 60830, lane: 2 }, //x2 pero con los dos últimos
  { tiempo: 62571, lane: 3 },
  { tiempo: 64352, lane: 4 }, //x2
  { tiempo: 64572, lane: 4 },
  { tiempo: 64792, lane: 4 },
  { tiempo: 65012, lane: 4 },
  { tiempo: 65232, lane: 4 },
  { tiempo: 65452, lane: 4 },
  { tiempo: 65672, lane: 4 },
  { tiempo: 65892, lane: 4 },
  { tiempo: 66113, lane: 4 }, //golpe final.

  { tiempo: 66940, lane: 1 }, //riff cambio.
  { tiempo: 67279, lane: 2 },
  { tiempo: 67580, lane: 3 },
  { tiempo: 67799, lane: 4 },

  { tiempo: 68010, lane: 4 }, //x4
  { tiempo: 69763, lane: 1 },
  { tiempo: 71516, lane: 0 },
  { tiempo: 73269, lane: 3 },

  { tiempo: 75022, lane: 4 }, //x4
  { tiempo: 76775, lane: 3 },
  { tiempo: 78528, lane: 2 },
  { tiempo: 80281, lane: 2 },

  { tiempo: 80966, lane: 1 },
  { tiempo: 81233, lane: 2 },
  { tiempo: 81500, lane: 3 },
  { tiempo: 81767, lane: 4 },

  { tiempo: 82034, lane: 3 }, //x4
  { tiempo: 83787, lane: 4 },
  { tiempo: 85540, lane: 0 },
  { tiempo: 87293, lane: 3 },

  { tiempo: 89046, lane: 4 }, //x4
  { tiempo: 90799, lane: 2 },

  { tiempo: 92552, lane: 1 }, // bajo

  { tiempo: 92933, lane: 4 },
  { tiempo: 93352, lane: 3 },
  { tiempo: 93692, lane: 4 },

  { tiempo: 94132, lane: 4 },

  { tiempo: 94572, lane: 4 },
  { tiempo: 94880, lane: 1 },

  { tiempo: 95320, lane: 2 },
  { tiempo: 95695, lane: 0 },
  { tiempo: 96000, lane: 3 },
];

function generateNotes() {
  const currentTime = music.seek() * 1000;
  for (let i = lastNote; i < notesData.length; i++) {
    if (currentTime >= notesData[i].tiempo) {
      createNote(notesData[i].lane);
      lastNote = i + 1;
    }
  }
}

// Zona de comentarios
function addComment(text) {
  const comments = document.getElementById("comments");
  comments.textContent = text;
}

// Reiniciar juego
function resetGame() {
  notes.forEach((note) => note.destroy());
  notes = [];
  lastNote = 0;
  score = 0;
  streak = 0;
  multiplier = 1;
  maxStreak = 0;
  updateMarker();
  layer.draw();
}

// Bucle principal
function gameLoop() {
  updateNotes();
  generateNotes();
  layer.draw();
  requestAnimationFrame(gameLoop);
}

// Iniciar el bucle
gameLoop();
