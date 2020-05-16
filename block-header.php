<?php 

$permStatus = checkPerm($permArrayMdgAccess);
$permStatusMenu = checkPerm($permArrayMdg);
//echo "$permStatus";
 ?>
	
	<div id="header">
		<div id="header-wrapper">
			<div id="header-logo">
				<!--  CONTENT ELEMENT, uid:140/html [begin] -->
				<div id="c140" class="csc-default">
					<!--  Raw HTML content: [begin] -->
					<a href="homepage.php">MEDICAL & PHARMA PROMOTION, s.r.o.<span></span></a>
					<!--  Raw HTML content: [end] -->
				</div>
				<!--  CONTENT ELEMENT, uid:140/html [end] -->
			</div>
			<?php if ($permStatus == true && $permStatusMenu == true) {
				?>

			<div class="nav-full">
				<a href="#" id="nav-toggle">&#9776; Menu</a> <!-- Tlačítko mobilního menu -->
				<nav class="top" id="top-menu">
					<ul class="menu-center">
						<!--<li><a <?php //echo "href=\"homepage.php?id=" . $_SESSION['id_user'] . "\""; ?>>Domů</a></li>-->
						<li class="dropdown"><a href="event-view.php">Akce</a>
							<ul class="submenu sub-togg">
								<li><a href="event-view.php">Zobrazit</a></li>
								<li><a href="event-registration.php">Přidat CZ</a></li>
							</ul>
						</li>
						<!--<li><a <?php echo "href=\"summary.php\""; ?>>Výpisy</a></li>-->
						<!--
						<li class="dropdown"><a href="pharmacy-view.php">Lékárny</a>
							<ul class="submenu sub-togg">
								<li><a href="pharmacy-view.php">Zobrazit</a></li>
								<li><a href="pharmacy-registration.php">Přidat</a></li>
							</ul>
						</li>-->
						<li><a <?php echo "href=\"summary.php\""; ?>>Výpisy</a></li>
						<li class="dropdown"><a href="form-view.php">Produkty</a>
							<ul class="submenu sub-togg">
								<li><a href="form-view.php">Zobrazit</a></li>
								<?php 
									$permArrayTemp = array("mdg-pridani-udalosti");
									if (checkPerm($permArrayTemp)) {?>
										<li><a href="form-maker.php">Přidat</a></li>
									<?php }
								?>
							</ul>
						</li>
						<li class="dropdown"><a href="company-view.php">Řetězce</a>
							<ul class="submenu sub-togg">
								<li><a href="company-view.php">Zobrazit</a></li>
								<?php 
									$permArrayTemp = array("mdg-pridani-obchodu");
									if (checkPerm($permArrayTemp)) {?>
										<li><a href="company-registration.php">Přidat</a></li>
									<?php }
								?>
								<!--
								<li><a href="tradesman-view.php">Reprezentanti</a>
								<li><a href="tradesman-registration.php">Přidat repre</a></li>
								-->
							</ul>
						</li>
						
						<li class="dropdown"><a href="company-details-view.php">Obchody</a>
							<ul class="submenu sub-togg">
								<li><a href="company-details-view.php">Zobrazit</a></li>
								<?php 
									$permArrayTemp = array("mdg-pridani-obchodu");
									if (checkPerm($permArrayTemp)) {?>
										<li><a href="company-details-registration.php">Přidat</a></li>
									<?php }
								?>
								<!--
								<li><a href="tradesman-view.php">Reprezentanti</a>
								<li><a href="tradesman-registration.php">Přidat repre</a></li>
								-->
							</ul>
						</li>
						<li class="dropdown"><a href="user-view.php">Uživatelé</a>
							<ul class="submenu sub-togg">
								<li><a href="user-view.php">Zobrazit</a></li>
								<?php 
									$permArrayTemp = array("mdg-pridani-uzivatelu");
									if (checkPerm($permArrayTemp)) {?>
										<li><a href="user.php">Přidat</a></li>
									<?php }
								?>
							</ul>
						</li>
						<!--
						<li class="dropdown"><a href="test-view.php">Testy</a>
							<ul class="submenu sub-togg">
								<li><a href="test-view.php">Zobrazit</a></li>
								<li><a href="test-maker.php">Přidat zadání</a></li>
								<li><a href="test-add.php">Přiřadit</a></li>
							</ul>
						</li>
						-->
					</ul>
				</nav>
			</div>
			<?php } 

			else {
				checkPermRedirect( $permArrayMdg );		
			}

			$permStatusCurrent = checkPerm($permArrayCurrent);
			if ($permStatusCurrent == false) {
				header('location: perm.php'); 
			}

			?>

			<div id="claim">
				<!--  CONTENT ELEMENT, uid:149/text [begin] -->
				<div id="c149" class="csc-default">
					<!--  Text: [begin] -->
					<p class="bodytext"><i>Informační systém MERCHANDISING</i></p>
					<!--  Text: [end] -->
				</div>
				<!--  CONTENT ELEMENT, uid:149/text [end] -->
			</div>
			<div id="info invisible">
				<!--  CONTENT ELEMENT, uid:170/text [begin] -->
				<div id="c170" class="csc-default">
					<!--  Text: [begin] -->
					<p class="bodytext" id="phone"><b>VOLEJTE</b>&nbsp; 774 799 244</p>
					<!--  Text: [end] -->
				</div>
				<!--  CONTENT ELEMENT, uid:170/text [end] -->
			</div>
			<div id="info-form">
				<!--  CONTENT ELEMENT, uid:173/text [begin] -->
				<div id="c173" class="csc-default">
					<!--  Text: [begin] -->
					<ul>
						<?php $idUser = $_SESSION['id_user']; ?>
						<?php 

						$permStatusCrm = checkPerm($permArrayView);

						if ($permStatusCrm == true) {
						?>
						<div class="topcorner"><a href="<?php echo "$crm_link"; ?>/homepage.php">Jít do CRM</a></div>
						<?php } ?>
						<li><a href="user-edit.php?id=<?php echo $idUser; ?>">
						<i class="fa fa-user"></i>
						<?php 
						if(!empty($_SESSION['prihlasen'] && $_SESSION['prihlasen']===1)) {
							echo "&nbsp;&nbsp;".$_SESSION['jmeno']."&nbsp;".$_SESSION['prijmeni']; 
						}
						else {
							echo "mám se přesunout na login";
							header('location: index.php');
						}
						 ?><!--&nbsp;&nbsp;Příjmení&nbsp;Jméno--></a>
						<?php /*
							if(!empty($_SESSION['prihlasen'] && $_SESSION['prihlasen']===1)) {
								echo "".$_SESSION['jmeno']." ".$_SESSION['prijmeni']."";
							}
							else {
								header('location: index.php');
							}*/
						 ?>
						</li>
						<li class="upper"><a href="index.php?odhlasit">Odhlásit&nbsp;se</a></li>
					</ul>	
					<!--  Text: [end] -->
				</div>
				<!--  CONTENT ELEMENT, uid:173/text [end] -->
			</div>
		</div>
	</div>