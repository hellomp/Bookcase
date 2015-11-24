<!doctype html>
<?php
include_once('db_connect.php');
if(!isset($_COOKIE['id'])){
  header("Location: login.php");
}
$query_desejo = mysqli_query($dbc, "SELECT * FROM desejo INNER JOIN livro ON (desejo.id_livro = livro.id) WHERE desejo.id_usuario = '{$_COOKIE['id']}' ORDER BY desejo.data DESC")
or die (mysqli_error($dbc));
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
        <span class="mdl-layout-title">
          Lista de Desejos
        </span>
        <div class="mdl-layout-spacer"></div>
      </div>
    </header>

    <main class="mdl-layout__content">
       <div class="page-content">
      <div class="mdl-grid">
        <?php while($livro = mysqli_fetch_array($query_desejo)) { ?>
        <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col-phone">
          <a href="show_book.php?id=<?= $livro['id'] ?>" class="card-link"></a>
          <div class="wrapper">
            <div class="demo-card mdl-card__title" style="background: url('<?=$livro['capa']?>') center / cover;">
            </div>
          </div>
          <div class="mdl-card__supporting-text">
           <div class="book-title"><?=$livro['titulo']?></div>
           <div class="book-subtitle"><?=$livro['autor']?></div>
         </div>
         <div class="mdl-card__actions mdl-card--border">
          <?php
          $query_rate = mysqli_query($dbc,"SELECT AVG(avaliacao.nota) nota_media
            FROM avaliacao INNER JOIN livro ON (avaliacao.id_livro = livro.id) WHERE id_livro = '{$livro['id']}'");
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
      <?php } ?>
    </div>
  </div>
    </main>
  </div>
</body>
<script src="bower_components/material-design-lite/material.min.js"></script>

</html>