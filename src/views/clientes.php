<?php
    require '../controller/ClientesController.php';
    $clientes = new ClientesController();
?>
<!DOCTYPE html>
<html lang="pt_br">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>

<body class="bg-secondary">

    <div class="container">
        <h1 class="display-1 text-center text-light">Clientes</h1>
        <nav class="nav nav-pills nav-justified ">
            <a href="../../index.php" class="nav-item nav-link active bg-danger" >Voltar </a>
            <a href="./cadastrarCliente.php"  class="nav-item nav-link active bg-success">Cadastrar Cliente</a>
        </nav>
        <table class="table table-striped " id="table">
            <thead class="table-dark">
                <tr>
                    <th></th>
                    <th>Nome Completo</th>
                    <th>Email</th>
                    <th>Endereco</th>
                    <th>Telefone</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($clientes->findAll() as $cliente) : ?>
                    <tr class=" text-light">
                        <td> <?= $cliente->getidcliente() ?> </td>
                        <td> <?= $cliente->getNome() ?> </td>
                        <td> <?= $cliente->getemail() ?> </td>
                        <td> <?= $cliente->getendereco() ?> </td>
                        <td> <?= $cliente->gettelefone() ?> </td>

                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="./editarCliente.php?id=<?= $cliente->getidcliente() ?>" class="btn btn-success">editar</a><br>
                                <a href="./apagarCliente.php?id=<?= $cliente->getidcliente() ?>" onclick="return confirm('Tem certeza de que deseja excluir este item?');"class="btn btn-outline-danger">apagar</a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


</html>