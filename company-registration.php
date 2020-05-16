<!DOCTYPE html>
<html>
<?php 
$pageTitle="Řetězec"; 
$description="Přidání nového řetězce MERCHANDSISING."; 
?>
<?php require("prompts.php"); ?>
<?php require("block-head.php"); ?>
<body>
	<div class="page">
		<?php require_once("login-db.php") ?>
		<?php require_once("login.php") ?>
		<?php require_once("roles.php") ?>
		<?php $permArrayCurrent = array("mdg-pridani-obchodu"); ?>
		<?php require("block-header.php"); ?>
		<?php require("functions.php") ?>
		<?php $userStat = $_SESSION['stat']; ?>
		<div class="container">
			<main>
				<section class="form">
					<h2>Přidání řetězce</h2>
					<?php require("company-form-send.php"); ?>
					<?php $id=""; $valueCompanyPrice =""; require("company-form.php"); ?>
				</section>
			</main>
		</div>
		<?php require("block-footer.php") ?>
	</div>
</body>
</html>