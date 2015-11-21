<?php
	$dbc = mysqli_connect('localhost', 'root', '', 'bookbox')
	or die('Erro ao conectar servidor.');
	mysqli_set_charset($dbc, 'utf8');
?>