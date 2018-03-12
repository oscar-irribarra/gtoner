<?php

class Cpedido extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mpedido');
        $this->load->model('msalida');
    }

    public function index()
    {
        $user = $this->session->userdata('session');
        if ($user == null) {
            redirect('/cinicio/login', 'refresh');
        } else {
            $this->load->view('template/headerlogeado');
            ($user[0]->Rol == 1) ? $this->load->view('vistas_pedido/index') : redirect('/cpedido/indexpedido', 'refresh');
            $this->load->view('template/footer');
        }
    }

    public function indexpedido()
    {
        $user = $this->session->userdata('session');
        if ($user == null) {
            redirect('/cinicio/login', 'refresh');
        } else {
            $this->load->view('template/headerlogeado');
            ($user[0]->Rol == 0) ? $this->load->view('vistas_pedido/indexpedido') : redirect('/cpedido/', 'refresh');
            $this->load->view('template/footer');
        }
    }

    public function getPedidos()
    {
        $datos = $this->mpedido->getPedidos();
        echo json_encode($datos);
    }

    public function entregarPedido()
    {
        $user = $this->session->userdata('session');        
        $data['idPedido'] = $this->input->post('idPedido');
        $data['idubicacionorigen'] = $user[0]->Id_Ubicacion;
        $respuesta = $this->mpedido->guardarSalidaPedido($data);

        if ($respuesta > 0) {
            echo 'Pedido Entregado';
        } else {
            echo 'Stock insuficiente';
        }
    }

    public function guardarPedido()
    {
        $data['Serie'] = $this->input->post('serieImpresora');
        $data['Ctoner'] = $this->input->post('categoriaToner');

        $id_pedido = $this->mpedido->guardarPedido($data);
        $msg = '';
        if ($id_pedido > 0) {
            echo 'Pedido Realizado';
        } else if ($id_pedido == 0) {
            echo 'Serie no encontrada';
        }
        echo json_encode($msg);
    }

    public function getPedidos_Dep()
    {
        $user = $this->session->userdata('session');
        $datos = $this->mpedido->getPedidos_Dep($user[0]->Id_Ubicacion);
        echo json_encode($datos);
    }
}
