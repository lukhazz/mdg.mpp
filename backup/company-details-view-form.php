<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="register" class="clearfix">
						<div class="flex space">
							<div class="col-1">
								<div>
									<div>
										<h3 class="mar-top-0">Vyberte stát, který chcete vyfiltrovat</h3>
									
										<input type="radio" <?php if ($userStat == "vse") { echo "checked=\"checked\""; } ?> name="stat" value="vse" id="vse"><label for="vse" class="check-2">Všechny</label>	
										<input type="radio" <?php if ($userStat == "cz") { echo "checked=\"checked\""; } ?> name="stat" value="cz" id="cz"><label for="cz" class="check-2">Česko</label>
										<input type="radio" <?php if ($userStat == "sk") { echo "checked=\"checked\""; } ?> name="stat" value="sk" id="sk"><label for="sk" class="check-2">Slovensko</label>
									
									</div><br><br>
									<label for="nazev_formulare">Jméno</label><input type="text" name="nazev_formulare" id="nazev_formulare" value="<?php if(!empty($valuenazev)){ echo "$valuenazev"; }?>">

									<label for="telefon">Telefon</label><input type="text" name="telefon" id="telefon" value="<?php if(!empty($valueTelefon)){ echo "$valueTelefon"; }?>">
									
								</div>
								
								
								<h3>Seřadit podle</h3>
								<div class="flex">
									<select name="sort-by" id="sort-by" required="required" class="per100">
										<option value="company-details.id_company">ID</option>
										<option value="company.nazev" selected="select">Firma</option>
										<option value="company-details.prijmeni">Příjmení</option>
										<option value="company-details.telefon">Telefon</option>
										<option value="company-details.stat">Stát</option>
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
							</div>
							<div class="column-space"></div>
							<!--<div><h3>Vyberte sloupce</h3>-->

							<div class="col-3">
								
								<select name="company[]" id="company" class="company-multiple" multiple>
									<option value="" selected disabled>Vybrat firmu</option><?php 
										$i = 0; $status = "";
										$sql = "SELECT id_company, nazev
												FROM company 
												ORDER BY nazev";
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
									<option value=\"$radek[$i]\" ";?><?php if($status=="available"){ echo "selected=\"selected\""; } ?><?php echo ">".$radek[$i+1]." (".$radek[$i].")</option>";
												//}
											}
										$status ="";
											
										}

									?>

								</select>

							</div> 
						</div>

						<br>
						<br>

						<input type="submit" class="per100" name="submit" id="submit" value="Vygenerovat"><br><br>
						<?php 
							if (get_browser_name($_SERVER['HTTP_USER_AGENT'])=="Firefox") {
								?>
								<input type="button" class="per100" onclick="tableToExcel('pharmacy', 'Šablony akcí')" value="Export do Excelu">
								<?php
							}
							else {
								?>
								<a download="<?php echo date("ymd"); ?>_MPP_sablony.xls" href="#" onclick="return ExcellentExport.excel(this, 'pharmacy', 'Šablony akcí');"><input type="button" class="per100 black" value="Export do Excelu"></a><br>
								<?php
							}
						 ?>
					</form>