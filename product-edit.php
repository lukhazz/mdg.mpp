<?php //require("form-maker-default-values.php"); ?>
<?php

		$odpoved = "Nápověda pro promotérky";
?>

<!DOCTYPE html>
<html>
<?php 
$pageTitle="Editace produktů"; 
$description="Editace produktů."; 
?>
<?php require("prompts.php"); ?>
<?php require("block-head.php"); ?>

<body>
	<div class="page">
		<?php require_once("login-db.php") ?>
		<?php require_once("login.php") ?>
		<?php require_once("roles.php") ?>
		<?php $permArrayCurrent = array("mdg-editace-pridani-obchodu"); ?>
		<?php require("block-header.php"); ?>
		<?php require("functions.php") ?>
		<?php $permArrayCurrent = array("editace-firem-formularu"); ?>
		<?php $ms = $me = "";  ?>
		<?php //require("functions.php") ?>
		<?php 
			$revision = false;
			$userStatTemp = $_SESSION['stat'];
			$mena = "Kč,";
			if ($userStatTemp=="sk") {
				$mena = "&euro;";
			}
			?>

		<div class="container">
			<main>
				<section class="form">
					<h2>Upravit produkty</h2>
					<?php //require("form-maker-default-values.php"); ?>
					<?php 
						if (isset($_GET['ms'])) {
							$messageSuccess = $_GET['ms'];
						}
						if (isset($_GET['me'])) {
							$messageError = $_GET['me'];
						}
					?>
					<?php if (!empty($messageSuccess)) { echo '<div class="message-success">'.$messageSuccess.'</div>';	} ?>
					<?php if (!empty($messageError))   { echo '<div class="message-error">'.$messageError.'</div>';	} ?>

					<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="register" class="form-maker clearfix">
						
						<?php //require("../country.php"); ?>
						<br>
						<?php require("form-products-count.php"); ?>
						<?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?id=$id&ms=$ms&me=$me";  ?>
						<?php $counterProductsAdditional = 30; ?>
						<?php require("form-products-data.php"); ?>
						<?php require("form-products.php"); ?>
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



