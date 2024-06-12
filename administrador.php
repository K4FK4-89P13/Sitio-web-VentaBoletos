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
    
    <div class="container">
        <h2>Administrador</h2>

        <div id="registrar_pasajero" class="card mb-5">
            <div class="card-body">

                <h2>Registrar Pasajeros</h2>
                <!-- <form action="" method="post">
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
                </form> -->

            </div>
        </div>

        <div class="card">
            <div class="card-body">

                <h2>Registrar Rutas</h2>
                <form action="administrador.php" method="post">

                    <div class="mb-2">
                        <label for="origen" class ="form-label">Origen</label>
                        <input type="text" name="origen" id="origen" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label for="destino" class ="form-label">Destino</label>
                        <input type="text" name="destino" id="destino" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label for="duracion" class="form-label">Duracion</label>
                        <input type="time" name="duracion" id="duracion" class="form-control">
                    </div>

                    <input type="submit" value="Registrar" class ="btn btn-primary">
                </form>

            </div>
        </div>

    </div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'post'){
            echo $_POST['duracion'];
        }
    ?>
</body>
</html>
