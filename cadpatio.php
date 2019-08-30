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

		$sql = "INSERT INTO patio VALUES (?, ?, ?)";
		$comando = $conexao->prepare($sql);

		$sucesso = $comando->execute([
			$_POST['num'],
			$_POST['ender'],
			$_POST['capacidade']
			]);

		//redireciona para a pagina cliente.php
		
		$mensagem = '';
	if ($sucesso)
	{
		$mensagem = "Patio cadastrado!";
	}
	else
	{
		// se deu erro, a mensagem não será tão amigável :(
		$mensagem = "Erro: " . $comando->errorInfo()[2];
	}
	// uso um cookie para passar a mensagem para a página de clientes
	setcookie('mensagem', $mensagem);
	// redireciona para a página clientes.php
	header('Location: clientes.php');


	}

?>
  <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Novo Patio - IF Park</title>
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
			<h2>Novo Patio</h2>
			<form action="cadpatio.php" method="post">

	 <p>
     	<label for="inum">Número:</label>
     	<input type="num" id= inum name="num">

     </p>

	<p>
         <label for="iender">Endereço: </label>
         <input type="ender" id="iender" name="ender">
     </p>    

     <p>
     	<label for="icapacidade">Capacidade de alocação</label>
     	<input type="capacidade" id= capacidade name="capacidade">
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