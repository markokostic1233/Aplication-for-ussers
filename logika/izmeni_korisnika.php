<?php

session_start();

if (!isset($_SESSION['korisnik_admin.php'])) {
	header('Location: ../index.php');
	die();
}

require_once __DIR__ .'/../tabele/Korisnik.php';

$ime_prezime = $_POST['ime_prezime'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

if (!empty($password)) {
	
	$password = hash('sha512', $password);
	Korisnik::izmeni($id, $ime_prezime, $username, $email, $password);

} else{

    Korisnik::izmeni_bez_passworda($id, $ime_prezime, $username, $email);

}

header("Location: ../admin.php?strana=korisnici");