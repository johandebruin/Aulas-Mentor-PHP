<?
	require("biblioteca.php");
	$miBiblioteca = new biblioteca;
	function comparar($matriz1,$matriz2)
	{
		if($matriz1['titulo'] > $matriz2['titulo'])
			return 1;
		return -1;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Bibliteca</title>
	<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="wrapper">
	<hr />
	<h1>Biblioteca</h1>
	<div style="text-align: left; margin-left:10%">
	<b><u>
	Buscar ejemplar:</u></b>
	<form action="<? echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="text" name="criterio" />
		<input type="submit" value="Buscar" name="enviar" /><br />
		<input type="submit" value="Ver listado completo" name="enviar" /><br />
		<input type="submit" value="Ver listado completo ordenado" name="enviar" />
	</form>
	</div>
	<hr />
<?
	if (isset($_POST["enviar"]))
	switch($_POST["enviar"])
	{
		case "Buscar":
			if(isset($_POST["criterio"]) && !empty($_POST["criterio"]))
			{
				echo "<p>Ejemplares que contienen '<b>".$_POST['criterio']."</b>' en 'titulo', 'autor', o 'editorial':</p>";
				$miBiblioteca->mostrar($miBiblioteca->buscar($_POST["criterio"]));
			}
			else
				echo "No se encontro ningun valor en el campo";
			break;
		case "Ver listado completo":
			$miBiblioteca->mostrar($miBiblioteca->libros);
			break;
		case "Ver listado completo ordenado":
			$temp = $miBiblioteca->libros;
			uasort($temp,'comparar');
			$miBiblioteca->mostrar($temp);
			break;
	}
?>
	</div>
</body>
</html>
