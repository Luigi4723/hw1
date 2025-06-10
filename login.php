<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanifica input
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Controlla se l'utente esiste
    $sql = "SELECT * FROM utenti WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifica la password
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['username'] = $username;
             $_SESSION['id'] = $row['id']; 
             $_SESSION['user_id'] = $row['id']; 
            header("Location: index.php");
            exit();
        } else {
            echo "Password errata.";
        }
    } else {
        echo "Nessun utente trovato con questo username.";
    }
} else {
    echo "Metodo di richiesta non valido.";
}
?>



