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
  <title>Menu</title>
</head>

<body>
  <nav class="navbar navbar-light bg-light justify-content-between">
    <div class="container">
      <h1>
        <a class="logo navbar-brand" href="">WM</a>
      </h1>
      <h5><a class="menu" href="cadastro.php">Cadastro</a></h5>
      <h5><a class="menu" href="horaExtra.php">Hora extra</a></h5>
      <h5><a class="menu" href="aprovacao.php">Aprovação</a></h5>
      <h5><a class="menu" href="relatorio.php">Relatorio</a></h5>
      <div class="form-inline">
        <form method="POST" action="../login/sair.php">
          <button class="btn btn-danger" name="acao" value="sair" type="submit">Sair</button>
        </form>
      </div>
    </div>
  </nav>



</body>

</html>