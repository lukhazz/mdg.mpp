
<?php 

	$conn = dbConnect();
	mysqli_query($conn, "SET NAMES utf8");

	$error = false;
	$messageError = "";
	$messageSuccess = "";

	
	if (!empty($_GET['id'])) {
		$id = $_GET['id'];
	}
	else {
		$id = "0";
	}
	//echo "ID je: ".$id."<br>";


	$sqlSummary = "SELECT mdg_events.datum, mdg_events.cas, mdg_company.nazev, mdg_company_details.nazev, mdg_company_details.ulice, mdg_company_details.cp, mdg_company_details.psc, mdg_company_details.mesto, users.prijmeni, users.jmeno, mdg_events.km_celkem, mdg_events.od_do, mdg_events.schvaleno, mdg_events.popis, mdg_events.poznamky, mdg_events.splneno
				FROM mdg_events 
					JOIN mdg_company
					JOIN mdg_company_details
					JOIN users
						ON 		mdg_events.id_mdg_company=mdg_company.id_mdg_company 
							AND mdg_events.id_user=users.id_user
							AND mdg_events.id_mdg_company_details=mdg_company_details.id_mdg_company_details 
							AND mdg_events.id_mdg_event=$id";

	//echo "$sqlSummary <br>";

	date_default_timezone_set('Europe/Prague');	// Pásmo
	setlocale(LC_MONETARY, 'it_IT');
	SetLocale(LC_ALL, "Czech");

	$data 		= mysqli_query($conn, $sqlSummary);
	$row 		= mysqli_fetch_row($data);
	$date 		= date("d. m. Y", strtotime($row[0]));
	$timeArray 	= explode("|", $row[1]);
	$time 		= vypisCas( $timeArray );
	//$goal 		= number_format($row[2], 0, ',', ' ');
	$company 	= $row[2];
	$pharmacy 	= $row[3];
	$street 	= $row[4];
	$cp 		= $row[5];
	$psc		= $row[6];
	$town		= $row[7];
	$user 		= $row[8]." ".$row[9];
	$kmCelkm	= $row[10];
	$od_do		= $row[11];
	$schvaleno	= $row[12];
	$zadani		= $row[13];
	$poznamky	= $row[14];
	$splneno	= $row[15];
	//echo "km: $kmCelkm cas: $od_do <br>";
	if (!empty($od_do)) {
		$timeFromToArray 	= explode("|", $row[11]);
		$timeFromTo 		= vypisCas( $timeFromToArray );
		//echo $timeFromToArray[0]." $timeFromTo";
	}
	if ($schvaleno == "ano") {
		$valueActiveCheck 		="checked=\"checked\"";
	}
	else {
		$valueActiveCheck 		="";
	}
	
?>

<table>
						<tr>
							<td class="per20">Datum</td>
							<td class="per30"><?php 
						if (!empty($date)) {
							echo $date;
						}
						else {
							echo "<input required=\"required\" type=\"text\" name=\"date\" id=\"datepicker-today\" value=\"".date("Y-m-d")."\">";
						} 
						?>
							
						 </td>
							
							<td class="per20">Uživatel</td>
							<td class="per30"><?php echo "$user"; ?></td>
							
						</tr>
						<tr>
							<td class="per20">Čas</td>
							<td class="per30"><?php 
						if ($time!="0:00-0:00") {
							echo $time;
						}
						else { echo "nezadán";
						} 
						?></td>
							<td class="per20">Zákazník</td>
							<td class="per30"><?php if (!empty($company)) { echo "$company"; } ?></td>
						 	
						</tr>

						<tr>
							<td class="per20">Příchod/odchod</td>
							<td class="per30">
								od <input  type="number" name="timeFromTo[]" class="clock right <?php if ($show=="show") { echo "invisible display-none"; } ?>" placeholder="8" min="0" max="23" required="require" value="<?php if (!empty($timeFromToArray[0])) { if ($timeFromToArray[0]!=0) {echo $timeFromToArray[0];} } ?>"><?php if ($show=="show" ) { echo "$timeFromToArray[0]"; } ?>:<input type="number" name="timeFromTo[]" class="clock <?php if ($show=="show") { echo "invisible display-none"; } ?>" placeholder="30" min="0" max="59" required="require" value="<?php if ((!empty($timeFromToArray[1]))) { echo $timeFromToArray[1];}  ?>"><?php if ($show=="show" ) { echo formatujCas($timeFromToArray[1]); } ?>
							&nbsp;&nbsp;do <input type="number" name="timeFromTo[]" class="clock right <?php if ($show=="show") { echo "invisible display-none"; } ?>" placeholder="16" min="0" max="23" required="require" value="<?php if (!empty($timeFromToArray[2])) { if ($timeFromToArray[2]!=0) {echo $timeFromToArray[2];} } ?>"><?php if ($show=="show" ) { echo "$timeFromToArray[2]"; } ?>:<input type="number" name="timeFromTo[]" class="clock <?php if ($show=="show") { echo "invisible display-none"; } ?>" placeholder="30" min="0" max="59" required="require" value="<?php if ((!empty($timeFromToArray[3]))) { echo $timeFromToArray[3]; } ?>"><?php if ($show=="show" ) { echo formatujCas($timeFromToArray[3]); } ?> <br>
							</td>
							<td class="per20">Obchod</td>
							<td class="per30"><?php if (!empty($pharmacy)) { echo $pharmacy; } ?></td>
						</tr>
						<tr>
							<td class="per20">KM celkem</td>
							<td class="per30"><input type="number" name="km-celkem" class="number <?php if ($show=="show") { echo "invisible display-none"; } ?>" placeholder="0-999" min="0" max="999" value="<?php if (!empty($kmCelkm)) { echo $kmCelkm; } ?>"> <?php if ($show=="show" ) { echo "$kmCelkm"; } ?>
							</td>
							<td class="per20">Adresa</td>
							<td class="per30"><?php if (!empty($town)) { echo "$street $psc, $town $cp"; } ?></td>
						</tr>
					</table>