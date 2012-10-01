<?
class diccionario
{
	//Atributos
	public $palabras = array();
	
	//Métodos
	function __construct()
	{
		//Al construir el objeto leemos las palabras de diccionario.txt
		$idFichero = @fopen("diccionario.txt",r)
     		or die("<b>El fichero \"diccionario.txt\" no se ha podido abrir.</b>");
		$texto = null;
		while(($caracter = fgetc($idFichero)) != null)
		{
			if($caracter != '¬') { $texto .= $caracter; }
			else
			{
				$this->palabras[] = explode("|",trim($texto));
				$texto = null;
			}
		}
		fclose($idFichero);
	}
	
	private	function coincidencia($titulo,$traduccion,$id)
	{
		for($i = 0; $i < count($this->palabras); $i++)
			if(($this->palabras[$i][1] == $titulo || $this->palabras[$i][2] == $traduccion) && ($i != $id || $id == null))
				return true;
		return false;
	}
	
	private function escribir()
	{
		//Escribe la matriz en el fichero
		$idFichero = @fopen("diccionario.txt",w)
			or die("<b>El fichero \"diccionario.txt\" no se ha podido abrir</b>");
		foreach($this->palabras as $elemento)
			fputs($idFichero,implode("|",$elemento)."¬\n");
		fclose($idFichero);
	}
	
	function mostrar($matriz,$editar,$get)
	{
		//Si deseamos algun método de ordenación lo especificamos
		if ($get != null)
			{$get2 = "?ordenar=$get"; $get = "&ordenar=$get";}
		echo "<table border='1' align='center'><tr bgcolor='#CCCCCC'>";
		echo "<td width='40%'><a href='?ordenar=titulo'><b>Titulo</b></a></td>";
		echo "<td width='40%'><a href='?ordenar=traduccion'><b>Traducción</b></a></td>";
		echo "<td><b>Operaciones</b></td></b></tr>";
		foreach($matriz as $elemento)
		{
			echo "<tr>";
			//Si estamos editando algun elemento mostramos el formulario
			if($elemento[0] == $editar)
			{				
				echo "<form method='post' action='".$_SERVER['PHP_SELF']."$get2'>";
				echo "<td><input type='text' name='titulo' size='30' value='".$elemento[1]."' maxlength='30'></td>";
				echo "<td><input type='text' name='traduccion' size='30' value='".$elemento[2]."' maxlength='30'></td>";
				echo "<input type='hidden' name='id' value='".$elemento[0]."'>";
				echo "<td><input type='submit' name='modificar' size='30' value='Modificar'></td>";
			}
			else
			{					
				printf("<td>%s</td><td>%s</td>",$elemento[1],$elemento[2]);
				printf("<td><input type='button' value='Editar' onclick=\"document.location.href='?editar=%s$get'\" />"
					,$elemento[0]);
				printf("<input type='button' value='Borrar' onclick=\"document.location.href='?borrar=%s$get'\" /></td>"
					,$elemento[0]);
			}
			echo "</tr><tr bgcolor='black'>";
		}
		echo "<form method='post' action='".$_SERVER['PHP_SELF']."$get2'>";
		echo "<td><input type='text' name='tit' size='40' maxlength='30'></td>";
		echo "<td><input type='text' name='trad' size='40' maxlength='30'></td>";
		echo "<td><input type='submit' name='nuevo' size='30' value='Añadir registro'></td>";
		echo "</tr></table>";
	}
	
	
	function buscar($criterio)
	{
		$temp = array();
		foreach($this->palabras as $elemento)
		{
			if (strpos(strtolower($elemento[1]),strtolower($criterio)) > -1
			|| strpos(strtolower($elemento[2]),strtolower($criterio)) > -1)
				$temp[] = $elemento;
		}
		return $temp;
	}
	
	function editar($id,$titulo,$traduccion)
	{
		if (!$this->coincidencia($titulo,$traduccion,$id))
		{
			for($i = 0; $i < count($this->palabras); $i++)
				if($this->palabras[$i][0] == $id)
				{
					$this->palabras[$i][1] = $titulo;
					$this->palabras[$i][2] = $traduccion;
				}
			$this->escribir();
		} else echo "Algun criterio coincide, operación abortada";
	}
	
	function borrar($id)
	{
		$borrado = false;
		$itineraciones = count($this->palabras);
		for($i = 0; $i < $itineraciones; $i++)
		{
			if($this->palabras[$i][0] == $id && !$borrado)
				{ unset($this->palabras[$i]); $borrado = true; }
			if($this->palabras[$i][0] > $id)
				$this->palabras[$i][0] += -1;
		}
		$this->escribir();
	}
	
	function añadir($titulo,$traduccion)
	{
		if (!$this->coincidencia($titulo,$traduccion,null))
		{
			$this->palabras[] = array(0=>count($this->palabras),1=>$titulo,2=>$traduccion);
			$this->escribir();
		} else echo "Algun criterio coincide, operación abortada";
	}
};

$objeto = new diccionario();
?>