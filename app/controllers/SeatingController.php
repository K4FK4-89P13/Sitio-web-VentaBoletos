<?php
session_start();
class SeatingController extends Controller {

    private $asientosReservadosModel;
    public function __construct() {
        $this->asientosReservadosModel = $this->load_model('AsientosReservados');
    }
    
    public function index() {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $horarioId = $_POST['horario_id'];
            $_SESSION['horarioId'] = $_POST['horario_id'];
        }

        $asientosOcupados = $this->asientosReservadosModel->getAsientosByHorarios($horarioId);
        $data = [
            'title' => 'Asientos',
            'asientosOcupados' => $asientosOcupados,
            'horarioId' => $horarioId
        ];
        $this->load_view('pages/seating', $data);
    }

    public function selectSeats() {

        header("Content-Type: application/json");

        try {
            //Leer la entrada JSON
            $input = json_decode(file_get_contents('php://input'), true);

            //Verificar que las claves existen
            if (!isset($input['selectedSeats']) || !isset($input['horarioId'])) {
                throw new Exception('Datos incompletos');
            }

            $selectedSeats = $input['selectedSeats'];
            $horarioId = $input['horarioId'];

            foreach ($selectedSeats as $seatNumber) {
                $seatNumber = intval($seatNumber);
                $this->asientosReservadosModel->reservarAsiento($horarioId, $seatNumber);
            }

            $_SESSION['selectedSeats'] = $selectedSeats;
            $_SESSION['horarioId'] = $horarioId;

            //Devolver una respuesta en JSON
            echo json_encode([
                'status' => 'success',
                'message' => 'Seats selected successfully'
            ]);

            //$this->load_view('pages/pasajeros', ['title' => 'Pasajeros']);

        } catch (Exception $e) {
            //Devolver un error JSON
            http_response_code(500);
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
                /* 'seats' => $selectedSeats,
                'horario' => $horarioId */
            ]);
        }

        /* if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $selectedSeats = json_decode($_POST['selectedSeats'], true);
            $horarioId = $_POST['horarioId'];

            foreach ($selectedSeats as $seatNumber) {
                $this->asientosReservadosModel->reservarAsiento($horarioId, $seatNumber);
            }

            $this->load_view('pages/pasajeros');
            exit();
        } */
    }

    public function pasajeros() {
        //$horarioId = $_SESSION['horarioId'];
        //$selectedSeats = $_SESSION['selectedSeats'];
        $selectedSeats = explode(',', $_POST['selectedSeats']);

        $data = [
            'title' => 'Pasajeros',
            //'horarioId' => $horarioId,
            'selectedSeats' => $selectedSeats
        ];
        $this->load_view('pages/pasajeros', $data);
    }

    public function showDetails() {

        $data = [
            'title' => 'Asientos'
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $horarioId = $_POST['horario_id'];
        }

        /* if (isset($_SESSION['route_data'])) {

            foreach ($_SESSION['route_data'] as $value) {
                
                if ($value['id_horario'] == $routeId) {
                    $seatings = $value;
                    break;
                }
            }

            $data['seatings'] = $seatings['capacidad'];

        } else $data['seatings'] = 'No se pudo recuperar datos'; */

        $this->load_view('pages/seating', $data);
    }
}