<?php
session_start();
$empleado = $_POST['id'];


 $connect = pg_connect("host=localhost port=5432 dbname=SistemaVacaciones user=postgres password=123456");

 if (!$connect) {	 
	  header("Location: hola.html");
	  echo "Ocurrió un error.\n";
	  exit;
}

$SQL="SELECT * from vacaciones inner join empleados on (vacaciones.codempleado=empleados.codempleado) where 
idvacaciones='".$empleado."'";


$datosEM = array();
$result = pg_query($connect, $SQL);
$i = 0;
while($row = pg_fetch_array($result)){ 
					$i = 1 + $i;
					$vacaciones=$row['idvacaciones'];
					$codempleado=$row['codempleado'];
					$nombre=$row['nombreempleado'];
					$fecha=$row['fechainicio'];
				    $tiempo=$row['tiempohoras'];
					$detalles = $row['detalles'];
	$datosEM[] = array('i'=>$i, 'codigoempleado'=> $codempleado,'NombredeEmpleado'=> $nombre, 'Fecha'=> $fecha, 'Tiempo'=> $tiempo, 'codvacaciones' => $vacaciones,'detalles'=> $detalles);
						
					
							
						
							}
	
	$json_string = json_encode($datosEM);
	echo $json_string;



?>