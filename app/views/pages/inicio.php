<?php require_once  __DIR__ . '/../inc/header.php' ?>
    
    <div class="main">
        
        <div class="container mt-4 mb-4">

            <div class="alert alert-danger mt-3 d-none" id="wRutas">
                <span id="msgWRutas">La ciudad origen y destino no pueden ser iguales</span>
            </div>
                <div class="w-50 mx-auto">
                    <form class="row">
                        <input type="hidden" name="formulario" value="buscar_rutas">

                            <div class="col">
                                <label for="origen" class="form-label">Origen: </label>
                                <select name="origen" id="origen" class="form-control">
                                    <?php
                                        foreach ($data['ciudades'] as $ciudad) {
                                            echo "<option value='{$ciudad['id']}'> {$ciudad['nombre']} </option>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="col">
                                <label for="destino" class="form-label">Destino: </label>
                                <select name="destino" id="destino" class="form-control">
                                    <?php
                                        foreach ($data['ciudades'] as $ciudad) {
                                            echo "<option value='{$ciudad['id']}'> {$ciudad['nombre']} </option>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="col">
                                <label for="FSalida" class="form-label">Fecha de salida: </label>
                                <input type="date" name="FSalida" id="FSalida" class="form-control">
                            </div>

                            <div class="col align-self-end">
                                <button type="button" class="btn secondary" onclick="getRutas()">Buscar</button>
                            </div>
                                
                    </form>
                </div>
        </div>

        <!-- resultados de la busqueda -->
        <div class="container w-50" id="container">
        </div>

    </div>

<?php require_once  __DIR__ . '/../inc/footer.php' ?>