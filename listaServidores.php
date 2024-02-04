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

// Pegar as respostas do formulário
$nome = $_POST["nome"];
$ip = $_POST["ip"];
$porta = $_POST["porta"];
$versao = $_POST["versao"];

// Inserir as respostas na tabela servidores
$sql = "INSERT INTO servidores (nome, ip, porta, versao) VALUES ('$nome', '$ip', '$porta', '$versao')";

if ($conn->query($sql) === TRUE) {
    echo "Servidor configurado com sucesso";
} else {
    echo "Erro ao configurar servidor: " . $conn->error;
}

// Mostrar uma lista com as informações de cada usuário
$sql = "SELECT u.nick, s.nome, s.ip, s.porta, s.versao FROM usuarios u JOIN servidores s ON u.id = s.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>Usuário: " . $row["nick"] . " | Servidor: " . $row["nome"] . " | IP: " . $row["ip"] . " | Porta: " . $row["porta"] . " | Versão: " . $row["versao"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "Nenhum usuário registrado";
}

// Fechar conexão
$conn->close();
?>
