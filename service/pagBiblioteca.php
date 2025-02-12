<?php
$con=mysqli_connect("localhost","root","","registro");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $iduser = $_SESSION['id'];
/*$recordstd="select * from livros_biblioteca where id_user = '$iduser'";*/
$recordsli="select * from livros_biblioteca where id_user = '$iduser' and estado = 'Lido'";
$recordsle="select * from livros_biblioteca where id_user = '$iduser' and estado = 'Lendo'";
$recordsql="select * from livros_biblioteca where id_user = '$iduser' and estado = 'Quero Ler'";
$recordsab="select * from livros_biblioteca where id_user = '$iduser' and estado = 'Abandonado'";

/*if ($resulttd=mysqli_query($con,$recordstd))
  {
  // Return the number of rows in result set
  $rowcounttd=mysqli_num_rows($resulttd);
  // Free result set
  mysqli_free_result($resulttd);
  }*/

  if ($resultli=mysqli_query($con,$recordsli))
  {
  // Return the number of rows in result set
  $rowcountli=mysqli_num_rows($resultli);
  // Free result set
  mysqli_free_result($resultli);
  }

  if ($resultle=mysqli_query($con,$recordsle))
  {
  // Return the number of rows in result set
  $rowcountle=mysqli_num_rows($resultle);
  // Free result set
  mysqli_free_result($resultle);
  }

  if ($resultql=mysqli_query($con,$recordsql))
  {
  // Return the number of rows in result set
  $rowcountql=mysqli_num_rows($resultql);
  // Free result set
  mysqli_free_result($resultql);
  }

  if ($resultab=mysqli_query($con,$recordsab))
  {
  // Return the number of rows in result set
  $rowcountab=mysqli_num_rows($resultab);
  // Free result set
  mysqli_free_result($resultab);
  }

  $livrosporbiblioteca = 6;
  /*$pages = ceil($rowcounttd / $livrosporbiblioteca);*/
  $pagesli = ceil($rowcountli / $livrosporbiblioteca);
  $pagesle = ceil($rowcountle / $livrosporbiblioteca);
  $pagesql = ceil($rowcountql / $livrosporbiblioteca);
  $pagesab = ceil($rowcountab / $livrosporbiblioteca);

  mysqli_close($con);
  


  ?>
