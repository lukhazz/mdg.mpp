<!DOCTYPE html>
<html>
<?php 
$pageTitle="Oprávnění"; 
$description="Uživatel nemá oprávnění k navštívení této stránky."; 
?>
<?php require("prompts.php"); ?>
<?php require("block-head.php"); ?>
<body>
	<div class="page">
		<?php require_once("login-db.php") ?>
		<?php //require_once("login.php") ?>
		<?php //require_once("roles.php") ?>
		<?php //$permArrayViewOthers = array("nahled-akci"); ?>
		<?php require("functions.php") ?>
		<?php //require("block-header.php"); ?>
		<?php require("block-header-old.php"); ?><br><br>
		<?php require("block-menu-user.php"); ?>
		<div class="container">
			<main>
				<section>
					<h2>Nedostatek oprávnění</h2>
					<p>Omlouváme se, ale nemáte dostatečná oprávnění k&nbsp;zobrazení této stránky. Konaktujte prosím svého nadřízeného.</p>
				</section>
			</main>
		</div>	
		<?php require("block-footer.php") ?>
	</div>
</body>
</html>