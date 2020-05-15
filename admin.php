<?php

session_start();
if (!isset($_SESSION['korisnik_admin_id'])) {
	header('Location: index.php');
	die();
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>Stranica</title>
  <script src="js/jquery-3.3.1.min.js"> </script>
  <body>
	<a href="logika/logout.php">Odjavi se</a>

	<nav>
		<ul>
			<li> <a href="admin.php?strana=uloge">Uloge</a> </li>
			<li> <a href="admin.php?strana=korisnici">Korisnici</a> </li>
			<li> <a href="admin.php?strana=meni">Meni</a> </li>
			<li> <a href="admin.php?strana=stranice">Stranice</a> </li>
			<li> <a href="stranica.php">Obicni korisnici</a> </li>

		</ul>

	</nav>
	<hr>

	<?php if(isset($_GET['strana'])) ?> {
            
          <?php if($_GET['strana'] === 'uloge')) ?> {
          
              <?php require_once __DIR__ .'/administracija/uloge.php'; ?>

	
             <?php } ?>
             

                <?php elseif ($_GET['strana'] === 'korisnici')  { ?>
                     
                     <?php require_once __DIR__ .'/administracija/korisnici.php' ?>;
         	
                <?php } ?>


                <?php elseif ($_GET['strana'] === 'meni')  { ?>
                     
                     <?php require_once __DIR__ .'/administracija/meni.php' ?>;
         	
                <?php } ?>




	    <?php } ?>
	

</body>
</html>

