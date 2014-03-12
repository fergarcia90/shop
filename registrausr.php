<?php

include "conexion.php";

$usr=$_GET['usr'];
$pass=$_GET['pass'];
$qry="SELECT * FROM tbl_auth_user WHERE userId='".$usr."';";
$res=mysql_query($qry,$link) or die(mysql_error());
$row=mysql_fetch_object($res);

if(!$row){
	$qry2="INSERT INTO tbl_auth_user VALUES ('".$usr."','".$pass."','usuario')";
	$res2=mysql_query($qry2,$link) or die(mysql_error());
	$affectedrows=mysql_affected_rows();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css">
<meta charset="UTF-8">
<title>Buy More</title>
</head>
<body>
	<?php
	if($affectedrows > 0){
		echo "<h3>El usuario se Agrego Correctamente</h3>";
		echo "<a href='login.php?page=principal.php' class='link_login'>Regresar al Log in</a>";
	}
	else
		echo "<h3>No se pudo Agregar</h3>";
}
else{
	echo "<h3>El nombre de usuario ya esta Registrado</h3>";
	echo "<a href='registra.php'>Regresar al Registro</a>";
}
	?>
</body>
</html>
