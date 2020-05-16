<?php 

	$conn = dbConnect();
	mysqli_query($conn, "SET NAMES utf8");

	$sql = "SELECT company.nazev, pharmacy.nazev, pharmacy.ulice, pharmacy.okres, pharmacy.retezec, actions.datum, actions.cas, actions.poc_hodin, actions.pauza, users.prijmeni, users.telefon, actions.cil, actions.celkem_trzba
			FROM actions 
			JOIN company
			JOIN pharmacy
			JOIN users
			JOIN form
				ON 		actions.id_company=company.id_company 
					AND actions.id_pharmacy=pharmacy.id_pharmacy 
					AND actions.id_user=users.id_user 
					AND actions.id_form=form.id_form
					AND company.id_company=2

			ORDER BY company.nazev ASC

			";


	$sqlKoo = "SELECT users.prijmeni, users.telefon 
			FROM actions
			JOIN users 
			JOIN company
			JOIN pharmacy
			JOIN form
				ON  	actions.id_user_koo=users.id_user
					AND actions.id_company=company.id_company 
					AND actions.id_pharmacy=pharmacy.id_pharmacy
					AND actions.id_form=form.id_form
					AND company.id_company=2

				ORDER BY company.nazev ASC";

	$sqlUnion = "SELECT company.nazev, pharmacy.nazev, pharmacy.ulice, pharmacy.okres, pharmacy.retezec, actions.datum, actions.cas, actions.poc_hodin, actions.pauza, users.prijmeni, users.telefon, actions.cil, actions.celkem_trzba
			FROM actions 
			JOIN company
			JOIN pharmacy
			JOIN users
			JOIN form
				ON 		actions.id_company=company.id_company 
					AND actions.id_pharmacy=pharmacy.id_pharmacy 
					AND actions.id_user=users.id_user 
					AND actions.id_form=form.id_form
					AND company.id_company=2

			UNION 

			SELECT users.prijmeni, users.telefon 
			FROM actions
			JOIN users 
			JOIN company
			JOIN pharmacy
			JOIN form
				ON  	actions.id_user_koo=users.id_user
					AND actions.id_company=company.id_company 
					AND actions.id_pharmacy=pharmacy.id_pharmacy
					AND actions.id_form=form.id_form
					AND company.id_company=2


	";


?>

	<section class="seznam">
		<h2>Seznam šablon akcí</h2>
		<table>
			<thead>
				<tr>
					<th>Firma</th>
					<th>Lékárna</th>
					<th>Ulice</th>
					<th>Obec</th>
					<th>Řetězec</th>
					<th>Datum akce</th>
					<th>Pracovní doba s pauzou</th>
					<th>Počet hodin bez pauzy</th>
					<th>Čas pauzy</th>
					<th>Promotérka</th>
					<th>Telefon promotérky</th>
					<th>Koordinátor</th>
					<th>Telefon koordinátora</th>
					<th>Minimum pro dosažení motivace</th>
					<th>Celková tržba</th>
					<th>Poznámky k akci</th>
				</tr>
			</thead>
			<tbody>
<?php 

	$data1 = mysqli_query($conn, $sql);
	$data2 = mysqli_query($conn, $sqlKoo);

	while ( $row1 = mysqli_fetch_row($data1) ) {
		$row2 = mysqli_fetch_row($data2);
		echo "
						<tr>";
			
		for ($i=0; $i < count($row1); $i++) { 
			if ($i==6) { //Oformátuj čas
				$timeArray 	= explode("|", $row1[$i]);
				$time 		= vypisCas( $timeArray );
				echo "
						<td>".$time."</td>";
				continue;
			}
			echo "
					<td>".$row1[$i]."</td>";
			if ($i==10) { //Vypiš promotérku
				for ($j=0; $j < count($row2); $j++) { 
					echo "
						<td>".$row2[$j]."</td>";
				}
			}
			
		}
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