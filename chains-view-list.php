<?php 

	$conn = dbConnect();
	mysqli_query($conn, "SET NAMES utf8");

	$error = false;
	$messageError = "";
	$messageSuccess = "";

	
	if (!empty($_GET['id'])) {
		$id = $_GET['id'];
	}
	else {
		$id = "0";
	}

	if (!empty($_GET['project'])) {
		$project = $_GET['project'];
	}
	else {
		$project = "0";
	}

	$sql = "SELECT id_mdg_company, nazev FROM mdg_company
			WHERE id_mdg_company = $id";

	if ($id == 0) {
		$sql = "SELECT id_mdg_company, nazev FROM mdg_company
			WHERE id_mdg_company > $id";
	}
	//else if ($project==0 && $id > 0) {
	//	$sql = "SELECT id_mdg_company, nazev FROM mdg_company
	//		WHERE id_mdg_company = $id AND id_mdg_project > $project";
	//}
	//else if ($project > 0 && $id > 0) {
	//	$sql = "SELECT id_mdg_company, nazev FROM mdg_company
	//		WHERE id_mdg_company > $id AND id_mdg_project > $project";
	//}
	//else {
	//	$sql = "SELECT id_mdg_company, nazev FROM mdg_company
	//		WHERE id_mdg_company = $id AND id_mdg_project = $project";
	//} 

	//echo "$sql<br>";
	

	$data = mysqli_query($conn, $sql);
	$row = mysqli_fetch_row($data);

	$idChain = $row[0];
	$chainName = $row[1];



	dbClose($conn); // Odpojíme se z DB

?>