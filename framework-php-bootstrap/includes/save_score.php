<?php
require_once '../../framework-php-bootstrap/model/usuario.php';
require_once '../../framework-php-bootstrap/controller/conexion.php';
session_start();

try {
    $conex = new Conexion();

    // Check if the session is valid and the logged object is available
    if (!isset($_SESSION['logged']) || !is_object($_SESSION['logged'])) {
        echo "User not logged in or session is invalid.";
        exit;
    }

    // Get the score from the request
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $conex->beginTransaction();

        $userId = $_SESSION["logged"]->id;
        $game = $_POST["game"];
        $score = isset($_POST['score']) ? intval($_POST['score']) : 0;

        // Prepare the SQL query with placeholders
        $stmt = $conex->prepare("INSERT INTO records_usuario (id_usuario, juego, puntos) VALUES (:id_usuario, :game, :score)");

        // Bind the parameters to the query
        $stmt->bindParam(':id_usuario', $userId);
        $stmt->bindParam(':game', $game);
        $stmt->bindParam(':score', $score, PDO::PARAM_INT);

        // Execute the query
        $stmt->execute();

        if ($stmt->rowCount()) {
            $conex->commit();
            echo "Score saved successfully!";
        } else {
            $conex->rollBack();
            echo "Failed to save score.";
        }
    } else {
        echo "Invalid request.";
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
