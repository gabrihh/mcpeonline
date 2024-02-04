<?php
// Dados do banco de dados
$servername = "sql10.freemysqlhosting.net";
$username = "sql10681148";
$password = "1sBtDA33sb";
$dbname = "sql10681148";

// Conecta ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obtém os dados do formulário
$user = $_POST["user"];
$pass = $_POST["pass"];

// Prepara a consulta sql
$sql = "SELECT * FROM users WHERE user = ? AND pass = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $pass);
$stmt->execute();

// Obtém o resultado da consulta
$result = $stmt->get_result();

// Verifica se o usuário existe e a senha está correta
if ($result->num_rows > 0) {
    // Inicia a sessão do usuário
    session_start();
    $_SESSION["user"] = $user;
    // Redireciona para a página inicial
    header("Location: index.php");
} else {
    // Mostra uma mensagem de erro
    echo "Usuário ou senha inválidos.";
}

// Fecha a conexão
$conn->close();
?>
