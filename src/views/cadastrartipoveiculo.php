<?php
require '../controller/tipoveiculoController.php';
$tipoveiculo = new tipoveiculoController();
?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Tipo Veiculo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body class="bg-secondary">
    <div class="container">
        <h1 class="display-1 text-center text-light">Cadastrar Tipo do Veiculo</h1>
        <nav class="nav nav-pills nav-justified ">
            <a href="./tipoveiculo.php" class="nav-item nav-link active bg-danger" >Voltar </a>
        </nav>

        <form class='form' action="./cadastrartipoveiculo.php" method="POST">
            <div class="mb-3"><br>

                <label for="descricao" class="form-label text-light">tipo do veiculo</label>
                <input type="text" pattern="[a-zA-Z\s]+$" title="somente letras, por favor" name="descricao" class="form-control" id="descricao" autocomplete="off" required>
            </div><br>

                <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
        </form>
         <?php

$descricao =filter_input(INPUT_POST,'descricao');

if($descricao){

      $sql = Database::prepare("SELECT * FROM tipoveiculo  WHERE descricao = :descricao");
        $sql->bindValue(':descricao', $descricao);
        $sql->execute();

if($sql->rowCount() === 0){

$sql= Database::prepare("INSERT INTO tipoveiculo (descricao) VALUES (:descricao)");
        $sql->bindValue(':descricao', $descricao);
        $sql->execute();

echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          tipoveiculo cadastrado com Sucesso!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';

}else{
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         Esse tipo_veiculo , ja esta cadastrado;
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';

}
}

        ?> 
     
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>