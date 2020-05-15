<?php
require_once __DIR__ . '/Tabela.php';
require_once __DIR__ . '/../includes/Database.php';

class Korisnik extends Tabela{

	public $username;
	public $id;
	public $password;
	public $ime_prezime;
	public $email;

	public static function register($ime_prezime, $username, $password, $email){
		$db = Database::getInstance();

		$query = 'INSERT INTO korisnici '.
		'(ime_prezime, username, password, email) '.'VALUES(:i, :u, :p, :e)';

		$params = [
			':i' => $ime_prezime,
			':u' => $username,
			':p' => $password,
			':e' => $email


		];

		try {
			$db->insert('Korisnik', $query, $params);
		} catch (Exception $e) {

			return false;
			
		}
		return $db->lastInsertId();
		
	}

	public static function login($username, $password){

		$db = Database::getInstance();

		$query = 'SELECT * FROM korisnici'.'WHERE username = :u AND password = :p';

		$params = [
			':u' => $username,
			':p' => $password

		];

		$korisnici = $db->select('Korisnik', $query, $params);

		foreach ($korisnici as $korisnik) {
		     return $korisnik;
		}
		return null;
	}

	public static function change_password($username, $new_password){
		$db = Database::getInstance();

		$query = 'UPDATE korisnici'.'SET new_password = :p'.'WHERE username = :u';

		$params = [

			':p' => $new_password,
			':u' => $username

		];

		$db->update('Korisnik', $query, $params);
	}
     
    public static function getAll(){

	    $db = Database::getInstance();

		$query = 'SELECT * FROM korisnici';

		$params = [];

		return $db->select('Korisnik', $query, $params);
	}

	public static function obrisi($id){

		$db = Database::getInstance();

		$query = 'DELETE * FROM korisnici WHERE id = :id';

		$params = [
             ':id' =>$id
		];

		$db->delete($query, $params);


	}

	public static function izmeni($ime_prezime, $username, $email, $password){

		$db = Database::getInstance();

		$query = 'UPDATE korisnici'.'SET ime_prezime = :i, username = :u, email = :e, password = :p'.'WHERE id = :id';

		$params = [
			':id' => $id,
			':i' => $ime_prezime,
			':u' => $username,
			':e' => $email,
			':p' => $password

		];

		$db->update('Korisnik', $query, $params);

		return self::getById($id, 'korisnici', 'Korisnik');

	}

	public static function izmeni_bez_passsworda($ime_prezime, $username, $email, ){

		$db = Database::getInstance();

		$query = 'UPDATE korisnici'.'SET ime_prezime = :i, username = :u, email = :e'.'WHERE id = :id';

		$params = [
			':id' => $id,
			':i' => $ime_prezime,
			':u' => $username,
			':e' => $email
			

		];

		$db->update('Korisnik', $query, $params);

		return self::getById($id, 'korisnici', 'Korisnik');

	}


}