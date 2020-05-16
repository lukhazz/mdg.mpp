<div class="flex space">
							<?php 
									$permArrayUsersAdd = array("pridani-uzivatelu");
									$permArrayUsersEdit = array("editace-uzivatelu");
									if (checkPerm($permArrayUsersAdd) || checkPerm($permArrayUsersEdit)) {?>
							<div class="col-1">
								<h3>Práva CRM</h3>
								<input id="nahled-akci" name="role[]" value="nahled-akci" <?php echo "$valueRoleView"; ?> type="checkbox"><label for="nahled-akci" class="check">Náhled svých a budoucích akcí</label>
								<input id="pridani-akci" name="role[]" value="pridani-akci" <?php echo "$valueRoleAddAction"; ?> type="checkbox"><label for="pridani-akci" class="check">Přidání akcí, lékáren, reprezentantů</label>
								<input id="editace-akci" name="role[]" value="editace-akci" <?php echo "$valueRoleEdit"; ?> type="checkbox"><label for="editace-akci" class="check">Editace akcí, lékáren, reprezentantů</label>
								<input id="pridani-firem-formularu" name="role[]" value="pridani-firem-formularu" <?php echo "$valueRoleAddCompanyForm"; ?> type="checkbox"><label for="pridani-firem-formularu" class="check">Přidání firem, formulářů</label>
								<input id="editace-firem-formularu" name="role[]" value="editace-firem-formularu" <?php echo "$valueRoleEditCompanyForm"; ?> type="checkbox"><label for="editace-firem-formularu" class="check">Editace firem, formulářů</label>
								<input id="pridani-uzivatelu" name="role[]" value="pridani-uzivatelu" <?php echo "$valueRoleAddUser"; ?> type="checkbox"><label for="pridani-uzivatelu" class="check">Přidání uživatele</label>
								<input id="editace-uzivatelu" name="role[]" value="editace-uzivatelu" <?php echo "$valueRoleEditUser"; ?> type="checkbox"><label for="editace-uzivatelu" class="check">Editace uživatelů</label>
								<div class="error"><?php if(!empty($error_role)) { echo $error_role; } ?></div>
							</div>
							<div class="column-space"></div>
							<?php }
								?>
							
							<?php 
									$permArrayUsersAdd = array("mdg-pridani-uzivatelu");
									$permArrayUsersEdit = array("mdg-editace-uzivatelu");
									if (checkPerm($permArrayUsersAdd) || checkPerm($permArrayUsersEdit)) {?>
									
							<div class="col-1">
								<h3>Práva Merchandising (MDG)</h3>
								<input id="mdg-pristup" name="role[]" value="mdg-pristup" <?php echo "$valueRoleMdgView"; ?> type="checkbox"><label for="mdg-pristup" class="check">Přístup do MDG</label>
								<input id="mdg-pridani-udalosti" name="role[]" value="mdg-pridani-udalosti" <?php echo "$valueRoleMdgAddEvent"; ?> type="checkbox"><label for="mdg-pridani-udalosti" class="check">Přidání událostí do kalendáře</label>
								<input id="mdg-editace-udalosti" name="role[]" value="mdg-editace-udalosti" <?php echo "$valueRoleMdgEditEvent"; ?> type="checkbox"><label for="mdg-editace-udalosti" class="check">Editace událostí</label>
								<input id="mdg-pridani-obchodu" name="role[]" value="mdg-pridani-obchodu" <?php echo "$valueRoleMdgAddCompany"; ?> type="checkbox"><label for="mdg-pridani-obchodu" class="check">Přidání řetězců, obchodů</label>
								<input id="mdg-editace-pridani-obchodu" name="role[]" value="mdg-editace-pridani-obchodu" <?php echo "$valueRoleMdgEditCompany"; ?> type="checkbox"><label for="mdg-editace-pridani-obchodu" class="check">Editace řetězců, obchodů</label>
								<input id="mdg-pridani-uzivatelu" name="role[]" value="mdg-pridani-uzivatelu" <?php echo "$valueRoleAddUserMdg"; ?> type="checkbox"><label for="mdg-pridani-uzivatelu" class="check">Přidání uživatele</label>
								<input id="mdg-editace-uzivatelu" name="role[]" value="mdg-editace-uzivatelu" <?php echo "$valueRoleEditUserMdg"; ?> type="checkbox"><label for="mdg-editace-uzivatelu" class="check">Editace uživatelů</label>
								<input id="mdg-pridani-produktu" name="role[]" value="mdg-pridani-produktu" <?php echo "$valueRoleMdgAddProduct"; ?> type="checkbox"><label for="mdg-pridani-produktu" class="check">Přidání produktů</label>
								<input id="mdg-editace-produktu" name="role[]" value="mdg-editace-produktu" <?php echo "$valueRoleMdgEditProduct"; ?> type="checkbox"><label for="mdg-editace-produktu" class="check">Editace produktů</label>
								<div class="error"><?php if(!empty($error_mdg_role)) { echo $error_mdg_role; } ?></div>
							</div>
							<?php }
								?>

						</div>