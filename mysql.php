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

// Obtém o Nick do usuário a partir do MySQL
function getNickFromMySQL() {
    global $conn;

    $sql = "SELECT nick FROM usuarios WHERE id = 1"; // Substitua '1' pelo identificador correto do usuário

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["nick"];
    } else {
        return "Nick Não Encontrado";
    }
}

// Fecha a conexão
$conn->close();
?>
