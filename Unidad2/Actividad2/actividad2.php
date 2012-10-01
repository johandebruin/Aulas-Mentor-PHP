<?
	require("datos.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Actividad 2.2</title>
	<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="wrapper">
		<hr />
		<h1> Tabla periódica de los elementos</h1>
		<hr />
		<form action="post.php" method="POST">
			<p>
			<select name="menu1">
<?
	for($i = 0; $i < count($matriz); $i++)
		printf("\t\t\t\t<option value=\"%s\">%s</option>\n",$i,reset($matriz[$i]));
?>
			</select>
			</p>
			<input type="submit" value="Buscar" />
		</form>
	</div>
</body>
</html>
