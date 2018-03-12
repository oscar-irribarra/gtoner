<?php

class Cdepartamento extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdepartamento');
    }

    public function getDepartamentos()
    {
        $datos = $this->mdepartamento->getDepartamentos();
        echo json_encode($datos);
    }

    public function getDepartamento()
    {
        $data['idUbicacion'] = $this->input->post('idUbicacion');
        $datos = $this->mdepartamento->getDepartamentosUbicacion($data);
        echo json_encode($datos);
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
                    redirect('cdepartamento');
                }

                $data['detalle_departamento'] = $this->mdepartamento->getDepartamento($id);

                if ($data['detalle_departamento'] == null) {
                    redirect('cdepartamento');
                }

                $this->load->view('vistas_departamento/detalles', $data);

            } else {
                redirect('/cerror/e404', 'refresh');
            }
            $this->load->view('template/footer');
        }
    }

    public function getImpDep()
    {
        $id = $this->input->post('idDepartamento');
        $datos = $this->mdepartamento->getImpDep($id);
        echo json_encode($datos);
    }

    public function guardarDepartamento()
    {
        $datos['nombre'] = $this->input->post('nombreDepartamento');
        $datos['lugar'] = $this->input->post('lugarDepartamento');

        $respuesta = $this->mdepartamento->guardarDepartamento($datos);
        if ($respuesta > 0) {
            echo 'Departamento Guardado';
        } else {
            echo 'Error, Intente Nuevamente';
        }
    }

    public function actualizarDepartamento()
    {
        $datos['iddepartamento'] = $this->input->post('idDepartamento');
        $datos['nombre'] = $this->input->post('nombreDepartamento');
        $datos['lugar'] = $this->input->post('lugarDepartamento');

        $respuesta = $this->mdepartamento->actualizarDepartamento($datos);
        if ($respuesta > 0) {
            echo 'Departamento Actualizado';
        } else {
            echo 'Error, Intente Nuevamente';
        }
    }
}
