<?php
require_once './login.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        if(isset($_POST['formulario'])){
            $formulario = $_POST['formulario'];

            try {
                
                switch ($formulario) {
                    case 'registrar_pasajeros':
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
                        break;
    
                    case 'registrar_rutas':
                        //Insertar datos en la tabla Rutas
                        $origen = $_POST['origen'];
                        $destino = $_POST['destino'];
                        $duracion = $_POST['duracion'];
    
                        $query2 = "INSERT INTO rutas(ciudad_origen, ciudad_destino, duracion) VALUES(:origen, :destino, :duracion)";
    
                        $pdo->prepare($query2)->execute([
                            'origen' => $origen,
                            'destino' => $destino,
                            'duracion' => $duracion
                        ]);
                        
                        header("Location: administrador.php");
                        break;

                    case 'buscar_rutas':

                        $origen = $_POST['origen'];
                        $destino = $_POST['destino'];
                        $fecha = $_POST['FSalida'];

                        $query = "SELECT rutas.id, origen.nombre AS ciudad_origen, destino.nombre AS ciudad_destino, rutas.duracion,
                            horarios.hora_salida, horarios.hora_llegada, horarios.fecha
                        FROM rutas
                        INNER JOIN ciudades AS origen ON rutas.ciudad_origen = origen.id
                        INNER JOIN ciudades AS destino ON rutas.ciudad_Destino = destino.id
                        INNER JOIN horarios ON rutas.id = horarios.fk_ruta
                        WHERE :origen = ciudad_origen AND :destino = ciudad_destino AND :fecha = horarios.fecha";

                        $result = $pdo->prepare($query);
                        $result->execute([
                            'origen' => $origen,
                            'destino' => $destino,
                            'fecha' => $fecha
                        ]);
                        $datos = $result->fetchAll(PDO::FETCH_ASSOC);

                        //header("Location: viajes.php");

                        break;

                    case 'registrar_buses':
                        $placa = $_POST['placa'];
                        $modelo = $_POST['modelo'];
                        $capacidad = $_POST['capacidad'];

                        $query = "INSERT INTO buses (placa, modelo, capacidad) VALUES (:placa, :modelo, :capacidad)";

                        $pdo->prepare($query)->execute([
                            'placa' => $placa,
                            'modelo' => $modelo,
                            'capacidad' => $capacidad
                        ]);

                        echo "Datos registrados correctamente";
                        header("Location: administrador.php");

                        break;

                    case 'registrar_conductores';

                        $nombre = $_POST['nombre'];
                        $licencia = $_POST['licencia'];
                        $telefono = $_POST['telefono'];

                        $query = "INSERT INTO conductores (nombre, licencia, telefono) VALUES (:nombre, :licencia, :telefono)";

                        $pdo->prepare($query)->execute([
                            'nombre' => $nombre,
                            'licencia' => $licencia,
                            'telefono' => $telefono
                        ]);

                        header("Location: administrador.php");
                        break;

                    case 'registrar_horarios';
                        $ruta_id = $_POST['id_ruta'];
                        $bus_id = $_POST['id_bus'];
                        $conductor_id = $_POST['id_conductor'];
                        $fecha = $_POST['fecha'];
                        $hora = $_POST['hora'];

                        $query = "INSERT INTO horarios (fk_ruta, fk_bus, fk_conductor, fecha, hora) VALUES (:id_ruta, :id_bus, :id_conductor, :fecha, :hora)";

                        $pdo->prepare($query)->execute([
                            'id_ruta' => $ruta_id,
                            'id_bus' => $bus_id,
                            'id_conductor' => $conductor_id,
                            'fecha' => $fecha,
                            'hora' => $hora
                        ]);

                        header("Location: administrador.php");
                        break;
                    
                    default:
                        echo "Ninguna coincidencia";
                        break;
                }

                echo "Registrado correctamente";
                //header("Location: administrador.php");  
    
            } catch (PDOException $e) {
                echo "Error en enviar datos: " . $e->getMessage();
            }
            
        }
    
    
    }else{
        echo "Error en el formulario";
    }
