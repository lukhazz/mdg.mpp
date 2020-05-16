<!DOCTYPE html>
<html>
<?php 
$pageTitle="Náhled uživatelů"; 
$description="Náhled uživatelů včetně patřičných práv."; 
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
		<div class="container min-h560">
			<main>
				<section>
					<h2>Hledat uživatele</h2>
					<?php require('user-form.php') ?>
					<?php //require('user-list.php') ?>
				</section>
			</main>
		</div>	
		<?php require('user-filter.php') ?>
		<?php require("block-footer.php") ?>
		<?php require('excel.php') ?>
	</div>
</body>
</html>