<!doctype html>
<?php 
require_once('db_connect.php');
$query_categoria = mysqli_query($dbc, "SELECT id,nome FROM categoria");


if (isset($_POST['submit'])) {
	$livro['titulo'] = $_POST['titulo'];
	$livro['autor'] = $_POST['autor'];
	$livro['sinopse'] = $_POST['sinopse'];
	$livro['sinopse'] = preg_replace("\'","",$livro['sinopse']);
	$livro['editora'] = $_POST['editora'];
	$livro['id_categoria'] = $_POST['id_categoria'];
	//$livro['id_subcategoria'] = $_POST['id_subcategoria'];
	$livro['pagina'] = $_POST['pagina'];
	$livro['ano_lancamento'] = $_POST['ano_lancamento'];


	$uploaddir = 'capas/';
	$capa = $uploaddir . basename($_FILES['capa']['name']);
	if (move_uploaded_file($_FILES['capa']['tmp_name'], $capa)) {
		mysqli_query($dbc,"INSERT INTO livro (titulo,autor,sinopse,editora,id_categoria,pagina,capa,data_registro,ano_lancamento) values
			('{$livro['titulo']}','{$livro['autor']}',
				'{$livro['sinopse']}','{$livro['editora']}','{$livro['id_categoria']}','{$livro['pagina']}','{$capa}', NOW(),'{$livro['ano_lancamento']}')")
		or die('Problema ao salvar livro: ' . mysqli_error($dbc));
		$query_autor = mysqli_query($dbc,"SELECT * FROM autor WHERE nome='{$livro['autor']}'")
		or die('Problema ao consultar autores: '.mysqli_error($dbc));
		if($autor = mysqli_num_rows($query_autor) == 0){
			mysqli_query($dbc,"INSERT INTO autor (nome) VALUES ('{$livro['autor']}')")
			or die('Problema ao adicionar autor: '.mysqli_error($dbc));
		}
		header("Location: index.php");
	}
}
?>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bower_components/jquery-ui/jquery-ui.css">

	<!-- Material Design Lite -->
	<link rel="stylesheet" href="bower_components/material-design-lite/material.min.css">
	<link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.blue_grey-red.min.css" />
	<link rel="stylesheet" href="styles.css">
	<!-- Material Design fonts -->
	<link rel="stylesheet" href="icon.css?family=Material+Icons">
	<link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">

	<script type="text/javascript" src="bower_components/jquery/jquery.js"></script>
	<script type="text/javascript" src="bower_components/jquery/jquery.maskedinput.min.js"></script>
	<script type="text/javascript" src="bower_components/jquery-ui/jquery-ui.js"></script>
	
	<!--
	<script language="javascript" type="text/javascript">
	function dropdownlist(listindex)
	{

		document.formname.id_subcategoria.options.length = 0;

		switch (listindex)
		{

			case "1" :
			/*document.formname.id_subcategoria.options[0]=new Option("id_subcategoria1.1","value1.1");*/
			document.formname.id_subcategoria.options[0]=new Option("Geral", "1");
			document.formname.id_subcategoria.options[1]=new Option("Americano", "2");
			document.formname.id_subcategoria.options[2]=new Option("Artistas autônomos", "3");
			document.formname.id_subcategoria.options[3]=new Option("Assuntos e temas", "4");
			document.formname.id_subcategoria.options[4]=new Option("Coleções, catálogos, exposições", "5");
			document.formname.id_subcategoria.options[5]=new Option("Filmes e vídeo", "6");
			document.formname.id_subcategoria.options[6]=new Option("História", "7");
			document.formname.id_subcategoria.options[7]=new Option("Técnicas", "8");
			break;
			case "2" :
			document.formname.id_subcategoria.options[0]=new Option("Geral", "9");
			document.formname.id_subcategoria.options[1]=new Option("Abuso de substâncias e vícios", "10");
			document.formname.id_subcategoria.options[2]=new Option("Controle da raiva", "11");
			document.formname.id_subcategoria.options[3]=new Option("Crescimnto pessoal", "12");
			document.formname.id_subcategoria.options[4]=new Option("Envelhecimento", "13");
			document.formname.id_subcategoria.options[5]=new Option("Gerenciamento de equipe", "14");
			document.formname.id_subcategoria.options[6]=new Option("Gerenciamento do stress", "15");
			document.formname.id_subcategoria.options[7]=new Option("Morte, tristeza, luto", "16");
			document.formname.id_subcategoria.options[8]=new Option("Motivacional e inspirador", "17");
			document.formname.id_subcategoria.options[9]=new Option("Sonhos", "18");
			break;
			case "3" :
			document.formname.id_subcategoria.options[0]=new Option("Geral", "19");
			document.formname.id_subcategoria.options[1]=new Option("Artistas, arquitetos, fotógrafos", "20");
			document.formname.id_subcategoria.options[2]=new Option("Aventureiros e exploradores", "21");
			document.formname.id_subcategoria.options[3]=new Option("Ciência e Tecnologia", "22");
			document.formname.id_subcategoria.options[4]=new Option("Cientistas sociais e psicólogos", "23");
			document.formname.id_subcategoria.options[5]=new Option("Compositores e músicos", "24");
			document.formname.id_subcategoria.options[6]=new Option("Criminosos e foras-da-lei", "25");
			document.formname.id_subcategoria.options[7]=new Option("Entretenimento e artes cênicas", "26");
			document.formname.id_subcategoria.options[8]=new Option("Esportes", "27");
			document.formname.id_subcategoria.options[9]=new Option("Histórico", "28");
			document.formname.id_subcategoria.options[10]=new Option("Literário", "29");
			document.formname.id_subcategoria.options[11]=new Option("Medicina", "30");
			document.formname.id_subcategoria.options[12]=new Option("Memórias pessoais", "31");
			document.formname.id_subcategoria.options[13]=new Option("Militar", "32");
			document.formname.id_subcategoria.options[14]=new Option("Mulheres", "33");
			document.formname.id_subcategoria.options[15]=new Option("Negócios", "34");
			document.formname.id_subcategoria.options[16]=new Option("Político", "35");
			document.formname.id_subcategoria.options[17]=new Option("Presidentes e chefes de Estado", "36");
			document.formname.id_subcategoria.options[18]=new Option("Realeza", "37");
			document.formname.id_subcategoria.options[19]=new Option("Religioso", "38");
			break;
			case "4" :
			document.formname.id_subcategoria.options[0]=new Option("Geral", "39");
			document.formname.id_subcategoria.options[1]=new Option("Aconselhamento", "40");
			document.formname.id_subcategoria.options[2]=new Option("Administração", "41");
			document.formname.id_subcategoria.options[3]=new Option("Educação especial", "42");
			document.formname.id_subcategoria.options[4]=new Option("Inglês", "43");
			document.formname.id_subcategoria.options[5]=new Option("Métodos e materias de ensino", "44");
			document.formname.id_subcategoria.options[6]=new Option("Política e reforma educacional", "45");
			document.formname.id_subcategoria.options[7]=new Option("Referência", "46");
			break;
			case "5" :
			document.formname.id_subcategoria.options[1]=new Option("Geral", "47");
			document.formname.id_subcategoria.options[2]=new Option("Alta tecnologia", "48");
			document.formname.id_subcategoria.options[3]=new Option("Aventura", "49");
			document.formname.id_subcategoria.options[4]=new Option("Contemporâneo", "50");
			document.formname.id_subcategoria.options[5]=new Option("Contos", "51");
			document.formname.id_subcategoria.options[6]=new Option("Épico", "52");
			document.formname.id_subcategoria.options[7]=new Option("Histórico", "53");
			document.formname.id_subcategoria.options[8]=new Option("Militar", "54");
			document.formname.id_subcategoria.options[9]=new Option("Paranormal", "55");
			document.formname.id_subcategoria.options[10]=new Option("Space Opera", "56");
			document.formname.id_subcategoria.options[11]=new Option("Vida Urbana", "57");
			break;
			case "6" :
			document.formname.id_subcategoria.options[0]=new Option("Geral", "58");
			document.formname.id_subcategoria.options[1]=new Option("Ação e Aventura", "59");
			document.formname.id_subcategoria.options[2]=new Option("Afro-americano", "60");
			document.formname.id_subcategoria.options[3]=new Option("Antologias (vários autores)", "61");
			document.formname.id_subcategoria.options[4]=new Option("Biográfico", "62");
			document.formname.id_subcategoria.options[5]=new Option("Clássicos", "63");
			document.formname.id_subcategoria.options[6]=new Option("Contos (único autor)", "64");
			document.formname.id_subcategoria.options[7]=new Option("Contos de fada, folclóricos, lendas e mitologia", "65");
			document.formname.id_subcategoria.options[8]=new Option("Crime", "66");
			document.formname.id_subcategoria.options[9]=new Option("Cristão", "67");
			document.formname.id_subcategoria.options[10]=new Option("Erótico", "68");
			document.formname.id_subcategoria.options[11]=new Option("Espionagem", "69");
			document.formname.id_subcategoria.options[12]=new Option("Fantasia", "70");
			document.formname.id_subcategoria.options[13]=new Option("Ficção científica", "71");
			document.formname.id_subcategoria.options[14]=new Option("Guerra e militares", "72");
			document.formname.id_subcategoria.options[15]=new Option("História alternativa", "73");
			document.formname.id_subcategoria.options[16]=new Option("Histórico", "74");
			document.formname.id_subcategoria.options[17]=new Option("Humorístico", "75");
			document.formname.id_subcategoria.options[18]=new Option("Jurídico", "76");
			document.formname.id_subcategoria.options[19]=new Option("Maioridade", "77");
			document.formname.id_subcategoria.options[20]=new Option("Medicina", "78");
			document.formname.id_subcategoria.options[21]=new Option("Mistério e detetive", "79");
			document.formname.id_subcategoria.options[22]=new Option("Mulheres contemporâneas", "80");
			document.formname.id_subcategoria.options[23]=new Option("Oculto e sobrenatural", "81");
			document.formname.id_subcategoria.options[24]=new Option("Político", "82");
			document.formname.id_subcategoria.options[25]=new Option("Psicológico", "83");
			document.formname.id_subcategoria.options[26]=new Option("Religioso", "84");
			document.formname.id_subcategoria.options[27]=new Option("Romances", "85");
			document.formname.id_subcategoria.options[28]=new Option("Sagas", "86");
			document.formname.id_subcategoria.options[29]=new Option("Suspense", "87");
			document.formname.id_subcategoria.options[30]=new Option("Tecnológico", "88");
			document.formname.id_subcategoria.options[31]=new Option("Terror", "89");
			document.formname.id_subcategoria.options[32]=new Option("Thrillers", "90");
			document.formname.id_subcategoria.options[33]=new Option("Vida familiar", "91");
			document.formname.id_subcategoria.options[34]=new Option("Vida urbana", "92");
			break;
			case "7" :
			document.formname.id_subcategoria.options[0]=new Option("Geral", "93");
			document.formname.id_subcategoria.options[1]=new Option("Bebidas", "94");
			document.formname.id_subcategoria.options[2]=new Option("História", "95");
			document.formname.id_subcategoria.options[3]=new Option("Ingredientes específicos", "96");
			document.formname.id_subcategoria.options[4]=new Option("Métodos", "97");
			document.formname.id_subcategoria.options[5]=new Option("Pratos", "98");
			document.formname.id_subcategoria.options[6]=new Option("Regional e étnico", "99");
			document.formname.id_subcategoria.options[7]=new Option("Saúde e cura", "100");
			break;
			case "História" :
			document.formname.id_subcategoria.options[0]=new Option("Geral", "101");
			document.formname.id_subcategoria.options[1]=new Option("África", "102");
			document.formname.id_subcategoria.options[2]=new Option("América Latina", "103");
			document.formname.id_subcategoria.options[3]=new Option("Américas", "104");
			document.formname.id_subcategoria.options[4]=new Option("Antiguidade", "105");
			document.formname.id_subcategoria.options[5]=new Option("Ásia", "106");
			document.formname.id_subcategoria.options[6]=new Option("Canadá", "107");
			document.formname.id_subcategoria.options[7]=new Option("Caribe e Índias Ocidentais", "108");
			document.formname.id_subcategoria.options[8]=new Option("Civilização", "109");
			document.formname.id_subcategoria.options[9]=new Option("Estados Unidos", "110");
			document.formname.id_subcategoria.options[10]=new Option("Europa", "111");
			document.formname.id_subcategoria.options[11]=new Option("Medieval", "112");
			document.formname.id_subcategoria.options[12]=new Option("Militar", "113");
			document.formname.id_subcategoria.options[13]=new Option("Moderno", "114");
			document.formname.id_subcategoria.options[14]=new Option("Mundo", "115");
			document.formname.id_subcategoria.options[15]=new Option("Oriente Médio", "116");
			break;
			case "Humor" :
			document.formname.id_subcategoria.options[0]=new Option("Geral", "117");
			document.formname.id_subcategoria.options[1]=new Option("Forma", "118");
			document.formname.id_subcategoria.options[2]=new Option("Tópico", "119");
			break;
			case "Infantil" :
			document.formname.id_subcategoria.options[0]=new Option("Geral", "120");
			document.formname.id_subcategoria.options[1]=new Option("Ação e Aventura", "121");
			document.formname.id_subcategoria.options[2]=new Option("Animais", "122");
			document.formname.id_subcategoria.options[3]=new Option("Ciência e Natureza", "123");
			document.formname.id_subcategoria.options[4]=new Option("Clássicos", "124");
			document.formname.id_subcategoria.options[5]=new Option("Contos de Fadas e folclore", "125");
			document.formname.id_subcategoria.options[6]=new Option("Esportes e lazer", "126");
			document.formname.id_subcategoria.options[7]=new Option("Família", "127");
			document.formname.id_subcategoria.options[8]=new Option("História", "128");
			document.formname.id_subcategoria.options[9]=new Option("Histórias de mistério e detetive", "129");
			document.formname.id_subcategoria.options[10]=new Option("Jogos e atividades", "130");
			document.formname.id_subcategoria.options[11]=new Option("Lendas, mitos e fábulas", "131");
			document.formname.id_subcategoria.options[12]=new Option("Questões sociais", "132");
			document.formname.id_subcategoria.options[13]=new Option("Referência", "133");
			document.formname.id_subcategoria.options[14]=new Option("Religião", "134");
			break;
			case "Mistério e suspense" :
			document.formname.id_subcategoria.options[0]=new Option("Geral", "135");
			document.formname.id_subcategoria.options[1]=new Option("Crime real", "136");
			document.formname.id_subcategoria.options[2]=new Option("Histórico", "137");
			document.formname.id_subcategoria.options[3]=new Option("Procedimento policial", "138");
			document.formname.id_subcategoria.options[4]=new Option("Suspense", "139");
			break;
			case "Negócios" :
			document.formname.id_subcategoria.options[0]=new Option("Geral", "140");
			document.formname.id_subcategoria.options[1]=new Option("Comércio eletrônico", "141");
			document.formname.id_subcategoria.options[2]=new Option("Comunicação corporativa", "142");
			document.formname.id_subcategoria.options[3]=new Option("Condições econômicas", "143");
			document.formname.id_subcategoria.options[4]=new Option("Contabilidade", "144");
			document.formname.id_subcategoria.options[5]=new Option("Desenvolvimento", "145");
			document.formname.id_subcategoria.options[6]=new Option("Economia", "146");
			document.formname.id_subcategoria.options[7]=new Option("Empreendedorismo", "147");
			document.formname.id_subcategoria.options[8]=new Option("Ética empresarial", "148");
			document.formname.id_subcategoria.options[9]=new Option("Finanças", "149");
			document.formname.id_subcategoria.options[10]=new Option("Finanças pessoais", "150");
			document.formname.id_subcategoria.options[11]=new Option("Gerenciamento", "151");
			document.formname.id_subcategoria.options[12]=new Option("Governo e Negócios", "152");
			document.formname.id_subcategoria.options[13]=new Option("História econômica", "153");
			document.formname.id_subcategoria.options[14]=new Option("Indústrias", "154");
			document.formname.id_subcategoria.options[15]=new Option("Internacional", "155");
			document.formname.id_subcategoria.options[16]=new Option("Liderança", "156");
			document.formname.id_subcategoria.options[17]=new Option("Marketing", "157");
			document.formname.id_subcategoria.options[18]=new Option("Motivacional", "158");
			document.formname.id_subcategoria.options[19]=new Option("Negociação", "159");
			document.formname.id_subcategoria.options[20]=new Option("Pequenas empresas", "160");
			document.formname.id_subcategoria.options[21]=new Option("Planejamento estratégico", "161");
			document.formname.id_subcategoria.options[22]=new Option("Profissões", "162");
			document.formname.id_subcategoria.options[23]=new Option("Publicidade e promoção", "163");
			document.formname.id_subcategoria.options[24]=new Option("Recursos humanos", "164");
			document.formname.id_subcategoria.options[25]=new Option("Seguros", "165");
			document.formname.id_subcategoria.options[26]=new Option("Tributação", "166");
			break;
			case "Poesia" :
			document.formname.id_subcategoria.options[0]=new Option("Geral", "167");
			document.formname.id_subcategoria.options[1]=new Option("Americano", "168");
			document.formname.id_subcategoria.options[2]=new Option("Caribenho e latino-americano", "169");
			break;
			case "Psicologia" :
			document.formname.id_subcategoria.options[0]=new Option("Geral", "170");
			document.formname.id_subcategoria.options[1]=new Option("Avaliação, teste e análise", "171");
			document.formname.id_subcategoria.options[2]=new Option("Capacidade criativa", "172");
			document.formname.id_subcategoria.options[3]=new Option("Desenvolvimento", "173");
			document.formname.id_subcategoria.options[4]=new Option("Educação e treinamento", "174");
			document.formname.id_subcategoria.options[5]=new Option("Movimentos", "175");
			document.formname.id_subcategoria.options[6]=new Option("Psicologia social", "176");
			document.formname.id_subcategoria.options[7]=new Option("Psicopatologia", "177");
			document.formname.id_subcategoria.options[8]=new Option("Psicoterapia", "178");
			document.formname.id_subcategoria.options[9]=new Option("Relações interpessoais", "179");
			document.formname.id_subcategoria.options[10]=new Option("Sexualidade humana", "180");
			break;
			case "Religião e espiritualidade" :
			document.formname.id_subcategoria.options[0]=new Option("Geral", "181");
			document.formname.id_subcategoria.options[1]=new Option("Ateísmo", "182");
			document.formname.id_subcategoria.options[2]=new Option("Biografia bíblica", "183");
			document.formname.id_subcategoria.options[3]=new Option("Budismo", "184");
			document.formname.id_subcategoria.options[4]=new Option("Comentário bíblico", "185");
			document.formname.id_subcategoria.options[5]=new Option("Cristianismo", "186");
			document.formname.id_subcategoria.options[6]=new Option("Crítica e interpretação", "187");
			document.formname.id_subcategoria.options[7]=new Option("Educação Cristão", "188");
			document.formname.id_subcategoria.options[8]=new Option("Espiritualidade", "189");
			document.formname.id_subcategoria.options[9]=new Option("Estudos bíblicos", "190");
			document.formname.id_subcategoria.options[10]=new Option("Ética", "191");
			document.formname.id_subcategoria.options[11]=new Option("Feriados", "192");
			document.formname.id_subcategoria.options[12]=new Option("Hinduísmo", "193");
			document.formname.id_subcategoria.options[13]=new Option("Igreja Cristão", "194");
			document.formname.id_subcategoria.options[14]=new Option("Islamismo", "195");
			document.formname.id_subcategoria.options[15]=new Option("Judaísmo", "196");
			document.formname.id_subcategoria.options[16]=new Option("Livros de orações", "197");
			document.formname.id_subcategoria.options[17]=new Option("Meditações bíblicas", "198");
			document.formname.id_subcategoria.options[18]=new Option("Ministério Cristão", "199");
			document.formname.id_subcategoria.options[19]=new Option("Práticas e rituais cristãos", "200");
			document.formname.id_subcategoria.options[20]=new Option("Referência bíblica", "201");
			document.formname.id_subcategoria.options[21]=new Option("Sermões", "202");
			document.formname.id_subcategoria.options[22]=new Option("Sexualidade", "203");
			document.formname.id_subcategoria.options[23]=new Option("Teologia", "204");
			document.formname.id_subcategoria.options[24]=new Option("Teologia cristã", "205");
			document.formname.id_subcategoria.options[25]=new Option("Vida cristã", "206");
			break;
			case "Romance" :
			document.formname.id_subcategoria.options[0]=new Option("Geral", "207");
			document.formname.id_subcategoria.options[1]=new Option("Contemporâneo", "208");
			document.formname.id_subcategoria.options[2]=new Option("Fantasia", "209");
			document.formname.id_subcategoria.options[3]=new Option("Histórico", "210");
			document.formname.id_subcategoria.options[4]=new Option("Paranormal", "211");
			document.formname.id_subcategoria.options[5]=new Option("Suspense", "212");
			break;
			default:
			document.formname.id_subcategoria.options[0]=new Option("Categoria")
			break;
		}
		return true;
	};
</script>-->
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

				<span class="mdl-layout-title">Novo Livro</span>
				<div class="mdl-layout-spacer"></div>
				<button class="mdl-button mdl-js-button mdl-button--icon" type="submit" name="submit" form="formname">
					<i class="material-icons">check</i>
				</button>
			</div>
		</header>

		<main class="mdl-layout__content">
			<div class="page-content">

				<form method="POST" class="mdl-grid" action="add_book.php" id="formname" name="formname" enctype="multipart/form-data">
					<div class="mdl-cell mdl-cell--12-col">
						<div class="demo-textfield mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
							<input class="mdl-textfield__input" type="text" id="titulo" name="titulo">
							<label class="mdl-textfield__label" for="titulo">Título</label>
						</div>
					</div>
					<div class="mdl-cell mdl-cell--12-col">
						<div class="demo-textfield mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
							<input class="mdl-textfield__input" type="text" id="autor" name="autor">
							<label class="mdl-textfield__label" for="autor">Autor</label>
						</div>

					</div>
					<div class="mdl-cell mdl-cell--12-col">
						<div class="demo-textfield mdl-textfield mdl-js-textfield">
							<textarea class="mdl-textfield__input" type="text" rows= "4" id="sinopse" name="sinopse"></textarea>
							<label class="mdl-textfield__label" for="sinopse">Sinopse</label>
						</div>
					</div>
					<div class="mdl-cell mdl-cell--12-col">
						<div class="demo-textfield mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
							<input class="mdl-textfield__input" type="text" id="editora" name="editora">
							<label class="mdl-textfield__label" for="editora">Editora</label>
						</div>
					</div>
					<div class="mdl-cell mdl-cell--12-col">
						<div class="demo-textfield mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
							<select class="mdl-textfield__input" type="text" name="id_categoria" id="id_categoria" onchange="dropdownlist(this.options[this.selectedIndex].value);">
								<option></option>
								<?php while($categoria = mysqli_fetch_array($query_categoria)) { ?>
								<option value="<?php echo $categoria['id'] ?>"><?php echo $categoria['nome'] ?></option>
								<?php } ?>
							</select>
							<label class="mdl-textfield__label" for="categoria">Categoria</label>
						</div>
					</div>
					<!--
					<div class="mdl-cell mdl-cell--12-col">
						<div class="demo-textfield mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
							<script type="text/javascript" language="JavaScript">
							document.write('<select class="mdl-textfield__input" name="id_subcategoria"><option value=""></option></select>')
							</script>
							<noscript><select name="id_subcategoria" id="id_subcategoria" >
								<option value="">Sub Categoria</option>
							</select>
						</noscript>
						<label class="mdl-textfield__label" for="editora">Sub Categoria</label>
					</div>
				</div>-->
				<div class="mdl-cell mdl-cell--6-col">
					<div class="demo-textfield mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
						<input class="mdl-textfield__input" type="text" id="pagina" name="pagina">
						<label class="mdl-textfield__label" for="pagina">Páginas</label>

					</div>
				</div>
				<div class="mdl-cell mdl-cell--6-col">
					<div class="demo-textfield mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" id="ano_lancamento" name="ano_lancamento">
						<label class="mdl-textfield__label" for="ano_lancamento">Ano de Lançamento</label>

					</div>
				</div>
				<div class="mdl-cell mdl-cell--12-col">
					<div class="demo-textfield mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-focused">
						<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
						<input class="mdl-textfield__input" name="capa" id="capa" type="file" placeholder="Capa" />
						<label class="mdl-textfield__label" for="capa">Capa</label>
					</div>
				</div>
			</form>
		</div>
	</main>
</div>
</body>
<script src="bower_components/material-design-lite/material.min.js"></script>

</html>
<script type="text/javascript">
$(document).ready(function() {
	$.getJSON('retornaAutor.php', function(data){
		var autores = [];

		$(data).each(function(key, value) {
			autores.push(value.nome);
		});

		$('#autor').autocomplete({ source: autores, minLength: 2});
	});
});
</script>