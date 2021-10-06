<?php
require('conectaBD.php');

$status1 = "Aguardando...";

$resp = $pdo->prepare("SELECT `id`, `nome`, `inicioExpediente`, `fimExpediente`, `diferenca`, `status1` FROM controlehoras WHERE status1 = :status1");
$resp->bindValue(':status1', $status1);
$resp->execute();
$_SESSION['aprovacaoHoras'] = $resp->fetchAll(PDO::FETCH_OBJ);

?>