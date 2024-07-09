<?php 

class Buses extends Model {

    public function get_seatings() {

        $query = "
        SELECT buses.capacidad
        ";
        $stmt = $this->db->prepare("SELECT capacidad FROM buses");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getAllBuses() {

        $stmt = $this->db->prepare("SELECT * FROM buses");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($array) {

        $sql = "INSERT INTO buses (placa, modelo, capacidad) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        if ( $stmt->execute([
            $array['placa'],
            $array['modelo'],
            $array['capacidad'],
        ]) ) {
            return "Registrado correctamente";
        } else {
            return "No se pudo registrar datos";
        }
    }
}