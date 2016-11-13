<html>
    <head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="css/bootstrap.min.css" >
 <link rel="stylesheet" href="jquery-ui-1.12.1/jquery-ui.css" >
  <link rel="stylesheet" href="jquery-ui-1.12.1/datepicker/css/datepicker.css" >
   <link rel="stylesheet" href="jquery-ui-1.12.1/jquery-ui-timepicker-addon.css" >
   <link rel="stylesheet" href="css/mj.css">
   <style type="text/css">
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #nombre {
	width: 302px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #nombre .panel-heading .panel-title {
	width: 300px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #cargo .panel-heading .panel-title {
	width: 300px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #depto .panel-heading .panel-title {
	width: 350px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #tiempo .panel-heading .panel-title {
	width: 350px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #razon .panel-body {
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #razon .panel-body {
	width: 350px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #razon {
	width: 350px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #nombre {
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #nombre {
	margin-left: 200px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #nombre {
	margin-left: 150px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #nombre {
	margin-left: 100px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #nombre {
	margin-left: 80px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #cargo {
	margin-left: 120px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #cargo {
	margin-left: 80px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #depto {
	margin-left: 100px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #depto {
	margin-left: 30px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #depto {
	margin-left: 60px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #tiempo {
	margin-left: 50px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #depto {
	margin-left: 40px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #depto {
	margin-left: 80px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 #razon {
	margin-left: 50px;
}
   #tabs #tabs-1 #centro .row .log {
	color: #CCC;
}
   #tabs #tabs-1 #centro .row .log {
	position: absolute;
	left: 831px;
	top: -7px;
	width: 561px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 .input-group div {
	position: absolute;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-3 ol .btn.btn-primary.a {
	position: absolute;
	left: 308px;
	top: 223px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 .input-group div #bt1 {
	position: absolute;
	left: 36px;
	top: -23px;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-3 p #usuarioimagen {
	position: absolute;
}
   #tabs #tabs-1 #centro .row .col-xs-12.col-sm-4 .input-group #filtrar {
	color: #000;
	background-color: #FFF;
}
   </style>
   <script src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
   <script src="js/jquery-3.1.0.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
   <script src="jquery-ui-1.12.1/jQuery-Timepicker-Addon-master/src/jquery-ui-timepicker-addon.js"></script>
    
     <?php include 'sesion.php';
		
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

		if($row[idtipoempleado]<>2){
			$mensaje = "No esta autorizado";
					echo "<script>";
					echo "alert('$mensaje');";  
					echo "window.location = 'http://localhost:85/phpmyadmin/sprint3proto/logout.php';";
					echo "</script>";
				
			
		}

		
		?> 
        <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
        
    </head>
<body>
       
  
 <div class="panel panel-default" style="border-radius: 100px; box-shadow: 10px 10px #CCC; position: absolute; width: 99%;"   >
    <div class="panel-heading" id="titulo" name="titulo"  style="border-radius: 100px; font-size: 36px;"> 
     <img src="images/descarga.jpg" whith="100" alt="10" >
     <span class="panel-heading" style="border-radius: 100px; font-size: 36px; color: #FFF; position: absolute; left: 546px; top: 38px;"><span class="panel-title ">&nbsp;&nbsp;&nbsp;Sistema De Vacaciones</span></span><span class="panel-title ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></div>
