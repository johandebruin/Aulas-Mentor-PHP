<?
	if (isset($_POST['menu1'])) $elemento = $_POST['menu1'];
	else header("Location: actividad2.php");
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
		<p> El grupo <b>'<? echo reset($matriz[$elemento]); ?>'</b> tiene los siguientes elementos: </p>
		<table width="30%" border="1px" align="center">
			<tr bgcolor="#CCCCCC">
				<td><b>Nombre</b></td>
				<td><b>Nº Atómico</b></td>
			</tr>
<?
	for($i = 1; $i < sizeof($matriz[$elemento]); $i++)
	{
		echo "\t\t\t<tr>\n";
		printf("\t\t\t\t<td>%s</td>\n\t\t\t\t<td>%s</td>\n",$matriz[$elemento][$i]['simbolo']
			,$matriz[$elemento][$i]['numero']);
		echo "\t\t\t</tr>\n";		
	}
?>
		</table>
		<p> El numero total de elementos son '<b><? echo sizeof($matriz[$elemento])-1; ?></b>'.</p>
		<input type="submit" value="Volver" onclick="history.back()" />
	</div>
</body>
</html>
