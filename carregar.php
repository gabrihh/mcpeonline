<?php
// verificar se o parâmetro nick foi enviado
if (isset($_POST["nick"])) {
    // pegar o valor do parâmetro
    $nick = $_POST["nick"];
    // ler o arquivo usuarios.json
    $arquivo = file_get_contents("usuarios.json");
    // converter o arquivo em um array associativo
    $usuarios = json_decode($arquivo, true);
    // adicionar o novo nick ao array
    $usuarios[] = array("nick" => $nick);
    // converter o array em uma string JSON
    $novo_arquivo = json_encode($usuarios);
    // sobrescrever o arquivo usuarios.json com o novo conteúdo
    file_put_contents("usuarios.json", $novo_arquivo);
}
?>
