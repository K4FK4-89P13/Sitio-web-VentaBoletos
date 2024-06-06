<?php
session_start();
//require_once './login.php';

if (!isset($_SESSION['dni'])){
    header('Location: controlAcceso.php');
    exit();
}
?>


    <?php include_once './head.html' ?>
    <div class="navegador">
        
        <a href="logout.php">cerrar sesion</a>
    </div>
    <h2>Administrador</h2>

    <div class="container">
    <div id="registrar_pasajero" class="card">
        <div class="card-body">

            <h2>Registrar Pasajeros</h2>
            <form action="procesar.php" method="post">
                <div class="mb-2">
                    <label for="nombreCompleto" class="form-label">Nombre completo</label>
                    <input type="text" name="nombreCompleto" id="nombreCompleto" class="form-control">
                </div>

                <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>

                <div class="mb-2">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="tel" name="telefono" id="telefono" class="form-control">
                </div>

                <div class="mb-2">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" name="dni" id="dni" class="form-control">
                </div>

                <input type="submit" value="Registrar" class="btn btn-primary">
            </form>

        </div>
    </div>
    </div>
</body>
</html>
