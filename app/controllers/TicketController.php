<?php

class TicketController extends Controller {

    public function index() {

        $boletosModel = $this->load_model('Boletos');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $horarioId = $_SESSION['horarioId'];
            $seats = $_SESSION['selectedSeats'];
        }
    }
}