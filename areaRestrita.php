<?php
$acao = 'recuperarrestrita';
    require_once 'livro.controller.php';

?>

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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<html> 
  
<head> 
  <style> 
    .fixTableHead { 
      overflow-y: auto; 
      height: 750px; 
    } 
    .fixTableHead thead th { 
      position: sticky; 
      top: -0.5; 
    } 
    table { 
    width:100% 
    } 


td{
    max-width:150px;
    word-wrap:break-word;

    


}

    th { 
        background: #557bad; 
        border: 2px solid #557bad; 

        height:30px;
        text-align:center;
    } 


    /* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #7877AB;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #7877AB;
}
  </style> 

<div class="topnav"><a href = "index.php" class="barraitems"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 2 16 16">
  <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
</svg>Voltar</a>
<a href="cadLivro.php" class="barraitems">Cadastro de Livros</a>
</div>


    <div class="container-fluid">
        
        <div class="content first-content" style="display: flex;
    align-items: center;
    flex-wrap: wrap;
    flex-direction: column;
    justify-content: center;">
        <h1 style="    margin-bottom: -20px"></h1>
<hr>
<div class="second-column" >

<div class="fixTableHead"> 
<table class="table">
    

    
 <thead>
    
    <tr>
    <th scope="col">
            Imagem
        </th>
    <th scope="col">
            Nome
        </th>

        <th scope="col">
            Autor
        </th>
        <th scope="col">
            Páginas
        </th>
        <th scope="col"   >
            Idioma
        </th>
        <th scope="col">
            Editora
        </th>

        
        <th scope="col" >
           Funções

        </th>

    </tr>

</div>
 </thead>
<?php foreach ($livro as $key => $livro) {?>

 <tbody>
    <tr>
    <td><img src="imgLivros/<?= $livro->imagem?>" width="70" height="95"></td>
        <td ><?= $livro->nome?></td>
        <td><?= $livro->autor?></td>
        <td><?= $livro->paginas?></td>
        <td><?= $livro->idioma?></td>
        <td><?= $livro->editora?></td>
        
        
        <td><br><a class="btn-primary btn " style="background-color:557bad" href="cadLivro.php?metodo=alterar&id=<?= $livro->id?>"> <i class="bi bi-clipboard-plus"></i></a>
        <a class="btn-danger btn " href="cadLivro.php?metodo=excluir&id=<?= $livro->id?>"> <i class="bi bi-trash"></i></a></td>
    </tr>
 </tbody>
</div>
</div>
</body>
<?php }?>
</table>
</div>

<div class="centralizar" style="margin-bottom:-15px; margin-top: -15px;">
  <ul class="pagination">

  <?php
	         if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1){
            ?> <li><a style="background-color:#333; color:#557bad; border-radius:5px;" href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>">«</a></li> <?php
         }else{
            ?> <li ><a style="background-color:#333; color:#557bad; border-radius:5px;">«</a></li>	<?php
         }
  ?>


         <?php 
            if(!isset($_GET['page-nr'])){
               ?> <li><a style="background-color:#333; color:#fff; border-radius:5px;" href="?page-nr=1">1</a></li> <?php
               $count_from = 2;
            }else{
               $count_from = 1;
            }
         ?>
         
         <?php
            for ($num = $count_from; $num <= $pagesrestrita; $num++) {
               if($num == @$_GET['page-nr']) {
                  ?><li> <a style="background-color:#333; color:#fff; border-radius:5px;" href="?page-nr=<?php echo $num ?>"><?php echo $num ?></a> </li><?php
               }else{
                  ?> <li><a style="background-color:#333; color:#fff; border-radius:5px;" href="?page-nr=<?php echo $num ?>"><?php echo $num ?></a></li> <?php
               }
            }
         ?>


    <?php
	         if(isset($_GET['page-nr']) && $_GET['page-nr'] < $pagesrestrita){
            ?> <li><a style="background-color:#333; color:#557bad; border-radius:5px;" href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">»</a></li> <?php
         }else { if(isset($_GET['page-nr']) && $_GET['page-nr'] = '') 
            ?> <li><a style="background-color:#333; color:#557bad; border-radius:5px;">»</a></li>	<?php
         }
  ?>
    <div>
        </ul>