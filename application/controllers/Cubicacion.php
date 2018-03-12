<?php

class Cubicacion extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mubicacion');
    }
    public function getUbicaciones()
    {
        $datos = $this->mubicacion->getUbicaciones();
        echo json_encode($datos);
    }

    public function index()
    {
        $user = $this->session->userdata('session');
        if ($user == null) {
            redirect('/cinicio/login', 'refresh');
        } else {
            $this->load->view('template/headerlogeado');
            ($user[0]->Rol == 1) ? $this->load->view('vistas_ubicacion/index') : redirect('/cerror/e404', 'refresh');
            $this->load->view('template/footer');
        }
    }

    public function detalles($id = 0)
    {
        $user = $this->session->userdata('session');
        if ($user == null) {
            redirect('/cinicio/login', 'refresh');
        } else {

            $this->load->view('template/headerlogeado');
            if ($user[0]->Rol == 1) {
                if ($id <= 0) {
                    redirect('cubicacion');
                }

                $data['detalle_ubicacion'] = $this->mubicacion->getUbicacion($id);

                if ($data['detalle_ubicacion'] == null) {
                    redirect('cubicacion');
                }

                $this->load->view('vistas_ubicacion/detalles', $data);
            } else {
                redirect('/cerror/e404', 'refresh');
            }
            $this->load->view('template/footer');
        }
    }

    public function guardarUbicacion()
    {
        $data['nombre'] = $this->input->post('nombreUbicacion');
        $resultado = $this->mubicacion->guardarUbicacion($data);
        if ($resultado > 0) {
            echo 'Ubicacion Guardada';
        } else {
            echo 'Error, Intente Nuevamente';
        }
    }

    public function actualizarUbicacion()
    {
        $data['idubicacion'] = $this->input->post('idUbicacion');
        $data['nombre'] = $this->input->post('nombreUbicacion');

        $resultado = $this->mubicacion->actualizarUbicacion($data);
        if ($resultado > 0) {
            echo 'Ubicacion Actualizada';
        } else {
            echo 'Error, Intente Nuevamente';
        }
    }
}
