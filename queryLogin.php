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
$password = test($_POST['password']);

$query = "SELECT username FROM Utente WHERE username = ? AND password = ?";
$statement = $conn->prepare($query);
$statement->bind_param("ss", $username, $password);
$statement->execute();
$result = $statement->get_result();

if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    echo "Logged in";
}
?>