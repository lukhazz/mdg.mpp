<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
		$conn = dbConnect();
		mysqli_query($conn, "SET NAMES utf8");

		$user = $param = "";
	
		$error         	= false;

		if (!empty($_POST['nazev'])) 	{ $valuenazev 	= $_POST['nazev'];	$param .= " AND users.email LIKE '%$valuenazev%'"; }
		if (!empty($_POST['jmeno-uzivatele'])) 	{ $valuejmenouzivatele 	= $_POST['jmeno-uzivatele'];	$param .= " AND  users.jmeno LIKE '%$valuejmenouzivatele%' OR users.prijmeni LIKE '%$valuejmenouzivatele%' "; }
		//echo "$param<br>";
		//if (!empty($_POST['produkty'])) 	{ $valueprodukt 	= $_POST['produkty'];	$param .= " AND actions.produkt_1 LIKE '%$valueprodukt%' OR actions.produkt_2 LIKE '%$valueprodukt%' OR actions.produkt_3 LIKE '%$valueprodukt%' OR actions.produkt_4 LIKE '%$valueprodukt%' OR actions.produkt_5 LIKE '%$valueprodukt%' OR actions.produkt_6 LIKE '%$valueprodukt%' OR actions.produkt_7 LIKE '%$valueprodukt%' OR actions.produkt_8 LIKE '%$valueprodukt%' OR actions.produkt_9 LIKE '%$valueprodukt%' OR actions.produkt_10 LIKE '%$valueprodukt%' OR actions.produkt_11 LIKE '%$valueprodukt%' OR actions.produkt_12 LIKE '%$valueprodukt%' OR actions.produkt_13 LIKE '%$valueprodukt%' OR actions.produkt_14 LIKE '%$valueprodukt%' OR actions.produkt_15 LIKE '%$valueprodukt%' OR actions.produkt_16 LIKE '%$valueprodukt%' OR actions.produkt_17 LIKE '%$valueprodukt%' OR actions.produkt_18 LIKE '%$valueprodukt%' OR actions.produkt_19 LIKE '%$valueprodukt%' OR actions.produkt_20 LIKE '%$valueprodukt%'"; }
		if (!empty($_POST['okres']))   	{ $valueokres 	= $_POST['okres']; 	 	$param .= " AND pharmacy.okres LIKE '%$valueokres%'";}
		$posBool = false;
		if (!empty($_POST['position']))   	{ $posBool = true; $valueposition 	= $_POST['position']; } else { $valueposition = ""; }
		//if (!empty($_POST['promo']))   	{ $valuepromo 	= $_POST['promo']; 	 	$user .= " AND users.prijmeni LIKE '%$valuepromo%'";}
		if (!empty($_POST['id_form']))   	{ $valueid 	= $_POST['id_form']; $param .= " AND users.id_user LIKE '%$valueid%'";}
		if (!empty($_POST['date-from']))   	{ $dateFrom 	= $_POST['date-from']; $dateTo = $_POST['date-to']; $param .= " AND actions.datum BETWEEN '$dateFrom' AND '$dateTo'"; }
		if (!empty($_POST['sort-by']))  { $sortBy 		= $_POST['sort-by'];  } else { $sortBy = ""; }
		if (!empty($_POST['sort']))  	{ $sort 		= $_POST['sort']; 	 } else { $sort = ""; }
		if (!empty($_POST['limit']))  	{ (int)$limit 	= $_POST['limit']; 	 } else { $limit = "50"; }
		$filled 			= $_POST['filled'];
		$approved			= $_POST['approved'];
		if (!empty($_POST['stat']))  	{ $valueStat 	= $_POST['stat'];  		}


		if ($valueStat == "vse") {
			$param .= "";
		}
		else if ($valueStat == "cz") {
			$param .= " AND (users.stat=\"cz\" OR users.stat=\"vse\")";
		}
		else {
			$param .= " AND (users.stat=\"sk\" OR users.stat=\"vse\")";
		}
		//echo "value: $valueStat<br>";
		


		if (!empty($_POST['users-koo']))   	{ 
			$valuepromo 	= $_POST['users-koo']; 
			$user .= " AND (";	 	
			for ($i=0; $i < count($valuepromo); $i++) { 
				$user .= "users.id_user LIKE '%$valuepromo[$i]%'";
				if (($i+1)!=count($valuepromo)) {
					$user .= " OR ";
				}
				else {
					$user .= ") ";
				}
				//echo "$valuepromo[$i] ";
			}
		}
		//echo $user;


		if ($filled == "splneno-ano") {
			$param .= " AND aktivni=\"ano\" ";
		}
		else if ($filled == "splneno-ne") {
			$param .= " AND aktivni=\"ne\" ";
		}
		else {
			$param .= "";
		}
		//echo $param;

		if ($approved == "schvaleno-ano") {
			$param .= " AND cena_typ=\"dohoda\" ";
			//echo "má to být schváleno";
		}
		else if ($approved == "schvaleno-ne") {
			$param .= " AND cena_typ=\"ico\" ";
			//echo "má to být neschváleno";
		}
		else {
			$param .= "";
			//echo "má to být vše";
		}	

		//echo "$valueposition";

		if ($posBool == true) {
			$param .= " AND ";
			for ($i=0; $i < 10 ; $i++) { 
				switch ($valueposition[$i]) {
					case 'Promotér':
						$param .= " pozice=\"Promotér\" ";
						break;
					case 'Koordinátor':
						$param .= " pozice=\"Koordinátor\" ";
						break;
					case 'Ředitel':
						$param .= " pozice=\"Ředitel\" ";
						break;
					case 'Majitel':
						$param .= " pozice=\"Majitel\" ";
						break;
					case 'Merchandiser':
						$param .= " pozice=\"Merchandiser\" ";
						break;
					case 'Klient':
						$param .= " pozice=\"Klient\" ";
						break;
					case 'Ostatní':
						$param .= " pozice=\"Ostatní\" ";
						break;
				}

				if ( empty($valueposition[$i+1])) { break; }
				$param .= " OR ";
			}
		}

		//echo $param;
	

		$sql = "SELECT id_user,prijmeni,jmeno,aktivni,stat,cena_typ,cena_za_h,role,pozice,telefon,email,sef
				FROM users 
					WHERE id_user > 0
					$param
					ORDER BY $sortBy $sort
						LIMIT $limit";

		$sqlStat = "SELECT stat
				FROM users 
					WHERE id_user > 0
					$param
					ORDER BY $sortBy $sort
						LIMIT $limit";

		$dataStat = mysqli_query($conn, $sqlStat);
		$row = mysqli_fetch_row($dataStat);

		$mena = "Kč";
		if ($row[0]=="sk") {
			$mena = "&euro;";
		}

