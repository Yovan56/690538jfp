<?php
require_once __DIR__ . '/tabele/Korisnik.php';
require_once __DIR__ . '/config.php';
session_start();
if(isset($_SESSION['id'])){
$korisnikID=$_SESSION['id'];
}
else{
$korisnikID = 0;	
}
$korisnik=Korisnik::getByID($korisnikID);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="js/jquery-3.7.1.js"></script>
	<script>
	 
	</script>
</head>
<body>
<header><nav>
	<a href = "login.php">registracija</a>
	<a href = "registracija.php">registracija</a>
	<a href = "promeniLozinku.php">promeniLozinku</a>
	<?php
		switch($korisnik->vrstaKorisnika){
			case 1:
			echo '';
			break;
			case 2:
			echo '';
			break;
			case 3:
			echo '<a href ="administrator.php">administrator</a>';
			break;
			default:;
		}
	?>
</nav></header>
<div></div>
<footer></footer>


<style type="text/css">
	body{
		background-color:gold;
	}
	div{
		width: 100%;
		margin-top:30vh ;
		display: flex;
	}
	form{
		margin: auto;
		border:1px black solid;
	}
</style>
</body>
</html>