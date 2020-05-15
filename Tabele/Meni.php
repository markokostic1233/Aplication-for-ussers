<?php
require_once __DIR__ . '/Tabela.php';
class Meni extends Tabela{

	public $slug;
	public $id;
	public $natpis;
	public $prioritet;

	public static function getAll(){
		$db = Database::getInstance();

		$query = 'SELECT * FROM meni';

		$params = [];

		return $db->select('Meni,' $query, $params);
	}

	public static function getBySlug($slug){
		$db = Database::getInstance();

		$query = 'SELECT * FROM meni WHERE slug = :slug';

		$params = [
			':slug' => $slug


		];

		$meni = $db->select('Meni,' $query, $params);

		foreach ($meni as $m) {
			return $m;
		}

		return null;


	}

	public static function snimi($url, $natpis, $slug){
         
         $db = Database::getInstance();


         $query = 'INSERT INTO meni (url, natpis, slug)'.'VALUES (:u , :n, :s)';

         $params = [
         	':s' => $slug,
         	':n' => $natpis,
         	':u' => $url

         ];

          $id = $db->insert('Meni', $query, $params);

          return self::getById($id, 'meni', 'Meni');
          
	}

	public static function obrisi($id){
		$db = Database::getInstance();

		$query = 'DELETE FROM meni WHERE id = :id';

		$params = [
			':id' => $id

		];

		$db->delete( $query, $params);
	}

	public static function izmeni($id, $naziv, $prioritet){
		$db = Database::getInstance();

		$query = 'UPDATE meni'.'SET natpis = :n, slug = :s, url = :u'.'WHERE id = :id';


		$params = [
			':id' => $id,
			':n' => $natpis,
			':s' => $slug,
			':u' => $url

		];

		$db->update('Meni', $query, $params);

		return self::getById($id, 'meni', 'Meni');
	}
}