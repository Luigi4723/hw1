
<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "lbmyprotein";


// Crea connessione
$conn = new mysqli($host, $username, $password, $dbname);

// Controlla la connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>
