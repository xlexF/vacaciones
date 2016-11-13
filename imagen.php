<?php

$data = file_get_contents('images/usuario.jpg');
$image = pg_escape_bytea($data);




$connect = pg_connect("host=localhost port=5432 dbname=SistemaVacaciones user=postgres password=123456");

 if (!$connect) {
	 
	  header("Location: hola.html");
	  echo "Ocurrió un error.\n";
	  exit;
}else{
	 echo "conecto...";
	 //echo $image;

//pg_query($connect,"UPDATE hola SET imagen = '".$image."' WHERE id = '".$ID."'");

$SQL = "UPDATE empleados SET imagen = '{$image}' WHERE imagen is null ";
	 

$result =pg_query($connect, $SQL); 

	  if (!$result){
	  echo "Ocurrió un EEEEEEEEEEEEEEerror.\n";
	  }else{
		
		  echo "...funciona";
	  }
	 


	 pg_close($connect);
 }
	 

	  




?>