<?php session_start();

require 'admin/config.php';
require 'functions.php';

$errores = '';

$idEstudiante=0;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = $_POST['usuario'];
    $password = $_POST['pass'];
 
  

    $conexion = conexion($bd_config);
    $statement = $conexion->prepare('SELECT * FROM tbl_usuario WHERE nombre = :usuario AND clave= :pass AND usuario_web=1');
    $statement->execute([
        ':usuario' => $usuario,
        ':pass' => $password
    ]);
    
    $resultado = $statement->fetch();
      
    if($resultado !== false){
        $_SESSION['usuario'] = $usuario;
        $idEstudiante=$resultado['id_estudiante'];
        header('Location: notas.php?id='.$idEstudiante );
    }else{
        $errores .= '<li class="error">Tu usuario o contrasena son incorrecto</li>';
    } 
 
}

require 'views/login.view.php';

?>