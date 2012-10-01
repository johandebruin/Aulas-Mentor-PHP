<?
	require("coleccion.php");
	$miColeccion = new coleccion;
	function comparar($matriz1,$matriz2)
	{
		global $criterio;
		if($matriz1[$criterio] > $matriz2[$criterio])
			return 1;
		return -1;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Colección de discos</title>
	<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
	<hr />
	<h1>Colección de Discos</h1>
	<div style="text-align: left; margin-left:10%">
	<form action="<? echo $_SERVER['PHP_SELF']; ?>" method="post">
	<u><b>Buscar disco</b><br /></u> <input type="text" name="busqueda" /><input type="submit" value="Buscar" name="enviar" /><br />
	<input type="submit" value="Mostrar lista" name="enviar" /><br />
	<select name="menu1">
		<option value="titulo">Titulo</option>
		<option value="interprete">Interprete</option>
		<option value="discografia">Discografia</option>
		<option value="año">Año</option>
	</select>
	<input type="submit" value="Ordenar lista" name="enviar" />
	</form>
	</div>
	<hr />
<?
	if (isset($_POST["enviar"]))
	switch($_POST["enviar"])
	{
		case "Buscar":
			if(isset($_POST["busqueda"]) && !empty($_POST["busqueda"]))
			{
				echo "<p>Ejemplares que contienen '<b>".$_POST['busqueda']."</b>' en 'titulo', 'autor', o 'editorial':</p>";
				$miColeccion->mostrar($miColeccion->buscar($_POST["busqueda"]));
			}
			else
				echo "No se encontro ningun valor en el campo";
			break;
		case "Mostrar lista":
			$miColeccion->mostrar($miColeccion->discos);
			break;
		case "Ordenar lista":
			$temp = $miColeccion->discos;
			$criterio = $_POST["menu1"];
			uasort($temp,'comparar');
			$miColeccion->mostrar($temp);
			break;
	}
?>
</div>
</body>
</html>
