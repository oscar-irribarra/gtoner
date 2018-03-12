<?php

class Ctoner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mtoner');
    }

    public function index()
    {
        $user = $this->session->userdata('session');
        if ($user == null) {
            redirect('/cinicio/login', 'refresh');
        } else {
            $this->load->view('template/headerlogeado');
            ($user[0]->Rol == 1) ? $this->load->view('vistas_toner/index') : redirect('/ctoner/indextoner', 'refresh');
            $this->load->view('template/footer');
        }
    }

    public function getToner()
    {
        $id = $this->input->post('idCategoria');
        $datos = $this->mtoner->getToner($id);
        echo json_encode($datos);
    }

    public function getToners()
    {
        $datos = $this->mtoner->getToners();
        echo json_encode($datos);
    }

    public function guardarToner()
    {
        $datos['marca'] = $this->input->post('marcaToner');
        $datos['modelo'] = $this->input->post('modeloToner');
        $datos['idcategoria'] = $this->input->post('categoriaToner');

        $respuesta = $this->mtoner->guardarToner($datos);

        if ($respuesta > 0) {
            echo 'Toner Guardado!';
        }else{
            echo 'Error, Intente Nuevamente';
        }
    }

    public function actualizarToner()
    {
        $datos['id'] = $this->input->post('idToner');
        $datos['marca'] = $this->input->post('marcaToner');
        $datos['modelo'] = $this->input->post('modeloToner');
        $datos['idcategoria'] = $this->input->post('categoriaToner');

        $respuesta = $this->mtoner->actualizarToner($datos);
        if ($respuesta > 0) {
            echo 'Toner Actualizado';
        }else{
            echo 'Error, Intente Nuevamente';
        }
    }
    //----------------------
  

    public function indextoner()
    {
        $user = $this->session->userdata('session');
        if ($user == null) {
            redirect('/cinicio/login', 'refresh');
        } else {
            $this->load->view('template/headerlogeado');
            ($user[0]->Rol == 0) ? $this->load->view('vistas_toner/indextoner') : redirect('/ctoner/', 'refresh');
            $this->load->view('template/footer');
        }
    }

    public function getToner_departamento($id = 0)
    {
        $id = $this->input->post('iddepartamento');
        $datos = $this->mtoner->getTonDep($id);
        echo json_encode($datos);
    }

    public function getTonerTodos_dep()
    {
        $user = $this->session->userdata('session');

        $datos = $this->mtoner->getToners_dep($user[0]->Id_Ubicacion);
        echo json_encode($datos);
    }

}
