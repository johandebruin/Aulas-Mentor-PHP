<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Actividad 1</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>
	<?
	//Iniciamos declarando la matriz
	$matriz = array
	(
		0 => array(0 => "Andalucia", 1 => 593.6),
		1 => array(0 => "Aragón", 1 => 600.3),
		2 => array(0 => "Asturias", 1 => 582.9),
		3 => array(0 => "Baleares", 1 => 489.7),
		4 => array(0 => "Canarias", 1 => 573.2),
		5 => array(0 => "Cantabria", 1 => 551.5),
		6 => array(0 => "Castilla y León", 1 => 645.3),
		7 => array	(0 => "Castilla la Mancha", 1 => 555.8),
		8 => array(0 => "Cataluña", 1 => 568.3),
		9 => array(0 => "Comunidad Valenciana", 1 => 561.1),
		10 => array(0 => "Extremadura", 1 => 584.3),
		11 => array(0 => "Galicia", 1 => 600.1),
		12 => array(0 => "Madrid", 1 => 613.3),
		13 => array(0 => "Murcia", 1 => 564.7),
		14 => array(0 => "Navarra", 1 => 638.1),
		15 => array(0 => "País Vasco", 1 => 637.5),
		16 => array(0 => "La Rioja", 1 => 562.4),
		17 => array(0 => "Ceuta", 1 => 539.7),
		18 => array(0 => "Melilla", 1 => 569.8)
	)			
	?>
	<hr />
	<h1> Alumn@s escaliz@dos por cada 1000 habitantes </h1>
	<hr />
	<table align="center" border="1px">
		<tr>
			<td> <b> Comunidad autónoma</b> </td>
			<td> <b> Número de alumnos</b> </td>
			<td> <b> % de escolarización</b> </td>
		</tr>
		<?
		$suma = 0;
		for($i = 0; $i < 19; $i++)
		{
			$suma += $matriz[$i][1];
			printf("<tr><td>%s</td><td>%05.1f</td><td>%05.2f</td></tr> \n",$matriz[$i][0],$matriz[$i][1],$matriz[$i][1] / 10);
		}
	?>	
	</table>
	<br />
	<? printf("<b>El porcentaje total medio de escolarización es de %05.2f</b>",$suma/190); ?>

<body>
</body>
</html>
