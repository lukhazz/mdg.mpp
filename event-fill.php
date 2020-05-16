<?php //require("form-maker-default-values.php"); ?>
<?php

		$odpoved = "Nápověda pro promotérky";
?>

<!DOCTYPE html>
<html>
<?php 
$pageTitle="Vyplnit akci"; 
$description="Vyplnit akci"; 
?>
<?php require("prompts.php"); ?>
<?php require("block-head.php"); ?>

<body>
	<div class="page">
		<?php require_once("login-db.php") ?>
		<?php require_once("login.php") ?>
		<?php require_once("roles.php") ?>
		<?php $permArrayCurrent = array("mdg-pristup"); ?>
		<?php $permArrayTemp = array("mdg-pridani-udalosti"); checkPermByIdMdg($permArrayTemp); ?>
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
					<h2>Vyplnit akci</h2>
					<?php require("form-maker-default-values.php"); ?>
					<?php if (!empty($messageSuccess)) { echo '<div class="message-success">'.$messageSuccess.'</div>';	} ?>
					<?php if (!empty($messageError))   { echo '<div class="message-error">'.$messageError.'</div>';	} ?>

					<form action="<?php $_SERVER['PHP_SELF'] ?>" onsubmit="return checkFile();" method="post" enctype="multipart/form-data" name="register" class="clearfix">
						
						<?php //require("../country.php"); ?>
						<br>
						<?php require("event-form-products-count.php"); ?>
						<?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?id=$id";  ?>
						<?php $revision_link = 'http://'.$_SERVER['HTTP_HOST']."/event-revision.php?id=$id"; ?>
						<?php $disabled = ""; $show = "fill"; $counterProductsAdditional = 0; ?>
						<?php $fill = true; $timeFromToArray[0] = $timeFromToArray[1] = $timeFromToArray[2] = $timeFromToArray[3] = $id = $pharmacy = $usersKoo = $form = $users = $company = $status = $goal = $time = $timeFromTo = $pause = $hours = $tradesman = ""; $bonus = 200; $img_required = "required" ?>
						<?php require("event-form-summary.php"); ?><br>
						<?php require("event-form-desc.php"); ?><br>
						<?php require("event-form-products-data.php"); ?>
						<?php require("event-form-products.php"); ?><br><br>
						<?php require("event-form-images.php"); ?>
						<br>
						<br>
						<input type="submit" name="makeform" id="makeform" value="Uložit formulář">
					</form>
				</section>
			</main>
		</div>	
		<?php require("block-footer.php") ?>
	</div>
</body>
</html>

<?php


// connect to the database

require_once("login-db.php");

?>



