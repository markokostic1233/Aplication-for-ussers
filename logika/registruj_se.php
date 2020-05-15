<?php

if (isset($_POST['username'])) {
	header('Location: ../index.php');
	die();

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$ime_prezime = $_POST['ime_prezime'];
$ponovo_password = $_POST['ponovo_password'];

$password = hash('sha512',$password);

require_once __DIR__ . '/../tabele/Korisnik.php';

$korisnik_id = Korisnik::register($ime_prezime, $username, $password, $email);

if($korisnik_id !== false){
	header('Location: ../index.php');
}
else{
	header('Location: ../registracija.php?error=podaci');
}
