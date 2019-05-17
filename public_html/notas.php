<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
   
</head>
<body >
    <div class="container">
        <div>
                <h2>COLEGIO LUZ DEL FUTURO</h2>
                <h4>Fundado el 18 de Abril del 2019</h4>
                <br>
         </div>
    <?php
        $id_estudiante=$_GET['id'];
        $servername = "localhost";
        $username = "admin";
        $password = "1234";
        $dbname = "dbLuzDelFuturo";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql="Select tbl_curso.anio_escolar,tbl_nota.id_curso,tbl_nota.id_estudiante,tbl_estudiante.nombre from tbl_nota 
        inner join tbl_curso ON tbl_curso.id_curso=tbl_nota.id_curso
        inner join tbl_estudiante ON tbl_estudiante.id_estudiante=tbl_nota.id_estudiante
       WHERE tbl_nota.id_estudiante =".$id_estudiante." GROUP BY id_curso  ORDER BY fecha_publicacion DESC" ;
        $result = $conn->query($sql); 
        $nombreEstudiante=null;
        $Opciones=null;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $Opciones= $Opciones.'<option value='. $row["id_curso"].'>' . $row["anio_escolar"].'</option> ' ;
                $nombreEstudiante=$row["nombre"];
            }
        } else {
            echo "0 results";
        }
        
        echo '<h2>'.$nombreEstudiante.'<h2>';
        echo'<hr>';

        echo '<select name="anioEscolar">' ;
        echo $Opciones;
        echo '</select>';

        

        $sql = "SELECT tbl_nota.id_asignatura,tbl_nota.id_estudiante,tbl_nota.calificacion,tbl_nota.id_curso,tbl_nota.calificacion,tbl_nota.observacion,tbl_asignatura.descripcion AS asignatura,tbl_estudiante.nombre  FROM tbl_nota 
         inner join tbl_estudiante ON tbl_estudiante.id_estudiante=tbl_nota.id_estudiante
         inner join tbl_asignatura ON tbl_asignatura.id_asignatura=tbl_nota.id_asignatura 
         Where tbl_nota.id_estudiante=".$id_estudiante." ORDER BY fecha_publicacion DESC";
        $result = $conn->query($sql);
       
        echo '<table class="table table-hover" >';
        echo '<tr>
            <th>Código</th> <th>Asignatura</th> <th>Calificación Final</th> <th>Observación</th>
            </tr>';
        echo '<tbody>';
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["id_asignatura"].'</td> <td>' . $row["asignatura"].'</td> <td>'. $row["calificacion"].'</td> <td>'. $row["observacion"].'</td>' ;
                echo '</tr>';
            }
        } else {
            echo "0 results";
        }
        echo '</tbody>';
        echo '</table>';
        $conn->close();
    ?> 
    </div>
   
</body>
</html>