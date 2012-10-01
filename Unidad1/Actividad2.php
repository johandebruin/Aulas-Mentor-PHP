<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?
	//Iniciamos la matriz
	$matriz = array
	(
		0 => array(0 => "Alemania", 1 => "Marco alemán", 2 => 1.9558),
		1 => array(0 => "España", 1 => "Peseta", 2 => 166.386),
		2 => array(0 => "Francia", 1 => "Marco francés", 2 => 6.5596),
		3 => array(0 => "Bélgica", 1 => "Franco belga", 2 => 40.3399),
		4 => array(0 => "Italia", 1 => "Lira italiana", 2 => 1936.27),
		5 => array(0 => "Portugal", 1 => "Escudo portugués", 2 => 200.482)
	)
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Actividad2-Unidad1</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<hr />
	<h1>Cambio de monedas europeas</h1>
	<hr />
	<table align="center" border="1px" width="35%">
		<tr>
			<td> <b> País</b> </td>
			<td> <b> Moneda</b> </td>
			<td> <b> Cambio</b> </td>
		</tr>
	<?
		$maximo = 0;
		//Itineramos todas las filas de la matriz
		for($i = 0; $i < sizeof($matriz); $i++)
		{
			//Si existe una moneda mas alta que las detectadas hasta ahora lo almacenamos en $maximo
			if($matriz[$i][2] > $matriz[$maximo][2]) $maximo = $i;
			printf("<tr><td>%s</td><td>%s</td><td>%.4f</td></tr> \n",$matriz[$i][0],$matriz[$i][1],$matriz[$i][2]);
		}
	?>
	</table>
	<? printf ("<b>El tipo de cambio más alto es de %s con %s",$matriz[$maximo][0],$matriz[$maximo][2]) ?>
</body>
</html>
