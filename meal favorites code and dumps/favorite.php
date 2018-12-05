<?php
$conn = mysqli_connect ( 'localhost', 'Tan', '1234', 'meals' );
echo "Connected Successfully"."<br>";
echo '<html><form><input type="text" name="food"><input type="submit" name="fclick" value="Submit"></form></html>';
if(isset($_GET['fclick'])){
	$userRequest = $_GET['food'];
	echo "$userRequest is requested";
	$t1 = "SELECT * FROM meals.testmeals where mealMeal LIKE '%$userRequest%'";
	echo "<br>";
	$query = mysqli_query($conn,$t1);
	while($row  = mysqli_fetch_assoc($query))
		{
			$row_data['mealName'] = $row['mealMeal'];
			$row_data['mealImage'] = $row['mealMealThumb'];
			$row_data['mealCategory'] = $row['mealCategory'];
			$row_data['mealInstructions'] = $row['mealInstructions'];
			$row_data['mealArea'] = $row['mealArea'];
			$row_data['mealTags'] = $row['mealTags'];
			$mealIngredients = array($row['mealIngredient1'],
						$row['mealIngredient2'],
						$row['mealIngredient3'],
						$row['mealIngredient4'],
						$row['mealIngredient5'],
						$row['mealIngredient6'],
						$row['mealIngredient7'],
						$row['mealIngredient8'],
						$row['mealIngredient9'],
						$row['mealIngredient10'],
						$row['mealIngredient11'],
						$row['mealIngredient12'],
						$row['mealIngredient13'],
						$row['mealIngredient14'],
						$row['mealIngredient15'],
						$row['mealIngredient16'],
						$row['mealIngredient17'],
						$row['mealIngredient18'],
						$row['mealIngredient19'],
						$row['mealIngredient20']);
			$row_data['mealIngredients'] = $mealIngredients;
			$mealMeasure = array($row['mealMeasure1'],
						$row['mealMeasure2'],
						$row['mealMeasure3'],
						$row['mealMeasure4'],
						$row['mealMeasure5'],
						$row['mealMeasure6'],
						$row['mealMeasure7'],
						$row['mealMeasure8'],
						$row['mealMeasure9'],
						$row['mealMeasure10'],
						$row['mealMeasure11'],
						$row['mealMeasure12'],
						$row['mealMeasure13'],
						$row['mealMeasure14'],
						$row['mealMeasure15'],
						$row['mealMeasure16'],
						$row['mealMeasure17'],
						$row['mealMeasure18'],
						$row['mealMeasure19'],
						$row['mealMeasure20']);		     			        
			$row_data['mealMeasure'] = $mealMeasure;
			$row_data['mealSource'] = $row['mealSource'];
			print_r($row_data);
			echo '<html><form><input type="submit" name="favorite" value="Favorite"></form></html>';
			$f = $row_data['mealName'];
			if(isset($_GET['favorite'])){
				$t2 = "INSERT INTO meals.favorite VALUES('Tan','$f')";
				$query = mysqli_query($conn,$t2);
			}
		}
	echo "<br>";
}

?>