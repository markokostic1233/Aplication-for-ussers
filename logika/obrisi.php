<?php

session_start();

if (!isset($_SESSION['korisnik_admin.php'])) {
	header('Location: ../index.php');
	die();
}

Uloga::obrisi($_POST['id']);

require_once __DIR__ .'/../tabele/Uloga.php';

echo '{"status":"uspesno"}';