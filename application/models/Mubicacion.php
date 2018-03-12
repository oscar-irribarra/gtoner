<?php

class Mubicacion extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('mdepartamento');

    }
    public function getUbicaciones()
    {
        $consulta = $this->db->query('SELECT * FROM ubicacion');
        return $consulta->result();
    }

    public function getUbicacion($id)
    {
        $sql = 'SELECT * FROM ubicacion u WHERE u.idubicacion = ?';
        $consulta = $this->db->query($sql, array($id));
        return $consulta->result();
    }

    public function guardarUbicacion($datos)
    {
        $data = array('nombre' => $datos['nombre']);
        $this->db->insert('ubicacion', $data);

        $datadep = array('nombre' => 'Bodega', 'lugar' => $this->db->insert_id());
        return $this->mdepartamento->guardarDepartamento($datadep);
    }

    public function actualizarUbicacion($datos)
    {
        $data = array('nombre' => $datos['nombre']);

        $this->db->where('IdUbicacion', $datos['idubicacion']);
        return $this->db->update('ubicacion', $data);
    }
}
