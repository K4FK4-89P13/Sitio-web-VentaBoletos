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
}