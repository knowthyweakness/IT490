<?php
include 'DB.php'; 

$conn = OpenCon(); 
$t1 = "SELECT * FROM meals.testmeals";
echo "Connected Successfully"."<br>";
echo "<br>";
$q = mysqli_query($conn,$t1);
while ($row = mysqli_fetch_assoc($q)){
	echo implode($row," * ")."<br>";//prints all the values of an array in one string
	$f = $row['mealMeal'];
	echo "$f is stored";
	echo '<html><form><input type="submit" name="favorite" value="Favorite"></form></html>';
	
	if(isset($_GET['favorite'])){
		$t2 = "INSERT INTO meals.favorite VALUES('Tan','$f')";
		$q = mysqli_query(mysqli_connect("localhost", "Tan", "1234", "meals"),$t2);
    }
	echo "<br>";
}
echo '<html><form><input type="submit" name="close" value="Close SQL Connection"></form></html>';
	
if(isset($_GET['close'])){
    CloseCon($conn);
	echo "Connection Closed";
    }

?>