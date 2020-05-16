<?php 
	
	$userId = $_SESSION['id_user'];
	$dateForHidden = "2016-07-31";

	//zaeviduj stát a pripis ho do dotazu
	$userStat = $_SESSION['stat'];
	//if ($userStat=="vse") { $userStatAdditional = ""; }
	//else { $userStatAdditional = "AND pharmacy.stat = \"$userStat\""; }
	//echo "$userStatAdditional<br>";

	//echo "$userId <br>";
	$conn = dbConnect();
	mysqli_query($conn, "SET NAMES utf8");
	$from = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
	$to = mktime(0, 0, 0, date("m"), date("d"), date("Y")+3);
	$dateFrom = date("Y-m-d", $from);
	$dateTo = date("Y-m-d", $to);
	$today = date("Y-d-m");
	//AND actions.datum>'$today'
	//echo "$dateFrom<br>$dateTo<br>$today<br>";

	/*$sqlBudouci = "SELECT actions.id_action, actions.datum, company.nazev, actions.cas, pharmacy.nazev, pharmacy.ulice, pharmacy.mesto
				FROM actions 
					JOIN company
					JOIN pharmacy
					JOIN users
					JOIN tradesman
					JOIN form
						ON 		actions.id_company=company.id_company 
							AND actions.id_pharmacy=pharmacy.id_pharmacy 
							AND actions.id_form=form.id_form
							AND actions.id_tradesman=tradesman.id_tradesman
							AND actions.id_user=users.id_user
							AND actions.id_user=1
							AND actions.splneno=\"ne\"
							$userStatAdditional
							AND actions.datum BETWEEN '$dateFrom' AND '$dateTo'
			ORDER BY actions.datum ASC";*/


	/*
	$sqlNesplneno = "SELECT actions.id_action, actions.datum, company.nazev, actions.cas, pharmacy.nazev, pharmacy.ulice, pharmacy.mesto
				FROM actions 
					JOIN company
					JOIN pharmacy
					JOIN users
					JOIN tradesman
					JOIN form
						ON 		actions.id_company=company.id_company 
							AND actions.id_pharmacy=pharmacy.id_pharmacy 
							AND actions.id_form=form.id_form
							AND actions.id_tradesman=tradesman.id_tradesman
							AND actions.id_user=users.id_user
							AND actions.splneno=\"ne\"
							AND actions.id_user='$userId'
							AND actions.datum > '$dateForHidden'  

			ORDER BY actions.datum ASC";
	*/
	/*
	$sqlSplneno = "SELECT actions.id_action, actions.datum, company.nazev, actions.odeslano, pharmacy.nazev, pharmacy.ulice, pharmacy.mesto
				FROM actions 
					JOIN company
					JOIN pharmacy
					JOIN users
					JOIN tradesman
					JOIN form
						ON 		actions.id_company=company.id_company 
							AND actions.id_pharmacy=pharmacy.id_pharmacy 
							AND actions.id_form=form.id_form
							AND actions.id_tradesman=tradesman.id_tradesman
							AND actions.id_user=users.id_user
							AND actions.splneno=\"ano\"
							AND actions.schvaleno=\"ne\"
							AND actions.id_user='$userId'
							AND actions.datum > '$dateForHidden' 

			ORDER BY actions.datum ASC";

	*/

	/*
	$sqlSchvaleno = "SELECT actions.id_action, actions.datum, company.nazev, actions.odeslano, pharmacy.nazev, pharmacy.ulice, pharmacy.mesto, users.stat
				FROM actions 
					JOIN company
					JOIN pharmacy
					JOIN users
					JOIN tradesman
					JOIN form
						ON 		actions.id_company=company.id_company 
							AND actions.id_pharmacy=pharmacy.id_pharmacy 
							AND actions.id_form=form.id_form
							AND actions.id_tradesman=tradesman.id_tradesman
							AND actions.id_user=users.id_user
							AND actions.splneno=\"ano\"
							AND actions.schvaleno=\"ano\"
							AND actions.id_user='$userId'
							AND actions.datum BETWEEN '$dateFrom' AND '$dateTo'

			ORDER BY actions.datum ASC";
    */
	$sqlBudouci = "SELECT mdg_events.id_mdg_event, mdg_events.datum, mdg_company.nazev, mdg_events.cas, mdg_company_details.nazev, mdg_company_details.ulice, mdg_company_details.cp, mdg_company_details.psc, mdg_company_details.mesto
				FROM mdg_events 
					JOIN mdg_company
					JOIN mdg_company_details
						ON 		mdg_events.id_user=1
							AND mdg_events.id_mdg_company=mdg_company.id_mdg_company 
							AND mdg_events.id_mdg_company_details=mdg_company_details.id_mdg_company_details 
							AND mdg_events.splneno=\"ne\"
							AND mdg_events.datum BETWEEN '$dateFrom' AND '$dateTo'
			ORDER BY mdg_events.datum ASC";

	$sqlNesplneno = "SELECT mdg_events.id_mdg_event, mdg_events.datum, mdg_company.nazev, mdg_events.cas, mdg_company_details.nazev,  mdg_company_details.ulice, mdg_company_details.cp, mdg_company_details.psc, mdg_company_details.mesto
				FROM mdg_events 
					JOIN mdg_company
					JOIN mdg_company_details
						ON 		mdg_events.id_user='$userId'
							AND mdg_events.id_mdg_company=mdg_company.id_mdg_company 
							AND mdg_events.id_mdg_company_details=mdg_company_details.id_mdg_company_details 
							AND mdg_events.splneno=\"ne\"
							AND mdg_events.datum > '$dateForHidden' 
			ORDER BY mdg_events.datum ASC";
	
	$sqlSplneno = "SELECT mdg_events.id_mdg_event, mdg_events.datum, mdg_company.nazev, mdg_events.odeslano, mdg_company_details.nazev,  mdg_company_details.ulice, mdg_company_details.cp, mdg_company_details.psc, mdg_company_details.mesto
				FROM mdg_events 
					JOIN mdg_company
					JOIN mdg_company_details
						ON 		mdg_events.id_user='$userId'
							AND mdg_events.id_mdg_company=mdg_company.id_mdg_company 
							AND mdg_events.id_mdg_company_details=mdg_company_details.id_mdg_company_details 
							AND mdg_events.splneno=\"ano\"
							AND mdg_events.schvaleno=\"ne\"
							AND mdg_events.datum > '$dateForHidden' 
			ORDER BY mdg_events.datum ASC";

	$sqlSchvaleno = "SELECT mdg_events.id_mdg_event, mdg_events.datum, mdg_company.nazev, mdg_events.odeslano, mdg_company_details.nazev, mdg_company_details.ulice, mdg_company_details.cp, mdg_company_details.psc, mdg_company_details.mesto
				FROM mdg_events 
					JOIN mdg_company
					JOIN mdg_company_details
						ON 		mdg_events.id_user='$userId'
							AND mdg_events.id_mdg_company=mdg_company.id_mdg_company 
							AND mdg_events.id_mdg_company_details=mdg_company_details.id_mdg_company_details 
							AND mdg_events.splneno=\"ano\"
							AND mdg_events.schvaleno=\"ano\"
							AND mdg_events.datum > '$dateForHidden' 
			ORDER BY mdg_events.datum ASC";


	//echo "$sqlBudouci <br>$sqlNesplneno <br>$sqlSplneno <br>$sqlSchvaleno <br>";


	/*$sqlVyplata = "SELECT actions.cil, actions.cil_ks, actions.poc_hodin, actions.bonus, actions.celkem_trzba, actions.celkem_kusu, actions.otatni_ks, actions.otatni_cena
				FROM actions 
					JOIN company
					JOIN pharmacy
					JOIN users
					JOIN tradesman
					JOIN form
						ON 		actions.id_company=company.id_company 
							AND actions.id_pharmacy=pharmacy.id_pharmacy 
							AND actions.id_form=form.id_form
							AND actions.id_tradesman=tradesman.id_tradesman
							AND actions.id_user=users.id_user
							AND actions.splneno=\"ano\"
							AND actions.schvaleno=\"ano\"
							AND actions.id_user='$userId'

			ORDER BY actions.datum ASC";*/


	$dataBudouci = mysqli_query($conn, $sqlBudouci);
	$dataNesplneno = mysqli_query($conn, $sqlNesplneno);
	$dataSplneno = mysqli_query($conn, $sqlSplneno);
	$dataSchvaleno = mysqli_query($conn, $sqlSchvaleno);
	//$dataVyplata = mysqli_query($conn, $sqlVyplata);
	$hodinovka = $_SESSION['cena_za_h'];


 ?>

 
 <section class="seznam">
				<h2>Nesplněné akce</h2>
				<?php //echo "$sqlNesplneno <br><br>"; ?>
				<table>
					<thead>
						<tr>
							<th>Datum</th>
							<th>Firma</th>
							<th>Čas</th>
							<th>Obchod</th>
							<th>Adresa</th>
							<th>Vyplnit</th>
						</tr>
					</thead>
					<tbody>

