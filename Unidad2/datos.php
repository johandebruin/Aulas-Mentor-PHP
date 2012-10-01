<?
	$carreras = array
	(
		0 => array
		(
			0 => "Fernando Alonso", 
			1 => array ( 0 => "Bharein", 1 => "1" ),
			2 => array ( 0 => "Malasia", 1 => "2" ),
			3 => array ( 0 => "Australia", 1 => "1" ),
			4 => array ( 0 => "S.Marino", 1 => "2" ),
			5 => array ( 0 => "Europa", 1 => "2" ),
			6 => array ( 0 => "España", 1 => "1" ),
			7 => array ( 0 => "Mónaco", 1 => "1" ),
		),
		1 => array
		(
			0 => "Michael Schumacher",
			1 => array ( 0 => "Bharein", 1 => "2" ),
			2 => array ( 0 => "Malasia", 1 => "6" ),
			3 => array ( 0 => "Australia", 1 => "Abandono" ),
			4 => array ( 0 => "S.Marino", 1 => "1" ),
			5 => array ( 0 => "Europa", 1 => "1" ),
			6 => array ( 0 => "España", 1 => "2" ),
			7 => array ( 0 => "Mónaco", 1 => "5" ),
		),
		2 => array
		(
			0 => "Felipe Massa",
			1 => array ( 0 => "Bharein", 1 => "9" ),
			2 => array ( 0 => "Malasia", 1 => "5" ),
			3 => array ( 0 => "Australia", 1 => "Abandono" ),
			4 => array ( 0 => "S.Marino", 1 => "4" ),
			5 => array ( 0 => "Europa", 1 => "3" ),
			6 => array ( 0 => "España", 1 => "4" ),
			7 => array ( 0 => "Mónaco", 1 => "9" ),
		),
		3 => array
		(
			0 => "Giancarlo Fisichella",
			1 => array ( 0 => "Bharein", 1 => "Abandono" ),
			2 => array ( 0 => "Malasia", 1 => "1" ),
			3 => array ( 0 => "Australia", 1 => "5" ),
			4 => array ( 0 => "S.Marino", 1 => "8" ),
			5 => array ( 0 => "Europa", 1 => "6" ),
			6 => array ( 0 => "España", 1 => "3" ),
			7 => array ( 0 => "Mónaco", 1 => "6" ),
		),
		4 => array
		(
			0 => "Kimi Raikkonen",
			1 => array ( 0 => "Bharein", 1 => "3" ),
			2 => array ( 0 => "Malasia", 1 => "Abandono" ),
			3 => array ( 0 => "Australia", 1 => "2" ),
			4 => array ( 0 => "S.Marino", 1 => "5" ),
			5 => array ( 0 => "Europa", 1 => "4" ),
			6 => array ( 0 => "España", 1 => "5" ),
			7 => array ( 0 => "Mónaco", 1 => "Abandono" ),
		),
		5 => array
		(
			0 => "Jenson Button",
			1 => array ( 0 => "Bharein", 1 => "4" ),
			2 => array ( 0 => "Malasia", 1 => "3" ),
			3 => array ( 0 => "Australia", 1 => "Abandono" ),
			4 => array ( 0 => "S.Marino", 1 => "7" ),
			5 => array ( 0 => "Europa", 1 => "Abandono" ),
			6 => array ( 0 => "España", 1 => "6" ),
			7 => array ( 0 => "Mónaco", 1 => "11" ),
		)
	);
	
	//Funciones de gestión de datos
	function obtenerPuntuacion($posicion)
	{
		switch($posicion)
		{
			case "1": return 10;
			case "2": return 8;
			case "3": return 6;
			case "4": return 5;
			case "5": return 4;
			case "6": return 3;
			case "7": return 2;
			case "8": return 1;
			default: return 0;
		}
	}
?>