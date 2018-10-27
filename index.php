<?php
include "autoloader.php";
?>

<html>
	<head>
		<title>PHP Klasifikasi kNN</title>
		<style type="text/css">
			.textbox{
				display: block;
			}
		</style>
	</head>
	<body>
		<h2>PHP Klasifikasi kNN pada Iris Dataset</h2>

		<form method="GET" action="">
			<div class="textbox">
				Sepal Length
				<input type="text" name="sepal-length">	
			</div>
			<div class="textbox">
				Sepal Width
				<input type="text" name="sepal-width">
			</div>
			<div class="textbox">
				Petal Length
				<input type="text" name="petal-length">
			</div>
			<div class="textbox">
				Petal Width
				<input type="text" name="petal-width">
			</div>

			<input type="submit" name="submit" value="Cari!">
		</form>
		<?php
		$datacsv = array_map('str_getcsv', file('dataset/iris.csv'));
		$csv = array_slice($datacsv, 0, 150);

		if (!empty($_GET['submit'])) {
			$knn = new Klasifikasi($csv);
			$knn->slice(70);
			$datatest = array(
				array(
					$_GET['sepal-length'], 
					$_GET['sepal-width'], 
					$_GET['petal-length'], 
					$_GET['petal-width'])
			);
			switch ($knn->knearest($datatest, 5, 4)) {
				case 'Iris-setosa':
					echo '<img height="250px" width="250px" src="img/setosa.jpg">';
					break;
				case 'Iris-versicolor':
					echo '<img height="250px" width="250px" src="img/versicolor.jpg">';
					break;
				case 'Iris-virginica':
					echo '<img height="250px" width="250px" src="img/virginica.jpg">';
					break;
				default:
					break;
			}
			echo "<h3>Bunga ini adalah " . $knn->knearest($datatest, 5, 4) . "</h3>";

		}
		?>
	</body>
</html>