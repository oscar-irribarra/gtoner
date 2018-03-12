<?php

class Cinicio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mpedido');
        $this->load->model('mlogin');
    }

    public function index()
    {
        $user = $this->session->userdata('session');
        if ($user == null) {
            $this->load->view('template/header');
        } else {
            $this->load->view('template/headerlogeado');
        }

        $this->load->view('vistas_inicio/inicio');
        $this->load->view('template/footer');
    }

    public function login()
    {
        $user = $this->session->userdata('session');
        if ($user == null) {
            $this->load->view('template/header');
            $this->load->view('vistas_inicio/login');
            $this->load->view('template/footer');
        } else {
            ($user[0]->Rol == 1) ? redirect('/cimpresora/', 'refresh') : redirect('/cpedido/', 'refresh');
        }
    }

    public function validarUsuario()
    {
        $data['usuario'] = $this->input->post('usuarioLogin');
        $data['contraseña'] = $this->input->post('passLogin');

        $array_usuario = $this->mlogin->login($data);

        if (count($array_usuario) > 0) {
            $this->session->set_userdata('session', $array_usuario);

            if ($array_usuario[0]->Rol == 0) {
                redirect('/cpedido/', 'refresh');
            } else {
                redirect('/cimpresora/', 'refresh');
            }
        } else {
            echo 'Usuario no registrado, Intente Nuevamente';
        }
    }

    public function e404()
    {
        $user = $this->session->userdata('session');
        if ($user == null) {
            $this->load->view('template/header');
        } else {
            $this->load->view('template/headerlogeado');
        }

        $this->load->view('template/e404');
        $this->load->view('template/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('cinicio');
    }
}
