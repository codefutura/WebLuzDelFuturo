<?php

function conexion($bd_config){
    try {
        //estructura pdo
       // $variable = new PDO('mysql:localhost;dbname=nombre_base_datos','usuario','password');
        $conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['db_name'],$bd_config['user'],$bd_config['pass']);
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }
}

function limpiarDatos($datos){//evitar inyeccion de datos
    $datos = htmlspecialchars($datos);
    $datos = trim($datos);
    $datos = filter_var($datos, FILTER_SANITIZE_STRING);

    return $datos;
}
function iniciarSession($table, $conexion){
    $statement = $conexion->prepare("SELECT * FROM $table WHERE usuario = :usuario");
    $statement->execute([
        ':usuario' => $_SESSION['usuario']
    ]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}

?>