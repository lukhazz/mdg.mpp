<!DOCTYPE html>
<html>
<?php 
$pageTitle="Kalendář"; 
$description="MEDICAL & PHARMA PROMOTION, s.r.o. - Merchandising"; 
?>
<?php require("prompts.php"); ?>
<?php require("block-head.php"); ?>
<body>
	<div class="page">
		<?php require_once("login-db.php") ?>
		<?php require_once("login.php") ?>
		<?php require_once("roles.php") ?>
		<?php $permArrayViewOthers = array("mdg-pristup"); ?>
		<?php require("block-header.php"); ?>
		<?php require("functions.php") ?>
		<div class="container">
			<main>
				<section>
					<?php require('chains-view-list.php'); ?>
					<!--<h2><?php //echo "$chainName"; ?></h2>-->
					<?php require('chains-view-calendar.php'); ?>
					<div class="flex space">
						<div class="padd-4 center grey-bg per100">Nepřiřazená akce</div>
						<div class="padd-4 center red-bg per100">Nesplněná akce</div>
						<div class="padd-4 center orange-bg per100">Splněná, ale neschválená akce</div>
						<div class="padd-4 center green-bg per100">Splněná a schválená akce</div>
					</div>
				</section>
			</main>
		</div>	
		<?php require("block-footer.php") ?>
	</div>
</body>
</html>