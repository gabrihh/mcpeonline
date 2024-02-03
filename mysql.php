<?php
$servername = "sql10.freemysqlhosting.net";
$username = "sql10681148";
$password = "1sBtDA33sb";
$dbname = "sql10681148";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obtém o Nick do Minecraft do formulário
$minecraftNick = $_POST['minecraftNick']; // Certifique-se de validar/sanitizar os dados em um ambiente real

// Prepara e executa a consulta SQL para inserir o Nick na tabela
$sql = "INSERT INTO sua_tabela (nick_minecraft) VALUES ('$minecraftNick')";

if ($conn->query($sql) === TRUE) {
    echo "Nick do Minecraft salvo com sucesso!";
} else {
    echo "Erro ao salvar o Nick: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
