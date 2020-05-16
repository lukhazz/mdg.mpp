<?php if (!empty($messageSuccess)) { echo '<div class="message-success">'.$messageSuccess.'</div>';	} ?>
<?php if (!empty($messageError))   { echo '<div class="message-error">'.$messageError.'</div>';	} ?>
				<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="register" class="clearfix">
					<label for="name">Příjmení reprezentanta</label><input type="text" name="name" required="required" id="name" value="<?php echo "$valueName"; ?>">
					<div class="error"><?php if(!empty($error_name)) { echo $error_name; } ?></div>

					<h3 class="mar-top-0">Vyberte stát</h3>
					<div>
						<input type="radio" <?php if ($userStat == "vse") { echo "checked=\"checked\""; } ?> name="stat" value="vse" id="vse"><label for="vse" class="check-2">Všechny</label>	
						<input type="radio" <?php if ($userStat == "cz") { echo "checked=\"checked\""; } ?> name="stat" value="cz" id="cz"><label for="cz" class="check-2">Česko</label>
						<input type="radio" <?php if ($userStat == "sk") { echo "checked=\"checked\""; } ?> name="stat" value="sk" id="sk"><label for="sk" class="check-2">Slovensko</label>
					</div><br><br>

					<label for="phone">Telefon</label><input type="text" name="phone" required="required" id="phone" value="<?php echo "$valuePhone"; ?>">
						<div class="error"><?php if(!empty($error_phone)) { echo $error_phone; } ?></div>

					<select name="company" required="required" id="company" class="company">
							<option value="" selected disabled>Vybrat klientskou firmu</option><?php
								
								$sql = "SELECT id_company, nazev
										FROM company
										ORDER BY nazev";
								$conn = dbConnect();
								mysqli_query($conn, "SET NAMES utf8");

								$data = mysqli_query($conn, $sql);
								while($radek = mysqli_fetch_row($data)) {
									
									if ($radek%3==1) {
										if ($radek[$i=0] == $company) {
											$status ="available";
										}
										//for($i=0;$i<count($radek);$i++) {
											//$i=0;
										//echo $radek[$i];
										echo "
							<option value=\"$radek[$i]\" ";?><?php if($status=="available"){ echo "selected=\"selected\""; } ?><?php echo ">".$radek[$i+1]." (".	$radek[$i].")</option>";
										//}
									}
									$status ="";
								}

							?>

						</select>

					<input type="hidden" name="id_company-details" value="<?php echo $id; ?>"/><br><br>
	
					<input type="submit" name="registeruser" id="registeruser" value="Odeslat">
					<!--<input type="reset" name="reset" id="reset" value="Resetovat">-->
				</form>