<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h2> <?php  
        session_start();
        if(isset($_SESSION['usuario'])){
            echo '<h1> Bienvenido a la pagina de inicio </h1>';
            echo 'Usuario: ' . $_SESSION['usuario'] . '  id: ' . $_SESSION['id']; 
        }else{
            echo 'No hay sesion iniciada';
            header('Location: index.php');
        }
    ?>
    
</h2>
        <form action="logica/cerrar.php" method="POST">
            <button type="submit" name="submit">Cerrar sesion</button>
        </form>
</body>
</html>