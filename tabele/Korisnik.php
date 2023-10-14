<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/Database.php';
class Korisnik
{
	public $ime;
	public $prezime;
	public $korisnickoIme;
	public $mejl;
	public $lozinka;
	public $telefon;
	public $adresa;
	public $grad;
	public static function registracija($ime,$prezime,$korisnickoIme,$mejl,$lozinka,$telefon,$adresa,$grad){
 		$db = Database::getInstance();
 		$query = "INSERT INTO korisnici (ime,prezime,korisnickoIme,mejl,lozinka,telefon,adresa,grad) VALUES (:ime,:prezime,:korisnickoIme,:mejl,:lozinka,:telefon,:adresa,:grad)";
 		$params = [
 			':ime'=> $ime,
 			':prezime' => $prezime,
 			':korisnickoIme' => $korisnickoIme,
 			':lozinka' => hash('sha512', $lozinka),
 			':mejl' => $mejl,
 			':telefon' => $telefon,
 			':adresa' => $adresa,
 			':grad' => $adresa
 		];
 		
 		$db -> insert("Korisnik",$query,$params);
 	}
 	public static function registracijaAndReturn($ime,$prezime,$korisnickoIme,$mejl,$lozinka,$telefon,$adresa,$grad){
 		$db = Database::getInstance();
 		$query = "INSERT INTO korisnici (ime,prezime,korisnickoIme,mejl,lozinka,telefon,adresa,grad) VALUES (:ime,:prezime,:korisnickoIme,:mejl,:lozinka,:telefon,:adresa,:grad)";
 		$params = [
 			':ime'=> $ime,
 			':prezime' => $prezime,
 			':korisnickoIme' => $korisnickoIme,
 			':lozinka' => hash('sha512', $lozinka),
 			':mejl' => $mejl,
 			':telefon' => $telefon,
 			':adresa' => $adresa,
 			':grad' => $adresa
 		];
 		$query1 = "SELECT * FROM korisnici WHERE korisnickoIme = :korisnickoIme";
 		$params1 = [
 			':korisnickoIme' => $korisnickoIme
 		];
 		$db -> insert("Korisnik",$query,$params);
 		$x = $db->select("Korisnik",$query1,$params1);
 		foreach($x as $rez){
 			return $rez;
 		}
 	}
 	
 	public static function delete($id)
		{
			$db = Database::getInstance();
			$query = "delete from korisnici where id = :id";
			$params = [
				":id" => $id
			];
			$db->delete($query,$params);
		}
		public static function deleteAll()
		{
			$db = Database::getInstance();
			$query = "delete from korisnici where id > 0";
			$params = [
			];
			$db->delete($query,$params);
		}
 	public static function odobri($id){
 		$db = Database::getInstance();
 		$query = "Update korisnici set vrstaKorisnika = 1 where id = :id";
 		$params = [
 			':id' => $id
 		];
 		$db -> update("Korisnik",$query,$params);
 	
 	}
 	public static function updateLozinka($id,$lozinka){
 		$db = Database::getInstance();
 		$query = "Update korisnici set lozinka = :lozinka where id = :id";
 		$params = [
 			':id' => $id,
 			':lozinka' => hash('sha512',$lozinka)
 		];
 		$db -> update("Korisnik",$query,$params);
 	
 	}
 	public static function getAllwithoutID($id){
 		$db = Database::getInstance();
 		$query = "SELECT * FROM korisnici where id <> :id";
 		$params = [
 			':id' => $id
 		];
 		
 		return $db -> select("Korisnik",$query,$params);
 	}

 	public static function getByID($id){
 		$db = Database::getInstance();
 		$query = "SELECT * FROM korisnici where id = :id";
 		$params = [
 			':id' => $id
 		];
 		
 		$x = $db -> select("Korisnik",$query,$params);
 		foreach($x as $rez){
 			return $rez;
 		}
 	}
 	public static function isAdmin($id){
 		$db = Database::getInstance();
 		$query = "SELECT * FROM korisnici where id = :id";
 		$params = [
 			':id' => $id
 		];
 		$korisnik;
 		$x = $db -> select("Korisnik",$query,$params);
 		foreach($x as $rez){
 			 $korisnik = $rez;
 			 break;
 		}
 		if($korisnik->vrstaKorisnika == 3) {return true;}
 		else{return false;}
 	}
 	public static function isBlagajnik($id){
 		$db = Database::getInstance();
 		$query = "SELECT * FROM korisnici where id = :id";
 		$params = [
 			':id' => $id
 		];
 		$korisnik;
 		$x = $db -> select("Korisnik",$query,$params);
 		foreach($x as $rez){
 			 $korisnik = $rez;
 			 break;
 		}
 		if($korisnik->vrstaKorisnika == 2) {return true;}
 		else{return false;}
 	}
 	public static function login($korisnickoIme,$lozinka){
 		$db = Database::getInstance();
 		$query = "SELECT * FROM korisnici where korisnickoIme = :korisnickoIme AND lozinka=:lozinka";
 		$params = [
 			':korisnickoIme' => $korisnickoIme,
 			':lozinka'=>hash('sha512', $lozinka)
 		];
 		
 		$x = $db -> select("Korisnik",$query,$params);
 		foreach($x as $rez){
 			return $rez;
 		}
 	}
 	public static function getByImejl($imejl){
 		$db = Database::getInstance();
 		$query = "SELECT * FROM korisnici where imejl = :imejl";
 		$params = [
 			':imejl' => $imejl
 		];
 		
 		$x = $db -> select("Korisnik",$query,$params);
 		foreach($x as $rez){
 			return $rez;
 		}
 	}
 	public static function getByKorisnickoIme($korisnickoIme){
 		$db = Database::getInstance();
 		$query = "SELECT * FROM korisnici where korisnickoIme = :korisnickoIme";
 		$params = [
 			':korisnickoIme' => $korisnickoIme
 		];
 		
 		$x = $db -> select("Korisnik",$query,$params);
 		foreach($x as $rez){
 			return $rez;
 		}
 	}
 	public static function getAllKorisnici(){
 		$db = Database::getInstance();
 		$query = "SELECT * FROM korisnici ";
 		$params = [
 			
 		];
 		
 		return $db -> select("Korisnik",$query,$params);
 	}
}