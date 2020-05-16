<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {  // Pokud se zmáčkne tlačítko POST, udělej funkci
		if ( isset($_POST['id']) &&  // prázné políčko taky vezme isset, pro tuto kontrolu bychom musel použít empty
			 isset($_POST['password']) ) {

			$id = $_POST['id']; // ulozim si promenne
			$password = $_POST['password'];

			if ( $password = "123456") {
				$conn = dbConnect();
				mysqli_query($conn, "SET NAMES utf8");

				if ( $conn ) { 
					$sql = "SELECT id FROM ctenari WHERE id='$id'";
			
					if ( $data = mysqli_query($conn, $sql) ) {

						$row = mysqli_fetch_row($data);

						if ($row != NULL) {
							$sql = "DELETE FROM ctenari WHERE id='$id'";
							if ( mysqli_query( $conn, $sql ) ) {
								$del = "Čtenář byl smazán.";
							}
						}
						else {
							$del = "Uživatel neexistuje.";
						}
					}
				}
				dbClose($conn);
			}
			else {
				$del = "Nesprávné heslo";
			}

		}
	}


 ?>