<!DOCTYPE html>
<html>
<?php 
$pageTitle="Seznam reprezentantů"; 
$description="Seznam reprezentantů a možnost jejich úpravy."; 
?>
<?php require("prompts.php"); ?>
<?php require("block-head.php"); ?>
<body>
	<div class="page">
		<?php require_once("login-db.php") ?>
		<?php require_once("login.php") ?>
		<?php require_once("roles.php") ?>
		<?php require("block-header.php"); ?>
		<?php require("functions.php") ?>
		<?php $userStat = $_SESSION['stat']; ?>
		<div class="container">
			<main>
				<section>
					<h2>Vyhledat reprezentanta firmy</h2>
					<?php //require('company-details-list.php') ?>
					<?php require('company-details-view-form.php') ?>
				</section>
			</main>
		</div>	
		<?php require("company-details-filter.php") ?>
		<?php require("block-footer.php") ?>
	</div>
</body>
</html>