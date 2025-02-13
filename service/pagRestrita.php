<?php
$con=mysqli_connect("localhost","root","","registro");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$recordsrestrita="select * from livros";

if ($resultrestrita=mysqli_query($con,$recordsrestrita))
  {
  // Return the number of rows in result set
  $rowcountrestrita=mysqli_num_rows($resultrestrita);
  // Free result set
  mysqli_free_result($resultrestrita);
  }

  $livrosporarea = 6;
  $pagesrestrita = ceil($rowcountrestrita / $livrosporarea);

  mysqli_close($con);
  


  ?>
