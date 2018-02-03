<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CInicio extends CI_Controller 
{

	function __construct()
    {
        parent::__construct();
        $this->load->model('mpedido');
    }
	
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('inicio');
		$this->load->view('template/footer');
	}


}
