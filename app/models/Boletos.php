<?php

class Boletos extends Model {

    public function insertBoleto($pasajeroID, $horarioId, $asientos) {
        $lastIdsBoleto = [];
        $sql = "INSERT INTO boletos (fk_pasajero, fk_horario, num_asiento, precio, fecha_compra) VALUES (?, ?, ?, '50.00', '2024-06-14')";
        for ($i=0; $i < count($asientos); $i++) { 
            $stmt = $this->db->prepare($sql);
            if ($stmt->execute([$pasajeroID[$i], $horarioId, $asientos[$i]])) {
                $lastIdsBoleto[] = $this->db->lastInsertId();
            } else {
                $errorInfo = $stmt->errorInfo();
                die("Error en la consulta SQL boletos: " . $errorInfo[2]);
            }
        }
        return $lastIdsBoleto;

    }

    //
    public function getInsertAll($arrayIds) {
        $idsString = '';
        for ($i=0; $i < count($arrayIds); $i++) { 
            $idsString .= $arrayIds[$i] . ",";
        }
        $idsString = rtrim($idsString, ',');

        $sql = 
        "SELECT id_boleto,
        pasajeros.nombre, pasajeros.email, pasajeros.telefono, pasajeros.dni,
        horarios.fecha, horarios.hora_salida,
        num_asiento, precio, fecha_compra
        FROM boletos
        INNER JOIN pasajeros ON fk_pasajero = pasajeros.id_pasajero
        INNER JOIN horarios ON fk_horario = horarios.id_horario
        WHERE id_boleto IN ($idsString)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}