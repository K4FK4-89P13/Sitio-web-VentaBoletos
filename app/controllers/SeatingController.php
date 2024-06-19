<?php

class SeatingController extends Controller {

    public function index() {

        $seatingModel = $this->load_model('Ciudades');
        //$seatings = $seatingModel->findRuteByCity();
        $data = [
            'title' => 'Asientos'
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['origen'])) {

            $origen = $_POST['origen'];
            $destino = $_POST['destino'];
            $fecha = $_POST['FSalida'];

            $result = $seatingModel->findRuteByCity($origen, $destino, $fecha);
            $data['seatings'] = $result['capacidad'];
        }

        $this->load_view('pages/seating', $data);
    }
}