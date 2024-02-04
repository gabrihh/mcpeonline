// salvar_nick.php
<?php
// Pegar o valor do nick do formulário
$nick = $_POST["nick"];
// Abrir o arquivo de texto para salvar o nick
$arquivo = fopen("nicks.txt", "a");
// Escrever o nick no arquivo com uma quebra de linha
fwrite($arquivo, $nick . "\n");
// Fechar o arquivo
fclose($arquivo);
// Redirecionar para a página de configuração do servidor
header("Location: configurar_servidor.html");
?>
