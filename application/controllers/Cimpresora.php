<?php

class Cimpresora extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mimpresora');
        $this->load->model('mdepartamento');        
    }

    public function index()
    {
        $data = array();
        $data['listaimp'] = $this->mimpresora->getImpresoras();

        $this->load->view('template/header');
        $this->load->view('vistas_impresora/index', $data);
        $this->load->view('template/footer');
    }

    public function detalles($id = 0)
    {
        $this->load->view('template/header');    
        if($id > 0)
        { 
            $data['datos_imp'] = $this->mimpresora->getImpresora($id);  
            $this->load->view('vistas_impresora/detalles',$data);
        }
        else
        {
            redirect('cimpresora/index');
        }
        $this->load->view('template/footer');
    }

    public function getImpresoras()
    {
      $datos = $this->mimpresora->getImpresoras();
      echo json_encode($datos);
    }

    public function crud()
    {
        $this->load->view('template/header');
        $this->load->view('vistas_impresora/crud');
        $this->load->view('template/footer');
    }

    public function guardar_impresora()
	{
	    $datos['marca'] = $this->input->post('txtMarca');
	    $datos['modelo'] = $this->input->post('txtModelo');	    
        $id_imp = $this->mimpresora->guardarImpresora($datos);
        if($id_imp > 0)
        {
            redirect('cimpresora/index');
        }else{
            redirect('cimpresora/crud');
        }   
    }

    public function gettonerasignado()
    {
        $id = $this->input->post('idtoner');
        $datos = $this->mimpresora->getImpton($id);
        echo json_encode($datos);
    }

    public function asignar_toner()
    {
        $datos['idtoner'] = $this->input->post('cbtoner');
        $datos['idimpresora'] = $this->input->post('txtIdImpresora');
        
        $validariomp_ton = $this->mimpresora->getTonerasignado($datos);

       if($validariomp_ton == null )
       {         
            $this->mimpresora->guardarImpton($datos);  
           echo "Datos Guardados";   
        }else
        { 
            echo "La impresora ya tiene asignado este toner";
        }
    }

    public function getdatosimpresoras()
    {
        $id = $this->input->post('idimpresora');
        $datos = $this->mimpresora->getDatosimpresora($id);
        echo json_encode($datos);
    }

    public function agregar_impresora()
	{
	    $datos['serie'] = $this->input->post('txtserie');
        $datos['nfactura'] = $this->input->post('txtnfactura');
	    $datos['fcompra'] = $this->input->post('txtfcompra');	    
        $datos['idimpresora'] = $this->input->post('txtIdImpresora'); 
        
        $id_imp = $this->mimpresora->guardarDatosimpresora($datos);
        if($id_imp > 0)
        {
            echo 'ok';
        }else{
            echo 'error';
        }   
    }

    public function asignar_impdep()
    {
        $datos['departamento'] = $this->input->post('cblugardestino');
        $datos['impresora'] = $this->input->post('txtidimpresora');

        $activa = $this->mimpresora->getImpresoraasignada($datos);
        
        if($activa == null)
        {
            $this->mimpresora->guardarImpDep($datos); 
            echo "Datos Guardados";   
        }else
        { 
            echo "La serie introducida ya esta en uso";
        }
    }
        
   
}
