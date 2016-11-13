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
inner join empleados on (vacaciones.codempleado=empleados.codempleado)  
inner join periodos on (periodos.idperiodo=vacaciones.idperiodo)
where empleados.codempleado = '".$codusuario."' and vacaciones.decisionjefedepartamento = '1'";
						
$clientes = array();
$result = pg_query($connect, $SQL);


							while($row = pg_fetch_array($result)) 
							{ 
								$id=$row['idvacaciones'];
								$codigo=$row['codempleado'];
								$nombre=$row['nombreempleado'];
								$fecha=$row['fechasolicitud'];
								$tiempo=$row['tiempohoras'];
								$detalles= $row['detalles'];
								$periodo = $row['idperiodo'];
								
								$clientes[] = array('CodigodeVacaciones'=> $id, 'NombredeEmpleado'=> $nombre, 'Fecha'=> $fecha, 'Tiempo'=> $tiempo,'detalles' => $detalles, 'codigo' => $codigo,'periodo'=> $periodo);
							
								
								
								

							}
		  
                  $json_string = json_encode($clientes);

					echo $json_string;
		  
		
		  

                 ?>