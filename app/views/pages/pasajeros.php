
<div class="container">
    <form id="form_pasajeros">

        <input type="hidden" id="horarioId" name="horarioId" value="<?= $_SESSION['horarioId']?>">
        <input type="hidden" id="numAsientos" value="<?=count($data['selectedSeats'])?>">

        <?php for ($i = 0; $i < count($data['selectedSeats']); $i++) { ?>
            <div id="registrar_pasajero<?=$i?>" class="card mb-2">
            
                <div class="card-body">

                    <h4 class="mb-3">Pasajero <?=$i+1?></h4>
                    <?php //print_r($data); print_r($_SESSION)?>
                        <input type="hidden" id="asiento[<?=$i?>]" value="<?=$data['selectedSeats'][$i]?>">

                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" id="nombreCompleto[<?=$i?>]" class="form-control" placeholder="Enter name">
                                <label for="nombreCompleto<?=$i?>" class="form-label">Nombre completo</label>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-floating">
                                <input type="email" id="email[<?=$i?>]" class="form-control" placeholder="Enter email">
                                <label for="email<?=$i?>" class="form-label">Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="tel" id="telefono[<?=$i?>]" class="form-control" placeholder="Enter tel">
                                <label for="telefono<?=$i?>" class="form-label">Telefono</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" id="dni[<?=$i?>]" class="form-control" placeholder="Enter dni">
                                <label for="dni<?=$i?>" class="form-label">DNI</label>
                            </div>
                        </div>
                    </div>

                        <!-- <input type="submit" value="Registrar" class="btn btn-primary"> -->
                        
                </div>
            </div>
        <?php } ?>
                    
    </form>
</div>
