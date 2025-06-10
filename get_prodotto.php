<?php
session_start();
include 'config.php';

$is_logged = isset($_SESSION['username']);
$username = $is_logged ? $_SESSION['username'] : null;
header('Content-Type: application/json');
// Validazione ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo json_encode(["success" => false, "error" => "ID non valido"]);
    exit;
}

$id = intval($_GET['id']);

// Query per trovare il prodotto
$stmt = $conn->prepare("SELECT id, nome, descrizione, prezzo, immagine, categoria FROM prodotti WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Se il prodotto esiste
if ($result->num_rows > 0) {
    $prodotto = $result->fetch_assoc();
    echo json_encode(["success" => true, "prodotto" => $prodotto]);
} else {
    echo json_encode(["success" => false, "error" => "Prodotto non trovato"]);
}

$conn->close();

