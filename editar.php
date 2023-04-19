<?php
require 'config.php';

$animais = [];
$id = filter_input(INPUT_GET, 'id');
if($id){
    $sql = $pdo->prepare("SELECT * FROM bovinos WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0){
        $animais = $sql->fetch(PDO::FETCH_ASSOC);
    }else{
        header("Location: resumo.php");
        exit;
    }
}else{
    header("Location: resumo.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilos/cadastro.css">
    <link rel="stylesheet" href="./estilos/styles.css">
    <link rel="shortcut icon" href="img/logo-icone.png" type="image/x-icon">
    <title>Editar animais</title>
</head>
<body>
<header class="cabeçalho__container">
        <!----------Divisão 1----------->
        <div class="cabeçalho-1-1">
            <div class="cabeçalho-imagem">
                <img src="img/fazenda-teste.png" alt="" width="150px">
            </div>
            <div class="paragrafos-cabeçalho"><label for="nome">Proprietário (a):</label><input type="text" id="nome">
                <label for="">Fazenda:</label><input type="text" id="fazenda">
            </div>
        </div>
    <!------Menu Hamburgue MOBILE---------->
    <button onclick="animar()" id="btn-menu">
        <span class="linha"></span>
        <span class="linha"></span>
        <span class="linha"></span>
    </button>
    </header> 
    <nav>
        <div class="nav-list">
            <div class="div-1">
                <div class="div-1-1">
                    <img src="img/icons8-raça-de-vaca-30.png" alt="" width="30px" height="30px">
                    <a href="#">Manejo</a>     
                </div>    
                <div class="sub-menu-div-1">
                    <ul>
                        <li><a href="cadastro.html">Individual</a></li>
                        <li><a href="#">Lotes</a></li>
                        <li><a href="#">Inseminação</a></li>
                        <li><a href="#">Monta</a></li>
                    </ul>  
                </div>    
            </div>
            <div class="div-2">
                <div class="div-2-1">
                    <img src="img/icons8-resumo-30.png" alt="">
                    <a href="#">Consultas</a>
                </div>
                <div class="sub-menu-div-2">
                    <ul>
                        <li><a href="consulta-animais.php">Animais</a></li>
                        <li><a href="#">Lotes</a></li>
                        <li><a href="#">Dieta</a></li>
                        <li><a href="#">Mortes</a></li>
                    </ul>  
                </div>    
            </div>
            <div class="div-3">
                <div class="div-3-1">
                    <img src="img/icons8-signing-a-document-30.png" alt="">
                    <a href="#">Cadastro</a>
                </div>
                <div class="sub-menu-div-3">
                    <ul>
                        <li><a href="cadastro.html">Animais</a></li>
                        <li><a href="#">Propriedade</a></li>
                        <li><a href="#">Fornecedores</a></li>
                        <li><a href="#">Lotes</a></li>
                        <li><a href="#">Dieta</a></li>
                        <li><a href="#">Morte</a></li>
                    </ul>  
                </div>    
            </div>
        </div>
    </nav>
    <!----------------MENU MOBILE---------------->
    <nav class="navegação-menu-mobile" id="navegação-menu-mobile">
        <div class="nav-list-menu-mobile">
            <div class="div-1-mobile">
                <div class="div-1-1-mobile">
                    <img src="img/icons8-raça-de-vaca-30.png" alt="" width="30px" height="30px">
                    <a href="#">Manejo</a>     
                </div>    
                <div class="sub-menu-div-1-mobile">
                    <ul>
                        <li><a href="#">Individual</a></li>
                        <li><a href="#">Lotes</a></li>
                        <li><a href="#">Inseminação</a></li>
                        <li><a href="#">Monta Natural</a></li>
                    </ul>  
                </div>    
            </div>
            <div class="div-2-mobile">
                <div class="div-2-1-mobile">
                    <img src="img/icons8-resumo-30.png" alt="">
                    <a href="#">Resumo</a>
                </div>
                <div class="sub-menu-div-2-mobile">
                    <ul>
                        <li><a href="#">Animais</a></li>
                        <li><a href="#">Lotes</a></li>
                        <li><a href="#">Dieta</a></li>
                        <li><a href="#">Mortes</a></li>
                    </ul>  
                </div>    
            </div>
            <div class="div-3-mobile">
                <div class="div-3-1-mobile">
                    <img src="img/icons8-signing-a-document-30.png" alt="">
                    <a href="#">Cadastro</a>
                </div>
                <div class="sub-menu-div-3-mobile">
                    <ul>
                        <li><a href="#">Animais</a></li>
                        <li><a href="#">Propriedade</a></li>
                        <li><a href="#">Fornecedores</a></li>
                        <li><a href="#">Lotes</a></li>
                        <li><a href="#">Dieta</a></li>
                        <li><a href="#">Morte</a></li>
                    </ul>  
                </div>    
            </div>
        </div>
    </nav>
    <main>
<h1 class="editar-animais" style=" font-size: 20px; color:blue; margin: 10px; padding: 5px;">Editar Animais</h1>
<form method="POST" action="editar_animais.php">
    <input type="hidden" name="id" value="<?=$animais['id'];?>">
     <label for="nome-animal">Nome</label>
         <input type="text" id="nome" name="nome" value="<?=$animais['nome'];?>">
    <label for="categoria">Categoria</label>
        <select name="categoria" class="ls-field-lg" id="categoria" value="<?=$animais['categoria'];?>">
            <option value="Vaca">Vaca</option>
            <option value="Boi">Boi</option>
             <option value="Bezerro">Bezerro</option>
            <option value="Bezerra">Bezerra</option>
            <option value="Garrote">Garrote</option>
            <option value="Novilha">Novilha</option>
         </select>          
<!------------------------Raça---------->                   
     <label>Raça</label>
         <select name="raca" class="ls-field-lg" id="raca" value="<?=$animais['raca'];?>">
          <option value="Angus">Angus</option>
          <option value="Brahman">Brahman</option>
          <option value="Brangus">Brangus</option>
          <option value="Braford">Braford</option>
          <option value="Caracu">Caracu</option>
          <option value="Charolês">Charolês</option>
          <option value="Nelore">Nelore</option>
          <option value="Guzerá">Guzerá</option>
                            <option value="Gir">Gir</option>
                            <option value="Girolando">Girolando</option>
                            <option value="Holandês">Holandês</option>
                            <option value="Jersey">Jersey</option>
                            <option value="Red Angus">Red Angus</option>
                            <option value="Pardo Suiço">Parto Suíço</option>
                            <option value="Sindi">Sindi</option>
                            <option value="Girolando">Girolando</option>
                            <option value="Senepol">Senepol</option>
                        </select> 
<!----------------------------Sexo---->  
                            <select name="sexo" class="ls-field-lg" id="sexo" value="<?=$animais['sexo'];?>" >
                                <option value="femea" selected >Femea</option>
                                <option value="macho">Macho</option>                      
<!--------------------------Nº do animal---> 
                              <input type="text" placeholder="Identificação do Animal" id="numero" name="identificacao" value="<?=$animais['identificacao'];?>">
<!---------------------------Escore------->
                        <label>Escore</label>
                        <select name="escore" class="ls-field-lg" value="<?=$animais['escore'];?>">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select> 
<!----------------------------Meses-->
                            <label>Meses</label>
                            <input type="number" class="number" id="meses" name="meses" value="<?=$animais['meses'];?>">          
<!--------------------------Lote-->
                            <div>
                            <label>Lote</label>
                            <input type="text" id="lote" name="lote" value="<?=$animais['lote'];?>">
                     </div>    
            </div>
<!-----------Pesos e Datas------------->
<section class="pesos__container">
    <div>
        <h2>Peso Inicial</h2>
        <div>
            <input type="number" placeholder="Peso" id="pesoInicial" name="pesoInicial" value="<?=$animais['peso_inicial'];?>">
            <input type="date" placeholder="Data" id="dataInicial" name="dataInicial" value="<?=$animais['data_inicial'];?>">
        </div>
    </div>
    <div>
        <h2>Peso Final</h2>
        <div>
            <input type="number" placeholder="Peso" id="pesoFinal" name="pesoFinal" value="<?=$animais['peso_final'];?>">
            <input type="date" placeholder="Data" id="dataFinal" name="dataFinal" value="<?=$animais['data_final'];?>">
        </div>
    </div>
</section>
<!--Botão Salvar--->
<div>
    <input type="submit" value="Atualizar" style="color:white; font-weight: bold; background-color: rgb(64, 64, 168); padding:10px;"> 
</div> 
    </form>  

<script src="cabeçalho.js"></script>
<script src="cadastro.js"></script>
</body>
</html>
