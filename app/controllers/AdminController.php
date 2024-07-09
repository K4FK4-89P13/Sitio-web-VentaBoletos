<?php

class AdminController extends Controller {

    public function allRutas() {

        $rutasModel = $this->load_model('Rutas');
        $rutas = $rutasModel->getAllRutas();

        header("Content-type: application/json");
        $rutasJson = json_encode($rutas); 
        echo $rutasJson;
    }

    public function allbuses() {

        $busesmodel = $this->load_model('Buses');
        $buses = $busesmodel->getAllBuses();

        echo json_encode($buses);
    }

    public function allConductores() {

        $conductoresModel = $this->load_model('Personal');
        $conductores = $conductoresModel->selectAllConductores();

        echo json_encode($conductores);
    }

    public function allHorarios() {

        $horariosModel = $this->load_model('Rutas');
        $horarios = $horariosModel->selectHorarios();

        echo json_encode($horarios);
    }

    public function selectCiudades() {

        $ciudadesModel = $this->load_model('Rutas');
        $ciudades = $ciudadesModel->get_ciudades();

        echo json_encode($ciudades);
    }

    
    public function insertRutas() {

        $origen = $_POST['origen'];
        $destino = $_POST['destino'];
        $duracion = $_POST['duracion'];
        
        $rutasModel = $this->load_model('Rutas');
        $result = $rutasModel->insertRutas($origen, $destino, $duracion);
        echo $result;
    }

    public function getDataHorario() {
        $datos = [];

        $rutasModel = $this->load_model('Rutas');
        $datos[] = $rutasModel->getAllRutas();

        $busesModel = $this->load_model('Buses');
        $datos[] = $busesModel->getAllBuses();

        $conductorModel = $this->load_model('Personal');
        $datos[] = $conductorModel->selectAllConductores();

        echo json_encode($datos);
    }

    public function insertHorario() {

        $datos = file_get_contents("php://input");
        $datos = json_decode($datos, true);

        $horarioModel = $this->load_model('Horarios');


        echo $horarioModel->insert($datos);
    }

    public function insertBuses() {

        $datos = file_get_contents('php://input');
        $datos = json_decode($datos, true);

        $busesModel = $this->load_model('Buses');
        echo $busesModel->insert($datos);
    }

    public function insertConductores() {

        $datos = file_get_contents("php://input");
        $datos = json_decode($datos, true);

        $conductoresModel = $this->load_model('Personal');

        echo $conductoresModel->insertConductores($datos);
    }
}