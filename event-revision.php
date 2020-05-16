<?php require_once("prompts.php") ?>
<?php //require("form-maker-default-values.php"); ?>
<?php

		$odpoved = "Nápověda pro promotérky";
?>

<!DOCTYPE html>
<html>
<?php 
$pageTitle="Zkontrolvat akci"; 
$description="Zkontrolvat akci"; 
?>
<?php require("prompts.php"); ?>
<?php require("block-head.php"); ?>
<link rel="stylesheet" href="<?php echo "$crm_link"; ?>/css/lightbox.css">

<body>
	<div class="page">
		<?php require_once("login-db.php") ?>
		<?php require_once("login.php") ?>
		<?php require_once("roles.php") ?>
		<?php $permArrayCurrent = array("mdg-editace-pridani-obchodu"); ?>
		<?php require("block-header.php"); ?>
		<?php require("functions.php") ?>
		<?php $permArrayCurrent = array("editace-firem-formularu"); ?>
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
					<h2>Zkontrolovat akci</h2>
					<?php require("form-maker-default-values.php"); ?>
					<?php if (!empty($messageSuccess)) { echo '<div class="message-success">'.$messageSuccess.'</div>';	} ?>
					<?php if (!empty($messageError))   { echo '<div class="message-error">'.$messageError.'</div>';	} ?>

					<form action="<?php $_SERVER['PHP_SELF'] ?>" onsubmit="return checkFile();" method="post" enctype="multipart/form-data" name="register" class="clearfix">
						
						<?php //require("../country.php"); ?>
						<br>
						<?php require("event-show-products-count.php"); ?>
						<?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?id=$id";  ?>
						<?php $counterProductsAdditional = 0; ?>
						<?php $revision = true; $disabled = "disabled "; $show = "fill"; 
							$additional = $timeFromToArray[0] = $timeFromToArray[1] = $timeFromToArray[2] = $timeFromToArray[3] = $id = $pharmacy = $usersKoo = $form = $users = $company = $status = $goal = $time = $timeFromTo = $pause = $hours = $tradesman = ""; $bonus = 200; $img_required = ""; $valueActiveCheck 		="checked=\"checked\"";?>

						<?php require("event-revision-send.php"); ?>
						<?php require("event-form-summary.php"); ?><br>
						<?php require("event-form-desc.php"); ?><br>
						<?php require("event-show-products-data.php"); ?>
						<?php require("form-products.php"); ?><br>
						<?php require("event-form-show-images.php"); ?>
						<h3>Změnit obrázky</h3>
						<?php require("event-form-images.php"); ?>
						<h3>Správnost hodnotícího protokolu</h3>
						<input id="active" name="active" value="true" <?php echo "$valueActiveCheck"; ?> type="checkbox"><label for="active" class="check red">Schváleno</label>

						<input type="hidden" name="id_action" value="<?php echo $id; ?>"/>

						<input type="submit" name="submit" id="submit" value="Odeslat">
						<!--<input type="reset" name="reset" id="reset" value="Resetovat">-->


						<?php dbClose($conn); // Odpojíme se z DB ?>
					</form>
				</section>
			</main>
		</div>	
		<script src="<?php echo "$crm_link"; ?>/js/lightbox.js"></script>
		<?php require("block-footer.php") ?>
	</div>
</body>
</html>

<?php


// connect to the database

require_once("login-db.php");

?>



