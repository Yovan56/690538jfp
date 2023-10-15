<?php ?>
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
</nav></header>
<div>
	<form id = "forma" action = "logika/logovanje.php"method="post">
	
	<input type="text" name="korisnickoIme" placeholder="korisnicko ime" required><br>
	<input type="text" name="lozinka" placeholder="lozinka" required><br>
	<input type="submit" name="submit">

</form>
</div>
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