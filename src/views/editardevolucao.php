<?php
require_once '../controller/VendasController.php';
require '../controller/devolucaoController.php';
if (!$_GET) header('Location: ./devolucao.php');;
$iddevolucao = $_GET['id'];
$devolucao = new devolucaoController();
$alugues = new VendasController();
$devolucao->setiddevolucao($iddevolucao);
$devolucao->setidaluguel($devolucao->findOne($iddevolucao)->getidaluguel());
$devolucao->settotal($devolucao->findOne($iddevolucao)->gettotal());
$devolucao->setextra($devolucao->findOne($iddevolucao)->getextra());
$devolucao->setdatadevolucao($devolucao->findOne($iddevolucao)->getdatadevolucao());
$devolucao->setcombustiveldevolucao($devolucao->findOne($iddevolucao)->getcombustiveldevolucao());


?>

<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Devolução</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/styles/main.css">
</head>


<body class="bg-secondary">
    <div class="container">

        <h1 class="display-1 text-center text-light">Atualizar Devolução</h1>
        <nav class="nav nav-pills nav-justified ">
            <a href="./devolucao.php" class="nav-item nav-link active bg-danger" >Voltar </a>
        </nav>
        <form class='form' action="./editardevolucao.php?id=<?= $devolucao->getiddevolucao() ?>" method="POST">
             <div class="mb-3">
                <label for="idaluguel" class="form-label text-light">Selecionar o ID-aluguel</label>

                <select name="idaluguel" class="form-select" id="idaluguel" disabled required>
                    <option value="" selected disabled>Selecione o  ID-aluguel</option>
                    <?php
                    foreach ($alugues->findAll() as $aluguel) {
                        if ($aluguel->getidaluguel() == $devolucao->getidaluguel()) { ?>
                            <option selected value="<?= $aluguel->getidaluguel() ?>"><?= $aluguel->getidaluguel() ?></option> <?php
                                                                                                                 } else { ?>
                            <option value="<?= $aluguel->getidaluguel() ?>"><?= $aluguel->getidaluguel() ?></option> <?php
                                                                                                                        }
                                                                                                                    }
                                                                                                                ?>
                </select>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="extra" class="form-label text-light">extra</label>
                    <input type="number" value="<?= $devolucao->getextra() ?>" step="any" name="extra" class="form-control" id="extra" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="datadevolucao" class="form-label text-light">data-devolucao</label>
                    <input type="date" value="<?= $devolucao->getdatadevolucao() ?>" step="any" name="datadevolucao" class="form-control" min = 2021-07-09  id="datadevolucao" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="combustiveldevolucao" class="form-label text-light">combustivel-devolucao</label>
                    <input type="number" value="<?= $devolucao->getcombustiveldevolucao() ?>" step="any" name="combustiveldevolucao" class="form-control" id="combustiveldevolucao" required>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <div class="input"><br>
                    <label for="total" class="form-label text-light">total</label>
                    <input type="number" value="<?= $devolucao->gettotal() ?>" step="any" name="total" class="form-control" id="total" required>
                </div>
            </div>
            <div class="button"><br>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
        <?php

        if (!$_POST) return;
        $devolucao->settotal($_POST['total']);
        $devolucao->setextra($_POST['extra']);
        $devolucao->setdatadevolucao($_POST['datadevolucao']);
        $devolucao->setcombustiveldevolucao($_POST['combustiveldevolucao']);


        try {
            $devolucao->update($iddevolucao);
            header("Location: ./devolucao.php");
        } catch (PDOException $err) {
            echo 'Ocorreu um erro ao atualizar a devolucao!';
        }

        ?>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</html>