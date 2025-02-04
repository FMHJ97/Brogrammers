<?php

// if (!isset($_COOKIE['PHPSESSID'])) {
session_start();
// }


$codigo = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'), 0, 5);  //código d 5caracteres

// Guardar código en sesión
$_SESSION['captcha'] = $codigo;

// Crear imagen
$imagen = imagecreatetruecolor(150, 50); // Tamaño de la imagen
$fondo = imagecolorallocate($imagen, 255, 255, 255); // Color de fondo blanco
$textoColor = imagecolorallocate($imagen, 0, 0, 0); // Color de texto negro

// Fuente y tamaño
$fuente = __DIR__ . '/assets/fonts/postnobillscolombo/PostNoBillsColombo-Medium.ttf';
$tamano = 20;

// Ángulo de rotación aleatorio
$angulo = rand(-15, 15);

// Posición del texto
$x = 20;
$y = 30;

// Escribir texto en la imagen con rotación
imagettftext($imagen, $tamano, $angulo, $x, $y, $textoColor, $fuente, $codigo);

// Distorsión de la imagen (opcional)
for ($i = 0; $i < 100; $i++) {
  $x = rand(0, 149);
  $y = rand(0, 49);
  imagesetpixel($imagen, $x, $y, imagecolorallocate($imagen, rand(100, 200), rand(100, 200), rand(100, 200)));
}

// Establecer encabezado de tipo de contenido
header('Content-Type: image/png');

// Mostrar imagen
imagepng($imagen);

// Destruir imagen
imagedestroy($imagen);
