<?php

include "conexion.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css">
<script type="text/javascript">
	var ban;
	function revisa () {
		usuario();
		password();
		nombre();
		edad();
		email();
		if(ban){
			var usr=document.getElementById("usr").value;
			var pass=document.getElementById("pass").value;
			window.location.href='registrausr.php?usr='+usr+'&pass='+pass;
		}
	}

	function usuario(){
		if(document.getElementById("usr").value==""){
			alert("El campo usuario no debe de estar vacio");
			ban=false;
		}
		else
			ban=true;
	}

	function password(){
		if(document.getElementById("pass").value==""){
			alert("El campo password no debe de estar vacio");
			ban=false;
		}
		else ban=true;
	}

	function nombre(){
		if(document.getElementById("nombre").value==""){
			alert("El campo Nombre no debe de estar vacio");
			ban=false;
		}
		else
			if(esLetra(document.getElementById("nombre").value))
				ban=true;
			else{
				ban=false;
				alert("El campo Nombre debe tener elementos Alfabeticos");
			}
	}

	function edad () {
		var ent=document.getElementById("edad").value;
		if(esDigito(ent))
			ban=true;
		else{
			ban=false;
			alert("El campo edad debe tener un numero entero");
		}
	}

	function email() {
		var email=document.getElementById("email").value;
		var patt=/^\w+([-_\.]*\w+)*@[a-z]+(\.com)$/;
		if(!patt.test(email)){
			ban=false;
			alert("Email no valido");
		}
		else
			ban=true;
	}

	function esLetra (cadena) {
		var ban1;
		var code;
		for(var i=0; i<cadena.length; i++){
			code=cadena.charCodeAt(i);
			if ( ((code >= 65) && (code <= 90)) || ((code >= 97) && (code <= 122)))
				ban1=true;
			else{
				ban1=false;
			}
		}
		return ban1;
	}

	function esDigito(ent){
	var ban1;
	for(var i=0; i<ent.length; i++){
		if(ent.charAt(i)=='1'||ent.charAt(i)=='2'||ent.charAt(i)=='3'||ent.charAt(i)=='4'||ent.charAt(i)=='5'||ent.charAt(i)=='6'||ent.charAt(i)=='7'||ent.charAt(i)=='8'||ent.charAt(i)=='9'||ent.charAt(i)=='0')
			ban1=true;
		else{
			ban1=false;
			return ban1;
		}
	}
	return ban1;
	}
</script>
<meta charset="UTF-8">
<title>Buy More</title>
</head>

<body>
<form>
	<table class="tabla_productos">
		<tr>
			<th>Usuario</th><td><input type="text" name="usr" id="usr" /></td>
		</tr>
		<tr>
			<th>Contraseña</th><td><input type="text" name="pass" id="pass" /></td>
		</tr>
		<tr>
			<th>Nombre</th><td><input type="text" name="nombre" id="nombre" /></td>
		</tr>
		<tr>
			<th>Edad</th><td><input type="text" name="edad" id="edad" /></td>
		</tr>
		<tr>
			<th>Email</th><td><input type="text" name="email" id="email" /></td>
		</tr>
		<tr>
			<td><input type="button" onclick="revisa()" id="revisar" value="Enviar" />
			</td>
		</tr>
	</table>
</form>
</body>

</html>