<?php 
	while ( $row = mysqli_fetch_row($dataNesplneno) ) {
			echo "
						<tr>";
			
			for ($i=1; $i < count($row); $i++) {  
				if ($i==1){
					echo "
							<td class=\"per10\">".date("d.m.Y", strtotime($row[$i]))."</td>";
					continue;
	
				}
				if ($i==3) {
					$timeArray 	= explode("|", $row[$i]);
					$time = vypisCas( $timeArray );
					echo "
							<td class=\"per10\">$time</td>";
					continue;
				}
				if ($i==4) { echo "
							<td class=\"per35\">".$row[$i]."</td>";
					continue; 
				}
				if ($i==5) { continue; } if ($i==7) { continue; } if ($i==8) { continue; }
				if ($i==6) {
					echo "
							<td class=\"per35\">$row[5] $row[6], $row[7] $row[8]</td>";
					continue;

				}
				echo "
							<td class=\"per10\">".$row[$i]."</td>";
			}				
			echo '
							<td class="center per10"><a href="event-fill.php?id=' . $row[0] . '">Splnit</a></td>';

			
			echo "
						</tr>";

	}
	?>
					</tbody>
				</table>
			</section>

 <section class="seznam">
				<h2>Splněné akce</h2>
				<table>
					<thead>
						<tr>
							<th>Datum</th>
							<th>Firma</th>
							<th>Odesláno</th>
							<th>Obchod</th>
							<th>Adresa</th>
							<th>Náhled</th>
						</tr>
					</thead>
					<tbody>

