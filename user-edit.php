<?php

function renderForm($id, $valueName, $valueSurname, $valueEmail, $valueDate, $valuePhone, $valuePosition, $valueRole, $valueActive, $messageSuccess, $messageError, $error_name, $error_surname, $error_password, $error_email, $error_date, $error_phone, $error_position, $valuePositionPromo, $valuePositionArea, $valuePositionManag, $valuePositionReditel, $valuePositionMajitel, $valuePositionMdg, $valuePositionKlient, $valueActiveCheck, $valueRoleView, $valueRoleAddAction, $valueRoleEdit, $valueRoleDelete, $valuePriceType, $valuePrice, $valueRoleAddUser, $valueRoleAddUserMdg, $valueRoleAddCompanyForm, $valueRoleEditCompanyForm, $valueRoleEditUser, $valueRoleEditUserMdg, $valueRoleMdgView, $valueRoleMdgAddEvent, $valueRoleMdgEditEvent, $valueRoleMdgAddCompany, $valueRoleMdgEditCompany, $valueRoleMdgAddProduct, $valueRoleMdgEditProduct, $usersKoo, $valueStat)
{

?>

<!DOCTYPE html>
<html>
<?php 
$pageTitle="Editace uživatelů"; 
$description="Editace uživatelů včetně patřičných práv."; 
?>
<?php require("prompts.php"); ?>
<?php require("block-head.php"); ?>



<body>
	<div class="page">
		<?php require_once("login-db.php") ?>
		<?php require_once("login.php") ?>
		<?php require_once("roles.php") ?>
		<?php $permArrayCurrent = array("mdg-editace-uzivatelu"); ?>
		<?php require("block-header.php"); ?>
		<?php //require("functions.php") ?>

		<div class="container">

				<main>
					<div>
					<section class="form">
						<h2>Úprava uživatele</h2>
						<?php if (!empty($messageSuccess)) { echo '<div class="message-success">'.$messageSuccess.'</div>';	} ?>
						<?php if (!empty($messageError))   { echo '<div class="message-error">'.$messageError.'</div>';	} ?>
						<?php //if ($insert != '') {	echo '<div class="message">'.$insert.'</div>';	} ?>

						<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" name="register" class="clearfix">
							<label for="name">Jméno</label><input type="text" name="name" id="name" value="<?php echo $valueName; ?>">
							<div class="error"><?php if(!empty($error_name)) { echo $error_name; } ?></div>

							<label for="surname">Příjmení</label><input type="text" name="surname" id="surname" value="<?php echo $valueSurname; ?>">
							<div class="error"><?php if(!empty($error_surname)) { echo $error_surname; } ?></div>

							<label for="password">Heslo</label><input type="password" name="password" id="password" value="">
							<div class="error"><?php if(!empty($error_password)) { echo $error_password; } ?></div>	
						
							<label for="email">Email</label><input type="email" name="email" id="email" value="<?php echo "$valueEmail"; ?>">
							<div class="error"><?php if(!empty($error_email)) { echo $error_email; } ?></div>	
						
							<label for="date">Datum narození</label><input required="required" type="text" name="date" id="datepicker-today" value="<?php echo "$valueDate"; ?>">
						<div class="error"><?php if(!empty($error_date)) { echo $error_date; } ?></div>	

							<label for="phone">Telefon</label><input type="text" name="phone" id="phone" value="<?php echo "$valuePhone"; ?>">
							<div class="error"><?php if(!empty($error_phone)) { echo $error_phone; } ?></div>

							<!--<label for="fileToUpload">Fotografie</label><input type="file" name="fileToUpload" id="fileToUpload">
							<div class="error"><?php if(!empty($error_photo)) { echo $error_photo; } ?></div>
							<div class="error"><?php if(!empty($error_photo_overall)) { echo $error_photo_overall; } ?></div>-->

							<label for="position">Kategorie</label>
							<select name="position" id="position">
								<option <?php echo "$valuePositionMdg"; ?> value="Merchandiser">Merchandiser</option>
								<option <?php echo "$valuePositionKlient"; ?> value="Klient">Klient</option>
								<option <?php echo "$valuePositionPromo"; ?> value="Promotér">Promotér</option>
								<option <?php echo "$valuePositionArea"; ?> value="Koordinátor">Koordinátor</option>
								<option <?php echo "$valuePositionManag"; ?> value="Ostatní">Ostatní</option>
								<option <?php echo "$valuePositionReditel"; ?> value="Ředitel">Ředitel</option>
								<option <?php echo "$valuePositionMajitel"; ?> value="Majitel">Majitel</option>
							</select>
							<div class="error"><?php if(!empty($error_position)) { echo $error_position; } ?></div>		
							
							<label for="users-koo">Nadřízený</label>
							<select name="users-koo" id="users-koo"><?php
									$i = 0;
									$status = "";
									$position1 = "Koordinátor";
									$position2 = "Ostatní";
									$position3 = "Ředitel";
									$position4 = "Majitel";
									$position5 = "Merchandiser";
									$position6 = "Klient";
									$sql = "SELECT id_user, jmeno, prijmeni
											FROM users
											WHERE id_user='1' OR pozice='$position1' OR pozice='$position2' OR pozice='$position3' OR pozice='$position4' OR pozice='$position5' OR pozice='$position6'
											ORDER BY prijmeni";
									$conn = dbConnect();
									mysqli_query($conn, "SET NAMES utf8");

									$data = mysqli_query($conn, $sql);
									while($radek = mysqli_fetch_row($data)) {
										//echo $radek[$i];
										if ($radek%3==1) {
											if ($radek[$i] == $usersKoo) {
												$status ="available";
											}
											//for($i=0;$i<	count($radek);$i++) {
												//$i=0;
											echo "
								<option value=\"$radek[$i]\" ";?><?php if($status=="available"){ echo "selected=\"selected\""; } ?><?php echo ">".$radek[$i+2]."	 ".$radek[$i+1]." (".$radek[$i].")</option>";
											//}
										}
									$status ="";
										
									}

								?>

							</select><br>

						<h3 class="mar-top-0">Vyberte stát</h3>
						<div>
							<input type="radio" <?php if ($valueStat == "cz") { echo "checked=\"checked\""; } ?> checked="checked" name="stat" value="cz" id="cz"><label for="cz" class="check w97">Česko</label> 	
							<input type="radio" <?php if ($valueStat == "sk") { echo "checked=\"checked\""; } ?> name="stat" value="sk" id="sk"><label for="sk" class="check">Slovensko</label>
							<input type="radio" <?php if ($valueStat == "vse") { echo "checked=\"checked\""; } ?> name="stat" value="vse" id="cz-sk"><label for="cz-sk" class="check">Všechny</label>
						</div>

							<h3>Cenové ohodnocení</h3>
		 					<label for="user-price">Za hodinu (Kč nebo &euro;)</label><input type="number" step="any" placeholder="59.90" class="number" name="user-price" min="0" max="9999" required="required" value="<?php echo "$valuePrice"; ?>"><br>
							<input type="radio" checked="checked" <?php if ($valuePriceType == "dohoda") { echo "checked=\"checked\""; } ?> name="user-type-price" value="dohoda" id="dohoda"><label for="dohoda" class="check">Dohoda o provedení práce</label>	
							<input type="radio" <?php if ($valuePriceType == "ico") { echo "checked=\"checked\""; } ?> name="user-type-price" value="ico" id="ico"><label for="ico" class="check">IČO</label>

							<h3>Aktivnost účtu</h3>
							<input id="active" name="active" value="true" <?php echo "$valueActiveCheck"; ?> type="checkbox"><label for="active" class="check red">Aktivní</label>

							<!--
							<div class="row">
								<h3>Práva</h3>
								<input id="nahled-akci" name="role[]" value="nahled-akci" <?php echo "$valueRoleView"; ?> type="checkbox"><label for="nahled-akci" class="check">Náhled svých a budoucích akcí</label>
								<input id="pridani-akci" name="role[]" value="pridani-akci" <?php echo "$valueRoleAddAction"; ?> type="checkbox"><label for="pridani-akci" class="check">Přidání akcí, lékáren, reprezentantů</label>
								<input id="editace-akci" name="role[]" value="editace-akci" <?php echo "$valueRoleEdit"; ?> type="checkbox"><label for="editace-akci" class="check">Editace akcí, lékáren, reprezentantů</label>
								<input id="pridani-firem-formularu" name="role[]" value="pridani-firem-formularu" <?php echo "$valueRoleAddCompanyForm"; ?> type="checkbox"><label for="pridani-firem-formularu" class="check">Přidání firem, formulářů</label>
								<input id="editace-firem-formularu" name="role[]" value="editace-firem-formularu" <?php echo "$valueRoleEditCompanyForm"; ?> type="checkbox"><label for="editace-firem-formularu" class="check">Editace firem, formulářů</label>
								<input id="pridani-uzivatelu" name="role[]" value="pridani-uzivatelu" <?php echo "$valueRoleAddUser"; ?> type="checkbox"><label for="pridani-uzivatelu" class="check">Přidání uživatele</label>
								<input id="editace-uzivatelu" name="role[]" value="editace-uzivatelu" <?php echo "$valueRoleEditUser"; ?> type="checkbox"><label for="editace-uzivatelu" class="check">Editace uživatelů</label>
								<div class="error"><?php if(!empty($error_role)) { echo $error_role; } ?></div>
							</div>
							-->


							<br><br>
							<?php require("user-roles.php") ?>

							<input type="hidden" name="id_user" value="<?php echo $id; ?>"/>

							<input type="submit" name="submit" id="submit" value="Upravit">
							
						</form>

					</section>
				</div>
				
			</main>
		</div>
		<?php require("block-footer.php") ?>
	</div>
</body>
</html>

<?php

}



