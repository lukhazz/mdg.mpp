<?php 

$error = false;
$messageError = "";
$messageSuccess = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) { // confirm that the 'id' value is a valid integer before getting the form data

	//echo "Zmáčkl se submit.<br>";

	//$splneno ="ne"; //Odkomentovat, pokud budu chtit duplicitne pridavat 
	if ($splneno!="ano") {
		//echo "Není splněno.<br>";
		if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
			//echo "ID je větší než nula.<br>";

			//$id 								= 	$_POST['id_form'];
			$id = $_GET['id'];

			//echo $product4[1]."<br>";
			$i = 0;

			if (!empty($_POST['timeFromTo'])) {
				$timeArray 			= $_POST['timeFromTo'];
			}
			else {
				$timeArray 			= NULL;
			}
			if (is_numeric($_POST['km-celkem'])) {
				(int)$kmCelkem 			= $_POST['km-celkem'];
			}
			else {
				(int)$kmCelkem 			= "0";
			}
			
			if (isset($_POST['poznamky'])) { $poznamky = removeSqlSpecChar($_POST['poznamky']); }
			//echo "$kmCelkem";
			if ($timeArray!=NULL) {
				//echo "Chci vypsat čas<br>";
				$time = implode("|", $timeArray);
				//echo vypisCas($timeArray)."<br>";
				//$hours = $timeArray[2]-$timeArray[0];
				//echo $time."<br>";
				$hours = (($timeArray[2]*60+$timeArray[3])-($timeArray[0]*60+$timeArray[1])-30)/60;
				//echo $hours."<br>";
				if ((($hours)*60+30)<=0) {
					$error = true; //zakomentovat pak
					$error_time = "Čas \"Od\" musí být menší než \"Do\"";
				}
				else if ($hours==-0.5) {
					$hours = 0;
				}
			}
			else {
				$error 				= true;
				$messageError 		= "Není zadáný čas.";
			}

			/**************************************************************************
												UPLOAD
			 **************************************************************************/

			$file_prename 			= makeFilePreName( $id );	
			$file_path_original 	= "merchandising/original/".date("Y");
			$file_path_resized 		= "merchandising/resized/".date("Y");
			//echo $file_path."<br>".$file_path_original."<br>".$file_path_resized."<br>".$file_prename."<br>";


			//require("upload-test.php");
			$image1 = $image2 = $image3 = "";

			//$obr1  		= $_FILES['image-1']; 
			//echo "$obr1<br>";

			if (isset($_FILES['image-1'])) {
				//echo "Je vyplněn první obrázek<br>";
				$image1 = uploadMyImage("image-1", $file_path, $file_path_original, $file_path_resized, $file_prename);
				//echo "Obr1 je: $image1<br>";
				if ($image1 == "chyba") {
					$error = true;
					$error_img1 = "Zkontrolujte prosím správnost formátu fotografie: JPG, JPEG nebo PNG a maximální velikost 4MB";
				}
			}

			//$obr2  		= $_FILES['image-2']; 
			//echo "$obr2<br>";
			if (isset($_FILES['image-2']) && $error == false) {
				$image2 = uploadMyImage("image-2", $file_path, $file_path_original, $file_path_resized, $file_prename);
				//echo "Obr2 je: $image2<br>";
				if ($image2 == "chyba") {
					$error = true;
					$error_img2 = "Zkontrolujte prosím správnost formátu fotografie: JPG, JPEG nebo PNG a maximální velikost 4MB";
				}
			}

			//$obr3  		= $_FILES['image-3']; 
			//echo "$obr3<br>";
			if (isset($_FILES['image-3']) && $error == false) {
				$image3 = uploadMyImage("image-3", $file_path, $file_path_original, $file_path_resized, $file_prename);
				//echo "Obr 3 je: $image3<br>";
				if ($image3 == "chyba") {
					$error = true;
					$error_img3 = "Zkontrolujte prosím správnost formátu fotografie: JPG, JPEG nebo PNG a maximální velikost 4MB";
				}
			}
			//if (isset($_POST['image']))  			{ uploadMyImage("image"); $image1  			= $_POST['image']; }
			//if (isset($$_FILES['image-1']))  			{ uploadMyImage("image-1", $file_path, $file_path_original, $file_path_resized, $file_prename); $image1  //			= $_POST['image-1']; }
			//if (isset($$_FILES['image-2']))  			{ uploadMyImage("image-2", $file_path, $file_path_original, $file_path_resized, $file_prename); $image2  //			= $_POST['image-2']; }
			//if (isset($$_FILES['image-3']))  			{ uploadMyImage("image-3", $file_path, $file_path_original, $file_path_resized, $file_prename); $image3  			= $_POST['image-3']; }

			//echo "$image1<br>$image2<br>$image3<br>";
			if (is_array($image1)) { $image1 = ""; }
			if (is_array($image2)) { $image2 = ""; }
			if (is_array($image3)) { $image3 = ""; }
			
			for ($i=0; $i < ($counterProducts); $i++) {
			//while (1) {
				echo "$i)<br>";
				
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
				//if (empty($_POST[$idTemp])) {
				//	break;
				//}
				${$idValue} = $_POST[$idTemp];

				$eanTemp = "ean".($i+1);
				${$eanValue} = removeSqlSpecChar($_POST[$eanTemp]);
				$kodTemp = "kod".($i+1);
				${$kodValue} = removeSqlSpecChar($_POST[$kodTemp]);
				$vyrobekTemp = "vyrobek".($i+1);
				${$vyrobekValue} = removeSqlSpecChar($_POST[$vyrobekTemp]);
				$ksBalTemp = "ksBal".($i+1);
				${$ksBalValue} = $_POST[$ksBalTemp];
				$ksTemp = "ks".($i+1);
				${$ksValue} = $_POST[$ksTemp];
				$poznamkyTemp = "poznamky".($i+1);
				${$poznamkyValue} = removeSqlSpecChar($_POST[$poznamkyTemp]);
				$cenaMoTemp = "cenaMo".($i+1);
				${$cenaMoValue} = $_POST[$cenaMoTemp];
				//$cenaCelkemTemp = "cenaCelkem".($i+1);
				//${$cenaCelkemValue} = $_POST[$cenaCelkemTemp];
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

				

				//$sqlProduct .= "(\"$project\",\"${$eanValue}\",\"${$kodValue}\",\"${$vyrobekValue}\",\"${$ksBalValue}\",\"${$ksValue}\",\"${$poznamkyValue}\",\"${$cenaMoValue}\",\"${$cenaCelkemValue}\",\"${$showValue}\",\"$stat\"),";

				//echo "${$eanValue}<br>";

				//$i++;
			}

			if ( $error == false ) {
				//echo "Není chyba v zadávání<br>";
				$conn = dbConnect(); // Připojíme se k databázi
				mysqli_query($conn, "SET NAMES utf8");

				$sqlProduct = "INSERT INTO mdg_product_filled(id_mdg_product, id_mdg_event, ean, kod, vyrobek, ks_baleni, ks, poznamky, cena_mo, cena_celkem) VALUES";
				$sqlProductBoth = "INSERT INTO mdg_product_both(id_mdg_product, id_mdg_product_filled) VALUES";
				date_default_timezone_set('Europe/Prague');
				$dateSend = date('Y-m-d H:i:s');

				$vyrobekTemp = "vyrobek".($counterProducts+1);
				//echo "$vyrobekTemp<br>";
				//$temp = $_POST['vyrobek333'];
				//echo "$counterProducts - $temp[0]<br>";

				if (!empty($_POST['timeFromTo'])) {
				//if (!empty($_POST[$vyrobekTemp])) { 
					//echo "Musím uložit nové produkty<br>";
					for ($i=0; $i < ($counterProducts); $i++) { 
					//for ($i=0; $i < 100; $i++) { 
						//echo "$i)<br>";
						$idValue = "idValue".($i+1);
						$eanValue = "eanValue".($i+1);
						$kodValue = "kodValue".($i+1);
						$vyrobekValue = "vyrobekValue".($i+1);
						$ksBalValue = "ksBalValue".($i+1);
						$ksValue = "ksValue".($i+1);
						$poznamkyValue = "poznamkyValue".($i+1);
						$cenaMoValue = "cenaMoValue".($i+1);
						//$cenaCelkemValue = "cenaCelkemValue".($i+1);
						//$showValue = "showValue".($i+1);

						$idTemp = "idProduct".($i+1);
						${$idValue} = $_POST[$idTemp];
						$eanTemp = "ean".($i+1);
						${$eanValue} = removeSqlSpecChar($_POST[$eanTemp]);
						$kodTemp = "kod".($i+1);
						${$kodValue} = removeSqlSpecChar($_POST[$kodTemp]);
						$vyrobekTemp = "vyrobek".($i+1);
						${$vyrobekValue} = removeSqlSpecChar($_POST[$vyrobekTemp]);
						$ksBalTemp = "ksBal".($i+1);
						${$ksBalValue} = $_POST[$ksBalTemp];
						$ksTemp = "ks".($i+1);
						${$ksValue} = $_POST[$ksTemp];
						$poznamkyTemp = "poznamky".($i+1);
						${$poznamkyValue} = removeSqlSpecChar($_POST[$poznamkyTemp]);
						$cenaMoTemp = "cenaMo".($i+1);
						${$cenaMoValue} = $_POST[$cenaMoTemp];
						//$cenaCelkemTemp = "cenaCelkem".($i+1);
						//${$cenaCelkemValue} = $_POST[$cenaCelkemTemp];
						//$showTemp = "show".($i+1);
						//${$showValue} = $_POST[$showTemp];

						//if (!empty($_POST[$showTemp])) {
						//	${$showValue} = $_POST[$showTemp];
						//}
						//if (!empty(${$showValue})) {
						//	${$showValue} = "ano";
						//}
						//else {
						//	${$showValue} = "ne";
						//}

						//if (empty(${$vyrobekValue})) {
						//	break;
						//}

						(int)$cenaCelkem = ${$cenaMoValue} * ${$ksValue};

						$sqlProduct .= "('${$idValue}','$id','${$eanValue}','${$kodValue}','${$vyrobekValue}','${$ksBalValue}','${$ksValue}','${$poznamkyValue}','${$cenaMoValue}','$cenaCelkem'),";
					}

					

					$sqlProduct = substr($sqlProduct, 0, -1);
					//echo "\$sqlProduct: <br>$sqlProduct <br>";

					//echo "$sqlProduct<br>";

					if (mysqli_query($conn, $sqlProduct)) {
					//if (true) { //Když nechci přidávat do mdg_product, ale jen updatovat event
						echo "Povedlo se přidat další produkt do DB<br>";

						$hours = str_replace(",",".","$hours");
								

						$sqlUpdate = "UPDATE mdg_events SET odeslano='$dateSend', splneno = 'ano', od_do='$time', hodin='$hours', km_celkem='$kmCelkem', obr1='$image1', obr2='$image2', obr3='$image3', poznamky='$poznamky'

							WHERE id_mdg_event='$id'
						";

						//echo "$sqlUpdate <br>";


						if (mysqli_query($conn, $sqlUpdate)) {
							//echo "${$idValue} - povedlo se zapsat do DB<br>";
							$ms = "Akce se úspěšně povedla zapsat do systému";
						}
						else {
							//echo "${$idValue} - NEpovedlo se zapsat do DB<br>";		
							$me = "Akce se nepovedla povedla zapsat do systému, prosím kontaktujte administrátora!";			
						}
						header("Location: homepage.php?ms=$ms&me=$me");

					}
					else {
						//echo "Není další produkt<br>";
						$messageError = "Nepovedlo se přidat další produkt do DB.";
						dbClose($conn);
					}	
				}
				else {
					dbClose($conn);	
					//header("Location: $actual_link");
					$messageError = "Nelze přidat, nejsou vyplněna všechna pole.";
					echo "<div class=\"message-error\">Nelze přidat, nejsou vyplněna všechna pole.</div>";
								
				}		
			}
			else {
				$messageError = "Pravděpodobně špatně vyplněný čas.";
				echo "<div class=\"message-error\">Pravděpodobně špatně vyplněný čas.</div>";
				dbClose($conn);
				

			}
		}
		else {
			$messageError = "ID není číselné.";
			echo "<div class=\"message-error\">ID není číselné.</div>";
			//echo "ID není číselné.";
			

		} 
	}
	else {
		echo "<div class=\"message-error\">Tato akce již byla odeslána, dá se upravit pouze přes <a href=\"".$revision_link."\">$revision_link</a></div>";
		$messageError = "Tato akce již byla odeslána, dá se upravit pouze přes <a href=\"".$revision_link."\">$revision_link</a>";
	}

}
else {
	$messageError = "Nezmáčkl se submit.";
	//$odpoved = "Nápověda pro promotérky";
	//echo "<br>Nezmáčkl se submit.<br><br>";

	if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) { // query db
		//echo "$id je id<br>";

		//$renderTemp = "";
		$renderVariables = "";
		$conn = dbConnect();
		$id = $_GET['id'];

		$renderTemp = array($id, $messageSuccess, $messageError);
		//$renderTemp .= "\"$id\", \"$messageSuccess\", \"$messageError\", ";
		$renderVariables .= "\$id, \$messageSuccess, \$messageError,";
		//$sql = "SELECT * FROM mdg_product WHERE id_mdg_project=$id AND zobrazit = 'ano' ORDER BY vyrobek";
		$sql = "SELECT * FROM mdg_product 
					INNER JOIN mdg_events
						ON mdg_product.id_mdg_project=mdg_events.id_mdg_project
					WHERE mdg_events.id_mdg_event=$id 
						AND mdg_product.zobrazit = 'ano' 
					ORDER BY mdg_product.id_mdg_product";
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
				//$idValueProject = "idValueProject".($i+1);
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
				$idTempProject = "idProject".($i+1);
				$idValueProject = $row[1];
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
				$valueStat 		= $row[11];


				

				if (empty(${$idValue}) ) {
					break;
				}

				//$sqlProduct .= "(\"$project\",\"${$eanValue}\",\"${$kodValue}\",\"${$vyrobekValue}\",\"${$ksBalValue}\",\"${$ksValue}\",\"${$poznamkyValue}\",\"${$cenaMoValue}\",\"${$cenaCelkemValue}\",\"${$showValue}\",\"$stat\"),";

				//echo "${$idValue}<br>";

				
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