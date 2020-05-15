<?php

require_once __DIR__ . '/../tabele/Korisnik.php';

$korisnici = Korisnik::getAll();

?>

<script>
	$(function(){
       
       $('.brisanje').on('click',function(){
          
          var id = $(this).attr('id').split('_')[1];
          var red = $(this).parent().parent();


          $.ajax({
          	 'url':'logika/obrisi.php';
          	    'method':'post';
          	    'data' : {
          	    'id' => $id
          	 },

          	 'success': function(poruka){
          	 	var p = JSON.parse(poruka)
          	 	if(p.status == 'uspesno'){
          	 		red.remove();
          	 	} else{
          	 		alert('Postoji korisnik');
          	 	}
          	 }
          })
       })


       $('.izmena').on('click', function(){
             
          var id = $(this).attr('id').split('_')[1];
          var red = $(this).parent().parent(); 
          var username = $(this).parent().parent();
          var ime_prezime = $(this).parent().parent();
          var email = $(this).parent().parent();

          
          

          $('#ime_prezime').val(ime_prezime)
          $('#username').val(username)
          $('#email').val(email)
          $('#korisnik_id').val(korisnik_id)
          $('#form').attr('action', 'logika/izmeni_korisnika.php');


       })
	})
	

</script>



<h2>Uloge korisnika</h2>


<form action="logika/dodaj_korisnika.php" method="post">
	<input type="text" name="ime_prezime" id="ime_prezime" placeholder="Unesite ime i prezime">
	<input type="text" name="username" id="username" placeholder="Unesite korisnicko ime">
	<input type="email" name="email" id="email" placeholder="Unesi e-mail">
	<input type="password" name="password" id="password" placeholder="Unesite lozinku korisnika">
	<input type="hidden" name="korisnik_id" id="korisnik_id">
    <input type="submit" value="Snimi">
</form>


<table>
	<thead>
		<tr>
         <th>Id</th>
         <th>Korisnicko ime</th>
         <th>Email</th>
         <th>Ime i prezime/th>
         <th>Izmeni</th>
         <th>Obrisi</th>
        </tr>
		

	</thead>

	<tbody>

		<?php foreach ($korisnici as $korisnik) { ?>

		<tr>
         <td> <?= $korisnik->id ?></td>
         <td> <?= $korisnik->ime_prezime ?></td>
         <td> <?= $korisnik->username ?></td>
         <td> <?= $korisnik->password ?></td>
         <td> <?= $korisnik->email ?></td>
         <td> <?= $korisnik->korisnik_id ?></td>

         <td><button id="izmeni_ <?= $korisnik->id ?>" class="izmena"> Izmeni </button></td>
         <td><button id="obrisi_ <?= $korisnik->id ?>" class="brisanje"> Obrisi </button></td>
        </tr>

		

		<?php } ?>




	</tbody>
	
</table>