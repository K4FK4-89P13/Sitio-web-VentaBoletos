<?php

class Personal extends Model {

    public function where($user, $password) {

        $stmt = $this->db->prepare("SELECT * FROM personal WHERE dni = ? AND password = ?");
        if ($stmt->execute([$user, $password])) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }else {
            $errorInfo = $stmt->errorInfo();
            die("Error en la consulta SQL: " . $errorInfo[2]);
        }
    }

    public function selectAllConductores() {

        $stmt = $this->db->prepare("SELECT * FROM conductores");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertConductores($array) {

        $sql = "INSERT INTO conductores (nombre, licencia, telefono) VALUES (?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        if ( $stmt->execute([
            $array['nombre'],
            $array['licencia'],
            $array['telefono']
        ]) ) {

            return "Conductores registrado correctamente";
        } else {

            return "No se pudo hacer el registro";
        }
    }
}