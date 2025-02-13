<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="sweetalert2.min.js"></script>


<?php 

?>



<?php

$acao  = $_GET['acao'];
/*if(isset($_POST['todos'])){$acao = 'recuperartodos';}*/
if(isset($_POST['lido'])){$acao = 'recuperarlido'; }
if(isset($_POST['lendo'])){$acao = 'recuperarlendo'; }
if(isset($_POST['queroler'])){$acao = 'recuperarqueroler'; }
if(isset($_POST['abandonado'])){$acao = 'recuperarabandonado'; }



require 'biblioteca.controller.php';
if (isset($_SESSION["id"])) {
} else {
  header("location: cadUser.php");
}

?>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


    <title>ClickLivro</title>
  </head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>



<div class="topnav">
  <img src="fotos/logo.png" style="width:50px; height:50px; float:left; margin: 0px 10px 0px 5px">
  <a href="index.php" class="barraitems">Início</a>
  <a href="livros.php?page-nr=1" class="barraitems">Catálogo de Livros</a>
  <a class="active">Biblioteca</a>

  <?php ;
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
            echo ('<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 -2 16 16">
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
  

 

  <style> 

td{
    max-width:150px;
    word-wrap:break-word;
    
    


}

    th { 
        background: #557bad; 
        border: 2px solid #557bad; 
        text-align:center;
        color: white;
        height:30px;
    } 

  </style> 
    <div class="container-fluid">
        
        <div class="content first-content" style="display: flex;
    align-items: center;
    flex-wrap: wrap;
    flex-direction: column;
    justify-content: center;">
<br>

<div class="second-column" >

<div class="fixTableHead"> 

<table class="table">
    
<div class="centralizar">

    <!-- <input type="submit" class="botaocategoria" name="todos" value="Todos" /> -->

    <a  <?php if($acao !== 'recuperarlido') {echo('href="biblioteca.php?acao=recuperarlido&page-nr=1"');}?> class="botaocategoria <?php if($acao == 'recuperarlido') {echo('roxo');}?>" >Lidos</a>

    <a  <?php if($acao !== 'recuperarlendo') {echo('href="biblioteca.php?acao=recuperarlendo&page-nr=1"');}?> class="botaocategoria <?php if($acao == 'recuperarlendo') {echo('roxo');}?>" >Lendo</a>

    <a  <?php if($acao !== 'recuperarqueroler') {echo('href="biblioteca.php?acao=recuperarqueroler&page-nr=1"');}?> class="botaocategoria <?php if($acao == 'recuperarqueroler') {echo('roxo');}?>" >Quero Ler</a>

    <a  <?php if($acao !== 'recuperarabandonado') {echo('href="biblioteca.php?acao=recuperarabandonado&page-nr=1"');}?> class="botaocategoria <?php if($acao == 'recuperarabandonado') {echo('roxo');}?>" >Abandonei</a>


  </div>
    
 <thead>

    <tr>

    <th scope="col"> Capa </th>
      <th scope="col"> Nome </th>
      <th scope="col"> Autor </th>
      <th scope="col"> Páginas </th>
      <th scope="col"> Estado </th>
      <th scope="col"> Nota </th>
      <th scope="col"> Funções </th>


    </tr>

</div>
 </thead>
<?php 


foreach ($biblioteca as $key => $biblioteca) {
  if ($biblioteca->id_user == $_SESSION["id"]) {
  ?>

  

<tbody>
    <tr>
        <td><img src="imgLivros/<?= $biblioteca->imagem?>" class="aumentativasso" width="70" height="95"></td>
        <td ><?=  $biblioteca->nome?></td>
        <td><?= $biblioteca->autor?></td>
        <td style="text-align:center;"><?= $biblioteca->lidas?>/<?=$biblioteca->paginas?><br><?php echo(round($biblioteca->lidas/$biblioteca->paginas*100))?>%</td>
        <td><?= $biblioteca->estado?></td>
        <td><?= $biblioteca->notas?></td>  
        <td><a class="aumentativo btn-primary btn " style="background-color:557bad" data-toggle="modal" data-target="#modal<?=$biblioteca->id?>"> <i class="bi bi-clipboard-plus"></i></a>

        <button type="submit" value="Excluir" class="aumentativo btn-danger btn " data-toggle="modal" data-target="#excluirModal<?=$biblioteca->id?>"> <i class="bi bi-trash"></i></input></button>

        <form name="exclusao" action="biblioteca.controller.php?acao=excluir" method="post" enctype="multipart/form-data">
<input type="hidden" name="save" value="<?= $acao?>" >

<div class="modal fade" id="excluirModal<?=$biblioteca->id?>" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-body centralizar">
<h2> Tem Certeza? </h2>
</div>
<div class="modal-body centralizar" style="display: flex;flex-wrap: nowrap; align-items: baseline;">
<input type="hidden" name="idcar" value="<?=$biblioteca->id?>" >
<button type="submit" class="aumentativo btn btn-danger">Excluir
</button>
</form>
<button type="button" class="aumentativo btn btn-secondary" style="background-color:#5D5B93; color:white; margin-top:10px; margin-left:10px" data-dismiss="modal" data-target="#excluirModal">Cancelar</button>
</div>

</div>
</div>
</div> 

        
</td>

<form name="alteracao" action="biblioteca.controller.php?acao=alterar" method="post" enctype="multipart/form-data">

<input type="hidden" name="idcar" value="<?=$biblioteca->id?>" >
<input type="hidden" name="save" value="<?= $acao?>" >

<div class="modal" id="modal<?=$biblioteca->id?>" tabindex="-1" role="dialog" >
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-body centralizar">
<h2><?=$biblioteca->nome?></h2>
</div>
<div class="modal-body centralizar">

                        <select name='estado' class="form-control">
                        <option value="Lido"  <?php if($biblioteca->estado == "Lido") {echo('selected');} ?> >  Lido </option>
                        <option value="Lendo" <?php if($biblioteca->estado == "Lendo") {echo('selected');} ?>> Lendo </option>
                        <option value="Quero Ler" <?php if($biblioteca->estado == "Quero Ler") {echo('selected');}  ?>> Quero Ler </option>
                        <option value="Abandonado" <?php if($biblioteca->estado == "Abandonado") {echo('selected');}  ?>> Abandonei </option>
                        </select>
                        <input type="number" max="<?= $biblioteca->paginas;?>" min="0" name="lidas" class="form-control" placeholder="Páginas Lidas" value="<?=$biblioteca->lidas?>">
                        <input type="number" max="10" min="0" name="notas" class="form-control" placeholder="Nota (0-10)" value="<?=$biblioteca->notas?>">
</div>
<div class="modal-footer centralizar">

<button type="submit" class="aumentativo btn btn-primary" style="background-color:#5D5B93;">Adicionar</button>
</div>
</div>
</div>
</div> 
</form>



    </tr>
 </tbody>


 
 <?php }
}?>
</div>
</div>
 


</body>




</table>



</div>

<div class="centralizar" style="margin-bottom:-15px; margin-top: -15px;">
  <ul class="pagination">

  <?php

if($acao == 'recuperarlido') { 
  $pagest = $pagesli;
};
if($acao == 'recuperarlendo') { 
  $pagest = $pagesle;
};
if($acao == 'recuperarqueroler') { 
  $pagest = $pagesql;
};
if($acao == 'recuperarabandonado') { 
  $pagest = $pagesab;
};


	         if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){
            ?> <li><a style="background-color:#333; color:#557bad; border-radius:5px;" href="?acao=<?php echo $acao ?>&page-nr=<?php echo $_GET['page-nr'] - 1 ?>">«</a></li> <?php
         }else{
            ?> <li ><a style="background-color:#333; color:#557bad; border-radius:5px;">«</a></li>	<?php
         }
  ?>


         <?php 
            if(!isset($_GET['page-nr'])){
               ?> <li><a style="background-color:#333; color:#fff; border-radius:5px;" href="?acao=<?php echo $acao ?>&page-nr=1">1</a></li> <?php
               $count_from = 2;
            }else{
               $count_from = 1;
            }
         ?>
         
         <?php
            for ($num = $count_from; $num <= $pagest; $num++) {
               if($num == @$_GET['page-nr']) {
                  ?><li> <a style="background-color:#333; color:#fff; border-radius:5px;" href="?acao=<?php echo $acao ?>&page-nr=<?php echo $num ?>"><?php echo $num ?></a> </li><?php
               }else{
                  ?> <li><a style="background-color:#333; color:#fff; border-radius:5px;" href="?acao=<?php echo $acao ?>&page-nr=<?php echo $num ?>"><?php echo $num ?></a></li> <?php
               }
            }
         ?>


    <?php
	         if(isset($_GET['page-nr']) && $_GET['page-nr'] < $pagest){
            ?> <li><a style="background-color:#333; color:#557bad; border-radius:5px;" href="?acao=<?php echo $acao ?>&page-nr=<?php echo $_GET['page-nr'] + 1 ?>">»</a></li> <?php
         }else { if(isset($_GET['page-nr']) && $_GET['page-nr'] = '') 
            ?> <li><a style="background-color:#333; color:#557bad; border-radius:5px;">»</a></li>	<?php
         }
  ?>
    <div>
        </ul>

     

        


