<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);


include 'config.php';
header('Content-Type: application/json');

$carrello = [];


if (!isset($_SESSION['username'])) {
    echo json_encode([]);
    exit;
}

$username = $_SESSION['username'];

// Ottieni l'ID dell'utente
$stmt = $conn->prepare("SELECT id FROM utenti WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $user_id = $user['id'];

    // Ottieni i prodotti nel carrello dell'utente
    $query = "SELECT p.id, p.nome, p.immagine, p.prezzo, c.quantita
              FROM carrelli c
              JOIN prodotti p ON c.prodotto_id = p.id
              WHERE c.user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();



    while ($row = $result->fetch_assoc()) {
        $carrello[] = $row;
    }
}

echo json_encode($carrello);
$conn->close();
?>

