<?php require_once 'head.html';
        require_once 'procesar.php';
?>
    
    <div class="container">

        <?php foreach ($datos as $fila) { ?>
            
            <div class="card mb-2">
                <a href="./seleccionAsientos.php">
                    <div class="card-body">
                    <h4>Origen: <?=$fila['origen']?></h4>
                    <h4>Destino: <?=$fila['destino']?></h4>
                    <h4>Duración: <?=$fila['duracion']?></h4>
                    </div>
                </a>
            </div>
        <?php }?>


        <!-- <div class="card">
            <div class="card-body">
            <h3>Viaje 2</h3>
            </div>
        </div> -->

    </div>

</body>
</html>