<?php
if (!defined('PROJECT_ROOT')) {
    define('PROJECT_ROOT', dirname(__FILE__) . '/../');  // Adjust according to your folder structure
}
require_once PROJECT_ROOT . 'controller/FotoController.php';
require_once PROJECT_ROOT . 'model/Foto.php';  // Adjust path as needed
header('Content-Type: application/json');   

// Fetch all photos from the database
$images = FotoController::getAll();
$jsonData = json_encode($images);

// If json_encode failed, output the error
if ($jsonData === false) {
    // Debugging message
    echo "Error encoding JSON: " . json_last_error_msg();
} else {
    echo $jsonData;
}