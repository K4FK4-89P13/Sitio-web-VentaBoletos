<?php require_once __DIR__ . '/../inc/header.php' ?>

<?php //print_r($data) ?>

<?php foreach ($data['boletoGenerado'] as $ticket) {
    echo "
    <div class='ticket'>
        <h2>Boleto Electrónico</h2>
        <p><strong>ID Boleto:</strong> {$ticket['id_boleto']}</p>
        <p><strong>Nombre:</strong> {$ticket['nombre']}</p>
        <p><strong>Email:</strong> {$ticket['email']}</p>
        <p><strong>Teléfono:</strong> {$ticket['telefono']}</p>
        <p><strong>DNI:</strong> {$ticket['dni']}</p>
        <p><strong>Fecha del Viaje:</strong> {$ticket['fecha']}</p>
        <p><strong>Hora de Salida:</strong> {$ticket['hora_salida']}</p>
        <p><strong>Número de Asiento:</strong> {$ticket['num_asiento']}</p>
        <p><strong>Precio:</strong> {$ticket['precio']}</p>
        <p><strong>Fecha de Compra:</strong> {$ticket['fecha_compra']}</p>
    </div>
    <hr>
    ";
} ?>
<?php require_once __DIR__ . '/../inc/footer.php' ?>