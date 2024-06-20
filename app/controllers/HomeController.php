<?php

class HomeController extends Controller {

    public function index() {

        $ciudadModel = $this->load_model('Ciudades');
        $ciudad = $ciudadModel->get_rutas();
        $data = [
            'title' => 'INICIO',
            'ciudades' => $ciudad
        ];

        if (!empty($this->consulta())) {

            $data['result'] = $this->consulta();
        }


        $this->load_view('pages/inicio', $data);
    }

    public function acceso() {

        $this->load_view('pages/acceso', ['title' => 'Acceso']);
    }

    public function consulta() {

        $ciudadModel = $this->load_model('Ciudades');
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['origen'])) {

            $origen = $_POST['origen'];
            $destino = $_POST['destino'];
            $fecha = $_POST['FSalida'];
            $result = $ciudadModel->findRuteByCity($origen, $destino, $fecha);

            $_SESSION['route_data'] = $result;
            
            return $result;
        }
    }
}