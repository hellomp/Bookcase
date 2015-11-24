<?php
require_once('db_connect.php');
$id_livro = $_GET['id'];
$query = "SELECT * FROM favorito WHERE id_livro='$id_livro' AND id_usuario='{$_COOKIE['id']}'";
$data = mysqli_query($dbc,$query)
or die("Erro".mysqli_error($dbc));
if(mysqli_num_rows($data) > 0){
	$row = mysqli_fetch_array($data);
	mysqli_query($dbc,"DELETE FROM favorito WHERE id = '{$row['id']}'")
	or die("Erro".mysqli_error($dbc));
}else{
	mysqli_query($dbc, "INSERT INTO favorito(id_livro,id_usuario,data) VALUES ('$id_livro', '{$_COOKIE['id']}',now())")
	or die("Erro".mysqli_error($dbc));
}
header("Location: show_book.php?id=$id_livro");
?>