<?php


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
                        <div class="form-inline">
                            <label class="mr-sm-1" for="inlineFormCustomSelect">Nome:</label>
                            <input type="text" name="nome" id="nome" class="form-control mx-sm-1" id="inputPassword2" placeholder="Pesquisa">

                            <label class="mr-sm-1" for="inlineFormCustomSelect">Inicio:</label>
                            <input type="date" name="inicioData" id="inicioExpediente" class="form-control mx-sm-1" id="inputPassword2" placeholder="Pesquisa">

                            <label class="mr-sm-1" for="inlineFormCustomSelect">Fim:</label>
                            <input type="date" name="fimData" id="fimExpediente" class="form-control mx-sm-1" id="inputPassword2" placeholder="Pesquisa">

                            <button type="submit" name="acao" value="pesquisaHoras" id="pesquisaHoras" class="btn btn-danger col-sm-2 mx-sm-2">Pesquisar</button>
                        </div>
                    </form>
                </th>
            </tr>
        </table>
        <div class="table-responsive">
            <form>
                <table class="table table-hover" style="background-color: white;">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Data</th>
                            <th scope="col">Inicio</th>
                            <th scope="col">Fim</th>
                            <th scope="col">Total</th>
                            <th scope="col">Ações</th>
                            <th scope="col">
                                <button type='submit' name='acao' value='editar' class='btn btn-success' data-toggle="collapse"><i class="fa fa-check" aria-hidden="true"></i></button>
                            </th>
                            <th scope="col">
                                <button type='submit' name='acao' value='editar' class='btn btn-danger' data-toggle="collapse"><i class="fa fa-times" aria-hidden="true"></i></button>
                            </th>
                            <th scope="col">
                                <button type='submit' name='acao' value='editar' class='btn btn-danger' data-toggle="collapse"><i class='fa fa-trash' aria-hidden='true'></i></button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Wagner Martins</th>
                            <td>17/12/1999</td>
                            <td>19:20:00H</td>
                            <td>22:20:00H</td>
                            <td>03:20:00H</td>
                            <td>Aprovado</td>
                            <td>
                            <th><input class='checkbox' type='checkbox' name='checkbox[]' value='$dbaselec->id' id='defaultCheck1'></th>
                            <th><button type='submit' name='acao' value='editar' class='btn btn-warning'><i class='fa fa-pencil' aria-hidden='true'></i></button></th>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</body>

</html>