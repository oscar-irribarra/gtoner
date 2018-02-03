<?php

class Ctoner extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mtoner');
    }

    public function index()
    {
        $data['listato'] = $this->mtoner->getToneres();
        $this->load->view('template/header');
        $this->load->view('vistas_toner/index', $data);
        $this->load->view('template/footer');
    }

    public function crud()
    {
        $this->load->view('template/header');
        $this->load->view('vistas_toner/crud');
        $this->load->view('template/footer');
    }

    public function getToner()
    {
        $id = $this->input->post('iddepartamento');
        $datos = $this->mtoner->getToner($id);
        echo json_encode($datos);
    }

    public function getToner_departamento($id = 0)
    {
        $id = $this->input->post('iddepartamento');
        $datos = $this->mtoner->getTonDep($id);
        echo json_encode($datos);
    }

    public function getTonerTodos()
    {
        $datos = $this->mtoner->getToneres();
        echo json_encode($datos);
    }

    public function guardar_toner()
    {
       $datos['marca'] = $this->input->post('txtMarca');
       $datos['modelo'] = $this->input->post('txtModelo');
       $datos['idcategoria'] = $this->input->post('cbCategoria');
       
       $datos['idtoner'] = $this->mtoner->guardarToner($datos);

        if($datos['idtoner'] > 0)
        {
            
                redirect('ctoner/index');
        }
    }
}