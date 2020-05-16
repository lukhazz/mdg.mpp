<?php 

	$error         	= false;

	if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {  // Pokud se zmáčkne tlačítko POST, udělej funkci
		if ( isset($_POST['project']) &&  // prázné políčko taky vezme isset, pro tuto kontrolu bychom musel použít empty
			 //isset($_POST['produkt-1[]']) && 
			 isset($_POST['ean1']) 
			 ) {

			//echo "napiš něco <br>";

			$project = removeSqlSpecChar($_POST['project']);
			$i = 0;
			$stat 			= $_POST['stat']; 
			$valueStat 		= $stat;

			$sqlProduct = "INSERT INTO mdg_product(id_mdg_project, ean, kod, vyrobek, ks_baleni, ks, poznamky, cena_mo, cena_celkem, zobrazit, stat) VALUES";

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
				${$cenaMoValue} = $_POST[$cenaMoTemp];
				$cenaCelkemTemp = "cenaCelkem".($i+1);
				${$cenaCelkemValue} = $_POST[$cenaCelkemTemp];
				$showTemp = "show".($i+1);
				//${$showValue} = removeSqlSpecChar($_POST[$showTemp]);

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

				$sqlProduct .= "(\"$project\",'${$eanValue}','${$kodValue}','${$vyrobekValue}','${$ksBalValue}','${$ksValue}','${$poznamkyValue}','${$cenaMoValue}','${$cenaCelkemValue}','${$showValue}','$stat'),";

				//echo "${$eanValue}<br>";

				$i++;
			}

			$sqlProduct = substr($sqlProduct, 0, -1);

			echo "<br>$sqlProduct<br><br>";


			if ( $error == false ) {
				$conn = dbConnect(); // Připojíme se k databázi
				mysqli_query($conn, "SET NAMES utf8");
	
				if (mysqli_query($conn, $sqlProduct)) {
					$nazevFormulare = "";
					$ms = $messageSuccess = "Produkty přidány. Nyní můžete přidat další.";
				}
				else {
					$me = $messageError = "Nepodařilo se přidat produkty.";
				
					//mysqli_query($conn, $sqlProduct);
					//$row  = mysqli_fetch_row($data);
					//$messageError = $row;
				}
				$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?id=$id&ms=$ms&me=$me";
				header("Location: $actual_link");

			}

		}

	}

?>