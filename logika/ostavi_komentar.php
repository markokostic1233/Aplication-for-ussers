<?php

session_start();

if(!isset($_SESSION['korisnik_id'])){

	header('Location: ../index.php');
	die();
}

if(!isset($_POST['komentar_id'])){
	header('Location: ../stranica.php');
	die();
}



$komentar = $_SESSION['komentar'];
$stranica_id = $_POST['stranica_id'];
$komentar_id = $_POST['komentar_id'];

$uloga = Uloga::getByName('administrator');


if($korisnik !== null){

    if($korisnik->uloga_id === $uloga->id  && isset($_POST['admin_login'])) {

	session_start();
	$_SESSION['korisnik_admin_id'] = $uloga->id;
	header('Location: ../admin.php');
} else{
 session_start();
	$_SESSION['korisnik_id'] = $korisnik->id;
	header('Location: ../stranica.php');

}

	
}else{
	header('Location: ../index.php?error=login')
}


require_once __DIR__.'/../tabele/Stranica.php';
require_once __DIR__.'/../tabele/Komentar.php';
require_once __DIR__.'/../tabele/Meni.php';
require_once __DIR__.'/../tabele/Korisnik.php';


$korisnik = Korisnik::getById($korisnik_id,'korisnici', 'Korisnik');
$meni = Meni::getById($meni_id,'meni','Meni');
$stranica = Stranica::getById($stranica_id,'korisnici', 'Korisnik')

$komentar = Komentar::upis($komentar_id,$stranica_id,$komentar);