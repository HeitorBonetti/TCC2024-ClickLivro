<?php
$acao = "recuperarnovos";
require 'livro.controller.php';

?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

   
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="sweetalert2.min.js"></script>

    <title>ClickLivro</title>
  </head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>

<body style="background-color:#fff;">

<div class="topnav">
  <img src="fotos/logo.png" style="width:50px; height:50px; float:left; margin: 0px 10px 0px 5px">
  <a href="index.php" class="barraitems">Início</a>
  <a class="active">Catálogo de Livros</a>
  <a href="biblioteca.php?acao=recuperarlido&page-nr=1" class="barraitems">Biblioteca</a>

  <a style="float:right" class="barraitems" href=
              <?php   
               if (isset($_SESSION["username"])) {
                echo ('logout.php');
                } else {
                  echo ("login.php");
                } ?>>        

          <?php
          if (isset($_SESSION["username"])) {
            echo ('<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 1 16 16">
            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
          </svg>');
          } else {
            echo ("Cliente<br/>");
          } ?></a>

<a style="float:right;" class="nomeusuario">          
    <?php 
          if (isset($_SESSION["username"])) {
            echo ("" . "{$_SESSION["username"]}" . "<br/>");
          }?></a>

    </div>
  </div>
 </div>

 <br><br>
 
  <div class="container-fluid centralizar" style="width:100%">


    <?php foreach ($livro as $indice => $livro) { ?>
    
      <form method="get" action="addlivro.php">
    <input type="hidden" name="nome" value="<?= $livro->nome;?>">
    <input type="hidden" name="autor" value="<?= $livro->autor;?>">
    <input type="hidden" name="paginas" value="<?= $livro->paginas;?>">
    <input type="hidden" name="idioma" value="<?= $livro->idioma;?>">
    <input type="hidden" name="editora" value="<?= $livro->editora;?>">
    <input type="hidden" name="descricao" value="<?= $livro->descricao;?>">
    <input type="hidden" name="imagem" value="<?= $livro->imagem;?>">
    <input type="hidden" name="id_user" value="<?= $id_user;?>">
    <input type="hidden" name="id_livr" value="<?= $livro->id;?>">
    <input type="hidden" name="pesquisa" value="2">  
    <input type="hidden" name="tipo" value="novos">
  

      <div class="col-md-4" style="width:230px">
          <div class="card aumentativo" style=" width:220px; margin-bottom:10px; background-color:#ededed; ">
          <button type="submit" style="padding:0; border-width:0; border-radius:0; margin:0;"><img src="imgLivros/<?= $livro->imagem  ?>" alt="..." class="livroimagem"></button>
            <div class="livrobody" ></div>
              <p></p>
              <h4 class="card-title" style="height:40px; "><?=$livro->nome?></h3>
              <h5 class="card-title " style="text-align:center;"><?= $livro->autor?>       
  </h4>
              
              
              
            
          </div>
        </div>
        </form>

<?php
   }
  
  
?>

<?php   if (isset($_GET['alert'])) {
    if ($_GET['alert'] == 'erro') {
    echo('<script>
    Swal.fire({
      title: "Oops! :(",
      text: "Você ja tem esse livro na sua Biblioteca.",
      icon: "error",
      timer: 5000
    });
    </script>');
   }else{
    echo('<script>
    Swal.fire({
      title: "Concluído",
      text: "O livro foi adicionado com sucesso!",
      icon: "success",
      timer: 5000
    });
    </script>');
   }}  ?>

   </div>

</body>
</html>