<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login Luz Del Futuro</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href="css/Stylopag.css">
    <script src='main.js'></script>
</head>
<body>
    <header class="contenedor">
        <div>
            <img src="imagenes/logocole.png"> <a href="#"></a> 
                <h1>COLEGIO LUZ DEL FUTURO</h1>
                <h3>Fundado el 18 de Abril del 2019</h3>
            </div>
<div class="login">
<form action="login.php" method="post">
    
    <h2>Login</h2>
    <input type="text" name="usuario" placeholder="Usuario" class="form-control">
    <input type="password" name="pass" placeholder="password" class="form-control">

    <ul><!--mostrar menjase de errores -->
             <?php if(!empty($errores)): ?>
              <?php echo $errores ?>
              <?php endif; ?>
         </ul>

    <input type="submit" value="Ingresar">
</form>
</div>


</body>
</html>















