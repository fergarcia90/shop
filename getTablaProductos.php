<?php
   //conexion a la base de datos
  include "conexion.php";

    //obtenemos los alumnos y los ordenamos por codigo
  $q=$_GET['q'];
   $filtro="";
   if ($q)
	$filtro = " WHERE marca like '%$q%' ";
   $sqll="SELECT * FROM  producto $filtro order by marca";
   //ejecutamos el query obtenemos el resultado
   $resultadol= mysql_query($sqll,$link) or die (mysql_error());
   ?>
   <table class="tabla_productos">
   <tr>
    <th>UPC</th>
    <th>Marca</th>
    <th>Modelo</th>
    <th>Precio</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    </tr>
    <?php
  while($row=mysql_fetch_object($resultadol)){
    echo "<tr>";
    echo "<td>".$row->upc."</td>";
    echo "<td>".$row->marca."</td>";
    echo "<td>".$row->modelo."</td>";
    echo "<td>".$row->precio."</td>";
    echo "<td><a href='describe.php?cod=".$row->id_p."'>Descripcion</a></td>";
    echo "<td><a href='agregacar.php?cod=".$row->id_p."'>Agregar al carrito</a></td>";
    echo "</tr>";
  }
  echo "</table>";
    ?>