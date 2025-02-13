<!doctype html>
<html lang="pt-br">
  

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

   
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <title>ClickLivro</title>
  </head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="sweetalert2.min.js"></script>
 </head>
 <body>

   

  


<body id="bootstrap-overrides">

 <div class="topnav">
 <img src="fotos/logo.png" style="width:50px; height:50px; float:left; margin: 0px 10px 0px 5px">
  <a class="active">Início</a>
  <a href="livros.php?page-nr=1" class="barraitems">Catálogo de Livros</a>
  <a href="biblioteca.php?acao=recuperarlido&page-nr=1" class="barraitems">Biblioteca</a>

<?php
$acao = "recuperarrecomendado";
require 'livro.controller.php';
if (isset($_SESSION["username"])) { 
  if ($_SESSION["username"] == "ADMIN") {
  echo (
  '<a href="areaRestrita.php" class="barraitems">Área Restrita</a>');}}?>


  <a style="float:right" class="barraitems" href=
              <?php      
               if (isset($_SESSION["username"])) {
                  echo ("logout.php");
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


    <?php 
          if (isset($_SESSION["username"])) {
            echo ('<a style="float:right; margin-right:-1rem;" class="nomeusuario"> '.$_SESSION["username"].'<br/>     </a>'   );
          }?>

    </div>
  </div>
 </div>
 <div class="jumbotron"></div>
 



    <div class="container">
      <div class="row">
      <div class="col-md-4">
          <div class="card aumentativo">
           <a href="livrosnovos.php"> <img src="imgLivros/herdeirodastrevas.jpg" class="card-img-top" alt="Novos Lançamentos">
        </a><div class="card-body" style="background-color: #557bad; color: #fff">
              <h5 class="titulocat" color="#fff">Novos Lançamentos</h5>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card aumentativo">
            <a href="livrosfamosos.php"><img src="imgLivros/percyjacksoneoladraoderaios.jpg" class="card-img-top" alt="Títulos Famosos">
        </a> <div class="card-body" style="background-color: #557bad; color: #fff">
              <h5 class="titulocat" color="#fff">Títulos Famosos</h5>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
        <a href="livrosclassicos.php"><div class="card  aumentativo ">
        <img src="imgLivros/medoclassico.jpg" class=" card-img-top" alt="Relendo os Clássicos">
        </a> <div class="card-body" style="background-color: #557bad; color: #fff">
              <h5 class="titulocat" color="#fff">Relendo os Clássicos</h5>
              
            </div>
          </div>
        </div>

      </div>
    </div>


      <h2 class="noti">Para Você</h2>
      <section>
    <div class="container">
      <div class="row centralizar">

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
  <input type="hidden" name="save" value="1">  
  <input type="hidden" name="pesquisa" value="2">  
  <input type="hidden" name="tipo" value="index">

          <div class="card" style="border-color:white; border-width:3px;">
          <form method="get" action="addlivro.php">
            <input type="image" src="imgLivros/<?= $livro->imagem;?>" class="teste aumentativo">
        </form>
        </div>
        <?php }?>

        </div>
      </div>
    </div>
  </section> 

</div>
<footer>
<div class="footer">

  <div class="col-1">
    <h3>LINKS</h3><br>
    <a href="#about">Sobre</a>
    <a href="#contact">Contato</a>
    <a href="#forum">Fórum</a> 
</div>

<div class="col-10">
<h3>NOTÍCIAS</h3>
<form>
  <input type="text" placeholder="E-Mail" class="erro">
  <br><br>
  <button type="submit" class="t12">INSCREVER-SE</button>
</form>
</div>

<div class="col-1-1">
<h3> CONTATO </h3><br>
<p>Rua XYZ, 123<br>São Joaquim da Barra, SP</p>


<div class="socials">
<li><a href="#facebook"><i-4x class="fa fa-facebook"></i></a>
<a href="#twitter"><i-4x class="fa fa-twitter"></i></a>
<a href="#instagram"><i-4x class="fa fa-instagram"></i></a>
<a href="#youtube"><i-4x class="fa fa-youtube"></i></a>
<a href="#linkedin"><i-4x class="fa fa-linkedin-square"></i></a></li>
</div>
</div>

</footer>
<div class="footer-bottom">
            <p><a href="#privacy-policy">Política de Privacidade</a><br>&copy;2024 ClickLivro - Todos os Direitos Reservados.</p>
        </div>

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

      </body>
      </html>