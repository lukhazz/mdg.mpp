<?php

function renderForm($id, $valueName, $messageSuccess, $messageError, $userStat)   {

?>

<!DOCTYPE html>
<html>
<?php 
$pageTitle="Editace firem"; 
$description="Editace firem."; 
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
		<?php //require("functions.php") ?>

		<div class="container">
			<main>
				<section class="form">
					<h2>Upravit firmu</h2>
					<?php require("company-form.php"); ?>
				</section>
			</main>
		</div>	
	<?php require("block-footer.php") ?>
	</div>
</body>
</html>

<?php

}


// connect to the database

require_once("login-db.php");
require("functions.php");
$error = false;
$messageError = "";
$messageSuccess = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST' ) { // confirm that the 'id' value is a valid integer before getting the form data

	//echo "Zmáčkl se submit.";

	if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

		$valueName = $name 					= $_POST['name'];   // Uložíme si hodnoty do vlastních proměnných
		//$valueCompanyPrice = $companyPrice 	= $_POST['company-price']; 
		$id 								= $_POST['id_company'];
		$userStat  		= $_POST['stat']; 
		$valueStat 		= $userStat;

		if(empty($valueName)) { 
			$error_name = "Zadejte prosím jméno firmy.";
			$valueName  = "";
			$error = true;
		}

		if ( $error == false ) {
			$conn = dbConnect(); // Připojíme se k databázi
			mysqli_query($conn, "SET NAMES utf8");

			//Kontrola, zda není firma v databázi
			$sql  = "SELECT nazev FROM mdg_company WHERE nazev='$name' AND id_mdg_company!='$id'";
			//$data = mysqli_query($conn, $sql);
			if ( $data = mysqli_query($conn, $sql) ) {
				$row  = mysqli_fetch_row($data);

				//$row = NULL;

				if ($row != NULL) {
					$messageError = "Nelze přidat, firma s tímto jménem a adresou již je v databázi.";
					//echo "Nelze přidat, firma s tímto jménem a adresou již je v databázi.";
					dbClose($conn);
					renderForm($id, $valueName, $messageSuccess, $messageError, $userStat);
				}
				else {
					$sql = "UPDATE mdg_company SET nazev = '$valueName', stat = '$userStat' WHERE id_mdg_company='$id'";
					if (mysqli_query($conn, $sql)) {
						
						$messageSuccess = "Firma upravena.";
						//echo "Firma upravena.";
						renderForm($id, $valueName, $messageSuccess, $messageError, $userStat);
						//$valueName     	= "";
						//$valueTown		= "";
						//$valueAddress  	= "";

					}
					else {
						$messageError = "Nepodařilo se upravit firmu.";
						//echo "Nepodařilo se upravit firmu.";
						dbClose($conn);
						renderForm($id, $valueName, $messageSuccess, $messageError, $userStat);

						//mysqli_query($conn, $sql);
						//$row  = mysqli_fetch_row($data);
						//$messageError = $row;
					}
				}
			}
			else {
				$messageError = "Chyba dotazu.";
				//echo "Chyba dotazu.";
				dbClose($conn);
				renderForm($id, $valueName, $messageSuccess, $messageError, $userStat);
			}
		}
		else {
			$messageError = "Nelze přidat, nejsou vyplněna všechna pole.";
			//echo "Nelze přidat, nejsou vyplněna všechna pole.";
			dbClose($conn);
			renderForm($id, $valueName, $messageSuccess, $messageError, $userStat);
		}
	}
	else {
		$messageError = "ID není číselné.";
		//echo "ID není číselné.";
		renderForm($id, $valueName, $messageSuccess, $messageError, $userStat);
	}
}
else {
	$messageError = "Nezmáčkl se submit.";
	//echo "Nezmáčkl se submit.";

	if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) { // query db

		$conn = dbConnect();
		$id = $_GET['id'];
		$sql = "SELECT * FROM mdg_company WHERE id_mdg_company=$id";
		mysqli_query($conn, "SET NAMES utf8");
		$result = mysqli_query($conn, $sql);

		//$row = mysql_fetch_array($result);

		// check that the 'id' matches up with a row in the databse

		if ( $row = mysqli_fetch_row($result) ) { // get data from db
			$valueName 			= $row[1];
			//$valueCompanyPrice  = $row[2];
			$userStat   		= $row[2];

			$messageError = "";
			//echo "Načti z databáze";
			dbClose($conn);
			
			renderForm($id, $valueName, $messageSuccess, $messageError, $userStat);
		}
		else {
			$messageError = "Nepovedlo se načíst údaje v databázi.";
			//echo "Nepovedlo se načíst údaje v databázi.";
			dbClose($conn);
			renderForm($id, $valueName, $messageSuccess, $messageError, $userStat);
		}
		
	}
	else {
		$messageError = "Nepovedlo se změnit údaje v databázi.";
		//echo "Nepovedlo se změnit údaje v databázi.";
		renderForm($id, $valueName, $messageSuccess, $messageError, $userStat);
	}

}

?>