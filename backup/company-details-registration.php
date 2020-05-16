<!DOCTYPE html>
<html>
<?php 
$pageTitle="Reprezentant"; 
$description="Přidání nového obchoďáka."; 
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
				<section class="form">
					<h2>Přidání reprezentanta firmy</h2>
					<?php $status=""; require("company-details-form-send.php"); ?>
					<?php $id="";  require("company-details-form.php"); ?>
				</section>
			</main>
		</div>
		<?php require("block-footer.php") ?>
	</div>
</body>
</html>