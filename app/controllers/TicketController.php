<?php

class TicketController extends Controller {

    public function index() {

        $boletosModel = $this->load_model('Boletos');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $json = file_get_contents('php://input');   
            $datos = json_decode($json, true);

            //Registrar pasajeros
            $pasajerosModel = $this->load_model('Pasajeros');
            $pasajeroIds = $pasajerosModel->insertPasajero($datos['pasajeros']);

            //resgistrar asientos
            $asientoModel = $this->load_model('AsientosReservados');
            for ($i=0; $i < count($datos['asientos']); $i++) { 
                $resultado = $asientoModel->reservarAsiento($datos['horarioId'], $datos['asientos'][$i]);
            }

            //registrar boleto
            $boletosModel = $this->load_model('Boletos');
            $result = $boletosModel->insertBoleto($pasajeroIds, $datos['horarioId'], $datos['asientos']);


            $data = [
                'title' => 'Boleta',
                'pasajeroIds' => $pasajeroIds,
                'resultado' => $result
            ];

            $_SESSION['dataBoletos'] = $data;

            //$this->boleto('pages/boleto', $data);

            echo json_encode([
                'status' => 'succes',
                'message' => 'Datos recibidos'
            ]);

        } else {
            http_response_code(405);
            echo json_encode([
                'status' => 'error',
                'message' => 'metodo no permitido'
            ]);
        }
    }

    public function boleto() {
        $this->load_view('pages/boleto', $_SESSION['dataBoletos']);
    }
}