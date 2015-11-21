<?php
require_once('db_connect.php');
$id_livro = $_GET['id'];
$nota = $_GET['nota'];

$query = "SELECT * FROM avaliacao WHERE id_livro='$id_livro' AND id_usuario='{$_COOKIE['id']}'";
$data = mysqli_query($dbc,$query)
or die("Erro. ".mysqli_error($dbc));
if(mysqli_num_rows($data) > 0){
}else{
	mysqli_query($dbc, "INSERT INTO avaliacao(id_livro,id_usuario,data,nota) VALUES ('$id_livro', '{$_COOKIE['id']}',now(),'$nota')")
	or die("Erro. ".mysqli_error($dbc));
}
header("Location: show_book.php?id=$id_livro");
?>