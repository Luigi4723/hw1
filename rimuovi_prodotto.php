<?php
session_start();
include 'config.php';
header('Content-Type: application/json');

if (!isset($_SESSION['id'])) {
    echo json_encode(["success" => false, "error" => "Utente non loggato"]);
    exit;
}

if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    echo json_encode(["success" => false, "error" => "ID non valido"]);
    exit;
}

$user_id = $_SESSION['id'];
$prodotto_id = intval($_POST['id']);

// Elimina il prodotto dal carrello
$stmt = $conn->prepare("DELETE FROM carrelli WHERE user_id = ? AND prodotto_id = ?");
$stmt->bind_param("ii", $user_id, $prodotto_id);

if ($stmt->execute()) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => "Errore durante l'eliminazione"]);
}

$conn->close();
