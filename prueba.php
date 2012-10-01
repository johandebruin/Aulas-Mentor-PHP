<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<body>
<?
$mensaje = "Sidney Young es un hombre fascinado y desilusionado por el mundo de la moda y las celebridades, que tiene su propio apartado en una revista alternativa. Todo cambiará cuando le quieran contratar para un mejor puesto en una revista de relevancia... Eso sí, su labor será diametralmente opuesta.<br /><br />[img width=317 height=450]http://www.notasdecine.es/files/2009/06/nueva-york-para-principiantes-poster-y-trailer-en-espanol.jpg[/img]<br /><br />[url=http://www.megavideo.com/?v=3TBH92RD]http://www.megavideo.com/?v=3TBH92RD[/url]";

    $imagenStart = strpos($mensaje,"]")+1;
	echo $imagenStart;
	$imagenFin = strpos($mensaje,"[/img]");
	echo "<br>".$imagenFin."<br>";
	echo substr($mensaje,$imagenStart,$imagenFin-$imagenStart);
?>
</body>
</html>
