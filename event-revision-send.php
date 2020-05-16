<?php 

	$error         	= false;

	if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {  // Pokud se zmáčkne tlačítko POST, udělej funkci
		if ( isset($_POST['vyrobek1'])   // prázné políčko taky vezme isset, pro tuto kontrolu bychom musel použít empty
			 //isset($_POST['produkt-1[]']) && 
			 ) {
			$conn = dbConnect(); // Připojíme se k databázi

			//echo "Zmáčkl se submit <br>";

			$id = $_GET['id'];
			//$project = $_POST['project'];
			$i = 0;
			//$stat 			= $_POST['stat']; 
			//$valueStat 		= $stat;
			if (isset($_POST['active'])) {
				$active = "ano";

			}
			else {
				$active = "ne";
			}

			if (isset($_POST['zadani'])) { $zadani = removeSqlSpecChar($_POST['zadani']); }
			if (isset($_POST['poznamky'])) { $poznamky = removeSqlSpecChar($_POST['poznamky']); }


			/**************************************************************************
												UPLOAD
			 **************************************************************************/

			$file_prename 			= makeFilePreName( $id );	
			$file_path_original 	= "merchandising/original/".date("Y");
			$file_path_resized 		= "merchandising/resized/".date("Y");

			$n1 = "image-1";

			//if (is_array($image1)) { $image1 = ""; }
			//if (is_array($image2)) { $image2 = ""; }
			//if (is_array($image3)) { $image3 = ""; }
			
			if(isset_file('image-1')) {
			//if (empty($_POST['image-1'])){
				//echo "Obrázek 1 je vybrán<br>";
				$image1 = uploadMyImage("image-1", $file_path, $file_path_original, $file_path_resized, $file_prename);
				if (!is_array($image1)) { 
					$additional .= ", obr1='$image1'";
				}
				if ($image1 == false) {
					$error = true;
					$error_img1 = "Zkontrolujte prosím správnost formátu fotografie: JPG, JPEG nebo PNG a maximální velikost 4MB";
				}
			}
			
			if (isset($_FILES['image-2']) && $error == false) {
			//if (empty($_POST['image-2'])) {
				//echo "Obrázek 2 je vybrán<br>";
				$image2 = uploadMyImage("image-2", $file_path, $file_path_original, $file_path_resized, $file_prename);
				if (!is_array($image2)) { 
					$additional .= ", obr2='$image2'";
				}
				if ($image2 == false) {
					$error = true;
					$error_img2 = "Zkontrolujte prosím správnost formátu fotografie: JPG, JPEG nebo PNG a maximální velikost 4MB";
				}
			}
			
			if (isset($_FILES['image-3']) && $error == false) {
			//if (empty($_POST['image-3'])) {
				//echo "Obrázek 3 je vybrán<br>";
				$image3 = uploadMyImage("image-3", $file_path, $file_path_original, $file_path_resized, $file_prename);
				if (!is_array($image3)) { 
					$additional .= ", obr3='$image3'";
				}
				if ($image3 == false) {
					$error = true;
					$error_img3 = "Zkontrolujte prosím správnost formátu fotografie: JPG, JPEG nebo PNG a maximální velikost 4MB";
				}
			}

			//echo "$additional<br>";

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

				$vyrobekTemp = "vyrobek".($i+1);
				if (isset($_POST[$vyrobekTemp])) {
					${$vyrobekValue} = removeSqlSpecChar($_POST[$vyrobekTemp]);
				}
				
				if (empty(${$vyrobekValue})) {
					break;
				}

				$idTemp = "idProduct".($i+1);
				${$idValue} = $_POST[$idTemp];

				$eanTemp = "ean".($i+1);
				${$eanValue} = removeSqlSpecChar($_POST[$eanTemp]);
				$kodTemp = "kod".($i+1);
				${$kodValue} = removeSqlSpecChar($_POST[$kodTemp]);
				$ksBalTemp = "ksBal".($i+1);
				${$ksBalValue} = $_POST[$ksBalTemp];
				$ksTemp = "ks".($i+1);
				${$ksValue} = $_POST[$ksTemp];
				$poznamkyTemp = "poznamky".($i+1);
				${$poznamkyValue} = removeSqlSpecChar($_POST[$poznamkyTemp]);
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


				$sqlUpdate = "UPDATE mdg_product_filled SET ean = '${$eanValue}', kod = '${$kodValue}', vyrobek = '${$vyrobekValue}', ks_baleni = '${$ksBalValue}', ks = '${$ksValue}', poznamky = '${$poznamkyValue}', cena_mo = '${$cenaMoValue}', cena_celkem = '${$cenaCelkemValue}'

					WHERE id_mdg_product_filled='${$idValue}'
				";
				mysqli_query($conn, "SET NAMES utf8");


				if (mysqli_query($conn, $sqlUpdate)) {
					//echo "${$idValue} - povedlo se zapsat do DB<br>$sqlUpdate<br>";
				}
				else {
					//echo "${$idValue} - NEpovedlo se zapsat do DB<br>$sqlUpdate<br>";			ža		
				}


				//echo "${$eanValue}<br>";

				$i++;
			}


			//$sqlProduct = substr($sqlProduct, 0, -1);

			mysqli_query($conn, "SET NAMES utf8");


			$sqlProduct = "UPDATE mdg_events SET od_do='$time', hodin='$hours', km_celkem='$kmCelkem', popis='$zadani', schvaleno = '$active', poznamky='$poznamky' $additional

						WHERE id_mdg_event='$id'
					";

			//echo "$sqlProduct <br>";



			if ( $error == false ) {
				
				mysqli_query($conn, "SET NAMES utf8");
			
				if (mysqli_query($conn, $sqlProduct)) {
					$nazevFormulare = "";
					$messageSuccess = "Akce upravena.";
					if (!empty($messageSuccess)) { echo '<div class="message-success">'.$messageSuccess.'</div>';	}
					
				}
				else {
					$messageError = "Nepodařilo se upravit akci.";
					if (!empty($messageError))   { echo '<div class="message-error">'.$messageError.'</div>';	}
				
					//mysqli_query($conn, $sqlProduct);
					//$row  = mysqli_fetch_row($data);
					//$messageError = $row;
				}
			
			}

		}

	}

?>