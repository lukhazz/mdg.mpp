<?php 

	$conn = dbConnect();
	mysqli_query($conn, "SET NAMES utf8");


	if (!empty($_GET['project'])) {
		$project = $_GET['project'];
	}
	else {
		$project = "0";
	}

	$sql = "SELECT id_mdg_company, nazev FROM mdg_company
			WHERE id_mdg_company > 0
			ORDER BY nazev";

	$data = mysqli_query($conn, $sql);

	$i = 0;
	$month = (int) date('m');
	$year = (int) date('Y');
	?>
		<a href="	<?php echo 'chains-view.php?id=0&project=' . $project . '&month=' . $month . '&year=' . $year . ''; ?>		">
			<div class="square"><?php echo "VŠECHNY"; ?></div>
		</a>

	<?php
	while ( $row = mysqli_fetch_row($data) ) {
		$idChain = $row[0];
		$chainName = $row[1];
		?>
		<a href="	<?php echo 'chains-view.php?id=' . $idChain . '&project=' . $project . '&month=' . $month . '&year=' . $year . ''; ?>		">
			<div class="square"><?php echo "$chainName "; ?></div>
		</a>

		<?php

			//echo "$row[0] a $row[1]";
	}

	dbClose($conn);






 ?>