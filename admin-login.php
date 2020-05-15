<?php
session_start();
if(isset($_SESSION['korisnik_admin_id'])) {
header('Location: admin.php');
die();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Login</title>

	<style>
		form{
			width: 200px;
			border:1px solid silver;
			margin: auto;
			margin-top: 200px;
			background-color: yellow;
			height: 100px;
			padding: 25px;

		}
		input{
			padding: 7px;
		}
		

	</style>

</head>
<body>
<form action="logika/prijavi_se.php" method="post">

 <input type="text" name="username" placeholder="Korisnicko ime">
 <input type="password" name="password" placeholder="Lozinka">

 <input type="hidden" name="admin_login" value="true">

 <input type="submit" value="Prijavi se">

   <?php if(isset($_GET['error']))  { ?>

   <p id="error">Pogresno korisnicko ime ili lozinka</p>

   <?php }  ?>

  

</form>
</body>
</html>