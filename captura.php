<?php 
session_start();
require('librerias/fpdf.php');
date_default_timezone_set("America/Guatemala");
$codusuario = $_SESSION['CodEmpleado'];
$usuario2 = $codusuario;
$fecha = date("Y-m-d H:i:s");
$idvacaciones = md5($usuario2.$fecha);


/*
 if ($_POST['bt2']) {
	
	
	header("Location: logout.php");
	 

 }
*/
 $connect = pg_connect("host=localhost port=5432 dbname=SistemaVacaciones user=postgres password=123456");
 if (!$connect) {
	 
	  header("Location: 1E.php");
	  echo "Ocurrió un error.\n";
	  exit;
}else{

	

 $fechai=$_POST['fecha'];
 $fechaf=$_POST['fecha1'];
 $horai=$_POST['hora'];
 $horaf=$_POST['hora1'];
 $fecha2=$_POST['fecha2'];
 $com=$_POST['comentarios'];
	 
	 
 $fechaiii = strtotime($fechai);
 $fechafff = strtotime($fechaf);
	 
//$sum2= date_diff( $fechai, $fechaf);	 
	 
 $rest2 = (integer)substr($horai,0, 2);
 $rest = substr($horaf,0, 2);
$sum = 	$rest-$rest2;


if(isset($_POST["check"]) && $_POST["check"]=="1")
{

		
  if(empty($fechai) and empty($fechaf))
  {
  $fechai=$_POST['fecha2'];
  $fechaf=$_POST['fecha2'];
  $fecha2="";      
  }


$mes = $fechai[3].$fechai[4];

function nombremes($mes){
 setlocale(LC_TIME, 'spanish');  
 $nombre=strftime("%B",mktime(0, 0, 0, $mes, 1, 2000)); 
 return $nombre;
} 
$nombrem= nombremes($mes);

$pdf=new FPDF();
$pdf->AddPage();
$pdf->image('images/descarga.jpg',15,8,50,30,'jpg');
$pdf->SetFont('Arial','B',16);
$pdf->ln(10);
$pdf->Cell(60,10,'');
$pdf->Cell(40,10,'Sistema de Peticiones de el Ministerio Publico');
$pdf->ln(40);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60,10,'Fecha De Inicio De Vacaciones:  '.$fechai);
$pdf->ln(15);
$pdf->Cell(60,10,'Fecha De Regreso De Vacaciones:  '.$fechaf);
$pdf->ln(25);
$pdf->Cell(60,10,'Fecha De Inicio De Vacaciones si Desea Horas de Sus Vacaciones:  '.$fecha2);
$pdf->ln(25);
$pdf->Cell(90,10,'Hora De Inicio De Vacaciones:  '.$horai);
$pdf->Cell(50,10,'Hora De Regreso De Vacaciones:  '.$horaf);
$pdf->ln(40);
$pdf->Cell(60,10,'Motivo Por El Cual Se Va De Vacaciones:  '.$com);
$pdf->Output();



pg_query($connect,"INSERT INTO vacaciones(idvacaciones,fechasolicitud,fechainicio,fechafinal,detalles,tiempohoras,codempleado,idperiodo,decisionjefedepartamento) 
VALUES ('".$idvacaciones. "','" .$fecha. "','" .$fechai. "','" .$fechaf. "','" .$com. "',5,".$usuario2.",1,1)");
	
}
	 
if(isset($_POST["check1"]) && $_POST["check1"]=="1")
{


  if(empty($fechai) and empty($fechaf))
  {
  $fechai=$_POST['fecha2'];
  $fechaf=$_POST['fecha2'];
  $fecha2="";      
  }


$mes = $fechai[3].$fechai[4];

function nombremes($mes){
 setlocale(LC_TIME, 'spanish');  
 $nombre=strftime("%B",mktime(0, 0, 0, $mes, 1, 2000)); 
 return $nombre;
} 
$nombrem= nombremes($mes);

$pdf=new FPDF();
$pdf->AddPage();
$pdf->image('images/descarga.jpg',15,8,50,30,'jpg');
$pdf->SetFont('Arial','B',16);
$pdf->ln(10);
$pdf->Cell(60,10,'');
$pdf->Cell(40,10,'Sistema de Peticiones de el Ministerio Publico');
$pdf->ln(40);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60,10,'Fecha De Inicio De Vacaciones:  '.$fechai);
$pdf->ln(15);
$pdf->Cell(60,10,'Fecha De Regreso De Vacaciones:  '.$fechaf);
$pdf->ln(25);
$pdf->Cell(60,10,'Fecha De Inicio De Vacaciones si Desea Horas de Sus Vacaciones:  '.$fecha2);
$pdf->ln(25);
$pdf->Cell(90,10,'Hora De Inicio De Vacaciones:  '.$horai);
$pdf->Cell(50,10,'Hora De Regreso De Vacaciones:  '.$horaf);
$pdf->ln(40);
$pdf->Cell(60,10,'Motivo Por El Cual Se Va De Vacaciones:  '.$com);
$pdf->Output();

	
pg_query($connect,"INSERT INTO vacaciones(idvacaciones,fechasolicitud,fechahoras,detalles,tiempohoras,codempleado,idperiodo,decisionjefedepartamento) 
                                 VALUES ('".$idvacaciones. "','" .$fecha. "','" .$fecha2. "','" .$com. "',5,".$usuario2.",1,1)");

}


	 if((isset($_POST["check1"]) && $_POST["check1"]=="1") and (isset($_POST["check"]) && $_POST["check"]=="1")){
		 
		 
		 
		 echo "hola mundo";
		 
	 }
/*	 
	 
if (empty($fecha2))	 {
	
pg_query($connect,"INSERT INTO vacaciones (idvacaciones,fechasolicitud,fechainicio,fechafinal,detalles,tiempohoras,codempleado,idperiodo,decisionjefedepartamento) 
							VALUES ('".$idvacaciones. "','" .$fecha. "','" .$fechai. "','" .$fechaf. "','" .$com. "','" .$sum2. "','" .$codusuario. "',1,1)");
	
	
}
	 
pg_query($connect,"INSERT INTO vacaciones (idvacaciones,fechasolicitud,fechainicio,fechafinal,fechahoras,detalles,tiempohoras,codempleado,idperiodo,decisionjefedepartamento) 
VALUES ('".$idvacaciones. "','" .$fecha. "','" .$fechai. "','" .$fechaf. "','" .$fecha2. "','" .$com. "','" .$sum2. "','" .$codusuario. "',1,1)");
 
*/
 }



	?>