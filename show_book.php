<?php
include_once('db_connect.php');
$id = $_GET['id'];
$query = mysqli_query($dbc, "SELECT * FROM livro WHERE id='$id'") or die ('ERRO na consulta: ' . mysqli_error($dbc));
$livro = mysqli_fetch_array($query);
?>
<head lang="en">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Material Design Lite -->
	<link rel="stylesheet" href="bower_components/material-design-lite/material.min.css">
	<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.blue_grey-red.min.css" />
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
						<p style="font-weight: bold;"> <?=$livro['autor']?></p>
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
						<div class='mdl-cell mdl-cell--12-col-phone' style='text-align: center;'>
					<?php 
					if(isset($_COOKIE['id'])){
						$id = $_GET['id'];
						$query_read = mysqli_query($dbc,"SELECT * FROM lido WHERE id_livro='$id' AND id_usuario='{$_COOKIE['id']}'");

						if(mysqli_num_rows($query_read) > 0){
							echo "<a class='action-button mdl-button mdl-js-button mdl-button--icon mdl-button--colored' href='add_read.php?id=".$id."'
							><i class='material-icons' style='font-size: 40px;'>favorite</i></a>";
						}
						else{
							echo "<a class='action-button mdl-button mdl-js-button mdl-button--icon mdl-button--colored' href='add_read.php?id=".$id."'
							><i class='material-icons' style='font-size: 40px;'>favorite_border</i></a>";
						}
					}
					?>
					<?php 
					if(isset($_COOKIE['id'])){
						$id = $_GET['id'];
						$query_wish = mysqli_query($dbc,"SELECT * FROM desejo WHERE id_livro='$id' AND id_usuario='{$_COOKIE['id']}'");

						if(mysqli_num_rows($query_wish) > 0){
							echo "<a class='action-button mdl-button mdl-js-button mdl-button--icon mdl-button--colored' href='add_wish.php?id=".$id."'><i class='material-icons' style='font-size: 40px;'>bookmark</i></a>";
						}
						else{
							echo "<a class='action-button mdl-button mdl-js-button mdl-button--icon mdl-button--colored' href='add_wish.php?id=".$id."'><i class='material-icons' style='font-size: 40px;'>bookmark_border</i></a>";
						}
					}
					?>
					</div>
					</div>						
				</div>
				<div class="mdl-grid">
					<div class='mdl-cell mdl-cell--12-col-phone' style='text-align: center;'>
					<?php 
					if(isset($_COOKIE['id'])){
						$id = $_GET['id'];
						$query_read = mysqli_query($dbc,"SELECT * FROM lido WHERE id_livro='$id' AND id_usuario='{$_COOKIE['id']}'");

						if(mysqli_num_rows($query_read) > 0){
							echo "<a class='mdl-button mdl-js-button mdl-button--icon mdl-button--colored' href='add_read.php?id=".$id."'
							><i class='material-icons' style='font-size: 28px;'>favorite</i></a>";
						}
						else{
							echo "<a class='mdl-button mdl-js-button mdl-button--icon mdl-button--colored' href='add_read.php?id=".$id."'
							><i class='material-icons' style='font-size: 28px;'>favorite_border</i></a>";
						}
					}
					?>
					<?php 
					if(isset($_COOKIE['id'])){
						$id = $_GET['id'];
						$query_wish = mysqli_query($dbc,"SELECT * FROM desejo WHERE id_livro='$id' AND id_usuario='{$_COOKIE['id']}'");

						if(mysqli_num_rows($query_wish) > 0){
							echo "<a class='mdl-button mdl-js-button mdl-button--icon mdl-button--colored' href='add_wish.php?id=".$id."'><i class='material-icons' style='font-size: 28px;'>bookmark</i></a>";
						}
						else{
							echo "<a class='mdl-button mdl-js-button mdl-button--icon mdl-button--colored' href='add_wish.php?id=".$id."'><i class='material-icons' style='font-size: 28px;'>bookmark_border</i></a>";
						}
					}
					?>
					</div>
				</div>
				<div class="mdl-grid">
					<button class="mdl-button mdl-js-button mdl-button--primary" id="show-sinopse" >
						SINOPSE
					</button>
					<div class="mdl-cell mdl-cell--12-col-phone" id="sinopse" style="display: none;">
						<p> <?=$livro['sinopse']?></p>
					</div>


					<?php 
					if(isset($_COOKIE['id'])){
						$id = $_GET['id'];
						$query_rating = mysqli_query($dbc,"SELECT * FROM avaliacao WHERE id_livro='$id' AND id_usuario='{$_COOKIE['id']}'");
						echo "<div class='mdl-cell mdl-cell--12-col-phone' style='text-align: center;'>";
						echo "<h6 style='margin-bottom: 0px;'>Avaliar</h6>";
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