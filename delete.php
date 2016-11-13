<?php
session_start();
$service = $_POST['id'];
$usuario = $_SESSION['CodEmpleado'];
date_default_timezone_set("America/Guatemala");
$fecha = date("Y-m-d H:i:s");
//echo $service;
 $connect = pg_connect("host=localhost port=5432 dbname=SistemaVacaciones user=postgres password=123456");

 if (!$connect) {
	 
	  header("Location: hola.html");
	  echo "Ocurrió un error.\n";
	  exit;
}

$SQL2="SELECT * FROM empleados WHERE CodEmpleado = ". $usuario ."";
$result = pg_query($connect, $SQL2);

$row = pg_fetch_array($result);
pg_query($connect,"insert into bitacora (codusuario,nombreusuario,fecha, detalles) values ('".$usuario."','" .$row['nombreempleado']."', '" .$fecha."', 'el usuario elimino una solicitud aun no aprobada')");



$SQL="DELETE FROM vacaciones WHERE idvacaciones ='".$service."'";
pg_query($connect, $SQL);

	 header("Location: me.php");
	  echo "Ocurrió un error.\n";
	  exit;

?>



