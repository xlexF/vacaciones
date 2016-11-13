<?php
	
session_start();
 
$Validars = $_SESSION['validar'];
$ok = 'aaa1';

if (!$Validars==$ok){
	
	header("Location: index.php");	
	
}

?>

