<html>
    <head>
        
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/bootstrap.min.css" >
 <link rel="stylesheet" href="jquery-ui-1.12.1/jquery-ui.css" >
  <link rel="stylesheet" href="jquery-ui-1.12.1/datepicker/css/datepicker.css" >
   <link rel="stylesheet" href="jquery-ui-1.12.1/jquery-ui-timepicker-addon.css" >
   <link rel="stylesheet" href="css/hint.css-master/hint.min.css">
   <script src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
   <script src="js/jquery-3.1.0.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
   <script src="jquery-ui-1.12.1/jQuery-Timepicker-Addon-master/src/jquery-ui-timepicker-addon.js"></script>

   <link rel="stylesheet" href="css/me.css">
   <style type="text/css">
   #tabs #tabs-1 form {
}
   #tabs #tabs-1 form #bt3 {
	position: absolute;
	left: 1192px;
	top: 385px;
}
   #tabs #tabs-1 form p #dcabd {
	padding: 10px;
}
   #tabs #tabs-1 form p #dcbd {
	padding-top: 5px;
	padding-right: 140px;
	padding-bottom: 5px;
	padding-left: 10px;
}
   #tabs #tabs-1 form p #dnbd {
	padding-top: 5px;
	padding-right: 115px;
	padding-bottom: 5px;
	padding-left: 15px;
}
   #tabs #tabs-1 form p #dibd {
	padding-top: 5px;
	padding-right: 115px;
	padding-left: 10px;
	padding-bottom: 5px;
}
   #tabs #tabs-1 form p #dcabd {
	padding-top: 5px;
	padding-right: 100px;
	padding-bottom: 5px;
	padding-left: 10px;
}
   #tabs #tabs-4 label {
	color: #FFF;
}
   #tabs #tabs-4 p .img-thumbnail.foto {
	position: absolute;
}
   #tabs #tabs-4 h1 {
	color: #FFF;
}
   #tabs #tabs-4 p .img-thumbnail.foto {
	margin-right: 300px;
}
   #tabs #tabs-3 .log {
	position: absolute;
	width: 1209px;
}
   #tabs #tabs-3 .log h2 {
	color: #FFF;
}
   #tabs #tabs-3 .log {
	color: #FFF;
}
   #tabs-1 form #content p #fecha {
	background-color: #000;
	color: #FFF;
}
   #tabs-1 form #content p #fecha1 {
	color: #FFF;
	background-color: #000;
}
   #tabs-1 form #content1 p #fecha2 {
	color: #FFF;
	background-color: #000;
}
   #tabs-1 form #content1 p {
	color: #FFF;
	background-color: #000;
}
   #tabs-1 form #content1 p #hora {
	color: #FFF;
	background-color: #000;
}
   </style>
   <?php 
		include 'sesion.php';
		$connect = pg_connect("host=localhost port=5432 dbname=SistemaVacaciones user=postgres password=123456");
		$codusuario = $_SESSION['CodEmpleado'];

			if (!$connect) {

			 header("Location: hola.html");
			 echo "Ocurrió un error.\n";
			 exit;
					}


		$SQL="SELECT * from empleados where empleados.codempleado = '".$codusuario."'";
		$result = pg_query($connect, $SQL);
		$row = pg_fetch_array($result);

		if($row[idtipoempleado]<>3){
			$mensaje = "No esta autorizado";
					echo "<script>";
					echo "alert('$mensaje');";  
					echo "window.location = 'http://localhost:85/phpmyadmin/sprint3proto/logout.php';";
					echo "</script>";
				
		}
		
	?>
  
   
   <script>
       

       
       $.datepicker.regional['es'] = 
  {
  closeText: 'Cerrar', 
  prevText: 'Previo', 
  nextText: 'Próximo',
  
  monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
  'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
  'Jul','Ago','Sep','Oct','Nov','Dic'],
  monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
  dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
  dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
  dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
  dateFormat: 'dd/mm/yy', firstDay: 0, 
  initStatus: 'Selecciona la fecha', isRTL: false};
 $.datepicker.setDefaults($.datepicker.regional['es']);
 
  $( function() {
    $( "#fecha" ).datepicker({minDate: 0,dateFormat: 'dd/mm/yy'});
    $( "#fecha1" ).datepicker({minDate: 0,dateFormat: 'dd/mm/yy'});
    $( "#fecha2" ).datepicker({minDate: 0,dateFormat: 'dd/mm/yy'});
    $('#hora').timepicker({  timeFormat:'hh tt',
                                      showTimezone: false,
                                      'step': 00,
                                      show24Hours:true
                                     
                                      
                                    })
    $('#hora1').timepicker({  timeFormat:'hh tt',
                                      showTimezone: false,
                                      'step': 00,
                                      show24Hours:true
                                     
                                      
                                    })
    $( "#tabs" ).tabs();
  } );
 function pulsar(e) { 
  tecla = (document.all) ? e.keyCode :e.which; 
  return (tecla!=13); 
} 

  function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
    function showContent1() {
        element = document.getElementById("content1");
        check = document.getElementById("check1");
        if (check1.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
       $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
       
  </script>
  
    </head>
    <body> 
    <div class="panel panel-default" style="border-radius: 100px; box-shadow: 10px 10px #CCC; position: absolute; width: 99%;"   >
    <div class="panel-heading" id="titulo" name="titulo"  style="border-radius: 100px;"> 
     <img src="images/descarga.jpg" whith="100" alt="10" >
     <span class="panel-title ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sistema De Vacaciones</span></div>
        </div>
    <div id="tabs" style="border-radius: 50px; box-shadow: 10px 10px #CCCCCC; position: absolute; top: 147px; left: 6px; width: 98%;">
  <ul>
   <li><a href="#tabs-4" class="hint--top-right" data-hint=" en esta opcion puedes modificar tus peticiones no revisadas por el jefe">Datos De Empleado</a></li>
    <li><a href="#tabs-1" class="hint--top-right" data-hint=" en esta opcion puedes hacer tu peticion de vacaciones ">Peticion de Vacaciones</a></li>
    <li><a href="#tabs-2" class="hint--top-right" data-hint=" en esta opcion puedes ver tus vacaciones por mes">Reporte de las vacaciones pendientes</a></li>
    <li><a href="#tabs-3" class="hint--top-right" data-hint=" en esta opcion puedes modificar tus peticiones no revisadas por el jefe">Reporte de las vacaciones Aprobadas</a></li>
     
      </ul>
             
       <form  method="post" action="captura.php" >
      <div id="tabs-1">
   
  <h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Periodo De Vacaciones</h1>
  <p> &nbsp;&nbsp; <input type="checkbox" name="check" id="check" value="1" onChange="showContent()" class="hint--top-right" data-hint=" dale un click y despliga las fechas para tu peticion de vacaciones" />
     Si Deseas Pedir Dias  
       

  <ol id="content" style="width: 500px; display: none;" >
      <p style="color:#FFF;">Fecha de Inicio de Vacaciones: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="fecha" name="fecha" class="hint--top-right" data-hint=" Aqui selecionas la Fecha de Regreso de vacaciones en un calendario"  onKeyPress="return pulsar(event)"></p>  
             <p style="color:#FFF;">Fecha de Regreso de vacaciones: &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="fecha1" name="fecha1" data-toggle="tooltip" data-placement="top" title=" Aqui selecionas la Fecha de Regreso de vacaciones en un calendario"  onKeyPress="return pulsar(event)" ></p> 
        </ol> 
         <p style="color:#FFF;">&nbsp;&nbsp; <input type="checkbox" name="check1" id="check1" value="1" onChange="showContent1()" class="hint--top-right" data-hint=" dale un click y despliga la fecha y la hora de inicio y de regreso para tu peticion de vacaciones por hora"   />
           Solo Desea Horas            
            
        </p>  
          <ol id="content1" style="width: 650px; display: none;">
          <p style="color:#FFF;">Fecha del Dia que se Tomanaron las Horas: &nbsp;
          <input type="text" id="fecha2" name="fecha2" class="hint--top-right" data-hint=" Aqui selecionas la Fecha de Inicio de vacaciones en un calendario"  onKeyPress="return pulsar(event)"  >
        </p>
        <p > Hora de Inicio : <input type="text" name="hora" id="hora" class="hint--top-right" data-hint=" Aqui selecionas la Hora de Inicio de tus vacaciones"class="text ui-widget-content ui-corner-all"     onKeyPress="return pulsar(event)"/>   &nbsp;&nbsp;Hora de Regreso : 
        <input type="text" name="hora1" id="hora1" class="text ui-widget-content ui-corner-all" data-toggle="tooltip" data-placement="top" title=" Aqui selecionas la Hora de Regreso de tus vacaciones "   onKeyPress="return pulsar(event)"/>   </p>
      </ol>
         <p style="color:#FFF;">  &nbsp;&nbsp;&nbsp;&nbsp;Motivo Por el cual Desea tomar Vacaciones
         
           
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
         <p ><br>  
           <textarea name="comentarios"  rows="5" cols="80" ></textarea>
               
                 

         </p>
         <button name="bt1" type="submit" class="btn btn-primary " id="bt1" dclass="btn btn-primary  hint--top-left" id="bt1"  data-hint="Este boton guarda y crea un PDF para que puedas guardar o imprimir tu peticion" >Guardar</button>
            
   
		   <br></br>
	 <a name="bt3"  class="btn btn-primary hint--top-left" id="bt2"  data-hint="Este boton cierra tu cuenta"href="logout.php" >Cerrar Sesion</a>

           
           
            
        </form>

     
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      
      </div> 
      
     
		<div id ="tabs-4">
			
				 <p><img src="hola.php" alt="..." class="img-thumbnail foto"  style="border-radius: 50px; box-shadow: 5px 5px #CCCCCC; width: 15%; height: -moz- 5%;">
        </p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;<h1> Datos Del Empleado</h1>
			<br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id="dn">Nombre Del Empleado &nbsp;&nbsp;&nbsp;&nbsp;</label><label id="dnbd">
    <?php
	
	$codusuario = $_SESSION['CodEmpleado'];
	

	$connect = pg_connect("host=localhost port=5432 dbname=SistemaVacaciones user=postgres password=123456");
	$SQL = "SELECT * FROM empleados WHERE codempleado = '" .$codusuario. "'";
	$result = pg_query($connect, $SQL);


    if ($row = pg_fetch_array($result)){
 	$identidad = $row['nombreempleado'];
			 echo $identidad;
	

     }


	?></label><br>		
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<label id="di">Numero De Identidad &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><label id="dibd">    <?php
	
	$codusuario = $_SESSION['CodEmpleado'];
	

	$connect = pg_connect("host=localhost port=5432 dbname=SistemaVacaciones user=postgres password=123456");
	$SQL = "SELECT * FROM empleados WHERE codempleado = '" .$codusuario. "'";
	$result = pg_query($connect, $SQL);


    if ($row = pg_fetch_array($result)){
 	$identidad = $row['noidentidad'];
			 echo $identidad;
	

     }


	?></label>		<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


            <label id="dc">Codigo Del Empleado</label> 
            &nbsp;&nbsp;&nbsp;&nbsp;<label id="dcbd">    
    <?php
	
	$codusuario = $_SESSION['CodEmpleado'];
	

	$connect = pg_connect("host=localhost port=5432 dbname=SistemaVacaciones user=postgres password=123456");
	$SQL = "SELECT * FROM empleados WHERE codempleado = '" .$codusuario. "'";
	$result = pg_query($connect, $SQL);


    if ($row = pg_fetch_array($result)){
 	$identidad = $row['codempleado'];
			 echo $identidad;
	

     }


	?></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

          <br>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label id="dca">Cargo Del Empleado</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <label id="dcabd">    
          
    <?php
  
	$codusuario = $_SESSION['CodEmpleado'];
	

	$connect = pg_connect("host=localhost port=5432 dbname=SistemaVacaciones user=postgres password=123456");
			 
	$SQL =  "SELECT tipoempleado.tipoempleado FROM tipoempleado INNER JOIN empleados ON (empleados.idtipoempleado = tipoempleado.idtipoempleado) where codempleado = '" .$codusuario. "'";
			 
	$result = pg_query($connect, $SQL);


    if ($row = pg_fetch_array($result)){
 	$identidad = $row['tipoempleado'];
			 echo $identidad;
	

     }
	
	?></label><label id="dca">Cargo Del Empleado</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <label id="dcabd">    
          
    <?php
  
	$codusuario = $_SESSION['CodEmpleado'];
	

	$connect = pg_connect("host=localhost port=5432 dbname=SistemaVacaciones user=postgres password=123456");
			 
	$SQL =  "SELECT tipoempleado.tipoempleado FROM tipoempleado INNER JOIN empleados ON (empleados.idtipoempleado = tipoempleado.idtipoempleado) where codempleado = '" .$codusuario. "'";
			 
	$result = pg_query($connect, $SQL);


    if ($row = pg_fetch_array($result)){
 	$identidad = $row['tipoempleado'];
			 echo $identidad;
	

     }
	
	?></label> <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label id="dd">Departamento          </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <label id="ddbd">    <?php
	
    $codusuario = $_SESSION['CodEmpleado'];
	

	$connect = pg_connect("host=localhost port=5432 dbname=SistemaVacaciones user=postgres password=123456");
	$SQL = "SELECT departamentos.nombredepartamento FROM departamentos INNER JOIN empleados ON (empleados.coddepartamento = departamentos.coddepartamento) where codempleado = '" .$codusuario. "' ";
	$result = pg_query($connect, $SQL);


    if ($row = pg_fetch_array($result)){
 	$identidad = $row['nombredepartamento'];
			 echo $identidad;
	

     }

	?>
           </label>
           
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a name="bt2"  class="btn btn-primary hint--top-left" id="bt2"  data-hint= "Cambia Su Contraseña"id="bt2" type="submit" href="registro.php" >Cambiar Contraseña</a> &nbsp;&nbsp;<a name="bt3"  class="btn btn-primary hint--top-left" id="bt2"  data-hint="Este boton cierra tu cuenta"href="logout.php" >Cerrar Sesion</a><br><br>
		</div>
    <div id="tabs-2" text-aling= "center">
         
             <br>
             <br>
<style>
			 
th{
	text-align: center;
	background-color: #166BCF;}				 
				 
table.scroll{
   
	text-align: center;
	background-color: azure;

	
	
}

table.scroll {

    border-spacing: 0;
    border: 2px solid black;
}

table.scroll tbody,
table.scroll thead { display: block; }

thead tr th { 
    height: 30px;
    line-height: 30px;
    /*text-align: left;*/
}

table.scroll tbody {
    height: 200px;
    overflow-y: auto;
    overflow-x: hidden;
}
tbody { width: 1280px;}

tbody { border-top: 2px solid black; }



tbody td:last-child, thead th:last-child {
    border-right: none;
}
</style>

		 
<script type="text/javascript">
			 

var $table = $('table.scroll'),
    $bodyCells = $table.find('tbody tr:first').children(),
    colWidth;

$(window).resize(function() {

    colWidth = $bodyCells.map(function() {
        return $(this).width();
    }).get();
    

    $table.find('thead tr').children().each(function(i, v) {
        $(v).width(colWidth[i]);
    });    
}).resize();
			 </script>


   <table  id="tablajson" class="table  table-hover table-condensed table-responsive table-bordered scroll">

                         <thead>
                         
                         <th width='40'  style="vertical-align:middle;">No.</th>
                         <th width='200'  style="vertical-align:middle;">Codigo de Empleados</th>
                         <th width='200'  style="vertical-align:middle;">Nombre de Empleado</th>
                         <th width='200'  style="vertical-align:middle;">Fecha de solicitud</th>
                         <th width='200'  style="vertical-align:middle;">Tiempo Solicitado</th>
                         <th width='200'  style="vertical-align:middle;">Tiempo                    Restante</th>
                         <th width='200'  style="vertical-align:middle;">Periodo</th>
                         <th width='200'  style="vertical-align:middle;">Eliminar peticion</th>
                      
                         
	   </thead>

            <tbody></tbody>   
              <script type="text/javascript"> 
			$(document).ready(function(){
			var url="generarjson.php";
			$("#tablajson tbody").html("");
			$.getJSON(url,function(clientes){
			$.each(clientes, function(i,cliente){
			var newRow =

			"<tr id='"+cliente.CodigodeVacaciones+"'>"
			+"<td width='45' >"+(i)+"</td>"
			+"<td width='200'>"+cliente.codigo+"</td>"
			+"<td width='200'>"+cliente.NombredeEmpleado+"</td>"
			+"<td  width='200'>"+cliente.Fecha+"</td>"
			+"<td width='200'>"+cliente.Tiempo+"</td>"
			+"<td width='200'>"+cliente.Tiempo+"</td>"
			+"<td width='200'>"+cliente.periodo+"</td>"
			+"<td width='170'><a class='delete btn btn-primary'>Eliminar</a></td>"
			+"</tr>";
			$(newRow).appendTo("#tablajson tbody");
			});
			});
				alert(toString.tr.data);
			});

		</script>
		<script>		 
					 
				$(document).ready(function() {
				$(document).on('click','.delete',function(){
                 
				var service = $(this).parent().parent().attr("id");
				
				var dataString = 'id='+service;

				$.ajax({
					type: "POST",
					url: "http://localhost:85/phpmyadmin/sprint3proto/delete.php",  
					data: dataString,
					success: function() {
						$('#delete-ok').empty();
						$("#" + service).fadeOut("slow");
						$("#" + service).remove();			
						alert("OK");
							},
					error: function(){
						alert("Hubo un error");
					}
						});
					});                 
				});    		 
		</script>
		
   
  
		 </table> 

      

  </div>
     

     <div id="tabs-3">
     <table  id="tablajson2" class="table  table-hover table-condensed table-responsive table-bordered scroll" style="border-radius: 50px; box-shadow: 10px 10px #CCCCCC;">

    
                         <thead>
                         
                         <th width='40'  style="vertical-align:middle;">No.</th>
                         <th width='200'  style="vertical-align:middle;">Codigo de Empleados</th>
                         <th width='200'  style="vertical-align:middle;">Nombre de Empleado</th>
                         <th width='200'  style="vertical-align:middle;">Fecha de solicitud</th>
                         <th width='200'  style="vertical-align:middle;">Fecha de Aprobacion</th>
                         <th width='200'  style="vertical-align:middle;">Estado</th>
                         <th width='200'  style="vertical-align:middle;">Periodo</th>
                         <th width='200'  style="vertical-align:middle;">Mostrar</th>
                      
                         
	   </thead>

            <tbody></tbody>   
       <script type="text/javascript"> 
			$(document).ready(function(){
			var url="generarjson2.php";
			$("#tablajson2 tbody").html("");
			$.getJSON(url,function(clientes){
			$.each(clientes, function(i,cliente){
			var newRow =

			"<tr id='"+cliente.CodigodeVacaciones+"'>"
			+"<td width='45' >"+(i)+"</td>"
			+"<td width='200'>"+cliente.codigo+"</td>"
			+"<td width='200'>"+cliente.NombredeEmpleado+"</td>"
			+"<td  width='200'>"+cliente.Fecha+"</td>"
			+"<td  width='200'>"+cliente.Fecha2+"</td>"
	
			+"<td width='200'>Aprobada</td>"
			+"<td width='200'>"+cliente.periodo+"</td>"
			+"<td width='170'><a class='imp btn btn-primary'>Mostrar</a></td>"
			+"</tr>";
			$(newRow).appendTo("#tablajson2 tbody");
			});
			});
				alert(toString.tr.data);
			});

		</script>
	  				 
				 
<script>		 
					 
				$(document).ready(function() {
				$(document).on('click','.imp',function(){                
				var service = $(this).parent().parent().attr("id");	
				var dataString = 'id='+service;

		     	$.ajax({
							 url: "jsonempleado2.php",
							 data: dataString, 
							 type: "POST",
							 dataType : 'json',
							 success:  function( result )
								 {
								  
								  var codigo=result[0].codvacaciones;
								  window.location = 'Imprimir.php?getvacaciones='+codigo;

								 },
							 error: function (request, status, error) {
							  alert(error);
							 }
							  });
					 return false;
					});                 
				});

</script>
</table> 
     	
     	
     	
     	
     	
   	   <div class="log 1" style=" color=#ffff">
		   <form method="GET" action="Imprimir.php">
                          <br>
                          <h2>Detalles</h2><br>
                          &nbsp;&nbsp;&nbsp;&nbsp;
	
                        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;    Codigo:  <input id="Codigo" value="">&nbsp;&nbsp;

                          Fecha:  <input id="Fecha" value="">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;

                          Tiempo:  <input id="Tiempo" value="">&nbsp;&nbsp;
   
                          No:  <input id="se" value="">
                          
              &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<input class="btn btn-success" name="enviar" class='imp btn btn-primary' type="submit" value="Imprimir" /> 
     	</form>
     </div>
     
     
    </div>
    </body>