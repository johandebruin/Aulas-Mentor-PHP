<? require("datos.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Actividad 1, Unidad 2</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
	<hr />
	<h1> Formula 1 </h1>
	<hr />
	Seleccione el piloto que desea consultar:
	<br /><br />
	<form action="post.php" method="POST">
		<select name="menu">		
<?
	// \t es la ruta de escape para tabular el codigo HTML
	for($i = 0; $i < sizeof($carreras); $i++)
		printf("\t\t\t<option value='%d'>%s</option> \n",$i,$carreras[$i][0]);
?>
		</select>
		<br />
		<input type="submit" value="Buscar" />
	</form>
</div>
</body>
</html>
