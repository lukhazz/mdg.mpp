<?php $id = $_GET['id']; ?>
<?php 
						$conn = dbConnect(); // Připojíme se k databázi
						mysqli_query($conn, "SET NAMES utf8");

						$sqlImg  	= "SELECT obr1, obr2, obr3
									   FROM mdg_events 
									   WHERE id_mdg_event = $id";
						//echo "$sqlImg <br>";
					   	$dataImg 	= mysqli_query($conn, $sqlImg);
					   	$rowImg		= mysqli_fetch_row($dataImg);
					   	if (!empty($rowImg[0])) {
						   	//$dataImg 	= mysqli_query($conn, $sqlImg);	
							//$rowImg		= mysqli_fetch_row($dataImg);
							//echo "$id<br>$rowImg[0]<br>$rowImg[1]<br>$rowImg[2]<br>";
							$name1 = explode("/", $rowImg[0]);
							$name2 = explode("/", $rowImg[1]);
							$name3 = explode("/", $rowImg[2]);
							if ($rowImg[0]=="Array" || empty($rowImg[0])) {
								$rowImg[0] = "images/none.png";
								$name1[5] = "Nenahraná";
							}
							if ($rowImg[1]=="Array" || empty($rowImg[1])) {
								$rowImg[1] = "images/none.png";
								$name2[5] = "Nenahraná";
							}
							if ($rowImg[2]=="Array" || empty($rowImg[2])) {
								$rowImg[2] = "images/none.png";
								$name3[5] = "Nenahraná";
							}
							//echo "$rowImg[0]<br>$rowImg[1]<br>$rowImg[2]<br>";
						 ?>
							<a href="<?php echo "$rowImg[0]"; ?>" data-lightbox="akce-<?php echo "$id"; ?>" data-title="<?php echo "$name1[5]"; ?>"><img src="<?php echo "$rowImg[0]"; ?>" width="33%" alt="Náhled" title="Klikni pro zvětšení"></a>
							<a href="<?php echo "$rowImg[1]"; ?>" data-lightbox="akce-<?php echo "$id"; ?>" data-title="<?php echo "$name2[5]"; ?>"><img src="<?php echo "$rowImg[1]"; ?>" width="33%" alt="Náhled" title="Klikni pro zvětšení"></a>
							<a href="<?php echo "$rowImg[2]"; ?>" data-lightbox="akce-<?php echo "$id"; ?>" data-title="<?php echo "$name3[5]"; ?>"><img src="<?php echo "$rowImg[2]"; ?>" width="33%" alt="Náhled" title="Klikni pro zvětšení"></a>

					<?php 
					   }
				    ?>