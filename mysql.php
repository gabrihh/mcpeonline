<?php
$servername = "sql10.freemysqlhosting.net";
$username = "sql10681148";
$password = "1sBtDA33sb";
$dbname = "sql10681148";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão ao banco de dados falhou: " . $conn->connect_error);
}

// Criação da tabela de usuários
$userTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

if ($conn->query($userTable) === FALSE) {
    echo "Erro ao criar a tabela de usuários: " . $conn->error;
}

// Verifica o método da requisição
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['loginUsername']) && isset($_POST['loginPassword'])) {
        // Processar dados de login
        $loginUsername = $_POST['loginUsername'];
        $loginPassword = $_POST['loginPassword'];

        // Adicione a lógica de login aqui

        $loginPasswordHash = password_hash($loginPassword, PASSWORD_DEFAULT);

        $loginQuery = "SELECT * FROM users WHERE username='$loginUsername'";
        $result = $conn->query($loginQuery);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($loginPassword, $row['password'])) {
                echo "Login bem-sucedido!";
                showUserList();
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Usuário não encontrado.";
        }

    } elseif (isset($_POST['registerUsername']) && isset($_POST['registerPassword']) && isset($_POST['confirmPassword'])) {
        // Processar dados de registro
        $registerUsername = $_POST['registerUsername'];
        $registerPassword = $_POST['registerPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        // Verifica se o nome de usuário já está registrado
        $checkUsernameQuery = "SELECT * FROM users WHERE username='$registerUsername'";
        $checkResult = $conn->query($checkUsernameQuery);

        if ($checkResult->num_rows > 0) {
            echo "Nome de usuário já registrado. Escolha outro.";
        } else {
            // Se o nome de usuário não está registrado, proceda com o registro
            if ($registerPassword === $confirmPassword) {
                $hashedPassword = password_hash($registerPassword, PASSWORD_DEFAULT);

                $registerQuery = "INSERT INTO users (username, password) VALUES ('$registerUsername', '$hashedPassword')";

                if ($conn->query($registerQuery) === TRUE) {
                    echo "Registro bem-sucedido!";
                    showUserList();
                } else {
                    echo "Erro no registro: " . $conn->error;
                }
            } else {
                echo "As senhas não coincidem.";
            }
        }
    }
}

function showUserList() {
    global $conn;

    $userListQuery = "SELECT * FROM users";
    $result = $conn->query($userListQuery);

    echo "<h2>Lista de Usuários Registrados:</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row['username'] . "</li>";
    }
    echo "</ul>";
}

$conn->close();
?>
