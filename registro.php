<?php
session_start();
error_reporting(E_ALL & ~(E_STRICT|E_NOTICE));
$codusuario = $_SESSION['CodEmpleado'];


$contra =  $_POST['password'];
$contra2 = $_POST['password2'];
$contra3 = $_POST['password3'];




if ($_POST['Aceptar']) { 

  header("Location: me.php");

}

$connect = pg_connect("host=localhost port=5432 dbname=SistemaVacaciones user=postgres password=123456");
		if (!$connect) {
		  echo "Ocurrió un error.\n";
		  exit;
			
}

$SQL="SELECT * from empleados where codempleado = '" .trim($codusuario). "'";

$result = pg_query($connect, $SQL);




if($row = pg_fetch_array($result)){
	
	if ($_POST['cambiarcontraseña']) {
		if ($contra == $row[contrasenia]){
	
					if ($contra2==$contra3 ){

							if(!empty ($contra) and !empty ($contra2) and !empty ($contra3))	{

							$SQL2="UPDATE empleados SET contrasenia = '".$contra3."' WHERE codempleado = '".$codusuario."'";
							pg_query($connect, $SQL2);
													}

										}
	               	}
             }
}

?>
 
<html>
   
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/bootstrap.min.css" >
 <link rel="stylesheet" href="jquery-ui-1.12.1/jquery-ui.css" >
  <link rel="stylesheet" href="jquery-ui-1.12.1/datepicker/css/datepicker.css" >
   <link rel="stylesheet" href="jquery-ui-1.12.1/jquery-ui-timepicker-addon.css" >
   <style type="text/css">
   .panel.panel-default {
	position: absolute;
	left: 2px;
	top: -27px;
}
   #registro {
	position: absolute;
	left: 460px;
	top: 196px;
}
         #titulo{
	background:#2c2c2c;
background:-webkit-#2c2c2c;
background:-moz-#2c2c2c;
background:-o-#2c2c2c;
background:-ms-#2c2c2c;

}
               .panel.panel-default #titulo img {
	margin-left: 50px;
}
               body {
	background-color: #2c2c2c;
}
   #registro {
	color: #FFF;
}
   #registro legend {
	color: #FFF;
}
   #registro {
	width: 500px;
}
   </style>
   <script src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
   <script src="js/jquery-3.1.0.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
   <script src="jquery-ui-1.12.1/jQuery-Timepicker-Addon-master/src/jquery-ui-timepicker-addon.js"></script>
        
    </head>
    <body>
       <div class="panel panel-default" style="border-radius: 100px; box-shadow: 10px 10px #2c2c2c; position: absolute; width: 99%;"   >
    <div class="panel-heading" id="titulo" name="titulo"  style="border-radius: 100px;"> 
     <img src="images/descarga.jpg" whith="100" alt="10" >
     <span class="panel-title ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sistema De Vacaciones</span></div>
        </div>
       

 <form id='registro' action='registro.php' method='post'  style="border-radius: 100px; box-shadow: 10px 10px #CCC;">
 
     
 
<legend>Asignacion de Contraseña</legend>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for='password' >Contraseña:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<input type='password' name='password' id='password' maxlength="30" align="right"/>
<br> 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for='password2' >Nueva Contraseña:</label>&nbsp;&nbsp;&nbsp;&nbsp;
<input type='password' name='password2' id='password2' maxlength="30" align="right" />
<br> 

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for='password2' >Repita  Contraseña:</label>&nbsp;&nbsp;&nbsp;&nbsp;
<input type='password' name='password3' id='password3' maxlength="30" align="right" />
<br> 


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='submit'  align="right" name='Aceptar' value='volver'/>
<input type='submit'  align="right" name='cambiarcontraseña' value='cambiarcontraseña'/>
<a class="btn btn-primary p"name='bt2' type='submit'  href="logout.php"  >Cerrar Sesion</a>

	 
<br>
<br>
<br><br>
</form>
        </body>
    
    
</html>

   

