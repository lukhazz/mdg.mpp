<label for="name">Jméno</label><input type="text" name="name" id="name" value="<?php echo "$valueName"; ?>">
						<div class="error"><?php if(!empty($error_name)) { echo $error_name; } ?></div>

						<label for="surname">Příjmení</label><input type="text" name="surname" id="surname" value="<?php echo "$valueSurname"; ?>">
						<div class="error"><?php if(!empty($error_surname)) { echo $error_surname; } ?></div>

						<label for="password">Heslo</label><input type="text" name="password" id="password" value="<?php echo $password; ?>">

						<?php  
						?>

						<div class="error"><?php if(!empty($error_password)) { echo $error_password; } ?></div>	
					
						<label for="email">Email</label><input type="email" name="email" id="email" value="<?php echo "$valueEmail"; ?>">
						<div class="error"><?php if(!empty($error_email)) { echo $error_email; } ?></div>	
					
						<?php $defaultDate = mktime(0, 0, 0, date("m"), date("d"), date("Y")-15); ?>
						<label for="date">Datum narození</label>
						<input type="text" name="date" class="datepicker-today" value="<?php if ( !empty ( $valueDate) ) { echo $valueDate; } else { echo date("Y-m-d", $defaultDate); } ?>">
						<div class="error"><?php if(!empty($error_date)) { echo $error_date; } ?></div>	

						<label for="phone">Telefon</label><input type="text" name="phone" id="phone" value="<?php echo "$valuePhone"; ?>">
						<div class="error"><?php if(!empty($error_phone)) { echo $error_phone; } ?></div>

						<!--<label for="fileToUpload">Fotografie</label><input type="file" name="fileToUpload" id="fileToUpload">
						<div class="error"><?php if(!empty($error_photo)) { echo $error_photo; } ?></div>
						<div class="error"><?php if(!empty($error_photo_overall)) { echo $error_photo_overall; } ?></div>-->

						<label for="position">Kategorie</label>
						<select name="position" id="position">
							<option <?php echo "$valuePositionMdg"; ?> value="Merchandiser">Merchandiser</option>
							<option <?php echo "$valuePositionKlient"; ?> value="Klient">Klient</option>
							<option <?php echo "$valuePositionPromo"; ?> value="Promotér">Promotér</option>
							<option <?php echo "$valuePositionArea"; ?> value="Koordinátor">Koordinátor</option>
							<option <?php echo "$valuePositionReditel"; ?> value="Ředitel">Ředitel</option>
							<option <?php echo "$valuePositionMajitel"; ?> value="Majitel">Majitel</option>
							<option <?php echo "$valuePositionManag"; ?> value="Ostatní">Ostatní</option>
						</select>
						<div class="error"><?php if(!empty($error_position)) { echo $error_position; } ?></div>	

						<label for="users-koo">Nadřízený</label>
						<select name="users-koo" id="users-koo"><?php
								$i = 0;
								$status = "";
								$position1 = "Koordinátor";
								$position2 = "Ostatní";
								$position3 = "Ředitel";
								$position4 = "Majitel";
								$position5 = "Merchandiser";
								$position6 = "Klient";
								$sql = "SELECT id_user, jmeno, prijmeni
										FROM users
										WHERE id_user='1' OR pozice='$position1' OR pozice='$position2' OR pozice='$position3' OR pozice='$position4' OR pozice='$position5' OR pozice='$position6'
										ORDER BY prijmeni";
								$conn = dbConnect();
								mysqli_query($conn, "SET NAMES utf8");

								$data = mysqli_query($conn, $sql);
								while($radek = mysqli_fetch_row($data)) {
									//echo $radek[$i];
									if ($radek%3==1) {
										if ($radek[$i] == $usersKoo) {
											$status ="available";
										}
										//for($i=0;$i<	count($radek);$i++) {
											//$i=0;
										echo "
							<option value=\"$radek[$i]\" ";?><?php if($status=="available"){ echo "selected=\"selected\""; } ?><?php echo ">".$radek[$i+2]."	 ".$radek[$i+1]." (".$radek[$i].")</option>";
										//}
									}
								$status ="";
									
								}

							?>

						</select><br>

						<h3 class="mar-top-0">Vyberte stát</h3>
						<div>
							<input type="radio" <?php if ($userStat == "vse") { echo "checked=\"checked\""; } ?> name="stat" value="vse" id="vse"><label for="vse" class="check-2">Všechny</label>	
							<input type="radio" <?php if ($userStat == "cz") { echo "checked=\"checked\""; } ?> name="stat" value="cz" id="cz"><label for="cz" class="check-2">Česko</label>
							<input type="radio" <?php if ($userStat == "sk") { echo "checked=\"checked\""; } ?> name="stat" value="sk" id="sk"><label for="sk" class="check-2">Slovensko</label>
						</div><br>
	 		
	 					<h3>Cenové ohodnocení</h3>
	 					<label for="user-price">Za hodinu (Kč nebo &euro;)</label><input type="number" placeholder="59.90" step="any" class="number" name="user-price" min="0" max="9999" required="required" value="<?php echo "$valuePrice"; ?>"><br>
						<input type="radio" checked="checked" <?php if ($valuePriceType == "dohoda") { echo "checked=\"checked\""; } ?> name="user-type-price" value="dohoda" id="dohoda"><label for="dohoda" class="check">Dohoda o provedení práce</label>	
						<input type="radio" <?php if ($valuePriceType == "ico") { echo "checked=\"checked\""; } ?> name="user-type-price" value="ico" id="ico"><label for="ico" class="check">IČO</label>

						<h3>Aktivnost účtu</h3>
						<input id="active" name="active" value="true" <?php echo "$valueActiveCheck"; ?> type="checkbox"><label for="active" class="check red">Aktivní</label>

						<!--<div class="row">
							<h3>Role</h3>
							<input id="nahled-akci" name="role[]" value="nahled-akci" <?php //echo "$valueRoleView"; ?> type="checkbox"><label for="nahled-akci" class="check">Náhled svých akcí</label>
							<input id="pridani-akci" name="role[]" value="pridani-akci" <?php //echo "$valueRoleAddAction"; ?> type="checkbox"><label for="pridani-akci" class="check">Přidání akcí</label>
							<input id="editace-akci" name="role[]" value="editace-akci" <?php //echo "$valueRoleEdit"; ?> type="checkbox"><label for="editace-akci" class="check">Editace akcí</label>
							<input id="smazani-akci" name="role[]" value="smazani-akci" <?php //echo "$valueRoleDelete"; ?> type="checkbox"><label for="smazani-akci" class="check">Smazání akcí</label>
							<input id="pridani-uzivatelu" name="role[]" value="pridani-uzivatelu" <?php //echo "$valueRoleAddUser"; ?> type="checkbox"><label for="pridani-uzivatelu" class="check">Přidání uživatele</label>
							<input id="editace-uzivatelu" name="role[]" value="editace-uzivatelu" <?php //echo "$valueRoleEditUser"; ?> type="checkbox"><label for="editace-uzivatelu" class="check">Editace uživatelů</label>
							<div class="error"><?php //if(!empty($error_role)) { echo $error_role; } ?></div>
						</div>-->