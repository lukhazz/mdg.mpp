<!DOCTYPE html>
<html>
<?php 
$pageTitle="Domů"; 
$description="MEDICAL & PHARMA PROMOTION, s.r.o. - MERCHANDISING"; 
?>
<?php require("prompts.php"); ?>
<?php require("block-head.php"); ?>
<body>
	<div class="page">
		<?php require_once("login-db.php") ?>
		<?php require_once("login.php") ?>
		<?php require_once("roles.php") ?>
		<?php $permArrayViewOthers = array("mdg-pristup"); ?>
		<?php $permArrayAccess = array("mdg-pristup"); ?>
		<?php $permArray = array("mdg-pristup"); ?>
		<?php require("block-header.php"); ?>
		<?php require("functions.php") ?>
		<?php 
			if (isset($_GET['ms'])) {
				$messageSuccess = $_GET['ms'];
			}
			if (isset($_GET['me'])) {
				$messageError = $_GET['me'];
			}
		?>
		<div class="container">
			<main>
				<section>
					<?php if (!empty($messageSuccess)) { echo '<br><br><div class="message-success">'.$messageSuccess.'</div>';	} ?>
					<?php if (!empty($messageError))   { echo '<br><br><div class="message-error">'.$messageError.'</div>';	} ?>

					<!--<h2><?php //echo $_SESSION['jmeno']." ".$_SESSION['prijmeni']; ?></h2>-->
					<?php //echo "<h2>".$_SESSION['stat']."</h2>"; ?>
					<?php //require('chains-show.php'); ?>
					<!--<h2>Kalendář akcí</h2>-->
					<?php //require('project-homepage-show.php'); ?>
					<?php require('chains-view-list.php'); ?>
					<!--<h2><?php //echo "$chainName"; ?></h2>-->
					<?php require('chains-view-calendar.php'); ?>
					<div class="flex space">
						<div class="padd-4 center grey-bg per100">Nepřiřazená akce</div>
						<div class="padd-4 center red-bg per100">Nesplněná akce</div>
						<div class="padd-4 center orange-bg per100">Splněná, ale neschválená akce</div>
						<div class="padd-4 center green-bg per100">Splněná a schválená akce</div>
					</div>

					<?php require('block-my-actions.php'); ?><br>
					<?php //require('../block-my-actions.php'); ?>
				</section>
			</main>
		</div>	
		<?php require("block-footer.php") ?>
	</div>
</body>
</html>