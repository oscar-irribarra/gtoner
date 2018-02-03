<?php

class Csalida extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('msalida');
    }

    public function index()
    {
        $data['lista_salida'] = $this->msalida->getSalidas();
        $this->load->view('template/header');
        $this->load->view('vistas_salida/index',$data);
        $this->load->view('template/footer');
    } 

    public function crud()
    {
        $this->load->view('template/header');
        $this->load->view('vistas_salida/crud');
        $this->load->view('template/footer');        
    }

    public function guardar_salida()
    {
        $data['iddepartamento'] = $this->input->post('cbodepartamento');
        $data['idtoner'] = $this->input->post('cbotoner');
        $data['cantidad'] = $this->input->post('txtCantidad');

        $id_salida = $this->msalida->guardarSalida($data);

        if($id_salida > 0)
        {             
            redirect('csalida/index');         
        }     
    }
}