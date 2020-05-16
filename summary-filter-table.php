
					<table id="summary">
						<thead>
							<tr>
								<?php echo $tableHeader; ?>
								
								<!--
								<th>Lékárna</th>
								<th>Ulice</th>
								<th>Obec</th>
								<th>Řetězec</th>
								<th>Datum akce</th>
								<th>Pracovní doba s pauzou</th>
								<th>Počet hodin bez pauzy</th>
								<th>Čas pauzy</th>
								<th>Promotérka</th>
								<th>Telefon promotérky</th>
								<th>Koordinátor</th>
								<th>Telefon koordinátora</th>
								<th>Minimum pro dosažení motivace</th>
								<th>Celková tržba</th>
								<th>Poznámky k akci</th>
								-->
							</tr>
							<tr>
								<?php echo $tableHeader2; ?>
							</tr>

						</thead>
						<tbody>
						<?php
				//for ($g=0; $g < 25; $g++) { 
				//	$row1 = mysqli_fetch_row($data1);
				//}

		$counterCykl = 0;
		while ( $row1 = mysqli_fetch_row($data1) ) {
			$counterCykl++;
			$row2 = mysqli_fetch_row($data2);
			//$rowProductPrice = mysqli_fetch_row($dataPrice);
			//$rowProduct = mysqli_fetch_row($dataProduct);
			//$rowGift = mysqli_fetch_row($dataGift);
			echo "
							<tr>";


			//echo "<br>";


			$cyklAdd 		= 1;
			$j 				= -1;
			for ($i=1; $i < (count($choose)+$cyklAdd) ; $i++) { 
			//for ($i=1; $i < 60 ; $i++) { 
				$j++;
				if (empty($choose[$j])) {
					break;
				}
				if ($counterCykl==1) {
					//echo "i = $i<br>";
					//echo "j = $j<br>";
					//if (!empty($choose[$j])) 	{ echo "choose: $choose[$j]<br>"; }
					//if (!empty($row1[$i])) 		{ echo "row: $row1[$i]<br><br>"; }
					
				}

				switch ($choose[$j]) {
					case 'edit':
						echo '
							<td class="center"><a href="event-edit.php?id=' . $row1[$i] . 	'">hlavicka </a><a href="event-revision.php?id=' . $row1[$i] . '">zkontrolovat </a>';
						if ($row1[0]=="ne") {echo '<a href="event-fill.php?id=' . $row1[$i] . '">splnit </a>'; }
						echo '<a href="event-show.php?id=' . $row1[$i] . '">zobrazit</a></td>';
														
						break;

					case 'koo':
						echo "
							<td>".$row2[0]."</td>";
						//$cyklAdd++;
						$i--;
						break;
					case 'koo-tel':
						echo "
							<td>".$row2[1]."</td>";
						//$cyklAdd++;
						$i--;
						break;
					case 'odeslano':
						echo "
								<td>".date("d.m.Y H:i", strtotime($row1[$i]))."</td>";
						break;
					case 'vdl':
						echo "
								<td class=\"center\">".$row1[$i]."</td>";
						break;
					case 'id-gs':
						if (!empty($row1[$i])) { echo "
							<td>".$row1[$i]."</td>";
						}
						else { echo "
							<td>&nbsp;</td>";
						}
						break;
					case 'sukl':
						if (!empty($row1[$i])) { echo "
							<td>".$row1[$i]."</td>";
						}
						else { echo "
							<td>&nbsp;</td>";
						}
						break;
					case 'skoleni':
						if (!empty($row1[$i])) { echo "
							<td>".$row1[$i]."</td>";
						}
						else { echo "
							<td>&nbsp;</td>";
						}
						break;
					case 'top-lekarna':
						if (!empty($row1[$i])) { echo "
							<td>".$row1[$i]."</td>";
						}
						else { echo "
							<td>&nbsp;</td>";
						}
						break;
					case 'tradesman-prijmeni':
						if (!empty($row1[$i])) { echo "
							<td>".$row1[$i]."</td>";
						}
						else { echo "
							<td>&nbsp;</td>";
						}
						break;
					case 'tradesman-telefon':
						if (!empty($row1[$i])) { echo "
							<td>".$row1[$i]."</td>";
						}
						else { echo "
							<td>&nbsp;</td>";
						}
						break;
					case 'pharmacy':
						if (!empty($row1[$i])) { echo "
							<td>".$row1[$i]."</td>";
						}
						else { echo "
							<td>&nbsp;</td>";
						}
						break;
					case 'ulice':
						if (!empty($row1[$i])) { echo "
							<td>".$row1[$i]."</td>";
						}
						else { echo "
							<td>&nbsp;</td>";
						}
						break;
					case 'mesto':
						if (!empty($row1[$i])) { echo "
							<td>".$row1[$i]."</td>";
						}
						else { echo "
							<td>&nbsp;</td>";
						}
						break;
					case 'okres':
						if (!empty($row1[$i])) { echo "
							<td>".$row1[$i]."</td>";
						}
						else { echo "
							<td>&nbsp;</td>";
						}
						break;
					case 'retezec':
						if (!empty($row1[$i])) { echo "
							<td>".$row1[$i]."</td>";
						}
						else { echo "
							<td>&nbsp;</td>";
						}
						break;
					case 'datum-akce':
						echo "
							<td>".date("d.m.Y", strtotime($row1[$i]))."</td>";
						break;
					case 'pracovni-doba':
						$timeArray 	= explode("|", $row1[$i]);

						if (!empty($timeArray[0])) {
							$time_from = formatujCas($timeArray[0]).":".formatujCas($timeArray[1]).":00";
							echo "
								<td>".$time_from."</td>";
							$time_to = formatujCas($timeArray[2]).":".formatujCas($timeArray[3]).":00";
							echo "
								<td>".$time_to."</td>";

							$time_overall = kolikHodin($timeArray).":00";
							echo "
								<td>".$time_overall."</td>";


							//$hours = $timeArray[2]-$timeArray[0];
							//echo $time."<br>";
							$hours = (($timeArray[2]*60+$timeArray[3])-($timeArray[0]*60+$timeArray[1])-30)/60;
							//echo $hours."<br>";
							if ((($hours)*60+30)<=0) {
								$error = true; //zakomentovat pak
								$error_time = "Čas \"Od\" musí být menší než \"Do\"";
							}
							else if ($hours==-0.5) {
								$hours = 0;
							}
						}
						else {
							echo "
								<td>00:00:00</td><td>00:00:00</td><td>00:00:00</td>";
						}

						


						break;
					
					case 'promo':
						echo "
							<td>".$row1[$i]."</td>";
							//<td>".$row1[$i+1]."</td>	
							//$i++;				
							//$k++;				
						break;
					case 'promo-tel':
						echo "
							<td>".$row1[$i]."</td>";
							//<td>".$row1[$i+1]."</td>	
							//$i++;				
							//$k++;				
						break;
					
					case 'filled':
						if ($row1[$i]=="ano") {
							echo "
							<td>1</td>";
						}
						else {
							echo "
							<td>0</td>";	
						}
						break;
					case 'schvaleno':
						if ($row1[$i]=="ano") {
							echo "
							<td>1</td>";
						}
						else {
							echo "
							<td>0</td>";	
						}
						break;
					case 'km-celkem':
						if (!empty($row1[$i])) {
							echo "
							<td>".$row1[$i]."</td>";
						}
						else {
							echo "
							<td>0</td>";
						}
						break;
					case 'popis':
						if (!empty($row1[$i])) { echo "
							<td>".$row1[$i]."</td>";
						}
						else { echo "
							<td>&nbsp;</td>";
						}
						break;
					case 'poznamky':
						if (!empty($row1[$i])) { echo "
							<td>".$row1[$i]."</td>";
						}
						else { echo "
							<td>&nbsp;</td>";
						}
						break;
					case 'photo':
						if (!empty($row1[$i])) { 
							echo "<td><a href=\"$mdg_link/".$row1[$i]."\" target=\"_blank\">$mdg_link/".$row1[$i]."</a></td>";
						}
						else {echo "
							<td>&nbsp;</td>";							
						}
						if (!empty($row1[$i+1])) { 
							echo "<td><a href=\"$mdg_link/".$row1[$i+1]."\" target=\"_blank\">$mdg_link/".$row1[$i+1]."</a></td>";
						}
						else {echo "
							<td>&nbsp;</td>";							
						}
						if (!empty($row1[$i+2])) { 
							echo "<td><a href=\"$mdg_link/".$row1[$i+2]."\" target=\"_blank\">$mdg_link/".$row1[$i+2]."</a></td>";
						}
						else {echo "
							<td>&nbsp;</td>";							
						}
						break;
					
					/*case 'poznamky':
						$cyklAdd--;
						$i--; 



						//echo "Napiš poznámky <br>";
						//$row4 = mysqli_fetch_row($data4);

						// echo "
						// 		<td class=\"table-question\"><div class=\"w90 invisible\">";
						// //while ( $row4 = mysqli_fetch_row($data4) ) {
						// for ($n=0; $n < count($row4); $n++) { 
						// 	if ($row4[$n]==NULL) {
						// 		break;
						// 	}
						// 	$questionArray = explode("|", $row4[$n]);
						// 	//echo "<textarea>".$questionArray[0]." ".$questionArray[1]."</textarea>";
						// 	echo $questionArray[0]." ". $questionArray[1]." | ";
						// 	//echo $questionArray[1]." ";
						// }
						// echo "</div>
						// 		</td>";

						$row4 = mysqli_fetch_row($data4);

						for ($f=0; $f < $counterQuestionHeader; $f++) { 
							if (!empty($row4[$f])) {
								$QuestionArray 	= explode("|", $row4[$f]);
								echo "
								<td>".$QuestionArray[1]."</td>";
							}
							else {
								echo "
								<td>&nbsp;</td>";
							}

						}



						break;*/
					case 'produkty':
						$cyklAdd--;
						for ($f=0; $f < $counterProductHeader; $f++) {
							//echo "Počet produktů: $counterProductHeader<br>";
							//if ($rowProduct[0]==NULL) {
							//	break;
							//}

							//echo count($rowProduct);

							//echo "$rowProduct[$f],";
							
							$productArray 		= explode("|", $rowProduct[$f]);
							$productPriceArray 	= explode("|", $rowProductPrice[$f]);
							//echo $productArray[0];
							//if (!empty($productArray[1])||!empty($productArray[4])) {
							//	echo "
							//<td>$productArray[1]</td>
							//<td>$productArray[4]</td>";	
							//}
							//else  {
							//	echo "
							//<td>0</td>
							//<td>0</td>";
							//}
							if (!empty($productPriceArray[1])) {
								echo "
							<td>$productPriceArray[1]</td>";
							}
							else if (!empty($productArray[1])) {
								echo "
							<td>$productArray[1]</td>";
							}
							else {
								echo "
							<td>0</td>";
							}
							if (!empty($productArray[4])) {
								echo "
							<td>$productArray[4]</td>";	
							}
							else {
								echo "
							<td>0</td>";
							}

						}

						if (!empty($rowProduct[20])) {
							echo "
							<td>".$rowProduct[20]."</td>";
						}
						else {
							echo "
							<td>0</td>";
						}
						
						if (!empty($rowProduct[21])) {
							echo "
							<td>".$rowProduct[21]."</td>";
						}
						else {
							echo "
							<td>0</td>";
						}
						
						if (!empty($rowProduct[22])) {
							echo "
							<td>".$rowProduct[22]."</td>";
						}
						else {
							echo "
							<td>0</td>";
						}

					//}

					//continue;
						break;
					
					default:
						# code...
						break;
				}

			}

				if ( $darky == true ) {
					//echo "vypiš dárky<br>";
					for ($p=0; $p < $counterGiftHeader; $p++) {
						
						$giftArray 	= explode("|", $rowGift[$p]);
						//echo $giftArray[0];
						if (!empty($giftArray[1])||!empty($giftArray[0])) {
							echo "
						<td>$giftArray[1]</td>";	
						}
						else  {
							echo "
						<td>0</td>";
						}
				
					}
				
					continue;
				
				}


			echo "
							</tr>";
		
	
		}


		/*
				while ( $row1 = mysqli_fetch_row($data1) ) {
					$row2 = mysqli_fetch_row($data2);
					$rowProduct = mysqli_fetch_row($dataProduct);
					$rowGift = mysqli_fetch_row($dataGift);
					echo "
							<tr>";
					if ($bonus == true) { $bonusBool = true; }
					//if ($darky == true) { $darkyBool = true; }
					//echo "Počet cyklů: ".count($row1)."<br>";

					$counterTemp = 0;
					for ($i=1; $i < count($row1); $i++) { 

						
						$counterTemp++;

						//if ($edit == true){
						if ($counterTemp==$counterEdit){
							echo '
							<td class="center"><a href="action-edit.php?id=' . $row1[$i] . '">hlavicka </a><a href="action-revision.php?id=' . $row1[$i] . '">zkontrolovat </a><a href="action-fill.php?id=' . $row1[$i] . '">splnit </a><a href="action-show.php?id=' . $row1[$i] . '">zobrazit</a></td>';
							continue;
						}
						
						if ($counterTemp==$counterSend) { //Oformátuj čas
							echo "
								<td>".date("d.m.Y H:i", strtotime($row1[$i]))."</td>";
							continue;

						}
						if ($counterTemp==$counterVdl) {
							echo "
								<td class=\"center\">".$row1[$i]."</td>";
							continue;
						}


						if ($counterTemp==$counterDate){
							echo "
								<td>".date("d.m.Y", strtotime($row1[$i]))."</td>";
							continue;

						}

						if ($counterTemp==$counterTime) { //Oformátuj čas
							$timeArray 	= explode("|", $row1[$i]);
							$time 		= vypisCas( $timeArray );
							echo "
								<td>".$time."</td>";
							continue;
						}

						if ($counterTemp==$counterHours) { //Oformátuj čas
							echo "
								<td class=\"center\">".number_format($row1[$i], 2, ",", " ")."</td>";
							continue;
						}

						if ($counterTemp==$counterUser) { //Vypiš promoterku
							echo "
								<td>".$row1[$i]."</td>
								<td>".$row1[$i+1]."</td>";
							//$i++;
							continue;
						}

						if ($counterTemp==$counterKoo && $koo=="ano") { //Vypiš koo
							for ($j=0; $j < count($row2); $j++) { 
								//echo "$counterKoo $row2[$j] ";
							echo "
								<td>".$row2[$j]."</td>";
							}
							//$counterTemp++;
							continue;
						}

						if ($counterTemp==$counterFilled && $actionFilled=="ano") { //Vypiš splnene akce s jednickou
							//echo "<td>$row1[$i]</td>";
							//echo "<br>Splněno: $row1[$i] Counter: $counterFilled";
							if ($row1[$i]=="ano") {
								echo "
								<td>1</td>";
							}
							else {
								echo "
								<td>0</td>";	
							}
							continue;
						}

						

						

						//echo "$counterOsloveni";

						//if ($i==$counterOsloveni){
						//	echo "Napiš oslovené: $row1[$i]<br><br>";
						//	if (!empty($row1[$i])) {
						//		echo "
						//		<td>".$row1[$i]."</td>";
						//	}
						//	else {
						//		echo "
						//		<td>0</td>";
						//	}
						//	
						//	continue;
						//
						//}



						if ($counterTemp==$counterTradesman || $counterTemp==$counterTradesmanPhone || $counterTemp==$counterRetezec || $counterTemp==$counterPharmacy || $counterTemp==$counterUlice || $counterTemp==$counterOkres || $counterTemp==$counterPauza|| $counterTemp==$counterMesto ){
							if (!empty($row1[$i])) {
								echo "
								<td>".$row1[$i]."</td>";
							}
							else {
								echo "
								<td>&nbsp;</td>";
							}
							
							continue;

						}
						//echo "Temp:$counterTemp | $counterDarku | $i<br>";
						if ( $counterTemp==$counterMinKc || $counterTemp==$counterMinKs || $counterTemp==$counterTrzba || $counterTemp==$counterCelkemKusu || $counterTemp==$counterOsloveni || $counterTemp==$counterDarku  ){
							if (!empty($row1[$i])) {
								echo "
								<td>".$row1[$i]."</td>";
							}
							else {
								echo "
								<td>0</td>";
							}
							
							continue;

						}

						//echo "Temp:$counterTemp | $counterDarku | $i<br>";
						


						//echo "<br>Counter $counterTemp";
						//echo " Counter bonus: $counterBonus<br>";
						//if ($i==$counterBonus-2){
						//if ($bonusBool==true){
						//	echo "
						//		<td>".$row1[$i]."</td>";
						//	$bonusBool = false;
						//	continue;
						//}


						//echo "<br>Counter $counterTemp";
						//echo " Counter darky: $counterDarku<br>";
						//if ($i==$counterDarku-2){
						//if ($counterTemp==$counterDarku){
						//if ($darkyBool==true){
						//	echo "
						//		<td>".$row1[$i]."</td>";
						//	$darkyBool = false;
						//	continue;
						//}
					}
					//echo "<br>i=$i  counter=$counterTemp<br>";
					//echo "$counterVyplata ma byt $i";
					/******************VYPLATA********************/
					
					
					//if ($i==$counterVyplata) {
