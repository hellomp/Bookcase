<!doctype html>
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
	<link rel="stylesheet" type="text/css" href="bower_components/fullpage/jquery.fullPage.css" />
	<script type="text/javascript" src="bower_components/jquery/jquery.js"></script>
	<script type="text/javascript" src="bower_components/jquery-ui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="bower_components/fullpage/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="bower_components/fullpage/jquery.fullPage.min.js"></script>
	<style>

	/* Style for our header texts
	* --------------------------------------- */
	h1{
		font-size: 5em;
		font-family: arial,helvetica;
		margin:0;
		padding:0;
	}
	h3{
		margin-top: 32px;
		margin-bottom: 8px;
	}
	h4{
		margin: 0;
	}

	/* Centered texts in each section
	* --------------------------------------- */
	.section{
		text-align:center;
	}


	/* Backgrounds will cover all the section
	* --------------------------------------- */
	.section{
		background-size: cover;
	}
	.slide{
		background-size: cover;
	}
	#slide1{
		background-image: url(images/Slide1.jpg);
	}
	#slide2{
		background-image: url(images/Slide2.jpg);
	}
	#slide3{
		background-image: url(images/Slide3.jpg);
	}

	/* Bottom menu
	* --------------------------------------- */
	#infoMenu li a {
		color: #fff;
	}
	.fp-tableCell{
		vertical-align: top;
	}
	.fp-controlArrow.fp-next{
		display: none;
		border-width: 20.5px 0 20.5px 16px;
	}
	.fp-controlArrow.fp-prev{
		display: none;
		border-width: 20.5px 16px 20.5px 0;
	}
	#start-button{
		position: absolute;
		display: block;
		right: 0;
		bottom: 0;
		margin-right: 18px;
		margin-bottom: 18px;
	}
	</style>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#fullpage').fullpage({
			anchors: ['firstPage', 'secondPage', '3rdPage'],
			sectionsColor: ['#8FB98B', '#DE564B', '#EAE1C0'],
			slidesNavigation: true,
			loopTop: false,
			loopBottom: false

		});
	});
	</script>

	<title>Bem-Vindo</title>
</head>
<body>
	<div id="fullpage">
		<div class="section" id="section0">
			<div class="slide" id="slide1" data-anchor="slide1">
				<h3>Organize sua</h3>
				<h4>coleção de livros</h4>

			</div>
			<div class="slide" id="slide2" data-anchor="slide2">
				<h3>Saiba quais livros</h3>
				<h4>você já leu</h4>
				<h4>e quais os seus favoritos</h4>
			</div>
			<div class="slide" id="slide3" data-anchor="slide3">
				<h3>Encontre novos livros</h3>
				<h4>e marque aqueles</h4>
				<h4>que você deseja ter</h4>
				<a href="index.php" class="mdl-button mdl-js-button mdl-button--default" id="start-button" >
					COMEÇAR
				</a>
			</div>	
		</div>
	</div>
</body>
<script src="bower_components/material-design-lite/material.min.js"></script>

</html>