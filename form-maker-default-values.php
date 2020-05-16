<?php 

$counterProducts  = 0;
$counterQuestions = 0;
$nazevFormulare   = "";
$required 		  = "";
$odpoved 		  = "Nápověda pro promotérky";	// Při vytváření formuláře koordinatorkou
//$odpoved 		  = "Odpověď";					// Při vyplňování formuláře promotérkou


//$required = "required=\"required\"";
if (isset($_POST['nazev'])) {
	$name 	= 	$_POST['nazev'];
}
else {
	$name 	= "";
}


for ($i=1; $i <= 20; $i++) { // Nadefinuji všechny proměnné v produktech

	//$placeholderQuestionTemp 	= "placeholderQuestion".$i;
	//$placeholderAnswerTemp 		= "placeholderAnswer".$i;
	//$promoAnswerTemp 			= "promoAnswer".$i;
	$allProductTemp 			= "allProduct".$i;
	$productTemp 				= "product".$i;
	$produktTemp 				= "\$_POST['produkt-".$i."']";
	$allGiftTemp 				= "allGift".$i;
	$giftTemp 					= "gift".$i;
	$darekTemp 					= "\$_POST['darek-".$i."']";
	//$questionStaticTemp 		= "questionStatic".$i;
	//$promoHiddenTemp 			= "promoHidden".$i;

	//${$placeholderQuestionTemp} = "Volitelná Otázka.";
	//${$placeholderAnswerTemp} 	= "Volitelná Nápověda.";
	//${$promoAnswerTemp} 		= "";
	${$allProductTemp} 			= "";
	${$productTemp}				= $produktTemp;
	${$allGiftTemp} 			= "";
	${$giftTemp}				= $darekTemp;
	//${$questionStaticTemp}		= ""; 	
	//${$promoHiddenTemp}			= ""; 	

	for ($j=0; $j < 6; $j++) { 
		//$productTemp = "product".$i;
		switch ($j) {
			case '0':
				$prodNazevTemp = "valueP".$i."Nazev";
				${$prodNazevTemp} = "";
				$darNazevTemp = "valueD".$i."Nazev";
				${$darNazevTemp} = "";
				break;
			case '1':
				$prodCenaTemp = "valueP".$i."Cena";
				${$prodCenaTemp} = "";
				break;
			case '2':
				$prodCenaVocTemp = "valueP".$i."CenaVoc";
				${$prodCenaVocTemp} = "";
				break;
			case '3':
				$prodPocTemp = "valueP".$i."Pocatek";
				${$prodPocTemp} = "";
				break;
			case '4':
				$prodKonecTemp = "valueP".$i."Konec";
				${$prodKonecTemp} = "";
				break;
			case '5':
				$prodKusuTemp = "valueP".$i."Kusu";
				${$prodKusuTemp} = "";
				$darKusuTemp = "valueD".$i."Kusu";
				${$darKusuTemp} = "";
				break;
			default:
				$error = false;
				$messageError = "Neprovedla se funkce zapisující výchozí proměnné do formuláře.";
				break;
		}
	}
}


for ($i=1; $i <= 15; $i++) { // Nadefinuji všechny proměnné v otázkách

	$placeholderQuestionTemp 	= "placeholderQuestion".$i;
	$placeholderAnswerTemp 		= "placeholderAnswer".$i;
	$promoAnswerTemp 			= "promoAnswer".$i;
	//$allProductTemp 			= "allProduct".$i;
	//$productTemp 				= "product".$i;
	//$produktTemp 				= "\$_POST['produkt-".$i."']";
	$questionStaticTemp 		= "questionStatic".$i;
	$promoHiddenTemp 			= "promoHidden".$i;
	$promoQuestionTemp			= "promoQuestion".$i;

	${$placeholderQuestionTemp} = "Volitelná otázka.";
	${$placeholderAnswerTemp} 	= "Volitelná nápověda.";
	${$promoAnswerTemp} 		= "";
	//${$allProductTemp} 			= "";
	//${$productTemp}				= $produktTemp;
	${$questionStaticTemp}		= ""; 	
	${$promoHiddenTemp}			= ""; 	
	${$promoQuestionTemp}		= ""; 	

	/*for ($j=0; $j < 5; $j++) { 
		//$productTemp = "product".$i;
		switch ($j) {
			case '0':
				$prodNazevTemp = "valueP".$i."Nazev";
				${$prodNazevTemp} = "";
				break;
			case '1':
				$prodCenaTemp = "valueP".$i."Cena";
				${$prodCenaTemp} = "";
				break;
			case '2':
				$prodPocTemp = "valueP".$i."Pocatek";
				${$prodPocTemp} = "";
				break;
			case '3':
				$prodKonecTemp = "valueP".$i."Konec";
				${$prodKonecTemp} = "";
				break;
			case '4':
				$prodKusuTemp = "valueP".$i."Kusu";
				${$prodKusuTemp} = "";
				break;
			default:
				$error = false;
				$messageError = "Neprovedla se funkce zapisující výchozí proměnné do formuláře.";
				break;
		}
	}*/
}

