<?php 

	$error         	= false;
	$valueName     	= "";
	//$valueTown		= "";
	$valueChain  	= "";
	//$valueVdl  		= "";
	//$valueRating  	= "";
	$valueMarket  	= "";
	//$valueTown  	= "";
	//$valuePsc  		= "";
	//$valueCp  		= "";
	$valueDescription  = "";
	//$valuecPerson  	= "";
	$valueDate  	= "";
	$valueTime  	= "";

	if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {  // Pokud se zmáčkne tlačítko POST, udělej funkci
		if ( isset($_POST['name']) &&  // prázné políčko taky vezme isset, pro tuto kontrolu bychom musel použít empty
			 //isset($_POST['town']) && 
			 //isset($_POST['chain']) && 
			 //isset($_POST['vdl']) && 
			 //isset($_POST['rating']) && 
			 isset($_POST['description']) && 
			 isset($_POST['time']) &&
			 //isset($_POST['psc']) && 
			 //isset($_POST['cp']) && 
			 //isset($_POST['c-person']) && 
			 //isset($_POST['town']) //&& 
			 isset($_POST['date']) 
			 ) {
			//$error 		= false;
			$name 			= mb_strtoupper($_POST['name'], 'UTF-8');   // Uložíme si hodnoty do vlastních proměnných
			//$town 			= mb_strtoupper($_POST['town'], 'UTF-8');
			$market 		= mb_strtoupper($_POST['market'], 'UTF-8');
			$project 		= mb_strtoupper($_POST['project'], 'UTF-8');
			if (isset($_POST['chain'])) { (int)$chain 	= $id = $_POST['chain']; $valueChain 	= $chain;}
			//$vdl 			= $_POST['vdl'];
			//$rating 		= mb_strtoupper($_POST['rating'], 'UTF-8');
			$description 	= mb_strtoupper($_POST['description'], 'UTF-8');
			//$cPerson 		= $_POST['c-person'];
			$date 			= $_POST['date'];
			//$stat 			= $_POST['stat']; 
			//$psc 			= $_POST['psc']; 
			//$cp 			= $_POST['cp']; 
			//$valueStat 		= $stat;
			$valueName		= $name;
			//$valuePsc		= $psc;
			//$valueCp		= $cp;
			//$valueTown		= $town;
			$valueMarket	= $market;
			$valueProject	= $project;
			$valueDescription  = $description;
			//$valuecPerson  	= $cPerson;
			$valueDate  	= $date;
			//$valueChain 	= $chain;
			//$valueVdl  		= $vdl;
			//$valueRating	= $rating;
			//echo "$valueStat<br>";

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

			//if(empty($valueTown)) { 
			//	$error_town = "Zadejte prosím město, kde se obchod nachází.";
			//	$valueTown  = "";
			//	$error = true;
			//}

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

			//if(empty($valuePsc)) { 
			//	$error_psc = "Zadejte prosím poštovní směrovací číslo (PSČ).";
			//	$valuePsc  = "";
			//	$error = true;
			//}

			//if(empty($valueCp)) { 
			//	$error_cp = "Zadejte prosím číslo popisné (ČP).";
			//	$valueCp  = "";
			//	$error = true;
			//}

			//if(empty($valueDescription)) { 
			//	$error_description = "Zadejte prosím celou okres obchodu.";
			//	$valueDescription  = "";
			//	$error = true;
			//}

			/*if(empty($valuecPerson)) { 
				$error_cPerson = "Zadejte prosím jméno kontaktní osoby.";
				$valuecPerson  = "";
				$error = true;
			}*/

			//if(empty($valueStat)) { 
			//	$error_stat = "Zadejte prosím v jakém státě se obchod nachází.";
			//	$valueStat  = "";
			//	$error = true;
			//}

			//if(empty($valueChain)) { 
			//	$error_chain = "Zadejte řetězec, pod který obchod spadá.";
			//	$valuecChain  = "";
			//	$error = true;
			//}

			/*
			if(strlen($rating)!=1) { 
				$error_rating = "Zadejte prosím 1 znak - A, B, C, D, E.";
				$valueRating  = "";
				$error = true;
			}

			if(!is_numeric($vdl)) { 
				$error_vdl = "Identifikátor VDL musí být číselný.";
				$valueVdl  = "";
				$error = true;
			}
			
			if(!preg_match($reg_phone, $date)) { // Projde string, zda se NEshoduje s podmínkami reg. výrazů
				$error_date = "Telefon by měl být bez mezer. Napřklad ve tvaru: +420123456789 nebo 123456789.";
				$valueDate  = "";
				$error = true;
			}
			*/

			if ( $error == false ) {
				$conn = dbConnect(); // Připojíme se k databázi
				mysqli_query($conn, "SET NAMES utf8");

				//Kontrola, zda není lékárna v databázi
				//$sql  = "SELECT nazev FROM mdg_company_details WHERE nazev='$name' AND mesto='$valueTown' ";
				//$data = mysqli_query($conn, $sql);
				//if ( $data = mysqli_query($conn, $sql) ) {
					//$row  = mysqli_fetch_row($data);
					$row = NULL;

					if ($row != NULL) {
						$messageError = "Nelze přidat, obchod s tímto názvem a městem je již v databázi.";
					}
					else {
						$sql = "INSERT INTO mdg_events(id_mdg_company, id_mdg_company_details, id_mdg_project, id_user, nadpis, datum, popis, cas, id_user_koo) VALUES('$id', '$market', '$project', '$users', '$name', '$date', '$description', '$time', '$usersKoo')";
						//echo "$sql<br>";
						if (mysqli_query($conn, $sql)) {
							
							$messageSuccess = "Událost přidána. Nyní můžete přidat další.";
							$valueName     	= "";
							//$valueTown		= "";
							//$valueChain  	= "";
							//$valueVdl  		= "";
							//$valueRating  	= "";
							$valueMarket  	= "";	
							//$valueTown  	= "";
							$valueDescription  = "";
							//$valuePsc  		= "";
							//$valueCp  		= "";
							//$valuecPerson  	= "";
							$valueDate  	= "";
							//$valueStat  	= "";
						}
						else {
							$messageError = "Nepodařilo se přidat událost.";

							mysqli_query($conn, $sql);
							$row  = mysqli_fetch_row($data);
							//$messageError = $row;
						}
					}

				//}
				dbClose($conn); 
			}

		}
	}
?>