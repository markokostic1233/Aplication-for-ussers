<?php

session_start();

if (!isset($_SESSION['korisnik_admin.php'])) {
	header('Location: ../index.php');
	die();
}

require_once __DIR__.'/../tabele/Korisnik.php';