<?php //require("form-maker-default-values.php"); ?>
<?php

function renderForm( $id, $messageSuccess, $messageError,$eanValue1,$kodValue1,$vyrobekValue1,$ksBalValue1,$ksValue1,$poznamkyValue1,$cenaMoValue1,$cenaCelkemValue1,$showValue1,$eanValue2,$kodValue2,$vyrobekValue2,$ksBalValue2,$ksValue2,$poznamkyValue2,$cenaMoValue2,$cenaCelkemValue2,$showValue2,$eanValue3,$kodValue3,$vyrobekValue3,$ksBalValue3,$ksValue3,$poznamkyValue3,$cenaMoValue3,$cenaCelkemValue3,$showValue3,$eanValue4,$kodValue4,$vyrobekValue4,$ksBalValue4,$ksValue4,$poznamkyValue4,$cenaMoValue4,$cenaCelkemValue4,$showValue4,$eanValue5,$kodValue5,$vyrobekValue5,$ksBalValue5,$ksValue5,$poznamkyValue5,$cenaMoValue5,$cenaCelkemValue5,$showValue5,$eanValue6,$kodValue6,$vyrobekValue6,$ksBalValue6,$ksValue6,$poznamkyValue6,$cenaMoValue6,$cenaCelkemValue6,$showValue6,$eanValue7,$kodValue7,$vyrobekValue7,$ksBalValue7,$ksValue7,$poznamkyValue7,$cenaMoValue7,$cenaCelkemValue7,$showValue7,$eanValue8,$kodValue8,$vyrobekValue8,$ksBalValue8,$ksValue8,$poznamkyValue8,$cenaMoValue8,$cenaCelkemValue8,$showValue8,$eanValue9,$kodValue9,$vyrobekValue9,$ksBalValue9,$ksValue9,$poznamkyValue9,$cenaMoValue9,$cenaCelkemValue9,$showValue9,$eanValue10,$kodValue10,$vyrobekValue10,$ksBalValue10,$ksValue10,$poznamkyValue10,$cenaMoValue10,$cenaCelkemValue10,$showValue10,$eanValue11,$kodValue11,$vyrobekValue11,$ksBalValue11,$ksValue11,$poznamkyValue11,$cenaMoValue11,$cenaCelkemValue11,$showValue11,$eanValue12,$kodValue12,$vyrobekValue12,$ksBalValue12,$ksValue12,$poznamkyValue12,$cenaMoValue12,$cenaCelkemValue12,$showValue12,$eanValue13,$kodValue13,$vyrobekValue13,$ksBalValue13,$ksValue13,$poznamkyValue13,$cenaMoValue13,$cenaCelkemValue13,$showValue13,$eanValue14,$kodValue14,$vyrobekValue14,$ksBalValue14,$ksValue14,$poznamkyValue14,$cenaMoValue14,$cenaCelkemValue14,$showValue14,$eanValue15,$kodValue15,$vyrobekValue15,$ksBalValue15,$ksValue15,$poznamkyValue15,$cenaMoValue15,$cenaCelkemValue15,$showValue15,$eanValue16,$kodValue16,$vyrobekValue16,$ksBalValue16,$ksValue16,$poznamkyValue16,$cenaMoValue16,$cenaCelkemValue16,$showValue16,$eanValue17,$kodValue17,$vyrobekValue17,$ksBalValue17,$ksValue17,$poznamkyValue17,$cenaMoValue17,$cenaCelkemValue17,$showValue17,$eanValue18,$kodValue18,$vyrobekValue18,$ksBalValue18,$ksValue18,$poznamkyValue18,$cenaMoValue18,$cenaCelkemValue18,$showValue18,$eanValue19,$kodValue19,$vyrobekValue19,$ksBalValue19,$ksValue19,$poznamkyValue19,$cenaMoValue19,$cenaCelkemValue19,$showValue19,$eanValue20,$kodValue20,$vyrobekValue20,$ksBalValue20,$ksValue20,$poznamkyValue20,$cenaMoValue20,$cenaCelkemValue20,$showValue20,$eanValue21,$kodValue21,$vyrobekValue21,$ksBalValue21,$ksValue21,$poznamkyValue21,$cenaMoValue21,$cenaCelkemValue21,$showValue21,$eanValue22,$kodValue22,$vyrobekValue22,$ksBalValue22,$ksValue22,$poznamkyValue22,$cenaMoValue22,$cenaCelkemValue22,$showValue22,$eanValue23,$kodValue23,$vyrobekValue23,$ksBalValue23,$ksValue23,$poznamkyValue23,$cenaMoValue23,$cenaCelkemValue23,$showValue23,$eanValue24,$kodValue24,$vyrobekValue24,$ksBalValue24,$ksValue24,$poznamkyValue24,$cenaMoValue24,$cenaCelkemValue24,$showValue24,$eanValue25,$kodValue25,$vyrobekValue25,$ksBalValue25,$ksValue25,$poznamkyValue25,$cenaMoValue25,$cenaCelkemValue25,$showValue25,$eanValue26,$kodValue26,$vyrobekValue26,$ksBalValue26,$ksValue26,$poznamkyValue26,$cenaMoValue26,$cenaCelkemValue26,$showValue26,$eanValue27,$kodValue27,$vyrobekValue27,$ksBalValue27,$ksValue27,$poznamkyValue27,$cenaMoValue27,$cenaCelkemValue27,$showValue27,$eanValue28,$kodValue28,$vyrobekValue28,$ksBalValue28,$ksValue28,$poznamkyValue28,$cenaMoValue28,$cenaCelkemValue28,$showValue28,$eanValue29,$kodValue29,$vyrobekValue29,$ksBalValue29,$ksValue29,$poznamkyValue29,$cenaMoValue29,$cenaCelkemValue29,$showValue29,$eanValue30,$kodValue30,$vyrobekValue30,$ksBalValue30,$ksValue30,$poznamkyValue30,$cenaMoValue30,$cenaCelkemValue30,$showValue30,$eanValue31,$kodValue31,$vyrobekValue31,$ksBalValue31,$ksValue31,$poznamkyValue31,$cenaMoValue31,$cenaCelkemValue31,$showValue31,$eanValue32,$kodValue32,$vyrobekValue32,$ksBalValue32,$ksValue32,$poznamkyValue32,$cenaMoValue32,$cenaCelkemValue32,$showValue32,$eanValue33,$kodValue33,$vyrobekValue33,$ksBalValue33,$ksValue33,$poznamkyValue33,$cenaMoValue33,$cenaCelkemValue33,$showValue33,$eanValue34,$kodValue34,$vyrobekValue34,$ksBalValue34,$ksValue34,$poznamkyValue34,$cenaMoValue34,$cenaCelkemValue34,$showValue34,$eanValue35,$kodValue35,$vyrobekValue35,$ksBalValue35,$ksValue35,$poznamkyValue35,$cenaMoValue35,$cenaCelkemValue35,$showValue35,$eanValue36,$kodValue36,$vyrobekValue36,$ksBalValue36,$ksValue36,$poznamkyValue36,$cenaMoValue36,$cenaCelkemValue36,$showValue36,$eanValue37,$kodValue37,$vyrobekValue37,$ksBalValue37,$ksValue37,$poznamkyValue37,$cenaMoValue37,$cenaCelkemValue37,$showValue37,$eanValue38,$kodValue38,$vyrobekValue38,$ksBalValue38,$ksValue38,$poznamkyValue38,$cenaMoValue38,$cenaCelkemValue38,$showValue38,$eanValue39,$kodValue39,$vyrobekValue39,$ksBalValue39,$ksValue39,$poznamkyValue39,$cenaMoValue39,$cenaCelkemValue39,$showValue39,$eanValue40,$kodValue40,$vyrobekValue40,$ksBalValue40,$ksValue40,$poznamkyValue40,$cenaMoValue40,$cenaCelkemValue40,$showValue40,$eanValue41,$kodValue41,$vyrobekValue41,$ksBalValue41,$ksValue41,$poznamkyValue41,$cenaMoValue41,$cenaCelkemValue41,$showValue41,$eanValue42,$kodValue42,$vyrobekValue42,$ksBalValue42,$ksValue42,$poznamkyValue42,$cenaMoValue42,$cenaCelkemValue42,$showValue42,$eanValue43,$kodValue43,$vyrobekValue43,$ksBalValue43,$ksValue43,$poznamkyValue43,$cenaMoValue43,$cenaCelkemValue43,$showValue43,$eanValue44,$kodValue44,$vyrobekValue44,$ksBalValue44,$ksValue44,$poznamkyValue44,$cenaMoValue44,$cenaCelkemValue44,$showValue44,$eanValue45,$kodValue45,$vyrobekValue45,$ksBalValue45,$ksValue45,$poznamkyValue45,$cenaMoValue45,$cenaCelkemValue45,$showValue45,$eanValue46,$kodValue46,$vyrobekValue46,$ksBalValue46,$ksValue46,$poznamkyValue46,$cenaMoValue46,$cenaCelkemValue46,$showValue46,$eanValue47,$kodValue47,$vyrobekValue47,$ksBalValue47,$ksValue47,$poznamkyValue47,$cenaMoValue47,$cenaCelkemValue47,$showValue47,$eanValue48,$kodValue48,$vyrobekValue48,$ksBalValue48,$ksValue48,$poznamkyValue48,$cenaMoValue48,$cenaCelkemValue48,$showValue48,$eanValue49,$kodValue49,$vyrobekValue49,$ksBalValue49,$ksValue49,$poznamkyValue49,$cenaMoValue49,$cenaCelkemValue49,$showValue49,$eanValue50,$kodValue50,$vyrobekValue50,$ksBalValue50,$ksValue50,$poznamkyValue50,$cenaMoValue50,$cenaCelkemValue50,$showValue50
 )   {

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
					<h2>Upravit produkty</h2>
					<?php //require("form-maker-default-values.php"); ?>
					<?php if (!empty($messageSuccess)) { echo '<div class="message-success">'.$messageSuccess.'</div>';	} ?>
					<?php if (!empty($messageError))   { echo '<div class="message-error">'.$messageError.'</div>';	} ?>

					<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="register" class="form-maker clearfix">

						<!--<input type="text" placeholder="Název formuláře včetně roku" class="w100 center" name="nazev" minlength="5" required="required" value="<?php //echo $nazevFormulare; ?>">-->

						<?php echo "$eanValue1"; ?>

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
						<?php //require("../country.php"); ?>
						<br>
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

}


// connect to the database

require_once("login-db.php");
$error = false;
$messageError = "";
$messageSuccess = "";





