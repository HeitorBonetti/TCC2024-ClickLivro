<?php
$con=mysqli_connect("localhost","root","","registro");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$records="select * from livros";

if ($resultlivro=mysqli_query($con,$records))
  {
  // Return the number of rows in result set
  $rowcountlivro=mysqli_num_rows($resultlivro);
  // Free result set
  mysqli_free_result($resultlivro);
  }

  $livrosporpagina = 16;
  $pages = ceil($rowcountlivro / $livrosporpagina);

  mysqli_close($con);
  


  ?>
