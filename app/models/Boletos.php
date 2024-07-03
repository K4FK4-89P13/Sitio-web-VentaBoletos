<?php

class Boletos extends Model {

    public function insertBoleto($pasajeroID, $horarioId, $asientos) {
        $sql = "INSERT INTO boletos (fk_pasajero, fk_horario, num_asiento, precio, fecha_compra) VALUES (?, ?, ?, '50.00', '2024-06-14')";
        for ($i=0; $i < count($asientos); $i++) { 
            $stmt = $this->db->prepare($sql);
            if ($stmt->execute([$pasajeroID[$i], $horarioId[$i], $asientos[$i]])) {
                $mensaje = "Registrado";
            } else {
                $errorInfo = $stmt->errorInfo();
                die("Error en la consulta SQL boletos: " . $errorInfo[2]);
            }
        }

    }
}