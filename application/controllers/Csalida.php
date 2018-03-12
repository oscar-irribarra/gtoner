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
        $user = $this->session->userdata('session');
		if($user == null){
		    redirect('/cinicio/login', 'refresh');
		}else{
            $this->load->view('template/headerlogeado');           
		    ($user[0]->Rol == 1)? $this->load->view('vistas_salida/index'): redirect('/csalida/indexsalida','refresh');
		    $this->load->view('template/footer');
        }
    } 

    public function indexsalida()
    {      
        $user = $this->session->userdata('session');
		if($user == null){
		    redirect('/cinicio/login', 'refresh');
		}else{
            $this->load->view('template/headerlogeado');           
		    ($user[0]->Rol == 0)? $this->load->view('vistas_salida/indexsalida'): redirect('/csalida/','refresh');
		    $this->load->view('template/footer');
        }
    } 

    public function getSalidas()
    {
        $user = $this->session->userdata('session');
        $datos = $this->msalida->getSalidas();
        echo json_encode($datos);
    }

    public function getSalidas_dep()
    { 
        $user = $this->session->userdata('session');        
        $datos = $this->msalida->getSalidas_dep($user[0]->Id_Ubicacion);
        echo json_encode($datos);
    }

    public function crud()
    {
        $this->load->view('template/header');
        $this->load->view('vistas_salida/crud');
        $this->load->view('template/footer');        
    }

    public function guardarSalida()
    {
        $user = $this->session->userdata('session');
        
        $data['idubicacionorigen'] = $user[0]->Id_Ubicacion;
        $data['iddepartamento'] = $this->input->post('departamentoSalida');
        $data['idtoner'] = $this->input->post('tonerSalida');
        $data['cantidad'] = $this->input->post('cantidadSalida');
        $data['idubicacionsalida'] = $this->input->post('ubicacionSalida');

        $id_salida = $this->msalida->guardarSalida($data);

        if($id_salida > 0)
        {             
            redirect('csalida');         
        }     
    }
}