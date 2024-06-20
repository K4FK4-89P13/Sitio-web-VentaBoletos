<?php

class SeatingController extends Controller {

    public function showDetails() {

        $data = [
            'title' => 'Asientos'
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $routeId = $_POST['route_id'];
        }

        if (isset($_SESSION['route_data'])) {

            foreach ($_SESSION['route_data'] as $value) {
                
                if ($value['id_horario'] == $routeId) {
                    $seatings = $value;
                    break;
                }
            }

            $data['seatings'] = $seatings['capacidad'];

        } else $data['seatings'] = 'No se pudo recuperar datos';

        $this->load_view('pages/seating', $data);
    }
}