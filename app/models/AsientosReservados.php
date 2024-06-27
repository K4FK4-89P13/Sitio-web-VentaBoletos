<?php

class AsientosReservados extends Model {

    protected $table = 'asientos_reservados';

    public function getAsientosByHorarios($horarioId) {

        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE fk_horario = :horarioId");
        $stmt->execute(['horarioId'=> $horarioId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function reservarAsiento($horarioId, $numAsiento) {

        $sql = "INSERT INTO {$this->table} (fk_horario, num_asiento, estado) VALUES (:horarioId, :numAsiento, 'ocupado')";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':horarioId', $horarioId, PDO::PARAM_INT);
        $stmt->bindParam(':numAsiento', $numAsiento, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception("Error al reserval el asiento: " . implode(" ", $stmt->errorInfo()));
        }
    }
}