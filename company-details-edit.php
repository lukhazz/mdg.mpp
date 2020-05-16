<?php

$error_name = $error_stat = $error_town = $error_address = $error_division = $error_cPerson = $error_chain = $error_cp = $error_psc = $error_cPhone = "";

function renderForm($id, $valuePsc, $valueCp, $valueChain, $valueName, $valueAddress, $valueTown, $valueDivision, $valueStat, $valuecPerson, $valuecPhone, $messageSuccess, $messageError, $error_name, $error_town, $error_address, $error_division, $error_stat, $error_cPerson, $error_chain, $error_cp, $error_psc, $error_cPhone)   {

?>

<!DOCTYPE html>
<html>
<?php 
$pageTitle="Editace obchodu"; 
$description="Editace obchodu."; 
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
					<h2>Upravit obchod</h2>
					<?php require("company-details-form.php"); ?>
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

	if (isset($_POST['name'])) {

		$name 			= mb_strtoupper($_POST['name'], 'UTF-8');   // Uložíme si hodnoty do vlastních proměnných
		$town 			= mb_strtoupper($_POST['town'], 'UTF-8');
		$address 		= mb_strtoupper($_POST['address'], 'UTF-8');
		(int)$chain 	= $_POST['chain'];
		//$psc 			= $_POST['psc'];
		//$cp 		= mb_strtoupper($_POST['cp'], 'UTF-8');
		$division 		= mb_strtoupper($_POST['division'], 'UTF-8');
		$cPerson 		= $_POST['c-person'];
		$cPhone 		= $_POST['c-phone'];
		$stat 			= $_POST['stat']; 
		$psc 			= $_POST['psc']; 
		$cp 			= $_POST['cp']; 
		$valueStat 		= $stat;
		$valueName		= $name;
		$valuePsc		= $psc;
		$valueCp		= $cp;
		$valueTown		= $town;
		$valueAddress	= $address;
		$valueDivision  = $division;
		$valuecPerson  	= $cPerson;
		$valuecPhone  	= $cPhone;
		$valueChain 	= $chain;
		//$valuePsc  		= $psc;
		//$valueCp	= $cp;
		//echo "$valueStat<br>";
		$id  			= $_GET['id'];

		/*

		$name 			= mb_strtoupper($_POST['name'], 'UTF-8');   // Uložíme si hodnoty do vlastních proměnných
		$town 			= mb_strtoupper($_POST['town'], 'UTF-8');
		$address 		= mb_strtoupper($_POST['address'], 'UTF-8');
		(int)$psc 		= $_POST['psc'];
		$cp 		= mb_strtoupper($_POST['cp'], 'UTF-8');
		$division 		= mb_strtoupper($_POST['division'], 'UTF-8');
		$cPerson 		= $_POST['c-person'];
		$cPhone 		= $_POST['c-phone'];
		$id  			= $_GET['id'];

		$valueName		= $name;
		$valueTown		= $town;
		$valueAddress	= $address;
		$valueDivision  = $division;
		$stat 			= $_POST['stat']; 
		$valueStat 		= $stat;
		$valuecPerson  	= $cPerson;
		$valuecPhone  	= $cPhone;
		if (empty($_POST['chain'])) { $chain = NULL; } else { $chain = mb_strtoupper($_POST['chain'], 'UTF-8'); }
		$valueChain 	= $chain;
		(int)$valuePsc  = (int)$psc;
		$valueCp	= $cp;

		$reg_phone    = "#^[0-9+][0-9]*$#";
		*/

		if(empty($valueName)) { 
			$error_name = "Zadejte prosím jméno obchodu.";
			$valueName  = "";
			$error = true;
		}

		if(empty($valueTown)) { 
			$error_town = "Zadejte prosím město, kde se obchod nachází.";
			$valueTown  = "";
			$error = true;
		}

		if(empty($valueAddress)) { 
			$error_address = "Zadejte prosím ulici obchodu.";
			$valueAddress  = "";
			$error = true;
		}

		if(empty($valuePsc)) { 
			$error_psc = "Zadejte prosím poštovní směrovací číslo (PSČ).";
			$valuePsc  = "";
			$error = true;
		}

		if(empty($valueCp)) { 
			$error_cp = "Zadejte prosím číslo popisné (ČP).";
			$valueCp  = "";
			$error = true;
		}

		if(empty($valueDivision)) { 
			$error_division = "Zadejte prosím celou okres obchodu.";
			$valueDivision  = "";
			$error = true;
		}

		/*if(empty($valuecPerson)) { 
			$error_cPerson = "Zadejte prosím jméno kontaktní osoby.";
			$valuecPerson  = "";
			$error = true;
		}*/

		if(empty($valueStat)) { 
			$error_stat = "Zadejte prosím v jakém státě se obchod nachází.";
			$valueStat  = "";
			$error = true;
		}

		if(empty($valueChain)) { 
			$error_chain = "Zadejte řetězec, pod který obchod spadá.";
			$valuecChain  = "";
			$error = true;
		}

		/*
		if(strlen($cp)!=1) { 
			$error_cp = "Zadejte prosím 1 znak - A, B, C, D, E.";
			$valueCp  = "";
			$error = true;
		}

		if(!is_numeric($psc)) { 
			$error_psc = "Identifikátor VDL musí být číselný.";
			$valuePsc  = "";
			$error = true;
		}
		
		if(!preg_match($reg_phone, $cPhone)) { // Projde string, zda se NEshoduje s podmínkami reg. výrazů
			$error_cPhone = "Telefon by měl být bez mezer. Napřklad ve tvaru: +420123456789 nebo 123456789.";
			$valuecPhone  = "";
			$error = true;
		}
		*/

		/*

		if(empty($valueName)) { 
			$error_name = "Zadejte prosím jméno lékárny.";
			$valueName  = "";
			$error = true;
		}

		if(empty($valueTown)) { 
			$error_town = "Zadejte prosím město, kde se lékárna nachází.";
			$valueTown  = "";
			$error = true;
		}

		if(empty($valueAddress)) { 
			$error_address = "Zadejte prosím ulici lékárny.";
			$valueAddress  = "";
			$error = true;
		}

		if(empty($valueDivision)) { 
			$error_division = "Zadejte prosím celou okres lékárny.";
			$valueDivision  = "";
			$error = true;
		}

		if(empty($valuecPerson)) { 
			$error_cPerson = "Zadejte prosím jméno kontaktní osoby.";
			$valuecPerson  = "";
			$error = true;
		}

		if(empty($valueStat)) { 
			$error_stat = "Zadejte prosím v jakém státě se lékárna nachází.";
			$valueStat  = "";
			$error = true;
		}
		
		if(empty($valueChain)) { 
			$error_chain = "Zadejte řetězec, pod který lékárna spadá.";
			$valuecChain  = "";
			$error = true;
		}
		
		if(strlen($cp)!=1) { 
			$error_cp = "Zadejte prosím 1 znak - A, B, C, D, E.";
			$valueCp  = "";
			$error = true;
		}

		if(!is_numeric($psc)||empty($psc)) { 
			$error_psc = "Identifikátor VDL musí být vyplněn a číselný.";
			$valuePsc  = "";
			$error = true;
		}

		if(!preg_match($reg_phone, $cPhone)) { // Projde string, zda se NEshoduje s podmínkami reg. výrazů
			$error_cPhone = "Telefon by měl být bez mezer. Napřklad ve tvaru: +420123456789 nebo 123456789.";
			$valuecPhone  = "";
			$error = true;
		}*/

		if ( $error == false ) {
			$conn = dbConnect(); // Připojíme se k databázi
			mysqli_query($conn, "SET NAMES utf8");

			//Kontrola, zda není lékárna v databázi

			
			//$sql  = "SELECT COUNT(psc)psc FROM pharmacy WHERE psc='$psc'";
			//echo $id."<br>";
			$sql  = "SELECT nazev FROM mdg_company_details WHERE ( nazev!='$name' AND mesto!='$valueTown' AND ulice!='$address' ) ";
			//$sql  = "SELECT psc FROM pharmacy WHERE psc=$psc AND id_pharmacy!='$id'";
			if ( $data = mysqli_query($conn, $sql) ) {
				$row  = mysqli_fetch_row($data);

				//$row = NULL;
				//echo $row[0]."<br>";
				if ($row[0] > 1) {
					$messageError = "Nelze přidat, obchod s tímto jménem, městem a ulicí již je v databázi.";
					//echo "Nelze přidat, lékárna s tímto jménem a adresou již je v databázi.";
					dbClose($conn);
					renderForm($id, $valuePsc, $valueCp, $valueChain, $valueName, $valueAddress, $valueTown, $valueDivision, $valueStat, $valuecPerson, $valuecPhone, $messageSuccess, $messageError, $error_name, $error_town, $error_address, $error_division, $error_stat, $error_cPerson, $error_chain, $error_cp, $error_psc, $error_cPhone);
				}
				else {
					$sql = "UPDATE mdg_company_details SET cp = '$valueCp', psc = '$valuePsc', id_mdg_company = '$valueChain', nazev = '$valueName', ulice = '$valueAddress', mesto = '$valueTown', okres = '$valueDivision', stat = '$valueStat', k_jmeno = '$valuecPerson', k_cislo = '$valuecPhone' WHERE id_mdg_company_details='$id'";
					//echo "$sql<br>";
					if (mysqli_query($conn, $sql)) {
						
						$messageSuccess = "Obchod upraven.";
						//echo "Lékárna upravena.";
						renderForm($id, $valuePsc, $valueCp, $valueChain, $valueName, $valueAddress, $valueTown, $valueDivision, $valueStat, $valuecPerson, $valuecPhone, $messageSuccess, $messageError, $error_name, $error_town, $error_address, $error_division, $error_stat, $error_cPerson, $error_chain, $error_cp, $error_psc, $error_cPhone);
						//$valueName     	= "";
						//$valueTown		= "";
						//$valueAddress  	= "";

					}
					else {
						$messageError = "Nepodařilo se upravit obchod.";
						//echo "Nepodařilo se upravit lékárnu.";
						dbClose($conn);
						renderForm($id, $valuePsc, $valueCp, $valueChain, $valueName, $valueAddress, $valueTown, $valueDivision, $valueStat, $valuecPerson, $valuecPhone, $messageSuccess, $messageError, $error_name, $error_town, $error_address, $error_division, $error_stat, $error_cPerson, $error_chain, $error_cp, $error_psc, $error_cPhone);

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
				renderForm($id, $valuePsc, $valueCp, $valueChain, $valueName, $valueAddress, $valueTown, $valueDivision, $valueStat, $valuecPerson, $valuecPhone, $messageSuccess, $messageError, $error_name, $error_town, $error_address, $error_division, $error_stat, $error_cPerson, $error_chain, $error_cp, $error_psc, $error_cPhone);
			}
		}
		else {
			$messageError = "Nelze přidat, nejsou vyplněna všechna pole.";
			//echo "Nelze přidat, nejsou vyplněna všechna pole.";
			//dbClose($conn);
			renderForm($id, $valuePsc, $valueCp, $valueChain, $valueName, $valueAddress, $valueTown, $valueDivision, $valueStat, $valuecPerson, $valuecPhone, $messageSuccess, $messageError, $error_name, $error_town, $error_address, $error_division, $error_stat, $error_cPerson, $error_chain, $error_cp, $error_psc, $error_cPhone);
		}
	}
	else {
		$messageError = "ID není číselné.";
		//echo "ID není číselné.";
		renderForm($id, $valuePsc, $valueCp, $valueChain, $valueName, $valueAddress, $valueTown, $valueDivision, $valueStat, $valuecPerson, $valuecPhone, $messageSuccess, $messageError, $error_name, $error_town, $error_address, $error_division, $error_stat, $error_cPerson, $error_chain, $error_cp, $error_psc, $error_cPhone);
	}
}
else {
	$messageError = "Nezmáčkl se submit.";
	//echo "Nezmáčkl se submit.";

	if (isset($_GET['id'])) { // query db
		$valueName		= "";
		$valueTown		= "";
		$valueAddress	= "";
		$valueDivision  = "";
		$valuecPerson  	= "";
		$valuecPhone  	= "";
		$valueChain 	= "";
		$valuePsc  		= "";
		$valueStat  	= "";
		$id  			= $_GET['id'];
		$valueCp	= "";

		

		$conn = dbConnect();
		//$sql = "SELECT * FROM mdg_company_details WHERE id_mdg_company_details=$id";
		$sql = "SELECT mdg_company_details.id_mdg_company_details, mdg_company_details.nazev, mdg_company_details.stat, mdg_company_details.okres, mdg_company_details.mesto, mdg_company_details.psc, mdg_company_details.ulice, mdg_company_details.cp, mdg_company_details.k_jmeno, mdg_company_details.k_cislo, mdg_company_details.id_mdg_company 
				FROM mdg_company_details
					JOIN mdg_company 
						ON 		mdg_company_details.id_mdg_company=mdg_company.id_mdg_company 
						AND id_mdg_company_details=$id";
		mysqli_query($conn, "SET NAMES utf8");
		$result = mysqli_query($conn, $sql);

		//$row = mysql_fetch_array($result);

		// check that the 'id' matches up with a row in the databse

		if ( $row = mysqli_fetch_row($result) ) { // get data from db
			$valueName 		= $row[1];
			$valueStat 		= $row[2];
			$valueDivision 	= $row[3];
			$valueTown 		= $row[4];
			$valuePsc 		= $row[5];
			$valueAddress 	= $row[6];
			$valueCp 		= $row[7];
			$valuecPerson 	= $row[8];
			$valuecPhone 	= $row[9];
			$valueChain 	= $row[10];
			

			$messageError = "";
			//echo "Načti z databáze";
			dbClose($conn);
			
			renderForm($id, $valuePsc, $valueCp, $valueChain, $valueName, $valueAddress, $valueTown, $valueDivision, $valueStat, $valuecPerson, $valuecPhone, $messageSuccess, $messageError, $error_name, $error_town, $error_address, $error_division, $error_stat, $error_cPerson, $error_chain, $error_cp, $error_psc, $error_cPhone);
		}
		else {
			$messageError = "Nepovedlo se načíst údaje v databázi.";
			//echo "Nepovedlo se načíst údaje v databázi.";
			dbClose($conn);
			renderForm($id, $valuePsc, $valueCp, $valueChain, $valueName, $valueAddress, $valueTown, $valueDivision, $valueStat, $valuecPerson, $valuecPhone, $messageSuccess, $messageError, $error_name, $error_town, $error_address, $error_division, $error_stat, $error_cPerson, $error_chain, $error_cp, $error_psc, $error_cPhone);
		}
		
	}
	else {
		$messageError = "Nepovedlo se změnit údaje v databázi.";
		//echo "Nepovedlo se změnit údaje v databázi.";
		renderForm($id, $valuePsc, $valueCp, $valueChain, $valueName, $valueAddress, $valueTown, $valueDivision, $valueStat, $valuecPerson, $valuecPhone, $messageSuccess, $messageError, $error_name, $error_town, $error_address, $error_division, $error_stat, $error_cPerson, $error_chain, $error_cp, $error_psc, $error_cPhone);
	}

}

?>