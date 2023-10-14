
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="js/jquery-3.7.1.js"></script>
	<script>
		$(document).ready(function() {
			
			$("#forma").submit(function (e) {
			   	e.preventDefault();
			   	var form = $(this);
			   	var ime = form.find("[name='ime']").val();
			   	var prezime = form.find("[name='prezime']").val();
			   	var korisnickoIme = form.find("[name='korisnickoIme']").val();
			   	var mejl = form.find("[name='mejl']").val();
			   	var lozinka = form.find("[name='lozinka']").val();
			   	var ponovi_lozinka = form.find("[name='ponovi_lozinka']").val();
			   	var telefon = form.find("[name='telefon']").val();
			   	var adresa = form.find("[name='adresa']").val();
			   	var grad = form.find("[name='grad']").val();
			   
			    $.ajax({
			    	url: form.attr('action'),
			    	method: form.attr('method'),
			    	data:{
			    		'ime':ime,
			    		'prezime':prezime,
			    		'korisnickoIme':korisnickoIme,
			    		'mejl':mejl,
			    		'lozinka':lozinka,
			    		'telefon':telefon,
			    		'adresa':adresa,
			    		'grad':grad
			    	},
			    	success:function(odgovor){
			    		console.log('success');
			    	},
			    	error:function(){
			    		console.log('error');
			    	}

			    });
			
			   	
			});

		});
	</script>
</head>
<body>
	<div id ="divForma">
<form id = "forma" action = "logika/registruj.php"method="post">
	<input type="text" name="ime" placeholder="ime" required><br>
	<input type="text" name="prezime" placeholder="prezime" required><br>
	<input type="text" name="korisnickoIme" placeholder="korisnicko ime" required><br>
	<input type="text" name="lozinka" placeholder="lozinka" required><br>
	<input type="text" name="ponovi_lozinka" placeholder="ponovi lozinku" required><br>
	<input type="text" name="telefon" placeholder="telefon" required><br>
	<input type="text" name="mejl" placeholder="mejl" required><br>
	<input type="text" name="adresa" placeholder="adresa" required><br>
	<input type="text" name="grad" placeholder="grad" required><br>
	<input type="submit" name="submit">

</form>
</div>
</body>
</html>