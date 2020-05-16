<?php
//<meta charset=\"utf-8\">
ob_start();
echo "<head>
	<meta http-equiv=\"content-type\" content=\"application/vnd.ms-excel; charset=UTF-8\">
	<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
	<meta name=\"description\" content=\""; if (isset($description)) { echo $description; } else { echo "Poskytujeme profesionální partnerství farmaceutickým i kosmetickým společnostem působícím v České a Slovenské republice. Nabízíme služby v oblasti podpory povědomí a prodeje farmaceutických i kosmetických produktů v lékárnách a zdravotnických zařízeních."; } echo "\">
	<meta name=\"author\" content=\"Lukáš Málek\"> <!-- Jméno autora, které se zobrazí pouze ve zdrojovém kódu. -->
	<meta name=\"copyright\" content=\"MEDICAL & PHARMA PROMOTION, s.r.o.\"> <!-- Autorské práva dané osoby nebo společnosti -->
	<meta name=\"viewport\" content=\"width=device-width, inicial-scale=1.0\"> <!-- Správné zobrazení pro mobilní zařízení -->
	<meta name=\"robots\" content=\"noindex,nofollow\">
	<title>"; if (isset($pageTitle)) { echo $pageTitle . " | Merchandising MPP";} else { echo "Merchandising | MPPromotion"; } echo "</title>
	<link rel=\"stylesheet\" href=\"$crm_link/css/normalize.css\">
	<link rel=\"stylesheet\" href=\"css/font-awesome.min.css\">
	<link rel=\"stylesheet\" href=\"$crm_link/css/style.css\"> 
	<link rel=\"stylesheet\" href=\"$crm_link/css/header.css\"> 
	<link rel=\"stylesheet\" href=\"$crm_link/css/content.css\"> 
	<link rel=\"stylesheet\" href=\"css/mdg.css\"> 
	<link rel=\"stylesheet\" href=\"$crm_link/css/default.css\" type=\"text/css\">";
	if($_SERVER['HTTP_HOST'] != 'mdg.mppromotion.cz'){ echo "<link rel=\"stylesheet\" href=\"css/localhost.css\" type=\"text/css\">"; }
echo "</head>";?>

