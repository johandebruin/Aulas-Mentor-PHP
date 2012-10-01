<?
class coleccion
{
	//Atributos
	public $discos = array();	
	
	//Métodos
	function __construct()
	{
		$this->discos[] = array("titulo"=>"Por la boca vive el pez","interprete"=>"Fito y Fitipaldis","discografia"=>"DRO","año"=>"2006");
		$this->discos[] = array("titulo"=>"Amar es combatir","interprete"=>"Maná","discografia"=>"Warner","año"=>"2006");
		$this->discos[] = array("titulo"=>"Mi sangre","interprete"=>"Juanes","discografia"=>"Universal Music Latino","año"=>"2005");
		$this->discos[] = array("titulo"=>"Voces de Ultratumba","interprete"=>"Estopa","discografia"=>"SonyBmg","año"=>"2005");
		$this->discos[] = array("titulo"=>"1967-1970 (Blue Album)","interprete"=>"The Beatles","discografia"=>"Capitol","año"=>"1993");
		$this->discos[] = array("titulo"=>"A Bigger Bang","interprete"=>"The Rollings Stones","discografia"=>"Emi","año"=>"2005");		
	}
	
	function mostrar($matriz)
	{
		echo("<table width='70%' border='1px' align='center'>\n");
		echo("<tr bgcolor='#CCCCCC'>\n");
		echo("<td><b>Título</b></td><td><b>Interprete</b></td><td><b>Discografia</b></td><td><b>Año</b></td>\n");
		foreach($matriz as $elemento)
		{
			echo "<tr>\n";
			printf("<td>%s</td><td>%s</td><td>%s</td><td>%s</td>\n",$elemento["titulo"],$elemento["interprete"],$elemento["discografia"],$elemento["año"]);
			echo "</tr>\n";
		}
		echo "</table><br><br>El nº de ejemplares encontrados es de: <b>".count($matriz)."</b>";
	}
	
	function buscar($criterio)
	{
		$temp = array();
		foreach($this->discos as $elemento)
		{
			if (strpos(strtolower($elemento["titulo"]),strtolower($criterio)) > -1
			|| strpos(strtolower($elemento["interprete"]),strtolower($criterio)) > -1
			|| strpos(strtolower($elemento["discografia"]),strtolower($criterio)) > -1
			|| strpos(strtolower($elemento["año"]),strtolower($criterio)) > -1)
			$temp[] = $elemento;
		}
		return $temp;
	}
};
?>