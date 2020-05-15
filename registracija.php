<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registracija</title>



	<style>
		form{
			width: 200px;
			border:1px solid silver;
			margin: auto;
			margin-top: 200px;
			background-color: yellow;
			height: 200px;
			padding: 25px;

		}
		input{
			padding: 7px;
		}
		

	</style>
	</head>

<body>

<form action="logika/registruj_se.php" method="post">
   <input type="text" name="username" placeholder="Korisnicko ime">
   <input type="password" name="password" placeholder="Lozinka">
   <input type="password" name="ponovo_password" placeholder="Ponovite lozinku">
   <input type="email" name="email" placeholder="E-mail">
   <input type="text" name="ime_prezime" placeholder="Ime i prezime">
   <input type="submit" value="Registruj se">

 <?php if(isset($_GET['error'])) { ?>
 
 <p id="error">Pogresno korisnicko ime ili lozinka</p>

 <?php } ?>

</form>
</body>
</html>