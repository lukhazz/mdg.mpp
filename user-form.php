<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="register" class="clearfix">
						<div class="flex space">
							<div class="per50">
								<label for="id_form">ID uživatele</label><input type="text" name="id_form" id="id_form" value="<?php if(!empty($valueid)){ echo "$valueid"; } ?>">
								<label for="jmeno-uzivatele">Jméno</label><input type="text" name="jmeno-uzivatele" id="jmeno-uzivatele" value="<?php if(!empty($valuejmenouzivatele)){ echo "$valuejmenouzivatele"; }?>">
								<label for="nazev">E-mail</label><input type="text" name="nazev" id="nazev" value="<?php if(!empty($valuenazev)){ echo "$valuenazev"; }?>">
								<!--<label for="promo">Promotér</label><input type="text" name="promo" id="promo" value="<?php if(!empty($valuepromo)){ echo "$valuepromo"; } ?>"> -->
								<label for="position">Kategorie</label>
								<select class="category" name="position[]" id="position" multiple="multiple">
									<option <?php //echo "$valuePositionPromo"; ?> value="Promotér">Promotér</option>
									<option <?php //echo "$valuePositionArea"; ?> value="Koordinátor">Koordinátor</option>
									<option <?php //echo "$valuePositionMdg"; ?> value="Merchandiser">Merchandiser</option>
									<option <?php //echo "$valuePositionReditel"; ?> value="Ředitel">Ředitel</option>
									<option <?php //echo "$valuePositionMajitel"; ?> value="Majitel">Majitel</option>
									<option <?php //echo "$valuePositionKlient"; ?> value="Klient">Klient</option>
									<option <?php //echo "$valuePositionOstatni"; ?> value="Ostatní">Ostatní</option>
								</select>
								
								
							</div>
							<div class="per50">
								<h3 class="mar-top-0">Vyberte stát, který chcete vyfiltrovat</h3>
								<div>
									<input type="radio" <?php if ($userStat == "vse") { echo "checked=\"checked\""; } ?> name="stat" value="vse" id="vse"><label for="vse" class="check-2">Všechny</label>	
									<input type="radio" <?php if ($userStat == "cz") { echo "checked=\"checked\""; } ?> name="stat" value="cz" id="cz"><label for="cz" class="check-2">Česko</label>
									<input type="radio" <?php if ($userStat == "sk") { echo "checked=\"checked\""; } ?> name="stat" value="sk" id="sk"><label for="sk" class="check-2">Slovensko</label>
								</div><br><br>
								<h3 class="mar-top-0">Vyberte, zda chcete zobrazit aktivní uživatele</h3>
								<div>
									<input type="radio" checked="checked" <?php //if ($valuePriceType == "dohoda") { echo "checked=\"checked\""; } ?> name="filled" value="splneno-vse" id="splneno-vse"><label for="splneno-vse" class="check-2">Aktivní i&nbsp;neaktivní</label>	
									<input type="radio" <?php //if ($valuePriceType == "ico") { echo "checked=\"checked\""; } ?> name="filled" value="splneno-ano" id="splneno-ano"><label for="splneno-ano" class="check-2">Aktivní</label>
									<input type="radio" <?php //if ($valuePriceType == "ico") { echo "checked=\"checked\""; } ?> name="filled" value="splneno-ne" id="splneno-ne"><label for="splneno-ne" class="check-2">Neaktivní</label>
								</div>
								<br><br><br>
								<h3 class="mar-top-0">Vyberte, typ proplácení mzdy</h3>
								<div>
									<input type="radio" checked="checked" <?php //if ($valuePriceType == "dohoda") { echo "checked=\"checked\""; } ?> name="approved" value="schvaleno-vse" id="schvaleno-vse"><label for="schvaleno-vse" class="check-2">Dohoda i&nbsp;IČO</label>	
									<input type="radio" <?php //if ($valuePriceType == "ico") { echo "checked=\"checked\""; } ?> name="approved" value="schvaleno-ano" id="schvaleno-ano"><label for="schvaleno-ano" class="check-2">Dohoda o provedení práce</label>
									<input type="radio" <?php //if ($valuePriceType == "ico") { echo "checked=\"checked\""; } ?> name="approved" value="schvaleno-ne" id="schvaleno-ne"><label for="schvaleno-ne" class="check-2">IČO</label>
								</div>



							<!--

								<label for="users-koo">Koordinátor</label>
								<select name="users-koo[]" id="users-koo" class="multiple-koo" multiple>
									<option value="" selected disabled>Vybrat koordinátora</option><?php 
										$i = 0; $status = "";
										$position1 = "Area manager";
										$position2 = "Manager";
										$sql = "SELECT id_user, jmeno, prijmeni
												FROM users
												WHERE pozice='$position1' OR  	pozice='$position2'
												ORDER BY prijmeni";
										$conn = dbConnect();
										mysqli_query($conn, "SET NAMES utf8");
	
										$data = mysqli_query($conn, $sql);
										while($radek = mysqli_fetch_row($data)) {
											//echo $radek[$i];
											if ($radek%3==1) {
												//if ($radek[$i] == $usersKoo) {
												//	$status ="available";
												//}
												//for($i=0;$i<	count($radek);$i++) {
													//$i=0;
												echo "
									<option value=\"$radek[$i]\" ";?><?php if($status=="available"){ echo "selected=\"selected\""; } ?><?php echo ">".$radek[$i+2]."	 ".$radek[$i+1]." (".$radek[$i].")</option>";
												//}
											}
										$status ="";
											
										}
	
									?>
	
								</select>
								-->
						
							</div>
						</div>

						
						<h3>Seřadit podle</h3>
						<div class="flex">
							<select name="sort-by" id="sort-by" required="required" class="per100">
								<option value="users.id_user">ID</option>
								<option value="users.jmeno">Jméno</option>
								<option value="users.prijmeni" selected="select">Příjmení</option>
								<option value="users.dat_nar">Datum narození</option>
								<option value="users.pozice">Pozice</option>
								<option value="users.aktivni">Aktivní</option>
								<option value="users.cena_typ">Typ proplacení mzdy</option>
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
						<?php //echo get_browser_name($_SERVER['HTTP_USER_AGENT']); ?>
						<?php 
							if (get_browser_name($_SERVER['HTTP_USER_AGENT'])=="Firefox") {
								?>
								<input type="button" class="per100" onclick="tableToExcel('pharmacy', 'Uživatelé')" value="Export do Excelu">
								<?php
							}
							else {
								?>
								<a download="<?php echo date("ymd"); ?>_MPP_uzivatele.xls" href="#" onclick="return ExcellentExport.excel(this, 'pharmacy', 'Uživatelé');"><input type="button" class="per100 black" value="Export do Excelu"></a><br>
								<?php
							}
						 ?>
					</form>