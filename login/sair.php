<?php
$sair = isset($_POST["acao"]) && $_POST["acao"] == 'sair';
if($sair){
    session_start();
    session_destroy();

    header('Location: ../index.php');
     //"Finaliza a session";
    }
?>