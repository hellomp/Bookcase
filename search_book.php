<!doctype html>
<?php
include_once('db_connect.php');
if(!isset($_COOKIE['id'])){
  header("Location: login.php");
}
$output = "";
if(isset($_POST['submit'])){
	$search = $_POST['search'];
	$search = preg_replace("#[^0-9a-z]#i","",$search);
	$query = mysqli_query($dbc,"SELECT * FROM livro WHERE titulo LIKE '%$search%' OR autor LIKE '%$search%'")
	or die (mysqli_error($dbc));
	$count = mysqli_num_rows($query);
	if($count == 0){
		$output = "";
	}else{
		while($livro = mysqli_fetch_array($query)) {
			$output .= "<div class='demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col-phone'>
			<a href='show_book.php?id=".$livro['id']."' class='card-link'></a>
			<div class='wrapper'>
			<div class='demo-card mdl-card__title' style='background: url(".$livro['capa'].") center / cover;'>
			</div>
			</div>
			<div class='mdl-card__supporting-text'>
			<div class='book-title'>".$livro['titulo']."</div>
			<div class='book-subtitle'>".$livro['autor']."</div>
			</div>
			<div class='mdl-card__actions mdl-card--border'>
			<i class='material-icons md-12'>star</i>
			<i class='material-icons md-12'>star</i>
			<i class='material-icons md-12'>star</i>
			<i class='material-icons md-12'>star</i>
			<i class='material-icons md-12'>star_half</i>
			</div>
			</div>";
		};
	}

}else{
	$output = "";
}
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
	<title>Pesquisa</title>
</head>
<body class="mdl-demo mdl-color--grey-100">
	
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
				<form action="search_book.php" method="post">
					<div class="mdl-textfield mdl-js-textfield">
						<input class="mdl-textfield__input" type="text" id="pesquisa" name="search">
						<label class="mdl-textfield__label" for="pesquisa">Pesquisa</label>
					</div>
					<button type="submit" name="submit" class="mdl-button mdl-js-button mdl-button--icon">
						<i class="material-icons">search</i>
					</button>
				</form>
				<span class="mdl-layout-title">

				</span>
				<div class="mdl-layout-spacer"></div>
			</div>
		</header>

		<main class="mdl-layout__content">
			<div class="page-content">
				<div class="mdl-grid">
					<?php print("$output");?>
				</div>

			</div>
		</main>
	</div>
</body>
<script src="bower_components/material-design-lite/material.min.js"></script>

</html>