<?php
 require_once __DIR__ . '/tabele/Korisnik.php';
require_once __DIR__ . '/config.php';
session_start();
$korisnici = Korisnik::getAllKorisnici();
$brojKorisnika = count($korisnici);
if(empty($_GET['stranica']))$_GET['stranica']=1;
$stranica = intval($_GET['stranica']);
var_dump(Korisnik::isAdmin($_SESSION['id']));
?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<header>
<nav>
	<a href="index.php">glavnaStrana</a>
	<a href="administrator.php">korisnici</a>
	<a href="administratorLokacije.php">lokacije</a>
</nav>
</header>
<div class = "users">
	<table>
		<thead></thead>
		<tbody>
			<?php for($i=$stranica-1;$i<$stranica*10;$i++):?>
			<?php 
			if(!isset($korisnici[$i]))break;
			$vk = $korisnici[$i]->vrstaKorisnika;
			?>
			<?='<tr>'?>
			<?= '<td>'.$korisnici[$i]->id.'</td>';?>
			<?= '<td>'.$korisnici[$i]->ime.'</td>';?>
			<?= '<td>'.$korisnici[$i]->prezime.'</td>';?>
			<?= '<td>'.$korisnici[$i]->korisnickoIme.'</td>';?>
			<?= '<td><form method="post" action="logika/adminPromenaSifre.php">
			<input type="hidden" name="id" value="'.$korisnici[$i]->id.'"">
			<input type="text" name="lozinka" placeholder="lozinka"><br>
			<input type="submit" value="Promeni Sifru Korisniku">
			</form></td>';?>
			<?= '<td>'.$korisnici[$i]->adresa.'</td>';?>
			<?= '<td>'.$korisnici[$i]->grad.'</td>';?>
			<?= '<td>'.$korisnici[$i]->telefon.'</td>';?>
			<?= '<td>'.$korisnici[$i]->mejl.'</td>';?>
			<?= '<td>'.vrstaKorisnika[$vk].'</td>';?>
			<?= '<td>'.$korisnici[$i]->timestamp.'</td>';?>
			<?= '<td><form method="post" action="logika/adminPromeniUlogu.php">
			<input type="hidden" name="id" value="'.$korisnici[$i]->id.'"">
			<select id="vk" name="vk">
  			<option value="1"'.(($vk==1)?'selected':'').'>korisnik</option>
  			<option value="2"'.(($vk==2)?'selected':'').'>blagajnik</option>
  			<option value="3"'.(($vk==3)?'selected':'').'>administrator</option>
			</select>
			<input type="submit" value="Promeni Vrstu Korisniku">
			</form></td>';?>
			<?='</tr>'?>
			<?php endfor;?>
		</tbody>
	</table>
</div>
<div class = "pages">
	<?php for($i=0;$i<=$brojKorisnika/10;$i++):?>
	<?= '<a href=http://localhost/finalPraksa/administrator.php?stranica="'.($i+1).'">'.($i+1).'</a>';?>
	<?php endfor;?>
</div>
<footer></footer>
</body>
</html>