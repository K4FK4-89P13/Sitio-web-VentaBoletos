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
}