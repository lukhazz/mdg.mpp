<!DOCTYPE html>
<html>
<?php 
$pageTitle="Produkty"; 
$description="Vytvoření hodnotícího formuláře produktů."; 
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
		<?php $ms = $me = ""; $revision = false; ?>

		<div class="container">

			<main>
				<section class="form">
					<h2>Přidat produkty</h2>
					<?php //require("form-maker-default-values.php"); ?>
					<?php require("form-send.php"); ?>
					<?php 
						$userStatTemp = $_SESSION['stat'];
						$mena = "Kč,-";
						if ($userStatTemp=="sk") {
							$mena = "&euro;";
						}
					?>
	
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

						<!--<input type="text" placeholder="Název formuláře včetně roku" class="w100 center" name="nazev" minlength="5" required="required" value="<?php //echo $nazevFormulare; ?>">-->

						<label for="project">Projekt</label><select name="project" id="project" required="required">
							<option <?php //echo "$select"; ?>  value="" disabled>Vybrat projekt</option><?php

								$sql = "SELECT mdg_project.id_mdg_project, mdg_project.nazev
										FROM mdg_project
										ORDER BY mdg_project.nazev
											";
								$conn = dbConnect();
								mysqli_query($conn, "SET NAMES utf8");

								$data = mysqli_query($conn, $sql);
								$i = 0;
								while($radek = mysqli_fetch_row($data)) {
									//echo $radek[$i];
									if (empty($valueProject)) {
										$valueProject = "";
									}
									if ($radek%3==1) {
										//if ($radek[$i] == $users) {
										//	$status ="available";
										//}
										//for($i=0;$i<	count($radek);$i++) {
											//$i=0;
										echo "
							<option value=\"$radek[$i]\" ";?><?php if($valueProject==$radek[$i]){ echo "selected=\"selected\""; } ?><?php echo ">".$radek[$i+1]." (".$radek[$i].")</option>";
										//} 
									}
								$status ="";
									
								}

							?>

						</select>
						<?php require("country.php"); ?>
						<br>
						<?php $counterProductsAdditional = 0; $counterProducts = 50; ?>
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