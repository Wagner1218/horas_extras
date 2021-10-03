<?php

if ($_SESSION['id'] != '' && $_SESSION['nome'] != '') {
    $usuario = isset($_GET["usuario"]) && $_GET["usuario"] == "cadastrado";
} else {
    header('Location: ../index.php?login=erro');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hora extra</title>
</head>

<body>
    <div class="container" style="background-color:white; margin-top:10px;"><br>
        <form method="POST" action="../php/controlador.php">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="nome">Nome Completo</label>
                    <input type="text" name="nome" class="form-control" id="nome" value="<?php print_r($_SESSION['nome']);?>" placeholder="" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="data1">Data</label>
                    <input type="date" name="data1" class="form-control" id="data1" placeholder="" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inicioExpediente">Inicio do expediente</label>
                    <input type="time" name="inicioExpediente" class="form-control" id="inicioExpediente" placeholder="" min="07:00" max="23:00" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="fimExpediente">Fim do expediente</label>
                    <input type="time" name="fimExpediente" class="form-control" id="fimExpediente" placeholder="" min="07:00" max="23:00" required>
                </div>
            </div>
            <button type="submit" name="acao" value="cadastroHoras" id="cadastroHoras" class="btn btn-danger">Cadastrar</button>
        </form><br>
        <hr>
    </div>
    <div id="resp">

    </div>

    <script src="../js/script.js"></script>
</body>

</html>