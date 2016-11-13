<?php

$connect = pg_connect("host=localhost port=5432 dbname=SistemaVacaciones user=postgres password=123456");


	if (!$connect) {

     header("Location: hola.html");
     echo "Ocurrió un error.\n";
	 exit;
			}
		  					 

$SQL="SELECT *, nombreempleado from vacaciones inner join empleados on (vacaciones.codempleado=empleados.codempleado) where decisionjefedepartamento ='1' ";
						
$clientes = array();
$result = pg_query($connect, $SQL);


							while($row = pg_fetch_array($result)) 
							{ 
								$idvacaciones=$row['idvacaciones'];
								$id=$row['codempleado'];
								$nombre=$row['nombreempleado'];
								$fecha=$row['fechainicio'];
								$tiempo=$row['tiempohoras'];
								
								$clientes[] = array('codigoempleado'=> $id, 'NombredeEmpleado'=> $nombre, 'Fecha'=> $fecha, 'Tiempo'=> $tiempo, 'codvacaciones' => $idvacaciones);
							
								
								
								

							}
		  
		  			$json_string = json_encode($clientes);
					echo $json_string;
		  
		  
		  

                 ?>