<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
</head>
<body>
    <?php include_once './head.html'  ?>
    <div class="main">
        
        <div class="container">
            <form action="viajes.php" method="post">
                <div class="car-body">
                    <div class="mb-2" aria-placeholder="origen">
                        <label for="origen">Origen: </label>
                        <select name="origen" id="origen">
                            <option value="arequipa">Arequipa</option>
                            <option value="moquegua">Moquegua</option>
                            <option value="tacna">Tacna</option>
                        </select>

                        <label for="destino">Destino: </label>
                        <select name="destino" id="destino">
                            <option value="arequipa">Arequipa</option>
                            <option value="moquegua">Moquegua</option>
                            <option value="tacna">Tacna</option>
                        </select>

                        <label for="fechaInicio">Fecha de salida: </label>
                        <input type="datetime-local" name="FSalida" id="FSalida">
                    </div>
                    
                    <input type="submit" value="Buscar">
                </div>
            </form>
        </div>

    </div>
</body>
</html>