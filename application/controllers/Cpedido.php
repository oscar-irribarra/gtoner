<?php

class Cpedido extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mpedido');
        $this->load->model('msalida');
    }

    public function index()
    {
        $data['listaped'] = $this->mpedido->getPedidos();

        $this->load->view('template/header');
        $this->load->view('vistas_pedido/index',$data);
        $this->load->view('template/footer');
    }

    public function guardar_pedido()
	{
		$data['serie'] = $this->input->post('txtSerie');

        $id_pedido = $this->mpedido->guardarPedido($data);
        if($id_pedido > 0)
        {
            redirect('cinicio/index');            
        }
    }
    
    public function entregar_pedido($id)
    {
        $id_pedido = $this->mpedido->guardarSalidaPedido($id);
       
        if($id_pedido > 0)
        {            
            redirect('cpedido/index');            
        }
    }
}