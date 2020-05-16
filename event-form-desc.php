					<table>
						<tr>
							<td>Zadání akce</td>
							<td><?php if ($show != "show" && empty($fill)) { ?>  
							<textarea name="zadani" id="zadani" rows="2" class="w98"><?php if(!empty($zadani)) { echo removeSqlShowChar($zadani); } ?></textarea>
							<?php } 
							else { if(!empty($zadani)) { echo removeSqlShowChar($zadani); } }?></td>
						</tr>
						<tr>
							<td>Poznámky k akci</td>
							<td><?php if ($show != "show") { ?>  <textarea name="poznamky" id="poznamky" rows="2" class="w98"><?php if(!empty($poznamky)) { echo removeSqlShowChar($poznamky); } ?></textarea><?php } 
							else { if(!empty($poznamky)) { echo removeSqlShowChar($poznamky); } }?></td>
						</tr>
					</table>