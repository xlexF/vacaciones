<?php
session_start();

$connect = pg_connect("host=localhost port=5432 dbname=SistemaVacaciones user=postgres password=123456");

$codusuario = $_SESSION['CodEmpleado'];

	if (!$connect) {

     header("Location: hola.html");
     echo "Ocurrió un error.\n";
	 exit;
			}
		  					 

$SQL="SELECT * from vacaciones 
inner join empleados on (vacaciones.codempleado=vacaciones.codempleado)  
where empleados.codempleado = '".$codusuario."' and decisionjefedepartamento = '3'";
						
$clientes = array();
$result = pg_query($connect, $SQL);


							while($row = pg_fetch_array($result)) 
							{ 
								$id=$row['idvacaciones'];
								$codigo=$row['codempleado'];
								$nombre=$row['nombreempleado'];
								$fecha=$row['fechasolicitud'];
								$fecha2=$row['fechaaprobacion'];
								$tiempo=$row['tiempohoras'];
								$detalles= $row['detalles'];
								$periodo = $row['idperiodo'];
								
								$clientes[] = array('CodigodeVacaciones'=> $id, 'NombredeEmpleado'=> $nombre, 'Fecha'=> $fecha,'Fecha2'=> $fecha2, 'Tiempo'=> $tiempo,'detalles' => $detalles, 'codigo' => $codigo,'periodo'=> $periodo);
							
								
								
								

							}
		  
		  			$json_string = json_encode($clientes);
					echo $json_string;
		  			pg_close($connect);
		  
		  

                 ?>