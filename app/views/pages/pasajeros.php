
<div class="container">
<div id="registrar_pasajero" class="card mb-5">
            <div class="card-body">

                <h4>Pasajero</h4>
                <?php //print_r($data)?>
                <form action="procesar.php" method="post">
                    <!-- <input type="hidden" name="horarioId" value="<?//= $data['horarioId']?>">
                    <input type="hidden" name="selectedSeats" value="<?//= $data['selectedSeats']?>"> -->

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
