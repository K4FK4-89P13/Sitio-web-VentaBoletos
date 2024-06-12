<?php
require_once './login.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = $_POST['nombreCompleto'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $dni = $_POST['dni'];
        
        $query = "INSERT INTO pasajeros (nombre, email, telefono, dni) VALUES (:nombre, :email, :telefono, :dni)";

        //Insertar datos en la tabla Rutas
        $origen = $_POST['origen'];
        $destino = $_POST['destino'];
        $duracion = $_POST['duracion'];

        $query2 = "INSERT INTO rutas(origen, destino, duracion) VALUES(:origen, :destino, :duracion)";
    
    
        try {

            /* $comando = $pdo->prepare($query);
            $comando->execute([
                'nombre' => $nombre,
                'email' => $email,
                'telefono' => $telefono,
                'dni' => $dni
            ]); */

            $pdo->prepare($query2)->execute([
                'origen' => $origen,
                'destino' => $destino,
                'duracion' => $duracion
            ]);
        
            echo "Registrado correctamente";
            header("include: administrador.php");

        } catch (PDOException $e) {
            echo "Error en enviar datos";
        }
    }else{
        echo "Error en el formulario";
    }
