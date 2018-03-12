<?php

class Cimpresora extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mimpresora');
        $this->load->model('mdepartamento');
        $this->load->model('mdispositivo');
    }

    public function index()
    {
        $user = $this->session->userdata('session');
        if ($user == null) {
            redirect('/cinicio/login', 'refresh');
        } else {
            $this->load->view('template/headerlogeado');
            ($user[0]->Rol == 1) ? $this->load->view('vistas_impresora/index') : redirect('/cerror/e404', 'refresh');
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
                    redirect('cimpresora', 'refresh');
                }

                $data['detalle_dispositivo'] = $this->mdispositivo->getDispositivo($id);

                if ($data['detalle_dispositivo'] == null) {
                    redirect('cimpresora', 'refresh');
                }

                $this->load->view('vistas_impresora/detalles', $data);
            } else {
                redirect('/cerror/e404', 'refresh');
            }
            $this->load->view('template/footer');
        }
    }
    
    public function getImpresoras()
    {
        $id = $this->input->post('idDispositivo');
        $datos = $this->mimpresora->getImpresoras($id);
        echo json_encode($datos);
    }

    public function guardarImpresora()
    {
        $datos['iddispositivo'] = $this->input->post('idDispositivo');
        $datos['serie'] = $this->input->post('serieImpresora');
        $datos['nfactura'] = $this->input->post('nfacturaImpresora');
        $datos['fcompra'] = $this->input->post('fechaImpresora');

        $respuesta = $this->mimpresora->guardarImpresora($datos);
        if ($respuesta > 0) {
            echo 'Impresora Guardada';
        } else {
            echo 'Error, Intente Nuevamente';
        }
    }
    public function actualizarImpresora()
    {
        $datos['idimpresora'] = $this->input->post('idImpresora');
        $datos['iddispositivo'] = $this->input->post('idDispositivo');
        $datos['serie'] = $this->input->post('serieImpresora');
        $datos['nfactura'] = $this->input->post('nfacturaImpresora');
        $datos['fcompra'] = $this->input->post('fechaImpresora');

        $respuesta = $this->mimpresora->actualizarImpresora($datos);
        if ($respuesta > 0) {
            echo 'Impresora Guardada';
        } else {
            echo 'Error, Intente Nuevamente';
        }
    }

    public function guardarImpDep()
    {
        $datos['idDepartamento'] = $this->input->post('idDepartamento');
        $datos['idImpresora'] = $this->input->post('idImpresora');

        $respuesta = $this->mimpresora->getAsignacionImpDep($datos);

        if ($respuesta == null) {
            $this->mimpresora->guardarImpDep($datos);
            echo "Impresora Asignada";
        } else {
            echo "La serie introducida ya esta en uso";
        }
    }

    public function getConsumoToner()
    {
        $serie = $this->input->post('idserie');
        $datos = $this->mimpresora->getConsumoToner($serie);

        $data['toner'] = 0;
        $data['tambor'] = 0;
        $data['tinta'] = 0;
        $data['fusor'] = 0;

        foreach ($datos as $valor) {
            if ($valor['id_toner'] == 1) {
                $data['toner'] = $data['toner'] + 1;
            }
            if ($valor['id_toner'] == 2) {
                $data['tambor'] = $data['tambor'] + 1;
            }
            if ($valor['id_toner'] == 3) {
                $data['tinta'] = $data['tinta'] + 1;
            }
            if ($valor['id_toner'] == 4) {
                $data['fusor'] = $data['fusor'] + 1;
            }
        }
        echo json_encode($data);
    }

}