//$promoQuestion1 		= "Je v lékárně dostatek zboží? Jestliže ne, vypište konkrétně, co chybí.";
//$promoQuestion2 		= "Byl nějaký produkt během promo dne vyprodán? Čas vyprodání, název produktu.";
//$promoQuestion3 		= "Jestliže produkt chyběl, byl během dne dodán?";
//$promoQuestion4 		= "Byla v den promo akce, jiná akční nabídka konkurence?";
//$promoQuestion5 		= "Byl pro zákazníka dárek motivací ke koupi?";
//$promoQuestion6 		= "Jaké konkurenční produkty zákazník používá?";
//$promoQuestion7 		= "Byla provedena kontrola?";
//$promoQuestion8 		= "Proč byla dnešní akce úspěšná / neúspěšná?";
//$promoQuestion9 		= "Jak vnímal zákazník dnešní akci/ dárek?";
//$promoQuestion10 		= "Jaká byla spolupráce s lékárnou?";
//$promoQuestion11 		= "";
//$promoQuestion12 		= "";
//$promoQuestion13 		= "";
//$promoQuestion14 		= "";
//$promoQuestion15 		= "";

$promoQuestion1 		= "Bylo na začátku akce dostatek promovaného zboží?";
$promoQuestion2 		= "Pokud něco z promovaného chybělo, co konkrétně? Vypište!";
$promoQuestion3 		= "Vyprodala jste během akce nějaký promovaný produkt? Pokud ano, vypiš jaký? Čas?";
$promoQuestion4 		= "Byla v den akce, jiná akční nabídka od konkurence? Jaká?";
$promoQuestion5 		= "Jaké konkurenční produkty zákazník používá?";
$promoQuestion6 		= "Jak reagovali na ochutnávku? (pokud byla)";
$promoQuestion7 		= "Splnila jste stanovený cíl? ANO/NE,PROČ?";
$promoQuestion8 		= "Proč si myslíte, že byl /nebyl dárek pro zákazníka motivační?";
$promoQuestion9 		= "Proč si myslíte, že se dnešní akce zákazníkovi líbila/nelíbila?";
$promoQuestion10 		= "Co by se mohlo zlepšit, aby byla akce příště ještě lepší?";
//$promoQuestion11 		= "";
//$promoQuestion12 		= "";
//$promoQuestion13 		= "";
//$promoQuestion14 		= "";
//$promoQuestion15 		= "";

$placeholderAnswer1 	= "ANO / NE";
$placeholderAnswer2 	= "Pokud ne, nevyplňujte";
$placeholderAnswer3 	= "ANO / NE, pokud ano, napište jaké.";
$placeholderAnswer4 	= "ANO / NE, pokud ano, napište jaká.";
$placeholderAnswer5 	= "Pokud nebyla konkurence, nevyplňujte.";
$placeholderAnswer6 	= "Reakce oslovených na ochutnávky.";
$placeholderAnswer7 	= "ANO / NE, důvod.";
$placeholderAnswer8 	= "Rozepiště se alespoň na pár vět.";
$placeholderAnswer9 	= "Rozepiště se alespoň na pár vět.";
$placeholderAnswer10	= "Rozepiště se alespoň na několik vět.";
//$placeholderAnswer11	= "";
//$placeholderAnswer12	= "";
//$placeholderAnswer13	= "";
//$placeholderAnswer14	= "";
//$placeholderAnswer15	= "";


 ?>
			