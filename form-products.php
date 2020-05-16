<?php 



 ?>


<table>
						<caption>Produkty</caption>
						<thead>
							<tr>
								<th>Výrobek</th>
								<th>EAN</th>
								<th>Kód</th>
								<th>Ks v balení</th>
								<th>Ks</th>
								<th>Poznámky</th>
								<th>Cena MO</th>
								<th>Cena celkem</th>
								<?php 
								if ( ( $revision != true) ) {
									echo "<th>Zobrazovat</th>";
								} 
								?>
							</tr>
						</thead>
						<tbody>
						<!--
							<tr class="<?php //echo "$hidden-1"; ?>">
								<td><input type="text" placeholder="Produkt 1" class="w96 padding03" name="produkt-1[]" id="produkt-1" value="<?php echo "$valueP1Nazev"; ?>" <?php //echo "$disabledProduct-1"; ?>></td>
								<td><input type="number" placeholder="19.90" step="any" class="w60 padding03 right" name="produkt-1[]" min="0" max="9999" value="<?php echo "$valueP1Cena"; ?>" <?php //echo "$disabledPrice-1"; ?>>&nbsp;<?php echo "$mena"; ?></td>
								<td><input type="number" placeholder="19.90" step="any" class="w60 padding03 right" name="produkt-1[]" min="0" max="9999" value="<?php echo "$valueP1CenaVoc"; ?>" <?php //echo "$disabledPrice-1"; ?>>&nbsp;<?php echo "$mena"; ?></td>
								<td><input type="number" placeholder="0-9999" class="w60 padding03 right" name="produkt-1[]" min="0" max="9999" value="<?php echo "$valueP1Pocatek"; ?>">&nbsp;Ks</td>
								<td><input type="number" placeholder="0-9999" class="w60 padding03 right" name="produkt-1[]" min="0" max="9999" value="<?php echo "$valueP1Konec"; ?>">&nbsp;Ks</td>
								<td><input type="number" placeholder="0-9999" class="w60 padding03 right" name="produkt-1[]" min="0" max="9999" value="<?php echo "$valueP1Kusu"; ?>">&nbsp;Ks</td>
							</tr>

					 	-->

							<?php
						//$row = mysqli_fetch_row($data);
	
						//echo "<br>Produktů je: $counterProducts<br>";

						for ($i=0; $i < ($counterProducts + $counterProductsAdditional); $i++) { 
							$idTemp = "idProduct".($i+1);
							$eanTemp = "ean".($i+1);
							$kodTemp = "kod".($i+1);
							$vyrobekTemp = "vyrobek".($i+1);
							$ksBalTemp = "ksBal".($i+1);
							$ksTemp = "ks".($i+1);
							$poznamkyTemp = "poznamky".($i+1);
							$cenaMoTemp = "cenaMo".($i+1);
							$cenaCelkemTemp = "cenaCelkem".($i+1);
							$showTemp 		= "show".($i+1);

							$idValue = "idValue".($i+1);
							$eanValue = "eanValue".($i+1);
							$kodValue = "kodValue".($i+1);
							$vyrobekValue = "vyrobekValue".($i+1);
							$ksBalValue = "ksBalValue".($i+1);
							$ksValue = "ksValue".($i+1);
							$poznamkyValue = "poznamkyValue".($i+1);
							$cenaMoValue = "cenaMoValue".($i+1);
							$cenaCelkemValue = "cenaCelkemValue".($i+1);
							$showValue = "showValue".($i+1);

							$ksBalValue = "ksBalValue".($i+1);
							if (empty(${$ksBalValue})) { (int)${$ksBalValue} = 0; }

							$ksValue = "ksValue".($i+1);
							if (empty(${$ksValue})) { (int)${$ksValue} = 0; }

							$cenaMoValue = "cenaMoValue".($i+1);
							if (empty(${$cenaMoValue})) { (int)${$cenaMoValue} = 0; }

							$cenaCelkemValue = "cenaCelkemValue".($i+1);
							if (empty(${$cenaCelkemValue})) { (int)${$cenaCelkemValue} = 0; }


							$default = NULL;
								echo "
							<tr>";
								echo "
								";?>
								<td class="w20">
									<textarea name="<?php echo "$vyrobekTemp"; ?>" id="<?php echo "$vyrobekTemp"; ?>" rows="2" class="w98"><?php if(!empty(${$vyrobekValue})) { echo removeSqlShowChar(${$vyrobekValue}); } ?></textarea>
								</td>
								<!--<td><input type="text" id="<?php echo "$vyrobekTemp"; ?>" name="<?php echo "$vyrobekTemp"; ?>" class="test-text" value="<?php if(!empty(${$vyrobekValue})) { echo "${$vyrobekValue}"; } else { echo "$default"; } ?>">
								</td>-->
								<td class="w15"><input type="text" id="<?php echo "$eanTemp"; ?>" name="<?php echo "$eanTemp"; ?>" class="test-text" value="<?php if(!empty(${$eanValue})) { echo removeSqlShowChar(${$eanValue}); } else { echo "$default"; } ?>">
								</td>
								<td><input type="text" id="<?php echo "$kodTemp"; ?>" name="<?php echo "$kodTemp"; ?>" class="test-text" value="<?php if(!empty(${$kodValue})) { echo removeSqlShowChar(${$kodValue}); } else { echo "$default"; } ?>">
								</td class="w15">
								<td><input type="number" min="0" id="<?php echo "$ksBalTemp"; ?>" name="<?php echo "$ksBalTemp"; ?>" class="test-text" value="<?php if(${$ksBalValue}>=0) { echo "${$ksBalValue}"; } else { echo "$default"; } ?>">
								</td>
								<td><input type="number" min="0" id="<?php echo "$ksTemp"; ?>" name="<?php echo "$ksTemp"; ?>" class="test-text" value="<?php if(${$ksValue}>=0){ echo "${$ksValue}"; } else { echo "$default"; } ?>">
								</td>
								<td>
									<textarea name="<?php echo "$poznamkyTemp"; ?>" id="<?php echo "$poznamkyTemp"; ?>" rows="2" class="w98"><?php if(!empty(${$poznamkyValue})) { echo removeSqlShowChar(${$poznamkyValue}); } ?></textarea>
								</td>
								<td><input type="number" min="0" id="<?php echo "$cenaMoTemp"; ?>" name="<?php echo "$cenaMoTemp"; ?>" class="test-text" step="0.01" value="<?php if(${$cenaMoValue}>=0) { echo "${$cenaMoValue}"; } else { echo "$default"; } ?>">
								</td>
								<td><input type="number" min="0" id="<?php echo "$cenaCelkemTemp"; ?>" name="<?php echo "$cenaCelkemTemp"; ?>" class="test-text" step="0.01" value="<?php if(${$cenaCelkemValue}>=0) { echo "${$cenaCelkemValue}"; } else { echo "$default"; } ?>">
								</td>
								<?php 
								if ( ( $revision != true) ) {
								?>
								<td>
									<input type="checkbox" <?php if( (empty(${$showValue})) || (${$showValue}=="ano") ) { echo "checked"; } ?> id="<?php echo "$showTemp"; ?>" name="<?php echo "$showTemp"; ?>" value="ano" class="test-check">	
								</td>
								<?php 
								}
								 ?>

								<input type="hidden" id="<?php echo "$idTemp"; ?>" name="<?php echo "$idTemp"; ?>"  value="<?php if(!empty(${$idValue})) { echo "${$idValue}"; } ?>">
								
							<?php echo "
							</tr>";
							

							
						}

						?>
							
						</tbody>
					</table>