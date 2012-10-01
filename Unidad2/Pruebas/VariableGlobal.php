<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<body>
<?
	function verVariable()
	{
		global $variable;
		echo $variable;
	}
	$variable = "AAAAAAAAA";
	
	function verVariable2()
	{
		echo $variable;
	}
		function verEstatica()
	{
		static $estatico = 0;
		$estatico++;
		echo $estatico;
	}
	verVariable();
	verVariable2();
	verEstatica();
	verEstatica();
	verEstatica();
?>
<br />
<hr />
<? echo intval("89.53Pepe es madrileño"); ?>
</body>
</html>
