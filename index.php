<?php

session_start();

if (isset($_SESSION['usuario'])) {
    header('Location: dashboard.php');
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <?php if (isset($_GET['error'])) {
        if ($_GET['error'] == 4) {
            echo '<h1 class="text-danger"> Error al intentar conectar con el servidor. </h1>';
        }
    } ?>
    <div class="container">
        <div class="d-flex justify-content-center" style="margin-top: 12rem !important;">
            <div class="card" style="width: 50rem;">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h1> Iniciar sesion </h1>
                            <?php if (isset($_GET['error'])) {
                                if ($_GET['error'] == 1) {
                                    echo '<h6 class="text-danger"> Usuario o contraseña incorrectos </h6>';
                                }
                            } ?>
                            <form action="logica/login.php" method="POST">
                                <input class="form-control mt-2" type="text" name="usuario" placeholder="username" required>
                                <input class="form-control mt-2" type="password" name="password" placeholder="password" required>
                                <button class="btn btn-primary mt-2" type="submit" name="submit">Login</button>
                            </form>
                        </div>
                        <div class="col">
                            <h1> Registro </h1>
                            <?php if (isset($_GET['mensaje'])) {
                                if ($_GET['mensaje'] == 'Usuario registrado con exito') {
                                    echo '<h6 class="text-success"> Usuario registrado con exito </h6>';
                                }
                            } ?>
                            <form action="logica/registro.php" method="POST">
                                <input class="form-control mt-2" type="text" name="usuario" placeholder="username" required>
                                <input class="form-control mt-2" type="password" name="password" placeholder="password" required>
                                <button class="btn btn-success mt-2" type="submit" name="submit">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>