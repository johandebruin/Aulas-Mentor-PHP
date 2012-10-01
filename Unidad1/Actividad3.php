<?
//Iniciamos la matriz
$matriz = array
(
	array ("Origen" => "Madrid", "Destino" => "Segovia", "Distancia" => 90201),
	array ("Origen" => "Madrid", "Destino" => "A Coruña", "Distancia" => 596887),
	array ("Origen" => "Barcelona", "Destino" => "Cádiz", "Distancia" => 1152669),
	array ("Origen" => "Bilbao", "Destino" => "Valencia", "Distancia" => 622233),
	array ("Origen" => "Sevilla", "Destino" => "Santander", "Distancia" => 832067),
	array ("Origen" => "Oviedo", "Destino" => "Badajoz", "Distancia" => 682429)
)
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Actividad 3, unidad 1</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<hr />
	<h1> Viaje </h1>
	<hr />
	<table border="1px" align="center" width="30%">
		<tr>
			<td><b>Origen</b></td>
			<td><b>Destino</b></td>
			<td><b>Distancia (km)</b></td>
		</tr>
<?
	$longitudMaxima = 0;
	$cadena = "";
	//Usamos foreach para no repetir la azaña del ejericico anterior
	foreach($matriz as $temp1)
	{
		if ($temp1["Distancia"] > $longitudMaxima)
		{
			$longitudMaxima = $temp1["Distancia"];
			//Debemos formatear la cadena ahora debido a la inexistencia de indices.
			$cadena = "La distancia entre".$temp1["Origen"]." y ".$temp1["Destino"]
				." es ".number_format($temp1["Distancia"],0,",",".");
		}
		//Usamos numberformat como separador de decimales y de miles, establecemos a 0 el numero
		//de decimales que queremos monstrar.
		printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>"
			,$temp1["Origen"],$temp1["Destino"],number_format($temp1["Distancia"],0,",","."));
	}
?>	
	</table>
	<br />
	<b> <? printf("%s",$cadena); ?> </b>
		
</body>
</html>
