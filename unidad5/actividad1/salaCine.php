<?
class salaCine
{
	//Atributos
	public $datos = array();
	public $asientos = array();
	
	//Métodos
	function __construct()
	{
		//obtenemos el archivo de texto
		$idFichero = fopen("asientos.txt","r")
			or die("No se pudo abrir el fichero asientos.txt");
		//Leemos la primera linea de datos del fichero
		$primeraLinea = true;
		$texto = "";
		while(($char = fgetc($idFichero)) != null)
		{
			if($primeraLinea && $char == "¬")
			{
				$primeraLinea = false;
				$this->datos = explode("|",$texto);
				$texto = "";
				continue;
			}
			$texto .= $char;
		}
		$temp = explode("¬",$texto);
		while (list($indice,$valor)=each($temp))   
			$this->asientos[$indice] = explode("|",trim($valor));
	}
	
	function comprobarCookie($f,$c)
	{
		foreach($_COOKIE["asientos"] as $fila=>$value)
			if($fila == $f)
				foreach($value as $columna=>$ocupado)
					if($columna == $c && $ocupado == "1")
						return true;
		return false;
	}
	
	function mostrar()
	{
		echo "<table border='0' cellspacing='3' cellpadding='0' align='center'>";
		echo '<tr><td id="resaltado">Numero de sala</td><td> '. $this->datos[0] . '</td>';
		echo '<td id="resaltado">Nombre de la película</td><td>'. $this->datos[1] . '</td></tr>';
		echo '<tr><td id="resaltado">Sesión</td><td>Hora: '.$this->datos[2].'</td>';
		echo '<td id="resaltado">Día</td><td>' .$this->datos[3].'</td></tr></table>';
		
		//Ahora mostramos la tabla de asientos
		echo "<br>";
		echo "<table BORDER='0' cellspacing='3' cellpadding='0' align='center'>";
		$ultimaFila = "<tr>";
		for($i = 0; $i < count($this->asientos);$i++)
		{
			echo "<tr><td style='border-color:#99CCFF;'><font size=1>". ($i+1) ."</font></td>";
			foreach($this->asientos[$i] as $key=>$value)
			{
				//Si se va a devolver
				if(isset($_COOKIE["asientos"]) && $this->comprobarCookie($i,$key))
				{
					echo "<td bgcolor=orange>";
					echo "<a href='?accion=devolver&f=$i&c=$key'>";
					echo "<img src='1px.gif' height=10 width=10 border=1 />";
				}
				//si ya esta comprado
				else if($this->asientos[$i][$key] == "1")
				{
					echo "<td bgcolor=red>";
					echo "<a href='?accion=error&f=$i&c=$key'>";
					echo "<img src='1px.gif' height=10 width=10 border=1 />";
					
				}
				else
				{
					echo "<td bgcolor=lime>";
					echo "<a href='?accion=comprar&f=$i&c=$key'>";
					echo "<img src='1px.gif' height=10 width=10 border=1 />";
				}
				echo "</a></td>";
			}
			echo "</tr>";
		}
		echo "<tr><td></td>";
		//La numeración de la última fila
		for($i = 1; $i <= count($this->asientos[0]); $i++)
			echo "<td style='border-color:#99CCFF;'><font size=1>$i</font></td>";
		echo "</tr>";
		echo "</table>";
	}
	
	function escribir()
	{
		$idFichero = fopen("asientos.txt","w")
			or die("No se pudo abrir el fichero asientos.txt");
			
		fputs($idFichero,implode("|",$this->datos)."¬");
		foreach($this->asientos as $key=>$value)
		{
			if($key + 1 != count($this->asientos))
				fputs($idFichero,implode("|",$value)."¬");
			else
				fputs($idFichero,implode("|",$value));
		}
		
	}
	
	function comprar($fila,$columna)
	{
		if($this->asientos[$fila][$columna] == "1")
			{echo "Ese asiento ya fue comprado"; return false;}
		else if (isset($_COOKIE["x"]) && $this->comprobarCookie($fila,$columna))
			{echo "Ya comprastes ese asiento"; return false;}
		else if (isset($_COOKIE["numero"]) && $_COOKIE["numero"] == 5)
			{echo "Has comprado el número máximo de asientos permitidos (5)"; return false;}
		else
		{
			$this->asientos[$fila][$columna] = "1";
			setcookie("asientos[$fila][$columna]","1",time()+300);
			if (isset($_COOKIE["numero"]))
				setcookie("numero",$_COOKIE["numero"]+1,time()+300);
			else
				setcookie("numero","1",time()+300);
			$this->escribir();
			return true;
		}
	}
	
	function devolver($fila,$columna)
	{
		if($this->comprobarCookie($fila,$columna) && $this->asientos[$fila][$columna] == "1")
		{
			setcookie("asientos[$fila][$columna]","",time() - 3600);
			setcookie("numero",$_COOKIE["numero"]-1,time()+300);
			$this->asientos[$fila][$columna] = "0";
			$this->escribir();			
		}
	}
};

$objeto = new salaCine();
?>