<?php 
	while ( $row = mysqli_fetch_row($dataSplneno) ) {
			echo "
						<tr>";
			
			for ($i=1; $i < count($row); $i++) {  
				if ($i==1){
					echo "
							<td class=\"per10\">".date("d.m.Y", strtotime($row[$i]))."</td>";
					continue;
	
				} 
				if ($i==3){
					echo "
							<td>".date("d.m.Y H:m:s", strtotime($row[$i]))."</td>";
					continue;
	
				}
				if ($i==4) { echo "
							<td class=\"per35\">".$row[$i]."</td>";
					continue; 
				}
				if ($i==5) { continue; } if ($i==7) { continue; } if ($i==8) { continue; }
				if ($i==6) {
					echo "
							<td class=\"per35\">$row[5] $row[6], $row[7] $row[8]</td>";
					continue;

				}
				echo "
							<td class=\"per10\">".$row[$i]."</td>";
			}					
			echo '
							<td class="center per10"><a href="event-show.php?id=' . $row[0] . '">Zobrazit</a></td>';

			
			
			echo "
						</tr>";

	}
	?>
					</tbody>
				</table>
			</section>

 <section class="seznam">
				<h2>Schválené akce</h2>
				<table>
					<thead>
						<tr>
							<th>Datum</th>
							<th>Firma</th>
							<th>Odesláno</th>
							<th>Obchod</th>
							<th>Adresa</th>
							<!--<th>Splněný bonus</th>
							<th>Výplata</th>-->
							<th>Náhled</th>
						</tr>
					</thead>
					<tbody>

