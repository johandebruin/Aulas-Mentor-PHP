<?
define("PASV",true); //Activa modo pasivo
function ConectarFTP()
{
	//Permite conectarse al Servidor FTP
	$id_ftp=ftp_connect("www.pacojuegos.com"); //Obtiene un manejador del Servidor FTP
	ftp_login($id_ftp,"pacojueg","plTyUKPTmm"); //Se loguea al Servidor FTP
	return $id_ftp; //Devuelve el manejador a la función
}
$id_ftp = ConectarFTP();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<body>
<?
	$matriz = ftp_nlist($id_ftp, "/public_html/multimedia/imagenes");
	ftp_chdir($id_ftp, '/public_html/multimedia/imagenes/');
	foreach($matriz as $indice => $valor)
	{
		echo $valor;
		$newname = strtolower($valor);
		if ( ftp_rename($id_ftp,$valor,$newname) )
			echo "Cambiado $valor a $newname";
	}
	$matriz = ftp_nlist($id_ftp, "/public_html/multimedia/imagenes");
    echo "<PRE>";
    print_r ($matriz);
    echo "</PRE>";

?>
</body>
</html>
