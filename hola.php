<?php
session_start();
$cod=$_SESSION['CodEmpleado'];
$conn  = pg_connect("user=postgres password=123456 dbname=SistemaVacaciones host=localhost");
$query = pg_query($conn, "SELECT imagen FROM empleados WHERE codempleado = ".$cod."");
$row   = pg_fetch_row($query);
$image = pg_unescape_bytea($row[0]);
header("Content-type: image/jpeg");
echo $image;
pg_close($conn);

?>