/*
					if ($vyplata == true || $bonus == true) {
						$rowVyplata = mysqli_fetch_row($dataVyplata);
						$cilKc 			= $rowVyplata[0];
						$cilKs 			= $rowVyplata[1];
						$pocHodin 		= $rowVyplata[2];
						$bonus	 		= $rowVyplata[3];
						$trzbaProm 		= $rowVyplata[4];
						$ksProm	 		= $rowVyplata[5];
						$ksNeprom	 	= $rowVyplata[6];
						$trzbaNeprom 	= $rowVyplata[7];
						$hodinovka		= $rowVyplata[8];

						$ksCelkem = $ksProm + $ksNeprom;
						$trzbaCelkem = $trzbaProm + $trzbaNeprom;
						$zakladniMzda = $pocHodin * $hodinovka;
					}
				
					if ($vyplata == true && $counterVyplata == $counterTemp) {				
						$vyplataCelkem = $zakladniMzda;	
						//echo "vypiš výplatu: $vyplataCelkem<br>";

						$vyplataFormatovana	= number_format($vyplataCelkem, 0, ',', ' ')." Kč,-";

						if (empty($vyplataCelkem)) {
							$vyplataCelkem = 0;
						}
						echo "
									<td class=\"right per10\">$vyplataCelkem</td>";
						$counterTemp++;

						//continue;

					}
					//echo "Counterbonus: $counterBonus<br>";

					if ($bonus == true && $counterBonus == $counterTemp) {	
						if ($trzbaCelkem >= $cilKc && $cilKc > 0) {
							$vyplataZakladni = $bonus;
							//echo "ano";
						}
						else if ($ksCelkem >= $cilKs && $cilKs > 0) {
							$vyplataZakladni = $bonus;
							//echo "ano";
						}
						else {
							$vyplataZakladni = 0;
							//echo "ne";
						}
						echo "
							<td>".$vyplataZakladni."</td>";
						$counterTemp++;
					}

					

					if ( $darky == true  ){
						//echo "<br>CD: $counterDarku CT: $counterTemp data: ".$row1[$i-1];
						if (!empty($row1[$i-1])) {
							echo "
							<td>".$row1[($i-1)]."</td>";
						}
						else {
							echo "
							<td>0</td>";
						}
						//$counterTemp++;
						//echo "$sql<br>";
						
						//continue;

					}



					if ( $counterQuestion > 0 ) {
						$row4 = mysqli_fetch_row($data4);

						echo "
								<td class=\"table-question\"><div class=\"w90 invisible\">";
						//while ( $row4 = mysqli_fetch_row($data4) ) {
						for ($j=0; $j < count($row4); $j++) { 
							if ($row4[$j]==NULL) {
								break;
							}
							$questionArray = explode("|", $row4[$j]);
							//echo "<textarea>".$questionArray[0]." ".$questionArray[1]."</textarea>";
							echo $questionArray[0]." ". $questionArray[1]." | ";
							//echo $questionArray[1]." ";
						}
						echo "</div>
								</td>";
					}

					
						

					if ( $produkty=="ano" ) {
						//echo "Counter: $counter<br>";
					//if ( $i==(($counterProduct)-1)  ) {
						//echo "<br>splnuji podminku, ";
						//$rowProduct = mysqli_fetch_row($dataProduct);
						//echo "$rowProduct[0]<br>";
						//while ( $rowProduct = mysqli_fetch_row($dataProduct ) ) {
						//echo "counter: $counterProductHeader";
						//echo "$sqlProducts<br>";
							for ($j=0; $j < $counterProductHeader; $j++) {
								//echo "Počet produktů: $counterProductHeader<br>";
								//if ($rowProduct[0]==NULL) {
								//	break;
								//}

								//echo count($rowProduct);

								//echo "$rowProduct[$j],";
								
								$productArray 	= explode("|", $rowProduct[$j]);
								//echo $productArray[0];
								if (!empty($productArray[1])||!empty($productArray[4])) {
									echo "
								<td>$productArray[1]</td>
								<td>$productArray[4]</td>";	
								}
								else  {
									echo "
								<td>0</td>
								<td>0</td>";
								}
	
							}

							if (!empty($rowProduct[20])) {
								echo "
								<td>".$rowProduct[20]."</td>";
							}
							else {
								echo "
								<td>&nbsp;</td>";
							}

							if (!empty($rowProduct[21])) {
								echo "
								<td>".$rowProduct[21]."</td>";
							}
							else {
								echo "
								<td>0</td>";
							}

							if (!empty($rowProduct[22])) {
								echo "
								<td>".$rowProduct[22]."</td>";
							}
							else {
								echo "
								<td>0</td>";
							}

						//}

						//continue;

					}

					//echo "$counterDarku $counterTemp <br>";
					if ( $darky == true ) {
						//echo "vypiš dárky<br>";
						for ($j=0; $j < $counterGiftHeader; $j++) {
							
							$giftArray 	= explode("|", $rowGift[$j]);
							//echo $giftArray[0];
							if (!empty($giftArray[1])||!empty($giftArray[0])) {
								echo "
							<td>$giftArray[1]</td>";	
							}
							else  {
								echo "
							<td>0</td>";
							}

						}

						continue;

					}




					/*********************************************************************************/





						/*
						

						//echo $counter." ";
						//echo $i." ".$counterFilled." ".$actionFilled;
						if ($i==$counterDate){
							echo "
								<td>".date("d.m.Y", strtotime($row1[$i]))."</td>";
							continue;

						}
						
						if ($i==$counterMinKc){
							if (!empty($row1[$i])) {
								//$kc	= number_format($row1[$i], 0, ',', '&nbsp;')."&nbsp;Kč,-";
								echo "
								<td>".$row1[$i]."</td>";
							}
							else {
								echo "
								<td>0</td>";
							}
							
							continue;

						}
						
						if ($i==$counterMinKs){
							if (!empty($row1[$i])) {
								echo "
								<td>".$row1[$i]."</td>";
							}
							else {
								echo "
								<td>0</td>";
							}
							
							continue;

						}
						
						if ($i==$counterTrzba){
							if (!empty($row1[$i])) {
								echo "
								<td>".$row1[$i]."</td>";
							}
							else {
								echo "
								<td>0</td>";
							}
							
							continue;

						}
						
						if ($i==$counterCelkemKusu){
							if (!empty($row1[$i])) {
								echo "
								<td>".$row1[$i]."</td>";
							}
							else {
								echo "
								<td>0</td>";
							}
							
							continue;

						}
						
						if ($i==$counterOsloveni){
							if (!empty($row1[$i])) {
								echo "
								<td>".$row1[$i]."</td>";
							}
							else {
								echo "
								<td>0</td>";
							}
							
							continue;

						}
						
						if ($i==$counterDarku){
							if (!empty($row1[$i])) {
								echo "
								<td>".$row1[$i]."</td>";
							}
							else {
								echo "
								<td>0</td>";
							}
							
							continue;

						}
						
						//echo "$i $counterBonus";
						if ($i==$counterBonus && $bonus == true){
							if (is_numeric($row1[$i]) && ($row1[$i]>1)) {
								//echo "vypiš bonus";
								echo "
								<td>".$row1[$i]."</td>";
							}
							else {
								//echo "vypiš nulu";
								echo "
								<td>0</td>";
							}
							
							continue;

						}


						
						if ($i==$counterFilled && $actionFilled=="ano") { //Vypiš splnene akce s jednickou
							//for ($j=0; $j < count($row1); $j++) { 
								//echo "$counterKoo $row2[$j] ";
								//echo $row1[$i];
								//echo $counterFilled;
								if ($row1[$i]=="ano") {
									echo "
								<td>1</td>";
								}
								else {
									echo "
								<td>0</td>";	
									}
								continue;
							//}
						}
						

						if (!empty($row1[$i])) {
							//echo "aaa";
							echo "
								<td>".$row1[$i]."</td>";
						}
						else {
							if ($i>13) {
								echo "
								<td>0</td>";
							}
							else {
								echo "
								<td>&nbsp;</td>";
							}
							
						}

						if ($i==$counterKoo && $koo=="ano") { //Vypiš koo
							for ($j=0; $j < count($row2); $j++) { 
								//echo "$counterKoo $row2[$j] ";
							echo "
								<td>".$row2[$j]."</td>";
							}
						}
						
					}*/	
					

					
					/******************VYPLATA********************/
					//if ($i==$counterVyplata) {
					/*
					if ($vyplata == true) {
						$rowVyplata = mysqli_fetch_row($dataVyplata);
						//echo "vypiš výplatu<br>";
						$cilKc 			= $rowVyplata[0];
						$cilKs 			= $rowVyplata[1];
						$pocHodin 		= $rowVyplata[2];
						$bonus	 		= $rowVyplata[3];
						$trzbaProm 		= $rowVyplata[4];
						$ksProm	 		= $rowVyplata[5];
						$ksNeprom	 	= $rowVyplata[6];
						$trzbaNeprom 	= $rowVyplata[7];
						$hodinovka		= $rowVyplata[8];

						$ksCelkem = $ksProm + $ksNeprom;
						$trzbaCelkem = $trzbaProm + $trzbaNeprom;
						$zakladniMzda = $pocHodin * $hodinovka;

						//$vyplataCelkem = $zakladniMzda;


						//echo "
						//			<td class=\"center per10\">";
						if ($trzbaCelkem >= $cilKc && $cilKc > 0) {
							$vyplataCelkem = $zakladniMzda + $bonus;
							//echo "ano";
						}
						else if ($ksCelkem >= $cilKs && $cilKs > 0) {
							$vyplataCelkem = $zakladniMzda + $bonus;
							//echo "ano";
						}
						else {
							$vyplataCelkem = $zakladniMzda;
							//echo "ne";
						}
						//echo "
						//			</td>";	

						$vyplataFormatovana	= number_format($vyplataCelkem, 0, ',', ' ')." Kč,-";

						if (empty($vyplataCelkem)) {
							$vyplataCelkem = 0;
						}
						echo "
									<td class=\"right per10\">$vyplataCelkem</td>";

						//continue;

					}
					*/
					/*********************************************************************************/
					/*
					if ( $counterQuestion > 0 ) {
						$row4 = mysqli_fetch_row($data4);

						echo "
								<td class=\"table-question\"><div class=\"w90 invisible\">";
						//while ( $row4 = mysqli_fetch_row($data4) ) {
						for ($j=0; $j < count($row4); $j++) { 
							if ($row4[$j]==NULL) {
								break;
							}
							$questionArray = explode("|", $row4[$j]);
							//echo "<textarea>".$questionArray[0]." ".$questionArray[1]."</textarea>";
							//echo $questionArray[0]." ". $questionArray[1]." ";
							echo $questionArray[1]." ";
						}
						echo "</div>
								</td>";
					}

					//echo $i." ".$counterProduct;
					if ( $produkty=="ano" && $i==$counterProduct ) {
					//if ( $i==(($counterProduct)-1)  ) {
						//echo "<br>splnuji podminku, ";
						//$rowProduct = mysqli_fetch_row($dataProduct);
						//echo "$rowProduct[0]<br>";
						//while ( $rowProduct = mysqli_fetch_row($dataProduct ) ) {
						//echo "counter: $counterProductHeader";
							for ($j=0; $j < $counterProductHeader; $j++) {
								//if ($rowProduct[0]==NULL) {
								//	break;
								//}

								//echo count($rowProduct);

								//echo "$rowProduct[$j],";

								$productArray 	= explode("|", $rowProduct[$j]);
								//echo $productArray[0];
								if (!empty($productArray[1])||!empty($productArray[4])) {
									echo "
								<td>$productArray[1]</td>
								<td>$productArray[4]</td>";	
								}
								else  {
									echo "
								<td>0</td>
								<td>0</td>";
								}
											
							}
						//}

						continue;

					}
					*/

					echo "
							</tr>";
								
	
				//}	
		
				?>
	
						</tbody>
					</table>