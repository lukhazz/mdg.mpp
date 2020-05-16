<?php

function renderForm($id, $valueName, $idUser, $users, $idUserKoo, $usersKoo, $time, $valueProject, $valueProjectName, $valueCompany, $valueCompanyName, $valueDate, $date, $description, $valueDescription, $timeArray, $valueChain, $valueMarket, $messageError, $messageSuccess)   {

?>

<!DOCTYPE html>
<html>
<?php 
$pageTitle="Editace šablon akcí"; 
$description="Editace šablon akcí."; 
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
					<h2>Upravit akce</h2>
						
						<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="register" class="clearfix">
					<?php $idUser = $users; $edit = true; $day = $month = $status = $select =""; require("event-form.php"); ?>
							
							<!--<input type="reset" name="reset" id="reset" value="Resetovat">-->
						</form>
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
$error_time = $error_pause = $error_goal = "";
$messageError = "";
$messageSuccess = "";
$hours = 0;
$time ="";

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) { // confirm that the 'id' value is a valid integer before getting the form data

	//echo "Zmáčkl se submit.";

	if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
			$name 			= mb_strtoupper($_POST['name'], 'UTF-8');   // Uložíme si hodnoty do vlastních proměnných
			$market 		= mb_strtoupper($_POST['market'], 'UTF-8');
			$project 		= mb_strtoupper($_POST['project'], 'UTF-8');
			$description 	= mb_strtoupper($_POST['description'], 'UTF-8');
			$date 			= $_POST['date'];
			$valueName		= $name;
			$valueMarket	= $market;
			$valueProject	= $project;
			$valueDescription  = $description;
			$valueDate  	= $date;
			$id = $_GET['id'];

			if (isset($_POST['users'])) {
				(int)$users 		= $_POST['users'];
			}
			else {
				(int)$users 		= 1;
			}
			(int)$usersKoo 		= $_POST['users-koo'];



			if (!empty($_POST['time'])) {
				$timeArray 			= $_POST['time'];
			}
			else {
				$timeArray 			= NULL;
			}

			$reg_phone    = "#^[0-9+][0-9]*$#";

			if(empty($valueName)) { 
				$error_name = "Zadejte prosím název akce.";
				$valueName  = "";
				$error = true;
			}


			if(empty($valueMarket)) { 
				$error_market = "Zadejte prosím ulici obchodu.";
				$valueMarket  = "";
				$error = true;
			}

			if ($timeArray!=NULL) {
				//echo "Chci vypsat čas<br>";
				$time = implode("|", $timeArray);
				//echo vypisCas($timeArray)."<br>";
				//$hours = $timeArray[2]-$timeArray[0];
				//echo $time."<br>";
				$hours = (($timeArray[2]*60+$timeArray[3])-($timeArray[0]*60+$timeArray[1])-30)/60;
				//echo $hours."<br>";
				if ((($hours)*60+30)<=0) {
					//$error = true; //zakomentovat pak
					//$error_time = "Čas \"Od\" musí být menší než \"Do\"";
				}
				else if ($hours==-0.5) {
					$hours = 0;
				}
			}

		

		if ( $error == false ) {
			$conn = dbConnect(); // Připojíme se k databázi
			mysqli_query($conn, "SET NAMES utf8");

			//Kontrola, zda není lékárna v databázi
			//	$sql  = "SELECT * FROM actions WHERE id_user='$users' AND id_pharmacy='$pharmacy' AND id_form='$form' AND datum='$date' AND id_tradesman='$tradesman' AND id_action!='$id'";
			//$data = mysqli_query($conn, $sql);
			//if ( $data = mysqli_query($conn, $sql) ) {
				//$row  = mysqli_fetch_row($data);

				$row = NULL;

				if ($row != NULL) {
					$messageError = "Nelze přidat, akce s těmito parametry již je v databázi.";
					//echo "Nelze přidat, akce s tímto jménem a adresou již je v databázi.";
					dbClose($conn);
					renderForm($id, $valueName, $idUser, $users, $idUserKoo, $usersKoo, $time, $valueProject, $valueProjectName, $valueCompany, $valueCompanyName, $valueDate, $date, $description, $valueDescription, $timeArray, $valueChain, $valueMarket, $messageError, $messageSuccess);
				}
				else {
					$time = implode("|", $timeArray);
					$timeArray = explode("|", $time);
					//echo $tradesman;
					//$tradesman = (int)$tradesman;
					$sql = "UPDATE mdg_events SET mdg_events.nadpis = '$name',mdg_events.id_user = '$users', mdg_events.id_user_koo = '$usersKoo', mdg_events.cas = '$time',mdg_events.id_mdg_project = '$project', mdg_events.id_mdg_company_details = '$market', mdg_events.popis = '$description', mdg_events.datum = '$date'

					WHERE mdg_events.id_mdg_event=$id";

					//echo "<br><br>".$sql;
					if (mysqli_query($conn, $sql)) {
						$idUser = $users;
						$idUserKoo  = $usersKoo;
						$valueProjectName  = $project;
						$valueCompany = $valueMarket = $market;
						$valueCompanyName = "";
						$valueChain = ""; 
						
						$messageSuccess = "Akce upravena.";
						//echo "Akce upravena.";
						renderForm($id, $valueName, $idUser, $users, $idUserKoo, $usersKoo, $time, $valueProject, $valueProjectName, $valueCompany, $valueCompanyName, $valueDate, $date, $description, $valueDescription, $timeArray, $valueChain, $valueMarket, $messageError, $messageSuccess);
						//$valueName     	= "";
						//$valueTown		= "";
						//$valueAddress  	= "";

					}
					else {
						$messageError = "Nepodařilo se upravit akci.";
						//echo "Nepodařilo se upravit akci.";
						dbClose($conn);
						renderForm($id, $valueName, $idUser, $users, $idUserKoo, $usersKoo, $time, $valueProject, $valueProjectName, $valueCompany, $valueCompanyName, $valueDate, $date, $description, $valueDescription, $timeArray, $valueChain, $valueMarket, $messageError, $messageSuccess);

						//mysqli_query($conn, $sql);
						//$row  = mysqli_fetch_row($data);
						//$messageError = $row;
					}
				}
			//}
		}
		else {
			$messageError = "Nelze přidat, nejsou vyplněna správně všechna pole.";
			//echo "Nelze přidat, nejsou vyplněna všechna pole.";
			//dbClose($conn);
			renderForm($id, $valueName, $idUser, $users, $idUserKoo, $usersKoo, $time, $valueProject, $valueProjectName, $valueCompany, $valueCompanyName, $valueDate, $date, $description, $valueDescription, $timeArray, $valueChain, $valueMarket, $messageError, $messageSuccess);
		}
	}
	else {
		$messageError = "ID není číselné.";
		//echo "ID není číselné.";
		renderForm($id, $valueName, $idUser, $users, $idUserKoo, $usersKoo, $time, $valueProject, $valueProjectName, $valueCompany, $valueCompanyName, $valueDate, $date, $description, $valueDescription, $timeArray, $valueChain, $valueMarket, $messageError, $messageSuccess);
	}
}
else {
	$messageError = "Nezmáčkl se submit.";
	//echo "Nezmáčkl se submit.";

	if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) { // query db

		$conn = dbConnect();
		$id = $_GET['id'];
		//$sql = "SELECT * FROM actions WHERE id_action=$id";
		$sql = "SELECT mdg_events.nadpis, mdg_events.id_user, mdg_events.id_user_koo, mdg_events.cas, mdg_events.id_mdg_project, mdg_project.nazev, mdg_events.id_mdg_company_details, mdg_company_details.nazev, mdg_events.popis, mdg_events.datum  FROM mdg_events 
					JOIN mdg_company
					JOIN mdg_project
					JOIN mdg_company_details
					JOIN users
						ON 		mdg_events.id_mdg_company=mdg_company.id_mdg_company 
							AND mdg_events.id_mdg_project=mdg_project.id_mdg_project 
							AND mdg_events.id_mdg_company_details=mdg_company_details.id_mdg_company_details 
							AND mdg_events.id_user=users.id_user 
							WHERE mdg_events.id_mdg_event=$id";
		mysqli_query($conn, "SET NAMES utf8");
		$result = mysqli_query($conn, $sql);

		//echo "<br>$sql<br>";

		//$row = mysql_fetch_array($result);

		// check that the 'id' matches up with a row in the databse

		if ( $row = mysqli_fetch_row($result) ) { // get data from db

			$valueName	= $row[0];
			$idUser 	= $users 		= $row[1];
			$idUserKoo 	= $usersKoo 	= $row[2];
			$time 		= $row[3];
			$valueProject = $row[4];
			$valueProjectName = $row[5];
			$valueMarket = $valueChain = $valueCompany = $row[6];
			$valueCompanyName = $row[7];
			$description = $valueDescription = $row[8];
			$valueDate = $date 		= $row[9];


			//echo "$idUser / $idUserKoo <br>";

			$idUser = $users;

			$timeArray = explode("|", $time);
			//echo "time: $timeArray[0]<br>";

			$messageError = "";
			//echo "Načti z databáze";
			dbClose($conn);

			$messageSuccess = "Úspěšně načteno z databáze.";
			
			renderForm($id, $valueName, $idUser, $users, $idUserKoo, $usersKoo, $time, $valueProject, $valueProjectName, $valueCompany, $valueCompanyName, $valueDate, $date, $description, $valueDescription, $timeArray, $valueChain, $valueMarket, $messageError, $messageSuccess); }
		else {
			$messageError = "Nepovedlo se načíst údaje v databázi.";
			//echo "Nepovedlo se načíst údaje v databázi.";
			dbClose($conn);
			renderForm($id, $valueName, $idUser, $users, $idUserKoo, $usersKoo, $time, $valueProject, $valueProjectName, $valueCompany, $valueCompanyName, $valueDate, $date, $description, $valueDescription, $timeArray, $valueChain, $valueMarket, $messageError, $messageSuccess);
		}
		
	}
	else {
		$messageError = "Nepovedlo se změnit údaje v databázi.";
		//echo "Nepovedlo se změnit údaje v databázi.";
		renderForm($id, $valueName, $idUser, $users, $idUserKoo, $usersKoo, $time, $valueProject, $valueProjectName, $valueCompany, $valueCompanyName, $valueDate, $date, $description, $valueDescription, $timeArray, $valueChain, $valueMarket, $messageError, $messageSuccess);
	}

}

?>