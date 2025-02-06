<?php

// Genero los números aleatorios.
$num1 = rand(1, 9);
$num2 = rand(1, 9);
$operator = rand(0, 1) ? '+' : '-';

//Meto el resultado en el captcha
$captcha_result = ($operator === '+') ? ($num1 + $num2) : ($num1 - $num2);
$_SESSION['captcha_text'] = $captcha_result;

// Crear imagen
$image = imagecreatetruecolor(200, 50);
imageantialias($image, true);

// Colores de fondo y texto
$background_color = imagecolorallocate($image, rand(200, 255), rand(200, 255), rand(200, 255));
$text_color = imagecolorallocate($image, 0, 0, 0);
imagefill($image, 0, 0, $background_color);

// Dibujar líneas de ruido
for ($i = 0; $i < 5; $i++) {
    $line_color = imagecolorallocate($image, rand(100, 200), rand(100, 200), rand(100, 200));
    imageline($image, rand(0, 200), rand(0, 50), rand(0, 200), rand(0, 50), $line_color);
}

// Texto de la ecuación
$font = __DIR__ . '/../assets/fonts/postnobillscolombo/PostNoBillsColombo-Medium.ttf';
$equation = "$num1 $operator $num2 = ?";
imagettftext($image, 24, rand(-10, 10), 50, 35, $text_color, $font, $equation);

// Enviar la imagen como PNG
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
