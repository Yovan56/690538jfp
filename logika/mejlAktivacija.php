<?php
require_once __DIR__ . '/../tabele/Korisnik.php';
$id = $_GET['id'];
Korisnik::odobri($id);
header("Location:../index.php");