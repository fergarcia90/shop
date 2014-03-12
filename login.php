<?php
// iniciamos la sesion
session_start();

$errorMessage = '';
if (isset($_POST['txtUserId']) && isset($_POST['txtPassword'])) {
    include 'conexion.php';

    $userId   = $_POST['txtUserId'];
    $password = $_POST['txtPassword'];
    $page     = $_POST['txtPage'];

    // revisar si la combinacion usuario/password existe en la base de datos
    $sql = "SELECT userId
            FROM tbl_auth_user
            WHERE userId = '$userId' AND user_password = '$password'";

    $result = mysql_query($sql) or die('Error en el query ' . mysql_error());

    if (mysql_num_rows($result) == 1) {
        // el usuario y password coiciden,
        // establecemos la sesion
        $row = mysql_fetch_object($result);

        $_SESSION['db_is_logged_in'] = true;
        $_SESSION['role'] = $row->rol;
        $_SESSION['user_id'] = $row->userId;

        // despues de autenticarnos nos movemos a la pagina original
        header('Location: ' . $page);
        exit;
    } else {
        $errorMessage = 'Usuario/password incorrectos';
    }

}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="estilo.css">
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php
// obtenemos la pagina a la que hay que redireccionar
if ($_GET['page'] != ''){
    $page = $_GET['page'];
}else
{       //mandamos a la pagina por default
    $page = "principal.php";
}
if ($errorMessage != '') {
?>
<p align="center"><strong><font color="#990000"><?php echo $errorMessage; ?></font></strong></p>
<?php
}
?>
<form action="" method="post" name="frmLogin" id="frmLogin">
<?php
     echo "<input type='hidden' name='txtPage' id='txtPage' value='$page' />" ;
?>

 <table width="400" border="1" align="center" cellpadding="2" cellspacing="2" class="tabla_login">
  <tr>
   <td width="150">Usuario</td>
   <td><input name="txtUserId" type="text" id="txtUserId"></td>
  </tr>
  <tr>
   <td width="150">Password</td>
   <td><input name="txtPassword" type="password" id="txtPassword"></td>
  </tr>
  <tr>
   <td width="150">&nbsp;</td>
   <td><input name="btnLogin" type="submit" id="btnLogin" value="Login"></td>
  </tr>
 </table>
</form>
<a href="registra.php" class="link_registra">Registrarse</a>
</body>
</html>