<?php
session_start();
require_once 'login.php'; // Archivo que contiene la conexión a la base de datos


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['dni'];
    $password = $_POST['password'];

    // Consulta a la base de datos para verificar el usuario
    $query = "SELECT * FROM personal WHERE dni = :dni AND password = :password";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':dni', $username);
    $stmt->bindParam(':password', $password); // Considera usar hash de contraseñas
    $stmt->execute();

    if ($stmt->rowCount() === 1) {
        $_SESSION['dni'] = $username;
        header('Location: administrador.php');
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
} else {
    header('Location: controlAcceso.html');
    exit();
}
