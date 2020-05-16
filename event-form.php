<?php if (!empty($messageSuccess)) { echo '<div class="message-success">'.$messageSuccess.'</div>';	} ?>
<?php if (!empty($messageError))   { echo '<div class="message-error">'.$messageError.'</div>';	} ?>

<?php 

	
	
	//if (!empty($_GET['id'])) {
	//	$id = $_GET['id'];
	//}
	//else {
	//	$id = "0";
	//}


 ?>
				<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="register" class="clearfix">


					

					<label for="name">Název</label><input type="text" name="name" id="name" value="<?php if(!empty($valueName)){echo "$valueName";} ?>" required>
					<div class="error"><?php if(!empty($error_name)) { echo $error_name; } ?></div>

					<div class="flex">

						<!--
						<label for="chain">Řetězec</label><select name="chain" id="chain" required="required" class="w78">
							<option <?php //echo "$select"; ?>  value="" disabled>Vybrat řetězec</option><?php

								$sql = "SELECT mdg_company.id_mdg_company, mdg_company.stat, mdg_company.nazev
										FROM mdg_company
										ORDER BY mdg_company.nazev
											";
								
								mysqli_query($conn, "SET NAMES utf8");

								$data = mysqli_query($conn, $sql);
								$i = 0;
								while($radek = mysqli_fetch_row($data)) {
									//echo $radek[$i];
									if (empty($valueChain)) {
										$valueChain = "";
									}
									if ($radek%3==1) {
										//if ($radek[$i] == $users) {
										//	$status ="available";
										//}
										//for($i=0;$i<	count($radek);$i++) {
											//$i=0;
										echo "
							<option value=\"$radek[$i]\" ";?><?php if($valueChain==$radek[$i]){ echo "selected=\"selected\""; } ?><?php echo ">".$radek[$i+2]." - ".$radek[$i+1]." (".$radek[$i].")</option>";
										//} 
									}
								$status ="";
									
								}

							?>

						</select>

						-->
					</div><br>
					<div class="flex">
						<label for="project">Projekt</label>
						<select name="project" id="project" required="required" class="w78">
							<option <?php //echo "$select"; ?>  value="" disabled>Vybrat projekt</option><?php

								if ($project==0) {
									$additional .= "WHERE id_mdg_project>0 ";
								}
								else {
									$additional .= "WHERE id_mdg_project=$project ";
								}

								$sql = "SELECT mdg_project.id_mdg_project, mdg_project.nazev
										FROM mdg_project
										$additional
										ORDER BY mdg_project.nazev
											";
								$conn = dbConnect();
								mysqli_query($conn, "SET NAMES utf8");

								$data = mysqli_query($conn, $sql);
								$i = 0;
								while($radek = mysqli_fetch_row($data)) {
									//echo $radek[$i];
									if (empty($valueProject)) {
										$valueProject = "";
									}
									if ($radek%3==1) {
										//if ($radek[$i] == $users) {
										//	$status ="available";
										//}
										//for($i=0;$i<	count($radek);$i++) {
											//$i=0;
										echo "
							<option value=\"$radek[$i]\" ";?><?php if($valueProject==$radek[$i]){ echo "selected=\"selected\""; } ?><?php echo ">".$radek[$i+1]." (".$radek[$i].")</option>";
										//} 
									}
								$status ="";
									
								}

							?>
						</select>
					</div><br>
					<?php if(empty($_GET['id'])) {
					 ?>
					<div class="flex">
						<label for="chain">Řetězec</label><select name="chain" id="chain" required="required" class="w78">
							<option <?php //echo "$select"; ?>  value="" disabled>Vybrat řetězec</option><?php

								$sql = "SELECT mdg_company.id_mdg_company, mdg_company.stat, mdg_company.nazev
										FROM mdg_company
										ORDER BY mdg_company.nazev
											";
								
								mysqli_query($conn, "SET NAMES utf8");

								$data = mysqli_query($conn, $sql);
								$i = 0;
								while($radek = mysqli_fetch_row($data)) {
									//echo $radek[$i];
									if (empty($valueChain)) {
										$valueChain = "";
									}
									if ($radek%3==1) {
										//if ($radek[$i] == $users) {
										//	$status ="available";
										//}
										//for($i=0;$i<	count($radek);$i++) {
											//$i=0;
										echo "
							<option value=\"$radek[$i]\" ";?><?php if($valueChain==$radek[$i]){ echo "selected=\"selected\""; } ?><?php echo ">".$radek[$i+2]." - ".$radek[$i+1]." (".$radek[$i].")</option>";
										//} 
									}
								$status ="";
									
								}

							?>

						</select>

					</div><br>
					<?php 
						
					} ?>
					<div class="flex">
						<label for="market">Obchod</label><select name="market" id="market" required="required" class="w78">
							<option <?php //echo "$select"; ?>  value="" disabled>Vybrat obchod</option><?php


								if ($id==0||!empty($edit)) {
									$additionalMarket .= "WHERE id_mdg_company>0 ";
								}
								else {
									$additionalMarket .= "WHERE id_mdg_company=$id ";
								}

								$sql = "SELECT mdg_company_details.id_mdg_company_details, mdg_company_details.nazev, mdg_company_details.okres, mdg_company_details.mesto, mdg_company_details.psc, mdg_company_details.ulice, mdg_company_details.cp
										FROM mdg_company_details
										$additionalMarket
										ORDER BY mdg_company_details.nazev, mdg_company_details.okres, mdg_company_details.mesto
											";
								$conn = dbConnect();
								mysqli_query($conn, "SET NAMES utf8");

								$data = mysqli_query($conn, $sql);
								$i = 0;
								while($radek = mysqli_fetch_row($data)) {
									//echo $radek[$i];
									if (empty($valueMarket)) {
										$valueMarket = "";
									}
									if ($radek%3==1) {
										//if ($radek[$i] == $users) {
										//	$status ="available";
										//}
										//for($i=0;$i<	count($radek);$i++) {
											//$i=0;
										echo "
							<option value=\"$radek[$i]\" ";?><?php if($valueMarket==$radek[$i]){ echo "selected=\"selected\""; } ?><?php echo ">".$radek[$i+1]." ".$radek[$i+4].", ".$radek[$i+5]." ".$radek[$i+6]." (".$radek[$i].")</option>";
										//} 
									}
								$status ="";
									
								}

							?>

						</select>
					</div><br>

					<div class="flex">
						<label for="users-koo">Area Soft Manager</label>
						<select name="users-koo" id="users-koo" required="required" class="w78">
							<option <?php if (!empty($select)){ echo "$select"; } ?>  value="" disabled>Vybrat koordinátora</option><?php
								$position1 = "Koordinátor";
								$position2 = "Merchandiser";
								$sql = "SELECT id_user, jmeno, prijmeni
										FROM users
										WHERE ( pozice='$position1' OR pozice='$position2' OR id_user='1' ) AND id_user>0 AND role LIKE '%mdg-pristup%'
										ORDER BY prijmeni";
								$conn = dbConnect();
								mysqli_query($conn, "SET NAMES utf8");

								$data = mysqli_query($conn, $sql);
								$i = 0;
								while($radek = mysqli_fetch_row($data)) {
									//echo $radek[$i];
									if ($radek%3==1) {
										//if ($radek[$i] == $usersKoo) {
										//	$status ="available";
										//}
										//for($i=0;$i<	count($radek);$i++) {
											//$i=0;
										echo "
							<option value=\"$radek[$i]\" ";?><?php if($idUserKoo==$radek[$i]){ echo "selected=\"selected\""; } ?><?php echo ">".$radek[$i+2]."	 ".$radek[$i+1]." (".$radek[$i].")</option>";
										//}
									}
								$status ="";
									
								}

							?>
						</select>
					</div><br>
					
					<div class="flex">
						<label for="users">Uživatel <?php //echo "- $users"; ?></label>
						<select name="users" id="users" class="w78">
							<option <?php if (!empty($select)){ echo "$select"; } ?>  value="1"  disabled>Vybrat promotéra</option><?php

								$sql = "SELECT id_user, jmeno, prijmeni
										FROM users
										WHERE id_user > 0 AND ( pozice='Koordinátor' OR pozice='Promotér' OR pozice='Ostatní' OR pozice='Merchandiser' OR id_user='1') AND role LIKE '%mdg-pristup%'
										ORDER BY prijmeni";
								$conn = dbConnect();
								mysqli_query($conn, "SET NAMES utf8");

								$data = mysqli_query($conn, $sql);
								$i = 0;
								while($radek_user = mysqli_fetch_row($data)) {
									//echo $radek_user[$i];
									if ($radek_user%3==1) {
										echo "
							<option value=\"$radek_user[$i]\" ";?><?php if($idUser==$radek_user[$i]){ echo "selected=\"selected\""; } ?><?php echo ">".$radek_user[$i+2]."	 ".$radek_user[$i+1]." (".$radek_user[$i].")</option>";
										//}
									}
								$status ="";
									
								}

							?>

						</select>
					</div><br>
	
					<label for="description">Popis</label><textarea type="text" name="description" id="description" rows="4" class="w78" placeholder="Napište zde prosím poznámky k akci"><?php echo "$valueDescription"; ?></textarea>
					<div class="error"><?php if(!empty($error_description)) { echo $error_description; } ?></div>

					<?php 
						if ($month<10) {
							$month="0".$month;
						}
						if ($day<10) {
							$day="0".$day;
						}
					 ?>

					<label for="date">Datum akce</label><input type="text" name="date" id="datepicker-today" value="<?php if (!empty($valueDate)) { echo "$valueDate"; } else if (!empty($day)) { echo "$year-$month-$day"; } else { echo date("Y-m-d"); } ?>"><br>
					<div class="error"><?php if(!empty($error_date)) { echo $error_date; } ?></div>

					<label for="time">Čas</label>
							Od <input type="number" name="time[]" class="clock right" placeholder="8" min="0" max="23" value="<?php if (!empty($timeArray[0])) { echo $timeArray[0]; } ?>">:<input type="number" name="time[]" class="clock" placeholder="30" min="0" max="59" value="<?php if ((!empty($timeArray[1])||($timeArray[1]==0))) { echo $timeArray[1]; } ?>">
							&nbsp;&nbsp;Do <input type="number" name="time[]" class="clock right" placeholder="16" min="0" max="23" value="<?php if (!empty($timeArray[2])) { echo $timeArray[2]; } ?>">:<input type="number" name="time[]" class="clock" placeholder="30" min="0" max="59" value="<?php if ((!empty($timeArray[3])||($timeArray[3]==0))) { echo $timeArray[3]; } ?>"> <br>
							<div class="error"><?php if(!empty($error_time)) { echo $error_time; } ?></div>

					<input type="hidden" name="id" value="<?php echo $id; ?>"/>
	
					<input type="submit" name="registeruser" id="registeruser" value="Odeslat">
					<!--<input type="reset" name="reset" id="reset" value="Resetovat">-->
				</form>