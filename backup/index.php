<!DOCTYPE html>
<html>
<?php 
$pageTitle="Přihlášení | MERCHANDISING"; 
$description="Přihlášení uživatele do MERCHANDISING systému firmy MEDICAL & PHARMA PROMOTION, s.r.o."; 
?>
<?php require("prompts.php"); ?>
<?php require("block-head.php"); ?>
<body>
	<div class="page">
		<?php require("check-perm.php"); ?>
		<?php require_once("login-db.php") ?>
		<?php require_once("login.php") ?>
		<?php require("block-header-old.php"); ?>
		<?php require("block-menu-user.php"); ?>
		<div class="container">
				<!--<h1 class="center">Informační systém na ukládání reportů z promoakcí</h1>-->
				<section class="per40">
					<h2 class="center">Přihlášení do MERCHANDISING systému</h2>
					<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="login">
						
						<input type="text" name="username" placeholder="Uživatelské jméno">
						<div class="error"><?php if(!empty($error_username)) { echo $error_username; } ?></div>

						<input type="password" name="heslo" placeholder="Heslo">
						<div class="error"><?php if(!empty($error_heslo)) { echo $error_heslo; } ?></div>

						<input type="submit" name="submit" value="Přihlásit se">

					</form>
					<?php if (!empty($login)) { echo "<p class=\"message-error\">$login</p>"; } ?>

				</section>
			</div>		
		</main>
		<?php require("block-footer.php") ?>
	</div>
</body>
</html>