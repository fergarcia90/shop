<?php
//Conexion al servidor mysql:localhost, no usuario, no password
$link = mysql_connect("localhost","root","");
     
//verificamos si se pudo conectar
       if (!$link){
           die ("Hubo un error al conectarse a la base de datos");
       }
       //seleccionamos la base de datos a usar
       mysql_select_db("tienda",$link);
        
	
?>
