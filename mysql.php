<?php
$servername = "sql10.freemysqlhosting.net";
$username = "sql10681148";
$password = "1sBtDA33sb";
$dbname = "seu_nome_de_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão ao banco de dados falhou: " . $conn->connect_error);
}

$roomId = $_GET['roomId'];
$userId = $_GET['userId'];

$sql = "INSERT INTO rooms_users (room_id, user_id) VALUES ('$roomId', '$userId')";

if ($conn->query($sql) === TRUE) {
    echo "Usuário adicionado à sala $roomId com sucesso!";
} else {
    echo "Erro ao adicionar usuário à sala: " . $conn->error;
}

$conn->close();
?>
