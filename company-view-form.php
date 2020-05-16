<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="register" class="clearfix">

						<div>	
							<h3 class="mar-top-0">Vyberte stát, který chcete vyfiltrovat</h3>
							
								<input type="radio" <?php if ($userStat == "vse") { echo "checked=\"checked\""; } ?> name="stat" value="vse" id="vse"><label for="vse" class="check-2">Všechny</label>	
								<input type="radio" <?php if ($userStat == "cz") { echo "checked=\"checked\""; } ?> name="stat" value="cz" id="cz"><label for="cz" class="check-2">Česko</label>
								<input type="radio" <?php if ($userStat == "sk") { echo "checked=\"checked\""; } ?> name="stat" value="sk" id="sk"><label for="sk" class="check-2">Slovensko</label>
							
						</div><br><br>

						<div class="flex space">
							<label for="nazev_formulare">Jméno firmy</label><input type="text" name="nazev_formulare" id="nazev_formulare" value="<?php if(!empty($valuenazev)){ echo "$valuenazev"; }?>">

						</div>

						<!--
						<h3 class="mar-top-0">Vyberte typ ceny MOC/VOC</h3>
							
						<input type="radio" <?php //if ($userStat == "vse") { echo "checked=\"checked\""; } ?> name="cena" value="cena-vse" id="cena-vse" checked><label for="cena-vse" class="check-2">Všechny</label>	
						<input type="radio" <?php //if ($userStat == "moc") { echo "checked=\"checked\""; } ?> name="cena" value="moc" id="moc"><label for="moc" class="check-2">Maloobchodní (MOC)</label>
						<input type="radio" <?php //if ($userStat == "voc") { echo "checked=\"checked\""; } ?> name="cena" value="voc" id="voc"><label for="voc" class="check-2">Velkoobchodní (VOC)</label><br>

						-->
						
						<br>
						<h3>Seřadit podle</h3>
						<div class="flex">
							<select name="sort-by" id="sort-by" required="required" class="per100">
								<option value="id_company">ID</option>
								<option value="nazev" selected="select">Název</option>
								<!--<option value="cena_firmy">MOC/VOC</option>-->
								<option value="stat">Stát</option>
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