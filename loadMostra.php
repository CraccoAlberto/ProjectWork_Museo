<?php
// Connessione al database
$servername = "nome_server";
$username = "nome_utente";
$password = "password";
$dbname = "dbMuseo";

// Creazione della connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// nome della mostra da recuperare passato tramite GET
$nome_mostra = $_SESSION['mostra'];

// Query per recuperare le informazioni della mostra
$queryMostra = "SELECT * FROM Mostra WHERE Nome = $nome_mostra";
$result = $conn->query($queryMostra);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $titolo_mostra = $row["Nome"];
    $descrizione_mostra = $row["Tema"];
} else {
    echo "Nessun risultato trovato";
}

echo "<h3>" . $titolo_mostra . "</h3>";
echo "<p>" . $descrizione_mostra . "</p>";

$conn->close();

?>