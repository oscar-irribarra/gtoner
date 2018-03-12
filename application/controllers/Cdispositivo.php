<?php

class Cdispositivo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdispositivo');
    }    

    public function getDispositivos()
    {
      $datos = $this->mdispositivo->getDispositivos();
      echo json_encode($datos);
    }
    //trae los toner asignados a x dispositivo
    public function getDispToner()
    {
        $id = $this->input->post('IdDipositivo');
        $datos = $this->mdispositivo->getDispToner($id);
        echo json_encode($datos);
    }

    public function guardarDispositivo()
	{
	    $datos['marca'] = $this->input->post('marcaDispositivo');
	    $datos['modelo'] = $this->input->post('modeloDispositivo');	    
        $resultado = $this->mdispositivo->guardarDispositivo($datos);
        if($resultado > 0)
        {
            echo 'Dispositivo Guardado';
        }else{
            echo 'Error, Intente Nuevamente';
        }   
    }

    public function actualizarDispositivo()
	{
        $datos['id'] = $this->input->post('idDispositivo');        
	    $datos['marca'] = $this->input->post('marcaDispositivo');
	    $datos['modelo'] = $this->input->post('modeloDispositivo');	    
        $resultado = $this->mdispositivo->actualizarDispositivo($datos);
        if($resultado > 0)
        {
            echo 'Dispositivo Actualizado';
        }else{
            echo 'Error, Intente Nuevamente';
        }   
    }

// ASIGNACIONES TONER / DISPOSITIVOS
    public function guardarDispTon()
    {
        $datos['idToner'] = $this->input->post('idToner');
        $datos['idDispositivo'] = $this->input->post('idDispositivo');
        $respuesta = $this->mdispositivo->getAsignacionDispTon($datos);

        if ($respuesta == null or $respuesta <= 1) {
            $this->mdispositivo->guardarDispton($datos);
            echo "Datos Guardados";
        } else {
            echo "La impresora ya tiene un toner/tambor/tinta Asignado";
        }
    }

    public function eliminarDispTon()
    {
        $datos['idDispTon'] = $this->input->post('idImpTon');
        $this->mdispositivo->eliminarDispton($datos);
        echo "Datos Guardados";
    }

    public function getToner()
    {
        $id = $this->input->post('idDispositivo');
        $datos = $this->mdispositivo->getToner($id);
        echo json_encode($datos);
    }
}