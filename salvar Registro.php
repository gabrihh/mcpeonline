<?php
// Conectar ao banco de dados
$servername = "sql10.freemysqlhosting.net";
$username = "sql10681148";
$password = "1sBtDA33sb";
$dbname = "sql10681148";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Pegar o nick do formulário
$nick = $_POST["nick"];

// Inserir o nick na tabela usuarios
$sql = "INSERT INTO usuarios (nick) VALUES ('$nick')";

if ($conn->query($sql) === TRUE) {
    echo "Nick salvo com sucesso";
} else {
    echo "Erro ao salvar nick: " . $conn->error;
}

// Fechar conexão
$conn->close();
?>
