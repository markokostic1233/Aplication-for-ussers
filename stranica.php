<?php
session_start();

if(!isset($_SESSION['korisnik_id'])){
 header('Location: ../index.php');
 die();
}
require_once __DIR__ .'/tabele/Meni.php';
$meni = Meni::getAll();

$meni_id = Meni::getBySlug($slug)->$id;


require_once __DIR__ .'/tabele/Stranica.php';
if (isset($_GET)) {
	$slug = $_GET['slug'];
}else{
    $slug = $_GET['pocetna'];
}

$stranica = Stranica::getByMeniId($meni_id);

require_once __DIR__ .'/tabele/Komentar.php';

$komentari = Komentar::getAllByStranicaId($stranica->id);

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>Stranica</title>
  <script src="js/jquery-3.3.1.min.js"> </script>
  <script>
    $(function(){
        
        $('#komentar_forma').on('submit',function(e){
           
           e.preventDefault();
           var komentar = $('textarea[name="komentar"]').val();
           var stranica_id = $('input[name="stranica_id"').val();

           $.ajax({

               'url': $('#komentar_forma').attr('action'),
               'method':  $('#komentar_forma').attr('method'),
               'data': {

                   'komentar':komentar,
                   'stranica_id':stranica_id,
                   'ajax':true
               },
               'success': function(odgovor){

                   console.log(odgovor);
               }
           })


        })

    })




  </script>
</head>
<body>

	<a href="stranica.php">Odjavi se</a>
<nav>
	<ul>
		<?php foreach ($meni as $m) { ?>

			<li> <a href="stranica.php?slug<?=$m->slug?>"> <?=$m->natpis?> </a> </li>
			
		<?php } ?>
		


	</ul>
	
</nav>

 <?php if ($stranica !== null) { ?>

       	<h1> <?= $stranica->sadrzaj ?> <h1>
 		<h2> <?= $stranica->kratki_sadrzaj ?> <h2>
        <h3> <?= $stranica->naslov ?> <h3>

 <?php } ?>

 <hr> <hr>

      <h2>Komentari</h2>
       <div id="svi_komentari">
        <?php foreach ($komentri as $komentar) { ?>

        <div class="komentar">
          <p><?= $komentar->getKorisinik()->ime_prezime  ?> <span><?= $komentar->vremee() ?> </span></p>
          <p> <?= $komentar->komentar ?></p>
       </div>

        <?php } ?>
       	 

      <form action="logika/ostavi_kometar.php" method="post" id="komentar_forma">
      	 <textarea name="komentar"></textarea>
      	 <input type="hidden" name="stranica_id" value="<?=$stranica->id?>">
      	 <input type="submit" value="Posalji komentar">


      </form>




</body>
</html>