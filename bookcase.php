<?php
require_once('db_connect.php');
if(!isset($_COOKIE['id'])){
  header("Location: login.php");
}
$query_estante = mysqli_query($dbc, "SELECT * FROM tenho INNER JOIN livro ON (tenho.id_livro = livro.id) WHERE tenho.id_usuario = '{$_COOKIE['id']} 'ORDER BY tenho.data DESC")
or die (mysqli_error($dbc));
$query_favoritos = mysqli_query($dbc, "SELECT * FROM favorito INNER JOIN livro ON (favorito.id_livro = livro.id) WHERE favorito.id_usuario = '{$_COOKIE['id']} 'ORDER BY favorito.data DESC")
or die (mysqli_error($dbc));
$query_lidos = mysqli_query($dbc, "SELECT * FROM lido INNER JOIN livro ON (lido.id_livro = livro.id) WHERE lido.id_usuario = '{$_COOKIE['id']} 'ORDER BY lido.data DESC")
or die (mysqli_error($dbc));
?>
<!doctype html>
<html lang="en">
<head>
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
</head>
<body class="mdl-demo mdl-color--grey-100">
 <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect"
 for="demo-menu-lower-left">
 <li class="mdl-menu__item"><a class="mdl-navigation__link" href="show_books_category.php?id_categoria=1">Artes</a></li>
 <li class="mdl-menu__item"><a class="mdl-navigation__link" href="show_books_category.php?id_categoria=2">Autoajuda</a></li>
 <li class="mdl-menu__item"><a class="mdl-navigation__link" href="show_books_category.php?id_categoria=3">Biografia e memórias</a></li>
 <li class="mdl-menu__item"><a class="mdl-navigation__link" href="show_books_category.php?id_categoria=4">Educação</a></li>
 <li class="mdl-menu__item"><a class="mdl-navigation__link" href="show_books_category.php?id_categoria=5">Ficção científica e fantasia</a></li>
 <li class="mdl-menu__item"><a class="mdl-navigation__link" href="show_books_category.php?id_categoria=6">Ficção e literatura</a></li>
 <li class="mdl-menu__item"><a class="mdl-navigation__link" href="show_books_category.php?id_categoria=7">Gastronomia</a></li>
 <li class="mdl-menu__item"><a class="mdl-navigation__link" href="show_books_category.php?id_categoria=8">História</a></li>
 <li class="mdl-menu__item"><a class="mdl-navigation__link" href="show_books_category.php?id_categoria=9">Humor</a></li>
 <li class="mdl-menu__item"><a class="mdl-navigation__link" href="show_books_category.php?id_categoria=10">Infantil</a></li>
 <li class="mdl-menu__item"><a class="mdl-navigation__link" href="show_books_category.php?id_categoria=11">Mistério e suspense</a></li>
 <li class="mdl-menu__item"><a class="mdl-navigation__link" href="show_books_category.php?id_categoria=12">Negócios</a></li>
 <li class="mdl-menu__item"><a class="mdl-navigation__link" href="show_books_category.php?id_categoria=13">Poesia</a></li>
 <li class="mdl-menu__item"><a class="mdl-navigation__link" href="show_books_category.php?id_categoria=14">Psicologia</a></li>
 <li class="mdl-menu__item"><a class="mdl-navigation__link" href="show_books_category.php?id_categoria=15">Religião e espiritualidade</a></li>
 <li class="mdl-menu__item"><a class="mdl-navigation__link" href="show_books_category.php?id_categoria=16">Romance</a></li>

</ul>
<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-tab">
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Bookcase</span>
      <div class="mdl-layout-spacer"></div>
      <a href="search_book.php" class="mdl-button mdl-js-button mdl-button--icon">
        <i class="material-icons">search</i>
      </a>
    </div>
    <!-- Tabs -->
    <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
      <button class="mdl-layout__tab mdl-button mdl-js-button"  id="demo-menu-lower-left">Categorias <i class="material-icons">expand_more</i></button> 
      <a href="#fixed-tab-1" class="mdl-layout__tab is-active">Minha Estante</a>
      <a href="#fixed-tab-2" class="mdl-layout__tab">Favoritos</a>
      <a href="#fixed-tab-3" class="mdl-layout__tab">Lidos</a>
    </div>
  </header>
  <div class="mdl-layout__drawer">
    <?php 
    if(isset($_COOKIE['email'])){
      echo '<span class="menu-title-drawer mdl-layout-title">';
      echo '<h7 class="menu-title">'. $_COOKIE['nome'].'</h7>';
      echo '<a class="mdl-navigation__link menu-subtitle" href="">'. $_COOKIE['email'].'</a>';
      echo '</span>';
    }
    ?>
    <nav class="mdl-navigation">
      <?php 
      if(isset($_COOKIE['email'])){
        echo '<a class="mdl-navigation__link" href="index.php"><i class="material-icons">home</i>Home</a>';
        echo '<a class="mdl-navigation__link" href="bookcase.php"><i class="material-icons">border_all</i>Minha Estante</a>';
        echo '<a class="mdl-navigation__link" href="wish_list.php"><i class="material-icons">bookmark</i>Lista de Desejos</a>';
        echo '<a class="mdl-navigation__link" href="add_book.php"><i class="material-icons">book</i>Novo Livro</a>';
        echo '<a class="mdl-navigation__link" href=""><i class="material-icons">account_circle</i>Editar Perfil</a>';
        echo '<a class="mdl-navigation__link" href="logout.php"><i class="material-icons">exit_to_app</i>Sair</a>';
      }
      else{
        echo '<a class="mdl-navigation__link" href="login.php"><i class="material-icons">favorite</i>Login</a>';
      }
      ?>
    </nav>

  </div>
  <main class="mdl-layout__content">
   <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
    <div class="page-content">
      <div class="mdl-grid">
        <?php while($livro = mysqli_fetch_array($query_estante)) { ?>
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
</section>
<section class="mdl-layout__tab-panel" id="fixed-tab-2">
  <div class="page-content">
    <div class="mdl-grid">
      <?php while($livro = mysqli_fetch_array($query_favoritos)) { ?>
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
</section>
<section class="mdl-layout__tab-panel" id="fixed-tab-3">
 <div class="page-content">
  <div class="mdl-grid">
    <?php while($livro = mysqli_fetch_array($query_lidos)) { ?>
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
</section>
</main>
</div> 
</body>
<script src="bower_components/material-design-lite/material.min.js"></script>
<script src="bower_components/jquery/jquery.js"></script>

</html>