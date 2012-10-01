<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Cine</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>
<? require("salaCine.php"); ?>
<div id="wrapper">
	<hr />
	<h1>Comprar entradas de cine</h1>
	<hr />
<?
	if( isset($_GET["accion"]) && !empty($_GET["accion"]))
	{
		switch($_GET["accion"])
		{
			case "comprar":
				if ($objeto->comprar($_GET["f"],$_GET["c"]))
					header("Location: principal.php");
				break;
			case "devolver":
				$objeto->devolver($_GET["f"],$_GET["c"]);
				header("Location: principal.php");
				break;
			case "error":
				echo "No puedes comprar un asiento que ya fue vendido";
				break;
		}
	}
	$objeto->mostrar();
?>
	<p>Nota: Solo se pueden reservar un máximo de 5 asientos.</p>
	<table align="center">
		<tr>
			<td bgcolor=lime><img src='1px.gif' height=15 width=15 border=1 /></td>
			<td>Asiento libre</td>
		</tr>
		<tr>
			<td bgcolor=red><img src='1px.gif' height=15 width=15 border=1 /></td>
			<td>Asiento ocupado</td>
		</tr>
		<tr>
			<td bgcolor=orange><img src='1px.gif' height=15 width=15 border=1 /></td>
			<td>Asiento reservado</td>
		</tr>
	</table>
</div>
</body>
</html>
