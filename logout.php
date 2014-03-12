<?php
// Iniciamos la sesion
session_start();

// si el usuario esta logeado borramos la sesion
if (isset($_SESSION['db_is_logged_in'])) {
    unset($_SESSION['db_is_logged_in']);
}

// ya que salio podemos enviarlo a la pagina de login,
header('Location: login.php?page=principal.php');
?>
