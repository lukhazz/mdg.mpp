<?php require_once("prompts.php") ?>
<?php //require("form-maker-default-values.php"); ?>
<?php

		$odpoved = "Nápověda pro promotérky";
?>

<!DOCTYPE html>
<html>
<?php 
$pageTitle="Zobrazit akci"; 
$description="Zobrazit akci"; 
?>
<?php require("prompts.php"); ?>
<?php require("block-head.php"); ?>
<link rel="stylesheet" href="<?php echo "$crm_link"; ?>/css/lightbox.css">

<body>
	<div class="page">
		<?php require_once("login-db.php") ?>
		<?php require_once("login.php") ?>
		<?php require_once("roles.php") ?>
		<?php $permArrayCurrent = array("mdg-pristup"); ?>
		<?php $permArrayTemp = array("mdg-editace-udalosti"); checkPermByIdMdg($permArrayTemp); ?>
		<?php require("block-header.php"); ?>
		<?php require("functions.php") ?>
		<?php //require("functions.php") ?>
		<?php 
			$userStatTemp = $_SESSION['stat'];
			$mena = "Kč,";
			if ($userStatTemp=="sk") {
				$mena = "&euro;";
			}
			?>


		<div class="container">
			<main>
				<section class="form">
					<h2>Zobrazit akci</h2>
					<?php require("form-maker-default-values.php"); ?>
					<?php if (!empty($messageSuccess)) { echo '<div class="message-success">'.$messageSuccess.'</div>';	} ?>
					<?php if (!empty($messageError))   { echo '<div class="message-error">'.$messageError.'</div>';	} ?>

					<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="register" class="form-maker clearfix">
						
						<?php //require("../country.php"); ?>
						<br>
						<?php require("event-show-products-count.php"); ?>
						<?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?id=$id";  ?>
						<?php $counterProductsAdditional = 0; ?>
						<?php $disabled = "disabled "; $show = "show"; 
							$timeFromToArray[0] = $timeFromToArray[1] = $timeFromToArray[2] = $timeFromToArray[3] = $id = $pharmacy = $usersKoo = $form = $users = $company = $status = $goal = $time = $timeFromTo = $pause = $hours = $tradesman = ""; $bonus = 200; $revision = false; ?>

						<?php require("event-form-summary.php"); ?><br>
						<?php require("event-form-desc.php"); ?><br>
						<?php require("event-show-products-data.php"); ?>
						<?php 
							if (get_browser_name($_SERVER['HTTP_USER_AGENT'])=="Firefox") {
								?>
								<input type="button" class="per100" onclick="tableToExcel('products', 'Objednavka')" value="Export do Excelu">
								<?php
							}
							else {
								?>
								<a download="<?php echo date("ymd"); ?>_MPP_MCHD_objednavky.xls" href="#" onclick="return ExcellentExport.excel(this, 'products', 'Objednavka');"><input type="button" class="per100 black" value="Export do Excelu"></a><br>
								<?php
							}
						 ?>
						<?php require("event-form-products.php"); ?>
						<?php require("event-form-show-images.php"); ?>
						<?php dbClose($conn); // Odpojíme se z DB ?>
					</form>
				</section>
			</main>
		</div>	
		<script src="<?php echo "$crm_link"; ?>/js/lightbox.js"></script>
		<?php require("block-footer.php") ?>
		<?php require('excel.php') ?>
	</div>
</body>
</html>

<?php


// connect to the database

require_once("login-db.php");

?>



