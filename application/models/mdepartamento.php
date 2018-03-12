<?php

class Mdepartamento extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function guardarDepartamento($datos)
    {
        $data = array('nombre' => $datos['nombre'], 'id_ubicacion' => $datos['lugar']);
        $this->db->insert('departamento', $data);
        return $this->db->insert_id();

    }

    public function crearBodega($datos)
    {
        $data = array('nombre' => $datos['nombre'], 'id_ubicacion' => $datos['lugar']);
        $this->db->insert('departamento', $data);
        return $this->db->insert_id();
    }

    public function actualizarDepartamento($datos)
    {
        $data = array('nombre' => $datos['nombre'],
            'id_ubicacion' => $datos['lugar']);

        $this->db->where('IdDepartamento', $datos['iddepartamento']);
        return $this->db->update('departamento', $data);
    }

    public function getDepartamentosUbicacion($data)
    {
        $sql = 'SELECT d.iddepartamento as "IdDepartamento", d.nombre as "Nombre"
                                      FROM departamento d JOIN ubicacion u ON d.id_ubicacion = u.idubicacion WHERE u.idubicacion = ?';
        $consulta = $this->db->query($sql, array($data['idUbicacion']));
        return $consulta->result();
    }

    public function getDepartamento($id)
    {
        $sql = 'SELECT  d.iddepartamento as "IdDepartamento", d.nombre as "Nombre", u.nombre as "Lugar", u.idubicacion as "IdUbicacion"
                FROM departamento d JOIN ubicacion u ON d.id_ubicacion = u.idubicacion
                WHERE d.iddepartamento = ?';

        $consulta = $this->db->query($sql, array($id));
        return $consulta->result();
    }

    public function getImpDep($id)
    {
        $sql = 'SELECT id.IdImpDep AS "idimpdep", d.marca AS "marca", d.modelo AS "modelo", i.serie AS "serie" FROM impdep id JOIN impresora i ON id.id_impresora = i.idimpresora
        JOIN dispositivo d ON i.id_dispositivo = d.iddispositivo  WHERE id.Id_Departamento = ?';

        $consulta = $this->db->query($sql, array($id));
        return $consulta->result();
    }

}
