<?
class farmacia
{
	//Atributos
	public $medicamentos = array();
	
	//Métodos
	function __construct()
	{
		$idFichero = fopen("medicamentos.txt",'r')
			or die("No se pudo abrir el archivo medicamentos.txt");
		$texto = null;
		while(($caracter = fgetc($idFichero)) != null)
		{
			if($caracter != '¬') { $texto .= $caracter; }
			else
			{
				$this->medicamentos[] = explode("|",trim($texto));
				$texto = null;
			}
		}
		fclose($idFichero);
	}
	
	function mostrar($matriz,$parametros,$editar)
	{
		echo '<table align="center">';
		printf("<tr><td><a href='principal.php%s'>Nombre del medicamento</a></td>",
			ereg_replace('ordenar=[^&]*','ordenar=1',$parametros));
		printf("<td><a href='principal.php%s'>Cantidad</a></td>",
			ereg_replace('ordenar=[^&]*','ordenar=2',$parametros));
		printf("<td><a href='principal.php%s'>Importe</a></td></tr>",
			ereg_replace('ordenar=[^&]*','ordenar=3',$parametros));
		foreach($matriz as $elemento)
		{
			if($elemento[0] == $editar)
			{
				//No mandamos ningun valor en el parametro editar para no volver a editarlo
				printf("<form method='post' action='principal.php%s'>"
					,ereg_replace('editar=[^&]*',"editar=",$parametros));
				printf("<tr><td><input type='text' name='nombreE' value='%s'></td>",$elemento[1]);
				printf("<td><input type='text' name='cantidadE' value='%s'></td>",$elemento[2]);
				printf("<td><input type='text' name='importeE' value='%s'></td>",$elemento[3]);
				printf("<input type='hidden' name='idE' value='%s' />",$elemento[0]);
				print("<td><input type='submit' name='modificar' value='Modificar'></tr>");
			}
			else
			{
				printf("<tr><td>%s</td><td>%s</td><td>%s</td>",$elemento[1],$elemento[2],$elemento[3]);
				//Empleamos la expresión regular editar=[^&]* para reemplazar el antiguo parametro de editar
				printf("<td><input type='button' onclick=\"document.location.href='principal.php%s'\" value='editar' />"
					,ereg_replace('editar=[^&]*',"editar=".$elemento[0],$parametros));
				printf("<input type='button' onclick=\"document.location.href='principal.php%s'\" value='borrar' /></td></tr>"
					,ereg_replace('borrar=[^&]*',"borrar=".$elemento[0],$parametros));
			}
		}
		print("<form method='post' action='principal.php'>");
		echo "<tr><td><input type='text' name='nombre' value=''></td>";
		echo "<td><input type='text' name='cantidad' value=''></td>";
		echo "<td><input type='text' name='importe' value=''></td>";
		echo "<td><input type='submit' name='nuevo' value='Añadir'></td></tr>";
		echo "</table>";
	}
	
	private function escribir($matriz)
	{
		$id_fichero = fopen("medicamentos.txt",'w')
			or die("No se pudo abrir el archivo medicamentos.txt");
		foreach($matriz as $elemento)
			fputs($id_fichero,implode("|",$elemento)."¬");
		fclose($id_fichero);
	}
	
	private function comprobarNombre($nombre,$id)
	{
		if($nombre == null)
			return false;
		foreach($this->medicamentos as $elemento)
			if($nombre == $elemento[1] && $id != $elemento[0])
				return false;
		return true;
	}
	
	public function borrar($id)
	{
		$matriz = array();
		$o = 0;
		for($i = 0; $i < count($this->medicamentos); $i++)
			if($i != $id)
				$matriz[] = array(count($matriz), 1=>$this->medicamentos[$i][1]
					,2=>$this->medicamentos[$i][2], 3=>$this->medicamentos[$i][3]);
		$this->escribir($matriz);
		$this->medicamentos = $matriz;
	}
	
	public function modificar($id,$_1,$_2,$_3)
	{
		if ($this->comprobarNombre($_1,$id))
		{
			for($i = 0; $i < count($this->medicamentos); $i++)
				if($this->medicamentos[$i][0] == $id)
				{
					$this->medicamentos[$i][1] = $_1;
					$this->medicamentos[$i][2] = $_2;
					$this->medicamentos[$i][3] = $_3;
				}
			$this->escribir($this->medicamentos);
		} else echo "El nombre de ese medicamento ya existe o el campo está vacio";
	}
	
	public function nuevo($_1,$_2,$_3)
	{
		if($this->comprobarNombre($_1,null))
		{
			$this->medicamentos[] = array(0=>count($this->medicamentos),1=>$_1,2=>$_2,3=>$_3);
			$this->escribir($this->medicamentos);
		} else echo "El nombre de ese medicamento ya existe o el campo está vacio";
	}
	
	public function busqueda($criterio,$matriz)
	{
		$matriz2 = array();
		foreach($matriz as $elemento)
		{
			if(strpos($elemento[1],$criterio) > -1)
				$matriz2[] = $elemento;
		}
		return $matriz2;
	}
};

$objeto = new farmacia();
?>