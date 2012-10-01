<?
	require("farmacia.php"); 
	function comparar($matriz1,$matriz2)
	{
		global $criterio;
		if(@$matriz1[$criterio] > @$matriz2[$criterio])
			return 1;
		return -1;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Farmacia</title>
	<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">

<hr />
<h1> Farmacia </h1>
<hr />

<?
	//Iniciamos los parametros
		//$borrar,$buscar,$ordenar,$editar;
	//1º Borrar
	if(isset($_GET['borrar']))
		if(!empty($_GET['borrar']) || $_GET['borrar'] == '0')
		{
			$objeto->borrar($_GET['borrar']);
			//Reinstanciamos el objeto para hacer efectivos los cambios
			$objeto = new farmacia;
		}
			
	//2º Modificar
	if(isset($_POST['modificar']))
	{
		if (@!(strcspn($_POST['nombre'].$_POST['cantidad'].$_POST['importe'],"¬|") 
			== strlen($_POST['nombre'].$_POST['cantidad'].$_POST['importe'])))
			echo "No se pudo modificar el registro porque contenia | o ¬";
		else
			$objeto->modificar($_POST['idE'],$_POST['nombreE'],$_POST['cantidadE'],$_POST['importeE']);
	}
	//3º Añadir
	if (isset($_POST['nuevo']))
	{
		if (@!(strcspn($_POST['nombre'].$_POST['cantidad'].$_POST['importe'],"¬|") 
			== strlen($_POST['nombre'].$_POST['cantidad'].$_POST['importe'])))
			echo "No se pudo añadir el registro porque contenia | o ¬";
		else
		{
			if (!is_numeric($_POST['cantidad']) || !is_numeric($_POST['importe']))
			{
				echo "La cantidad o el importe debe ser numérico";
			}
			else
			{
				$objeto->nuevo($_POST['nombre'],$_POST['cantidad'],$_POST['importe']);
				//Reinstanciamos el objeto para hacer efectivos los cambios
				$objeto = new farmacia;
			}
		}
		
	}
	//-- En este punto iniciamos la matriz
	$matriz = $objeto->medicamentos;
	//3º Buscar
	if (isset($_POST['buscar']))
	{
		if(!empty($_POST['busqueda']))
		{
			$matriz = $objeto->busqueda($_POST['busqueda'],$matriz);
			if(count($matriz) == 0)
				echo "No se encontro ningun elemento con ese criterio de búsqueda";
		}
	}
	//4º Ordenar
	if(isset($_GET['ordenar']))
	{
		if($_GET['ordenar'] > 0 && $_GET['ordenar'] < 4);
		{
			if (!((string)$_GET['ordenar'] == ""))
			{
				$criterio = @$_GET['ordenar'];
				uasort($matriz,'comparar');
			}
		}
	}
	//5º Mostrar
	@$objeto->mostrar($matriz,"?borrar=&editar=".$_GET['editar']."&ordenar=".$_GET['ordenar'],$_GET['editar']);
	$precioMaximo = 0;
	$maximo = 0;
	for($i = 0; $i < count($objeto->medicamentos); $i++)
	{
		if($objeto->medicamentos[$i][3] > $precioMaximo)
		{
			$maximo = $i;
			$precioMaximo = $objeto->medicamentos[$i][3];
		}
	}
?>
	<p><div style="width:60%; margin-left:20%"><hr />
	Buscar medicamento
	<form method="post" action="<? echo $_SERVER['PHP_SELF']; ?>">
		<input type="text" name="busqueda" />
		<input type="submit" name="buscar" value="Buscar" />
	</form>
	<hr /></div><p>
	<div style="text-align:left; margin-left:10%;">El nº de medicamentos es <b><? echo count($objeto->medicamentos); ?></b><br />
	El medicamento más caro es <b><? echo $objeto->medicamentos[$maximo][1]; ?></b> con <b><? echo $precioMaximo; ?></b></div>
	
	<div style="width:20%; margin-left:75%"><hr />
	<a href="principal.php">Regresar al listado iniciar</a><hr /></div>
</div>
</body>
</html>
