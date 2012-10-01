<?
	class biblioteca
	{
		public $libros = array();
		
		//Al construir la variable definimos los libros
		function __construct()
		{
			$this->nuevoLibro("Critica de la razon pura","Immanuel Kant","Clasicos Alpaguara");
			$this->nuevoLibro("Sobre la voluntad en la naturaleza","Arthur Schopenhauer","Alianza Editorial");
			$this->nuevoLibro("El principe","Nicolás Maquiavelo","Alba libros");
			$this->nuevoLibro("Filosofia fundamental","Jaime Balmes","Barcelona");
		}
		//Por defecto PHP añadira libros con una key numérica
		private function nuevoLibro($titulo,$autor,$editorial)
		{
			if (!empty($titulo) && !empty($autor) && !empty($editorial))
				$this->libros[] = array("titulo"=>$titulo,"autor"=>$autor,"editorial"=>$editorial);
		}
		
		//Buscamos en cada titulo el criterio y devolvemos una matriz con los elementos que coinciden
		function buscar($criterio)
		{
			$temp = array();
			foreach($this->libros as $elemento)
			{
				if (strpos(strtolower($elemento["titulo"]),strtolower($criterio)) > -1
				|| strpos(strtolower($elemento["autor"]),strtolower($criterio)) > -1
				|| strpos(strtolower($elemento["editorial"]),strtolower($criterio)) > -1)
					$temp[] = $elemento;
			}
			return $temp;
		}
		
		//Muestra la tabla con los titulos contenido en la matriz
		function mostrar($matriz)
		{
			echo("<table align='center'>\n");
			echo("<tr bgcolor='#CCCCCC'>\n");
			echo("<td><b>Título</b></td><td><b>Autor</b></td><td><b>Editorial</b></td>\n");
			foreach($matriz as $elemento)
			{
				echo "<tr>\n";
				printf("<td>%s</td><td>%s</td><td>%s</td>\n",$elemento["titulo"],$elemento["autor"],$elemento["editorial"]);
				echo "</tr>\n";
			}
			echo "</table><br><br>El nº de ejemplares encontrados es de: <b>".count($matriz)."</b>";
		}
	};
?>