</div>
   <div id="tabs" style="border-radius: 50px; box-shadow: 10px 10px #CCCCCC; position: absolute; top: 125px; left: -5px; width: 98%;">
  <ul>
    <li><a href="#tabs-1">Peticion De Vacaciones</a></li>
    <li><a href="#tabs-2">Reporte De Vacaciones </a></li>
    
      </ul>
       <div id="tabs-1">
          <div id="centro">
    <div class="row">
        <div class="col-xs-12 col-sm-4">
             <div class="input-group">
                <input type="text"  placeholder="Ingrese nombre o codigo de Empleado" size="40"id="filtrar">
		<div>
      <script type="text/javascript">
        $(document).ready(function () {
            (function ($) {
                $('#filtrar').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
       
		});
      </script> 
               <button name="bt1" type="submit" class="btn btn-primary b " id="bt1" data-toggle="tooltip" data-placement="top" title="Este boton envia si aceptas o niegas las peticion" >Hacer Peticion de Vacaciones</button>
               </div>
           
            </div>
           
             
               <div>
<style>
			 
		 
table.scroll{
   
	text-align: center;
	background-color: azure;
	
}
th{
	text-align: center;
	background-color: #166BCF;
				   }
table.scroll {
    
    border-spacing: 0;
    border: 2px solid black;
}

table.scroll tbody,
table.scroll thead { display: block; }


table.scroll tbody {
    height: 150px;
    overflow-y: auto;
    overflow-x: hidden;
}




tbody td:last-child, thead th:last-child {
    border-right: none;
	}	
.bw {
  -webkit-transition: all 1s ease;
     -moz-transition: all 1s ease;
       -o-transition: all 1s ease;
      -ms-transition: all 1s ease;
          transition: all 1s ease;
}
 
.bw:hover {
  -webkit-filter:  grayscale(100%);
}

.box {
	

     -moz-border-radius: 50%;
     -webkit-border-radius: 50%;
     border-radius: 50%;
	width: 10px; 
	padding: 10px;
	border-radius: 50px;
	} 
	

.box:hover { -moz-box-shadow: 0 0 10px #ccc; 
	-webkit-box-shadow: 0 0 10px #ccc; 
	box-shadow: 0 0 10px #ccc; 
	} 




	
</style>

		 
<script type="text/javascript">
		var $table = $('table.scroll'),
			$bodyCells = $table.find('tbody tr:first').children(),
			colWidth;

		// Adjust the width of thead cells when window resizes
		$(window).resize(function() {
			// Get the tbody columns width array
			colWidth = $bodyCells.map(function() {
				return $(this).width();
			}).get();

			// Set the width of thead columns
			$table.find('thead tr').children().each(function(i, v) {
				$(v).width(colWidth[i]);
			});    
		}).resize();
</script>

                <table  id="tablajsonjefe" class="table  table-hover table-condensed table-responsive table-bordered scroll">

       <thead>
                         <tr>
                         <th width='35'  style="vertical-align:middle;">No.</th>
						 <th width='35'  style="vertical-align:middle;">codigo del Empleado</th>
                         <th width='200' style="vertical-align:middle;">Nombre del Empleado</th>
                         <th width='100' style="vertical-align:middle;">fecha de solicitud</th>
                         <th width='35'  style="vertical-align:middle;">tiempo solicitado</th>             
                         <th width="200" style="vertical-align:middle;">accion</th>
                         </tr> 
                                        
	   </thead>
			<tbody style="width: 700px;" class="buscar">
	

  
			</tbody>
     
              <script type="text/javascript"> 
			$(document).ready(function(){
			var url="generarjsonjefe.php";
			$("#tablajsonjefe tbody").html("");
			$.getJSON(url,function(clientes){

			$.each(clientes, function(i,cliente){
			var newRow =

			"<tr id='"+cliente.codvacaciones+"'>"
			+"<td width='37' heigth='70'>"+i+"</td>"
			+"<td width='89' heigth='70'>"+cliente.codigoempleado+"</td>"
			+"<td width='195' heigth='70'>"+cliente.NombredeEmpleado+"</td>"
			+"<td width='99' heigth='70'>"+cliente.Fecha+"</td>"
			+"<td width='87' heigth='70'>"+cliente.Tiempo+"</td>"
			+"<td width='170' heigth='70'><a class='bw pic box si'><img SRC='check.png'></img></a><a id='qw' class='bw pic box ver'><img SRC='ojo.png' ></img></a><a class='bw pic box no'><img SRC='x.png' ></img></a></td>"			
			+"</tr>";
			$(newRow).appendTo("#tablajsonjefe tbody");
			});
			});
				alert(toString.tr.data);
			});

		</script>
		 <script>		 
					 
				$(document).ready(function() {
				$(document).on('click','.si',function(){

                 
				var service = $(this).parent().parent().attr("id");
				
				var dataString = 'id='+service;

				$.ajax({
					type: "POST",
					url: "http://localhost:85/phpmyadmin/sprint3proto/accionJefeAcep.php",  
					data: dataString,
					success: function() {
						$('#si-ok').empty();

						$("#" + service).fadeOut("slow");
						$("#" + service).remove();			
						alert("OK"+service);
							},
					error: function(){
						alert("Hubo un error");
					}
						});
					});                 
				});
</script>
	 		 <script>		 
					 
				$(document).ready(function() {
				$(document).on('click','.no',function(){

				var service = $(this).parent().parent().attr("id");
				
				var dataString = 'id='+service;

				$.ajax({
					type: "POST",
					url: "http://localhost:85/phpmyadmin/sprint3proto/accionJefeDenied.php",  
					data: dataString,
					success: function() {
						$('#no-ok').empty();

						$("#" + service).fadeOut("slow");
						$("#" + service).remove();			
						alert("OK"+service);
							},
					error: function(){
						alert("Hubo un error");
					}
						});
					});                 
				});
</script>
	 	
				 
				 
<script>		 
					 
				$(document).ready(function() {
				$(document).on('click','.ver',function(){

                 
				var service = $(this).parent().parent().attr("id");	
				var dataString = 'id='+service;

				$.ajax({
					type: "POST",
					dataType : 'json',
					url: "http://localhost:85/phpmyadmin/sprint3proto/accionJefeVer.php",
					data: dataString,	
					success: mostrarDatos,
					error: function(){
						alert("Hubo un error");
					}
					
						});
					 return false;
					});                 
				});

	function mostrarDatos( data )
        {
		
		    $("#Name").attr("value", data[0].NombredeEmpleado);
			$("#Codigo").attr("value", data[0].codigoempleado);
			$("#Fecha").attr("value", data[0].Fecha);
			$("#Tiempo").attr("value", data[0].Tiempo);
			$("#se").attr("value", data[0].codvacaciones);
			$("#Detalles").attr("value", data[0].detalles);


            
		}

</script>
		 </table> 
             
             
             
             
              </div>
              
              
        </div>
  
        <div class="col-xs-12 col-sm-4">
  
        </div>
                          <div class="log" style=" color=#ffff">
                          
                          <h2>Datos Del Empleado</h2><br>
                          Nombre:  <input id="Name" value=""> &nbsp;&nbsp;&nbsp;&nbsp;
	
                          Codigo:  <input id="Codigo" value=""><br><br> 

                          Fecha: &nbsp;&nbsp; <input id="Fecha" value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                          Tiempo:  <input id="Tiempo" value=""><br><br>
   
                          No: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp; &nbsp;<input id="se" value="">&nbsp; &nbsp;&nbsp; 

                          Detalles:  <input id="Detalles" value="">

                </div>
       
             <div class="col-xs-12 col-sm-3">

             <p>&nbsp;</p>
             <ol> <a class="btn btn-primary a" name='bt2' type='submit' href="logout.php"  >Cerrar Sesion</a></ol>
        </div>

    </div>
    </div>
       </div>
       <div id="tabs-2">
            <div class="col-xs-12 col-sm-4">
             <div class="input-group">
                <input type="text" class="form-control" placeholder="Ingrese nombre o codigo de Empleado" size="40" id="Filtrar">

       </div>

       </div>
        <br>
             <br>
                 
                  <table  id="tablajsonjefe3" class="table  table-hover table-condensed table-responsive table-bordered scroll">

       <thead>
                         <tr>
                         <th width='35'  style="vertical-align:middle;">No.</th>
						 <th width='35'  style="vertical-align:middle;">codigo del Empleado</th>
                         <th width='300' style="vertical-align:middle;">Nombre del Empleado</th>
                         <th width='100' style="vertical-align:middle;">Cargo</th>
                         <th width='45'  style="vertical-align:middle;">Departamento</th>   
                         <th width='100' style="vertical-align:middle;">fecha de solicitud</th>
                         <th width='35'  style="vertical-align:middle;">Fecha de aprobacion</th>  
                         <th width='35'  style="vertical-align:middle;">Tiempo Solicitado</th>
						 <th width='100'  style="vertical-align:middle;">Tiempo Restante</th>
                         <th width='100'  style="vertical-align:middle;">Tiempo Restante</th>
                         <th width='150' style="vertical-align:middle;">Periodo</th>
          
           

                         </tr> 
                                        
	   </thead>
			<tbody class="buscar">
	

  
			</tbody>
     
              <script type="text/javascript"> 
			$(document).ready(function(){
			var url="reportesJefe.php";
			$("#tablajsonjefe3 tbody").html("");
			$.getJSON(url,function(clientes){

			$.each(clientes, function(i,cliente){
			var newRow =

			"<tr id='"+cliente.codvacaciones+"'>"
			+"<td width='35' heigth='70'>"+i+"</td>"
			+"<td width='90' heigth='70'>"+cliente.codigoempleado+"</td>"
			+"<td width='300' heigth='70'>"+cliente.NombredeEmpleado+"</td>"
			+"<td width='100' heigth='70'>"+cliente.cargo+"</td>"
			+"<td width='118' heigth='70'>"+cliente.depto+"</td>"
			+"<td width='100' heigth='70'>"+cliente.Fechas+"</td>"
			+"<td width='97' heigth='70'>"+cliente.Fechas+"</td>"
			+"<td width='90' heigth='70'>"+cliente.Tiempod+"</td>"
			+"<td width='100' heigth='70'>"+cliente.Tiempos+"</td>"
			+"<td width='100' heigth='70'>"+cliente.decision+"</td>"
			+"<td width='135' heigth='70'>"+cliente.periodo+"</td>"
			
			$(newRow).appendTo("#tablajsonjefe3 tbody");
			});
			});
				alert(toString.tr.data);
			});

		</script>
	


</script>
		 </table> 
             
                   
            
       </div></div>
</body>    
</html>