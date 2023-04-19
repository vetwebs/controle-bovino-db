<?php
require 'config.php';

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$categoria = filter_input(INPUT_POST, 'categoria');
$raca = filter_input(INPUT_POST, 'raca');
$sexo = filter_input(INPUT_POST, 'sexo');
$identificacao = filter_input(INPUT_POST, 'identificacao');
$escore = filter_input(INPUT_POST, 'escore');
$meses = filter_input(INPUT_POST, 'meses');
$lote = filter_input(INPUT_POST, 'lote');
$pesoInicial = filter_input(INPUT_POST, 'pesoInicial');
$dataInicial = filter_input(INPUT_POST, 'dataInicial');
$pesoFinal = filter_input(INPUT_POST, 'pesoFinal');
$dataFinal = filter_input(INPUT_POST, 'dataFinal');

if($id && $nome && $categoria && $raca && $sexo && $identificacao && $escore && $meses && $lote && $pesoInicial && $dataInicial && $pesoFinal && $dataFinal){
    $sql = $pdo->prepare("UPDATE bovinos SET nome = :nome, categoria = :categoria, raca = :raca, sexo= :sexo, identificacao = :identificacao, escore = :escore, meses = :meses, lote = :lote, peso_inicial = :pesoInicial, data_inicial = :dataInicial, peso_final = :pesoFinal, data_final = :dataFinal WHERE id = :id");
   
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':categoria', $categoria);
    $sql->bindValue(':raca', $raca);
    $sql->bindValue(':sexo', $sexo);
    $sql->bindValue(':identificacao', $identificacao);
    $sql->bindValue(':escore', $escore);
    $sql->bindValue(':meses', $meses);
    $sql->bindValue(':lote', $lote);
    $sql->bindValue(':pesoInicial', $pesoInicial);
    $sql->bindValue(':dataInicial', $dataInicial);
    $sql->bindValue(':pesoFinal', $pesoFinal);
    $sql->bindValue(':dataFinal', $dataFinal);
    $sql->bindValue(':id', $id);
    $sql->execute();
    header("Location: resumo.php");
    exit;
}else{
    header("Location: resumo.php");
    exit;
}
