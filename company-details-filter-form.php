<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="register" class="clearfix">
						<div>
							<h3 class="mar-top-0">Vyberte stát, který chcete vyfiltrovat</h3>
							
							<input type="radio" <?php if ($userStat == "vse") { echo "checked=\"checked\""; } ?> name="stat" value="vse" id="vse"><label for="vse" class="check-2">Všechny</label>	
							<input type="radio" <?php if ($userStat == "cz") { echo "checked=\"checked\""; } ?> name="stat" value="cz" id="cz"><label for="cz" class="check-2">Česko</label>
							<input type="radio" <?php if ($userStat == "sk") { echo "checked=\"checked\""; } ?> name="stat" value="sk" id="sk"><label for="sk" class="check-2">Slovensko</label>
						</div><br><br>

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
							</div>
						</div><br>
						<h3>Seřadit podle</h3>
						<div class="flex">
							<select name="sort-by" id="sort-by" required="required" class="per100">
								<option value="mdg_company_details.nazev" selected="select">Název</option>
								<option value="mdg_company_details.stat">Stát</option>
								<option value="mdg_company.retezec">Řetězec</option>
								<option value="mdg_company_details.okres">Okres</option>
								<option value="mdg_company_details.mesto">Město</option>
								<option value="mdg_company_details.cp">Číslo popisné</option>
								<option value="mdg_company_details.ulice">Ulice</option>
								<option value="mdg_company_details.psc">PSČ</option>
								<option value="mdg_company_details.k_jmeno">Kontaktní osoba</option>
								<option value="mdg_company_details.k_cislo">Telefon</option>
							</select>

							<select name="sort" id="sort" required="required" class="per100">
								<option value="ASC" selected="select">Vzestupně</option>
								<option value="DESC">Sestupně</option>
							</select>
 
						</div>
						<h3>Počet záznamů</h3>
						<select name="limit" id="limit" required="required" class="per15">
							<option value="1">1</option>
							<option value="10">10</option>
							<option value="25">25</option>
							<option value="50" selected="select">50</option>
							<option value="100">100</option>
							<option value="500">500</option>
							<option value="1000">1000</option>
							<option value="999999">Všechny</option>
						</select>

						<br>
						<br>

						<input type="submit" class="per100" name="submit" id="submit" value="Vygenerovat"><br><br>
						<?php 
							if (get_browser_name($_SERVER['HTTP_USER_AGENT'])=="Firefox") {
								?>
								<input type="button" class="per100" onclick="tableToExcel('pharmacy', 'MRDNG')" value="Export do Excelu">
								<?php
							}
							else {
								?>
								<a download="<?php echo date("ymd"); ?>_MPP_lekarny.xls" href="#" onclick="return ExcellentExport.excel(this, 'pharmacy', 'Obchody MRDNG');"><input type="button" class="per100 black" value="Export do Excelu"></a><br>
								<?php
							}
						 ?>
					</form>