<!DOCTYPE html>
<html>
<?php 
$pageTitle="Událost"; 
$description="Přidání události."; 
?>
<?php require("prompts.php"); ?>
<?php require("block-head.php"); ?>
<body>
	<div class="page">
		<?php require_once("login-db.php") ?>
		<?php require_once("login.php") ?>
		<?php require_once("roles.php") ?>
		<?php $permArrayViewOthers = $permArrayCurrent = array("mdg-pridani-udalosti"); ?>
		<?php require("block-header.php"); ?>
		<?php require("functions.php") ?>
		<?php $userStat = $_SESSION['stat']; ?>
		<div class="container min-h500">
			<main>
				<section class="form">
					<?php 
					if (isset($_GET['id'])) {
						$id = (int)  ($_GET['id'] ? $_GET['id'] : "0"); 

						$sql = "SELECT mdg_company.id_mdg_company, mdg_company.stat, mdg_company.nazev
									FROM mdg_company
									WHERE id_mdg_company = $id
									";
						$conn = dbConnect();
						mysqli_query($conn, "SET NAMES utf8");
						$data = mysqli_query($conn, $sql);
						$radek = mysqli_fetch_row($data);
						$nazev = $radek[2];
					}
					
						
						$idUser = "1";
						$idUserKoo = "1";
						$timeArray[0] = $timeArray[1] = $timeArray[2] = $timeArray[3] = "";

					?>
					<h2>Přidání události <?php if (!empty($nazev)){ echo "pro $nazev";} ?></h2>
					<?php require("event-form-send.php"); ?>
					<?php 
						if(!empty($_GET['day'])) {$day = (int)  ($_GET['day'] ? $_GET['day'] : date('d')); } else { $day = date('j'); }
						if(!empty($_GET['month'])) {$month = (int) ($_GET['month'] ? $_GET['month'] : date('m')); } else { $month = date('n'); }
						if(!empty($_GET['year'])) {$year = (int)  ($_GET['year'] ? $_GET['year'] : date('Y')); } else { $year = date('Y'); }
						if(!empty($_GET['project'])) {$project = (int)  ($_GET['project'] ? $_GET['project'] : "0"); } else { $project = 0; }
						if(!empty($_GET['id'])) {$id = (int)  ($_GET['id'] ? $_GET['id'] : "0"); } else { $id = 0; }
					 ?>
					<?php $id=""; require("event-form.php"); ?>
				</section>
			</main>
		</div>
		<?php require("block-footer.php") ?>
	</div>
</body>
</html>