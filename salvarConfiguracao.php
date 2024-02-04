<html>
<head>
    <title>Perguntas sobre o Servidor</title>
</head>
<body>
    <h1>Perguntas sobre o Servidor</h1>
    <form action="listaServidores.php" method="post">
        <p>Nome do servidor:</p>
        <input type="text" name="nome" required>
        <p>IP:</p>
        <input type="text" name="ip" required>
        <p>Porta:</p>
        <input type="number" name="porta" required>
        <p>Versão:</p>
        <input type="text" name="versao" required>
        <input type="submit" value="OK">
    </form>
</body>
</html>
