<?php 



 ?>
<h3>Produkty</h3>

<table id="products">
						
						<thead>
							<tr>
								<th>Výrobek</th>
								<th>EAN</th>
								<th>Kód</th>
								<th>Ks v balení</th>
								<th>Ks</th>
								<th>Poznámky</th>
								<th>Cena MO</th>
								<?php if ($show=="show") { echo "<th>Cena celkem"; } ?>
							</tr>
						</thead>
						<tbody>

							<?php
						//$row = mysqli_fetch_row($data);
	
						//echo "<br>Produktů je: $counterProducts + $counterProductsAdditional<br>";

						for ($i=0; $i < ($counterProducts + $counterProductsAdditional); $i++) { 
							//echo "$i) <br>";
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
									<textarea  name="<?php echo "$vyrobekTemp"; ?>" id="<?php echo "$vyrobekTemp"; ?>" rows="2"  class="invisible display-none"><?php if(!empty(${$vyrobekValue})) { echo  removeSqlShowChar(${$vyrobekValue}); } ?></textarea><?php if(!empty(${$vyrobekValue})) { echo  removeSqlShowChar(${$vyrobekValue}); } ?>
								</td>
								<!--<td><input type="text" id="<?php echo "$vyrobekTemp"; ?>" name="<?php echo "$vyrobekTemp"; ?>" class="test-text" value="<?php if(!empty(${$vyrobekValue})) { echo "${$vyrobekValue}"; } else { echo "$default"; } ?>">
								</td>-->
								<td class="w15"><input type="text" id="<?php echo "$eanTemp"; ?>" name="<?php echo "$eanTemp"; ?>"  class="invisible display-none" value="<?php if(!empty(${$eanValue})) { echo  removeSqlShowChar(${$eanValue}); } else { echo "$default"; } ?>"><?php if(!empty(${$eanValue})) { echo  removeSqlShowChar(${$eanValue}); } else { echo "$default"; } ?>
								</td>
								<td><input type="text" id="<?php echo "$kodTemp"; ?>" name="<?php echo "$kodTemp"; ?>"  class="invisible display-none" value="<?php if(!empty(${$kodValue})) { echo  removeSqlShowChar(${$kodValue}); } else { echo "$default"; } ?>"><?php if(!empty(${$kodValue})) { echo  removeSqlShowChar(${$kodValue}); } else { echo "$default"; } ?>
								</td class="w15">
								<td><input type="number" min="0" id="<?php echo "$ksBalTemp"; ?>" name="<?php echo "$ksBalTemp"; ?>"  class="invisible display-none" value="<?php if(${$ksBalValue}>=0) { echo "${$ksBalValue}"; } else { echo "$default"; } ?>"><?php if(${$ksBalValue}>=0) { echo "${$ksBalValue}"; } else { echo "$default"; } ?>
								</td>
								<td><input required type="number" min="0" id="<?php echo "$ksTemp"; ?>" name="<?php echo "$ksTemp"; ?>" class="test-text <?php if ($show=="show") { echo "invisible display-none"; } ?>"  value="<?php if(${$ksValue}>=0){ echo "${$ksValue}"; } else { echo "$default"; } ?>"><?php if ($show=="show" && (${$ksValue}>=0)) { echo "${$ksValue}"; } ?>
								</td>
								<td>
									<textarea class="<?php if ($show=="show") { echo "invisible display-none"; } ?>" name="<?php echo "$poznamkyTemp"; ?>" id="<?php echo "$poznamkyTemp"; ?>" rows="2" class="w98"><?php if(!empty(${$poznamkyValue})) { echo  removeSqlShowChar(${$poznamkyValue}); } ?></textarea><?php if ($show=="show" && !empty(${$poznamkyValue})) { echo  removeSqlShowChar(${$poznamkyValue}); } ?>
								</td>
								<td><input type="number" min="0" id="<?php echo "$cenaMoTemp"; ?>" name="<?php echo "$cenaMoTemp"; ?>"  class="invisible display-none" step="0.01" value="<?php if(${$cenaMoValue}>=0) { echo "${$cenaMoValue}"; } else { echo "$default"; } ?>"><?php if(${$cenaMoValue}>=0) { echo "${$cenaMoValue}"; } else { echo "$default"; } ?>
								</td>
								<?php if ($show=="show") { echo "<td>${$cenaCelkemValue}</td>"; } ?>
								<input type="hidden" id="<?php echo "$idTemp"; ?>" name="<?php echo "$idTemp"; ?>"  value="<?php if(!empty(${$idValue})) { echo "${$idValue}"; } ?>">


							<?php echo "
							</tr>";
							

							
						}

						?>
							
						</tbody>
					</table>