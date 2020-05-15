<?php

if (isset($_POST['username'])) {
	header('Location: ../index.php');
	die();
}

$username = $_GET['username'];
$old_password = $_GET['old_password'];
$new_password = $_GET['new_password'];
$new_password_repeat = $_GET['new_password_repeat'];

$old_password = hash('sha512', $old_password);
$new_password = hash('sha512', $new_password);

require_once __DIR__ .'/../tabele/Korisnik';

 $korisnik_id = Korisnik::login($username, $old_password);

 if ($korisnik_id !== null) {
 	$korisnik_id = Korisnik::change_password($username, $new_password);
 	header('Location: ../index.php');
 }
  header('Location: ../promeni_lozinku.php?error=login');
