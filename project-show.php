<?php 

	$conn = dbConnect();
	mysqli_query($conn, "SET NAMES utf8");

	$sql = "SELECT id_mdg_project, nazev FROM mdg_project
			WHERE id_mdg_project > 0
			ORDER BY nazev";

	$data = mysqli_query($conn, $sql);

	$i = 0;
	$month = (int) date('m');
	$year = (int) date('Y');
	?>
		<!--<a href="	<?php echo 'product-edit.php?id=0' ; ?>		">
			<div class="square"><?php echo "VŠECHNY"; ?></div>
		</a>-->

	<?php
	while ( $row = mysqli_fetch_row($data) ) {
		$idChain = $row[0];
		$chainName = $row[1];
		?>
		<a href="	<?php echo 'product-edit.php?id=' . $idChain .''; ?>		">
			<div class="square"><?php echo "$chainName "; ?></div>
		</a>

		<?php

			//echo "$row[0] a $row[1]";
				



	}




	dbClose($conn);






 ?>