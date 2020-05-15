<?php

$username = $_GET['username'];
$password = $_GET['password'];

$password = hash('sha512', $password);


require_once __DIR__.'/../tabele/Korisnik.php';


$korisnik = Korisnik::login($username, $password);


if ($korisnik !== null) {
	session_start();
	$_SESSION['korisnik_id'] = $korisnik_id;
	header('Location: ../stranica.php');
} else {
	header('Location: ../index.php?error=login');
}