if ($_SERVER['REQUEST_METHOD'] == 'POST' ) { // confirm that the 'id' value is a valid integer before getting the form data

	//echo "Zmáčkl se submit.";


	if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

		//$id 								= 	$_POST['id_form'];
		$id = $_GET['id'];
		//$odpoved = "Nápověda pro promotérky";

		$userStat  		= $_POST['stat']; 
		$valueStat 		= $userStat;

		//echo $nazevFormulare."<br>";
		//echo $product1[4]."<br>";
		//echo $product2[1]."<br>";
		//echo $product3[1]."<br>";
		//echo $product4[1]."<br>";
		
		while (1) {
			
			$eanValue = "eanValue".($i+1);
			$kodValue = "kodValue".($i+1);
			$vyrobekValue = "vyrobekValue".($i+1);
			$ksBalValue = "ksBalValue".($i+1);
			$ksValue = "ksValue".($i+1);
			$poznamkyValue = "poznamkyValue".($i+1);
			$cenaMoValue = "cenaMoValue".($i+1);
			$cenaCelkemValue = "cenaCelkemValue".($i+1);
			$showValue = "showValue".($i+1);

			$eanTemp = "ean".($i+1);
			${$eanValue} = $_POST[$eanTemp];
			$kodTemp = "kod".($i+1);
			${$kodValue} = $_POST[$kodTemp];
			$vyrobekTemp = "vyrobek".($i+1);
			${$vyrobekValue} = $_POST[$vyrobekTemp];
			$ksBalTemp = "ksBal".($i+1);
			${$ksBalValue} = $_POST[$ksBalTemp];
			$ksTemp = "ks".($i+1);
			${$ksValue} = $_POST[$ksTemp];
			$poznamkyTemp = "poznamky".($i+1);
			${$poznamkyValue} = $_POST[$poznamkyTemp];
			$cenaMoTemp = "cenaMo".($i+1);
			${$cenaMoValue} = $_POST[$cenaMoTemp];
			$cenaCelkemTemp = "cenaCelkem".($i+1);
			${$cenaCelkemValue} = $_POST[$cenaCelkemTemp];
			$showTemp = "show".($i+1);
			//${$showValue} = $_POST[$showTemp];

			if (!empty($_POST[$showTemp])) {
				${$showValue} = $_POST[$showTemp];
			}
			if (!empty(${$showValue})) {
				${$showValue} = "ano";
			}
			else {
				${$showValue} = "ne";
			}

			if (empty(${$eanValue})&&empty(${$kodValue})) {
				break;
			}

			$sqlProduct .= "(\"$project\",\"${$eanValue}\",\"${$kodValue}\",\"${$vyrobekValue}\",\"${$ksBalValue}\",\"${$ksValue}\",\"${$poznamkyValue}\",\"${$cenaMoValue}\",\"${$cenaCelkemValue}\",\"${$showValue}\",\"$stat\"),";

			//echo "${$eanValue}<br>";

			$i++;
		}

		if ( $error == false ) {
			$conn = dbConnect(); // Připojíme se k databázi
			mysqli_query($conn, "SET NAMES utf8");

			//Kontrola, zda není formulář v databázi
			$sql  = "SELECT nazev_formulare FROM form WHERE nazev_formulare='$name' AND id_form!='$id'";
			//$data = mysqli_query($conn, $sql);
			if ( $data = mysqli_query($conn, $sql) ) {
				$row  = mysqli_fetch_row($data);

				//$row = NULL;

				if ($row != NULL) {
					$messageError = "Nelze přidat, formulář s tímto jménem a adresou již je v databázi.";
					//echo "Nelze přidat, formulář s tímto jménem a adresou již je v databázi.";
					dbClose($conn);
					renderForm( $id, $messageSuccess, $messageError,$eanValue1,$kodValue1,$vyrobekValue1,$ksBalValue1,$ksValue1,$poznamkyValue1,$cenaMoValue1,$cenaCelkemValue1,$showValue1,$eanValue2,$kodValue2,$vyrobekValue2,$ksBalValue2,$ksValue2,$poznamkyValue2,$cenaMoValue2,$cenaCelkemValue2,$showValue2,$eanValue3,$kodValue3,$vyrobekValue3,$ksBalValue3,$ksValue3,$poznamkyValue3,$cenaMoValue3,$cenaCelkemValue3,$showValue3,$eanValue4,$kodValue4,$vyrobekValue4,$ksBalValue4,$ksValue4,$poznamkyValue4,$cenaMoValue4,$cenaCelkemValue4,$showValue4,$eanValue5,$kodValue5,$vyrobekValue5,$ksBalValue5,$ksValue5,$poznamkyValue5,$cenaMoValue5,$cenaCelkemValue5,$showValue5,$eanValue6,$kodValue6,$vyrobekValue6,$ksBalValue6,$ksValue6,$poznamkyValue6,$cenaMoValue6,$cenaCelkemValue6,$showValue6,$eanValue7,$kodValue7,$vyrobekValue7,$ksBalValue7,$ksValue7,$poznamkyValue7,$cenaMoValue7,$cenaCelkemValue7,$showValue7,$eanValue8,$kodValue8,$vyrobekValue8,$ksBalValue8,$ksValue8,$poznamkyValue8,$cenaMoValue8,$cenaCelkemValue8,$showValue8,$eanValue9,$kodValue9,$vyrobekValue9,$ksBalValue9,$ksValue9,$poznamkyValue9,$cenaMoValue9,$cenaCelkemValue9,$showValue9,$eanValue10,$kodValue10,$vyrobekValue10,$ksBalValue10,$ksValue10,$poznamkyValue10,$cenaMoValue10,$cenaCelkemValue10,$showValue10,$eanValue11,$kodValue11,$vyrobekValue11,$ksBalValue11,$ksValue11,$poznamkyValue11,$cenaMoValue11,$cenaCelkemValue11,$showValue11,$eanValue12,$kodValue12,$vyrobekValue12,$ksBalValue12,$ksValue12,$poznamkyValue12,$cenaMoValue12,$cenaCelkemValue12,$showValue12,$eanValue13,$kodValue13,$vyrobekValue13,$ksBalValue13,$ksValue13,$poznamkyValue13,$cenaMoValue13,$cenaCelkemValue13,$showValue13,$eanValue14,$kodValue14,$vyrobekValue14,$ksBalValue14,$ksValue14,$poznamkyValue14,$cenaMoValue14,$cenaCelkemValue14,$showValue14,$eanValue15,$kodValue15,$vyrobekValue15,$ksBalValue15,$ksValue15,$poznamkyValue15,$cenaMoValue15,$cenaCelkemValue15,$showValue15,$eanValue16,$kodValue16,$vyrobekValue16,$ksBalValue16,$ksValue16,$poznamkyValue16,$cenaMoValue16,$cenaCelkemValue16,$showValue16,$eanValue17,$kodValue17,$vyrobekValue17,$ksBalValue17,$ksValue17,$poznamkyValue17,$cenaMoValue17,$cenaCelkemValue17,$showValue17,$eanValue18,$kodValue18,$vyrobekValue18,$ksBalValue18,$ksValue18,$poznamkyValue18,$cenaMoValue18,$cenaCelkemValue18,$showValue18,$eanValue19,$kodValue19,$vyrobekValue19,$ksBalValue19,$ksValue19,$poznamkyValue19,$cenaMoValue19,$cenaCelkemValue19,$showValue19,$eanValue20,$kodValue20,$vyrobekValue20,$ksBalValue20,$ksValue20,$poznamkyValue20,$cenaMoValue20,$cenaCelkemValue20,$showValue20,$eanValue21,$kodValue21,$vyrobekValue21,$ksBalValue21,$ksValue21,$poznamkyValue21,$cenaMoValue21,$cenaCelkemValue21,$showValue21,$eanValue22,$kodValue22,$vyrobekValue22,$ksBalValue22,$ksValue22,$poznamkyValue22,$cenaMoValue22,$cenaCelkemValue22,$showValue22,$eanValue23,$kodValue23,$vyrobekValue23,$ksBalValue23,$ksValue23,$poznamkyValue23,$cenaMoValue23,$cenaCelkemValue23,$showValue23,$eanValue24,$kodValue24,$vyrobekValue24,$ksBalValue24,$ksValue24,$poznamkyValue24,$cenaMoValue24,$cenaCelkemValue24,$showValue24,$eanValue25,$kodValue25,$vyrobekValue25,$ksBalValue25,$ksValue25,$poznamkyValue25,$cenaMoValue25,$cenaCelkemValue25,$showValue25,$eanValue26,$kodValue26,$vyrobekValue26,$ksBalValue26,$ksValue26,$poznamkyValue26,$cenaMoValue26,$cenaCelkemValue26,$showValue26,$eanValue27,$kodValue27,$vyrobekValue27,$ksBalValue27,$ksValue27,$poznamkyValue27,$cenaMoValue27,$cenaCelkemValue27,$showValue27,$eanValue28,$kodValue28,$vyrobekValue28,$ksBalValue28,$ksValue28,$poznamkyValue28,$cenaMoValue28,$cenaCelkemValue28,$showValue28,$eanValue29,$kodValue29,$vyrobekValue29,$ksBalValue29,$ksValue29,$poznamkyValue29,$cenaMoValue29,$cenaCelkemValue29,$showValue29,$eanValue30,$kodValue30,$vyrobekValue30,$ksBalValue30,$ksValue30,$poznamkyValue30,$cenaMoValue30,$cenaCelkemValue30,$showValue30,$eanValue31,$kodValue31,$vyrobekValue31,$ksBalValue31,$ksValue31,$poznamkyValue31,$cenaMoValue31,$cenaCelkemValue31,$showValue31,$eanValue32,$kodValue32,$vyrobekValue32,$ksBalValue32,$ksValue32,$poznamkyValue32,$cenaMoValue32,$cenaCelkemValue32,$showValue32,$eanValue33,$kodValue33,$vyrobekValue33,$ksBalValue33,$ksValue33,$poznamkyValue33,$cenaMoValue33,$cenaCelkemValue33,$showValue33,$eanValue34,$kodValue34,$vyrobekValue34,$ksBalValue34,$ksValue34,$poznamkyValue34,$cenaMoValue34,$cenaCelkemValue34,$showValue34,$eanValue35,$kodValue35,$vyrobekValue35,$ksBalValue35,$ksValue35,$poznamkyValue35,$cenaMoValue35,$cenaCelkemValue35,$showValue35,$eanValue36,$kodValue36,$vyrobekValue36,$ksBalValue36,$ksValue36,$poznamkyValue36,$cenaMoValue36,$cenaCelkemValue36,$showValue36,$eanValue37,$kodValue37,$vyrobekValue37,$ksBalValue37,$ksValue37,$poznamkyValue37,$cenaMoValue37,$cenaCelkemValue37,$showValue37,$eanValue38,$kodValue38,$vyrobekValue38,$ksBalValue38,$ksValue38,$poznamkyValue38,$cenaMoValue38,$cenaCelkemValue38,$showValue38,$eanValue39,$kodValue39,$vyrobekValue39,$ksBalValue39,$ksValue39,$poznamkyValue39,$cenaMoValue39,$cenaCelkemValue39,$showValue39,$eanValue40,$kodValue40,$vyrobekValue40,$ksBalValue40,$ksValue40,$poznamkyValue40,$cenaMoValue40,$cenaCelkemValue40,$showValue40,$eanValue41,$kodValue41,$vyrobekValue41,$ksBalValue41,$ksValue41,$poznamkyValue41,$cenaMoValue41,$cenaCelkemValue41,$showValue41,$eanValue42,$kodValue42,$vyrobekValue42,$ksBalValue42,$ksValue42,$poznamkyValue42,$cenaMoValue42,$cenaCelkemValue42,$showValue42,$eanValue43,$kodValue43,$vyrobekValue43,$ksBalValue43,$ksValue43,$poznamkyValue43,$cenaMoValue43,$cenaCelkemValue43,$showValue43,$eanValue44,$kodValue44,$vyrobekValue44,$ksBalValue44,$ksValue44,$poznamkyValue44,$cenaMoValue44,$cenaCelkemValue44,$showValue44,$eanValue45,$kodValue45,$vyrobekValue45,$ksBalValue45,$ksValue45,$poznamkyValue45,$cenaMoValue45,$cenaCelkemValue45,$showValue45,$eanValue46,$kodValue46,$vyrobekValue46,$ksBalValue46,$ksValue46,$poznamkyValue46,$cenaMoValue46,$cenaCelkemValue46,$showValue46,$eanValue47,$kodValue47,$vyrobekValue47,$ksBalValue47,$ksValue47,$poznamkyValue47,$cenaMoValue47,$cenaCelkemValue47,$showValue47,$eanValue48,$kodValue48,$vyrobekValue48,$ksBalValue48,$ksValue48,$poznamkyValue48,$cenaMoValue48,$cenaCelkemValue48,$showValue48,$eanValue49,$kodValue49,$vyrobekValue49,$ksBalValue49,$ksValue49,$poznamkyValue49,$cenaMoValue49,$cenaCelkemValue49,$showValue49,$eanValue50,$kodValue50,$vyrobekValue50,$ksBalValue50,$ksValue50,$poznamkyValue50,$cenaMoValue50,$cenaCelkemValue50,$showValue50
 );
				}
				else {
					$sql = "UPDATE form SET nazev_formulare = '$name', produkt_1 = '$allProduct1', produkt_2 = '$allProduct2', produkt_3 = '$allProduct3', produkt_4 = '$allProduct4', produkt_5 = '$allProduct5', produkt_6 = '$allProduct6', produkt_7 = '$allProduct7', produkt_8 = '$allProduct8', produkt_9 = '$allProduct9', produkt_10 = '$allProduct10', produkt_11 = '$allProduct11', produkt_12 = '$allProduct12', produkt_13 = '$allProduct13', produkt_14 = '$allProduct14', produkt_15 = '$allProduct15', produkt_16 = '$allProduct16', produkt_17 = '$allProduct17', produkt_18 = '$allProduct18', produkt_19 = '$allProduct19', produkt_20 = '$allProduct20', otazka_1 = '$allQuestion1', otazka_2 = '$allQuestion2', otazka_3 = '$allQuestion3', otazka_4 = '$allQuestion4', otazka_5 = '$allQuestion5', otazka_6 = '$allQuestion6', otazka_7 = '$allQuestion7', otazka_8 = '$allQuestion8', otazka_9 = '$allQuestion9', otazka_10 = '$allQuestion10', otazka_11 = '$allQuestion11', otazka_12 = '$allQuestion12', otazka_13 = '$allQuestion13', otazka_14 = '$allQuestion14', otazka_15 = '$allQuestion15', darek_1 = '$allGift1', darek_2 = '$allGift2', darek_3 = '$allGift3', darek_4 = '$allGift4', darek_5 = '$allGift5', darek_6 = '$allGift6', darek_7 = '$allGift7', darek_8 = '$allGift8', darek_9 = '$allGift9', darek_10 = '$allGift10', darek_11 = '$allGift11', darek_12 = '$allGift12', darek_13 = '$allGift13', darek_14 = '$allGift14', darek_15 = '$allGift15', darek_16 = '$allGift16', darek_17 = '$allGift17', darek_18 = '$allGift18', darek_19 = '$allGift19', darek_20 = '$allGift20', stat = '$userStat' WHERE id_form='$id'";
					if (mysqli_query($conn, $sql)) {
						
						$messageSuccess = "Formulář upraven.";
						//echo "Lékárna upravena.";
						renderForm( $id, $messageSuccess, $messageError,$eanValue1,$kodValue1,$vyrobekValue1,$ksBalValue1,$ksValue1,$poznamkyValue1,$cenaMoValue1,$cenaCelkemValue1,$showValue1,$eanValue2,$kodValue2,$vyrobekValue2,$ksBalValue2,$ksValue2,$poznamkyValue2,$cenaMoValue2,$cenaCelkemValue2,$showValue2,$eanValue3,$kodValue3,$vyrobekValue3,$ksBalValue3,$ksValue3,$poznamkyValue3,$cenaMoValue3,$cenaCelkemValue3,$showValue3,$eanValue4,$kodValue4,$vyrobekValue4,$ksBalValue4,$ksValue4,$poznamkyValue4,$cenaMoValue4,$cenaCelkemValue4,$showValue4,$eanValue5,$kodValue5,$vyrobekValue5,$ksBalValue5,$ksValue5,$poznamkyValue5,$cenaMoValue5,$cenaCelkemValue5,$showValue5,$eanValue6,$kodValue6,$vyrobekValue6,$ksBalValue6,$ksValue6,$poznamkyValue6,$cenaMoValue6,$cenaCelkemValue6,$showValue6,$eanValue7,$kodValue7,$vyrobekValue7,$ksBalValue7,$ksValue7,$poznamkyValue7,$cenaMoValue7,$cenaCelkemValue7,$showValue7,$eanValue8,$kodValue8,$vyrobekValue8,$ksBalValue8,$ksValue8,$poznamkyValue8,$cenaMoValue8,$cenaCelkemValue8,$showValue8,$eanValue9,$kodValue9,$vyrobekValue9,$ksBalValue9,$ksValue9,$poznamkyValue9,$cenaMoValue9,$cenaCelkemValue9,$showValue9,$eanValue10,$kodValue10,$vyrobekValue10,$ksBalValue10,$ksValue10,$poznamkyValue10,$cenaMoValue10,$cenaCelkemValue10,$showValue10,$eanValue11,$kodValue11,$vyrobekValue11,$ksBalValue11,$ksValue11,$poznamkyValue11,$cenaMoValue11,$cenaCelkemValue11,$showValue11,$eanValue12,$kodValue12,$vyrobekValue12,$ksBalValue12,$ksValue12,$poznamkyValue12,$cenaMoValue12,$cenaCelkemValue12,$showValue12,$eanValue13,$kodValue13,$vyrobekValue13,$ksBalValue13,$ksValue13,$poznamkyValue13,$cenaMoValue13,$cenaCelkemValue13,$showValue13,$eanValue14,$kodValue14,$vyrobekValue14,$ksBalValue14,$ksValue14,$poznamkyValue14,$cenaMoValue14,$cenaCelkemValue14,$showValue14,$eanValue15,$kodValue15,$vyrobekValue15,$ksBalValue15,$ksValue15,$poznamkyValue15,$cenaMoValue15,$cenaCelkemValue15,$showValue15,$eanValue16,$kodValue16,$vyrobekValue16,$ksBalValue16,$ksValue16,$poznamkyValue16,$cenaMoValue16,$cenaCelkemValue16,$showValue16,$eanValue17,$kodValue17,$vyrobekValue17,$ksBalValue17,$ksValue17,$poznamkyValue17,$cenaMoValue17,$cenaCelkemValue17,$showValue17,$eanValue18,$kodValue18,$vyrobekValue18,$ksBalValue18,$ksValue18,$poznamkyValue18,$cenaMoValue18,$cenaCelkemValue18,$showValue18,$eanValue19,$kodValue19,$vyrobekValue19,$ksBalValue19,$ksValue19,$poznamkyValue19,$cenaMoValue19,$cenaCelkemValue19,$showValue19,$eanValue20,$kodValue20,$vyrobekValue20,$ksBalValue20,$ksValue20,$poznamkyValue20,$cenaMoValue20,$cenaCelkemValue20,$showValue20,$eanValue21,$kodValue21,$vyrobekValue21,$ksBalValue21,$ksValue21,$poznamkyValue21,$cenaMoValue21,$cenaCelkemValue21,$showValue21,$eanValue22,$kodValue22,$vyrobekValue22,$ksBalValue22,$ksValue22,$poznamkyValue22,$cenaMoValue22,$cenaCelkemValue22,$showValue22,$eanValue23,$kodValue23,$vyrobekValue23,$ksBalValue23,$ksValue23,$poznamkyValue23,$cenaMoValue23,$cenaCelkemValue23,$showValue23,$eanValue24,$kodValue24,$vyrobekValue24,$ksBalValue24,$ksValue24,$poznamkyValue24,$cenaMoValue24,$cenaCelkemValue24,$showValue24,$eanValue25,$kodValue25,$vyrobekValue25,$ksBalValue25,$ksValue25,$poznamkyValue25,$cenaMoValue25,$cenaCelkemValue25,$showValue25,$eanValue26,$kodValue26,$vyrobekValue26,$ksBalValue26,$ksValue26,$poznamkyValue26,$cenaMoValue26,$cenaCelkemValue26,$showValue26,$eanValue27,$kodValue27,$vyrobekValue27,$ksBalValue27,$ksValue27,$poznamkyValue27,$cenaMoValue27,$cenaCelkemValue27,$showValue27,$eanValue28,$kodValue28,$vyrobekValue28,$ksBalValue28,$ksValue28,$poznamkyValue28,$cenaMoValue28,$cenaCelkemValue28,$showValue28,$eanValue29,$kodValue29,$vyrobekValue29,$ksBalValue29,$ksValue29,$poznamkyValue29,$cenaMoValue29,$cenaCelkemValue29,$showValue29,$eanValue30,$kodValue30,$vyrobekValue30,$ksBalValue30,$ksValue30,$poznamkyValue30,$cenaMoValue30,$cenaCelkemValue30,$showValue30,$eanValue31,$kodValue31,$vyrobekValue31,$ksBalValue31,$ksValue31,$poznamkyValue31,$cenaMoValue31,$cenaCelkemValue31,$showValue31,$eanValue32,$kodValue32,$vyrobekValue32,$ksBalValue32,$ksValue32,$poznamkyValue32,$cenaMoValue32,$cenaCelkemValue32,$showValue32,$eanValue33,$kodValue33,$vyrobekValue33,$ksBalValue33,$ksValue33,$poznamkyValue33,$cenaMoValue33,$cenaCelkemValue33,$showValue33,$eanValue34,$kodValue34,$vyrobekValue34,$ksBalValue34,$ksValue34,$poznamkyValue34,$cenaMoValue34,$cenaCelkemValue34,$showValue34,$eanValue35,$kodValue35,$vyrobekValue35,$ksBalValue35,$ksValue35,$poznamkyValue35,$cenaMoValue35,$cenaCelkemValue35,$showValue35,$eanValue36,$kodValue36,$vyrobekValue36,$ksBalValue36,$ksValue36,$poznamkyValue36,$cenaMoValue36,$cenaCelkemValue36,$showValue36,$eanValue37,$kodValue37,$vyrobekValue37,$ksBalValue37,$ksValue37,$poznamkyValue37,$cenaMoValue37,$cenaCelkemValue37,$showValue37,$eanValue38,$kodValue38,$vyrobekValue38,$ksBalValue38,$ksValue38,$poznamkyValue38,$cenaMoValue38,$cenaCelkemValue38,$showValue38,$eanValue39,$kodValue39,$vyrobekValue39,$ksBalValue39,$ksValue39,$poznamkyValue39,$cenaMoValue39,$cenaCelkemValue39,$showValue39,$eanValue40,$kodValue40,$vyrobekValue40,$ksBalValue40,$ksValue40,$poznamkyValue40,$cenaMoValue40,$cenaCelkemValue40,$showValue40,$eanValue41,$kodValue41,$vyrobekValue41,$ksBalValue41,$ksValue41,$poznamkyValue41,$cenaMoValue41,$cenaCelkemValue41,$showValue41,$eanValue42,$kodValue42,$vyrobekValue42,$ksBalValue42,$ksValue42,$poznamkyValue42,$cenaMoValue42,$cenaCelkemValue42,$showValue42,$eanValue43,$kodValue43,$vyrobekValue43,$ksBalValue43,$ksValue43,$poznamkyValue43,$cenaMoValue43,$cenaCelkemValue43,$showValue43,$eanValue44,$kodValue44,$vyrobekValue44,$ksBalValue44,$ksValue44,$poznamkyValue44,$cenaMoValue44,$cenaCelkemValue44,$showValue44,$eanValue45,$kodValue45,$vyrobekValue45,$ksBalValue45,$ksValue45,$poznamkyValue45,$cenaMoValue45,$cenaCelkemValue45,$showValue45,$eanValue46,$kodValue46,$vyrobekValue46,$ksBalValue46,$ksValue46,$poznamkyValue46,$cenaMoValue46,$cenaCelkemValue46,$showValue46,$eanValue47,$kodValue47,$vyrobekValue47,$ksBalValue47,$ksValue47,$poznamkyValue47,$cenaMoValue47,$cenaCelkemValue47,$showValue47,$eanValue48,$kodValue48,$vyrobekValue48,$ksBalValue48,$ksValue48,$poznamkyValue48,$cenaMoValue48,$cenaCelkemValue48,$showValue48,$eanValue49,$kodValue49,$vyrobekValue49,$ksBalValue49,$ksValue49,$poznamkyValue49,$cenaMoValue49,$cenaCelkemValue49,$showValue49,$eanValue50,$kodValue50,$vyrobekValue50,$ksBalValue50,$ksValue50,$poznamkyValue50,$cenaMoValue50,$cenaCelkemValue50,$showValue50
 );
						//$valueName     	= "";
						//$valueTown		= "";
						//$valueAddress  	= "";

					}
					else {
						$messageError = "Nepodařilo se upravit formulář.";
						//echo "Nepodařilo se upravit lékárnu.";
						dbClose($conn);
						renderForm( $id, $messageSuccess, $messageError,$eanValue1,$kodValue1,$vyrobekValue1,$ksBalValue1,$ksValue1,$poznamkyValue1,$cenaMoValue1,$cenaCelkemValue1,$showValue1,$eanValue2,$kodValue2,$vyrobekValue2,$ksBalValue2,$ksValue2,$poznamkyValue2,$cenaMoValue2,$cenaCelkemValue2,$showValue2,$eanValue3,$kodValue3,$vyrobekValue3,$ksBalValue3,$ksValue3,$poznamkyValue3,$cenaMoValue3,$cenaCelkemValue3,$showValue3,$eanValue4,$kodValue4,$vyrobekValue4,$ksBalValue4,$ksValue4,$poznamkyValue4,$cenaMoValue4,$cenaCelkemValue4,$showValue4,$eanValue5,$kodValue5,$vyrobekValue5,$ksBalValue5,$ksValue5,$poznamkyValue5,$cenaMoValue5,$cenaCelkemValue5,$showValue5,$eanValue6,$kodValue6,$vyrobekValue6,$ksBalValue6,$ksValue6,$poznamkyValue6,$cenaMoValue6,$cenaCelkemValue6,$showValue6,$eanValue7,$kodValue7,$vyrobekValue7,$ksBalValue7,$ksValue7,$poznamkyValue7,$cenaMoValue7,$cenaCelkemValue7,$showValue7,$eanValue8,$kodValue8,$vyrobekValue8,$ksBalValue8,$ksValue8,$poznamkyValue8,$cenaMoValue8,$cenaCelkemValue8,$showValue8,$eanValue9,$kodValue9,$vyrobekValue9,$ksBalValue9,$ksValue9,$poznamkyValue9,$cenaMoValue9,$cenaCelkemValue9,$showValue9,$eanValue10,$kodValue10,$vyrobekValue10,$ksBalValue10,$ksValue10,$poznamkyValue10,$cenaMoValue10,$cenaCelkemValue10,$showValue10,$eanValue11,$kodValue11,$vyrobekValue11,$ksBalValue11,$ksValue11,$poznamkyValue11,$cenaMoValue11,$cenaCelkemValue11,$showValue11,$eanValue12,$kodValue12,$vyrobekValue12,$ksBalValue12,$ksValue12,$poznamkyValue12,$cenaMoValue12,$cenaCelkemValue12,$showValue12,$eanValue13,$kodValue13,$vyrobekValue13,$ksBalValue13,$ksValue13,$poznamkyValue13,$cenaMoValue13,$cenaCelkemValue13,$showValue13,$eanValue14,$kodValue14,$vyrobekValue14,$ksBalValue14,$ksValue14,$poznamkyValue14,$cenaMoValue14,$cenaCelkemValue14,$showValue14,$eanValue15,$kodValue15,$vyrobekValue15,$ksBalValue15,$ksValue15,$poznamkyValue15,$cenaMoValue15,$cenaCelkemValue15,$showValue15,$eanValue16,$kodValue16,$vyrobekValue16,$ksBalValue16,$ksValue16,$poznamkyValue16,$cenaMoValue16,$cenaCelkemValue16,$showValue16,$eanValue17,$kodValue17,$vyrobekValue17,$ksBalValue17,$ksValue17,$poznamkyValue17,$cenaMoValue17,$cenaCelkemValue17,$showValue17,$eanValue18,$kodValue18,$vyrobekValue18,$ksBalValue18,$ksValue18,$poznamkyValue18,$cenaMoValue18,$cenaCelkemValue18,$showValue18,$eanValue19,$kodValue19,$vyrobekValue19,$ksBalValue19,$ksValue19,$poznamkyValue19,$cenaMoValue19,$cenaCelkemValue19,$showValue19,$eanValue20,$kodValue20,$vyrobekValue20,$ksBalValue20,$ksValue20,$poznamkyValue20,$cenaMoValue20,$cenaCelkemValue20,$showValue20,$eanValue21,$kodValue21,$vyrobekValue21,$ksBalValue21,$ksValue21,$poznamkyValue21,$cenaMoValue21,$cenaCelkemValue21,$showValue21,$eanValue22,$kodValue22,$vyrobekValue22,$ksBalValue22,$ksValue22,$poznamkyValue22,$cenaMoValue22,$cenaCelkemValue22,$showValue22,$eanValue23,$kodValue23,$vyrobekValue23,$ksBalValue23,$ksValue23,$poznamkyValue23,$cenaMoValue23,$cenaCelkemValue23,$showValue23,$eanValue24,$kodValue24,$vyrobekValue24,$ksBalValue24,$ksValue24,$poznamkyValue24,$cenaMoValue24,$cenaCelkemValue24,$showValue24,$eanValue25,$kodValue25,$vyrobekValue25,$ksBalValue25,$ksValue25,$poznamkyValue25,$cenaMoValue25,$cenaCelkemValue25,$showValue25,$eanValue26,$kodValue26,$vyrobekValue26,$ksBalValue26,$ksValue26,$poznamkyValue26,$cenaMoValue26,$cenaCelkemValue26,$showValue26,$eanValue27,$kodValue27,$vyrobekValue27,$ksBalValue27,$ksValue27,$poznamkyValue27,$cenaMoValue27,$cenaCelkemValue27,$showValue27,$eanValue28,$kodValue28,$vyrobekValue28,$ksBalValue28,$ksValue28,$poznamkyValue28,$cenaMoValue28,$cenaCelkemValue28,$showValue28,$eanValue29,$kodValue29,$vyrobekValue29,$ksBalValue29,$ksValue29,$poznamkyValue29,$cenaMoValue29,$cenaCelkemValue29,$showValue29,$eanValue30,$kodValue30,$vyrobekValue30,$ksBalValue30,$ksValue30,$poznamkyValue30,$cenaMoValue30,$cenaCelkemValue30,$showValue30,$eanValue31,$kodValue31,$vyrobekValue31,$ksBalValue31,$ksValue31,$poznamkyValue31,$cenaMoValue31,$cenaCelkemValue31,$showValue31,$eanValue32,$kodValue32,$vyrobekValue32,$ksBalValue32,$ksValue32,$poznamkyValue32,$cenaMoValue32,$cenaCelkemValue32,$showValue32,$eanValue33,$kodValue33,$vyrobekValue33,$ksBalValue33,$ksValue33,$poznamkyValue33,$cenaMoValue33,$cenaCelkemValue33,$showValue33,$eanValue34,$kodValue34,$vyrobekValue34,$ksBalValue34,$ksValue34,$poznamkyValue34,$cenaMoValue34,$cenaCelkemValue34,$showValue34,$eanValue35,$kodValue35,$vyrobekValue35,$ksBalValue35,$ksValue35,$poznamkyValue35,$cenaMoValue35,$cenaCelkemValue35,$showValue35,$eanValue36,$kodValue36,$vyrobekValue36,$ksBalValue36,$ksValue36,$poznamkyValue36,$cenaMoValue36,$cenaCelkemValue36,$showValue36,$eanValue37,$kodValue37,$vyrobekValue37,$ksBalValue37,$ksValue37,$poznamkyValue37,$cenaMoValue37,$cenaCelkemValue37,$showValue37,$eanValue38,$kodValue38,$vyrobekValue38,$ksBalValue38,$ksValue38,$poznamkyValue38,$cenaMoValue38,$cenaCelkemValue38,$showValue38,$eanValue39,$kodValue39,$vyrobekValue39,$ksBalValue39,$ksValue39,$poznamkyValue39,$cenaMoValue39,$cenaCelkemValue39,$showValue39,$eanValue40,$kodValue40,$vyrobekValue40,$ksBalValue40,$ksValue40,$poznamkyValue40,$cenaMoValue40,$cenaCelkemValue40,$showValue40,$eanValue41,$kodValue41,$vyrobekValue41,$ksBalValue41,$ksValue41,$poznamkyValue41,$cenaMoValue41,$cenaCelkemValue41,$showValue41,$eanValue42,$kodValue42,$vyrobekValue42,$ksBalValue42,$ksValue42,$poznamkyValue42,$cenaMoValue42,$cenaCelkemValue42,$showValue42,$eanValue43,$kodValue43,$vyrobekValue43,$ksBalValue43,$ksValue43,$poznamkyValue43,$cenaMoValue43,$cenaCelkemValue43,$showValue43,$eanValue44,$kodValue44,$vyrobekValue44,$ksBalValue44,$ksValue44,$poznamkyValue44,$cenaMoValue44,$cenaCelkemValue44,$showValue44,$eanValue45,$kodValue45,$vyrobekValue45,$ksBalValue45,$ksValue45,$poznamkyValue45,$cenaMoValue45,$cenaCelkemValue45,$showValue45,$eanValue46,$kodValue46,$vyrobekValue46,$ksBalValue46,$ksValue46,$poznamkyValue46,$cenaMoValue46,$cenaCelkemValue46,$showValue46,$eanValue47,$kodValue47,$vyrobekValue47,$ksBalValue47,$ksValue47,$poznamkyValue47,$cenaMoValue47,$cenaCelkemValue47,$showValue47,$eanValue48,$kodValue48,$vyrobekValue48,$ksBalValue48,$ksValue48,$poznamkyValue48,$cenaMoValue48,$cenaCelkemValue48,$showValue48,$eanValue49,$kodValue49,$vyrobekValue49,$ksBalValue49,$ksValue49,$poznamkyValue49,$cenaMoValue49,$cenaCelkemValue49,$showValue49,$eanValue50,$kodValue50,$vyrobekValue50,$ksBalValue50,$ksValue50,$poznamkyValue50,$cenaMoValue50,$cenaCelkemValue50,$showValue50
 );

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
				renderForm( $id, $messageSuccess, $messageError,$eanValue1,$kodValue1,$vyrobekValue1,$ksBalValue1,$ksValue1,$poznamkyValue1,$cenaMoValue1,$cenaCelkemValue1,$showValue1,$eanValue2,$kodValue2,$vyrobekValue2,$ksBalValue2,$ksValue2,$poznamkyValue2,$cenaMoValue2,$cenaCelkemValue2,$showValue2,$eanValue3,$kodValue3,$vyrobekValue3,$ksBalValue3,$ksValue3,$poznamkyValue3,$cenaMoValue3,$cenaCelkemValue3,$showValue3,$eanValue4,$kodValue4,$vyrobekValue4,$ksBalValue4,$ksValue4,$poznamkyValue4,$cenaMoValue4,$cenaCelkemValue4,$showValue4,$eanValue5,$kodValue5,$vyrobekValue5,$ksBalValue5,$ksValue5,$poznamkyValue5,$cenaMoValue5,$cenaCelkemValue5,$showValue5,$eanValue6,$kodValue6,$vyrobekValue6,$ksBalValue6,$ksValue6,$poznamkyValue6,$cenaMoValue6,$cenaCelkemValue6,$showValue6,$eanValue7,$kodValue7,$vyrobekValue7,$ksBalValue7,$ksValue7,$poznamkyValue7,$cenaMoValue7,$cenaCelkemValue7,$showValue7,$eanValue8,$kodValue8,$vyrobekValue8,$ksBalValue8,$ksValue8,$poznamkyValue8,$cenaMoValue8,$cenaCelkemValue8,$showValue8,$eanValue9,$kodValue9,$vyrobekValue9,$ksBalValue9,$ksValue9,$poznamkyValue9,$cenaMoValue9,$cenaCelkemValue9,$showValue9,$eanValue10,$kodValue10,$vyrobekValue10,$ksBalValue10,$ksValue10,$poznamkyValue10,$cenaMoValue10,$cenaCelkemValue10,$showValue10,$eanValue11,$kodValue11,$vyrobekValue11,$ksBalValue11,$ksValue11,$poznamkyValue11,$cenaMoValue11,$cenaCelkemValue11,$showValue11,$eanValue12,$kodValue12,$vyrobekValue12,$ksBalValue12,$ksValue12,$poznamkyValue12,$cenaMoValue12,$cenaCelkemValue12,$showValue12,$eanValue13,$kodValue13,$vyrobekValue13,$ksBalValue13,$ksValue13,$poznamkyValue13,$cenaMoValue13,$cenaCelkemValue13,$showValue13,$eanValue14,$kodValue14,$vyrobekValue14,$ksBalValue14,$ksValue14,$poznamkyValue14,$cenaMoValue14,$cenaCelkemValue14,$showValue14,$eanValue15,$kodValue15,$vyrobekValue15,$ksBalValue15,$ksValue15,$poznamkyValue15,$cenaMoValue15,$cenaCelkemValue15,$showValue15,$eanValue16,$kodValue16,$vyrobekValue16,$ksBalValue16,$ksValue16,$poznamkyValue16,$cenaMoValue16,$cenaCelkemValue16,$showValue16,$eanValue17,$kodValue17,$vyrobekValue17,$ksBalValue17,$ksValue17,$poznamkyValue17,$cenaMoValue17,$cenaCelkemValue17,$showValue17,$eanValue18,$kodValue18,$vyrobekValue18,$ksBalValue18,$ksValue18,$poznamkyValue18,$cenaMoValue18,$cenaCelkemValue18,$showValue18,$eanValue19,$kodValue19,$vyrobekValue19,$ksBalValue19,$ksValue19,$poznamkyValue19,$cenaMoValue19,$cenaCelkemValue19,$showValue19,$eanValue20,$kodValue20,$vyrobekValue20,$ksBalValue20,$ksValue20,$poznamkyValue20,$cenaMoValue20,$cenaCelkemValue20,$showValue20,$eanValue21,$kodValue21,$vyrobekValue21,$ksBalValue21,$ksValue21,$poznamkyValue21,$cenaMoValue21,$cenaCelkemValue21,$showValue21,$eanValue22,$kodValue22,$vyrobekValue22,$ksBalValue22,$ksValue22,$poznamkyValue22,$cenaMoValue22,$cenaCelkemValue22,$showValue22,$eanValue23,$kodValue23,$vyrobekValue23,$ksBalValue23,$ksValue23,$poznamkyValue23,$cenaMoValue23,$cenaCelkemValue23,$showValue23,$eanValue24,$kodValue24,$vyrobekValue24,$ksBalValue24,$ksValue24,$poznamkyValue24,$cenaMoValue24,$cenaCelkemValue24,$showValue24,$eanValue25,$kodValue25,$vyrobekValue25,$ksBalValue25,$ksValue25,$poznamkyValue25,$cenaMoValue25,$cenaCelkemValue25,$showValue25,$eanValue26,$kodValue26,$vyrobekValue26,$ksBalValue26,$ksValue26,$poznamkyValue26,$cenaMoValue26,$cenaCelkemValue26,$showValue26,$eanValue27,$kodValue27,$vyrobekValue27,$ksBalValue27,$ksValue27,$poznamkyValue27,$cenaMoValue27,$cenaCelkemValue27,$showValue27,$eanValue28,$kodValue28,$vyrobekValue28,$ksBalValue28,$ksValue28,$poznamkyValue28,$cenaMoValue28,$cenaCelkemValue28,$showValue28,$eanValue29,$kodValue29,$vyrobekValue29,$ksBalValue29,$ksValue29,$poznamkyValue29,$cenaMoValue29,$cenaCelkemValue29,$showValue29,$eanValue30,$kodValue30,$vyrobekValue30,$ksBalValue30,$ksValue30,$poznamkyValue30,$cenaMoValue30,$cenaCelkemValue30,$showValue30,$eanValue31,$kodValue31,$vyrobekValue31,$ksBalValue31,$ksValue31,$poznamkyValue31,$cenaMoValue31,$cenaCelkemValue31,$showValue31,$eanValue32,$kodValue32,$vyrobekValue32,$ksBalValue32,$ksValue32,$poznamkyValue32,$cenaMoValue32,$cenaCelkemValue32,$showValue32,$eanValue33,$kodValue33,$vyrobekValue33,$ksBalValue33,$ksValue33,$poznamkyValue33,$cenaMoValue33,$cenaCelkemValue33,$showValue33,$eanValue34,$kodValue34,$vyrobekValue34,$ksBalValue34,$ksValue34,$poznamkyValue34,$cenaMoValue34,$cenaCelkemValue34,$showValue34,$eanValue35,$kodValue35,$vyrobekValue35,$ksBalValue35,$ksValue35,$poznamkyValue35,$cenaMoValue35,$cenaCelkemValue35,$showValue35,$eanValue36,$kodValue36,$vyrobekValue36,$ksBalValue36,$ksValue36,$poznamkyValue36,$cenaMoValue36,$cenaCelkemValue36,$showValue36,$eanValue37,$kodValue37,$vyrobekValue37,$ksBalValue37,$ksValue37,$poznamkyValue37,$cenaMoValue37,$cenaCelkemValue37,$showValue37,$eanValue38,$kodValue38,$vyrobekValue38,$ksBalValue38,$ksValue38,$poznamkyValue38,$cenaMoValue38,$cenaCelkemValue38,$showValue38,$eanValue39,$kodValue39,$vyrobekValue39,$ksBalValue39,$ksValue39,$poznamkyValue39,$cenaMoValue39,$cenaCelkemValue39,$showValue39,$eanValue40,$kodValue40,$vyrobekValue40,$ksBalValue40,$ksValue40,$poznamkyValue40,$cenaMoValue40,$cenaCelkemValue40,$showValue40,$eanValue41,$kodValue41,$vyrobekValue41,$ksBalValue41,$ksValue41,$poznamkyValue41,$cenaMoValue41,$cenaCelkemValue41,$showValue41,$eanValue42,$kodValue42,$vyrobekValue42,$ksBalValue42,$ksValue42,$poznamkyValue42,$cenaMoValue42,$cenaCelkemValue42,$showValue42,$eanValue43,$kodValue43,$vyrobekValue43,$ksBalValue43,$ksValue43,$poznamkyValue43,$cenaMoValue43,$cenaCelkemValue43,$showValue43,$eanValue44,$kodValue44,$vyrobekValue44,$ksBalValue44,$ksValue44,$poznamkyValue44,$cenaMoValue44,$cenaCelkemValue44,$showValue44,$eanValue45,$kodValue45,$vyrobekValue45,$ksBalValue45,$ksValue45,$poznamkyValue45,$cenaMoValue45,$cenaCelkemValue45,$showValue45,$eanValue46,$kodValue46,$vyrobekValue46,$ksBalValue46,$ksValue46,$poznamkyValue46,$cenaMoValue46,$cenaCelkemValue46,$showValue46,$eanValue47,$kodValue47,$vyrobekValue47,$ksBalValue47,$ksValue47,$poznamkyValue47,$cenaMoValue47,$cenaCelkemValue47,$showValue47,$eanValue48,$kodValue48,$vyrobekValue48,$ksBalValue48,$ksValue48,$poznamkyValue48,$cenaMoValue48,$cenaCelkemValue48,$showValue48,$eanValue49,$kodValue49,$vyrobekValue49,$ksBalValue49,$ksValue49,$poznamkyValue49,$cenaMoValue49,$cenaCelkemValue49,$showValue49,$eanValue50,$kodValue50,$vyrobekValue50,$ksBalValue50,$ksValue50,$poznamkyValue50,$cenaMoValue50,$cenaCelkemValue50,$showValue50
 );
			}
		}
		else {
			$messageError = "Nelze přidat, nejsou vyplněna všechna pole.";
			//echo "Nelze přidat, nejsou vyplněna všechna pole.";
			dbClose($conn);
			renderForm( $id, $messageSuccess, $messageError,$eanValue1,$kodValue1,$vyrobekValue1,$ksBalValue1,$ksValue1,$poznamkyValue1,$cenaMoValue1,$cenaCelkemValue1,$showValue1,$eanValue2,$kodValue2,$vyrobekValue2,$ksBalValue2,$ksValue2,$poznamkyValue2,$cenaMoValue2,$cenaCelkemValue2,$showValue2,$eanValue3,$kodValue3,$vyrobekValue3,$ksBalValue3,$ksValue3,$poznamkyValue3,$cenaMoValue3,$cenaCelkemValue3,$showValue3,$eanValue4,$kodValue4,$vyrobekValue4,$ksBalValue4,$ksValue4,$poznamkyValue4,$cenaMoValue4,$cenaCelkemValue4,$showValue4,$eanValue5,$kodValue5,$vyrobekValue5,$ksBalValue5,$ksValue5,$poznamkyValue5,$cenaMoValue5,$cenaCelkemValue5,$showValue5,$eanValue6,$kodValue6,$vyrobekValue6,$ksBalValue6,$ksValue6,$poznamkyValue6,$cenaMoValue6,$cenaCelkemValue6,$showValue6,$eanValue7,$kodValue7,$vyrobekValue7,$ksBalValue7,$ksValue7,$poznamkyValue7,$cenaMoValue7,$cenaCelkemValue7,$showValue7,$eanValue8,$kodValue8,$vyrobekValue8,$ksBalValue8,$ksValue8,$poznamkyValue8,$cenaMoValue8,$cenaCelkemValue8,$showValue8,$eanValue9,$kodValue9,$vyrobekValue9,$ksBalValue9,$ksValue9,$poznamkyValue9,$cenaMoValue9,$cenaCelkemValue9,$showValue9,$eanValue10,$kodValue10,$vyrobekValue10,$ksBalValue10,$ksValue10,$poznamkyValue10,$cenaMoValue10,$cenaCelkemValue10,$showValue10,$eanValue11,$kodValue11,$vyrobekValue11,$ksBalValue11,$ksValue11,$poznamkyValue11,$cenaMoValue11,$cenaCelkemValue11,$showValue11,$eanValue12,$kodValue12,$vyrobekValue12,$ksBalValue12,$ksValue12,$poznamkyValue12,$cenaMoValue12,$cenaCelkemValue12,$showValue12,$eanValue13,$kodValue13,$vyrobekValue13,$ksBalValue13,$ksValue13,$poznamkyValue13,$cenaMoValue13,$cenaCelkemValue13,$showValue13,$eanValue14,$kodValue14,$vyrobekValue14,$ksBalValue14,$ksValue14,$poznamkyValue14,$cenaMoValue14,$cenaCelkemValue14,$showValue14,$eanValue15,$kodValue15,$vyrobekValue15,$ksBalValue15,$ksValue15,$poznamkyValue15,$cenaMoValue15,$cenaCelkemValue15,$showValue15,$eanValue16,$kodValue16,$vyrobekValue16,$ksBalValue16,$ksValue16,$poznamkyValue16,$cenaMoValue16,$cenaCelkemValue16,$showValue16,$eanValue17,$kodValue17,$vyrobekValue17,$ksBalValue17,$ksValue17,$poznamkyValue17,$cenaMoValue17,$cenaCelkemValue17,$showValue17,$eanValue18,$kodValue18,$vyrobekValue18,$ksBalValue18,$ksValue18,$poznamkyValue18,$cenaMoValue18,$cenaCelkemValue18,$showValue18,$eanValue19,$kodValue19,$vyrobekValue19,$ksBalValue19,$ksValue19,$poznamkyValue19,$cenaMoValue19,$cenaCelkemValue19,$showValue19,$eanValue20,$kodValue20,$vyrobekValue20,$ksBalValue20,$ksValue20,$poznamkyValue20,$cenaMoValue20,$cenaCelkemValue20,$showValue20,$eanValue21,$kodValue21,$vyrobekValue21,$ksBalValue21,$ksValue21,$poznamkyValue21,$cenaMoValue21,$cenaCelkemValue21,$showValue21,$eanValue22,$kodValue22,$vyrobekValue22,$ksBalValue22,$ksValue22,$poznamkyValue22,$cenaMoValue22,$cenaCelkemValue22,$showValue22,$eanValue23,$kodValue23,$vyrobekValue23,$ksBalValue23,$ksValue23,$poznamkyValue23,$cenaMoValue23,$cenaCelkemValue23,$showValue23,$eanValue24,$kodValue24,$vyrobekValue24,$ksBalValue24,$ksValue24,$poznamkyValue24,$cenaMoValue24,$cenaCelkemValue24,$showValue24,$eanValue25,$kodValue25,$vyrobekValue25,$ksBalValue25,$ksValue25,$poznamkyValue25,$cenaMoValue25,$cenaCelkemValue25,$showValue25,$eanValue26,$kodValue26,$vyrobekValue26,$ksBalValue26,$ksValue26,$poznamkyValue26,$cenaMoValue26,$cenaCelkemValue26,$showValue26,$eanValue27,$kodValue27,$vyrobekValue27,$ksBalValue27,$ksValue27,$poznamkyValue27,$cenaMoValue27,$cenaCelkemValue27,$showValue27,$eanValue28,$kodValue28,$vyrobekValue28,$ksBalValue28,$ksValue28,$poznamkyValue28,$cenaMoValue28,$cenaCelkemValue28,$showValue28,$eanValue29,$kodValue29,$vyrobekValue29,$ksBalValue29,$ksValue29,$poznamkyValue29,$cenaMoValue29,$cenaCelkemValue29,$showValue29,$eanValue30,$kodValue30,$vyrobekValue30,$ksBalValue30,$ksValue30,$poznamkyValue30,$cenaMoValue30,$cenaCelkemValue30,$showValue30,$eanValue31,$kodValue31,$vyrobekValue31,$ksBalValue31,$ksValue31,$poznamkyValue31,$cenaMoValue31,$cenaCelkemValue31,$showValue31,$eanValue32,$kodValue32,$vyrobekValue32,$ksBalValue32,$ksValue32,$poznamkyValue32,$cenaMoValue32,$cenaCelkemValue32,$showValue32,$eanValue33,$kodValue33,$vyrobekValue33,$ksBalValue33,$ksValue33,$poznamkyValue33,$cenaMoValue33,$cenaCelkemValue33,$showValue33,$eanValue34,$kodValue34,$vyrobekValue34,$ksBalValue34,$ksValue34,$poznamkyValue34,$cenaMoValue34,$cenaCelkemValue34,$showValue34,$eanValue35,$kodValue35,$vyrobekValue35,$ksBalValue35,$ksValue35,$poznamkyValue35,$cenaMoValue35,$cenaCelkemValue35,$showValue35,$eanValue36,$kodValue36,$vyrobekValue36,$ksBalValue36,$ksValue36,$poznamkyValue36,$cenaMoValue36,$cenaCelkemValue36,$showValue36,$eanValue37,$kodValue37,$vyrobekValue37,$ksBalValue37,$ksValue37,$poznamkyValue37,$cenaMoValue37,$cenaCelkemValue37,$showValue37,$eanValue38,$kodValue38,$vyrobekValue38,$ksBalValue38,$ksValue38,$poznamkyValue38,$cenaMoValue38,$cenaCelkemValue38,$showValue38,$eanValue39,$kodValue39,$vyrobekValue39,$ksBalValue39,$ksValue39,$poznamkyValue39,$cenaMoValue39,$cenaCelkemValue39,$showValue39,$eanValue40,$kodValue40,$vyrobekValue40,$ksBalValue40,$ksValue40,$poznamkyValue40,$cenaMoValue40,$cenaCelkemValue40,$showValue40,$eanValue41,$kodValue41,$vyrobekValue41,$ksBalValue41,$ksValue41,$poznamkyValue41,$cenaMoValue41,$cenaCelkemValue41,$showValue41,$eanValue42,$kodValue42,$vyrobekValue42,$ksBalValue42,$ksValue42,$poznamkyValue42,$cenaMoValue42,$cenaCelkemValue42,$showValue42,$eanValue43,$kodValue43,$vyrobekValue43,$ksBalValue43,$ksValue43,$poznamkyValue43,$cenaMoValue43,$cenaCelkemValue43,$showValue43,$eanValue44,$kodValue44,$vyrobekValue44,$ksBalValue44,$ksValue44,$poznamkyValue44,$cenaMoValue44,$cenaCelkemValue44,$showValue44,$eanValue45,$kodValue45,$vyrobekValue45,$ksBalValue45,$ksValue45,$poznamkyValue45,$cenaMoValue45,$cenaCelkemValue45,$showValue45,$eanValue46,$kodValue46,$vyrobekValue46,$ksBalValue46,$ksValue46,$poznamkyValue46,$cenaMoValue46,$cenaCelkemValue46,$showValue46,$eanValue47,$kodValue47,$vyrobekValue47,$ksBalValue47,$ksValue47,$poznamkyValue47,$cenaMoValue47,$cenaCelkemValue47,$showValue47,$eanValue48,$kodValue48,$vyrobekValue48,$ksBalValue48,$ksValue48,$poznamkyValue48,$cenaMoValue48,$cenaCelkemValue48,$showValue48,$eanValue49,$kodValue49,$vyrobekValue49,$ksBalValue49,$ksValue49,$poznamkyValue49,$cenaMoValue49,$cenaCelkemValue49,$showValue49,$eanValue50,$kodValue50,$vyrobekValue50,$ksBalValue50,$ksValue50,$poznamkyValue50,$cenaMoValue50,$cenaCelkemValue50,$showValue50
 );
		}
	}
	else {
		$messageError = "ID není číselné.";
		//echo "ID není číselné.";
		renderForm( $id, $messageSuccess, $messageError,$eanValue1,$kodValue1,$vyrobekValue1,$ksBalValue1,$ksValue1,$poznamkyValue1,$cenaMoValue1,$cenaCelkemValue1,$showValue1,$eanValue2,$kodValue2,$vyrobekValue2,$ksBalValue2,$ksValue2,$poznamkyValue2,$cenaMoValue2,$cenaCelkemValue2,$showValue2,$eanValue3,$kodValue3,$vyrobekValue3,$ksBalValue3,$ksValue3,$poznamkyValue3,$cenaMoValue3,$cenaCelkemValue3,$showValue3,$eanValue4,$kodValue4,$vyrobekValue4,$ksBalValue4,$ksValue4,$poznamkyValue4,$cenaMoValue4,$cenaCelkemValue4,$showValue4,$eanValue5,$kodValue5,$vyrobekValue5,$ksBalValue5,$ksValue5,$poznamkyValue5,$cenaMoValue5,$cenaCelkemValue5,$showValue5,$eanValue6,$kodValue6,$vyrobekValue6,$ksBalValue6,$ksValue6,$poznamkyValue6,$cenaMoValue6,$cenaCelkemValue6,$showValue6,$eanValue7,$kodValue7,$vyrobekValue7,$ksBalValue7,$ksValue7,$poznamkyValue7,$cenaMoValue7,$cenaCelkemValue7,$showValue7,$eanValue8,$kodValue8,$vyrobekValue8,$ksBalValue8,$ksValue8,$poznamkyValue8,$cenaMoValue8,$cenaCelkemValue8,$showValue8,$eanValue9,$kodValue9,$vyrobekValue9,$ksBalValue9,$ksValue9,$poznamkyValue9,$cenaMoValue9,$cenaCelkemValue9,$showValue9,$eanValue10,$kodValue10,$vyrobekValue10,$ksBalValue10,$ksValue10,$poznamkyValue10,$cenaMoValue10,$cenaCelkemValue10,$showValue10,$eanValue11,$kodValue11,$vyrobekValue11,$ksBalValue11,$ksValue11,$poznamkyValue11,$cenaMoValue11,$cenaCelkemValue11,$showValue11,$eanValue12,$kodValue12,$vyrobekValue12,$ksBalValue12,$ksValue12,$poznamkyValue12,$cenaMoValue12,$cenaCelkemValue12,$showValue12,$eanValue13,$kodValue13,$vyrobekValue13,$ksBalValue13,$ksValue13,$poznamkyValue13,$cenaMoValue13,$cenaCelkemValue13,$showValue13,$eanValue14,$kodValue14,$vyrobekValue14,$ksBalValue14,$ksValue14,$poznamkyValue14,$cenaMoValue14,$cenaCelkemValue14,$showValue14,$eanValue15,$kodValue15,$vyrobekValue15,$ksBalValue15,$ksValue15,$poznamkyValue15,$cenaMoValue15,$cenaCelkemValue15,$showValue15,$eanValue16,$kodValue16,$vyrobekValue16,$ksBalValue16,$ksValue16,$poznamkyValue16,$cenaMoValue16,$cenaCelkemValue16,$showValue16,$eanValue17,$kodValue17,$vyrobekValue17,$ksBalValue17,$ksValue17,$poznamkyValue17,$cenaMoValue17,$cenaCelkemValue17,$showValue17,$eanValue18,$kodValue18,$vyrobekValue18,$ksBalValue18,$ksValue18,$poznamkyValue18,$cenaMoValue18,$cenaCelkemValue18,$showValue18,$eanValue19,$kodValue19,$vyrobekValue19,$ksBalValue19,$ksValue19,$poznamkyValue19,$cenaMoValue19,$cenaCelkemValue19,$showValue19,$eanValue20,$kodValue20,$vyrobekValue20,$ksBalValue20,$ksValue20,$poznamkyValue20,$cenaMoValue20,$cenaCelkemValue20,$showValue20,$eanValue21,$kodValue21,$vyrobekValue21,$ksBalValue21,$ksValue21,$poznamkyValue21,$cenaMoValue21,$cenaCelkemValue21,$showValue21,$eanValue22,$kodValue22,$vyrobekValue22,$ksBalValue22,$ksValue22,$poznamkyValue22,$cenaMoValue22,$cenaCelkemValue22,$showValue22,$eanValue23,$kodValue23,$vyrobekValue23,$ksBalValue23,$ksValue23,$poznamkyValue23,$cenaMoValue23,$cenaCelkemValue23,$showValue23,$eanValue24,$kodValue24,$vyrobekValue24,$ksBalValue24,$ksValue24,$poznamkyValue24,$cenaMoValue24,$cenaCelkemValue24,$showValue24,$eanValue25,$kodValue25,$vyrobekValue25,$ksBalValue25,$ksValue25,$poznamkyValue25,$cenaMoValue25,$cenaCelkemValue25,$showValue25,$eanValue26,$kodValue26,$vyrobekValue26,$ksBalValue26,$ksValue26,$poznamkyValue26,$cenaMoValue26,$cenaCelkemValue26,$showValue26,$eanValue27,$kodValue27,$vyrobekValue27,$ksBalValue27,$ksValue27,$poznamkyValue27,$cenaMoValue27,$cenaCelkemValue27,$showValue27,$eanValue28,$kodValue28,$vyrobekValue28,$ksBalValue28,$ksValue28,$poznamkyValue28,$cenaMoValue28,$cenaCelkemValue28,$showValue28,$eanValue29,$kodValue29,$vyrobekValue29,$ksBalValue29,$ksValue29,$poznamkyValue29,$cenaMoValue29,$cenaCelkemValue29,$showValue29,$eanValue30,$kodValue30,$vyrobekValue30,$ksBalValue30,$ksValue30,$poznamkyValue30,$cenaMoValue30,$cenaCelkemValue30,$showValue30,$eanValue31,$kodValue31,$vyrobekValue31,$ksBalValue31,$ksValue31,$poznamkyValue31,$cenaMoValue31,$cenaCelkemValue31,$showValue31,$eanValue32,$kodValue32,$vyrobekValue32,$ksBalValue32,$ksValue32,$poznamkyValue32,$cenaMoValue32,$cenaCelkemValue32,$showValue32,$eanValue33,$kodValue33,$vyrobekValue33,$ksBalValue33,$ksValue33,$poznamkyValue33,$cenaMoValue33,$cenaCelkemValue33,$showValue33,$eanValue34,$kodValue34,$vyrobekValue34,$ksBalValue34,$ksValue34,$poznamkyValue34,$cenaMoValue34,$cenaCelkemValue34,$showValue34,$eanValue35,$kodValue35,$vyrobekValue35,$ksBalValue35,$ksValue35,$poznamkyValue35,$cenaMoValue35,$cenaCelkemValue35,$showValue35,$eanValue36,$kodValue36,$vyrobekValue36,$ksBalValue36,$ksValue36,$poznamkyValue36,$cenaMoValue36,$cenaCelkemValue36,$showValue36,$eanValue37,$kodValue37,$vyrobekValue37,$ksBalValue37,$ksValue37,$poznamkyValue37,$cenaMoValue37,$cenaCelkemValue37,$showValue37,$eanValue38,$kodValue38,$vyrobekValue38,$ksBalValue38,$ksValue38,$poznamkyValue38,$cenaMoValue38,$cenaCelkemValue38,$showValue38,$eanValue39,$kodValue39,$vyrobekValue39,$ksBalValue39,$ksValue39,$poznamkyValue39,$cenaMoValue39,$cenaCelkemValue39,$showValue39,$eanValue40,$kodValue40,$vyrobekValue40,$ksBalValue40,$ksValue40,$poznamkyValue40,$cenaMoValue40,$cenaCelkemValue40,$showValue40,$eanValue41,$kodValue41,$vyrobekValue41,$ksBalValue41,$ksValue41,$poznamkyValue41,$cenaMoValue41,$cenaCelkemValue41,$showValue41,$eanValue42,$kodValue42,$vyrobekValue42,$ksBalValue42,$ksValue42,$poznamkyValue42,$cenaMoValue42,$cenaCelkemValue42,$showValue42,$eanValue43,$kodValue43,$vyrobekValue43,$ksBalValue43,$ksValue43,$poznamkyValue43,$cenaMoValue43,$cenaCelkemValue43,$showValue43,$eanValue44,$kodValue44,$vyrobekValue44,$ksBalValue44,$ksValue44,$poznamkyValue44,$cenaMoValue44,$cenaCelkemValue44,$showValue44,$eanValue45,$kodValue45,$vyrobekValue45,$ksBalValue45,$ksValue45,$poznamkyValue45,$cenaMoValue45,$cenaCelkemValue45,$showValue45,$eanValue46,$kodValue46,$vyrobekValue46,$ksBalValue46,$ksValue46,$poznamkyValue46,$cenaMoValue46,$cenaCelkemValue46,$showValue46,$eanValue47,$kodValue47,$vyrobekValue47,$ksBalValue47,$ksValue47,$poznamkyValue47,$cenaMoValue47,$cenaCelkemValue47,$showValue47,$eanValue48,$kodValue48,$vyrobekValue48,$ksBalValue48,$ksValue48,$poznamkyValue48,$cenaMoValue48,$cenaCelkemValue48,$showValue48,$eanValue49,$kodValue49,$vyrobekValue49,$ksBalValue49,$ksValue49,$poznamkyValue49,$cenaMoValue49,$cenaCelkemValue49,$showValue49,$eanValue50,$kodValue50,$vyrobekValue50,$ksBalValue50,$ksValue50,$poznamkyValue50,$cenaMoValue50,$cenaCelkemValue50,$showValue50
 );
	}
}
else {
	$messageError = "Nezmáčkl se submit.";
	//$odpoved = "Nápověda pro promotérky";
	//echo "Nezmáčkl se submit.";

	if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) { // query db

		//$renderTemp = "";
		$renderVariables = "";
		$conn = dbConnect();
		$id = $_GET['id'];

		$renderTemp = array($id, $messageSuccess, $messageError);
		//$renderTemp .= "\"$id\", \"$messageSuccess\", \"$messageError\", ";
		$renderVariables .= "\$id, \$messageSuccess, \$messageError,";
		$sql = "SELECT * FROM mdg_product WHERE id_mdg_project=$id ORDER BY vyrobek";
		mysqli_query($conn, "SET NAMES utf8");
		$result = mysqli_query($conn, $sql);
		echo "$sql<br>";

		

		//$row = mysql_fetch_array($result);

		// check that the 'id' matches up with a row in the databse

		if ( $row = mysqli_fetch_row($result) ) { // get data from db
			//$valueName 		= $row[1];
			//$valueTown 		= $row[2];
			//$valueAddress 	= $row[3];
			$counterProducts = 0;

			$i = 0;

			while ($i<50) {
			//while (1) {
				//echo "$i<br>";
				
				$eanValue = "eanValue".($i+1);
				$kodValue = "kodValue".($i+1);
				$vyrobekValue = "vyrobekValue".($i+1);
				$ksBalValue = "ksBalValue".($i+1);
				$ksValue = "ksValue".($i+1);
				$poznamkyValue = "poznamkyValue".($i+1);
				$cenaMoValue = "cenaMoValue".($i+1);
				$cenaCelkemValue = "cenaCelkemValue".($i+1);
				$showValue = "showValue".($i+1);


				$eanTemp = "ean".($i+1);
				${$eanValue} = $row[2];
				$kodTemp = "kod".($i+1);
				${$kodValue} = $row[3];
				$vyrobekTemp = "vyrobek".($i+1);
				${$vyrobekValue} = $row[4];
				$ksBalTemp = "ksBal".($i+1);
				${$ksBalValue} = $row[5];
				$ksTemp = "ks".($i+1);
				${$ksValue} = $row[6];
				$poznamkyTemp = "poznamky".($i+1);
				${$poznamkyValue} = $row[7];
				$cenaMoTemp = "cenaMo".($i+1);
				${$cenaMoValue} = $row[8];
				$cenaCelkemTemp = "cenaCelkem".($i+1);
				${$cenaCelkemValue} = $row[9];
				$showTemp = "show".($i+1);
				//${$showValue} = $_POST[$showTemp];

				if (!empty($_POST[$showTemp])) {
					${$showValue} = $row[10];
				}
				if (!empty(${$showValue})) {
					${$showValue} = "ano";
				}
				else {
					${$showValue} = "ne";
				}

				$valueStat 		= $row[11];


				$renderVariables .= "\$eanValue".($i+1).", ";
				$renderVariables .= "\$kodValue".($i+1).", ";
				$renderVariables .= "\$vyrobekValue".($i+1).", ";
				$renderVariables .= "\$ksBalValue".($i+1).", ";
				$renderVariables .= "\$ksValue".($i+1).", ";
				$renderVariables .= "\$poznamkyValue".($i+1).", ";
				$renderVariables .= "\$cenaMoValue".($i+1).", ";
				$renderVariables .= "\$cenaCelkemValue".($i+1).", ";
				$renderVariables .= "\$showValue".($i+1).", ";

				//$renderTemp .= "\"".${$eanValue}."\",";
				//$renderTemp .= "\"".${$kodValue}."\",";
				//$renderTemp .= "\"".${$vyrobekValue}."\",";
				//$renderTemp .= "\"".${$ksBalValue}."\",";
				//$renderTemp .= "\"".${$ksValue}."\",";
				//$renderTemp .= "\"".${$poznamkyValue}."\",";
				//$renderTemp .= "\"".${$cenaMoValue}."\",";
				//$renderTemp .= "\"".${$cenaCelkemValue}."\",";
				//$renderTemp .= "\"".${$showValue}."\",";
				//$renderTemp .= "\"".$valueStat.",\"";


				//$renderTemp .= "\"".${$eanValue}."\",";
				//$renderTemp .= "\"".${$kodValue}."\",";
				//$renderTemp .= "\"".${$vyrobekValue}."\",";
				//$renderTemp .= "\"".${$ksBalValue}."\",";
				//$renderTemp .= "\"".${$ksValue}."\",";
				//$renderTemp .= "\"".${$poznamkyValue}."\",";
				//$renderTemp .= "\"".${$cenaMoValue}."\",";
				//$renderTemp .= "\"".${$cenaCelkemValue}."\",";
				//$renderTemp .= "\"".${$showValue}."\",";
				//$renderTemp .= "\"".$valueStat."\",";

				array_push($renderTemp, ${$eanValue});
				array_push($renderTemp, ${$kodValue});
				array_push($renderTemp, ${$vyrobekValue});
				array_push($renderTemp, ${$ksBalValue});
				array_push($renderTemp, ${$ksValue});
				array_push($renderTemp, ${$poznamkyValue});
				array_push($renderTemp, ${$cenaMoValue});
				array_push($renderTemp, ${$cenaCelkemValue});
				array_push($renderTemp, ${$showValue});
				array_push($renderTemp, $valueStat);

				if (empty(${$eanValue}) || empty(${$kodValue})) {
					break;
				}

				//$sqlProduct .= "(\"$project\",\"${$eanValue}\",\"${$kodValue}\",\"${$vyrobekValue}\",\"${$ksBalValue}\",\"${$ksValue}\",\"${$poznamkyValue}\",\"${$cenaMoValue}\",\"${$cenaCelkemValue}\",\"${$showValue}\",\"$stat\"),";

				//echo "${$eanValue}<br>";

				$i++;
			}
			$renderVariables = substr($renderVariables, 0, -2);
			//$renderTemp = substr($renderTemp, 0, -1);
			
			echo "renderVariables: ($renderVariables)<br><br><br>";
			echo "renderTemp: ($renderTemp)<br><br><br>";
			for ($i=0; $i < count($renderTemp); $i++) { 
				echo $renderTemp[$i]." ";
			}
			echo "$eanValue1<br>";

			//echo "$userStat<br>";

			$messageError = "";
			$messageSuccess = "Podařilo se načíst formulář";
			//echo "Načti z databáze";
			dbClose($conn);

			//echo $allProduct1;
			//echo $allProduct2;
			//echo $allProduct3;
			//echo $allProduct4;

			//echo `$renderTemp`."<br>";
			
			//renderForm( $renderTemp );
			
			renderForm( $renderTemp );

			//renderForm("1", "", "Nezmáčkl se submit.", "9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse","9","10","11","12","13","14","15","16","ne","vse");






			//renderForm($id, $messageSuccess, $messageError, $nazevFormulare, $valueP1Nazev, $valueP1Cena, $valueP1CenaVoc, $valueP1Pocatek, $valueP1Konec, $valueP1Kusu, $valueP2Nazev, $valueP2Cena, $valueP2CenaVoc, $valueP2Pocatek, $valueP2Konec, $valueP2Kusu, $valueP3Nazev, $valueP3Cena, $valueP3CenaVoc, $valueP3Pocatek, $valueP3Konec, $valueP3Kusu, $valueP4Nazev, $valueP4Cena, $valueP4CenaVoc, $valueP4Pocatek, $valueP4Konec, $valueP4Kusu, $valueP5Nazev, $valueP5Cena, $valueP5CenaVoc, $valueP5Pocatek, $valueP5Konec, $valueP5Kusu, $valueP6Nazev, $valueP6Cena, $valueP6CenaVoc, $valueP6Pocatek, $valueP6Konec, $valueP6Kusu, $valueP7Nazev, $valueP7Cena, $valueP7CenaVoc, $valueP7Pocatek, $valueP7Konec, $valueP7Kusu, $valueP8Nazev, $valueP8Cena, $valueP8CenaVoc, $valueP8Pocatek, $valueP8Konec, $valueP8Kusu, $valueP9Nazev, $valueP9Cena, $valueP9CenaVoc, $valueP9Pocatek, $valueP9Konec, $valueP9Kusu, $valueP10Nazev, $valueP10Cena, $valueP10CenaVoc, $valueP10Pocatek, $valueP10Konec, $valueP10Kusu, $valueP11Nazev, $valueP11Cena, $valueP11CenaVoc, $valueP11Pocatek, $valueP11Konec, $valueP11Kusu, $valueP12Nazev, $valueP12Cena, $valueP12CenaVoc, $valueP12Pocatek, $valueP12Konec, $valueP12Kusu, $valueP13Nazev, $valueP13Cena, $valueP13CenaVoc, $valueP13Pocatek, $valueP13Konec, $valueP13Kusu, $valueP14Nazev, $valueP14Cena, $valueP14CenaVoc, $valueP14Pocatek, $valueP14Konec, $valueP14Kusu, $valueP15Nazev, $valueP15Cena, $valueP15CenaVoc, $valueP15Pocatek, $valueP15Konec, $valueP15Kusu, $valueP16Nazev, $valueP16Cena, $valueP16CenaVoc, $valueP16Pocatek, $valueP16Konec, $valueP16Kusu, $valueP17Nazev, $valueP17Cena, $valueP17CenaVoc, $valueP17Pocatek, $valueP17Konec, $valueP17Kusu, $valueP18Nazev, $valueP18Cena, $valueP18CenaVoc, $valueP18Pocatek, $valueP18Konec, $valueP18Kusu, $valueP19Nazev, $valueP19Cena, $valueP19CenaVoc, $valueP19Pocatek, $valueP19Konec, $valueP19Kusu, $valueP20Nazev, $valueP20Cena, $valueP20CenaVoc, $valueP20Pocatek, $valueP20Konec, $valueP20Kusu, $questionStatic1, $promoQuestion1, $promoAnswer1, $placeholderAnswer1, $questionStatic2, $promoQuestion2, $promoAnswer2, $placeholderAnswer2, $questionStatic3, $promoQuestion3, $promoAnswer3, $placeholderAnswer3, $questionStatic4, $promoQuestion4, $promoAnswer4, $placeholderAnswer4, $questionStatic5, $promoQuestion5, $promoAnswer5, $placeholderAnswer5, $questionStatic6, $promoQuestion6, $promoAnswer6, $placeholderAnswer6, $questionStatic7, $promoQuestion7, $promoAnswer7, $placeholderAnswer7, $questionStatic8, $promoQuestion8, $promoAnswer8, $placeholderAnswer8, $questionStatic9, $promoQuestion9, $promoAnswer9, $placeholderAnswer9, $questionStatic10, $promoQuestion10, $promoAnswer10, $placeholderAnswer10, $questionStatic11, $promoQuestion11, $promoAnswer11, $placeholderAnswer11, $questionStatic12, $promoQuestion12, $promoAnswer12, $placeholderAnswer12, $questionStatic13, $promoQuestion13, $promoAnswer13, $placeholderAnswer13, $questionStatic14, $promoQuestion14, $promoAnswer14, $placeholderAnswer14, $questionStatic15, $promoQuestion15, $promoAnswer15, $placeholderAnswer15, $valueD1Nazev, $valueD1Kusu, $valueD2Nazev, $valueD2Kusu, $valueD3Nazev, $valueD3Kusu, $valueD4Nazev, $valueD4Kusu, $valueD5Nazev, $valueD5Kusu, $valueD6Nazev, $valueD6Kusu, $valueD7Nazev, $valueD7Kusu, $valueD8Nazev, $valueD8Kusu, $valueD9Nazev, $valueD9Kusu, $valueD10Nazev, $valueD10Kusu, $valueD11Nazev, $valueD11Kusu, $valueD12Nazev, $valueD12Kusu, $valueD13Nazev, $valueD13Kusu, $valueD14Nazev, $valueD14Kusu, $valueD15Nazev, $valueD15Kusu, $valueD16Nazev, $valueD16Kusu, $valueD17Nazev, $valueD17Kusu, $valueD18Nazev, $valueD18Kusu, $valueD19Nazev, $valueD19Kusu, $valueD20Nazev, $valueD20Kusu, $userStat );

			//renderForm( $id, $messageSuccess, $messageError,$eanValue1,$kodValue1,$vyrobekValue1,$ksBalValue1,$ksValue1,$poznamkyValue1,$cenaMoValue1,$cenaCelkemValue1,$showValue1,$eanValue2,$kodValue2,$vyrobekValue2,$ksBalValue2,$ksValue2,$poznamkyValue2,$cenaMoValue2,$cenaCelkemValue2,$showValue2,$eanValue3,$kodValue3,$vyrobekValue3,$ksBalValue3,$ksValue3,$poznamkyValue3,$cenaMoValue3,$cenaCelkemValue3,$showValue3,$eanValue4,$kodValue4,$vyrobekValue4,$ksBalValue4,$ksValue4,$poznamkyValue4,$cenaMoValue4,$cenaCelkemValue4,$showValue4,$eanValue5,$kodValue5,$vyrobekValue5,$ksBalValue5,$ksValue5,$poznamkyValue5,$cenaMoValue5,$cenaCelkemValue5,$showValue5,$eanValue6,$kodValue6,$vyrobekValue6,$ksBalValue6,$ksValue6,$poznamkyValue6,$cenaMoValue6,$cenaCelkemValue6,$showValue6,$eanValue7,$kodValue7,$vyrobekValue7,$ksBalValue7,$ksValue7,$poznamkyValue7,$cenaMoValue7,$cenaCelkemValue7,$showValue7,$eanValue8,$kodValue8,$vyrobekValue8,$ksBalValue8,$ksValue8,$poznamkyValue8,$cenaMoValue8,$cenaCelkemValue8,$showValue8,$eanValue9,$kodValue9,$vyrobekValue9,$ksBalValue9,$ksValue9,$poznamkyValue9,$cenaMoValue9,$cenaCelkemValue9,$showValue9,$eanValue10,$kodValue10,$vyrobekValue10,$ksBalValue10,$ksValue10,$poznamkyValue10,$cenaMoValue10,$cenaCelkemValue10,$showValue10,$eanValue11,$kodValue11,$vyrobekValue11,$ksBalValue11,$ksValue11,$poznamkyValue11,$cenaMoValue11,$cenaCelkemValue11,$showValue11,$eanValue12,$kodValue12,$vyrobekValue12,$ksBalValue12,$ksValue12,$poznamkyValue12,$cenaMoValue12,$cenaCelkemValue12,$showValue12,$eanValue13,$kodValue13,$vyrobekValue13,$ksBalValue13,$ksValue13,$poznamkyValue13,$cenaMoValue13,$cenaCelkemValue13,$showValue13,$eanValue14,$kodValue14,$vyrobekValue14,$ksBalValue14,$ksValue14,$poznamkyValue14,$cenaMoValue14,$cenaCelkemValue14,$showValue14,$eanValue15,$kodValue15,$vyrobekValue15,$ksBalValue15,$ksValue15,$poznamkyValue15,$cenaMoValue15,$cenaCelkemValue15,$showValue15,$eanValue16,$kodValue16,$vyrobekValue16,$ksBalValue16,$ksValue16,$poznamkyValue16,$cenaMoValue16,$cenaCelkemValue16,$showValue16,$eanValue17,$kodValue17,$vyrobekValue17,$ksBalValue17,$ksValue17,$poznamkyValue17,$cenaMoValue17,$cenaCelkemValue17,$showValue17,$eanValue18,$kodValue18,$vyrobekValue18,$ksBalValue18,$ksValue18,$poznamkyValue18,$cenaMoValue18,$cenaCelkemValue18,$showValue18,$eanValue19,$kodValue19,$vyrobekValue19,$ksBalValue19,$ksValue19,$poznamkyValue19,$cenaMoValue19,$cenaCelkemValue19,$showValue19,$eanValue20,$kodValue20,$vyrobekValue20,$ksBalValue20,$ksValue20,$poznamkyValue20,$cenaMoValue20,$cenaCelkemValue20,$showValue20,$eanValue21,$kodValue21,$vyrobekValue21,$ksBalValue21,$ksValue21,$poznamkyValue21,$cenaMoValue21,$cenaCelkemValue21,$showValue21,$eanValue22,$kodValue22,$vyrobekValue22,$ksBalValue22,$ksValue22,$poznamkyValue22,$cenaMoValue22,$cenaCelkemValue22,$showValue22,$eanValue23,$kodValue23,$vyrobekValue23,$ksBalValue23,$ksValue23,$poznamkyValue23,$cenaMoValue23,$cenaCelkemValue23,$showValue23,$eanValue24,$kodValue24,$vyrobekValue24,$ksBalValue24,$ksValue24,$poznamkyValue24,$cenaMoValue24,$cenaCelkemValue24,$showValue24,$eanValue25,$kodValue25,$vyrobekValue25,$ksBalValue25,$ksValue25,$poznamkyValue25,$cenaMoValue25,$cenaCelkemValue25,$showValue25,$eanValue26,$kodValue26,$vyrobekValue26,$ksBalValue26,$ksValue26,$poznamkyValue26,$cenaMoValue26,$cenaCelkemValue26,$showValue26,$eanValue27,$kodValue27,$vyrobekValue27,$ksBalValue27,$ksValue27,$poznamkyValue27,$cenaMoValue27,$cenaCelkemValue27,$showValue27,$eanValue28,$kodValue28,$vyrobekValue28,$ksBalValue28,$ksValue28,$poznamkyValue28,$cenaMoValue28,$cenaCelkemValue28,$showValue28,$eanValue29,$kodValue29,$vyrobekValue29,$ksBalValue29,$ksValue29,$poznamkyValue29,$cenaMoValue29,$cenaCelkemValue29,$showValue29,$eanValue30,$kodValue30,$vyrobekValue30,$ksBalValue30,$ksValue30,$poznamkyValue30,$cenaMoValue30,$cenaCelkemValue30,$showValue30,$eanValue31,$kodValue31,$vyrobekValue31,$ksBalValue31,$ksValue31,$poznamkyValue31,$cenaMoValue31,$cenaCelkemValue31,$showValue31,$eanValue32,$kodValue32,$vyrobekValue32,$ksBalValue32,$ksValue32,$poznamkyValue32,$cenaMoValue32,$cenaCelkemValue32,$showValue32,$eanValue33,$kodValue33,$vyrobekValue33,$ksBalValue33,$ksValue33,$poznamkyValue33,$cenaMoValue33,$cenaCelkemValue33,$showValue33,$eanValue34,$kodValue34,$vyrobekValue34,$ksBalValue34,$ksValue34,$poznamkyValue34,$cenaMoValue34,$cenaCelkemValue34,$showValue34,$eanValue35,$kodValue35,$vyrobekValue35,$ksBalValue35,$ksValue35,$poznamkyValue35,$cenaMoValue35,$cenaCelkemValue35,$showValue35,$eanValue36,$kodValue36,$vyrobekValue36,$ksBalValue36,$ksValue36,$poznamkyValue36,$cenaMoValue36,$cenaCelkemValue36,$showValue36,$eanValue37,$kodValue37,$vyrobekValue37,$ksBalValue37,$ksValue37,$poznamkyValue37,$cenaMoValue37,$cenaCelkemValue37,$showValue37,$eanValue38,$kodValue38,$vyrobekValue38,$ksBalValue38,$ksValue38,$poznamkyValue38,$cenaMoValue38,$cenaCelkemValue38,$showValue38,$eanValue39,$kodValue39,$vyrobekValue39,$ksBalValue39,$ksValue39,$poznamkyValue39,$cenaMoValue39,$cenaCelkemValue39,$showValue39,$eanValue40,$kodValue40,$vyrobekValue40,$ksBalValue40,$ksValue40,$poznamkyValue40,$cenaMoValue40,$cenaCelkemValue40,$showValue40,$eanValue41,$kodValue41,$vyrobekValue41,$ksBalValue41,$ksValue41,$poznamkyValue41,$cenaMoValue41,$cenaCelkemValue41,$showValue41,$eanValue42,$kodValue42,$vyrobekValue42,$ksBalValue42,$ksValue42,$poznamkyValue42,$cenaMoValue42,$cenaCelkemValue42,$showValue42,$eanValue43,$kodValue43,$vyrobekValue43,$ksBalValue43,$ksValue43,$poznamkyValue43,$cenaMoValue43,$cenaCelkemValue43,$showValue43,$eanValue44,$kodValue44,$vyrobekValue44,$ksBalValue44,$ksValue44,$poznamkyValue44,$cenaMoValue44,$cenaCelkemValue44,$showValue44,$eanValue45,$kodValue45,$vyrobekValue45,$ksBalValue45,$ksValue45,$poznamkyValue45,$cenaMoValue45,$cenaCelkemValue45,$showValue45,$eanValue46,$kodValue46,$vyrobekValue46,$ksBalValue46,$ksValue46,$poznamkyValue46,$cenaMoValue46,$cenaCelkemValue46,$showValue46,$eanValue47,$kodValue47,$vyrobekValue47,$ksBalValue47,$ksValue47,$poznamkyValue47,$cenaMoValue47,$cenaCelkemValue47,$showValue47,$eanValue48,$kodValue48,$vyrobekValue48,$ksBalValue48,$ksValue48,$poznamkyValue48,$cenaMoValue48,$cenaCelkemValue48,$showValue48,$eanValue49,$kodValue49,$vyrobekValue49,$ksBalValue49,$ksValue49,$poznamkyValue49,$cenaMoValue49,$cenaCelkemValue49,$showValue49,$eanValue50,$kodValue50,$vyrobekValue50,$ksBalValue50,$ksValue50,$poznamkyValue50,$cenaMoValue50,$cenaCelkemValue50,$showValue50 );
		}
		else {
			$messageError = "Nepovedlo se načíst údaje v databázi.";
			//echo "Nepovedlo se načíst údaje v databázi.";
			dbClose($conn);
			renderForm( $id, $messageSuccess, $messageError,$eanValue1,$kodValue1,$vyrobekValue1,$ksBalValue1,$ksValue1,$poznamkyValue1,$cenaMoValue1,$cenaCelkemValue1,$showValue1,$eanValue2,$kodValue2,$vyrobekValue2,$ksBalValue2,$ksValue2,$poznamkyValue2,$cenaMoValue2,$cenaCelkemValue2,$showValue2,$eanValue3,$kodValue3,$vyrobekValue3,$ksBalValue3,$ksValue3,$poznamkyValue3,$cenaMoValue3,$cenaCelkemValue3,$showValue3,$eanValue4,$kodValue4,$vyrobekValue4,$ksBalValue4,$ksValue4,$poznamkyValue4,$cenaMoValue4,$cenaCelkemValue4,$showValue4,$eanValue5,$kodValue5,$vyrobekValue5,$ksBalValue5,$ksValue5,$poznamkyValue5,$cenaMoValue5,$cenaCelkemValue5,$showValue5,$eanValue6,$kodValue6,$vyrobekValue6,$ksBalValue6,$ksValue6,$poznamkyValue6,$cenaMoValue6,$cenaCelkemValue6,$showValue6,$eanValue7,$kodValue7,$vyrobekValue7,$ksBalValue7,$ksValue7,$poznamkyValue7,$cenaMoValue7,$cenaCelkemValue7,$showValue7,$eanValue8,$kodValue8,$vyrobekValue8,$ksBalValue8,$ksValue8,$poznamkyValue8,$cenaMoValue8,$cenaCelkemValue8,$showValue8,$eanValue9,$kodValue9,$vyrobekValue9,$ksBalValue9,$ksValue9,$poznamkyValue9,$cenaMoValue9,$cenaCelkemValue9,$showValue9,$eanValue10,$kodValue10,$vyrobekValue10,$ksBalValue10,$ksValue10,$poznamkyValue10,$cenaMoValue10,$cenaCelkemValue10,$showValue10,$eanValue11,$kodValue11,$vyrobekValue11,$ksBalValue11,$ksValue11,$poznamkyValue11,$cenaMoValue11,$cenaCelkemValue11,$showValue11,$eanValue12,$kodValue12,$vyrobekValue12,$ksBalValue12,$ksValue12,$poznamkyValue12,$cenaMoValue12,$cenaCelkemValue12,$showValue12,$eanValue13,$kodValue13,$vyrobekValue13,$ksBalValue13,$ksValue13,$poznamkyValue13,$cenaMoValue13,$cenaCelkemValue13,$showValue13,$eanValue14,$kodValue14,$vyrobekValue14,$ksBalValue14,$ksValue14,$poznamkyValue14,$cenaMoValue14,$cenaCelkemValue14,$showValue14,$eanValue15,$kodValue15,$vyrobekValue15,$ksBalValue15,$ksValue15,$poznamkyValue15,$cenaMoValue15,$cenaCelkemValue15,$showValue15,$eanValue16,$kodValue16,$vyrobekValue16,$ksBalValue16,$ksValue16,$poznamkyValue16,$cenaMoValue16,$cenaCelkemValue16,$showValue16,$eanValue17,$kodValue17,$vyrobekValue17,$ksBalValue17,$ksValue17,$poznamkyValue17,$cenaMoValue17,$cenaCelkemValue17,$showValue17,$eanValue18,$kodValue18,$vyrobekValue18,$ksBalValue18,$ksValue18,$poznamkyValue18,$cenaMoValue18,$cenaCelkemValue18,$showValue18,$eanValue19,$kodValue19,$vyrobekValue19,$ksBalValue19,$ksValue19,$poznamkyValue19,$cenaMoValue19,$cenaCelkemValue19,$showValue19,$eanValue20,$kodValue20,$vyrobekValue20,$ksBalValue20,$ksValue20,$poznamkyValue20,$cenaMoValue20,$cenaCelkemValue20,$showValue20,$eanValue21,$kodValue21,$vyrobekValue21,$ksBalValue21,$ksValue21,$poznamkyValue21,$cenaMoValue21,$cenaCelkemValue21,$showValue21,$eanValue22,$kodValue22,$vyrobekValue22,$ksBalValue22,$ksValue22,$poznamkyValue22,$cenaMoValue22,$cenaCelkemValue22,$showValue22,$eanValue23,$kodValue23,$vyrobekValue23,$ksBalValue23,$ksValue23,$poznamkyValue23,$cenaMoValue23,$cenaCelkemValue23,$showValue23,$eanValue24,$kodValue24,$vyrobekValue24,$ksBalValue24,$ksValue24,$poznamkyValue24,$cenaMoValue24,$cenaCelkemValue24,$showValue24,$eanValue25,$kodValue25,$vyrobekValue25,$ksBalValue25,$ksValue25,$poznamkyValue25,$cenaMoValue25,$cenaCelkemValue25,$showValue25,$eanValue26,$kodValue26,$vyrobekValue26,$ksBalValue26,$ksValue26,$poznamkyValue26,$cenaMoValue26,$cenaCelkemValue26,$showValue26,$eanValue27,$kodValue27,$vyrobekValue27,$ksBalValue27,$ksValue27,$poznamkyValue27,$cenaMoValue27,$cenaCelkemValue27,$showValue27,$eanValue28,$kodValue28,$vyrobekValue28,$ksBalValue28,$ksValue28,$poznamkyValue28,$cenaMoValue28,$cenaCelkemValue28,$showValue28,$eanValue29,$kodValue29,$vyrobekValue29,$ksBalValue29,$ksValue29,$poznamkyValue29,$cenaMoValue29,$cenaCelkemValue29,$showValue29,$eanValue30,$kodValue30,$vyrobekValue30,$ksBalValue30,$ksValue30,$poznamkyValue30,$cenaMoValue30,$cenaCelkemValue30,$showValue30,$eanValue31,$kodValue31,$vyrobekValue31,$ksBalValue31,$ksValue31,$poznamkyValue31,$cenaMoValue31,$cenaCelkemValue31,$showValue31,$eanValue32,$kodValue32,$vyrobekValue32,$ksBalValue32,$ksValue32,$poznamkyValue32,$cenaMoValue32,$cenaCelkemValue32,$showValue32,$eanValue33,$kodValue33,$vyrobekValue33,$ksBalValue33,$ksValue33,$poznamkyValue33,$cenaMoValue33,$cenaCelkemValue33,$showValue33,$eanValue34,$kodValue34,$vyrobekValue34,$ksBalValue34,$ksValue34,$poznamkyValue34,$cenaMoValue34,$cenaCelkemValue34,$showValue34,$eanValue35,$kodValue35,$vyrobekValue35,$ksBalValue35,$ksValue35,$poznamkyValue35,$cenaMoValue35,$cenaCelkemValue35,$showValue35,$eanValue36,$kodValue36,$vyrobekValue36,$ksBalValue36,$ksValue36,$poznamkyValue36,$cenaMoValue36,$cenaCelkemValue36,$showValue36,$eanValue37,$kodValue37,$vyrobekValue37,$ksBalValue37,$ksValue37,$poznamkyValue37,$cenaMoValue37,$cenaCelkemValue37,$showValue37,$eanValue38,$kodValue38,$vyrobekValue38,$ksBalValue38,$ksValue38,$poznamkyValue38,$cenaMoValue38,$cenaCelkemValue38,$showValue38,$eanValue39,$kodValue39,$vyrobekValue39,$ksBalValue39,$ksValue39,$poznamkyValue39,$cenaMoValue39,$cenaCelkemValue39,$showValue39,$eanValue40,$kodValue40,$vyrobekValue40,$ksBalValue40,$ksValue40,$poznamkyValue40,$cenaMoValue40,$cenaCelkemValue40,$showValue40,$eanValue41,$kodValue41,$vyrobekValue41,$ksBalValue41,$ksValue41,$poznamkyValue41,$cenaMoValue41,$cenaCelkemValue41,$showValue41,$eanValue42,$kodValue42,$vyrobekValue42,$ksBalValue42,$ksValue42,$poznamkyValue42,$cenaMoValue42,$cenaCelkemValue42,$showValue42,$eanValue43,$kodValue43,$vyrobekValue43,$ksBalValue43,$ksValue43,$poznamkyValue43,$cenaMoValue43,$cenaCelkemValue43,$showValue43,$eanValue44,$kodValue44,$vyrobekValue44,$ksBalValue44,$ksValue44,$poznamkyValue44,$cenaMoValue44,$cenaCelkemValue44,$showValue44,$eanValue45,$kodValue45,$vyrobekValue45,$ksBalValue45,$ksValue45,$poznamkyValue45,$cenaMoValue45,$cenaCelkemValue45,$showValue45,$eanValue46,$kodValue46,$vyrobekValue46,$ksBalValue46,$ksValue46,$poznamkyValue46,$cenaMoValue46,$cenaCelkemValue46,$showValue46,$eanValue47,$kodValue47,$vyrobekValue47,$ksBalValue47,$ksValue47,$poznamkyValue47,$cenaMoValue47,$cenaCelkemValue47,$showValue47,$eanValue48,$kodValue48,$vyrobekValue48,$ksBalValue48,$ksValue48,$poznamkyValue48,$cenaMoValue48,$cenaCelkemValue48,$showValue48,$eanValue49,$kodValue49,$vyrobekValue49,$ksBalValue49,$ksValue49,$poznamkyValue49,$cenaMoValue49,$cenaCelkemValue49,$showValue49,$eanValue50,$kodValue50,$vyrobekValue50,$ksBalValue50,$ksValue50,$poznamkyValue50,$cenaMoValue50,$cenaCelkemValue50,$showValue50
 );
		}
		
	}
	else {
		$messageError = "Nepovedlo se změnit údaje v databázi.";
		//echo "Nepovedlo se změnit údaje v databázi.";
		renderForm( $id, $messageSuccess, $messageError,$eanValue1,$kodValue1,$vyrobekValue1,$ksBalValue1,$ksValue1,$poznamkyValue1,$cenaMoValue1,$cenaCelkemValue1,$showValue1,$eanValue2,$kodValue2,$vyrobekValue2,$ksBalValue2,$ksValue2,$poznamkyValue2,$cenaMoValue2,$cenaCelkemValue2,$showValue2,$eanValue3,$kodValue3,$vyrobekValue3,$ksBalValue3,$ksValue3,$poznamkyValue3,$cenaMoValue3,$cenaCelkemValue3,$showValue3,$eanValue4,$kodValue4,$vyrobekValue4,$ksBalValue4,$ksValue4,$poznamkyValue4,$cenaMoValue4,$cenaCelkemValue4,$showValue4,$eanValue5,$kodValue5,$vyrobekValue5,$ksBalValue5,$ksValue5,$poznamkyValue5,$cenaMoValue5,$cenaCelkemValue5,$showValue5,$eanValue6,$kodValue6,$vyrobekValue6,$ksBalValue6,$ksValue6,$poznamkyValue6,$cenaMoValue6,$cenaCelkemValue6,$showValue6,$eanValue7,$kodValue7,$vyrobekValue7,$ksBalValue7,$ksValue7,$poznamkyValue7,$cenaMoValue7,$cenaCelkemValue7,$showValue7,$eanValue8,$kodValue8,$vyrobekValue8,$ksBalValue8,$ksValue8,$poznamkyValue8,$cenaMoValue8,$cenaCelkemValue8,$showValue8,$eanValue9,$kodValue9,$vyrobekValue9,$ksBalValue9,$ksValue9,$poznamkyValue9,$cenaMoValue9,$cenaCelkemValue9,$showValue9,$eanValue10,$kodValue10,$vyrobekValue10,$ksBalValue10,$ksValue10,$poznamkyValue10,$cenaMoValue10,$cenaCelkemValue10,$showValue10,$eanValue11,$kodValue11,$vyrobekValue11,$ksBalValue11,$ksValue11,$poznamkyValue11,$cenaMoValue11,$cenaCelkemValue11,$showValue11,$eanValue12,$kodValue12,$vyrobekValue12,$ksBalValue12,$ksValue12,$poznamkyValue12,$cenaMoValue12,$cenaCelkemValue12,$showValue12,$eanValue13,$kodValue13,$vyrobekValue13,$ksBalValue13,$ksValue13,$poznamkyValue13,$cenaMoValue13,$cenaCelkemValue13,$showValue13,$eanValue14,$kodValue14,$vyrobekValue14,$ksBalValue14,$ksValue14,$poznamkyValue14,$cenaMoValue14,$cenaCelkemValue14,$showValue14,$eanValue15,$kodValue15,$vyrobekValue15,$ksBalValue15,$ksValue15,$poznamkyValue15,$cenaMoValue15,$cenaCelkemValue15,$showValue15,$eanValue16,$kodValue16,$vyrobekValue16,$ksBalValue16,$ksValue16,$poznamkyValue16,$cenaMoValue16,$cenaCelkemValue16,$showValue16,$eanValue17,$kodValue17,$vyrobekValue17,$ksBalValue17,$ksValue17,$poznamkyValue17,$cenaMoValue17,$cenaCelkemValue17,$showValue17,$eanValue18,$kodValue18,$vyrobekValue18,$ksBalValue18,$ksValue18,$poznamkyValue18,$cenaMoValue18,$cenaCelkemValue18,$showValue18,$eanValue19,$kodValue19,$vyrobekValue19,$ksBalValue19,$ksValue19,$poznamkyValue19,$cenaMoValue19,$cenaCelkemValue19,$showValue19,$eanValue20,$kodValue20,$vyrobekValue20,$ksBalValue20,$ksValue20,$poznamkyValue20,$cenaMoValue20,$cenaCelkemValue20,$showValue20,$eanValue21,$kodValue21,$vyrobekValue21,$ksBalValue21,$ksValue21,$poznamkyValue21,$cenaMoValue21,$cenaCelkemValue21,$showValue21,$eanValue22,$kodValue22,$vyrobekValue22,$ksBalValue22,$ksValue22,$poznamkyValue22,$cenaMoValue22,$cenaCelkemValue22,$showValue22,$eanValue23,$kodValue23,$vyrobekValue23,$ksBalValue23,$ksValue23,$poznamkyValue23,$cenaMoValue23,$cenaCelkemValue23,$showValue23,$eanValue24,$kodValue24,$vyrobekValue24,$ksBalValue24,$ksValue24,$poznamkyValue24,$cenaMoValue24,$cenaCelkemValue24,$showValue24,$eanValue25,$kodValue25,$vyrobekValue25,$ksBalValue25,$ksValue25,$poznamkyValue25,$cenaMoValue25,$cenaCelkemValue25,$showValue25,$eanValue26,$kodValue26,$vyrobekValue26,$ksBalValue26,$ksValue26,$poznamkyValue26,$cenaMoValue26,$cenaCelkemValue26,$showValue26,$eanValue27,$kodValue27,$vyrobekValue27,$ksBalValue27,$ksValue27,$poznamkyValue27,$cenaMoValue27,$cenaCelkemValue27,$showValue27,$eanValue28,$kodValue28,$vyrobekValue28,$ksBalValue28,$ksValue28,$poznamkyValue28,$cenaMoValue28,$cenaCelkemValue28,$showValue28,$eanValue29,$kodValue29,$vyrobekValue29,$ksBalValue29,$ksValue29,$poznamkyValue29,$cenaMoValue29,$cenaCelkemValue29,$showValue29,$eanValue30,$kodValue30,$vyrobekValue30,$ksBalValue30,$ksValue30,$poznamkyValue30,$cenaMoValue30,$cenaCelkemValue30,$showValue30,$eanValue31,$kodValue31,$vyrobekValue31,$ksBalValue31,$ksValue31,$poznamkyValue31,$cenaMoValue31,$cenaCelkemValue31,$showValue31,$eanValue32,$kodValue32,$vyrobekValue32,$ksBalValue32,$ksValue32,$poznamkyValue32,$cenaMoValue32,$cenaCelkemValue32,$showValue32,$eanValue33,$kodValue33,$vyrobekValue33,$ksBalValue33,$ksValue33,$poznamkyValue33,$cenaMoValue33,$cenaCelkemValue33,$showValue33,$eanValue34,$kodValue34,$vyrobekValue34,$ksBalValue34,$ksValue34,$poznamkyValue34,$cenaMoValue34,$cenaCelkemValue34,$showValue34,$eanValue35,$kodValue35,$vyrobekValue35,$ksBalValue35,$ksValue35,$poznamkyValue35,$cenaMoValue35,$cenaCelkemValue35,$showValue35,$eanValue36,$kodValue36,$vyrobekValue36,$ksBalValue36,$ksValue36,$poznamkyValue36,$cenaMoValue36,$cenaCelkemValue36,$showValue36,$eanValue37,$kodValue37,$vyrobekValue37,$ksBalValue37,$ksValue37,$poznamkyValue37,$cenaMoValue37,$cenaCelkemValue37,$showValue37,$eanValue38,$kodValue38,$vyrobekValue38,$ksBalValue38,$ksValue38,$poznamkyValue38,$cenaMoValue38,$cenaCelkemValue38,$showValue38,$eanValue39,$kodValue39,$vyrobekValue39,$ksBalValue39,$ksValue39,$poznamkyValue39,$cenaMoValue39,$cenaCelkemValue39,$showValue39,$eanValue40,$kodValue40,$vyrobekValue40,$ksBalValue40,$ksValue40,$poznamkyValue40,$cenaMoValue40,$cenaCelkemValue40,$showValue40,$eanValue41,$kodValue41,$vyrobekValue41,$ksBalValue41,$ksValue41,$poznamkyValue41,$cenaMoValue41,$cenaCelkemValue41,$showValue41,$eanValue42,$kodValue42,$vyrobekValue42,$ksBalValue42,$ksValue42,$poznamkyValue42,$cenaMoValue42,$cenaCelkemValue42,$showValue42,$eanValue43,$kodValue43,$vyrobekValue43,$ksBalValue43,$ksValue43,$poznamkyValue43,$cenaMoValue43,$cenaCelkemValue43,$showValue43,$eanValue44,$kodValue44,$vyrobekValue44,$ksBalValue44,$ksValue44,$poznamkyValue44,$cenaMoValue44,$cenaCelkemValue44,$showValue44,$eanValue45,$kodValue45,$vyrobekValue45,$ksBalValue45,$ksValue45,$poznamkyValue45,$cenaMoValue45,$cenaCelkemValue45,$showValue45,$eanValue46,$kodValue46,$vyrobekValue46,$ksBalValue46,$ksValue46,$poznamkyValue46,$cenaMoValue46,$cenaCelkemValue46,$showValue46,$eanValue47,$kodValue47,$vyrobekValue47,$ksBalValue47,$ksValue47,$poznamkyValue47,$cenaMoValue47,$cenaCelkemValue47,$showValue47,$eanValue48,$kodValue48,$vyrobekValue48,$ksBalValue48,$ksValue48,$poznamkyValue48,$cenaMoValue48,$cenaCelkemValue48,$showValue48,$eanValue49,$kodValue49,$vyrobekValue49,$ksBalValue49,$ksValue49,$poznamkyValue49,$cenaMoValue49,$cenaCelkemValue49,$showValue49,$eanValue50,$kodValue50,$vyrobekValue50,$ksBalValue50,$ksValue50,$poznamkyValue50,$cenaMoValue50,$cenaCelkemValue50,$showValue50
 );
	}

}

?>