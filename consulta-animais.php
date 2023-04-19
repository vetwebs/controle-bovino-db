<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Animal</title>
    <link rel="shortcut icon" href="img/logo-icone.png" type="image/x-icon">
    <link rel="stylesheet" href="./estilos/styles.css">
    <link rel="stylesheet" href="./estilos/cadastro.css">
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
        <div style="margin-top: 2.5em; margin-left: 25em"; >
            <a href="inicio.html" style="text-decoration: none; color: white; font-weight: bold; border: 1px solid #5f775b; background-color: #5f775b; border-radius: 10px; padding: 10px"; >Voltar<a>
        </div>
    </header> 
    <main style="height: 100vh; width: 92%; margin: 0 0 -10% 2%" class="main_consulta-animal">
	<form method="POST" action="">
		<input type="text" name="nome" id="nome" placeholder="Digite o nome do animal" style="font-size: 20px;">
		<button type="submit" style="padding: 5px; border-radius: 10px; border: 1px solid green; font-size: 20px;">Pesquisar</button>
	</form>
	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Conectar ao banco de dados
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "cadastro-bovino";
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
				die("Erro ao conectar ao banco de dados: " . $conn->connect_error);
			}
			// Realizar a consulta no banco de dados
			$nome = $_POST['nome'];
			$sql = "SELECT * FROM bovinos WHERE nome LIKE '%$nome%'";
			$result = $conn->query($sql);

			// Exibir os resultados em uma tabela HTML
			if ($result->num_rows > 0) {
				echo "<table style='width:100%; border: 1px solid black; font-size: 20px; margin: -18% 0 auto 0 ;';>";
				echo "<tr style='background-color: #a9d3a2';><th>Nome</th><th>Categoria</th><th>Raça</th><th>Sexo</th><th>Identificação</th><th>Escore</th><th>Meses</th><th>Lote</th><th>Peso</th><th>Data</th></tr>";
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["nome"] . "</td><td>" . $row["categoria"] . "</td><td>" . $row["raca"] . "</td><td>" . $row["sexo"] . "</td><td>" . $row["identificacao"] . "</td><td>" . $row["escore"] . "</td><td>" . $row["meses"] . "</td><td>" . $row["lote"] . "</td><td>" . $row["peso_final"] . "</td><td>" . $row["data_final"] . "</td></tr>";
				}
				echo "</table>";
			} else {
				echo "<table style='width:100%; font-size: 20px; margin: -18% 0 auto 0 ;';>";
				echo "<tr><th style='color: red;'>Nenhum animal encontrado</th></tr>";
			}

			// Fechar a conexão com o banco de dados
			$conn->close();
		}
	?>
    </main>
<script src="cabeçalho.js"></script>
<script src="cadastro.js"></script>
</body>
</html>
