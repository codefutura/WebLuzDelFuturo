<?php  session_start();

require 'admin/config.php';
require 'functions.php';

//comprovar session
if(!isset($_SESSION['usuario'])){
    header('Location:'.RUTA.'login.php');
}

$conexion = conexion($bd_config);
$admin = iniciarSession('usuarios', $conexion);

if($admin['tipo_usuario'] == 'administrador'){
    require 'views/admin.view.php';
}else{
    header('Location:'.RUTA.'login.php');//si intento saltar de usuario por url me lleva al login
}

?>