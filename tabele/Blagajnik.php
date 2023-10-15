<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/Database.php';
class Blagajnik{
	public $korisnikID;
	public $lokacijaID;
	public static function setNewBlagajnik($korisnikID,$lokacijaID)
	{
		$db -> Database::getInstance();
		$query = "insert into blagajnici values (:korisnikID,:lokacijaID)"
		$params = [
			':korisnikID' = $korisnikID,
			':lokacijaID' = $lokacijaID
		]
		$db -> insert('Blagajnik',$query,$params);
	}
}