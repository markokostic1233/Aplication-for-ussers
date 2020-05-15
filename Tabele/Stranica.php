<?php
require_once __DIR__ . '/Tabela.php';
class Stranica extends Tabela{

	public $sadrzaj;
	public $id;
	public $kratki_sadrzaj;
	public $slika;
	public $meni_id;
	public $naslov;

	public static function getMeni(){
		return Meni::getById($this->meni_id, 'meni', 'Meni');
	}
	public static function getByMeniId($meni_id){
		$db = Database::getInstance();

		$query = 'SELECT * FROM stranice WHERE meni_id = :m';

		$params = [

			':m' => $meni_id


		];

		$stranice = $db->select('Stranica', $query, $params);

		foreach ($stranice as $strana) {
			return $strana;
		}
		return null;
}