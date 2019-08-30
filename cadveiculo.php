<?php
//var_dump($_POST);

	if (count($_POST)>0){
		//inserir o banco de dados
		echo '<br>' . $_POST['CPF'];
		echo '<br>' . $_POST['nome'];
		echo '<br>' . $_POST['datanascimento'];

		$banco = "estacionamento";
		$usuario = "estacionamento";
		$senha = "joselia";

		$conexao = new PDO("mysql: host = localhost; dbname=${banco}", $usuario, $senha);

		$sql = "INSERT INTO veiculo VALUES (?, ?, ?, ?)";
		$comando = $conexao->prepare($sql);

		$sucesso = $comando->execute([
			$_POST['placa'],
			$_POST['modelo_codmod'],
			$_POST['cliente_cpf'],
			$_POST['cor']
			]);

		//redireciona para a pagina cliente.php
		
		$mensagem = '';
	if ($sucesso)
	{
		$mensagem = "Veiculo cadastrado!";
	}
	else
	{
		// se deu erro, a mensagem não será tão amigável :(
		$mensagem = "Erro: " . $comando->errorInfo()[2];
	}
	// uso um cookie para passar a mensagem para a página de clientes
	setcookie('mensagem', $mensagem);
	// redireciona para a página clientes.php
	header('Location: veiculos.php');


	}

?>
  <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Novo Veículo - IF Park</title>
 	<link rel="stylesheet" href="css/estilo.css">
 </head>
 <body>
 	
	<header>
		<h1>ℙ IF Park</h1>
		<nav>
			<ul id="menu">
				<li><a href="estacionados.php">Estacionados</a></li>
				<li><a href="patio.php">Pátios</a></li>
				<li class="ativo"><a href="clientes.php">Clientes</a></li>
				<li><a href="veiculos.php">Veículos</a></li>
				<li><a href="modelos.php">Modelos</a></li>
			</ul>
		</nav>
	</header>
	<div id="container">
		<main>
			<h2>Novo Veículo</h2>
			<form action="cadveiculo.php" method="post">

	 <p>
     	<label for="iplaca">Placa:</label>
     	<input type="placa" id= iplaca name="placa">

     </p>

	<p>
         <label for="imodelo_codmod">Código do Modelo: </label>
         <input type="modelo_codmod" id="imodelo_codmod" name="modelo_codmod">
     </p>    

     <p>
     	<label for="icliente_cpf">CPF do Cliente</label>
     	<input type="cliente_cpf" id= icliente_cpf name="cliente_cpf">
     </p>
     <p>
     	<label for="icor">Cor</label>
     	<input type="cor" id= icor name="cor">
     </p>

     <P>	
		<button type="submit">Entrar</button>
		<button type="reset">Limpar</button>
	</P>

		</main>
	</div>
	<footer>
		<p>Desenvolvido com ♡ pelo Terceirão 2019.</p>
	</footer>

 </body>
 </html>