<?php session_start();

require 'admin/config.php';
require 'functions.php';

$errores = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
   // $password = hash('sha512', $password);

    $conexion = conexion($bd_config);
    $statement = $conexion->prepare('SELECT * FROM tbl_usuario WHERE nombre = :usuario AND clave= :password AND usuario_web=1');
    $statement->execute([
        ':usuario' => $usuario,
        ':password' => $password
    ]);
    $resultado = $statement->fetch();

    if($resultado !== false){
        $_SESSION['usuario'] = $usuario;
        header('Location: notas.php' );
    }else{
        $errores .= '<li class="error">Tu usuario o contrasena son incorrecto</li>';
    } 
}

require 'views/login.view.php';

?>