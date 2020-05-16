<?php 

	$id = $_GET['id'];

	/*$sql = "SELECT COUNT(id_mdg_product)
			FROM mdg_product
			WHERE id_mdg_project = $id
				AND zobrazit = 'ano'
				";*/

	$sql = "SELECT COUNT(id_mdg_product) FROM mdg_product
		INNER JOIN mdg_events
			ON mdg_product.id_mdg_project=mdg_events.id_mdg_project
		WHERE mdg_events.id_mdg_event=$id 
			AND mdg_product.zobrazit = 'ano' 
		ORDER BY mdg_product.vyrobek";
	$conn = dbConnect();
	mysqli_query($conn, "SET NAMES utf8");

	//echo "$sql<br>";

	$data = mysqli_query($conn, $sql);
	$radek = mysqli_fetch_row($data);
	$counterProducts = $radek[0];
	//echo "<br>Produktů je: $counterProducts<br>";


 ?>