<?php
session_start();

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

$aprovacaoHoras = isset($_POST["acao"]) && $_POST["acao"] == "aprovacaoHoras";
$inicioData = $_POST["inicioData"];
$fimData = $_POST["fimData"];
$aprovacaoUsuarioHoras = $_POST["aprovacaoUsuarioHoras"];

$botaoAprovar = isset($_POST["acao"]) && $_POST["acao"] == "botaoAprovar";
$botaoRecusar = isset($_POST["acao"]) && $_POST["acao"] == "botaoRecusar";
$botaoExcluir = isset($_POST["acao"]) && $_POST["acao"] == "botaoExcluir";

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
if ($aprovacaoHoras) {

    $resp = $pdo->prepare("SELECT `id`, `nome`, `data1`, `inicioExpediente`, `fimExpediente`, `diferenca`, `status1` 
    FROM controlehoras WHERE nome = :nome AND data1 BETWEEN :inicioData AND :fimData");
    $resp->bindValue(":inicioData", $inicioData);
    $resp->bindValue(":fimData", $fimData);
    $resp->bindValue(":nome", $aprovacaoUsuarioHoras); // Arrumar
    $resp->execute();

    $_SESSION['resultAprovacao'] = $resp->fetchAll(PDO::FETCH_OBJ);

    $_SESSION['resultinicioData'] = $inicioData;
    $_SESSION['resultfimData'] = $fimData;
    $_SESSION['resultnome'] = $aprovacaoUsuarioHoras;

    header('Location: ../publico/aprovacao.php');
}
if ($botaoAprovar) {
    if (isset($_POST["checkbox"])) {
        //Faz um loop no Array de checkbox
        for ($i = 0; $i < count($_POST["checkbox"]); $i++) {
            echo $_POST["checkbox"][$i] . "<br />";

            $resp = $pdo->prepare('UPDATE controlehoras SET status1 = :status1 WHERE id = :id');
            $resp->bindValue(":status1", "Aprovado");
            $resp->bindValue(":id", $_POST["checkbox"][$i]);
            $resp->execute();
        }
    }

    $resp = $pdo->prepare("SELECT `id`, `nome`, `data1`, `inicioExpediente`, `fimExpediente`, `diferenca`, `status1` 
    FROM controlehoras WHERE nome = :nome AND data1 BETWEEN :inicioData AND :fimData");
    $resp->bindValue(":inicioData", $_SESSION['resultinicioData']);
    $resp->bindValue(":fimData", $_SESSION['resultfimData']);
    $resp->bindValue(":nome",  $_SESSION['resultnome']);
    $resp->execute();

    $_SESSION['resultAprovacao'] = $resp->fetchAll(PDO::FETCH_OBJ);

    header('Location: ../publico/aprovacao.php');
}
if ($botaoRecusar) {
    if (isset($_POST["checkbox"])) {
        //Faz um loop no Array de checkbox
        for ($i = 0; $i < count($_POST["checkbox"]); $i++) {
            echo $_POST["checkbox"][$i] . "<br />";

            $resp = $pdo->prepare('UPDATE controlehoras SET status1 = :status1 WHERE id = :id');
            $resp->bindValue(":status1", "Recusado");
            $resp->bindValue(":id", $_POST["checkbox"][$i]);
            $resp->execute();

            $resp = $pdo->prepare("SELECT `id`, `nome`, `data1`, `inicioExpediente`, `fimExpediente`, `diferenca`, `status1` 
    FROM controlehoras WHERE nome = :nome AND data1 BETWEEN :inicioData AND :fimData");
            $resp->bindValue(":inicioData", $_SESSION['resultinicioData']);
            $resp->bindValue(":fimData", $_SESSION['resultfimData']);
            $resp->bindValue(":nome",  $_SESSION['resultnome']);
            $resp->execute();

            $_SESSION['resultAprovacao'] = $resp->fetchAll(PDO::FETCH_OBJ);

            header('Location: ../publico/aprovacao.php');
        }
    }
}
if ($botaoExcluir) {
    if (isset($_POST["checkbox"])) {
        //Faz um loop no Array de checkbox
        for ($i = 0; $i < count($_POST["checkbox"]); $i++) {

            echo $_POST["checkbox"][$i] . "<br />";
            $resp = $pdo->prepare('DELETE FROM controlehoras WHERE id = :id');
            $resp->bindValue(":id", $_POST["checkbox"][$i]);
            $resp->execute();

            $resp = $pdo->prepare("SELECT `id`, `nome`, `data1`, `inicioExpediente`, `fimExpediente`, `diferenca`, `status1` 
    FROM controlehoras WHERE nome = :nome AND data1 BETWEEN :inicioData AND :fimData");
            $resp->bindValue(":inicioData", $_SESSION['resultinicioData']);
            $resp->bindValue(":fimData", $_SESSION['resultfimData']);
            $resp->bindValue(":nome",  $_SESSION['resultnome']);
            $resp->execute();

            $_SESSION['resultAprovacao'] = $resp->fetchAll(PDO::FETCH_OBJ);

            header('Location: ../publico/aprovacao.php');
        }
    }
}
?>