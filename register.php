<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanifica input
    $email = $conn->real_escape_string($_POST['email']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Cripta la password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query
    $sql = "INSERT INTO utenti (email, username, password) VALUES ('$email', '$username', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registrazione avvenuta con successo!";
        header("Location: login.html");
        exit();
        
    } else {
        echo "Errore durante la registrazione: " . $conn->error;
    }

    // Chiudi connessione
    $conn->close();
}
?>
