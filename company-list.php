<?php 

	$conn = dbConnect();
	mysqli_query($conn, "SET NAMES utf8");

	$sql = "SELECT * FROM mdg_company ORDER BY nazev ASC";
	$data = mysqli_query($conn, $sql);
?>
			<section class="seznam">
				<h2>Seznam firem</h2>
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th>Jméno</th>
							<!--<th>Typ ceny</th>-->
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
							<td><a href="company-edit.php?id=' . $row[0] . '">Edit</a></td>';

			
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