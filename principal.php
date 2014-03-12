<?php

session_start();
include "conexion.php";

$resultado;
$qry="SELECT * FROM producto;";

if(!isset($_SESSION['db_is_logged_in']) || $_SESSION['db_is_logged_in']!=true){
	header('location: login.php?page=principal.php');
	exit;
}
else{
	$resultado=mysql_query($qry,$link) or die(mysql_error());
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<script type="text/javascript">
function muestraTabla()
{
str=document.getElementById("txt1").value;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtTabla").innerHTML=xmlhttp.responseText;
    }
  else
	{
    document.getElementById("txtTabla").innerHTML="Cargando...";
    }
  }
xmlhttp.open("GET","getTablaProductos.php?q="+str,true);
xmlhttp.send();
}
</script>
<link rel="stylesheet" type="text/css" href="estilo.css">
<meta charset="UTF-8">
<title>Buy More</title>
</head>
<body onload="muestraTabla()">
<h3>Buscar por Marca:</h3>
<form action=""> 
<input class="campo" type="text" id="txt1"  onkeyup="muestraTabla()" />
</form>

<table align="center" class="img_productos" >
	<tr>
		<td><img src="laptop.jpg" alt="Laptops" height="100" width="100" /></td>
		<td><img src="tablet.jpg" alt="Tablets" height="100" width="100" /></td>
		<td><img src="tv.jpg" alt="TV's" height="100" height="100" /></td>
		<td><img src="sphone.jpg" alt="Smartphones" height="100" width="100" /></td>
	</tr>
</table>
<p><span id="txtTabla"></span></p>
<a href="mostrarcar.php" class="link_carrito">Ir a mi carrito</a>
<a href="logout.php" class="link_salir">Salir</a>
</body>
</html>