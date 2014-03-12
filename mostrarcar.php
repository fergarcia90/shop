<?php
session_start();
include "conexion.php";

$user=$_SESSION['user_id'];
$qry="SELECT * FROM carrito WHERE userId='".$user."';";
$resultado=mysql_query($qry,$link) or die(mysql_error());

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css">
<meta charset="UTF-8">
<title>Descripcion</title>
</head>
<body>
	<table class="tabla_mostracar">
		<?php
		while($row=mysql_fetch_object($resultado)){
		echo "<tr>";
		echo "<td>".$row->upc."</td>";
		echo "<td>".$row->marca."</td>";
		echo "<td>".$row->modelo."</td>";
		echo "<td>".$row->precio."</td>";
		echo "<td><a href='elimina.php?cod=".$row->id_unico."'>Quitar</a></td>";
		echo "</tr>";
		}
		?>
	</table>
	<a href="pdf.php" class="link_pdf">Generar PDF de mi Carro</a><br/>
	<a href="principal.php" class="link_listado_productos">Listado Prouctos</a>
</body>
</html>