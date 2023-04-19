<?php
    require 'config.php';
    
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


    $sql = $pdo->prepare("INSERT INTO bovinos (nome, categoria, raca, sexo, identificacao, escore, meses, lote, peso_inicial, data_inicial, peso_final, data_final) VALUES (:nome, :categoria, :raca, :sexo, :identificacao, :escore, :meses, :lote, :pesoInicial, :dataInicial, :pesoFinal, :dataFinal)");

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

    $sql->execute();

    header("location: cadastro.html");
?>