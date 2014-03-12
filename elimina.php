<?php

session_start();
include "conexion.php";

$user=$_SESSION['user_id'];
$cod;

if($_GET['cod']){
	$cod=$_GET['cod'];
	$qry="DELETE FROM carrito WHERE id_unico=".$cod." ;";
	$res=mysql_query($qry,$link) or die(mysql_error());
	header("Location: mostrarcar.php");
	exit;
}

?>