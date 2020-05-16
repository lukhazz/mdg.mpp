<?php 

	$error         	= false;
	$valueName     	= "";
	$valuePhone    	= "";

	if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {  // Pokud se zmáčkne tlačítko POST, udělej funkci
		if ( isset($_POST['name']) &&
		 	isset($_POST['phone']) && 
		 	isset($_POST['company'])  
			 ) {
			//$error 		= false;
			$valueName 	= $name 	= $_POST['name']; 
			$valuePhone = $phone 	= $_POST['phone']; 
			(int)$company 			= $_POST['company'];
			$stat 					= $_POST['stat']; 
			$valueStat 				= $stat;
			//$idCompany 			= 2;

			$reg_phone    = "#^[0-9+][0-9]*$#";


			if(empty($valueName)) { 
				$error_name = "Zadejte prosím příjmení reprezentanta.";
				$valueName  = "";
				$error = true;
			}


			if(empty($valueStat)) { 
				$error_stat = "Zadejte prosím pro jaký stát je tento reprezentant určen.";
				$valueStat  = "";
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

				//Kontrola, zda není repre v databázi
				$sql  = "SELECT prijmeni FROM company-details WHERE prijmeni='$name' AND telefon='$phone'";
				//$data = mysqli_query($conn, $sql);
				if ( $data = mysqli_query($conn, $sql) ) {
					$row  = mysqli_fetch_row($data);

					if ($row != NULL) {
						$messageError = "Nelze přidat, obchodní zástupce s tímto jménem a číslem již je přidán.";
					}
					else {
						$sql = "INSERT INTO company-details(prijmeni,telefon,id_company, stat) VALUES('$name','$phone','$company', '$stat')";
						if (mysqli_query($conn, $sql)) {
							
							$messageSuccess = "Reprezentant přidán. Nyní můžete přidat dalšího.";
							$valueName     	= "";
							$valuePhone    	= "";

						}
						else {
							$messageError = "Nepodařilo se přidat reprezentanta.";

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