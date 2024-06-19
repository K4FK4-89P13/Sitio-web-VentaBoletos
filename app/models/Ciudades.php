<?php

class Ciudades extends Model {

    public function get_rutas() {

        $stmt = $this->db->prepare("SELECT id, nombre FROM ciudades");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findRuteByCity($origen, $destino, $fecha) {

        $query = "SELECT rutas.id, origen.nombre AS ciudad_origen, destino.nombre AS ciudad_destino, rutas.duracion,
                            horarios.hora_salida, horarios.hora_llegada, horarios.fecha, buses.capacidad
                        FROM rutas
                        INNER JOIN ciudades AS origen ON rutas.ciudad_origen = origen.id
                        INNER JOIN ciudades AS destino ON rutas.ciudad_Destino = destino.id
                        INNER JOIN horarios ON rutas.id = horarios.fk_ruta
                        INNER JOIN buses ON buses.id_bus = horarios.fk_bus
                        WHERE ciudad_origen = ? AND ciudad_destino = ? AND horarios.fecha = ?";
        
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $origen,
            $destino,
            $fecha
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}