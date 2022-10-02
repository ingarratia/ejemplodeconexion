<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    session_start();
    if (isset($_SESSION['usuario'])) {
        echo '<h1> Bienvenido a la pagina de inicio </h1>';
        echo 'Usuario: ' . $_SESSION['usuario'] . '  id: ' . $_SESSION['id'];
    } else {
        echo 'No hay sesion iniciada';
        header('Location: index.php');
    }
    ?>

    <br>
    <a href="logica/cerrar.php">Cerrar sesion</a>

    <br>
    <br>

    <!-- form listado de los candidatos que puedes votar -->
    <form action="logica/votar.php" method="POST">
        <label for="candidato"><input type="radio" name="candidato" value="1">Pablo</label>
        <label for="candidato"><input type="radio" name="candidato" value="2">dasdasd</label>
        <label for="candidato"><input type="radio" name="candidato" value="3">sadasdsa</label>
        <label for="candidato"><input type="radio" name="candidato" value="4">asdasd</label>
        <label for="candidato"><input type="radio" name="candidato" value="5">asdasd</label>
        <label for="candidato"><input type="radio" name="candidato" value="6">sadsad</label>
        <label for="candidato"><input type="radio" name="candidato" value="7">sdasd</label>
        <label for="candidato"><input type="radio" name="candidato" value="8">asds</label>
        <label for="candidato"><input type="radio" name="candidato" value="9">asdas</label>
        <label for="candidato"><input type="radio" name="candidato" value="10">asdasd</label>
        
        <button type="submit">Votar</button>
    </form>
</body>

</html>