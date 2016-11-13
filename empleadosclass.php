<?php 
//session_start();
	class empleadosme{
	
	
	
	function conectar()
	{
	$connect = pg_connect("host=127.0.0.1 port=5432 dbname=SistemaVacaciones user=postgres password=123456");

	 if (!$connect) {
		 
		  header("Location: hola.html");
		  echo "Ocurrió un error.\n";
		  exit;
	     }
	}
	function lista_empleados($valor)
		{
			$SQL="SELECT * FROM vacaciones WHERE codempleado like '%".$valor."%'";
			pg_set_client_encoding($connect, "utf8"); 
			$result = pg_query($connect, $SQL);
			$arreglo = array();
			while ($row=$result->fetch_array(pg_numrows)) {
				$arreglo[]=$row;
			}
			return $arreglo;

		}
	}
	$isnt = new empleadosme();
	$sr = $isnt -> lista_empleados('3');
	echo $sr;
	
?>