?>
		<div class="container per100 padd-top-13-5">
			<main>
				<section class="seznam">
					<h2>Výpis uživatelů</h2>
					<table id="pharmacy">
						<thead>
							<tr>
								<th>ID</th>
								<th>Příjmení</th>
								<th>Jméno</th>
								<th>Aktivní</th>
								<th>Stát</th>
								<th>Plat</th>
								<th><?php echo "$mena"; ?>/h</th>
								<th>Práva</th>
								<th>Funkce</th>
								<th>Telefon</th>
								<th>E-mail</th>
								<th>Nadřízený</th>
								<th>Upravit</th>
							</tr>
						</thead>
						<tbody>	 
							<?php 
							$data = mysqli_query($conn, $sql);
							while ( $row = mysqli_fetch_row($data) ) {
								//echo $row[$i]."<br>";
								echo "
											<tr>";
								
								for ($i=0; $i < count($row); $i++) {
									if ($i == (count($row)-1)) {
										continue;
									}
									echo "
												<td>".$row[$i]."</td>";
									//if ($i == 10) {
									//	echo "
									//			<td>".date("d. m. Y", strtotime($row[$i]))."</td>";
									//	continue;
									//} 
								}		
								//$vek = dopocitejVek($row[10]);
								//    echo "
								//				<td>".$vek." let</td>";

								$idNadrizeny  = $row[$i-1];
								//echo "$idNadrizeny<br>";
								$sqlNadrizeny = "SELECT prijmeni,jmeno 
										FROM users 
											WHERE id_user = $idNadrizeny";
								$dataNadrizeny = mysqli_query($conn, $sqlNadrizeny);
								while ( $rowNadrizeny = mysqli_fetch_row($dataNadrizeny) ) { 
									echo "
												<td>$rowNadrizeny[0] $rowNadrizeny[1]</td>";
								}

								echo '
												<td><a href="user-edit.php?id=' . $row[0] . '">Edit</a></td>';

								
								echo "
											</tr>";

						}
						?>
										</tbody>
									</table>
								</section>
			</main>
		</div>

		<?php

		dbClose($conn);
	}

 ?>