// connect to the database

require_once("login-db.php");
require("functions.php");


// check if the form has been submitted. If it has, process the form and save it to the database

	$error_name = $messageSuccess = $messageError = $error_surname = $error_password = $error_email = $error_date = $error_phone = $error_position = "";
	$valuePositionPromo		="";
	$valuePositionArea		="";
	$valuePositionManag		="";
	$valuePositionMdg		="";
	$valuePositionKlient		="";
	$valuePositionReditel	="";
	$valuePositionMajitel	="";
	$valueRoleView			="checked=\"checked\"";
	$valueRoleAddAction		="";
	$valueRoleAddCompanyForm ="";
	$valueRoleEdit			="";
	$valueRoleEditCompanyForm ="";
	$valueRoleDelete		="";
	$valueRoleAddUser		="";
	$valueRoleEditUser		="";
	$valueRoleAddUserMdg		="";
	$valueRoleEditUserMdg		="";
	$valuePriceType  		="";
	$valueStat  			="";
	$valuePrice 	 		="0";
	$valueRoleMdgView		="";
	$valueRoleMdgAddEvent		="";
	$valueRoleMdgEditEvent		="";
	$valueRoleMdgAddCompany		="";
	$valueRoleMdgEditCompany		="";
	$valueRoleMdgAddProduct		="";
	$valueRoleMdgEditProduct		="";

	//$id

	if (isset($_POST['active'])) { $active = "ano"; $valueActive = "ano"; $valueActiveCheck = "checked=\"checked\"";}
	else { $active = "ne"; $valueActive = "ne"; $valueActiveCheck =""; }

	if (isset($_POST['submit'])) { // confirm that the 'id' value is a valid integer before getting the form data

		if (is_numeric($_POST['id_user'])) {

			// get form data, making sure it is valid

			$id 			= $_POST['id_user'];
			$valueName 		= $_POST['name']; //mysql_real_escape_string(htmlspecialchars($_POST['name']));
			$valueSurname 	= $_POST['surname']; //mysql_real_escape_string(htmlspecialchars($_POST['surname']));	
			 //mysql_real_escape_string(htmlspecialchars($_POST['role']));
			$valuePosition 	= $_POST['position']; //mysql_real_escape_string(htmlspecialchars($_POST['position']));
			$valuePhone 	= $_POST['phone']; //mysql_real_escape_string(htmlspecialchars($_POST['phone']));
			$valueEmail 	= $_POST['email']; //mysql_real_escape_string(htmlspecialchars($_POST['email']));
			$valueDate 		= $_POST['date']; //mysql_real_escape_string(htmlspecialchars($_POST['date']));
			$position 		= $_POST['position'];
			$valueStat = $stat 		= $_POST['stat'];
			$valuePassword	= "";
			$valuePriceType = $userTypePrice = $_POST['user-type-price'];
			if (isset($_POST['users-koo'])) { (int)$usersKoo = (int)$userBoss = $_POST['users-koo']; }
			else { (int)$usersKoo = (int)$userBoss = "1"; }

			if (isset($_POST['role'])) {
				$valueRole 		= $_POST['role'];
			}
			else {
				$valueRole= array("bez","prav");
			}

			if ($_POST['password']) {
				$password = md5($_POST['password']);
				$valuePassword = $password;
			}
			if (isset($_POST['user-price'])) { $valuePrice = $userPrice = $_POST['user-price']; }
			else { $valuePrice = $userPrice = "0"; }
			$valuePosition = $position;	
			
			$reg_name     	= "#^[A-Za-zěščřžýáíéúůťňďĚŠČŘŽÝÁÍÉÚŮĎŤŇ][[A-Za-zěščřžýáíéúůťňďĚŠČŘŽÝÁÍÉÚŮĎŤŇ ]*[A-Za-zěščřžýáíéúůťňďĚŠČŘŽÝÁÍÉÚŮĎŤŇ]$#";  // Jméno včetně diakritiky
			$reg_surname  	= "#^[A-Za-zěščřžýáíéúůťňďĚŠČŘŽÝÁÍÉÚŮĎŤŇ][[A-Za-zěščřžýáíéúůťňďĚŠČŘŽÝÁÍÉÚŮĎŤŇ ]*[A-Za-zěščřžýáíéúůťňďĚŠČŘŽÝÁÍÉÚŮĎŤŇ]$#";  // Přijmení včetně diakritiky
			$reg_email    	= "#^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$#";
			//$reg_date     = "#^(0?[1-9]|[12][0-9]|3[01]).(0?[1-9]|1[012]).[0-9]{4}$#";
			$reg_phone    	= "#^[0-9+][0-9]*$#";
			$error 			= false;

			$allRoles = implode(",",$valueRole);
			if (isset($_POST['active'])) { $active = "ano"; $valueActive = "ano"; $valueActiveCheck = "checked=\"checked\"";}
			else { $active = "ne"; $valueActive = "ne"; $valueActiveCheck =""; }

			/*************************************************
			                  DEFAULT CHECKBOX
			 *************************************************/

			if ($position =="Promotér") {
				$valuePositionPromo = "selected=\"selected\"";
			}
			else if ($position =="Koordinátor") {
				$valuePositionArea = "selected=\"selected\"";
			}
			else if ($position =="Merchandiser") {
				$valuePositionMdg = "selected=\"selected\"";
			}
			else if ($position =="Klient") {
				$valuePositionKlient = "selected=\"selected\"";
			}
			else if ($position =="Ostatní") {
				$valuePositionManag = "selected=\"selected\"";
			}
			else if ($position =="Ředitel") {
				$valuePositionReditel = "selected=\"selected\"";
			}
			else {
				$valuePositionMajitel = "selected=\"selected\"";
			}

			/*************************************************
			                  DEFAULT SELECT
			 *************************************************/

			$valueRoleView = "";
			$role = explode(",", $allRoles);
			for ($j=0; $j < sizeof($role); $j++) { 
				//echo $role[$j];
				switch ($role[$j]) {
					case 'nahled-akci':
						$valueRoleView = "checked=\"checked\"";
						break;
					case 'pridani-akci':
						$valueRoleAddAction = "checked=\"checked\"";
						break;
					case 'editace-akci':
						$valueRoleEdit = "checked=\"checked\"";
						break;
					case 'pridani-firem-formularu':
						$valueRoleAddCompanyForm = "checked=\"checked\"";
						break;
					case 'editace-firem-formularu':
						$valueRoleEditCompanyForm = "checked=\"checked\"";
						break;
					case 'pridani-uzivatelu':
						$valueRoleAddUser = "checked=\"checked\"";
						break;
					case 'editace-uzivatelu':
						$valueRoleEditUser = "checked=\"checked\"";
						break;
					case 'mdg-pristup':
						$valueRoleMdgView = "checked=\"checked\"";
						break;
					case 'mdg-pridani-udalosti':
						$valueRoleMdgAddEvent = "checked=\"checked\"";
						break;
					case 'mdg-editace-udalosti':
						$valueRoleMdgEditEvent = "checked=\"checked\"";
						break;
					case 'mdg-pridani-obchodu':
						$valueRoleMdgAddCompany = "checked=\"checked\"";
						break;
					case 'mdg-editace-pridani-obchodu':
						$valueRoleMdgEditCompany = "checked=\"checked\"";
						break;
					case 'mdg-pridani-uzivatelu':
						$valueRoleAddUserMdg = "checked=\"checked\"";
						break;
					case 'mdg-editace-uzivatelu':
						$valueRoleEditUserMdg = "checked=\"checked\"";
						break;
					case 'mdg-pridani-produktu':
						$valueRoleMdgAddProduct = "checked=\"checked\"";
						break;
					case 'mdg-editace-produktu':
						$valueRoleMdgEditProduct = "checked=\"checked\"";
						break;
					default:
						# code...
						break;
				}
			}
		
			/*
			$admin_email = "lukhazz@seznam.cz";
			$subject = $name;
			$comment = $surname;
			  
			//send email
			mail($admin_email, "$subject", $comment, "From:" . $email);
			*/

			//echo "Role je: " . $valueRole[2] . ".";

			

			//if (isset($_POST['active'])) { $active = "ano"; }
			//else { $active = "ne"; }
			
			//echo $active;

			if(!preg_match($reg_name, $valueName)) { // Projde string, zda se NEshoduje s podmínkami reg. výrazů
				$error_name = "Jméno obsahuje nepovolené znaky nebo není vyplněné.";
				$valueName  = "";
				$error = true;
			}

			if(!preg_match($reg_surname, $valueSurname)) { // Projde string, zda se NEshoduje s podmínkami reg. výrazů
				$error_surname = "Příjmení obsahuje nepovolené znaky nebo není vyplněné.";
				$valueSurname  = "";
				$error = true;
			}

			if(!preg_match($reg_email, $valueEmail)) { // Projde string, zda se NEshoduje s podmínkami reg. výrazů
				$error_email = "E-mail obsahuje nepovolené znaky nebo není vyplněný.";
				$valueEmail  = "";
				$error = true;
			}
			/*
			if(empty($valuePassword)) { 
				$error_password = "Zadejte prosím heslo.";
				$valuePassword  = "";
				$error = true;
			}
			*/			
			if (!empty($valueDate)) {
				$vek = dopocitejVek($valueDate);	// vypocitej vek
				if (zkontrolujVek($vek)) { 
					$error_date = "Datum není správně vyplněné, pravděpodobně špatný rok.";
					$valueDate  = "";
					$error = true;
				};
			}

			if(!preg_match($reg_phone, $valuePhone)) { // Projde string, zda se NEshoduje s podmínkami reg. výrazů
				$error_phone = "Telefon by měl být bez mezer. Napřklad ve tvaru: +420123456789 nebo 123456789.";
				$valuePhone  = "";
				$error = true;
			}



			// check that jmeno/prijmeni/email/telefon fields are both filled in

			if ($error!=true) {
				if ($valueName == '' || $valueSurname == '' || $valueEmail == '' || $valuePhone == '') {
					$messageError = 'CHYBA: Prosím vyplňte všechny povinná pole!';
					//echo "CHYBA: Prosím vyplňte všechny povinná pole!";

					renderForm($id, $valueName, $valueSurname, $valueEmail, $valueDate, $valuePhone, $valuePosition, $valueRole, $valueActive, $messageSuccess, $messageError, $error_name, $error_surname, $error_password, $error_email, $error_date, $error_phone, $error_position, $valuePositionPromo, $valuePositionArea, $valuePositionManag, $valuePositionReditel, $valuePositionMajitel, $valuePositionMdg, $valuePositionKlient, $valueActiveCheck, $valueRoleView, $valueRoleAddAction, $valueRoleEdit, $valueRoleDelete, $valuePriceType, $valuePrice, $valueRoleAddUser, $valueRoleAddUserMdg, $valueRoleAddCompanyForm, $valueRoleEditCompanyForm, $valueRoleEditUser, $valueRoleEditUserMdg, $valueRoleMdgView, $valueRoleMdgAddEvent, $valueRoleMdgEditEvent, $valueRoleMdgAddCompany, $valueRoleMdgEditCompany, $valueRoleMdgAddProduct, $valueRoleMdgEditProduct, $usersKoo, $valueStat);
				}

				else {

					$username	= makeUserName("$valueName",$valueSurname);
					$username 	= checkDuplicityUserName($username,$valueEmail);
					if ( !empty($valuePassword) ) {
						//echo "$valuePriceType";
						$sql = "UPDATE users SET jmeno='$valueName', cena_typ='$valuePriceType', cena_za_h='$userPrice', prijmeni='$valueSurname', email='$valueEmail', dat_nar='$valueDate', telefon='$valuePhone', pozice='$valuePosition', role ='$allRoles', aktivni='$valueActive', stat='$valueStat', heslo='$valuePassword', uziv_jm='$username' WHERE id_user='$id'";
						//echo "neni empty";
					}
					else {
						$sql = "UPDATE users SET jmeno='$valueName', sef='$usersKoo', cena_typ='$valuePriceType', cena_za_h='$userPrice', prijmeni='$valueSurname', email='$valueEmail', dat_nar='$valueDate', telefon='$valuePhone', pozice='$valuePosition', role ='$allRoles', aktivni='$valueActive', stat='$valueStat', uziv_jm='$username' WHERE id_user='$id'";
					}

					//echo $valuePassword;

					//$sql = "UPDATE users SET jmeno='$valueName', prijmeni='$valueSurname', email='$valueEmail', dat_nar='$valueDate', telefon='$valuePhone', pozice='$valuePosition', role ='$allRoles', aktivni='$valueActive' WHERE id_user='$id'";

					
					$conn = dbConnect();
					mysqli_query($conn, "SET NAMES utf8");
					if (mysqli_query($conn, $sql)) {	
						$messageSuccess = "Uživatel úspěšně upraven.";
						//echo "Uživatel úspěšně upraven.";
						renderForm($id, $valueName, $valueSurname, $valueEmail, $valueDate, $valuePhone, $valuePosition, $valueRole, $valueActive, $messageSuccess, $messageError, $error_name, $error_surname, $error_password, $error_email, $error_date, $error_phone, $error_position, $valuePositionPromo, $valuePositionArea, $valuePositionManag, $valuePositionReditel, $valuePositionMajitel, $valuePositionMdg, $valuePositionKlient, $valueActiveCheck, $valueRoleView, $valueRoleAddAction, $valueRoleEdit, $valueRoleDelete, $valuePriceType, $valuePrice, $valueRoleAddUser, $valueRoleAddUserMdg, $valueRoleAddCompanyForm, $valueRoleEditCompanyForm, $valueRoleEditUser, $valueRoleEditUserMdg, $valueRoleMdgView, $valueRoleMdgAddEvent, $valueRoleMdgEditEvent, $valueRoleMdgAddCompany, $valueRoleMdgEditCompany, $valueRoleMdgAddProduct, $valueRoleMdgEditProduct, $usersKoo, $valueStat);
					}
					//mysql_query("UPDATE users SET jmeno='$valueName', prijmeni='$valueSurname', email='$valueEmail', dat_nar='$valueDate', telefon='$valuePhone', pozice='$valuePosition', role ='$valueRole', prijmeni='$valueActive' WHERE id_user='$id'")

					//or die(mysql_error());

					else {
						//echo "Chyba!";
						$messageError = "Nepovedlo se změnit údaje v databázi.";
						renderForm($id, $valueName, $valueSurname, $valueEmail, $valueDate, $valuePhone, $valuePosition, $valueRole, $valueActive, $messageSuccess, $messageError, $error_name, $error_surname, $error_password, $error_email, $error_date, $error_phone, $error_position, $valuePositionPromo, $valuePositionArea, $valuePositionManag, $valuePositionReditel, $valuePositionMajitel, $valuePositionMdg, $valuePositionKlient, $valueActiveCheck, $valueRoleView, $valueRoleAddAction, $valueRoleEdit, $valueRoleDelete, $valuePriceType, $valuePrice, $valueRoleAddUser, $valueRoleAddUserMdg, $valueRoleAddCompanyForm, $valueRoleEditCompanyForm, $valueRoleEditUser, $valueRoleEditUserMdg, $valueRoleMdgView, $valueRoleMdgAddEvent, $valueRoleMdgEditEvent, $valueRoleMdgAddCompany, $valueRoleMdgEditCompany, $valueRoleMdgAddProduct, $valueRoleMdgEditProduct, $usersKoo, $valueStat);
						
					}

					dbClose($conn); // Odpojíme se z DB

					//header("Location: user-view.php");

				}
			}
			else {
				$messageError = 'CHYBA: Prosím vyplňte všechny povinná pole!';
				renderForm($id, $valueName, $valueSurname, $valueEmail, $valueDate, $valuePhone, $valuePosition, $valueRole, $valueActive, $messageSuccess, $messageError, $error_name, $error_surname, $error_password, $error_email, $error_date, $error_phone, $error_position, $valuePositionPromo, $valuePositionArea, $valuePositionManag, $valuePositionReditel, $valuePositionMajitel, $valuePositionMdg, $valuePositionKlient, $valueActiveCheck, $valueRoleView, $valueRoleAddAction, $valueRoleEdit, $valueRoleDelete, $valuePriceType, $valuePrice, $valueRoleAddUser, $valueRoleAddUserMdg, $valueRoleAddCompanyForm, $valueRoleEditCompanyForm, $valueRoleEditUser, $valueRoleEditUserMdg, $valueRoleMdgView, $valueRoleMdgAddEvent, $valueRoleMdgEditEvent, $valueRoleMdgAddCompany, $valueRoleMdgEditCompany, $valueRoleMdgAddProduct, $valueRoleMdgEditProduct, $usersKoo, $valueStat);
			}

		}	
		

		else { // if the 'id' isn't valid, display an error
			//echo 'Error!';
			$messageError = "Nepovedlo se změnit údaje v databázi.";
			renderForm($id, $valueName, $valueSurname, $valueEmail, $valueDate, $valuePhone, $valuePosition, $valueRole, $valueActive, $messageSuccess, $messageError, $error_name, $error_surname, $error_password, $error_email, $error_date, $error_phone, $error_position, $valuePositionPromo, $valuePositionArea, $valuePositionManag, $valuePositionReditel, $valuePositionMajitel, $valuePositionMdg, $valuePositionKlient, $valueActiveCheck, $valueRoleView, $valueRoleAddAction, $valueRoleEdit, $valueRoleDelete, $valuePriceType, $valuePrice, $valueRoleAddUser, $valueRoleAddUserMdg, $valueRoleAddCompanyForm, $valueRoleEditCompanyForm, $valueRoleEditUser, $valueRoleEditUserMdg, $valueRoleMdgView, $valueRoleMdgAddEvent, $valueRoleMdgEditEvent, $valueRoleMdgAddCompany, $valueRoleMdgEditCompany, $valueRoleMdgAddProduct, $valueRoleMdgEditProduct, $usersKoo, $valueStat);
			
		}

	}

	else { // if the form hasn't been submitted, get the data from the db and display the form

		// get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

			//$valueRole 		= $_POST['role']; 	

		if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) { // query db

			$conn = dbConnect();
			$id = $_GET['id'];
			$sql = "SELECT * FROM users WHERE id_user=$id";
			mysqli_query($conn, "SET NAMES utf8");
			$result = mysqli_query($conn, $sql);

			//$row = mysql_fetch_array($result);

			// check that the 'id' matches up with a row in the databse

			if ( $row = mysqli_fetch_row($result) ) { // get data from db
				$valueName 		= $row[1];
				$valueSurname 	= $row[2];
				$valueEmail 	= $row[3];
				$valueDate 		= $row[4];
				$valuePhone 	= $row[5];
				$valueRole 		= $row[6];
				$valuePosition 	= $row[7];
				$valueActive	= $row[8];
				$valuePrice		= $row[11];
				$valuePriceType	= $row[12];
				$valueStat		= $row[14];
				$usersKoo		= $row[15];

				

				$messageError = "";
				//$insert = "Nepodařilo se upravit uživatele.";
				//echo "Nepodařilo se upravit uživatele.";
				//echo $valueActive;
				//echo $valueRole;
				//echo $valuePosition;
				//echo $valuePrice;
				//echo $valuePriceType;
				$position = $valuePosition;
				//$allRoles = implode(",",$valueRole);
				
				if ($valueActive == "ano") { $active = "ano"; ; $valueActiveCheck = "checked=\"checked\"";}
				else { $active = "ne"; $valueActive = "ne"; $valueActiveCheck =""; }



				/*************************************************
				                  DEFAULT CHECKBOX
				 *************************************************/

				if ($position =="Promotér") {
					$valuePositionPromo = "selected=\"selected\"";
				}
				else if ($position =="Koordinátor") {
					$valuePositionArea = "selected=\"selected\"";
				}
				else if ($position =="Ostatní") {
					$valuePositionManag = "selected=\"selected\"";
				}
				else if ($position =="Ředitel") {
					$valuePositionReditel = "selected=\"selected\"";
				}
				else if ($position =="Merchandiser") {
					$valuePositionMdg = "selected=\"selected\"";
				}
				else if ($position =="Klient") {
					$valuePositionKlient = "selected=\"selected\"";
				}
				else {
					$valuePositionMajitel = "selected=\"selected\"";
				}


				/*************************************************
				                  DEFAULT SELECT
				 *************************************************/

				$valueRoleView = "";
				$role = explode(",", $valueRole);
				for ($j=0; $j < sizeof($role); $j++) { 
					//echo $role[$j];
					switch ($role[$j]) {
						case 'nahled-akci':
							$valueRoleView = "checked=\"checked\"";
							break;
						case 'pridani-akci':
							$valueRoleAddAction = "checked=\"checked\"";
							break;
						case 'editace-akci':
							$valueRoleEdit = "checked=\"checked\"";
							break;
						case 'pridani-firem-formularu':
							$valueRoleAddCompanyForm = "checked=\"checked\"";
							break;
						case 'editace-firem-formularu':
							$valueRoleEditCompanyForm = "checked=\"checked\"";
							break;
						case 'pridani-uzivatelu':
							$valueRoleAddUser = "checked=\"checked\"";
							break;
						case 'editace-uzivatelu':
							$valueRoleEditUser = "checked=\"checked\"";
							break;
						case 'mdg-pristup':
							$valueRoleMdgView = "checked=\"checked\"";
							break;
						case 'mdg-pridani-udalosti':
							$valueRoleMdgAddEvent = "checked=\"checked\"";
							break;
						case 'mdg-editace-udalosti':
							$valueRoleMdgEditEvent = "checked=\"checked\"";
							break;
						case 'mdg-pridani-obchodu':
							$valueRoleMdgAddCompany = "checked=\"checked\"";
							break;
						case 'mdg-editace-pridani-obchodu':
							$valueRoleMdgEditCompany = "checked=\"checked\"";
							break;
						case 'mdg-pridani-uzivatelu':
							$valueRoleAddUserMdg = "checked=\"checked\"";
							break;
						case 'mdg-editace-uzivatelu':
							$valueRoleEditUserMdg = "checked=\"checked\"";
							break;
						case 'mdg-pridani-produktu':
							$valueRoleMdgAddProduct = "checked=\"checked\"";
							break;
						case 'mdg-editace-produktu':
							$valueRoleMdgEditProduct = "checked=\"checked\"";
							break;
						default:
							# code...
							break;
					}
				}

				// show form

				renderForm($id, $valueName, $valueSurname, $valueEmail, $valueDate, $valuePhone, $valuePosition, $valueRole, $valueActive, $messageSuccess, $messageError, $error_name, $error_surname, $error_password, $error_email, $error_date, $error_phone, $error_position, $valuePositionPromo, $valuePositionArea, $valuePositionManag, $valuePositionReditel, $valuePositionMajitel, $valuePositionMdg, $valuePositionKlient, $valueActiveCheck, $valueRoleView, $valueRoleAddAction, $valueRoleEdit, $valueRoleDelete, $valuePriceType, $valuePrice, $valueRoleAddUser, $valueRoleAddUserMdg, $valueRoleAddCompanyForm, $valueRoleEditCompanyForm, $valueRoleEditUser, $valueRoleEditUserMdg, $valueRoleMdgView, $valueRoleMdgAddEvent, $valueRoleMdgEditEvent, $valueRoleMdgAddCompany, $valueRoleMdgEditCompany, $valueRoleMdgAddProduct, $valueRoleMdgEditProduct, $usersKoo, $valueStat);

			}

			else { // if no match, display result
				//echo "No results!";
			}

		}

		else { // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
			//echo 'Error!';
			$messageError = "Nepovedlo se změnit údaje v databázi.";
			renderForm($id, $valueName, $valueSurname, $valueEmail, $valueDate, $valuePhone, $valuePosition, $valueRole, $valueActive, $messageSuccess, $messageError, $error_name, $error_surname, $error_password, $error_email, $error_date, $error_phone, $error_position, $valuePositionPromo, $valuePositionArea, $valuePositionManag, $valuePositionReditel, $valuePositionMajitel, $valuePositionMdg, $valuePositionKlient, $valueActiveCheck, $valueRoleView, $valueRoleAddAction, $valueRoleEdit, $valueRoleDelete, $valuePriceType, $valuePrice, $valueRoleAddUser, $valueRoleAddUserMdg, $valueRoleAddCompanyForm, $valueRoleEditCompanyForm, $valueRoleEditUser, $valueRoleEditUserMdg, $valueRoleMdgView, $valueRoleMdgAddEvent, $valueRoleMdgEditEvent, $valueRoleMdgAddCompany, $valueRoleMdgEditCompany, $valueRoleMdgAddProduct, $valueRoleMdgEditProduct, $usersKoo, $valueStat);
		}

	}	
	//dbClose($conn);
?>