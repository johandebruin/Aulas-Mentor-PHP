<?
	require("diccionario.php");
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
<title>Diccionario</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
	<hr />
	<h1>Diccionario</h1>
	<hr />
<?
	//Operaciones
	if(isset($_POST['modificar']))
		$objeto->editar($_POST['id'],$_POST['titulo'],$_POST['traduccion']);
	if(isset($_GET['borrar']))
	{
		@$objeto->borrar($_GET['borrar']);
		if(isset($_GET['ordenar'])) $get = "?ordenar=".$_GET['ordenar'];
		//Si estabamos buscando devolvemos los resultados en función a la busqueda
		if(isset($_GET['busqueda'])) $get = "?busqueda=".$_GET['busqueda'];
		header ("Location: principal.php$get"); 
	}
	if(isset($_POST['buscar']))
		header ("Location: principal.php?busqueda=".$_POST['busqueda']);
	if(isset($_POST['nuevo']))
		//Debemos evitar que contengan | ¬ o esten vacios
		if(!empty($_POST['tit']) && !empty($_POST['trad']) 
		 && strcspn($_POST['tit'].$_POST['trad'],"¬|") == strlen($_POST['tit'].$_POST['trad']))
			$objeto->añadir($_POST['tit'],$_POST['trad']);
		else echo "Campos vacios o caracateres '¬' o '|' encontrados";

	//Aqui los distintos criterios de muestreo
	if(isset($_GET['busqueda']))
		@$objeto->mostrar($objeto->buscar($_GET['busqueda']),$_GET['editar'],$_GET['ordenar']."&busqueda=".$_GET['busqueda']);
	else if(isset($_GET['ordenar']))
	{
		if ($_GET['ordenar'] == "traduccion") $criterio = 2;
		else $criterio = 1;
		$temp = $objeto->palabras;
		uasort($temp,'comparar');
		@$objeto->mostrar($temp,$_GET['editar'],$_GET['ordenar']);
	}
	else @$objeto->mostrar($objeto->palabras,$_GET['editar'],$_GET['ordenar']);
?>
	<p><div style="width:60%; margin-left:20%"><hr />
	Buscar palabra o traducción
	<form method="post" action="<? echo $_SERVER['PHP_SELF']; ?>">
		<input type="text" name="busqueda" />
		<input type="submit" name="buscar" value="Buscar" />
	</form>
	<hr /></div><p>
	Hay <b><? echo count($objeto->palabras); ?></b> palabras en el diccionario
	<p><a href="principal.php">Ver listado inicial</a>
</div>
</body>
</html>
