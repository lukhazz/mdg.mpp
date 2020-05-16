<?php 

$error = false;
$messageError = "";
$messageSuccess = "";
$i = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) { // confirm that the 'id' value is a valid integer before getting the form data

	//echo "Zmáčkl se submit.<br>";

	if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

		//$id 								= 	$_POST['id_form'];
		$id = $_GET['id'];

		//echo $product4[1]."<br>";
		
		while (1) {
			
			$idValue = "idValue".($i+1);
			$eanValue = "eanValue".($i+1);
			$kodValue = "kodValue".($i+1);
			$vyrobekValue = "vyrobekValue".($i+1);
			$ksBalValue = "ksBalValue".($i+1);
			$ksValue = "ksValue".($i+1);
			$poznamkyValue = "poznamkyValue".($i+1);
			$cenaMoValue = "cenaMoValue".($i+1);
			$cenaCelkemValue = "cenaCelkemValue".($i+1);
			$showValue = "showValue".($i+1);

			$idTemp = "idProduct".($i+1);
			${$idValue} = removeSqlSpecChar($_POST[$idTemp]);
			$eanTemp = "ean".($i+1);
			${$eanValue} = removeSqlSpecChar($_POST[$eanTemp]);
			$kodTemp = "kod".($i+1);
			${$kodValue} = removeSqlSpecChar($_POST[$kodTemp]);
			$vyrobekTemp = "vyrobek".($i+1);
			${$vyrobekValue} = removeSqlSpecChar($_POST[$vyrobekTemp]);
			$ksBalTemp = "ksBal".($i+1);
			${$ksBalValue} = removeSqlSpecChar($_POST[$ksBalTemp]);
			$ksTemp = "ks".($i+1);
			${$ksValue} = removeSqlSpecChar($_POST[$ksTemp]);
			$poznamkyTemp = "poznamky".($i+1);
			${$poznamkyValue} = removeSqlSpecChar($_POST[$poznamkyTemp]);
			$cenaMoTemp = "cenaMo".($i+1);
			${$cenaMoValue} = removeSqlSpecChar($_POST[$cenaMoTemp]);
			$cenaCelkemTemp = "cenaCelkem".($i+1);
			${$cenaCelkemValue} = removeSqlSpecChar($_POST[$cenaCelkemTemp]);
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

			if (empty(${$idValue})) {
				break;
			}

			//$sqlProduct .= "(\"$project\",\"${$eanValue}\",\"${$kodValue}\",\"${$vyrobekValue}\",\"${$ksBalValue}\",\"${$ksValue}\",\"${$poznamkyValue}\",\"${$cenaMoValue}\",\"${$cenaCelkemValue}\",\"${$showValue}\",\"$stat\"),";

			//echo "${$eanValue}<br>";

			$i++;
		}

		if ( $error == false ) {
			$conn = dbConnect(); // Připojíme se k databázi
			mysqli_query($conn, "SET NAMES utf8");

			$sqlProduct = "INSERT INTO mdg_product(id_mdg_project, ean, kod, vyrobek, ks_baleni, ks, poznamky, cena_mo, cena_celkem, zobrazit, stat) VALUES";

			//echo "zadej SQL<br>";
			//$sql = "UPDATE form SET nazev_formulare = '$name', produkt_1 = '$allProduct1', produkt_2 = '$allProduct2', produkt_3 = '$allProduct3', produkt_4 = '$allProduct4', produkt_5 = '$allProduct5', produkt_6 = '$allProduct6', produkt_7 = '$allProduct7', produkt_8 = '$allProduct8', produkt_9 = '$allProduct9', produkt_10 = '$allProduct10', produkt_11 = '$allProduct11', produkt_12 = '$allProduct12', produkt_13 = '$allProduct13', produkt_14 = '$allProduct14', produkt_15 = '$allProduct15', produkt_16 = '$allProduct16', produkt_17 = '$allProduct17', produkt_18 = '$allProduct18', produkt_19 = '$allProduct19', produkt_20 = '$allProduct20', otazka_1 = '$allQuestion1', otazka_2 = '$allQuestion2', otazka_3 = '$allQuestion3', otazka_4 = '$allQuestion4', otazka_5 = '$allQuestion5', otazka_6 = '$allQuestion6', otazka_7 = '$allQuestion7', otazka_8 = '$allQuestion8', otazka_9 = '$allQuestion9', otazka_10 = '$allQuestion10', otazka_11 = '$allQuestion11', otazka_12 = '$allQuestion12', otazka_13 = '$allQuestion13', otazka_14 = '$allQuestion14', otazka_15 = '$allQuestion15', darek_1 = '$allGift1', darek_2 = '$allGift2', darek_3 = '$allGift3', darek_4 = '$allGift4', darek_5 = '$allGift5', darek_6 = '$allGift6', darek_7 = '$allGift7', darek_8 = '$allGift8', darek_9 = '$allGift9', darek_10 = '$allGift10', darek_11 = '$allGift11', darek_12 = '$allGift12', darek_13 = '$allGift13', darek_14 = '$allGift14', darek_15 = '$allGift15', darek_16 = '$allGift16', darek_17 = '$allGift17', darek_18 = '$allGift18', darek_19 = '$allGift19', darek_20 = '$allGift20', stat = '$userStat' WHERE id_form='$id'";


			for ($i=0; $i < $counterProducts; $i++) { 

				//echo "string $i z $counterProducts<br>";

				//$idTemp = "id".($i+1);
				$idTemp = "idProduct".($i+1);
				if (isset($_POST[$idTemp])) { ${$idValue} = $_POST[$idTemp]; }
				else { ${$idValue} = ""; }
				

				$eanTemp = "ean".($i+1);
				if (isset($_POST[$eanTemp])) { ${$eanValue} = removeSqlSpecChar($_POST[$eanTemp]); }
				else { ${$eanValue} = ""; }
				//${$eanValue}  		= $_POST[$eanTemp]; 
				//echo $eanTemp." - ${$eanValue}<br>";

				$kodTemp = "kod".($i+1);
				if (isset($_POST[$cenaCelkemTemp])) { ${$cenaCelkemValue} = removeSqlSpecChar($_POST[$cenaCelkemTemp]); }
				else { ${$cenaCelkemValue} = "0"; }
				//${$kodValue} = $_POST[$kodTemp]; 

				$vyrobekTemp = "vyrobek".($i+1);
				if (isset($_POST[$vyrobekTemp])) { ${$vyrobekValue} = removeSqlSpecChar($_POST[$vyrobekTemp]); }
				else { ${$vyrobekValue} = ""; }
				//${$vyrobekValue} = $_POST[$vyrobekTemp]; 

				$ksBalTemp = "ksBal".($i+1);
				if (!empty($_POST[$ksBalTemp])) { ${$ksBalValue} = $_POST[$ksBalTemp]; }
				else { ${$ksBalValue} = "0"; }
				//${$ksBalValue} = $_POST[$ksBalTemp]; 

				$ksTemp = "ks".($i+1);
				if (isset($_POST[$ksTemp])) { ${$ksValue} = $_POST[$ksTemp]; }
				else { ${$ksValue} = "0"; }
				//${$ksValue} = $_POST[$ksTemp]; 

				$poznamkyTemp = "poznamky".($i+1);
				if (isset($_POST[$poznamkyTemp])) { ${$poznamkyValue} = removeSqlSpecChar($_POST[$poznamkyTemp]); }
				else { ${$poznamkyValue} = " "; }
				//${$poznamkyValue} = $_POST[$poznamkyTemp]; 

				$cenaMoTemp = "cenaMo".($i+1);
				if (isset($_POST[$cenaMoTemp])) { ${$cenaMoValue} = $_POST[$cenaMoTemp]; }
				else { ${$cenaMoValue} = "0"; }
				//${$cenaMoValue} = $_POST[$cenaMoTemp]; 

				$cenaCelkemTemp = "cenaCelkem".($i+1);
				if (isset($_POST[$cenaCelkemTemp])) { ${$cenaCelkemValue} = $_POST[$cenaCelkemTemp]; }
				else { ${$cenaCelkemValue} = "0"; }
				//${$cenaCelkemValue} = $_POST[$cenaCelkemTemp]; 
				
				$showTemp = "show".($i+1);
				if (isset($_POST[$showTemp])) { ${$showValue} = $_POST[$showTemp]; }
				else { ${$showValue} = "ne"; }

				$sqlUpdate = "UPDATE mdg_product SET ean = '${$eanValue}', kod = '${$kodValue}', vyrobek = '${$vyrobekValue}', ks_baleni = '${$ksBalValue}', ks = '${$ksValue}', poznamky = '${$poznamkyValue}', cena_mo = '${$cenaMoValue}', cena_celkem = '${$cenaCelkemValue}', zobrazit = '${$showValue}', stat = ''

					WHERE id_mdg_product='${$idValue}'
				";

				//echo "$sqlUpdate <br>";


				if (mysqli_query($conn, $sqlUpdate)) {
					//echo "${$idValue} - povedlo se zapsat do DB<br>";
					$ms = $messageSuccess = "Povedlo se upravit produkty";
				}
				else {
					//echo "${$idValue} - NEpovedlo se zapsat do DB<br>";	
					$me = $messageError = "Neovedlo se upravit alespoň jeden produkt";				
				}

				
			}

			$vyrobekTemp = "vyrobek".($counterProducts+1);
			//echo "$vyrobekTemp<br>";

			if (!empty($_POST[$vyrobekTemp])) { 
				//echo "Musím uložit nové produkty<br>";
				for ($i=($counterProducts); $i < ($counterProducts+$counterProductsAdditional); $i++) { 
					//echo "$i)<br>";
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

					if (empty(${$vyrobekValue})) {
						break;
					}

					$sqlProduct .= "(\"$id\",\"${$eanValue}\",\"${$kodValue}\",\"${$vyrobekValue}\",\"${$ksBalValue}\",\"${$ksValue}\",\"${$poznamkyValue}\",\"${$cenaMoValue}\",\"${$cenaCelkemValue}\",\"${$showValue}\",\"\"),";



				}

				$sqlProduct = substr($sqlProduct, 0, -1);

				//echo "$sqlProduct<br>";

				if (mysqli_query($conn, $sqlProduct)) {
					//echo "Povedlo se přidat další produkt do DB<br>";
					$ms = $messageSuccess = "Povedlo se přidat další produkt do DB";


				}
				else {
					//echo "Není další produkt<br>";
					$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?id=$id&ms=$ms&me=$me";
					$me = $messageError = "Nepovedlo se přidat další produkt do DB.";
					dbClose($conn);
				}	
			}
			else {
				dbClose($conn);	
				$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?id=$id&ms=$ms&me=$me";
				header("Location: $actual_link");
				//$messageError = "Nelze přidat, nejsou vyplněna všechna pole.";
				//echo "Nelze přidat, nejsou vyplněna všechna pole.";
							
			}		
		}
		else {
			$messageError = "Nelze přidat, nejsou vyplněna všechna pole.";
			//echo "Nelze přidat, nejsou vyplněna všechna pole.";
			dbClose($conn);
			

		}
	}
	else {
		$messageError = "ID není číselné.";
		//echo "ID není číselné.";
		

	}
}
else {
	$messageError = "Nezmáčkl se submit.";
	//$odpoved = "Nápověda pro promotérky";
	//echo "<br>Nezmáčkl se submit.<br><br>";

	if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) { // query db

		//$renderTemp = "";
		$renderVariables = "";
		$conn = dbConnect();
		$id = $_GET['id'];

		$renderTemp = array($id, $messageSuccess, $messageError);
		//$renderTemp .= "\"$id\", \"$messageSuccess\", \"$messageError\", ";
		$renderVariables .= "\$id, \$messageSuccess, \$messageError,";
		$sql = "SELECT * FROM mdg_product WHERE id_mdg_project=$id ORDER BY id_mdg_product";
		mysqli_query($conn, "SET NAMES utf8");
		$result = mysqli_query($conn, $sql);
		//echo "$sql<br>";

		

		//$row = mysql_fetch_array($result);

		// check that the 'id' matches up with a row in the databse

		//if ( $row = mysqli_fetch_row($result) ) { // get data from db
		$i = 0;
		while ( $row = mysqli_fetch_row($result) ) {
			//echo "SQL je správně a data načtu do proměnných. <br>";
			//$valueName 		= $row[1];
			//$valueTown 		= $row[2];
			//$valueAddress 	= $row[3];


			//while ($i<200) {
			//while (1) {
			//for ($k=0; $k < count($row) ; $k++) { 
				
				//echo "$i<br>";
				
				$idValue = "idValue".($i+1);
				$eanValue = "eanValue".($i+1);
				$kodValue = "kodValue".($i+1);
				$vyrobekValue = "vyrobekValue".($i+1);
				$ksBalValue = "ksBalValue".($i+1);
				$ksValue = "ksValue".($i+1);
				$poznamkyValue = "poznamkyValue".($i+1);
				$cenaMoValue = "cenaMoValue".($i+1);
				$cenaCelkemValue = "cenaCelkemValue".($i+1);
				$showValue = "showValue".($i+1);


				//${$idValue} = $row[0];

				$idTemp = "idProduct".($i+1);
				${$idValue} = $row[0];
				//echo $idTemp." - ${$idValue}<br>";


				$eanTemp = "ean".($i+1);
				${$eanValue} = $row[2];



				//echo $eanTemp." - ${$eanValue}<br>";
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
				${$showValue} = $row[10];

				//${$showValue} = $_POST[$showTemp];

				//if (!empty($_POST[$showTemp])) {
				//}
				//if (!empty(${$showValue})) {
				//	${$showValue} = "ano";
				//}
				//else {
				//	${$showValue} = "ne";
				//}
				//echo $showTemp." - ${$showValue}<br>";
				//echo $row[10]."<br>";


				$valueStat 		= $row[11];


				//$renderVariables .= "\$eanValue".($i+1).", ";
				//$renderVariables .= "\$kodValue".($i+1).", ";
				//$renderVariables .= "\$vyrobekValue".($i+1).", ";
				//$renderVariables .= "\$ksBalValue".($i+1).", ";
				//$renderVariables .= "\$ksValue".($i+1).", ";
				//$renderVariables .= "\$poznamkyValue".($i+1).", ";
				//$renderVariables .= "\$cenaMoValue".($i+1).", ";
				//$renderVariables .= "\$cenaCelkemValue".($i+1).", ";
				//$renderVariables .= "\$showValue".($i+1).", ";

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

				//array_push($renderTemp, ${$eanValue});
				//array_push($renderTemp, ${$kodValue});
				//array_push($renderTemp, ${$vyrobekValue});
				//array_push($renderTemp, ${$ksBalValue});
				//array_push($renderTemp, ${$ksValue});
				//array_push($renderTemp, ${$poznamkyValue});
				//array_push($renderTemp, ${$cenaMoValue});
				//array_push($renderTemp, ${$cenaCelkemValue});
				//array_push($renderTemp, ${$showValue});
				//array_push($renderTemp, $valueStat);

				if (empty(${$idValue}) ) {
					break;
				}

				//$sqlProduct .= "(\"$project\",\"${$eanValue}\",\"${$kodValue}\",\"${$vyrobekValue}\",\"${$ksBalValue}\",\"${$ksValue}\",\"${$poznamkyValue}\",\"${$cenaMoValue}\",\"${$cenaCelkemValue}\",\"${$showValue}\",\"$stat\"),";

				//echo "${$eanValue}<br>";

				
			//}


			$i++;

			$renderVariables = substr($renderVariables, 0, -2);
			//$renderTemp = substr($renderTemp, 0, -1);
			
			//echo "renderVariables: ($renderVariables)<br><br><br>";
			//echo "renderTemp: ($renderTemp)<br><br><br>";
			//for ($i=0; $i < count($renderTemp); $i++) { 
			//	echo $renderTemp[$i]." ";
			//}
			//echo "$eanValue1<br>";

			//echo "$userStat<br>";

			$messageError = "";
			$messageSuccess = "Podařilo se načíst formulář";
			//echo "Načti z databáze";
			//dbClose($conn);

			//echo $allProduct1;
			//echo $allProduct2;
			//echo $allProduct3;
			//echo $allProduct4;

			//echo `$renderTemp`."<br>";
			
		}
		//else {
			$messageError = "Nepovedlo se načíst údaje v databázi.";
			//echo "Nepovedlo se načíst údaje v databázi.";
			dbClose($conn);
			

		//}
		
	}
	else {
		$messageError = "Nepovedlo se změnit údaje v databázi.";
		//echo "Nepovedlo se změnit údaje v databázi.";
		

	}

}

?>