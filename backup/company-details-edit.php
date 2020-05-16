<?php

function renderForm($id, $valueName, $valuePhone, $company, $messageSuccess, $messageError, $error_phone, $userStat)   {

?>

<!DOCTYPE html>
<html>
<?php 
$pageTitle="Editace reprezentanta"; 
$description="Editace reprezentanta."; 
?>
<?php require("prompts.php"); ?>
<?php require("block-head.php"); ?>

<body>
	<div class="page">
		<?php require_once("login-db.php") ?>
		<?php require_once("login.php") ?>
		<?php require_once("roles.php") ?>
		<?php require("block-header.php"); ?>
		<?php //require("functions.php") ?>
		<div class="container">
			<main>
				<section class="form">
					<h2>Upravit reprezentanta</h2>
					<?php $status=""; require("company-details-form.php"); ?>
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
$error_phone = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) { // confirm that the 'id' value is a valid integer before getting the form data

	//echo "Zmáčkl se submit.";

	if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

		$valueName 	= $name 	= $_POST['name']; 
		$valuePhone = $phone 	= $_POST['phone']; 
		(int)$company 			= $_POST['company']; 
		$id 					= $_POST['id_company-details'];
		$userStat  				= $_POST['stat']; 
		$valueStat 				= $userStat;
		$reg_phone    = "#^[0-9+][0-9]*$#";

		if(empty($valueName)) { 
			$error_name = "Zadejte prosím příjmení reprezentanta.";
			$valueName  = "";
			$error = true;
		}

		if(empty($_POST['company'])) { 
			$error_company = "Vyberte prosím firmu klienta.";
			$valueCompany  = "";
			$error = true;
		}

		if(!preg_match($reg_phone, $phone)) { // Projde string, zda se NEshoduje s podmínkami reg. výrazů
			$error_phone = "Telefon by měl být bez mezer. Napřklad ve tvaru: +420123456789 nebo 123456789.";
			$valuePhone  = "";
			$error = true;
		}

		if ( $error == false ) {
			$conn = dbConnect(); // Připojíme se k databázi
			mysqli_query($conn, "SET NAMES utf8");

			//Kontrola, zda není firma v databázi
			$sql  = "SELECT telefon FROM company-details WHERE telefon='$phone' AND prijmeni='$name' AND id_company-details!='$id'";
			//$data = mysqli_query($conn, $sql);
			if ( $data = mysqli_query($conn, $sql) ) {
				$row  = mysqli_fetch_row($data);

				//$row = NULL;

				if ($row != NULL) {
					$messageError = "Nelze upravit, reprezentant s tímto příjmením  a telefonem již je v databázi.";
					//echo "Nelze přidat, firma s tímto jménem a adresou již je v databázi.";
					dbClose($conn);
					renderForm($id, $valueName, $valuePhone, $company, $messageSuccess, $messageError, $error_phone, $userStat);
				}
				else {
					$sql = "UPDATE company-details SET prijmeni = '$valueName', telefon = '$valuePhone', id_company = '$company', stat = '$userStat' WHERE id_company-details='$id'";
					if (mysqli_query($conn, $sql)) {
						
						$messageSuccess = "Reprezentant upraven.";
						//echo "Firma upravena.";
						renderForm($id, $valueName, $valuePhone, $company, $messageSuccess, $messageError, $error_phone, $userStat);
						//$valueName     	= "";
						//$valueTown		= "";
						//$valueAddress  	= "";

					}
					else {
						$messageError = "Nepodařilo se upravit reprezentanta.";
						//echo "Nepodařilo se upravit firmu.";
						dbClose($conn);
						renderForm($id, $valueName, $valuePhone, $company, $messageSuccess, $messageError, $error_phone, $userStat);

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
				renderForm($id, $valueName, $valuePhone, $company, $messageSuccess, $messageError, $error_phone, $userStat);
			}
		}
		else {
			$messageError = "Nelze upravit, nejsou vyplněna všechna pole.";
			//echo "Nelze přidat, nejsou vyplněna všechna pole.";
			//dbClose($conn);
			renderForm($id, $valueName, $valuePhone, $company, $messageSuccess, $messageError, $error_phone, $userStat);
		}
	}
	else {
		$messageError = "ID není číselné.";
		//echo "ID není číselné.";
		renderForm($id, $valueName, $valuePhone, $company, $messageSuccess, $messageError, $error_phone, $userStat);
	}
}
else {
	$messageError = "Nezmáčkl se submit.";
	//echo "Nezmáčkl se submit.";

	if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) { // query db

		$conn = dbConnect();
		$id = $_GET['id'];
		$sql = "SELECT * FROM company-details WHERE id_company-details=$id";
		mysqli_query($conn, "SET NAMES utf8");
		$result = mysqli_query($conn, $sql);

		//$row = mysql_fetch_array($result);

		// check that the 'id' matches up with a row in the databse

		if ( $row = mysqli_fetch_row($result) ) { // get data from db
			$company  			= $row[1];
			$valueName 			= $row[2];
			$valuePhone			= $row[3];
			$userStat   		= $row[4];

			$messageError = "";
			//echo "Načti z databáze";
			dbClose($conn);
			
			renderForm($id, $valueName, $valuePhone, $company, $messageSuccess, $messageError, $error_phone, $userStat);
		}
		else {
			$messageError = "Nepovedlo se načíst údaje v databázi.";
			//echo "Nepovedlo se načíst údaje v databázi.";
			dbClose($conn);
			renderForm($id, $valueName, $valuePhone, $company, $messageSuccess, $messageError, $error_phone, $userStat);
		}
		
	}
	else {
		$messageError = "Nepovedlo se změnit údaje v databázi.";
		//echo "Nepovedlo se změnit údaje v databázi.";
		renderForm($id, $valueName, $valuePhone, $company, $messageSuccess, $messageError, $error_phone, $userStat);
	}

}

?>