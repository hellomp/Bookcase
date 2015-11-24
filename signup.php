<?php
require_once('db_connect.php');
$error_msg = "";
if (isset($_POST['submit'])) {
	$usuario['email'] = $_POST['email'];
	$usuario['nome'] = $_POST['nome'];
	$usuario['senha'] = $_POST['senha'];
	$query = mysqli_query($dbc, "SELECT * FROM usuario WHERE email='{$usuario['email']}'")
	or die('Erro ao consultar banco de dados: '.$mysqli_error($dbc));
	if(mysqli_num_rows($query)==0){
		mysqli_query($dbc,"INSERT INTO usuario (email,nome,senha) VALUES
			('{$usuario['email']}','{$usuario['nome']}','{$usuario['senha']}')")
		or die('Erro ao cadastrar usuário: ' . mysqli_error($dbc));
		header("Location: presentation.php");
	}else{
	$error_msg = "<span class='mdl-textfield__error'>Esse email já existe</span>";
	}
}
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Material Design Lite -->
	<link rel="stylesheet" href="bower_components/material-design-lite/material.blue_grey-red.min.css" />
	<link rel="stylesheet" href="styles.css">
	<!-- Material Design fonts -->
	<link rel="stylesheet" href="icon.css?family=Material+Icons">
	<link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
	<script type="text/javascript" src="bower_components/jquery/jquery.js"></script>
	<title>Cadastrar</title>
	<style type="text/css">
	.mdl-button{
		height: 36px;
		min-width: 100%;
		padding: 0px;
	}
	body{
		background-image: url(images/Login.jpg);
		background-size: cover;
		min-height: 50%;
	}
	.page-content{
		margin-top: 75%;
	}
	</style>
</head>
<body class="mdl-demo">
	<div class="page-content">
		<form class="mdl-grid" action="signup.php" method="post">
			<div class="mdl-cell mdl-cell--1-col-phone" style="vertical-align: bottom; margin-top: 24px;">
				<i class="material-icons" style="vertical-align: middle;">person</i>
			</div>
			<div class="mdl-cell mdl-cell--11-col-phone">
				<div class="demo-textfield mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
					<input class="mdl-textfield__input" type="text" id="nome" name="nome" required>
					<label class="mdl-textfield__label" for="nome">Nome</label>
				</div>
			</div>
			<div class="mdl-cell mdl-cell--1-col-phone" style="vertical-align: bottom; margin-top: 24px;">
				<i class="material-icons" style="vertical-align: middle;">email</i>
			</div>
			<div class="mdl-cell mdl-cell--11-col-phone">
				<div class="demo-textfield mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
					<input class="mdl-textfield__input" type="text" id="email" name="email" required>
					<label class="mdl-textfield__label" for="email">Email</label>
					<?php
					if(empty($_COOKIE['id'])){
						echo $error_msg;
					}
						?>
					</div>
				</div>
				<div class="mdl-cell mdl-cell--1-col-phone" style="vertical-align: bottom; margin-top: 24px;">
					<i class="material-icons" style="vertical-align: middle;">https</i>
				</div>
				<div class="mdl-cell mdl-cell--11-col-phone">
					<div class="demo-textfield mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
						<input class="mdl-textfield__input" type="password" id="senha" name="senha" required>
						<label class="mdl-textfield__label" for="senha">Senha</label>
					</div>
				</div>
				<div class="mdl-cell mdl-cell--12-col-phone">
					<input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--primary mdl-color-text--accent-contrast" type="submit" name="submit" value="Entrar"/>
				</div>
				<div class="mdl-cell mdl-cell--12-col-phone">
					<a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast" href="signup.php"/>Nova Conta</a>
				</div>
			</form>
		</div>
	</body>
	<script src="bower_components/material-design-lite/material.min.js"></script>
	</html>