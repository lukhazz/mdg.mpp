<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="register" class="clearfix">
						
						<div class="flex space">
							<div class="col-1">
								<label for="nazev">Název</label><input type="text" name="nazev" id="nazev" value="<?php if(!empty($valuenazev)){ echo "$valuenazev"; }?>">
								<label for="okres">Okres</label><input type="text" name="okres" id="okres" value="<?php if(!empty($valueokres)){ echo "$valueokres"; } ?>">
								<label for="mesto">Město</label><input type="text" name="mesto" id="mesto" value="<?php if(!empty($valuemesto)){ echo "$valuemesto"; } ?>">	
								<label for="psc">PSČ</label><input type="text" name="psc" id="psc" value="<?php if(!empty($valuepsc)){ echo "$valuepsc"; } ?>">
								<label for="ulice">Ulice</label><input type="text" name="ulice" id="ulice" value="<?php if(!empty($valueulice)){ echo "$valueulice"; } ?>">	
								<label for="cp">Číslo popisné</label><input type="text" name="cp" id="cp" value="<?php if(!empty($valuecp)){ echo "$valuecp"; } ?>">
								<label for="kontakt">Kont. osoba</label><input type="text" name="kontakt" id="kontakt" value="<?php if(!empty($valuekontakt)){ echo "$valuekontakt"; } ?>" >
								<label for="phone">Telefon</label><input type="text" name="phone" id="phone" value="<?php if(!empty($valuephone)){ echo "$valuephone"; } ?>">
								<div >
									<h3>Vyberte, zda je akce již vyplněna</h3>
									<div>
										<input type="radio" checked="checked" <?php //if ($valuePriceType == "dohoda") { echo "checked=\"checked\""; } ?> name="filled" value="splneno-vse" id="splneno-vse"><label for="splneno-vse" class="check-2">Splněno i&nbsp;nesplněno</label>	
										<input type="radio" <?php //if ($valuePriceType == "ico") { echo "checked=\"checked\""; } ?> name="filled" value="splneno-ano" id="splneno-ano"><label for="splneno-ano" class="check-2">Splněno</label>
										<input type="radio" <?php //if ($valuePriceType == "ico") { echo "checked=\"checked\""; } ?> name="filled" value="splneno-ne" id="splneno-ne"><label for="splneno-ne" class="check-2">Nesplněno</label>
									</div>
									<br><br>
									<h3>Vyberte, zda je akce již odkontrolována a schválena</h3>
									<div>
										<input type="radio" checked="checked" <?php //if ($valuePriceType == "dohoda") { echo "checked=\"checked\""; } ?> name="approved" value="schvaleno-vse" id="schvaleno-vse"><label for="schvaleno-vse" class="check-2">Schváleno i&nbsp;neschváleno</label>	
										<input type="radio" <?php //if ($valuePriceType == "ico") { echo "checked=\"checked\""; } ?> name="approved" value="schvaleno-ano" id="schvaleno-ano"><label for="schvaleno-ano" class="check-2">Schváleno</label>
										<input type="radio" <?php //if ($valuePriceType == "ico") { echo "checked=\"checked\""; } ?> name="approved" value="schvaleno-ne" id="schvaleno-ne"><label for="schvaleno-ne" class="check-2">Neschváleno</label>
									</div>
									<br><br>
								</div>
							</div>

							<div class="column-space"></div>
							<div class="col-3">
								<select name="retezec[]" id="retezec" class="multiple-mdg" multiple>
									<option <?php //echo "$select"; ?>  value="" disabled>Vybrat řetězec</option><?php

										$sql = "SELECT mdg_company.id_mdg_company, mdg_company.stat, mdg_company.nazev
												FROM mdg_company
												ORDER BY mdg_company.nazev
													";
										$conn = dbConnect();
										mysqli_query($conn, "SET NAMES utf8");

										$data = mysqli_query($conn, $sql);
										$i = 0;
										while($radek = mysqli_fetch_row($data)) {
											//echo $radek[$i];
											if (empty($valueretezec)) {
												$valueretezec = "";
											}
											if ($radek%3==1) {
												//if ($radek[$i] == $users) {
												//	$status ="available";
												//}
												//for($i=0;$i<	count($radek);$i++) {
													//$i=0;
												echo "
									<option value=\"$radek[$i]\" ";?><?php if($valueretezec==$radek[$i]){ echo "selected=\"selected\""; } ?><?php echo ">".$radek[$i+2]." - ".$radek[$i+1]." (".$radek[$i].")</option>";
												//} 
											}
										$status ="";
											
										}

									?>

								</select>
								<select name="retezec[]" id="retezec" class="multiple-mdg" multiple>
									<option <?php //echo "$select"; ?>  value="" disabled>Vybrat řetězec</option><?php

										$sql = "SELECT mdg_company.id_mdg_company, mdg_company.stat, mdg_company.nazev
												FROM mdg_company
												ORDER BY mdg_company.nazev
													";
										$conn = dbConnect();
										mysqli_query($conn, "SET NAMES utf8");

										$data = mysqli_query($conn, $sql);
										$i = 0;
										while($radek = mysqli_fetch_row($data)) {
											//echo $radek[$i];
											if (empty($valueretezec)) {
												$valueretezec = "";
											}
											if ($radek%3==1) {
												//if ($radek[$i] == $users) {
												//	$status ="available";
												//}
												//for($i=0;$i<	count($radek);$i++) {
													//$i=0;
												echo "
									<option value=\"$radek[$i]\" ";?><?php if($valueretezec==$radek[$i]){ echo "selected=\"selected\""; } ?><?php echo ">".$radek[$i+2]." - ".$radek[$i+1]." (".$radek[$i].")</option>";
												//} 
											}
										$status ="";
											
										}

									?>

								</select>
							</div>
						</div>











<br><br><br><br><br><br><br><br><br>

<input type="hidden" name="id_action" value="<?php //echo $id; ?>"/>
<input type="submit" class="per100" name="submit" id="submit" value="Vygenerovat"><br><br>
<!--<input type="button" class="per100" onclick="tableToExcel('summary', 'MPP')" value="Export do Excelu">-->
<?php //echo get_browser_name($_SERVER['HTTP_USER_AGENT']); ?>
<?php 
	if (get_browser_name($_SERVER['HTTP_USER_AGENT'])=="Firefox") {
		?>
		<input type="button" class="per100" onclick="tableToExcel('summary', 'Prodeje')" value="Export do Excelu">
		<?php
	}
	else {
		?>
		<a download="<?php echo date("ymd"); ?>_MPP_prodeje.xls" href="#" onclick="return ExcellentExport.excel(this, 'summary', 'Prodeje');"><input type="button" class="per100 black" value="Export do Excelu"></a><br>
		<?php
	}
 ?>

</form>
<?php //if (!empty($messageSuccess)) { echo '<div class="message-success">'.$messageSuccess.'</div>';		} ?>
<?php if (!empty($messageError))   { echo '
						<div class="message-error">'.$messageError.'</div>';	}	 ?>