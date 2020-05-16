<?php 

	$error         	= false;
	$valueName     	= "";

	if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {  // Pokud se zmáčkne tlačítko POST, udělej funkci
		if ( isset($_POST['name']) ) {
			//$error 		= false;
			$name 			= $_POST['name']; 
			//$companyPrice 	= $_POST['company-price']; 
			$valueName		= $name;
			$stat 			= $_POST['stat']; 
			$valueStat 		= $stat;


			if(empty($valueName)) { 
				$error_name = "Zadejte prosím jméno firmy.";
				$valueName  = "";
				$error = true;
			}

			if(empty($valueStat)) { 
				$error_stat = "Zadejte prosím pro jaký stát je tato firma určena.";
				$valueStat  = "";
				$error = true;
			}

			if ( $error == false ) {
				$conn = dbConnect(); // Připojíme se k databázi
				mysqli_query($conn, "SET NAMES utf8");

				//Kontrola, zda není lékárna v databázi
				$sql  = "SELECT nazev FROM mdg_company WHERE nazev='$name'";
				//$data = mysqli_query($conn, $sql);
				if ( $data = mysqli_query($conn, $sql) ) {
					$row  = mysqli_fetch_row($data);

					if ($row != NULL) {
						$messageError = "Nelze přidat, řetězec s tímto jménem a adresou již je v databázi.";
					}
					else {
						$sql = "INSERT INTO mdg_company(nazev, stat) VALUES('$name', '$stat')";
						if (mysqli_query($conn, $sql)) {
							
							$messageSuccess = "Řetězec přidán. Nyní můžete přidat další.";
							$valueName     	= "";
							$valueName     	= "";

						}
						else {
							$messageError = "Nepodařilo se přidat řetězec.";

							mysqli_query($conn, $sql);
							$row  = mysqli_fetch_row($data);
							//$messageError = $row;
						}
					}

				}
			}

		}
	}
?>