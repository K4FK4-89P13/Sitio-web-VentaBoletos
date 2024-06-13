<?php
session_start();
//require_once './login.php';

if (!isset($_SESSION['dni'])){
    header('Location: controlAcceso.php');
    exit();
}
?>


    <?php include_once './head.html';
        include_once 'login.php';
    ?>
    <div class="navegador">
        
        <a href="logout.php">cerrar sesion</a>
    </div>
    
    <div class="container">
        <h2>Administrador</h2>

        <div id="registrar_pasajero" class="card mb-5">
            <div class="card-body">

                <h2>Registrar Pasajeros</h2>
                <form action="procesar.php" method="post">
                    <input type="hidden" name="formulario" value="registrar_pasajeros">

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

        <div class="card mb-5">
            <div class="card-body">

                <h2>Registrar Rutas</h2>
                <form action="procesar.php" method="post">
                    <input type="hidden" name="formulario" value="registrar_rutas">

                    <div class="mb-2">
                        <label for="origen" class ="form-label">Origen</label>
                        <input type="text" name="origen" id="origen" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label for="destino" class ="form-label">Destino</label>
                        <input type="text" name="destino" id="destino" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label for="duracion" class="form-label">Duracion (hh:mm)</label>
                        <input type="time" name="duracion" id="duracion" class="form-control">
                    </div>

                    <input type="submit" value="Registrar" class ="btn btn-primary">
                </form>

            </div>
        </div>

        <div class="card mb-5">
            <div class="card-body">

                <h2>Registrar Buses</h2>
                <form action="procesar.php" method="post">
                    <input type="hidden" name="formulario" value="registrar_buses">

                    <div class="mb-2">
                        <label for="placa" class="form-label">Placa</label>
                        <input type="text" name="placa" id="placa" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input type="text" name="modelo" id="modelo" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label for="capacidad" class="form-label">Capacidad</label>
                        <input type="number" name="capacidad" id="capacidad" class="form-control">
                    </div>

                    <input type="submit" value="Registrar" class="btn btn-primary">
                </form>

            </div>
        </div>

        <div class="card mb-5">
            <div class="card-body">

                <h2>Registrar Conductores</h2>

                <form action="procesar.php" method="post">
                    <input type="hidden" name="formulario" value="registrar_conductores">

                    <div class="mb-2">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label for="licencia" class="form-label">Licencia</label>
                        <input type="text" name="licencia" id="licencia" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="tel" name="telefono" id="telefono" class="form-control">
                    </div>

                    <input type="submit" value="Registrar" class="btn btn-primary">
                </form>

            </div>
        </div>

        <div class="card mb-5">
            <div class="card-body">

                <h2>Registrar Horarios</h2>

                <form action="procesar.php" method="post">
                    <input type="hidden" name="formulario" value="registrar_horarios">

                    <div class="mb-2">
                        <label for="id_ruta" class="form-label">Ruta (ID)</label>
                        <select name="id_ruta" id="id_ruta" class="form-control">
                            <?php 
                                $select_rutas = "SELECT * FROM rutas";
                                $rutas = $pdo->prepare($select_rutas);
                                $rutas->execute();
                                $data_rutas = $rutas->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($data_rutas as $fila){
                                    echo "<option value='{$fila['id_ruta']}'>{$fila['origen']}, {$fila['destino']}</option>";
                                }
                            ?>

                        </select>
                        <!-- <input type="number" name="id_ruta" id="id_ruta" class="form-control"> -->
                    </div>

                    <div class="mb-2">
                        <label for="id_bus" class="form-label">Bus (ID)</label>
                        <select name="id_bus" id="id_bus" class="form-control">
                            <?php
                                $select_bus = "SELECT * FROM buses";
                                $buses = $pdo->prepare($select_bus);
                                $buses->execute();
                                $data_bus = $buses->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($data_bus as $fila) {
                                    echo "<option value='{$fila['id_bus']}'>{$fila['placa']}, {$fila['modelo']}</option>";
                                }
                            ?>
                        </select>
                        <!-- <input type="number" name="id_bus" id="id_bus" class="form-control"> -->
                    </div>

                    <div class="mb-2">
                        <label for="id_conductor" class="form-label">Conductor (ID)</label>
                        <select name="id_conductor" id="id_conductor" class="form-control">
                            <?php
                                $select_conductor = "SELECT * FROM conductores";
                                $conductores = $pdo->prepare($select_conductor);
                                $conductores->execute();
                                $data_conductores = $conductores->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($data_conductores as $fila) {
                                    echo "<option value='{$fila['id_conductor']}'>{$fila['nombre']}, {$fila['licencia']}</option>";
                                }
                            ?>
                        </select>
                        <!-- <input type="number" name="id_conductor" id="id_conductor" class="form-control"> -->
                    </div>

                    <div class="mb-2">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" name="fecha" id="fecha" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label for="hora" class="form-label">Hora</label>
                        <input type="time" name="hora" id="hora" class="form-control">
                    </div>

                    <input type="submit" value="Registrar" class="btn btn-primary">
                </form>
            </div>
        </div>

    </div>

</body>
</html>
