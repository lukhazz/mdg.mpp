 <?php 

	$conn = dbConnect();
	mysqli_query($conn, "SET NAMES utf8");

	$sql = "SELECT company-details.id_company-details, company.nazev, company-details.prijmeni, company-details.telefon, company-details.stat
			FROM company-details 
				JOIN company
					ON 		company-details.id_company=company.id_company
					ORDER BY company.nazev, company-details.prijmeni ASC";
	$data = mysqli_query($conn, $sql);
?>
			<section class="seznam">
				<h2>Seznam reprezentantů</h2>
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th>Firma</th>
							<th>Příjmení</th>
							<th>Telefon</th>
							<th>Stát</th>
							<th>Upravit</th>
						</tr>
					</thead>
					<tbody>

<?php 
	while ( $row = mysqli_fetch_row($data) ) {
			echo "
						<tr>";
			
			for ($i=0; $i < count($row); $i++) { 
				echo "
							<td>".$row[$i]."</td>";
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
<?php


	dbClose($conn);
 ?>