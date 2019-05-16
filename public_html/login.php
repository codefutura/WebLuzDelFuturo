<?php session_start();

require 'admin/config.php';
require 'functions.php';

$errores = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
   // $password = hash('sha512', $password);

    $conexion = conexion($bd_config);
    $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password AND id_estudiante = :id_estudiante AND usuario_web = 1 :usuario_web');
    $statement->execute([
        ':usuario' => $usuario,
        ':password' => $password,
        ':id_estudiante' => $id_estudiante,
        ':usuario_web' => $usuario_web,
        
    ]);
    $resultado = $statement->fetch();

    if($resultado !== false){
        $_SESSION['usuario'] = $usuario;
        header('Location:'.RUTA.'validate.php');
    }else{
        $errores .= '<li class="error">Tu usuario o contrasena son incorrecto</li>';
    } 
}

require 'views/login.view.php';

?>