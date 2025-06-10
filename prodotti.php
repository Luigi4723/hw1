<!-- file eliminabile: prodotti.php -->

<?php
header('Content-Type: application/json');
require 'config.php';  // include la connessione al DB, es. $conn = new mysqli(...);

// Controlla che il parametro categoria sia presente
if (!isset($_GET['categoria']) || empty($_GET['categoria'])) {
    echo json_encode([]);
    exit;
}

$categoria = $_GET['categoria'];

// Prepara la query per sicurezza (prepared statement)
$stmt = $conn->prepare("SELECT id, nome, descrizione, prezzo, immagine FROM prodotti WHERE categoria = ?");
if (!$stmt) {
    echo json_encode([]);
    exit;
}

$stmt->bind_param("s", $categoria);
$stmt->execute();

$result = $stmt->get_result();

$prodotti = [];
while ($row = $result->fetch_assoc()) {
    $prodotti[] = $row;
}

// Restituisci i prodotti in formato JSON
echo json_encode($prodotti);

$stmt->close();
$conn->close();
?>

