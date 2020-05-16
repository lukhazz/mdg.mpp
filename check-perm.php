<?php 

function checkPerm( $perm ) {
	//echo "$perm";
	$permision = false;
	for ($i=0; $i < count($_SESSION['role']); $i++) { 
		for ($j=0; $j < count($perm); $j++) { 
			if ($perm[$j]==$_SESSION['role'][$i] && $_SESSION['aktivni']=='ano') {
				$permision = true;
				break;
			}
		}	
	} 
	return $permision;
	if ($permision==false) {
		header('location: perm.php'); 	
	}

}
 ?>