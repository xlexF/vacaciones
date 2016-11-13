<?php
session_start();
$usuario = $_POST['nnombre'];
$pass = $_POST['npassword'];
date_default_timezone_set("America/Guatemala");

$longitudUser = strlen($usuario);



if(empty($usuario) || empty($pass)){

	$mensaje = "Por favor ingrese una contraseña o usuario valido";
	echo "<script>";
	echo "alert('$mensaje');";  
	echo "window.location = 'http://localhost:85/phpmyadmin/sprint3_1/index.php';";
	echo "</script>";  

}

 $connect = pg_connect("host=localhost port=5432 dbname=SistemaVacaciones user=postgres password=123456");

 if (!$connect) {
	 
	  header("Location: hola.html");
	  echo "Ocurrió un error.\n";
	  exit;
}

$SQL="SELECT * from empleados where nombreempleado = '". trim($usuario) ."' and contrasenia = '" .$pass."'";
//echo  $SQL;
$result = pg_query($connect, $SQL);



	if ($row = pg_fetch_array($result)){		

		
		
			if( ($row['contrasenia'] === $pass) && ($row['nombreempleado'] === $usuario)){

					$_SESSION['validar'] = 'aaa1';
					
					$_SESSION['CodEmpleado'] =  $row['codempleado'];
			
						
					
					
				    $clave = $row['idtipoempleado'];

					$fecha = date("Y-m-d H:i:s");
				
				
					pg_query($connect, "insert into bitacora (codusuario, nombreusuario,fecha, detalles) values ('".$row['codempleado']."','" .$row['nombreempleado']."', '" .$fecha."', 'el usuario se autentico e ingreso al sistema' )");
				
				
				if ($clave==3){
					$alex= $_SESSION['CodEmpleado'];
					header("Location: me.php");
					
					
					
				}
				elseif ($clave==2){

							header("Location: http://localhost:85/phpmyadmin/sprint3proto/mj.php");
					
					
					
				}
				elseif ($clave==4){

							header("Location: http://localhost:85/phpmyadmin/sprint3proto/mrh.php");
					
					
					
				}
			
				/*
					switch ($clave){
						case 1:
							session_start();
							header("Location: moduloempleado.php");
					
						case 2: 
							session_start();
							header("Location: http://localhost:85/phpmyadmin/Sprint2/intro/index2.html");
					}*/
				
				  

			/*	pg_query($connect,"INSERT INTO vacaciones (idvacaciones,fechaaprobacion,fechainicio,fechafinal,detalles,tiempohoras,codempleado,idperiodo) VALUES ('" .$usuario. "','2000-01-01','2000/01/01','2000/01/01','asdafd',2,1,1)");
*/
					

			}else{
					
					$mensaje = "Por favor ingrese una contraseña o usuario valido";
					echo "<script>";
					echo "alert('$mensaje');";  
					echo "window.location = 'http://localhost:85/phpmyadmin/sprint3proto/index.php';";
					echo "</script>";
					//exit();
				}
	}else{
			session_destroy();
			$mensaje = "Por favor ingrese una contraseña o usuario valido";
			echo "<script>";
			echo "alert('$mensaje');";  
			echo "window.location = 'http://localhost:85/phpmyadmin/sprint3proto/index.php';";
			echo "</script>";  

		
	}

//}

/*else{
			$_SESSION['validar'] = '';
			$mensaje = "Por favor ingrese una contraseña o usuario valido";
			echo "<script>";
			echo "alert('$mensaje');";  
			echo "window.location = 'http://localhost:85/phpmyadmin/Sprint2/index.html';";
			echo "</script>";  

		
	}*/
?>
