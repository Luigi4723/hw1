
//eliminabile


<?php
session_start();
include 'config.php';

// Controllo che l'id sia passato e valido
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Prodotto non valido");
}

$id = intval($_GET['id']);

// Prendo i dati del prodotto dal DB
$sql = "SELECT * FROM prodotti WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Prodotto non valido");
}

$prodotto = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($prodotto['nome']) ?></title>
  <link rel="stylesheet" href="prodotto.css">
</head>
<body>

<div id="overlay"></div>

<div id="popupProdotto">
  <span class="close-btn" onclick="window.history.back()">×</span>

  <img src="<?= htmlspecialchars($prodotto['immagine']) ?>" alt="<?= htmlspecialchars($prodotto['nome']) ?>">

  <h2><?= htmlspecialchars($prodotto['nome']) ?></h2>
  <p><?= nl2br(htmlspecialchars($prodotto['descrizione'])) ?></p>

  <form action="aggiungi_al_carrello.php" method="POST">
    <input type="hidden" name="prodotto_id" value="<?= $prodotto['id'] ?>">
    <label for="quantita">Quantità:</label>
    <input type="number" name="quantita" id="quantita" value="1" min="1" max="100" required>

    <button type="submit">Aggiungi al carrello</button>
  </form>
</div>

</body>
</html>
