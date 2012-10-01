<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cadenas</title>
</head>
<body>
<?
	echo strspn("aaea","aaoa");
	echo substr("Hola mundo",-5,4);
	echo substr_replace("Memorias de África","en",9,2);
	echo "<p>";
	$cadena = "Esta es una cadena de ejemplo";
	$tok = strtok ($cadena," ");
	while ($tok)
	{	
    	echo "Palabra=$tok<br>";
    	$tok = strtok (" ");
	}
	echo "</p>";
	$variables="nom=Nacho&ape1=Roa&ape2=Bastos";
	parse_str($variables);
	echo $nom;
?>
</body>
</html>
