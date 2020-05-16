<?php if (!empty($messageSuccess)) { echo '<div class="message-success">'.$messageSuccess.'</div>';	} ?>
<?php if (!empty($messageError))   { echo '<div class="message-error">'.$messageError.'</div>';	} ?>
				<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="register" class="clearfix">
					<label for="name">Název řetězce</label><input type="text" name="name" id="name" value="<?php echo "$valueName"; ?>">
					<div class="error"><?php if(!empty($error_name)) { echo $error_name; } ?></div>
					<h3 class="mar-top-0">Vyberte stát</h3>
					<div>
						<input type="radio" <?php if ($userStat == "vse") { echo "checked=\"checked\""; } ?> name="stat" value="vse" id="vse"><label for="vse" class="check-2">Všechny</label>	
						<input type="radio" <?php if ($userStat == "cz") { echo "checked=\"checked\""; } ?> name="stat" value="cz" id="cz"><label for="cz" class="check-2">Česko</label>
						<input type="radio" <?php if ($userStat == "sk") { echo "checked=\"checked\""; } ?> name="stat" value="sk" id="sk"><label for="sk" class="check-2">Slovensko</label>
					</div><br><br><br>
					<!--<h3>Typ ceny</h3>
					<input type="radio" <?php if ($valueCompanyPrice == "MOC") { echo "checked=\"checked\""; } ?> checked="checked" name="company-price" value="MOC" id="moc"><label for="moc" class="check w97">Maloobchodní&nbsp;(MOC)</label> 	
					<input type="radio" <?php if ($valueCompanyPrice == "VOC") { echo "checked=\"checked\""; } ?> name="company-price" value="VOC" id="voc"><label for="voc" class="check">Velkoobchodní&nbsp;(VOC)</label>	-->

					<input type="hidden" name="id_company" value="<?php echo $id; ?>"/>
	
					<input type="submit" name="registeruser" id="registeruser" value="Odeslat">
					<!--<input type="reset" name="reset" id="reset" value="Resetovat">-->
				</form>