<?php 
	while ( $row = mysqli_fetch_row($dataSchvaleno) ) {
			//$row2 = mysqli_fetch_row($dataVyplata);
			echo "
						<tr>";
			
			for ($i=1; $i < count($row); $i++) {  
				if ($i==1){
					echo "
							<td class=\"per10\">".date("d.m.Y", strtotime($row[$i]))."</td>";
					continue;
	
				} 
				if ($i==3){
					echo "
							<td>".date("d.m.Y H:m:s", strtotime($row[$i]))."</td>";
					continue;
	
				}
				if ($i==4) { echo "
							<td class=\"per35\">".$row[$i]."</td>";
					continue; 
				}
				if ($i==5) { continue; } if ($i==7) { continue; } if ($i==8) { continue; }
				if ($i==6) {
					echo "
							<td class=\"per35\">$row[5] $row[6], $row[7] $row[8]</td>";
					continue;

				}
				if ($i==7) { continue; }
				echo "
							<td class=\"per10\">".$row[$i]."</td>";
			}	
			/******************VYPLATA********************/
			/*
				$cilKc 			= $row2[0];
				$cilKs 			= $row2[1];
				$pocHodin 		= $row2[2];
				$bonus	 		= $row2[3];

				$trzbaProm 		= $row2[4];
				$ksProm	 		= $row2[5];
				$ksNeprom	 	= $row2[6];
				$trzbaNeprom 	= $row2[7];
				$mena = "Kč,-";
				if ($row[7]=="sk") {
					$mena = "&euro;";
				}


				$ksCelkem = $ksProm + $ksNeprom;
				$trzbaCelkem = $trzbaProm + $trzbaNeprom;
				$zakladniMzda = $pocHodin * $hodinovka;

				//$vyplataCelkem = $zakladniMzda;


				echo "
							<td class=\"center per10\">";
				if ($trzbaCelkem >= $cilKc && $cilKc > 0) {
					$vyplataCelkem = $zakladniMzda + $bonus;
					echo "ano";
				}
				else if ($ksCelkem >= $cilKs && $cilKs > 0) {
					$vyplataCelkem = $zakladniMzda + $bonus;
					echo "ano";
				}
				else {
					$vyplataCelkem = $zakladniMzda;
					echo "ne";
				}
				echo "
							</td>";	

				$vyplataFormatovana	= number_format($vyplataCelkem, 0, ',', ' ')." $mena";


				//if ($i==8) { continue; }

				echo "
							<td class=\"right per10\">$vyplataFormatovana</td>";


				//echo "
				//			<td>";
				//
				//echo "Základní mzda: ".$zakladniMzda."<br>";
				//echo "Potenciální bonus: ".$bonus."<br>";
				//echo "Cíl v Kč: ".$cilKc."<br>";
				//echo "Tržba celkem: ".$trzbaCelkem."<br>";
				//echo "Cíl v Ks: ".$cilKs."<br>";
				//echo "Kusu celkem: ".$ksCelkem."<br>";
				//echo "Výplata: ".$vyplataCelkem."<br>";
				//
				//echo "
				//			</td>";*/
			/*********************************************/		

			echo '
							<td class="center per10"><a href="event-show.php?id=' . $row[0] . '">Zobrazit</a></td>';

			
			echo "
						</tr>";

	}
	?>
					</tbody>
				</table>
			</section>


			<section class="seznam">
				<h2>Budoucí akce bez promotéra</h2>
				<?php //echo "$sqlBudouci<br><br>"; ?>
				<table>
					<thead>
						<tr>
							<th>Datum</th>
							<th>Firma</th>
							<th>Čas</th>
							<th>Obchod</th>
							<th>Adresa</th>
							<!--<th>Zažádat o akci</th>-->
						</tr>
					</thead>
					<tbody>

<?php 
	while ( $row = mysqli_fetch_row($dataBudouci) ) {
			echo "
						<tr>";
			
			for ($i=1; $i < count($row); $i++) {  
				if ($i==1){
					echo "
							<td class=\"per10\">".date("d.m.Y", strtotime($row[$i]))."</td>";
					continue;
	
				}
				if ($i==3) {
					$timeArray 	= explode("|", $row[$i]);
					$time = vypisCas( $timeArray );
					echo "
							<td class=\"per10\">$time</td>";
					continue;
				}
				if ($i==4) { echo "
							<td class=\"per35\">".$row[$i]."</td>";
					continue; 
				}
				if ($i==5) { continue; } if ($i==7) { continue; } if ($i==8) { continue; }
				if ($i==6) {
					echo "
							<td class=\"per35\">$row[5] $row[6], $row[7] $row[8]</td>";
					continue;

				}
				echo "
							<td class=\"per10\">".$row[$i]."</td>";
			}				
			/*echo '
							<td class="center per10"><a href="action-request.php?id=' . $row[0] . '">Odeslat</a></td>';*/
			//echo '
			//				<td class="center per10">Zažádat</td>';
			
			echo "
						</tr>";

	}
	?>
					</tbody>
				</table>
			</section>


 <?php 

 	dbClose($conn);

  ?>