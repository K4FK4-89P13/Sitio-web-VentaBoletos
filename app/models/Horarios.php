<?php

class Horarios extends Model {

    public function insert($array) {

        $sql = "INSERT INTO horarios (fk_ruta, fk_bus, fk_conductor, fecha, hora_salida, hora_llegada) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        if ( $stmt->execute([
            $array['rutas'],
            $array['buses'],
            $array['conductor'],
            $array['fecha'],
            $array['hora_salida'],
            $array['hora_llegada'],
        ]) ) {
            return "Registrado correctamente";
        }
    }
}