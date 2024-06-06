<?php
require_once './login.php';

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = $_POST['nombreCompleto'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $dni = $_POST['dni'];
    
        $query = "INSERT INTO pasajeros (nombre, email, telefono, dni) VALUES (:nombre, :email, :telefono, :dni)";
    
        $comando = $pdo->prepare($query);
        $comando->execute([
            'nombre' => $nombre,
            'email' => $email,
            'telefono' => $telefono,
            'dni' => $dni
        ]);
    
        echo "Registrado correctamente";
        header("include: administrador.php");
    }else{
        echo "Error en el formulario";
    }
} catch (PDOException $e) {
    echo "Error en enviar datos";
}