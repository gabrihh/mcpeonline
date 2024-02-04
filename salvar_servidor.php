// salvar_servidor.php
<?php
// Pegar os valores do formulário
$nome = $_POST["nome"];
$ip = $_POST["ip"];
$porta = $_POST["porta"];
$versao = $_POST["versao"];
// Abrir o arquivo de texto com os nicks dos usuários
$arquivo = fopen("nicks.txt", "r");
// Ler a última linha do arquivo
$nick = "";
while (($linha = fgets($arquivo)) !== false) {
    $nick = $linha;
}
// Fechar o arquivo
fclose($arquivo);
// Remover a quebra de linha do nick
$nick = trim($nick);
// Abrir o arquivo de texto para salvar as informações do servidor
$arquivo = fopen("servidores.txt", "a");
// Escrever as informações no arquivo separadas por vírgula
fwrite($arquivo, "$nick,$nome,$ip,$porta,$versao\n");
// Fechar o arquivo
fclose($arquivo);
// Redirecionar para a página de configuração do servidor
header("Location: configurar_servidor.html");
?>
