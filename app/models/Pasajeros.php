<?php

class Pasajeros extends Model {

    public function insertPasajero($datos) {

        $sql = "INSERT INTO pasajeros (nombre, email, telefono, dni) VALUES (?, ?, ?, ?)";
        $lastIds = [];
        foreach ($datos as $pasajero) {
            $stmt = $this->db->prepare($sql);
            if ( $stmt->execute( [ $pasajero['nombre'], $pasajero['email'], $pasajero['telefono'], $pasajero['dni'] ] ) ) {
                $lastIds[] = $this->db->lastInsertId();
            }
        }
        return $lastIds;
    }
}