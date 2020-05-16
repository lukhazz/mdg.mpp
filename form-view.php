<!DOCTYPE html>
<html>
<?php 
$pageTitle="Projekty"; 
$description="MEDICAL & PHARMA PROMOTION, s.r.o. - Merchandising"; 
?>
<?php require("prompts.php"); ?>
<?php require("block-head.php"); ?>
<body>
	<div class="page">
		<?php require_once("login-db.php") ?>
		<?php require_once("login.php") ?>
		<?php require_once("roles.php") ?>
		<?php //$permArrayViewOthers = array("../nahled-akci"); ?>
		<?php require("block-header.php"); ?>
		<?php require("functions.php") ?>
		<div class="container">
			<main>
				<section>
					<h2>Projekty</h2>
					<!--<h2><?php //echo $_SESSION['jmeno']." ".$_SESSION['prijmeni']; ?></h2>-->
					<?php //echo "<h2>".$_SESSION['stat']."</h2>"; ?>
					<?php require('project-show.php'); ?>
					<?php //require('../block-my-actions.php'); ?>
				</section>
			</main>
		</div>	
		<?php require("block-footer.php") ?>
	</div>
</body>
</html>