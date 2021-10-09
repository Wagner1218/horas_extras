<?php


require('../php/consultaUsuarios.php');
error_reporting(0);
$resultAprovacao = $_SESSION['resultAprovacao'];
unset($_SESSION['resultAprovacao']);
?>
<!DOCTYPE html> 
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatorio</title>
</head>

<body>
    <div class="container"><br>
        <table class="table table-hover" style="background-color: white;">
            <tr>
                <th scope="col">
                    <form method="POST" action="../php/controlador.php">
                        <div class='form-inline'>
                            <label class='mr-sm-1' for='inlineFormCustomSelect'>Nome:</label>
                            <select class='form-control mx-sm-1' name="aprovacaoUsuarioHoras" required>
                                <option value=''>Usuários</option>
                                <?php
                                if (count($consultaUsuarios) > 0) {
                                    foreach ($consultaUsuarios as $indice => $dbaselec) {
                                        echo "<option value='$dbaselec->nome'>$dbaselec->nome</option>";
                                    }
                                }
                                ?>
                            </select>

                            <label class="mr-sm-1" value="" for="inlineFormCustomSelect">Inicio:</label>
                            <input type="date" name="inicioData" id="inicioExpediente" class="form-control mx-sm-1" id="inputPassword2" placeholder="Pesquisa">

                            <label class="mr-sm-1" for="inlineFormCustomSelect">Fim:</label>
                            <input type="date" name="fimData" id="fimExpediente" class="form-control mx-sm-1" id="inputPassword2" placeholder="Pesquisa">

                            <button type="submit" name="acao" value="aprovacaoHoras" id="aprovacaoHoras" class="btn btn-danger col-sm-2 mx-sm-2">Pesquisar</button>
                        </div>
                    </form>
                </th>
            </tr>
        </table>
        <div class="table-responsive">
            <form action="../php/controlador.php" method="POST"> 
                <table class="table table-hover" style="background-color: white;">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Data</th>
                            <th scope="col">Inicio</th>
                            <th scope="col">Fim</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">
                                <button type="submit" name="acao" value="botaoAprovar" class="btn btn-success" data-toggle="collapse"><i class="fa fa-check" aria-hidden="true"></i></button>
                            </th>
                            <th scope="col">
                                <button type='submit' name='acao' value='botaoRecusar' class='btn btn-danger' data-toggle="collapse"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </th>
                            <th scope="col">
                                <button type="submit" name="acao" value="botaoExcluir" class="btn btn-danger" data-toggle="collapse"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (count($resultAprovacao) > 0) {
                            foreach ($resultAprovacao as $indice => $dbaselec) {
                                echo "
                                <tr>
                                    <th scope='row'>$dbaselec->nome</th>
                                    <td>$dbaselec->data1</td>
                                    <td>$dbaselec->inicioExpediente</td>
                                    <td>$dbaselec->fimExpediente</td>
                                    <td>$dbaselec->diferenca</td>
                                    <td>$dbaselec->status1</td>
                                    <td><input type='checkbox' name='checkbox[]'  style = 'width: 20px; height: 20px' value='$dbaselec->id' id='defaultCheck1'></td>
                                </tr>";
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</body>

</html>