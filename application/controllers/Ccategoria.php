<?php

class Ccategoria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mcategoria');
    }

    public function getCategorias()
    {
        $datos = $this->mcategoria->getCategorias();
        echo json_encode($datos);
    }
}
