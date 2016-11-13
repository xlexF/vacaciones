<?php 

session_start();
require('librerias/fpdf.php');

$vacaciones = $_GET['getvacaciones'];//'00eaf7fa4cabc208e722a0f93d114f4f';

$fecha = date("Y-m-d H:i:s");

 $connect = pg_connect("host=localhost port=5432 dbname=SistemaVacaciones user=postgres password=123456");
 if (!$connect) {
  
   header("Location: 1E.php");
   echo "Ocurrió un error.\n";
   exit;
}

$SQL="SELECT * from vacaciones inner join empleados on (vacaciones.codempleado=empleados.codempleado) where 
idvacaciones='".$vacaciones."'";

pg_query($connect,$SQL);
$result = pg_query($connect, $SQL);

if($row = pg_fetch_array($result)){ 

			  $fechai=$row['fechainicio'];
			  $fechaf=$row['fechafinal'];
			  $fecha2=$row['fechainicio'];
			  $horai=2;
			  $horaf= 1;
			  $com=$row['detalles'];

			$mes = $fechai[3].$fechai[4];	
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
 } 
?>