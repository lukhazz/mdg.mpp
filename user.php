<!DOCTYPE html>
<html>
<?php 
$pageTitle="Registrace"; 
$description="Registrace nových uživatelů včetně patřičných práv."; 
?>
<?php require("prompts.php"); ?>
<?php require("block-head.php"); ?>
<body>
	<div class="page">
		<?php require_once("login-db.php") ?>
		<?php require_once("login.php") ?>
		<?php require_once("roles.php") ?>
		<?php $permArrayCurrent = array("mdg-pridani-uzivatelu"); ?>
		<?php require("block-header.php"); ?>
		<?php require("functions.php") ?>
		<?php $userStat = $_SESSION['stat']; ?>

		<div class="container">

			<main>
				<section class="form">
					<h2>Registrace uživatele</h2>
					<?php //$password=""; ?>
					<?php $password=generateRandomPassword(); ?>
					<?php //echo strtolower(removeCzechChars("ščruiČŠRFŘČGohfRTGšujfiČŘGhČŘewrbvGšuwČŘGrfuiíšhčř")); ?>
					<?php //echo makeUserName("Lukáš","Málek"); ?>
					<?php 
						require('user-registration.php'); 
						//require('upload.php'); 
					?>  
					<?php if (!empty($messageSuccess)) { echo '<div class="message-success">'.$messageSuccess.'</div>';	} ?>
					<?php if (!empty($messageError))   { echo '<div class="message-error">'.$messageError.'</div>';	} ?>

					<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="register" class="clearfix">

						<?php require("user-form-details.php") ?>
						<br><br>
						<?php require("user-roles.php") ?>
						

						<input type="submit" name="registeruser" id="registeruser" value="Registrovat">
						<!--<input type="reset" name="reset" id="reset" value="Resetovat">-->
					</form>

				</section>
				
						
				
			</main>
		</div>
		<?php require("block-footer.php") ?>
	</div>
	
</body>
</html>