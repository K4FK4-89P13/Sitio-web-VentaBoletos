<?php

class TicketController extends Controller {

    public function index() {

        $boletosModel = $this->load_model('Boletos');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $json = file_get_contents('php://input');   
            $datos = json_decode($json, true);

            $horarioId = $datos['horarioId'];
            $pasajeros = $datos['pasajeros'];
            $asientos = $datos['asientos'];

            //Registrar pasajeros
            $pasajerosModel = $this->load_model('Pasajeros');
            $pasajeroIds = $pasajerosModel->insertPasajero($pasajeros);

            //resgistrar asientos
            $asientoModel = $this->load_model('AsientosReservados');
            for ($i=0; $i < count($asientos); $i++) { 
                $resultado = $asientoModel->reservarAsiento($horarioId[0], $asientos[$i]);
            }

            //registrar boleto
            $boletosModel = $this->load_model('Boletos');
            $IdsBoleto = $boletosModel->insertBoleto($pasajeroIds, $horarioId[0], $asientos);

            //Consultando a ultimos boletos registrados
            $boletoGenerado = $boletosModel->getInsertAll($IdsBoleto);


            $data = [
                'title' => 'Boleto',
                'pasajeroIds' => $pasajeroIds,
                'IdsBoleto' => $IdsBoleto,
                'boletoGenerado' => $boletoGenerado
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