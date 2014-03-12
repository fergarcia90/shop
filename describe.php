<?php
include "conexion.php";

if($_GET['cod']){
	$cod=$_GET['cod'];
	$qry="SELECT * FROM producto WHERE id_p='".$cod."';";
	$res=mysql_query($qry,$link) or die(mysql_error());
	$row=mysql_fetch_object($res);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css">
<meta charset="UTF-8">
<title>Descripcion</title>
</head>
<body>
	<table class="tabla_describe">
		<?php
		echo "<tr><td>Marca</td><td>".$row->marca."</td></tr>";
		echo "<tr><td>Modelo</td><td>".$row->modelo."</td></tr>";
		echo "<tr><td>Procesador</td><td>".$row->procesador."</td></tr>";
		echo "<tr><td>Memoria</td><td>".$row->memoria."</td></tr>";
		echo "<tr><td>Pulgadas</td><td>".$row->pulgadas."</td></tr>";
		echo "<tr><td>Almacenamiento</td><td>".$row->hd."</td></tr>";
		echo "<tr><td>Precio</td><td>".$row->precio."</td></tr>";
		?>
	</table>
	<a href="principal.php" class="link_regresar">Listado de Productos</a>
</body>
</html>