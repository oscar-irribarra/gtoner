<?php

class Cusuario extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('musuario');
    }

    public function index()
    {
        $user = $this->session->userdata('session');
		if($user == null){
		redirect('/cinicio/login', 'refresh');
		}else{
            $this->load->view('template/headerlogeado');            
		($user[0]->Rol == 1)? $this->load->view('vistas_usuario/index'): redirect('/cerror/e404','refresh');
		$this->load->view('template/footer');
        }
    }

    public function getUsuarios()
    {
       $data = $this->musuario->getUsuarios();
       echo json_encode($data);
    }

    public function guardarUsuario()
    {
       $datos['nombre'] = $this->input->post('nombreUsuario');
       $datos['usuario'] = $this->input->post('usuarioUsuario');
       $datos['pass'] = $this->input->post('passwordUsuario');
       $datos['rol'] = 0;
       $datos['ubicacion'] = $this->input->post('ubicacionUsuario');
              
       $id = $this->musuario->guardarUsuario($datos);

        if($id > 0)
        {            
            echo 'ok';
        }
    }

    public function actualizarUsuario()
    {
        $datos['idusuario'] = $this->input->post('idUsuario');
        $datos['nombre'] = $this->input->post('nombreUsuario');
        $datos['usuario'] = $this->input->post('usuarioUsuario');
        $datos['pass'] = $this->input->post('passwordUsuario');
        $datos['ubicacion'] = $this->input->post('ubicacionUsuario');
       
       $ok = $this->musuario->actualizarUsuario($datos);
        if($ok > 0)
        {
            echo 'ok';
        }else{
            echo 'error';
        }  
    }

}