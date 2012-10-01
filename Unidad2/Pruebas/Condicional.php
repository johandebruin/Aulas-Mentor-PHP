<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Condicionales</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?
	if (true)
		echo "Hola condicional";
	echo "<br><br>";
	$nota = 5;
	switch ($nota)
	{
		case 5:
			$mundo = "hola mundo";
			echo $mundo;
			break;
		default:
			print "Mensaje por defecto";
	}
	echo "<br><br>";
	for ($i = 0; $i <= 20; print " - $i", $i+=2);
	echo "<br><br>";
	
	for ($o = 0; $o < 20; $o++)
		echo " --- $o";
			
	  $emp_det = array ( 0 => array ("Name"=>"a", "Code"=> "8", "Hobby"=> "A"),
                   1 =>  array ("Name"=>"b", "Code"=> "8", "Hobby"=> "B"),
                   2 =>  array ("Name"=>"c", "Code"=> "1", "Hobby"=> "C"),
                   3 =>  array ("Name"=>"d", "Code"=> "3", "Hobby"=> "D"),
  		);
  foreach ($emp_det as $tempone) {
    foreach ($tempone as $key=>$temptwo) {
      echo "[$key]: $temptwo", "\n";
    }
    echo "\n";
  }
?>
</body>
</html>