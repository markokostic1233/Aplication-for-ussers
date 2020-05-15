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

$password = hash('sha512', $password);

Korisnik::register($username, $password, $email, $ime_prezime);

header("Location: ../admin.php?strana=korisnici");