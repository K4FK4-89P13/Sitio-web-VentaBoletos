<?php require_once __DIR__ . '/../inc/header.php' ?>

<?php //print_r($data) ?>

<div class="ticket">
        <div class="ticket-header">
            <img src="https://example.com/logo.png" alt="Company Logo">
            <h2>Boleto Electrónico</h2>
        </div>
        <div class="ticket-info">
            <div>
                <span>ID Boleto:</span> <?= $ticket['id_boleto'] ?>
            </div>
            <div>
                <span>Nombre:</span> <?= $ticket['nombre'] ?>
            </div>
            <div>
                <span>Email:</span> <?= $ticket['email'] ?>
            </div>
            <div>
                <span>Teléfono:</span> <?= $ticket['telefono'] ?>
            </div>
            <div>
                <span>DNI:</span> <?= $ticket['dni'] ?>
            </div>
            <div>
                <span>Fecha del Viaje:</span> <?= $ticket['fecha'] ?>
            </div>
            <div>
                <span>Hora de Salida:</span> <?= $ticket['hora_salida'] ?>
            </div>
            <div>
                <span>Número de Asiento:</span> <?= $ticket['num_asiento'] ?>
            </div>
            <div>
                <span>Precio:</span> <?= $ticket['precio'] ?>
            </div>
            <div>
                <span>Fecha de Compra:</span> <?= $ticket['fecha_compra'] ?>
            </div>
        </div>
        <div class="barcode">
            <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?= $ticket['id_boleto'] ?>&size=100x100" alt="QR Code">
        </div>
        <div class="ticket-footer">
            <p>Gracias por elegir nuestra compañía de buses. ¡Que tenga un buen viaje!</p>
        </div>
    </div>


<?php require_once __DIR__ . '/../inc/footer.php' ?>