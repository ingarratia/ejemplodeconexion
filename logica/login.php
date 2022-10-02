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
            $sqlconsulta = "SELECT id, usuario, password FROM login WHERE usuario = '$usuario' AND password = '$password'";

            $stmt = $dbh->prepare($sqlconsulta);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                echo 'Usuario encontrado <br>';
                while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    session_start();
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['id'] = $fila['id'];
                   
                    
                    header('Location: ../votar.php');
                }
            }else{
                header('Location: ../index.php?error=1');
                
            }
        } catch (PDOException $e) {
            echo 'Error al conectar con la base de datos: ' . $e->getMessage();
            header('Location: ../index.php?error=4');
            die();
        }

        /* PDOException */


        $dbh = null;
    }
}
