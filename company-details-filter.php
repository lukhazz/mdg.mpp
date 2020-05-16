<?php 

	if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
		$conn = dbConnect();
		mysqli_query($conn, "SET NAMES utf8");

		$param = "";
	
		$error         	= false;

		if (!empty($_POST['nazev'])) 	{ $valuenazev 	= $_POST['nazev']; 	 	$param .= " AND mdg_company_details.nazev LIKE '%$valuenazev%'"; }
		if (!empty($_POST['okres']))   	{ $valueokres 	= $_POST['okres']; 	 	$param .= " AND mdg_company_details.okres LIKE '%$valueokres%'";}
		if (!empty($_POST['mesto']))   	{ $valuemesto 	= $_POST['mesto']; 	 	$param .= " AND mdg_company_details.mesto LIKE '%$valuemesto%'";}
		if (!empty($_POST['psc']))   	{ $valuepsc 	= $_POST['psc']; 	 	$param .= " AND mdg_company_details.psc LIKE '%$valuepsc%'";}
		if (!empty($_POST['stat']))  	{ $valuestat 	= $_POST['stat'];  		}
		if (!empty($_POST['cp']))   	{ $valuecp 		= $_POST['cp'];  		$param .= " AND mdg_company_details.cp LIKE '%$valuecp%'";}
		if (!empty($_POST['phone']))   	{ $valuephone 	= $_POST['phone']; 	 	$param .= " AND mdg_company_details.k_cislo LIKE '%$valuephone%'";}
		if (!empty($_POST['kontakt']))  { $valuekontakt = $_POST['kontakt'];  	$param .= " AND mdg_company_details.k_jmeno LIKE '%$valuekontakt%'";}
		if (!empty($_POST['sort-by']))  { $sortBy 		= $_POST['sort-by'];  }
		if (!empty($_POST['sort']))  	{ $sort 		= $_POST['sort']; 	 }
		if (!empty($_POST['limit']))  	{ (int)$limit 	= $_POST['limit']; 	 }


		//if (!empty($_POST['retezec']))  { $valueretezec = $_POST['retezec'];  echo "retezec: $valueretezec<br>";}

		if ($valuestat == "cz") {
			$param .= " AND mdg_company_details.stat=\"cz\" ";
		}
		else if ($valuestat == "sk") {
			$param .= " AND mdg_company_details.stat=\"sk\" ";
		}
		else {
			$param .= "";
		}

		if (!empty($_POST['retezec']))   	{ 
				$valueretezec 	= $_POST['retezec']; 
				//echo "<br>$valueretezec[0] <br><br>";
				$param .= " AND (";	 	
				for ($i=0; $i < count($valueretezec); $i++) { 
					$param .= "mdg_company_details.	id_mdg_company = '$valueretezec[$i]'";
					if (($i+1)!=count($valueretezec)) {
						$param .= " OR ";
					}
					else {
						$param .= ") ";
					}
					//echo "<br>$valueretezec[$i] <br><br>";
				}
			}


		$sql = "SELECT mdg_company_details.id_mdg_company_details, mdg_company_details.nazev, mdg_company.nazev, mdg_company_details.stat, mdg_company_details.okres, mdg_company_details.mesto, mdg_company_details.psc, mdg_company_details.ulice, mdg_company_details.cp, mdg_company_details.k_jmeno, mdg_company_details.k_cislo
				FROM mdg_company_details
					JOIN mdg_company 
						ON 		mdg_company_details.id_mdg_company=mdg_company.id_mdg_company 
						AND 	mdg_company_details.id_mdg_company_details > 0 $param 
				ORDER BY $sortBy $sort
				LIMIT $limit";

		//echo "$sql<br>";

?>
		<div class="container per100 padd-top-14">
			<main>
				<section class="seznam td-right">
					<h2>Výpis obchodů</h2>
					<table id="pharmacy">
						<thead>
							<tr>
								<th>Název</th>
								<th>Řetězec</th>
								<th>Stát</th>
								<th>Okres</th>
								<th>Město</th>
								<th>PSČ</th>
								<th>Ulice</th>
								<th>ČP</th>
								<th>Kontaktní osoba</th>
								<th>Telefon</th>
								<th>Upravit</th>
							</tr>
						</thead>
						<tbody>	 
							<?php 
							$data = mysqli_query($conn, $sql);
							while ( $row = mysqli_fetch_row($data) ) {
								echo "
							<tr>";
									
								for ($i=1; $i < count($row); $i++) { 
									if (!empty($row[$i])) {
									echo "
								<td>".$row[$i]."</td>";
									}
									else {
										echo "
								<td>&nbsp;</td>";
									}
								}
								echo '
								<td><a href="company-details-edit.php?id=' . $row[0] . '">Edit</a></td>';
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