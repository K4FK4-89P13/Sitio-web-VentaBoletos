<?php

class LoginController extends Controller {

    public function index() {

        //verifica si el usuario esta autenticado
        if (!$this->isloggedIn()) {
            header('Location: http://proyecto.test/login/login');
            exit();
        }

        $data = ['title' => 'Registro'];
        $this->load_view('pages/registro', $data);
    }

    public function login() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dni = $_POST['dni'];
            $password = $_POST['password'];

            //validar usuario y contraseña
            
        }
    }

    private function isloggedIn() {

        return isset($_SESSION['username']);
    }
}