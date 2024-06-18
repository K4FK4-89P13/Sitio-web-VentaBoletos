<?php

class SeatingController extends Controller {

    public function index() {

        $this->load_model();
        $this->load_view('pages/seating');
    }
}