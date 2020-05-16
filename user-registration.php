<?php 

	$error         = false;
	$valueName     = "";
	$valueSurname  = "";
	$valueDate     = "";
	$valueEmail    = "";
	$valuePhone    = "";
	$valueRole     = "";
	$valuePosition = "";
	$valuePhoto    = "";
	$valuePassword = "";
	$valuePriceType = "";
	$valueStat  	= "";
	$valuePrice = "0";
	$valuePositionPromo		="";
	$valuePositionArea		="";
	$valuePositionMdg		="";
	$valuePositionKlient	="";
	$valuePositionMajitel	="";
	$valuePositionManag		="";
	$valuePositionReditel	="";
	$valuePositionMajitel	="";
	$valueActiveCheck 		="checked=\"checked\"";
	$valueRoleView			="";
	$valueRoleAddAction		="";
	$valueRoleAddCompanyForm ="";
	$valueRoleEdit			="";
	$valueRoleEditCompanyForm ="";
	$valueRoleDelete		="";
	$valueRoleAddUser		="";
	$valueRoleEditUser		="";
	$valueRoleAddUserMdg		="";
	$valueRoleEditUserMdg		="";
	$valueRoleMdgView		="checked=\"checked\"";
	$valueRoleMdgAddEvent		="";
	$valueRoleMdgEditEvent		="";
	$valueRoleMdgAddCompany		="";
	$valueRoleMdgEditCompany		="";
	$valueRoleMdgAddProduct		="";
	$valueRoleMdgEditProduct		="";

	if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {  // Pokud se zmáčkne tlačítko POST, udělej funkci
		if ( isset($_POST['name']) &&  // prázné políčko taky vezme isset, pro tuto kontrolu bychom musel použít empty
			 isset($_POST['surname']) && 
			 isset($_POST['password']) &&
			 isset($_POST['email']) && 
			 isset($_POST['date']) && 
			 isset($_POST['phone']) && 
			 isset($_POST['user-type-price']) && 
			 isset($_POST['role'])&& 
			 isset($_POST['position'])
			 //isset($_POST['fileToUpload']) 
			 ) { // Pokud jsou vyplněna všechny pole, udělej funkci

			$error 		= false;
			$name 		= $_POST['name'];   // Uložíme si hodnoty do vlastních proměnných
			$surname 	= $_POST['surname'];
			$date 		= $_POST['date'];
			//echo "$date";
			$email 		= $_POST['email'];
			$phone 		= $_POST['phone'];
			$userTypePrice = $_POST['user-type-price'];
			//$role 	= $_POST['role'];
			if (isset($_POST['role'])) {
				$valueRole 		= $_POST['role'];
			}
			else {
				$valueRole= array("bez","prav");
			}
			if (isset($_POST['stat'])) {
				$stat 			= $_POST['stat']; 
				$valueStat 		= $stat;
			}
			else {
				$stat = $valueStat = "cz";
			}
			if (isset($_POST['user-price'])) { $userPrice = $_POST['user-price']; }
			else { $userPrice = "0"; }
			if (isset($_POST['users-koo'])) { (int)$usersKoo = (int)$userBoss = $_POST['users-koo']; }
			else { (int)$usersKoo = (int)$userBoss = "1"; }
			$position = $_POST['position'];
			if (isset($_POST['position'])) { $position = $_POST['position']; }
			else { $position = "NULL"; }
			//$photo = $_POST['photo'];
			$password 	= $_POST['password'];
			//$password 	= md5($_POST['password']);

			$valueName     = $name;
			$valueSurname  = $surname;
			$valueDate     = $date;
			$valueEmail    = $email;
			$valuePhone    = $phone;
			//$valueRole     = $role;
			$valuePosition = $position;
			$valuePassword = $password;
			$valuePriceType = $userTypePrice;
			$valuePrice 	= $userPrice;
			$allRoles = implode(",",$valueRole);
			if (isset($_POST['active'])) { $active = "ano"; $valueActive = "ano"; $valueActiveCheck = "checked=\"checked\"";}
			else { $active = "ne"; $valueActive = "ne"; $valueActiveCheck =""; }
			
			//$error = checkForm();

			//echo $error;

			$reg_name     = "#^[A-Za-zěščřžýáíéúůťňďĚŠČŘŽÝÁÍÉÚŮĎŤŇ][[A-Za-zěščřžýáíéúůťňďĚŠČŘŽÝÁÍÉÚŮĎŤŇ ]*[A-Za-zěščřžýáíéúůťňďĚŠČŘŽÝÁÍÉÚŮĎŤŇ]$#";  // Jméno včetně diakritiky
			$reg_surname  = "#^[A-Za-zěščřžýáíéúůťňďĚŠČŘŽÝÁÍÉÚŮĎŤŇ][[A-Za-zěščřžýáíéúůťňďĚŠČŘŽÝÁÍÉÚŮĎŤŇ ]*[A-Za-zěščřžýáíéúůťňďĚŠČŘŽÝÁÍÉÚŮĎŤŇ]$#";  // Přijmení včetně diakritiky
			$reg_email    = "#^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$#";
			//$reg_date     = "#^(0?[1-9]|[12][0-9]|3[01]).(0?[1-9]|1[012]).[0-9]{4}$#";
			$reg_phone    = "#^[0-9+][0-9]*$#";

			$allRoles = implode(",",$valueRole);

			/*************************************************
			                  DEFAULT CHECKBOX
			 *************************************************/

			if ($position =="Promoterka") {
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

			//$allRoles = implode(",",$valueRole);

			//if (isset($_POST['active'])) { $active = "ano"; }
			//else { $active = "ne"; }
			
			//echo $active;

			if(!preg_match($reg_name, $name)) { // Projde string, zda se NEshoduje s podmínkami reg. výrazů
				$error_name = "Jméno obsahuje nepovolené znaky nebo není vyplněné.";
				$valueName  = "";
				$error = true;
			}

			if(!preg_match($reg_surname, $surname)) { // Projde string, zda se NEshoduje s podmínkami reg. výrazů
				$error_surname = "Příjmení obsahuje nepovolené znaky nebo není vyplněné.";
				$valueSurname  = "";
				$error = true;
			}

			if(!preg_match($reg_email, $email)) { // Projde string, zda se NEshoduje s podmínkami reg. výrazů
				$error_email = "E-mail obsahuje nepovolené znaky nebo není vyplněný.";
				$valueEmail  = "";
				$error = true;
			}

			if(empty($valuePassword)) { 
				$error_password = "Zadejte prosím heslo.";
				$valuePassword  = "";
				$error = true;
			}

			if (!empty($valueDate)) {
				$vek = dopocitejVek($valueDate);	// vypocitej vek
				if (zkontrolujVek($vek)) { 
					$error_date = "Datum není správně vyplněné, pravděpodobně špatný rok.";
					$valueDate  = "";
					$error = true;
				};
			}



			if(!preg_match($reg_phone, $phone)) { // Projde string, zda se NEshoduje s podmínkami reg. výrazů
				$error_phone = "Telefon by měl být bez mezer. Napřklad ve tvaru: +420123456789 nebo 123456789.";
				$valuePhone  = "";
				$error = true;
			}
			/*
			if(!empty($_POST['fileToUpload'])){
				echo "je tam file !";
				$errors= array();
				$file_name = $_FILES['fileToUpload']['name'];
				$file_size = $_FILES['fileToUpload']['size'];
				$file_tmp = $_FILES['fileToUpload']['tmp_name'];
				$file_type = $_FILES['fileToUpload']['type'];
				$file_ext = strtolower(end(explode('.',$_FILES['fileToUpload']['name'])));

				$expensions= array("jpeg","jpg","png");

				if(in_array($file_ext,$expensions)=== false){
					$errors[]="extension not allowed, please choose a JPEG or PNG file.";
					echo "extension not allowed, please choose a JPEG or PNG file.";
				}

				if($file_size > 2097152){
					$errors[]='File size must be excately 2 MB';
					echo "File size must be excately 2 MB";
				}

				if(empty($errors)==true){
					move_uploaded_file($file_tmp,"images/".$file_name);
					echo "Success";
				}
				else {
					print_r($errors);
				}
			}
			*/

			//echo "<p>Výpis proměnných pro kontrolu:<br>$name<br>$surname<br>$date<br>$email<br>$phone<br>$allRoles<br>$active<br>$position<br>$password<br>$valuePrice<br>$valuePriceType<br>$userBoss</p>"; // Výpis formulářových polí jako kontrola


			if ( $error == false ) {
				$conn = dbConnect(); // Připojíme se k databázi
				mysqli_query($conn, "SET NAMES utf8");

				//Kontrola, zda není uživatel v databázi
				$sql  = "SELECT email FROM users WHERE email='$email'";
				//$data = mysqli_query($conn, $sql);
				if ( $data = mysqli_query($conn, $sql) ) {
					$row  = mysqli_fetch_row($data);

					// ZAKOMENTOVAT - řeší duplicitní uživatele
					//$row = NULL;
					// ZAKOMENTOVAT - řeší duplicitní uživatele



					if ($row != NULL) {
						$messageError = "Nelze registrovat, některý uživatel je již zaregistrován pod tímto emailem.";
					}
					else {
						$password 	= md5($_POST['password']);
						$username	= makeUserName("$name",$surname);
						$username 	= checkDuplicityUserName($username,$email);

						$sql = "INSERT INTO users(jmeno, prijmeni, dat_nar, email, telefon, role, aktivni, pozice, foto, heslo, cena_za_h, cena_typ, uziv_jm, sef, stat) VALUES('$name', '$surname', '$date', '$email', '$phone', '$allRoles', '$active', '$position', 'NULL', '$password', '$valuePrice', '$valuePriceType', '$username', '$userBoss', '$valueStat')";
						if (mysqli_query($conn, $sql)) {
							
							$messageSuccess = "Uživatel zaregistrován, nyní můžete přidat dalšího.";

						}
						else {
							$messageError = "Nepodařilo se zaregistrovat uživatele.";

							mysqli_query($conn, $sql);
							$row  = mysqli_fetch_row($data);
							$messageError = $row;
						}
					}
					$valueName      = "";
					$valueSurname   = "";
					$valueDate      = "";
					$valueEmail     = "";
					$valuePassword  = "";
					$valuePhone 	= "";
					$valueStat 		= "";
					$valuePrice 	= "0";
					$password   	= generateRandomPassword();
					$valuePriceType = "dohoda";
					$valueActiveCheck = "checked=\"checked\"";
					dbClose($conn); // Odpojíme se z DB
				}
			
				else {
					$messageError = "chyba dotazu";
				}
			}
		}
	}

 ?>