<?php
require_once __DIR__ . '/../tabele/Korisnik.php';
require_once __DIR__ . '/../config.php';
session_start();
if(isset($_SESSION['id'])){
	if(Korisnik::isAdmin($_SESSION['id'])){
		if(isset($_POST['id'])&&isset($_POST['lozinka'])){
			Korisnik::updateLozinka($_POST['id'],$_POST['lozinka']);
			header('Location:../administrator.php?success');
			die();
		}
		else {
			header('Location:../administrator.php?missingdata');
			die();
		}
	}
	else{
		header('Location:../index.php?notadmin');
		die();
	}
}
else{
	header('Location:../index.php?notlogin');
	die();
}

