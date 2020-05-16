<?php //if (!empty($messageSuccess)) { echo '<div class="message-success">'.$messageSuccess.'</div>';		} ?>
<?php //if (!empty($messageError))   { echo '<div class="message-error">'.$messageError.'</div>';	}	 ?>
<?php 

	$error         	= false;
	$messageError 	= "";
	$messageSuccess = "";
	$additional 	= "";
	$valueName     	= "";
	$valueChain  	= "";
	$valueVdl  		= "";
	$valueRating  	= "";
	$valueAddress  	= "";
	$valueTown  	= "";
	$valueDivision  = "";
	$valuePhoto  	= "";
	$valuecPerson  	= "";
	$valuecPhone  	= "";
	$valueStat  	= "";

	if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
		if(empty($_POST['company'])) { 
			$messageError = $error_company = "Vyberte prosím firmu klienta.";
			?><div class="error"><?php if(!empty($error_company)) { echo $error_company; } ?></div><?php
			$error = true;
		}
		$dateFrom 				= $_POST['date-from'];
		$dateTo 				= $_POST['date-to'];

		//echo "Od ".date("Y-m-d", $dateFrom)." Do $dateTo";

		if ( isset($_POST['company']) && isset($_POST['choose']) && $error == false ) {
			(int)$id_company 	= $_POST['company'];
			$choose 			= $_POST['choose'];
			$sortBy 			= $_POST['sort-by'];
			$sort 				= $_POST['sort'];
			$filled 			= $_POST['filled'];
			$approved			= $_POST['approved'];

			if (!empty($_POST['id'])) 			{ $valueid 		= $_POST['id']; 	 	$additional .= " AND mdg_events.id_mdg_event LIKE '%$valueid%'"; }
			if (!empty($_POST['nazev'])) 		{ $valuenazev 	= $_POST['nazev']; 	 	$additional .= " AND mdg_company_details.nazev LIKE '%$valuenazev%'"; }
			if (!empty($_POST['ulice']))   		{ $valueulice 	= $_POST['ulice']; 	 	$additional .= " AND mdg_company_details.ulice LIKE '%$valueulice%'";}
			if (!empty($_POST['okres']))   		{ $valueokres 	= $_POST['okres']; 	 	$additional .= " AND mdg_company_details.okres LIKE '%$valueokres%'";}
			if (!empty($_POST['mesto']))   		{ $valuemesto 	= $_POST['mesto']; 	 	$additional .= " AND mdg_company_details.mesto LIKE '%$valuemesto%'";}
			if (!empty($_POST['retezec']))  	{ $valueretezec = $_POST['retezec'];  	$additional .= " AND mdg_company.nazev LIKE '%$valueretezec%'";}

			//if ($valuestat == "cz") {
			//	$additional .= " AND pharmacy.stat=\"cz\" ";
			//}
			//else if ($valuestat == "sk") {
			//	$additional .= " AND pharmacy.stat=\"sk\" ";
			//}
			//else {
			//	$additional .= "";
			//}

			//echo "$filled <br> $approved";
			$conn = dbConnect();
			mysqli_query($conn, "SET NAMES utf8");
							//AND actions.datum BETWEEN $dateFrom AND $dateTo

			//echo "$choose[0]<br>";
			//echo "$choose[2]<br>";
			$user = $sqlHeader = "";
			$values = "";
			$tableHeader2 = $tableHeader = "";
			$darky = $darkyBool  = $bonusBool = $bonus = $edit = $vyplata = false;

			$cilKc 			= 0;
			$cilKs 			= 0;
			$pocHodin 		= 0;
			//$bonus	 		= 0;
			$trzbaProm 		= 0;
			$ksProm	 		= 0;
			$ksNeprom	 	= 0;
			$trzbaNeprom 	= 0;
			$cyklAdd 		= -1;
			//$cyklAdd 		= 1;

			$counterQuestionHeader = $counterApproved = $counterTemp = $counterPharmacy = $counterFilled = $counterUser = $counterPauza = $counterRetezec = $counterOkres = $counterUlice = $counterTradesman = $counterTradesmanPhone = $counterDarku = $counterEdit = $counterBonus = $counterOsloveni = $counterCelkemKusu = $counterTrzba = $counterMinKs = $counterMinKc = $counterVyplata = $counterSend = $counterDate = $counterVdl = $counterProductHeader = $counterGiftHeader = $counterHours = $counterQuestion= $counterProduct = $i = $counter = $counterTime = $counterKoo = 0;
			$koo = "ne";
			$produkty = "ne";
			$poznamky = "ne";
			//$sort = "ASC";	


			//$userStat = $_SESSION['stat']; 
			//$mena = "Kč";
			//if ($valuestat=="sk") {
			//	$mena = "&euro;";
			//}

			if (!empty($_POST['users-koo']))   	{ 
				$valuekoo 	= $_POST['users-koo']; 
				$user .= " AND (";	 	
				for ($i=0; $i < count($valuekoo); $i++) { 
					$user .= "mdg_events.id_user_koo = '$valuekoo[$i]'";
					if (($i+1)!=count($valuekoo)) {
						$user .= " OR ";
					}
					else {
						$user .= ") ";
					}
					//echo "<br>$valuekoo[$i] <br><br>";
				}
			}

			if (!empty($_POST['users']))   	{ 
				$valuepromo 	= $_POST['users']; 
				$user .= " AND (";	 	
				for ($i=0; $i < count($valuepromo); $i++) { 
					$user .= "mdg_events.id_user = '$valuepromo[$i]'";
					if (($i+1)!=count($valuepromo)) {
						$user .= " OR ";
					}
					else {
						$user .= ") ";
					}
					//echo "<br>$valuepromo[$i] <br><br>";
				}
			}


			if ($filled == "splneno-ano") {
				$additional .= " AND mdg_events.splneno=\"ano\" ";
			}
			else if ($filled == "splneno-ne") {
				$additional .= " AND mdg_events.splneno=\"ne\" ";
			}
			else {
				$additional .= "";
			}
			//echo $additional;

			if ($approved == "schvaleno-ano") {
				$additional .= " AND mdg_events.schvaleno=\"ano\" ";
				//echo "má to být schváleno";
			}
			else if ($approved == "schvaleno-ne") {
				$additional .= " AND mdg_events.schvaleno=\"ne\" ";
				//echo "má to být neschváleno";
			}
			else {
				$additional .= "";
				//echo "má to být vše";
			}	
			//echo "<br>$approved<br>$additional";

			//for ($i=0; $i < 60 ; $i++) { 			
			for ($i=0; $i < (count($choose)) ; $i++) { 			
				switch ($choose[$i]) {
					case 'edit':
						$values .= "$choose[$i]|";
						$edit = true;
						$sqlHeader .= ", mdg_events.id_mdg_event";
						$counter++;
						$counterEdit = $counter;
						$tableHeader .=  "<th>&nbsp;</th>
								";
						$tableHeader2 .= "<th>UPRAVIT</th>
								";
						break;
					case 'datum-akce':
						$values .= "$choose[$i]|";
						$counter++;
						$counterDate = $counter;
						$sqlHeader .= ", mdg_events.datum";
						$tableHeader .=  "<th>&nbsp;</th>
								";
						$tableHeader2 .= "<th>DATUM</th>
								";
						break;
					case 'promo':
						$values .= "$choose[$i]|";
						$counter++;
						$counterUser = $counter;
						//$sqlHeader .= ", users.prijmeni, users.telefon";
						$sqlHeader .= ", users.prijmeni";
						//$tableHeader .=  "<th>&nbsp;</th><th>&nbsp;</th>
						//		";
						//$tableHeader2 .= "<th>JMÉNO</th>
						//		<th>TELEFON</th>
						//		";
						$tableHeader .=  "<th>&nbsp;</th>
								";
						$tableHeader2 .= "<th>JMÉNO</th>
								";
						break;
					case 'promo-tel':
						$values .= "$choose[$i]|";
						$counter++;
						$sqlHeader .= ", users.telefon";
						$tableHeader .=  "<th>&nbsp;</th>
								";
						$tableHeader2 .= "<th>TELEFON NA PROMO</th>
								";
						break;
					case 'koo':
						$values .= "$choose[$i]|";
						$counter++;
						$counterKoo = $counter;
						$cyklAdd++;
						//echo $counterKoo;
						$koo = "ano";
						$tableHeader .=  "<th>&nbsp;</th>
								";
						$tableHeader2 .= "<th>KOORDINÁTOR</th>
								";
						break;
					case 'koo-tel':
						$values .= "$choose[$i]|";
						//$i--;
						//$counter++;
						$cyklAdd++;
						$tableHeader .=  "<th>&nbsp;</th>
								";
						$tableHeader2 .= "<th>KONTAKT NA KOO</th>
								";
						break;
					case 'odeslano':
						$values .= "$choose[$i]|";
						$counter++;
						$counterSend = $counter;
						$sqlHeader .= ", mdg_events.odeslano";
						$tableHeader .=  "<th>&nbsp;</th>
								";
						$tableHeader2 .= "<th>DATUM ODESLÁNÍ</th>
								";
						break;
					case 'pharmacy':
						$values .= "$choose[$i]|";
						$counter++;
						$counterPharmacy = $counter;
						$sqlHeader .= ", mdg_company_details.nazev";
						$tableHeader .=  "<th>&nbsp;</th>
								";
						$tableHeader2 .= "<th>OBCHOD</th>
								";
						break;
					case 'okres':
						$values .= "$choose[$i]|";
						$counter++;
						$counterOkres = $counter;
						$sqlHeader .= ", mdg_company_details.okres";
						$tableHeader .=  "<th>&nbsp;</th>
								";
						$tableHeader2 .= "<th>OBEC</th>
								";
						break;
					case 'mesto':
						$values .= "$choose[$i]|";
						$counter++;
						$counterMesto = $counter;
						$sqlHeader .= ", mdg_company_details.mesto";
						$tableHeader .=  "<th>&nbsp;</th>
								";
						$tableHeader2 .= "<th>MĚSTO</th>
								";
						break;
					case 'ulice':
						$values .= "$choose[$i]|";
						$counter++;
						$counterUlice = $counter;
						$sqlHeader .= ", mdg_company_details.ulice";
						$tableHeader .=  "<th>&nbsp;</th>
								";
						$tableHeader2 .= "<th>ULICE</th>
								";
						break;
					case 'retezec':
						$values .= "$choose[$i]|";
						$counter++;
						$counterRetezec= $counter;
						$sqlHeader .= ", mdg_company.nazev";
						$tableHeader .=  "<th>&nbsp;</th>
								";
						$tableHeader2 .= "<th>ŘETĚZEC</th>
								";
						break;
					
					case 'pracovni-doba':
						$values .= "$choose[$i]|";
						$counter++;
						$counterTime = $counter;
						$sqlHeader .= ", mdg_events.od_do";
						$tableHeader .=  "<th colspan=\"3\">NÁVŠTĚVA</th>
								";
						$tableHeader2 .= "<th>ČAS PŘÍCHODU</th><th>ČAS ODCHODU</th><th>ČAS CELKEM</th>
								";
						break;
					/*case 'pocet-hodin':
						$values .= "$choose[$i]|";
						$counter++;
						$counterHours = $counter;
						$sqlHeader .= ", mdg_events.hodin";
						$tableHeader .=  "<th>Počet hodin</th>
								";
						$tableHeader2 .= "<th>&nbsp;</th>
								";
						break;*/
					
					case 'filled':
						$values .= "$choose[$i]|";
						$counter++;
						$counterFilled = $counter;
						$sqlHeader .= ", mdg_events.splneno";
						$actionFilled = "ano";
						$tableHeader .=  "<th>&nbsp;</th>
								";
						$tableHeader2 .= "<th>SPLNĚNO</th>
								";
						break;
					case 'schvaleno':
						$values .= "$choose[$i]|";
						$counter++;
						$counterApproved = $counter;
						$sqlHeader .= ", mdg_events.schvaleno";
						$tableHeader .=  "<th>&nbsp;</th>
								";
						$tableHeader2 .= "<th>SCHVÁLENO</th>
								";
						break;
					case 'km-celkem':
						//echo "<br>Napiš minimální Kč<br>";
						$values .= "$choose[$i]|";
						$counter++;
						$counterMinKc = $counter;
						$sqlHeader .= ", mdg_events.km_celkem";
						$tableHeader .=  "<th>&nbsp;</th>
								";
						$tableHeader2 .= "<th>KM CELKEM</th>
								";
						break;
					case 'popis':
						//echo "<br>Napiš minimální Kč<br>";
						$values .= "$choose[$i]|";
						$counter++;
						$sqlHeader .= ", mdg_events.popis";
						$tableHeader .=  "<th>&nbsp;</th>
								";
						$tableHeader2 .= "<th>ZADÁNÍ AKCE</th>
								";
						break;
					case 'poznamky':
						//echo "<br>Napiš minimální Kč<br>";
						$values .= "$choose[$i]|";
						$counter++;
						$sqlHeader .= ", mdg_events.poznamky";
						$tableHeader .=  "<th>&nbsp;</th>
								";
						$tableHeader2 .= "<th>POZNÁMKY Z AKCE</th>
								";
						break;
					case 'photo':
						$values .= "$choose[$i]|";
						$counter++;
						$sqlHeader .= ", mdg_events.obr1, mdg_events.obr2, mdg_events.obr3";
						$tableHeader .=  "<th colspan=\"3\">FOTOGRAFIE</th>
								";
						$tableHeader2 .= "<th>FOTO 1</th><th>FOTO 2</th><th>FOTO 3</th>
								";
						break;
					//case 'poznamky':
					//	$values .= "$choose[$i]|";
					//	$counter++;
					//	$poznamky = true;
					//	$sqlHeader .= ", mdg_events.poznamky";
					//	$tableHeader .=  "<th>POZNÁMKY</th>
					//			";
					//	$tableHeader2 .= "<th>&nbsp;</th>
					//			";
					//	//echo "Budou tam POZNÁMKY";
					//	break;
					
					
					default:
						# code...
						break;
				}

				if ( empty($choose[$i+1])) { break; }
			}
					
			/*$sqlTables = "FROM mdg_events 
					JOIN mdg_company
					JOIN mdg_company_details
					JOIN users
						ON 		mdg_events.id_mdg_company=mdg_company.id_mdg_company 
							AND mdg_events.id_mdg_company_details=mdg_company_details.id_mdg_company_details 
							AND mdg_events.id_user=users.id_user
							$additional $user
							AND mdg_events.id_mdg_project='$id_company'
							AND mdg_events.datum BETWEEN '$dateFrom' AND '$dateTo'
							ORDER BY $sortBy $sort, mdg_events.id_mdg_event";*/

			$sqlTables = "FROM mdg_events 
					JOIN mdg_company
					JOIN mdg_company_details
					JOIN users
						ON 		mdg_events.id_mdg_company=mdg_company.id_mdg_company 
							AND mdg_events.id_mdg_company_details=mdg_company_details.id_mdg_company_details 
							AND mdg_events.id_user=users.id_user
							$additional $user
							AND mdg_events.id_mdg_project='$id_company'
							AND mdg_events.datum BETWEEN '$dateFrom' AND '$dateTo'
							ORDER BY $sortBy $sort, mdg_events.id_mdg_event";

			$sql = "SELECT  mdg_events.splneno $sqlHeader

					$sqlTables ";

			//echo "$sql<br>";


			/*$sqlKoo = "SELECT users.prijmeni, users.telefon 
						FROM mdg_events 
					JOIN mdg_company
					JOIN mdg_company_details
					JOIN users
						ON 		mdg_events.id_mdg_company=mdg_company.id_mdg_company 
							AND mdg_events.id_mdg_company_details=mdg_company_details.id_mdg_company_details 
							AND mdg_events.id_user_koo=users.id_user
							$additional $user
							AND mdg_events.id_mdg_project='$id_company'";*/

				$sqlKoo = "SELECT users.prijmeni, users.telefon 
						FROM mdg_events 
					JOIN mdg_company
					JOIN mdg_company_details
					JOIN users
						ON 		mdg_events.id_mdg_company=mdg_company.id_mdg_company 
							AND mdg_events.id_mdg_company_details=mdg_company_details.id_mdg_company_details 
							AND mdg_events.id_user_koo=users.id_user
							$additional $user
							AND mdg_events.id_mdg_project='$id_company'";
	



		?>
		<?php 

				$data1 = mysqli_query($conn, $sql);
				$data2 = mysqli_query($conn, $sqlKoo);
		?>


		<div class="container per100 padd-top-15">
			<main>
				<section class="seznam td-right">
				<br><br>
					<?php 

						//echo "$sql<br>";

					 ?>
					<?php require('summary-filter-table.php') ?>	                   
				</section>
			</main>
		</div>

		<?php

		dbClose($conn);
		}

		else {
			$messageError = "Nastala chyba";
		}
	}

 ?>