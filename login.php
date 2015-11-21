<?php
require_once('db_connect.php');
$error_msg = "";
if (!isset($_COOKIE['id'])) {
	if (isset($_POST['submit'])) {
		$usuario_email = mysqli_real_escape_string($dbc, trim($_POST['email']));
		$usuario_senha = mysqli_real_escape_string($dbc, trim($_POST['senha']));

		if(!empty($usuario_email)&&!empty($usuario_senha)){
			$query = "SELECT id, email FROM usuario WHERE email='$usuario_email' AND senha='$usuario_senha'";
			$data = mysqli_query($dbc,$query);
			if(mysqli_num_rows($data)==1){
				$row = mysqli_fetch_array($data);
				setcookie('id', $row['id'],time()+(60*60*24*30));
				setcookie('email', $row['email'],time()+(60*60*24*30));
				header('Location: index.php');
			}
			else{
				$error_msg =  "Digite senha e email";
			}
		}
		else{
			$error_msg =  "Digite senha e email";
		}
	}
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>
	<h1>Login</h1>
	<?php
	if(empty($_COOKIE['id'])){
		echo '<p>'.$error_msg.'</p>';
		?>
		<form action="login.php" method="post">
			<input type="text" id="email" name="email" placeholder="email" value="<?php if(!empty($usuario_email)) echo  $usuario_email; ?>"/>
			<input type="text" id="senha" name="senha" placeholder="senha"/>

			<input type="submit" name="submit" value="Salvar" />
		</form>
		<?php 
	}
	else{
		echo('<p>Você está logado como '. $_COOKIE['email'].'</p>');
	}
	?>
</body>
</html>