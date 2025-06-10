<?php
session_start();
include 'config.php';
header('Content-Type: application/json');

// Controllo login
if (!isset($_SESSION['id'])) {
    echo json_encode(["success" => false, "error" => "Utente non loggato"]);
    exit;
}

// Controllo ID prodotto
if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    echo json_encode(["success" => false, "error" => "ID non valido"]);
    exit;
}

// Controllo quantità
$quantita = isset($_POST['quantita']) && is_numeric($_POST['quantita']) && $_POST['quantita'] > 0
    ? intval($_POST['quantita'])
    : 1;

$user_id = $_SESSION['id'];
$prodotto_id = intval($_POST['id']);

// Controlla se il prodotto è già nel carrello
$stmt = $conn->prepare("SELECT quantita FROM carrelli WHERE user_id = ? AND prodotto_id = ?");
$stmt->bind_param("ii", $user_id, $prodotto_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Se esiste già, aumenta la quantità
    $stmt = $conn->prepare("UPDATE carrelli SET quantita = quantita + ? WHERE user_id = ? AND prodotto_id = ?");
    $stmt->bind_param("iii", $quantita, $user_id, $prodotto_id);
    $stmt->execute();
} else {
    // Altrimenti inserisci il prodotto con la quantità selezionata
    $stmt = $conn->prepare("INSERT INTO carrelli (user_id, prodotto_id, quantita) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $user_id, $prodotto_id, $quantita);
    $stmt->execute();
}

echo json_encode(["success" => true, "message" => "Prodotto aggiunto al carrello"]);
$conn->close();
