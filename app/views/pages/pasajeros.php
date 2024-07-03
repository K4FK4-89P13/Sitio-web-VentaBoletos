
<div class="container">
    <form id="form_pasajeros">

        <input type="hidden" id="horarioId" name="horarioId" value="<?= $_SESSION['horarioId']?>">
        <input type="hidden" id="numAsientos" value="<?=count($data['selectedSeats'])?>">

        <?php for ($i = 0; $i < count($data['selectedSeats']); $i++) { ?>
            <div id="registrar_pasajero<?=$i?>" class="card mb-2">
            
                <div class="card-body">

                    <h4>Pasajero <?=$i+1?></h4>
                    <?php //print_r($data); print_r($_SESSION)?>
                        <input type="hidden" id="asiento[<?=$i?>]" value="<?=$data['selectedSeats'][$i]?>">

                    <div class="mb-2">
                        <label for="nombreCompleto<?=$i?>" class="form-label">Nombre completo</label>
                        <input type="text" id="nombreCompleto[<?=$i?>]" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label for="email<?=$i?>" class="form-label">Email</label>
                        <input type="email" id="email[<?=$i?>]" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label for="telefono<?=$i?>" class="form-label">Telefono</label>
                        <input type="tel" id="telefono[<?=$i?>]" class="form-control">
                    </div>

                    <div class="mb-2">
                        <label for="dni<?=$i?>" class="form-label">DNI</label>
                        <input type="text" id="dni[<?=$i?>]" class="form-control">
                    </div>

                        <!-- <input type="submit" value="Registrar" class="btn btn-primary"> -->
                        
                </div>
            </div>
        <?php } ?>
                    
    </form>
</div>
