<?php
$server = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "dbMuseo";

$conn = new mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    die("Connessione non riuscita");
}

function test($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$username = test($_POST['username']);

$querysrc = "SELECT username FROM Utente WHERE username = ?";
$statement = $conn->prepare($querysrc);
$statement->bind_param("s", $username);
$statement->execute();
$result = $statement->get_result();

if($result->num_rows =< 0){
    $row = $result->fetch_assoc();
    $nome = test($_POST['nome']);
    $cognome = test($_POST['cognome']);
    $recapito = test($_POST['recapito']);
    $password = test($_POST['password']);
    $queryins = "INSERT INTO visitatore(Nome, Cognome, Recapito, username, password) VALUES($nome, $cognome, $recapito, $username, $password)";
    echo "Logged in";
}
else{
    echo "Utente già esistente";
}
?>