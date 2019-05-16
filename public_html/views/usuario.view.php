<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenido Usuario</title>
</head>
<body>
    <a href="<?php echo RUTA.'close.php' ?> ">Cerrar Sesion</a>
    <h1>Bienvenido  Estudiantes</h1>
    <table id="t1" border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Curso</th>
                <th>Notas</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Michael</td>
                <td>Paredes</td>
                <td>michaelparedes@outlook.com</td>
                <td>octavo de batchiller</td>
                <td>85</td>
            </tr>
        </tbody>
    </table>
</body>
</html>