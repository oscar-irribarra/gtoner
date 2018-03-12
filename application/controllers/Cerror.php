<?php

class Cerror extends CI_Controller 
{
	function __construct()
    {
        parent::__construct();		
    }

    public function e404()
	{
		$user = $this->session->userdata('session');
		if($user == null){
			$this->load->view('template/header');
		}else{           
			$this->load->view('template/headerlogeado');		
		}  
		
		$this->load->view('template/e404');
		$this->load->view('template/footer');
	}
}