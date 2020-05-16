<?php 

	session_start(); // Spouští globální proměnné, abychom mohli využívát proměnné mezi stránkami
	$error = false;

	//echo "chyba -2 <br>";
	if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {  // Pokud se zmáčkne tlačítko POST, udělej funkci
			//echo "chyba -1 <br>";
		if ( isset($_POST['username']) &&  // prázné políčko taky vezme isset, pro tuto kontrolu bychom musel použít empty
 			 isset($_POST['heslo']) ) {
			//echo "chyba 0 <br>";
			$valueUsername = $username = $_POST['username'];
			$password = md5($_POST['heslo']);
			$response = $_POST["g-recaptcha-response"];
			$ip_address = $browser = $country = $city = $login = $error_username = $error_heslo = $error_captcha = "";
			$success = "ne";

			$url = 'https://www.google.com/recaptcha/api/siteverify';
			$data = array(
					'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                    "Content-Length: ".strlen($response)."\r\n".
                    "User-Agent:MyAgent/1.0\r\n",
				'secret' => '6Le933MUAAAAALHRmJA5uDWWnw0FxGkK9C7W39Y8',
				'response' => $response
			);

			$options = array(
				'http' => array (
					'header' => "Content-type: application/x-www-form-urlencoded\r\n",
					'method' => 'POST',
					'content' => http_build_query($data)
				)
			);

			if (!empty($response)) {
				$context  = stream_context_create($options);
				$verify = file_get_contents($url, false, $context);
				$captcha_success=json_decode($verify);

				if ($captcha_success->success==false) {
					$error_captcha = "Ochrana proti robotům neproběhla správně. ";
					$valueCaptcha  = "";
					$error = true;
				}
			}
			else {
				//echo "repsonse je empty<br>";
				$error_captcha = "Ochrana proti robotům neproběhla správně. ";
				$valueCaptcha  = "";
				$error = true;
			}

			//echo "IP: ".$_SERVER['HTTP_CLIENT_IP'];

			//whether ip is from share internet
			if (!empty($_SERVER['HTTP_CLIENT_IP']))   
			  {
			    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
			  }
			//whether ip is from proxy
			elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
			  {
			    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
			  }
			//whether ip is from remote address
			else
			  {
			    $ip_address = $_SERVER['REMOTE_ADDR'];
			  }

			$browser = $_SERVER['HTTP_USER_AGENT'];

			$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ip_address"));
			$country = $geo["geoplugin_countryName"];
			$city = $geo["geoplugin_city"];
			
			//echo "$ip_address <br> $browser <br> $country <br> $city";

			$conn = dbConnect();
			mysqli_query($conn, "SET NAMES utf8");

			$sqlUsername = "SELECT jmeno, prijmeni, uziv_jm, aktivni, id_user, cena_za_h, role, pozice, stat FROM users WHERE uziv_jm='$username' AND heslo='$password'";
			$data = mysqli_query($conn, $sqlUsername);
			$row = mysqli_fetch_row($data);

			if(strlen($username)==0) { // Projde string, zda se NEshoduje s podmínkami reg. výrazů
				$error_username = "Uživatelské jméno není vyplněné";
				$valueUsername  = "";
				$error = true;
			}

			//if(strlen($password)==0) { // Projde string, zda se NEshoduje s podmínkami reg. výrazů
			if(empty($_POST['heslo'])) { // Projde string, zda se NEshoduje s podmínkami reg. výrazů
				$error_heslo = "Heslo nebylo vyplněno. ";
				$valueHeslo  = "";
				$error = true;
			}

			$datum = date("Y-m-d H:i:s");
			$error_session = "$error_username$error_heslo$error_captcha";
			
			if ( $error == false ) {
				//echo "chyba 1 <br>";
				if( $data ) {
					if($row!=NULL) {
						$permArrayCrmAccess = array("mdg-pristup");
						$_SESSION['aktivni']   	= $row[3];
						if($_SESSION['aktivni']=="ne") { // Projde string, zda se NEshoduje s podmínkami reg. výrazů
							echo $_SESSION['aktivni'];
							$login = "Váš účet byl zablokován.";
							session_destroy();
							dbClose($conn);	
						}
						else {
							$_SESSION['prihlasen'] 	= 1; 
							$_SESSION['jmeno'] 	   	= $row[0]; 
							$_SESSION['prijmeni']  	= $row[1];
							$_SESSION['uziv_jm']   	= $row[2];
							$_SESSION['id_user']   	= $row[4];
							$_SESSION['cena_za_h']  = $row[5];
							$_SESSION['role'] = explode(",", $row[6]); // Dám si do pole výpis oprávnění
							$_SESSION['pozice']   	= $row[7];
							$_SESSION['stat']   	= $row[8];


							$permStatusCrm = checkPerm($permArrayCrmAccess);

							if ($permStatusCrm == false) {
								$login = "Nemáte oprávnění pro vstup do MERCHANDISING systému.";
								session_destroy();
								dbClose($conn);	
							}

							else {
								// Sem vlozim jeste vkladani sessions do DB
								$success = "ano";
								header('location: homepage.php'); // Přesměrování
							}
						}
					}
					else {
						//echo "Nesprávné přihlašovací údaje<br>";
						$login = "Nesprávné přihlašovací údaje";
					}
				}

			}
			//dbClose($conn);	
			$error_session .= $login;
			//echo "$ip_address <br> $browser <br> $country <br> $city";
			$system = "MERCHANDISING";

			$sql = "INSERT INTO session_login(uziv_jm, system, datum, success, error, ip, browser, country, city) VALUES('$username', '$system', '$datum', '$success', '$error_session', '$ip_address', '$browser', '$country', '$city')";
			if (mysqli_query($conn, $sql)) {
				//$messageSuccess = "Zapsán pokus o přihlášení.";
				//echo "$sql<br>";
			}
		}
	}
	
	// Odhlášení
	if(isset($_GET['odhlasit'])) {
		session_destroy();
		//dbClose($conn);	
		header('location: index.php');
	}
	
?>