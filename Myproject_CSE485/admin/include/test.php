<?php

$con=mysqli_connect("localhost","root","","cse485");
// Check connection
if (mysqli_connect_errno()){
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql="SELECT * from account where acc_usename='PhucPH'";
$result=mysqli_query($con,$sql);

// Numeric array
$row=mysqli_fetch_array($result,MYSQLI_NUM);
printf ("%s (%s)\n",$row[1],$row[2]);
$a=$row[1];
echo $a;
// Associative array
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
printf ("%s (%s)\n",$row["acc_id"],$row["acc_pass"]);

// Free result s

?>