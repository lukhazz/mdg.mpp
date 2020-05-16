<?php 

	$conn = dbConnect();
	mysqli_query($conn, "SET NAMES utf8");

	$sql = "SELECT id_user,prijmeni,jmeno,aktivni,cena_typ,cena_za_h,role,pozice,telefon,email,dat_nar FROM users WHERE id_user > 0 ORDER BY id_user DESC";
	$data = mysqli_query($conn, $sql);
?>
			<section class="seznam">
				<h2>Seznam uživatelů</h2>
				<table>
					<thead>
						<tr>
							<th>ID</th>
							<th>Příjmení</th>
							<th>Jméno</th>
							<th>Aktivní</th>
							<th>Plat</th>
							<th>Kč nebo &euro;/h</th>
							<th>Práva</th>
							<th>Funkce</th>
							<th>Telefon</th>
							<th>E-mail</th>
							<!--<th>Datum narození</th>-->
							<th>Věk</th>
							<th>Upravit</th>
						</tr>
					</thead>
					<tbody>

<?php 
	while ( $row = mysqli_fetch_row($data) ) {
			echo "
						<tr>";
			
			for ($i=0; $i < count($row); $i++) { 
				if ($i==4) {
				echo "
							<td>";
					$role = explode(",", $row[$i]);
					for ($j=0; $j < sizeof($role); $j++) { 
						echo $role[$j]."<br>";
					}
				echo "</td>";
				}
				else if ($i == 10) {
					continue;	
					/*echo "
								<td>".date("d. m. Y", strtotime($row[$i]))."</td>";*/
				}
				else {
				echo "
							<td>".$row[$i]."</td>";

				}
			}		
			$vek = dopocitejVek($row[10]);
			    echo "
							<td>".$vek." let</td>";

			echo '
							<td><a href="user-edit.php?id=' . $row[0] . '">Edit</a></td>';

			
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