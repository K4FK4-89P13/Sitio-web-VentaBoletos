<?php require_once  __DIR__ . '/../inc/header.php' ?>
    
    <div class="main">
        
        <div class="container mb-5">

            <form action="http://proyecto.test/home/index" method="post">
                <input type="hidden" name="formulario" value="buscar_rutas">

                <div class="car-body">
                    <div class="mb-2" aria-placeholder="origen">
                        <label for="origen">Origen: </label>
                        <select name="origen" id="origen">
                            <?php
                                foreach ($data['ciudades'] as $ciudad) {
                                    echo "<option value='{$ciudad['id']}'> {$ciudad['nombre']} </option>";
                                }
                            ?>
                        </select>

                        <label for="destino">Destino: </label>
                        <select name="destino" id="destino">
                        <?php
                                foreach ($data['ciudades'] as $ciudad) {
                                    echo "<option value='{$ciudad['id']}'> {$ciudad['nombre']} </option>";
                                }
                            ?>
                        </select>

                        <label for="FSalida">Fecha de salida: </label>
                        <input type="date" name="FSalida" id="FSalida">
                    </div>
                    
                    <input type="submit" value="Buscar">
                </div>
            </form>
        </div>

        <!-- resultados de la busqueda -->
        <div class="container">
            <?php if (isset($data['result'])){ ?>
                
                <h2>Resultados de la Búsqueda</h2>
                <?php if (!empty($data['result'])) { ?>
                    
                    <?php foreach ($data['result'] as $fila) { ?>
            
                        <div class="card mb-2">
                            <div class="card-body">
                                <h4>Origen: <?=$fila['ciudad_origen']?></h4>
                                <h4>Destino: <?=$fila['ciudad_destino']?></h4>
                                <h4>Fecha: <?=$fila['fecha']?></h4>
                                <h4>Salida: <?=$fila['hora_salida']?></h4>
                                <h4>Llegada: <?=$fila['hora_llegada']?></h4>
                                <h4>Duración: <?=$fila['duracion']?></h4>
                                <h4>Capacidad: <?=$fila['capacidad']?></h4>

                                <form method="POST" action="http://proyecto.test/seating/showDetails">
                                    <input type="hidden" name="route_id" value="<?= $fila['id_horario']?>">
                                    <button type="submit" class="btn btn-primary">Seleccionar</button>
                                </form>
                            </div>
                        </div>
                    <?php }

                 
                } else echo "<p>No se encontraron rutas</p>";
            }?>
        </div>

    </div>

<?php require_once  __DIR__ . '/../inc/footer.php' ?>