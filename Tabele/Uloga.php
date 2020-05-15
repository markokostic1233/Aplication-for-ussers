<?php
require_once __DIR__ . '/Tabela.php';
class Uloga extends Tabela{

	
	public $id;
	public $naziv;
	public $prioritet;

	public static function getByName($naziv){

		$db = Database::getInstance();

		$query = 'SELECT * FROM uloga'.'WHERE naziv = :n';

		$params = [
         
          ':n' => $naziv

		];

		$uloga = $db->select('Uloga', $query, $params);

		foreach ($uloga as $uloge ) {
			return $uloga;
		}
		 return null;
	}

	public static function getAll(){
		$db = Database::getInstance();

		$query = 'SELECT * FROM uloge';

		$params = [];

		return $db->select('Uloga,' $query, $params);
	}

	public static function snimi($naziv, $prioritet){
         
         $db = Database::getInstance();


         $query = 'INSERT INTO uloga (naziv, prioritet)'.'VALUES (:n , :p)';

         $params = [
         	':n' => $naziv
         	':p' => $prioritet

         ];

          $id = $db->insert('Uloga', $query, $params);

          return self::getById($id, 'uloge', 'Uloga');
          
	}

	public static function obrisi($id){
		$db = Database::getInstance();

		$query = 'DELETE FROM uloge WHERE id = :id';

		$params = [
			':id' => $id

		];

		$db->delete( $query, $params);
	}

	public static function izmeni($id, $naziv, $prioritet){
		$db = Database::getInstance();

		$query = 'UPDATE uloga'.'SET naziv = :n, prioritet = :p'.'WHERE id = :id';


		$params = [
			':id' => $id,
			':n' => $naziv,
			':p' => $prioritet

		];

		$db->update('Uloga', $query, $params);

		return self::getById($id, 'uloge', 'Uloga');
	}
	
}