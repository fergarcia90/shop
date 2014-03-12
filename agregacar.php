<?php
session_start();
include "conexion.php";

if($_GET['cod']){
	$cod=$_GET['cod'];
	$qry="SELECT * FROM producto WHERE id_p='".$cod."';";
	$res=mysql_query($qry,$link) or die(mysql_error());
	$row=mysql_fetch_object($res);
	$user=$_SESSION['user_id'];
	$qry2="INSERT INTO carrito (id_p,upc,marca,modelo,procesador,pulgadas,memoria,hd,precio,userId) VALUES ('".$row->id_p."','".$row->upc."','".$row->marca."','".$row->modelo."','".$row->procesador."','".$row->pulgadas."','".$row->memoria."','".$row->hd."',".$row->precio.",'".$user."');";
	$res2=mysql_query($qry2,$link);
	header("Location: mostrarcar.php");
	exit;
}
else{
	echo "Error";
}

?>