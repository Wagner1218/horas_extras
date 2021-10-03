<?php
require('conectaBD.php');
$cadastroUsuario = isset($_POST["acao"]) && $_POST["acao"] == "cadastroUsuario";
$nome = $_POST["nome"];
$senha = $_POST["senha"];

$cadastroHoras = isset($_POST["acao"]) && $_POST["acao"] == "cadastroHoras";
$data1 = $_POST["data1"];
$inicioExpediente = $_POST["inicioExpediente"];
$fimExpediente = $_POST["fimExpediente"];
$inicio = new DateTime($inicioExpediente);
$fim = new DateTime($fimExpediente);
$diferenca = $fim->diff($inicio)->format('%H:%I:%S');

$pesquisaHoras = isset($_POST["acao"]) && $_POST["acao"] == "pesquisaHoras";
$inicioData = $_POST["inicioData"];
$fimData = $_POST["fimData"];


if ($cadastroUsuario) {
    $resp = $pdo->prepare("INSERT INTO usuarios (`nome`, `senha`) VALUE (:nome, :senha)");
    $resp->bindValue(":nome", $nome);
    $resp->bindValue(":senha", $senha);
    $resp->execute();
    header('Location: ../publico/cadastro.php?acao=cadastrado');
}
if ($cadastroHoras) {
    if ($inicioExpediente < $fimExpediente) {
        $resp = $pdo->prepare("INSERT INTO controlehoras (`nome`, `data1`, `inicioExpediente`, `fimExpediente`, `diferenca`) VALUE 
       (:nome, :data1, :inicioExpediente, :fimExpediente, :diferenca)");
        $resp->bindValue(":nome", $nome);
        $resp->bindValue("data1", $data1);
        $resp->bindValue("inicioExpediente", $inicioExpediente);
        $resp->bindValue("fimExpediente", $fimExpediente);
        $resp->bindValue("diferenca", $diferenca);
        $resp->execute();
        header('Location: ../publico/horaExtra.php?acao=horacadastrada');
    } else {
        echo ("Dados invalidos, o inicio do expediente precisa ser menos que o fim do expediente");
    }
}

?>