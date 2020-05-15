<?php
require_once __DIR__ . '/Tabela.php';
require_once __DIR__ . '/Korisnik.php';
require_once __DIR__ . '/Stranica.php';

class Komentar extends Tabela{

	public $vreme;
	public $id;
	public $korisnik_id;
	public $komentar;
	public $stranica_id;

	public static function vremee(){
		return date('d.m.Y. H:i', strtotime($this->vreme));
	}

	public static function getKorisnik(){
		return Korisnik::getById($this->korisnik_id,'korisnici', 'Korisnik');
	}

	public static function getStranica(){
		return Stranica::getById($this->stranica_id,'korisnici', 'Korisnik');
	}

	public static function upis($korisnik_id,$stranica_id,$komentar){

		$db = Database::getInstance();

		$query = 'INSERT INTO komentari (korisnik_id , stranica_id, komentar)'.'VALUES(:kom, :sid, :k)';

       $params = [
       	':sid' => $stranica_id,
       	':k' => $komentar,
       	':kom' => $korisnik_id

       ];

       $id = $db->lastInsertId();
       $komentar = self::getById($id,'komentari','Komentar');
       return $komentar;


	}

	public static function getAllByStranicaId($stranica_id){

		$db = Database::getInstance();

		$query = 'SELECT * FROM komentari'.'WHERE stranica_id = :sid';

		$params = [

			':sid' => $stranica_id


		];

		return $db->select('Komentar', $query, $params);


	}
}