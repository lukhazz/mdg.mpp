<?php 

	$id = $_GET['id'];

	$sql = "SELECT COUNT(id_mdg_product)
			FROM mdg_product
			WHERE id_mdg_project = $id
				";
	$conn = dbConnect();
	mysqli_query($conn, "SET NAMES utf8");

	//echo "$sql<br>";

	$data = mysqli_query($conn, $sql);
	$radek = mysqli_fetch_row($data);
	$counterProducts = $radek[0];
	//echo "<br>Produktů je: $counterProducts<br>";


 ?>