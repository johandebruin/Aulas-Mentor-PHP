<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Formularios</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div style="width: 80%; background-color:#CCCCCC; margin-left:10%;"> 
<?
	if(!empty($_POST["texto1"])) $txt = $_POST["texto1"];
	else $txt = "nada";
?>
<form action="<? $_SERVER['PHP_SELF'] ?>" method="post" style="background-color:#CCCCCC">
	<input type="text" name="texto1" value="<? $txt ?>"/>
	<input type="submit" value="enviar" />
</form>
<? echo "Lo que escribistes fue: $txt" ?>

</div>
</body>
</html>
