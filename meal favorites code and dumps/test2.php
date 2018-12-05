<?php
include 'DB.php';
 
$conn = OpenCon();
echo "Connected Successfully"."<br>";
$t = "SELECT * FROM meals.favorite"; 
$q = mysqli_query($conn,$t);
while ($row = mysqli_fetch_assoc($q)){
	echo implode($row,", ")."<br>";
}
CloseCon($conn);
 
?>