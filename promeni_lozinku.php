<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Promeni lozinku</title>
</head>


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

<body>

<form action="logika/promeni_lozinku.php" method="post">

 <input type="text" name="username" placeholder="Korisnicko ime">

 <input type="password" name="old_password" placeholder="Stara lozinka">

  <input type="password" name="new_password" placeholder="Nova lozinka">

    <input type="text" name="new_password_repeat" placeholder="Ponovite lozinku">

 <input type="submit" value="Promeni lozinku">

   <?php if(isset($_GET['error'])) { ?>

       <p id="error">Probajte ponovo</p>

  <?php  } ?>



 <p id="error"></p>

 </form>


</body>
</html>