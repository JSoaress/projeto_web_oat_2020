<?php

require("config/config.php");
require("classes/conexao_bd.class.php");
require("classes/bebida.class.php");
require("classes/contato.class.php");

$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'inicio';
?>

<html>

  <head>
    <title>Projeto Web</title>

    <meta charset="utf-8" />

    <!-- CSS do Bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!-- CSS do projeto -->
    <link href="./css/estilo.css" rel="stylesheet">

  </head>

  <body>

    <!-- Container Principal do Site -->
    <div class="container">

      <!-- Cabeçalho -->
      <div id="header">

        <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <h1 class="display-4">Empório</h1>
            <p class="lead">Bebidas para todos os paladares</p>
          </div>
        </div>
        
      </div>

      <!-- Menu -->
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav">
            <li class="nav-item <?= ($pagina == 'inicio')?'active':'' ?>">
              <a class="nav-link" href="?pagina=inicio">Home</a>
            </li>
            <li class="nav-item <?= ($pagina == 'sobre')?'active':'' ?>">
              <a class="nav-link" href="?pagina=sobre">Sobre</a>
            </li>
            <li class="nav-item <?= ($pagina == 'bebidas')?'active':'' ?>">
              <a class="nav-link" href="?pagina=bebidas">Bebidas</a>
            </li>
            <li class="nav-item <?= ($pagina == 'contato')?'active':'' ?>">
              <a class="nav-link" href="?pagina=contato">Contato</a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Breadcrumbs -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <?php
            if($pagina == 'inicio') {
              echo '<li class="breadcrumb-item active" aria-current="page">Início</li>';
            } else{
              echo '<li class="breadcrumb-item" aria-current="page"><a href="?pagina=inicio">Início</a></li>';            
          
              if($pagina == 'sobre') {
                echo '<li class="breadcrumb-item active" aria-current="page">Sobre</li>';
              } else if($pagina == 'contato') {
                echo '<li class="breadcrumb-item active" aria-current="page">Contato</li>';
              } else if($pagina == 'bebidas') {
                echo '<li class="breadcrumb-item active" aria-current="page">Bebidas</li>';
              }

            }
          ?>
        </ol>
      </nav>

      <!-- Área Principal -->
      <div id="main">

        <?php

          include("./pages/$pagina.php");
        
        ?>

      </div>

      <!-- Rodapé -->
      <div id="footer">

      <div class="jumbotron jumbotron-fluid">
          <div class="container">
            <p>Programação e Design para Web</p>
            <p>João Vitor Soares de Farias&copy</p>
          </div>
        </div>

      </div>

  </div>

  <!-- Jquery -->
  <script src="./js/jquery-3.4.1.slim.min.js"></script>
  <!-- <script src="./js/jquery-3.4.1.slim.min.js"></script> -->
  
  <!-- Scripts JS do Bootstrap -->
  <script src="./js/popper.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>

  <!-- Scripts para mascaras de inputs -->
  <script src="./js/jquery.mask.min.js"></script>
  <script src="./js/mask.inputs.js"></script>

  </body>

</html>