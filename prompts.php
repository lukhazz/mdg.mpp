<?php 

	if ($_SERVER['HTTP_HOST'] == 'mdg.mppromotion.cz') {
		$crm_link = "http://crm.mppromotion.cz";
		$mdg_link = "http://mdg.mppromotion.cz";
	}

	else if ($_SERVER['HTTP_HOST'] == 'mdg.mampocitace.cz') {
		$crm_link = "http://crm.mampocitace.cz";
		$mdg_link = "http://mdg.mampocitace.cz";
	}

	else {
		$crm_link = "http://localhost/crm";
		$mdg_link = "http://localhost/mdg";
	}

 ?>