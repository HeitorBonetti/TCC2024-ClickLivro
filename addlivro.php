
<title>ClickLivro</title>
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

  <body>

   

  

</head>
<body id="bootstrap-overrides">

    <div class="topnav">
    <a href = "livros.php?page-nr=1" class="barraitems"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 2 16 16">
  <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
</svg>Voltar</a>

  <a style="float:right" class="barraitems" href=
              <?php    session_start();
               if (isset($_SESSION["username"])) {
                  echo ("logout.php");
                } else {
                  echo ("login.php");
                } ?>>        

          <?php
          if (isset($_SESSION["username"])) {
            echo ('<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 1 16 10">
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


<?php







   if (isset($_SESSION["id"])) {
  } else {
    header("location: cadUser.php");
  }
?>
<style>
  .column {
  float: left;
  width: 50%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
<form name="form1" action="biblioteca.controller.php?acao=inserir" method="post" enctype="multipart/form-data">

<?php
$nome = $_GET["nome"];
    $autor = $_GET["autor"];
    $paginas = $_GET["paginas"];
    $idioma = $_GET["idioma"];
    $editora = $_GET["editora"];
    $descricao = $_GET["descricao"];
    $imagem = $_GET["imagem"];
  $id_user = $_GET["id_user"];
  $id_livr = $_GET["id_livr"];
  $tipo = $_GET["tipo"];
  $pesquisa = $_GET["pesquisa"];
  ?>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body centralizar">
        <h2> Insira os Dados 

        
        </h2>
      </div>
      <div class="modal-body centralizar">
        
                                <select name='estado' class="form-control">
                                <option value="Lendo"> Lendo </option>
                                <option value="Quero Ler"> Quero Ler </option>
                                <option value="Abandonado">  Abandonei </option>

                                </select>
                                <input type="number" max="<?= $paginas;?>" min="0" name="lidas" class="form-control" placeholder="Páginas Lidas" >
                                
</div>
      <div class="modal-footer centralizar">
        
        <button type="submit" class="aumentativo btn btn-primary" style="background-color:#5D5B93;">Adicionar</button>
      </div>
    </div>
  </div>
</div>



<input type="hidden" name="nome" value="<?= $nome;?>" >
<input type="hidden" name="autor" value="<?= $autor;?>" >
<input type="hidden" name="paginas" value="<?= $paginas;?>" >
<input type="hidden" name="idioma" value="<?= $idioma;?>" >
<input type="hidden" name="editora" value="<?= $editora;?>" >
<input type="hidden" name="descricao" value="<?= $descricao;?>" >
<input type="hidden" name="imagem" value="<?= $imagem;?>" >
<input type="hidden" name="id_livr" value="<?= $id_livr;?>" >
<input type="hidden" name="id_user" value="<?= $id_user;?>" >
<input type="hidden" name="tipo" value="<?= $tipo;?>" >
<input type="hidden" name="pesquisa" value="<?= $pesquisa;?>" >
<input type="hidden" name="save" value="<?php if (isset($_GET['save']))echo($_GET['save']);?>">

<div class="jumbotron"></div>

    <div class="container-fluid">
        
        
    <div class="content  centralizar ">

    <div class="col-md-3" style="width:400px; ">

    <img width="400px"; height="600px"; src="imgLivros/<?= $imagem ?>">

    <div style="display:flex">
    </form>
    <button type="button" class="btn btn-primary centralizar" style="background-color: #557bad; width:300px; border-radius:0px; font-weight:bold;" data-toggle="modal" data-target="#exampleModal">
    
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 1 16 16">
  <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
</svg>  Adicionar na Biblioteca</button></h1> 


<form name="form2" action="biblioteca.controller.php?acao=inserirlido" method="post" enctype="multipart/form-data" style="width:100px; margin-block-end: 0em;">

<input type="hidden" name="nome" value="<?= $nome;?>" >
<input type="hidden" name="autor" value="<?= $autor;?>" >
<input type="hidden" name="paginas" value="<?= $paginas;?>" >
<input type="hidden" name="idioma" value="<?= $idioma;?>" >
<input type="hidden" name="editora" value="<?= $editora;?>" >
<input type="hidden" name="descricao" value="<?= $descricao;?>" >
<input type="hidden" name="imagem" value="<?= $imagem;?>" >
<input type="hidden" name="id_livr" value="<?= $id_livr;?>" >
<input type="hidden" name="id_user" value="<?= $id_user;?>" >
<input type="hidden" name="tipo" value="<?= $tipo;?>" >
<input type="hidden" name="pesquisa" value="<?= $pesquisa;?>" >
<input type="hidden" name="save" value="<?php if (isset($_GET['save'])) echo($_GET['save']);?>">

    <button type="submit" class=" btn btn-success centralizar" style="background-color:#27C95E; width:100px;  border-radius:0px; font-weight:bold;"> Já Li  
    
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 1 20 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
</svg></button></h1> 
</div>
    </div>
</form>
    
    <div class="col-md-5">
    <h1 style="font-weight:bold;"><?= $nome?> 
    <h3 style="font-weight:bold;"><?=$autor?></h3>
    <br>
   



    <h3 style="font-weight:bold;">Sinopse</h3>
    <h4 class="text-justify"> <?= $descricao?> </h5>

    <br><br>

    <div class = "centralizar row">
    
    <div></div>
    <div class="card-header detalhes">
    <h5 class="" style="text-align:center; font-weight:bold;">Páginas
    <h5 class=""><i class="bi bi-book centralizar"></i>
    <h5 class="" style="text-align:center; font-weight:bold;"><?=$paginas?>
    </div>

    
    <div class="card-header detalhes">
    <h5 class="" style="text-align:center; font-weight:bold;">Idioma
    <h5 class=""><i class="bi bi-globe centralizar"></i>
    <h5 class="" style="text-align:center; font-weight:bold;"><?=$idioma?>
    </div>

    <div class="card-header detalhes">
    <h5 class="" style="text-align:center; font-weight:bold;">Editora
    <h5 class=""><i class="bi bi-building centralizar"></i>
    <h5 class="" style="text-align:center; font-weight:bold;"><?=$editora?>
    </div>

    </div>

    <br>
    <br>
    

    
    </div>

    </div>

<!-- Modal -->



</div>
</div>
</div> 

