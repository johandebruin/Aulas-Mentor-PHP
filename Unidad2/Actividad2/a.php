<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?
$libros = array
(
     array("titulo"=>"Harry Potter","autor=>"Rowlin"),
     array("titulo"=>"Critica de la razón pura","autor"=>"Kant"),
)
//Con esta función comparamos dos elementos del indice citado en criterio
function comparar($matriz1,$matriz2,$criterio)
{
     if($matriz1[$criterio] > $matriz2[$criterio])
          return 1;
     return -1;
}
uasort($libros,'comparar',"titulo");
print_r("<PRE>".$libros."</PRE>); //Imprime la matriz ordenada por libros
?>
</body>
</html>
