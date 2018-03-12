<?php

class Centrada extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mentrada');
    }

    public function index()
    {
        $user = $this->session->userdata('session');
        if ($user == null) {
            redirect('/cinicio/login', 'refresh');
        } else {
            $this->load->view('template/headerlogeado');
            ($user[0]->Rol == 1) ? $this->load->view('vistas_entrada/index') : redirect('/centrada/indexentrada', 'refresh');
            $this->load->view('template/footer');
        }
    }

    public function indexentrada()
    {
        $user = $this->session->userdata('session');
        if ($user == null) {
            redirect('/cinicio/login', 'refresh');
        } else {
            $this->load->view('template/headerlogeado');
            ($user[0]->Rol == 0) ? $this->load->view('vistas_entrada/indexentrada') : redirect('/centrada/', 'refresh');
            $this->load->view('template/footer');
        }
    }

    public function getEntradas()
    {
        $datos = $this->mentrada->getEntradas();
        echo json_encode($datos);
    }

    public function getEntradasUbicacion()
    {
        $user = $this->session->userdata('session');
        $datos = $this->mentrada->getEntradasUbicacion($user[0]->Id_Ubicacion);
        echo json_encode($datos);
    }

    public function guardarEntrada()
    {
        $data['idtoner'] = $this->input->post('tonerEntrada');
        $data['cantidad'] = $this->input->post('cantidadEntrada');

        $respuesta = $this->mentrada->guardarEntrada($data);
        if ($respuesta > 0) {
            echo 'Entrada Guardada';
        } else {
            echo 'Error, Intente nuevamente';
        }
    }

}
