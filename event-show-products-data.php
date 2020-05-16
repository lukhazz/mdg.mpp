<?php 

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
		$sql = "SELECT mdg_product_filled.id_mdg_product_filled, mdg_product_filled.id_mdg_event, mdg_product_filled.ean,mdg_product_filled.kod, mdg_product_filled.vyrobek,  mdg_product_filled.ks_baleni, mdg_product_filled.ks, mdg_product_filled.poznamky, mdg_product_filled.cena_mo, mdg_product_filled.cena_celkem FROM mdg_product_filled 
					JOIN mdg_product 
						ON mdg_product_filled.id_mdg_product=mdg_product.id_mdg_product
					JOIN mdg_events 
						ON mdg_product_filled.id_mdg_event=mdg_events.id_mdg_event
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
				//$showTemp = "show".($i+1);
				//${$showValue} = $row[10];

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


				//$valueStat 		= $row[11];


				

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

 ?>