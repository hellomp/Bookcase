<?php
require_once('header.php');
require_once('db_connect.php');
$query_ultimos_lidos = mysqli_query($dbc, "SELECT * FROM lido INNER JOIN livro ON (lido.id_livro = livro.id) ORDER BY lido.data DESC LIMIT 2")
or die (mysqli_error($dbc));
$query_ultimos_adicionados = mysqli_query($dbc, "SELECT * FROM livro ORDER BY data_registro DESC LIMIT 3")
or die (mysqli_error($dbc));

?>
<!-- Tabs -->
<div class="mdl-layout__tab-bar mdl-js-ripple-effect">
  <button class="mdl-layout__tab mdl-button mdl-js-button"  id="demo-menu-lower-left">Categorias <i class="material-icons">expand_more</i></button> 
  <a href="#fixed-tab-1" class="mdl-layout__tab is-active">Principal</a>
  <a href="#fixed-tab-2" class="mdl-layout__tab">Mais Lidos</a>
  <a href="#fixed-tab-3" class="mdl-layout__tab">Mais Recentes</a>
</div>
</header>
<div class="mdl-layout__drawer">
 <nav class="mdl-navigation">
  <?php 
  if(isset($_COOKIE['email'])){
    echo '<a class="mdl-navigation__link" href=""><i class="material-icons">account_circle</i>'. $_COOKIE['email'].'</a>';
    echo '<a class="mdl-navigation__link" href=""><i class="material-icons">view_week</i> Minha Estante</a>';
    echo '<a class="mdl-navigation__link" href=""><i class="material-icons">favorite</i> Lista de Desejos</a>';
    echo '<a class="mdl-navigation__link" href="add_book.php"><i class="material-icons">book</i> Novo Livro</a>';
    echo '<a class="mdl-navigation__link" href="logout.php"><i class="material-icons">exit_to_app</i> Sair</a>';
  }
  else{
    echo '<a class="mdl-navigation__link" href="login.php"><i class="material-icons">favorite</i> Login</a>';
  }
  ?>
</nav>

</div>
<main class="mdl-layout__content">
 <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
  <div class="page-content">
    <div class="mdl-grid">
      <h5 class="book-header">Últimos Lidos</h5>
    </div>
    <div class="mdl-grid">
      <?php while($livro = mysqli_fetch_array($query_ultimos_lidos)) { ?>
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
  <div class="mdl-grid">
      <h5 class="book-header">Adicionados Recentes</h5>
    </div>
    <div class="mdl-grid">
      <?php while($livro = mysqli_fetch_array($query_ultimos_adicionados)) { ?>
      <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col-phone">
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
          echo "<i class='material-icons md-12'>star_border</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
        }else if($avaliacao_media['nota_media']>0 & $avaliacao_media['nota_media']<1){
          echo "<i class='material-icons md-12'>star_half</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
        }else if($avaliacao_media['nota_media']==1){
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
        }else if($avaliacao_media['nota_media']>1 & $avaliacao_media['nota_media']<2){
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star_half</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
        }else if($avaliacao_media['nota_media']==2){
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
        }else if($avaliacao_media['nota_media']>2 & $avaliacao_media['nota_media']<3){
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star_half</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
        }else if($avaliacao_media['nota_media']==3){
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
        }else if($avaliacao_media['nota_media']>3 & $avaliacao_media['nota_media']<4){
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star_half</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
        }else if($avaliacao_media['nota_media']==4){
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star_border</i>";
        }else if($avaliacao_media['nota_media']>4 & $avaliacao_media['nota_media']<5){
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star_half</i>";
        }else if($avaliacao_media['nota_media']==5){
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star</i>";
          echo "<i class='material-icons md-12'>star</i>";
        } 
        ?>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
</section>
<section class="mdl-layout__tab-panel" id="fixed-tab-2">
  <div class="page-content"><!-- Your content goes here --></div>
</section>
<section class="mdl-layout__tab-panel" id="fixed-tab-3">
  <div class="page-content"><!-- Your content goes here --></div>
</section>
</main>
</div> 
</body>
<script src="bower_components/material-design-lite/material.min.js"></script>
<script src="bower_components/jquery/jquery.js"></script>

</html>