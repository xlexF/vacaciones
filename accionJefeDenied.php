<?php
$service = $_POST['id'];
$si = 3;

$connect = pg_connect("host=localhost port=5432 dbname=SistemaVacaciones user=postgres password=123456");

 if (!$connect) {
	 
	  header("Location: hola.html");
	  echo "Ocurrió un error.\n";
	  exit;
}

$SQL2="UPDATE vacaciones SET decisionjefedepartamento = '".$si."' WHERE idvacaciones = '".$service."'";
pg_query($connect, $SQL2);


?>



