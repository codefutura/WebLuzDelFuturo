<?php 

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

//conectar a la base//

$conexion = mysqli_connect("localhost", "root", "", "dLuzDelFuturo");
$consulta="SELECT * FROM tbl_usuario WHERE usuario_web = '$usuario' and $clave = 'clave'";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_num_rows($resultado);


if($filas>0){
    header("Location:estudiante.php");
} else{
    echo "Error en la Autentificacion";
}

mysqli_free_result($resultado);
mysqli_close ($conexion);

?>