<?
	//Si no se inicio menu entonces redireccionamos a la pagina anterior.
	if (!isset($_POST['menu']))
		header ("Location: Actividad1.php"); 
	else
		$piloto = $_POST['menu'];
	require("datos.php");
?>
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
	<p>La clasificación de <b>'<? echo $carreras[$piloto][0]; ?>'</b> es:</p>
	<table border="1px" width="30%" align="center">
		<tr bgcolor="#CCCCCC">
			<td><b>Gran Premio</b></td>
			<td><b>Posición</b></td>
			<td><b>Puntos</b></td>
		</tr>
<?
	$puntuacionTotal = 0;
	for($i = 1; $i < sizeof($carreras[$piloto]); $i++)
	{
		echo "\t\t<tr>\n";
		printf("\t\t\t<td>%s</td>\n\t\t\t<td>%s</td>\n\t\t\t<td>%d</td>\n",$carreras[$piloto][$i][0]
			,$carreras[$piloto][$i][1],obtenerPuntuacion($carreras[$piloto][$i][1]));
		echo "\t\t</tr>\n";
		$puntuacionTotal += obtenerPuntuacion($carreras[$piloto][$i][1]);
	}
?>
	</table>
	<p>Numero total de puntos conseguidos en el campeonato: <b><? echo $puntuacionTotal; ?></b></p>
	<input type="submit" value="Volver" onclick="history.back()" />
	</div>
</body>
</html>
