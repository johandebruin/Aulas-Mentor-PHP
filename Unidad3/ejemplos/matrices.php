<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<body>
<?
	$matriz = array();
	$matriz[] = "Hola mundo";
	echo $matriz[0];
	$matriz2 = array(
		0 => "MATRIZ",
		1 => array(0=>12,1=>13),
	);
	echo $matriz2[1][0];
	
	
    // Función array_walk()

    echo "<CENTER><H1>Función array_walk()</H1></CENTER><P>";

    $muebles = array ("z"=>"mesa", "y"=>"silla", "x"=>"armario", "v"=>"cómoda");
    function cambia (&$contenido, $indice, $anexo)
    {
           $contenido = "$anexo: $contenido";
    }

    echo "<CENTER><H3>Hemos creado e inicializado la matriz \$muebles
            que contiene estos índices y elementos.<P></H3></CENTER>";
    array_walk ($muebles,'ver');
    print "<P>";
    reset ($muebles);
    array_walk ($muebles, 'cambia', 'Nombre');
    print "<P>";
    reset ($muebles);
    echo "<CENTER><H3>Con la función array_walk() hemos antepuesto al
            contenido de cada elemento <P>el prefijo \"Nombre:\" y hemos
            vuelto a usar la función array_walk() <P>para ver su contenido
            una vez modificado</H3></CENTER><P>";
    array_walk ($muebles,'ver');
    print "<P>";
?>
</body>
</html>
