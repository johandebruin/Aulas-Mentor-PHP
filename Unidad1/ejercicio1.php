<HTML>
<HEAD><TITLE>Alumn@s escaliz@dos por cada 1000 habitantes</TITLE></HEAD>
<BODY>

<CENTER>
<H3>Alumn@s escaliz@dos por cada 1000 habitantes </H3>
  
<?
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
<?
    //$numeroelementos = 15;
	for($i = 0; $i < sizeof($matriz); $i++)
	{
		echo $matriz[$i][0];
	}
?>

</CENTER>
</BODY>
</HTML> 