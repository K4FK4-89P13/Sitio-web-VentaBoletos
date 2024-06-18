<?php

class LoginController extends Controller {

    public function index() {

        //verifica si el usuario NO esta autenticado
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
            if ($this->validate_personal($dni, $password)) {
                
                $_SESSION['dni'] = $dni;
                header("Location: http://proyecto.test/login/index");
                exit();
            } else {
                $data = [
                    'error' => 'Usuario o contraseña incorrecta',
                    'title' => 'Acceso'
                ];
                $this->load_view('pages/acceso', $data);
                return;
            }
        }

        $this->load_view('pages/acceso', ['title' => 'Acceso']);
    }

    private function validate_personal($username, $password) {

        $personal = $this->load_model('Personal');
        $result = $personal->where($username, $password);
        return !empty($result);
    }

    public function logout() {

        session_start();
        session_unset();
        session_destroy();
        header("Location: http:proyecto.test/login/login");
        exit();
    }

    private function isloggedIn() {

        //session_start();
        return isset($_SESSION['dni']);
    }
}