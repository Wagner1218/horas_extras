<?php 

require('conectaBD.php');

$resp = $pdo->prepare("SELECT `nome` FROM usuarios");
$resp->execute();
return $consultaUsuarios = $resp->fetchAll(PDO::FETCH_OBJ);

?>