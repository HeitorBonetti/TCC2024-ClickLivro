<?php
$con=mysqli_connect("localhost","root","","registro");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$records="select * from produtos";

if ($result=mysqli_query($con,$records))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  // Free result set
  mysqli_free_result($result);
  }

  $livrosporpagina = 12;
  $pages = ceil($rowcount / $livrosporpagina);

  mysqli_close($con);
  


  ?>
