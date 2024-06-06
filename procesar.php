<?php
require_once './login.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = $_POST['nombreCompleto'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $query = "INSERT INTO pasajeros (nombre, email, telefono) VALUES (:nombre, :email, :telefono)";

    $comando = $pdo->prepare($query);
    $comando->execute([
        'nombre' => $nombre,
        'email' => $email,
        'telefono' => $telefono
    ]);

    echo "Registrado correctamente";
}else{
    echo "Error en el formulario";
}