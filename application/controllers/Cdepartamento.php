<?php

class Cdepartamento extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdepartamento');
        $this->load->model('mimpresora');
    }

    public function index()
    {
        $data = array();
        $data['listadep'] = $this->mdepartamento->getDepartamentos();

        $this->load->view('template/header');
        $this->load->view('vistas_departamento/index',$data);
        $this->load->view('template/footer');
    }

    public function getDepartamentos()
    {
      $datos = $this->mdepartamento->getDepartamentos();
      echo json_encode($datos);
    }    

    public function crud($id = 0)
    {   
        $this->load->view('template/header');
        
        if($id > 0)
        {
            $data['mensaje'] = '<div class="alert alert-danger" role="alert">Edicion</div>';
            $this->load->view('vistas_departamento/crud',$data);
        }
        else
        {
            $data['mensaje'] = '<div class="alert alert-success" role="alert">Nuevo</div>';           
            $this->load->view('vistas_departamento/crud',$data);  
        }
        $this->load->view('template/footer');
    }
    
    public function detalles($id = 0)
    {
        $this->load->view('template/header');    
        if($id > 0)
        {
            $data['datos_dep'] = $this->mdepartamento->getDepartamento($id);
            $data['imp_dep'] = $this->mdepartamento->getImpDep($id);
            
            $this->load->view('vistas_departamento/detalles',$data);
        }else
        {
            redirect('cdepartamento/index');
        }
        $this->load->view('template/footer');
    }

    public function guardar_departamento()
    {
       $datos['nombre'] = $this->input->post('txtNombre');
       $datos['lugar'] =  $this->input->post('txtLugar');

       $id_dep = $this->mdepartamento->guardarDepartamento($datos);
       if($id_dep>0)
       {
            redirect('cdepartamento/index');
       }else
       {
            redirect('cdepartamento/crud');
       }
    }
   
    public function impresoras_asignadas()
    {
        $id = $this->input->post('iddep');
        $datos = $this->mdepartamento->getImpDep($id);
        echo json_encode($datos);
    }
}