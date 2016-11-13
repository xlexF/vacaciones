<?php


$connect = pg_connect("host=localhost port=5432 dbname=SistemaVacaciones user=postgres password=123456");


	if (!$connect) {

     header("Location: hola.html");
     echo "Ocurrió un error.\n";
	 exit;
			}
		  					 

$SQL="SELECT * from vacaciones 
inner join empleados on (vacaciones.codempleado=vacaciones.codempleado)  
inner join periodos on (periodos.idperiodo=vacaciones.idperiodo)
inner join departamentos on (departamentos.coddepartamento = empleados.coddepartamento)
inner join tipoempleado on (tipoempleado.idtipoempleado = empleados.idtipoempleado)
where decisionjefedepartamento <> '1'";
						
$clientes = array();
$result = pg_query($connect, $SQL);


							while($row = pg_fetch_array($result)) 
							{ 
								
								
								if($row['decisionjefedepartamento']==='2'){
								$decision = 'Denegado';	
								}
								if($row['decisionjefedepartamento']==='3'){
								$decision = 'Aprobado';	
								}
								//$idvacaciones=$row['codempleado'];
								$id=$row['codempleado'];
								$nombre=$row['nombreempleado'];
								$cargo=$row['tipoempleado'];
								$departamento=$row['nombredepartamento'];
								$fechaS=$row['fechainicio'];
								$fechaA=$row['tiempohoras'];
								$tiempos=$row['tiempohoras'];
								$tiempod=$row['tiempohoras'];
								$periodo='1';
								
								$clientes[] = array('decision'=>$decision, 'codigoempleado'=> $id,'cargo'=>$cargo,'depto'=>$departamento, 'NombredeEmpleado'=> $nombre, 'Fechas'=> $fechaS,'Fechaa'=> $fechaA,'Tiempos'=> $tiempos,'Tiempod'=> $tiempod, 'periodo' => $periodo);
							
								
								
								

							}
		  
		  			$json_string = json_encode($clientes);
					echo $json_string;
		  
		  
		  

         


?>
