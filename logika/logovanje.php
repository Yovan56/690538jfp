<?php
require_once __DIR__ . '/../tabele/Korisnik.php';
$korisnickoIme = $_POST['korisnickoIme'];
$lozinka = $_POST['lozinka'];
$korisnik = Korisnik::login($korisnickoIme,$lozinka);
if($korisnik->vrstaKorisnika == 0){
	header('Location:../index.php?greska');
	die();
}
session_start();
$_SESSION['id'] = $korisnik->id;
header('Location:../index.php');
	die();