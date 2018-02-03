<?php

class Centrada extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mentrada');      
    }

    public function index()
    {
        $data['lista_ent'] = $this->mentrada->getEntradas();
        $this->load->view('template/header');
        $this->load->view('vistas_entrada/index',$data);
        $this->load->view('template/footer');
    }

    public function crud()
    {   
        $this->load->view('template/header');
        $this->load->view('vistas_entrada/crud'); 
        $this->load->view('template/footer');
    }

    public function guardar_entrada()
	{
		$data['idtoner'] = $this->input->post('cboTonerentrada');
		$data['cantidad'] = $this->input->post('txtCantidad');

        $id_entrada = $this->mentrada->guardarEntrada($data);
        if($id_entrada > 0)
        {
            redirect('centrada/index');            
        }
    }
    
   
}