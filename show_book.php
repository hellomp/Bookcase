<!doctype html>
<?php
include_once('db_connect.php');
if(!isset($_COOKIE['id'])){
  header("Location: login.php");
}
$id = $_GET['id'];
$query = mysqli_query($dbc, "SELECT *, categoria.nome FROM livro INNER JOIN categoria ON (livro.id_categoria = categoria.id) 
	WHERE livro.id='$id'") or die ('ERRO na consulta: ' . mysqli_error($dbc));
$livro = mysqli_fetch_array($query);
?>
<head lang="en">
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
	<title><?=$livro['titulo']?></title>
</head>
<body class="mdl-demo">
	
	<!-- Always shows a header, even in smaller screens. -->
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

		<header class="mdl-layout__header">
			<div class="mdl-layout__drawer-button">
				<a href="index.php">
					<i class="material-icons">arrow_back</i>
				</a>
			</div>
			<div class="mdl-layout__header-row">
				<!-- Title -->

				<span class="mdl-layout-title"><?=$livro['titulo']?></span>
				<div class="mdl-layout-spacer"></div>
			</div>
		</header>

		<main class="mdl-layout__content">
			<div class="page-content">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--5-col-phone" style="float:left;">
						<div class="wrapper" style="background: url('<?=$livro['capa']?>') center / cover;">
						</div>
					</div>
					<div class="mdl-cell mdl-cell--7-col-phone" style="float:right;">
						<h4 style="margin-top: 8px; margin-bottom: 8px;"> <?=$livro['titulo']?></h4>
						<p class="grey-color" style="font-weight: bold; margin-bottom: 4px;"> <?=$livro['autor']?></p>
						<?php
						$query_rate = mysqli_query($dbc,"SELECT AVG(avaliacao.nota) nota_media
							FROM avaliacao INNER JOIN livro ON (avaliacao.id_livro = livro.id) WHERE id_livro = '$id'");
						$avaliacao_media = mysqli_fetch_array($query_rate);
						if($avaliacao_media['nota_media']==0){
							echo "<i class='material-icons'>star_border</i>";
							echo "<i class='material-icons'>star_border</i>";
							echo "<i class='material-icons'>star_border</i>";
							echo "<i class='material-icons'>star_border</i>";
							echo "<i class='material-icons'>star_border</i>";
						}else if($avaliacao_media['nota_media']>0 & $avaliacao_media['nota_media']<1){
							echo "<i class='material-icons'>star_half</i>";
							echo "<i class='material-icons'>star_border</i>";
							echo "<i class='material-icons'>star_border</i>";
							echo "<i class='material-icons'>star_border</i>";
							echo "<i class='material-icons'>star_border</i>";
						}else if($avaliacao_media['nota_media']==1){
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star_border</i>";
							echo "<i class='material-icons'>star_border</i>";
							echo "<i class='material-icons'>star_border</i>";
							echo "<i class='material-icons'>star_border</i>";
						}else if($avaliacao_media['nota_media']>1 & $avaliacao_media['nota_media']<2){
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star_half</i>";
							echo "<i class='material-icons'>star_border</i>";
							echo "<i class='material-icons'>star_border</i>";
							echo "<i class='material-icons'>star_border</i>";
						}else if($avaliacao_media['nota_media']==2){
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star_border</i>";
							echo "<i class='material-icons'>star_border</i>";
							echo "<i class='material-icons'>star_border</i>";
						}else if($avaliacao_media['nota_media']>2 & $avaliacao_media['nota_media']<3){
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star_half</i>";
							echo "<i class='material-icons'>star_border</i>";
							echo "<i class='material-icons'>star_border</i>";
						}else if($avaliacao_media['nota_media']==3){
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star_border</i>";
							echo "<i class='material-icons'>star_border</i>";
						}else if($avaliacao_media['nota_media']>3 & $avaliacao_media['nota_media']<4){
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star_half</i>";
							echo "<i class='material-icons'>star_border</i>";
						}else if($avaliacao_media['nota_media']==4){
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star_border</i>";
						}else if($avaliacao_media['nota_media']>4 & $avaliacao_media['nota_media']<5){
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star_half</i>";
						}else if($avaliacao_media['nota_media']==5){
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star</i>";
							echo "<i class='material-icons'>star</i>";
						}
						?>

					</div>						
				</div>
				<div class="separator"></div>
				<div class="mdl-grid">
					<div class='mdl-cell mdl-cell--3-col-phone' style='text-align: center;'>
						<?php 
						if(isset($_COOKIE['id'])){
							$id = $_GET['id'];
							$query_read = mysqli_query($dbc,"SELECT * FROM lido WHERE id_livro='$id' AND id_usuario='{$_COOKIE['id']}'");

							if(mysqli_num_rows($query_read) > 0){
								echo "<a class='action-button mdl-button mdl-js-button mdl-button--icon' href='add_read.php?id=".$id."'
								><i class='action-icon material-icons blue-color' style='font-size: 40px;'>chrome_reader_mode</i></a>";
							}
							else{
								echo "<a class='action-button mdl-button mdl-js-button mdl-button--icon' href='add_read.php?id=".$id."'
								><i class='action-icon material-icons grey-color' style='font-size: 40px;'>chrome_reader_mode</i></a>";
							}
						}
						?>
						<p class="grey-color no-margin" style="font-weight: bold; font-size: 12px;">Já li</p>
					</div>
					<div class='mdl-cell mdl-cell--3-col-phone' style='text-align: center;'>
						<?php 
						if(isset($_COOKIE['id'])){
							$id = $_GET['id'];
							$query_favorite = mysqli_query($dbc,"SELECT * FROM favorito WHERE id_livro='$id' AND id_usuario='{$_COOKIE['id']}'");

							if(mysqli_num_rows($query_favorite) > 0){
								echo "<a class='action-button mdl-button mdl-js-button mdl-button--icon' href='add_favorite.php?id=".$id."'
								><i class='action-icon material-icons red-color' style='font-size: 40px;'>favorite</i></a>";
							}
							else{
								echo "<a class='action-button mdl-button mdl-js-button mdl-button--icon' href='add_favorite.php?id=".$id."'
								><i class='action-icon material-icons grey-color' style='font-size: 40px;'>favorite_border</i></a>";
							}
						}
						?>
						<p class="grey-color no-margin" style="font-weight: bold; font-size: 12px;">Favorito</p>
					</div>
					<div class='mdl-cell mdl-cell--3-col-phone' style='text-align: center;'>
						<?php 
						if(isset($_COOKIE['id'])){
							$id = $_GET['id'];
							$query_have = mysqli_query($dbc,"SELECT * FROM tenho WHERE id_livro='$id' AND id_usuario='{$_COOKIE['id']}'");

							if(mysqli_num_rows($query_have) > 0){
								echo "<a class='action-button mdl-button mdl-js-button mdl-button--icon' href='add_have.php?id=".$id."'
								><i class='action-icon material-icons green-color' style='font-size: 40px;'>border_all</i></a>";
							}
							else{
								echo "<a class='action-button mdl-button mdl-js-button mdl-button--icon' href='add_have.php?id=".$id."'
								><i class='action-icon material-icons grey-color' style='font-size: 40px;'>border_all</i></a>";
							}
						}
						?>
						<p class="grey-color no-margin" style="font-weight: bold; font-size: 12px;">Tenho</p>
					</div>
					<div class='mdl-cell mdl-cell--3-col-phone' style='text-align: center;'>
						<?php 
						if(isset($_COOKIE['id'])){
							$id = $_GET['id'];
							$query_wish = mysqli_query($dbc,"SELECT * FROM desejo WHERE id_livro='$id' AND id_usuario='{$_COOKIE['id']}'");
							if(mysqli_num_rows($query_wish) > 0){
								echo "<a class='action-button mdl-button mdl-js-button mdl-button--icon mdl-button--colored' href='add_wish.php?id=".$id."'><i class='action-icon material-icons orange-color' style='font-size: 40px;'>bookmark</i></a>";
							}
							else{
								echo "<a class='action-button mdl-button mdl-js-button mdl-button--icon' href='add_wish.php?id=".$id."'><i class='action-icon material-icons grey-color' style='font-size: 40px;'>bookmark_border</i></a>";
							}
						}
						?>
						<p class="grey-color no-margin" style="font-weight: bold; font-size: 12px;">Quero</p>
					</div>
				</div>
				<div class="separator"></div>
				<div class="mdl-grid">
					<div class='mdl-cell mdl-cell--12-col-phone' style='text-align: center;'>
						<h6 class="grey-color no-margin">SINOPSE</h6>
						<button class="mdl-button mdl-js-button mdl-button--primary" id="show-sinopse" >
							MOSTRAR
						</button>
					</div>
					<div class="mdl-cell mdl-cell--12-col-phone" id="sinopse" style="display: none;">
						<p> <?=$livro['sinopse']?></p>
					</div>
				</div>
				<div class="separator"></div>

				<div class="mdl-grid">

					<?php 
					if(isset($_COOKIE['id'])){
						$id = $_GET['id'];
						$query_rating = mysqli_query($dbc,"SELECT * FROM avaliacao WHERE id_livro='$id' AND id_usuario='{$_COOKIE['id']}'");
						echo "<div class='mdl-cell mdl-cell--12-col-phone' style='text-align: center;'>";
						echo "<h6 class='grey-color no-margin'>AVALIAR</h6>";
						echo "</div>";
						echo "<div class='mdl-cell mdl-cell--12-col-phone' style='text-align: center;'>";
						if(mysqli_num_rows($query_rating) > 0){
							$avaliacao = mysqli_fetch_array($query_rating);
							echo "<a class='mdl-button mdl-js-button mdl-button--icon mdl-button--colored' href='add_rating.php?id=".$id."&nota=1'><i class='material-icons'>star</i></a>";
							if($avaliacao['nota']>1){
								echo "<a class='mdl-button mdl-js-button mdl-button--icon mdl-button--colored' href='add_rating.php?id=".$id."&nota=2'><i class='material-icons'>star</i></a>";
							}else{
								echo "<a class='mdl-button mdl-js-button mdl-button--icon mdl-button--colored' href='add_rating.php?id=".$id."&nota=2'><i class='material-icons'>star_border</i></a>";
							}
							if($avaliacao['nota']>2){
								echo "<a class='mdl-button mdl-js-button mdl-button--icon mdl-button--colored' href='add_rating.php?id=".$id."&nota=3'><i class='material-icons'>star</i></a>";
							}else{
								echo "<a class='mdl-button mdl-js-button mdl-button--icon mdl-button--colored' href='add_rating.php?id=".$id."&nota=3'><i class='material-icons'>star_border</i></a>";
							}
							if($avaliacao['nota']>3){
								echo "<a class='mdl-button mdl-js-button mdl-button--icon mdl-button--colored' href='add_rating.php?id=".$id."&nota=4'><i class='material-icons'>star</i></a>";
							}else{
								echo "<a class='mdl-button mdl-js-button mdl-button--icon mdl-button--colored' href='add_rating.php?id=".$id."&nota=4'><i class='material-icons'>star_border</i></a>";
							}
							if($avaliacao['nota']>4){
								echo "<a class='mdl-button mdl-js-button mdl-button--icon mdl-button--colored' href='add_rating.php?id=".$id."&nota=5'><i class='material-icons'>star</i></a>";
							}else{
								echo "<a class='mdl-button mdl-js-button mdl-button--icon mdl-button--colored' href='add_rating.php?id=".$id."&nota=5'><i class='material-icons'>star_border</i></a>";

							}
						}
						else{
							echo "<a class='mdl-button mdl-js-button mdl-button--icon' href='add_rating.php?id=".$id."&nota=1'><i class='material-icons'>star_border</i></a>";
							echo "<a class='mdl-button mdl-js-button mdl-button--icon' href='add_rating.php?id=".$id."&nota=2'><i class='material-icons'>star_border</i></a>";
							echo "<a class='mdl-button mdl-js-button mdl-button--icon' href='add_rating.php?id=".$id."&nota=3'><i class='material-icons'>star_border</i></a>";
							echo "<a class='mdl-button mdl-js-button mdl-button--icon' href='add_rating.php?id=".$id."&nota=4'><i class='material-icons'>star_border</i></a>";
							echo "<a class='mdl-button mdl-js-button mdl-button--icon' href='add_rating.php?id=".$id."&nota=5'><i class='material-icons'>star_border</i></a>";
						}
					}
					?>
				</div>

			</div>
			<div class="separator"></div>
			<div class="mdl-grid">
				<div class='mdl-cell mdl-cell--12-col-phone'>
					<h7 class="grey-color no-margin">DETALHES</h7>
				</div>
				<div class='mdl-cell mdl-cell--12-col-phone'>
					<p style="font-weight: bold;">Categoria: <?=$livro['nome']?></p>
					<p style="font-weight: bold;">Editora: <?=$livro['editora']?></p>
					<p style="font-weight: bold;">Autor: <?=$livro['autor']?></p>
					<p style="font-weight: bold;">Lançamento: <?=$livro['ano_lancamento']?></p>
					<p style="font-weight: bold;">Páginas: <?=$livro['pagina']?></p>
				</div>		
			</div>

		</main>
	</div>
</body>
<script src="bower_components/material-design-lite/material.min.js"></script>

</html>
<script type="text/javascript">
$(document).ready(function() {
	$('#show-sinopse').click(function() {
		$('#sinopse').slideToggle("fast");
	});
});
</script>