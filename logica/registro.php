<?php

$SERVIDORBASEDATOS = 'mysql:dbname=pruebaconexion;host=127.0.0.1';
$USER = 'root';
$PASSWORD = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['usuario']) && isset($_POST['password'])) {

        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        try{
            $dbh = new PDO($SERVIDORBASEDATOS, $USER, $PASSWORD);
        }catch(PDOException $e){
            header('Location: ../index.php?error=4');
            die();
        }

        try {
            $sqlconsulta = "INSERT INTO `login`(`usuario`, `password`) VALUES ('$usuario','$password')";

            $stmt = $dbh->prepare($sqlconsulta);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                echo 'Usuario registrado con exito <br>';
                header('Location: ../index.php?mensaje=Usuario registrado con exito');
        
            }else{
                header('Location: ../index.php?error=2');
            }             
        } catch (PDOException $e) {
            echo 'Error al conectar con la base de datos: ' . $e->getMessage();
            header('Location: ../index.php?error=4');
            die();
        }

       

        $dbh = null;
    }
}
