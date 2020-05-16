<?php 

	$conn = dbConnect();
	mysqli_query($conn, "SET NAMES utf8");

	$sql = "SELECT vdl, nazev, mesto, ulice, id_pharmacy FROM mdg_company_details ORDER BY vdl";
	$data = mysqli_query($conn, $sql);
?>
			<section class="seznam">
				<h2>Seznam lékáren</h2>
				<table>
					<thead>
						<tr>
							<th>VDL</th>
							<th>Jméno</th>
							<th>Město</th>
							<th>Ulice</th>
							<th>Upravit</th>
						</tr>
					</thead>
					<tbody>

<?php 
	while ( $row = mysqli_fetch_row($data) ) {
			echo "
						<tr>";
			
			for ($i=0; $i < (count($row))-1; $i++) { 
				echo "
							<td>".$row[$i]."</td>";
			}				
			echo '
							<td><a href="company-details-edit.php?id=' . $row[4] . '">Edit</a></td>';

			
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