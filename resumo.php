<?php
require 'config.php';

$lista = [];
$sql = $pdo->query("SELECT * FROM bovinos");
if($sql->rowCount() > 0){
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo-icone.png" type="image/x-icon">
    <title>Resumo dos Animais</title>
</head>
<body style="font-family:Arial, Helvetica, sans-serif;">
<h1 style="text-align:center; margin: 20px; font-size: 22px;">Animais Cadastrados</h1>
<div style="text-align: center; margin: 10px;">
    <input type="search" placeholder="pesquisar" id="input-busca" style="padding: 6px;">
</div>
<table style="width:100%; border: 1px solid black;">
    <tr style="background-color: #cbe0c7;">
        <th>ID</th>
        <th>nome</th>
        <th>Categoria</th>
        <th>Raça</th>
        <th>Sexo</th>
        <th>Identificação</th>
        <th>Escore</th>
        <th>Meses</th>
        <th>Lote</th>
        <th>Peso Inicial</th>
        <th>Data</th>
        <th>Peso Final</th>
        <th>Data</th>
        <th>Ações</th>
    </tr>
    <?php foreach($lista as $bovinos):?>
        <tbody id="tabela-animais">
            <tr style="width:100%; border: 1px solid red";>
                <td><?=$bovinos['id'];?></td>
                <td><?=$bovinos['nome'];?></td>
                <td><?=$bovinos['categoria'];?></td>
                <td><?=$bovinos['raca'];?></td>
                <td><?=$bovinos['sexo'];?></td>
                <td><?=$bovinos['identificacao'];?></td>
                <td><?=$bovinos['escore'];?></td>
                <td><?=$bovinos['meses'];?></td>
                <td><?=$bovinos['lote'];?></td>
                <td><?=$bovinos['peso_inicial'];?></td>
                <td><?=$bovinos['data_inicial'];?></td>
                <td><?=$bovinos['peso_final'];?></td>
                <td><?=$bovinos['data_final'];?></td>
                <td>
                        <a href="editar.php?id=<?=$bovinos['id'];?>"style="text-decoration:none; color: blue; font-weight: bold; ";>Editar</a>
                        <a href="excluir.php?id=<?=$bovinos['id'];?>"style="text-decoration:none; color: red; font-weight: bold;";>Excluir</a>
                </td>
            </tr>
        </tbody>

    <?php endforeach; ?>
</table>
<div style="text-align:center; margin: 20px; font-size: 16px;">
    <a href="cadastro.html" class="botao-voltar" style="text-decoration:none; color:white;font-weight: bold; background-color: black;border-radius: 8px; padding: 10px ">Voltar</a>
</div>
<script>
const INPUT_BUSCA = document.getElementById('input-busca');
const TABELA_ANIMAIS = document.getElementById('tabela-animais');

INPUT_BUSCA.addEventListener('keyup', () => {
    let expressao = INPUT_BUSCA.value.toLowerCase();

    if (expressao.length === 1) {
        return;
    }

    let linhas = TABELA_ANIMAIS.getElementsByTagName('tr');

    for (let posicao in linhas) {
        if (true === isNaN(posicao)) {
            continue;
        }

        let conteudoDaLinha = linhas[posicao].innerHTML.toLowerCase();

        if (true === conteudoDaLinha.includes(expressao)) {
            linhas[posicao].style.display = '';
        } else {
            linhas[posicao].style.display = 'none';
        }
    }
});
</script>
</body>
</html>