<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="register" class="clearfix">
	<div class="flex space">
		<div class="col-1">
			<div id="company">
				<?php echo ""; ?>
				<select name="company" id="company" required="required" class="per100">
					<option value="" selected disabled>Vybrat klientskou firmu</option><?php
						
						$sql = "SELECT id_mdg_project, nazev FROM mdg_project
							WHERE id_mdg_project > 0
							ORDER BY nazev";
						$conn = dbConnect();
						mysqli_query($conn, "SET NAMES utf8");

						$dataInputs = mysqli_query($conn, $sql);
						while($radek = mysqli_fetch_row($dataInputs)) {
							$i=0;
							if ($radek%3==1) {
								//if ($radek[$i=0] == $company) {
								//	$status ="available";
								//}
								//for($i=0;$i<count($radek);$i++) {
									//$i=0;
								//echo $radek[$i];
								echo "
					<option value=\"$radek[$i]\" ";?><?php echo ">".$radek[$i+1]." (".	$radek[$i].")</option>";
								//}
							}
							$status ="";
						}

					?>

				</select>
				
			</div>
				<!--
				<h3>Vyberte stát, který chcete vyfiltrovat</h3>
				<div>
					<input type="radio" <?php if ($userStat == "vse") { echo "checked=\"checked\""; } ?> name="stat" value="vse" id="vse"><label for="vse" class="check-2">Všechny</label>
					<input type="radio" <?php if ($userStat == "cz") { echo "checked=\"checked\""; } ?> name="stat" value="cz" id="cz" required><label for="cz" class="check-2">Česko</label>
					<input type="radio" <?php if ($userStat == "sk") { echo "checked=\"checked\""; } ?> name="stat" value="sk" id="sk"><label for="sk" class="check-2">Slovensko</label>
				</div>
				<br>
				-->
			
			<div id="date"><?php $from = mktime(0, 0, 0, date("m")-3, date("d"),   date("Y")); ?><br>
				Období od: <input type="text" name="date-from" class="datepicker-today" value="<?php if ( !empty ( $dateFrom) ) { echo $dateFrom; } else { echo date("Y-m-d", $from); } ?>">&nbsp;&nbsp;do:&nbsp;<input type="text" name="date-to" class="datepicker-today" value="<?php if ( !empty ($dateTo) ) { echo $dateTo; } else { echo date("Y-m-d"); } ?>"><br>
			</div>

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

			<h3>Seřadit podle</h3>
			<div class="flex">
				<select name="sort-by" id="sort-by" required="required" class="per100">
					<option value="mdg_events.odeslano">Datum splnění</option>
					<option value="mdg_company_details.nazev">Obchod</option>
					<option value="mdg_company_details.ulice">Ulice</option>
					<option value="mdg_company_details.mesto">Město</option>
					<option value="mdg_company_details.okres">Obec</option>
					<option value="mdg_company_details.retezec">Řetězec</option>
					<option value="mdg_events.datum" selected="select">Datum akce</option>
					<option value="mdg_events.hodin">Počet hodin</option>
					<option value="users.prijmeni">Promotérka</option>
					<option value="users.telefon">Telefon promotérky</option>
					<option value="users.prijmeni">Koordinátor</option>
					<option value="users.telefon">Telefon koordinátora</option>
					<option value="mdg_events.splneno">Splněno</option>
					<option value="mdg_events.schvaleno">Schváleno</option>
					<option value="mdg_events.km_celkem">KM celkem</option>
					<option value="mdg_events.popis">Zadání akce</option>
					<option value="mdg_events.poznamky">Poznámky k akci</option>
				</select>

				<select name="sort" id="sort" required="required" class="per100">
					<option value="ASC" selected="select">Vzestupně</option>
					<option value="DESC">Sestupně</option>
				</select>

			</div>
			<br>

			<div>
				<label for="id">ID akce</label><input type="text" name="id" id="id" value="<?php if(!empty($valueid)){ echo "$valueid"; }?>">
				<label for="nazev">Obchod</label><input type="text" name="nazev" id="nazev" value="<?php if(!empty($valuenazev)){ echo "$valuenazev"; }?>">
				<label for="ulice">Ulice</label><input type="text" name="ulice" id="ulice" value="<?php if(!empty($valueulice)){ echo "$valueulice"; } ?>">	
				<label for="mesto">Město</label><input type="text" name="mesto" id="mesto" value="<?php if(!empty($valuemesto)){ echo "$valuemesto"; } ?>">	
				<label for="okres">Obec</label><input type="text" name="okres" id="okres" value="<?php if(!empty($valueokres)){ echo "$valueokres"; } ?>">
				<label for="retezec">Řetězec</label><input type="text" name="retezec" id="retezec" value="<?php if(!empty($valueretezec)){ echo "$valueretezec"; } ?>">
			</div>

			<br>
			

			<input type="hidden" name="id_action" value="<?php echo $id; ?>"/>
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
		</div>
		<div class="column-space"></div>
		<!--<div><h3>Vyberte sloupce</h3>-->

		<div class="col-3">
			<select name="users-koo[]" id="users-koo" class="multiple-koo" multiple>
				<option value="" selected disabled>Vybrat koordinátora</option><?php 
					$i = 0; $status = "";
					$position1 = "Koordinátor";
					$position2 = "Merchandiser";
					$sql = "SELECT id_user, jmeno, prijmeni
							FROM users
							WHERE ( pozice='$position1' OR pozice='$position2' OR id_user='1' ) AND id_user>0 AND role LIKE '%mdg-pristup%'
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

			<select name="users[]" id="users" class="multiple-koo" multiple>
				<option value="" selected disabled>Vybrat promotéra</option><?php

					$sql = "SELECT id_user, jmeno, prijmeni
							FROM users
							WHERE id_user > 0 AND ( pozice='Koordinátor' OR pozice='Promotér' OR pozice='Ostatní' OR pozice='Merchandiser' OR id_user='1') AND role LIKE '%mdg-pristup%'
							ORDER BY prijmeni";
					$conn = dbConnect();
					mysqli_query($conn, "SET NAMES utf8");

					$data = mysqli_query($conn, $sql);
					while($radek = mysqli_fetch_row($data)) {
						//echo $radek[$i];
						if ($radek%3==1) {
							//if ($radek[$i] == $users) {
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

			<select name="choose[]" class="select-summary" multiple>
				<option value="edit">Editace</option>
				<option value="datum-akce" selected="select">Datum akce</option>
				<option value="promo" selected="select">Promotér</option>
				<option value="promo-tel">Kontakt na promotéra</option>
				<option value="koo">Koordinátor</option>
				<option value="koo-tel">Kontakt na koordinátora</option>
				<option value="odeslano">Datum splnění</option>
				<option value="pharmacy" selected="select">Obchod</option>
				<option value="okres">Obec</option>
				<option value="mesto" selected="select">Město</option>
				<option value="ulice" selected="select">Ulice</option>
				<option value="retezec" selected="select">Řetězec</option>
				<option value="pracovni-doba" selected="select">Pracovní doba</option>
				<option value="filled" selected="select">Splněno</option>
				<option value="schvaleno">Schváleno</option>
				<option value="km-celkem" selected="select">KM celkem</option>
				<option value="popis" selected="select">Zadání akce</option>
				<option value="poznamky" selected="select">Poznámky z akce</option>
				<option value="photo" selected="select">Fotografie</option>
			</select>
		</div>
		<!--</div>-->
	</div>
</form>
<?php //if (!empty($messageSuccess)) { echo '<div class="message-success">'.$messageSuccess.'</div>';		} ?>
<?php if (!empty($messageError))   { echo '
						<div class="message-error">'.$messageError.'</div>';	}	 ?>

