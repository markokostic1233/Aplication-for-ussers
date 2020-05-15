<?php

session_start();

if (!isset($_SESSION['korisnik_admin.php'])) {
	header('Location: ../index.php');
	die();
}

require_once __DIR__ .'/../tabele/Meni.php';

$slug = $_POST['slug'];
$url = $_POST['url'];
$natpis = $_POST['natpis'];

if(empty($_POST['url'])){
	$url = null;
}else{
	$url = $_POST['url'];
}

if(empty($_POST['slug'])){
	$slug = null;
}else{
	$slug = $_POST['slug'];
}




Meni::snimi($url, $natpis, $slug);

header("Location: ../admin.php?strana=meni");