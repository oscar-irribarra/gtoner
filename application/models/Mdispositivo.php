<?php

class Mdispositivo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //trae todos los dispositivos y los envia a Cimpresora/index
    public function getDispositivos()
    {
        $consulta = $this->db->query('SELECT * FROM dispositivo');
        return $consulta->result();
    }
    //trae un dispositivo en especifico $id y lo envia a Cimpresora/detalles
    public function getDispositivo($id)
    {
        $sql = 'SELECT * FROM dispositivo d WHERE d.iddispositivo = ?';
        $consulta = $this->db->query($sql, array($id));
        return $consulta->result();
    }
    //trae los toner asignados a un dispositivo en especifico $id y lo envia a Cimpresora/detalles
    public function getDispToner($id)
    {
        $sql = 'SELECT * FROM dispton dt JOIN toner t on dt.id_toner = t.idtoner
                WHERE dt.id_dispositivo = ?';
        $consulta = $this->db->query($sql, array($id));
        return $consulta->result();
    }
    //CRUD DISPOSITIVOS
    public function guardarDispositivo($datos)
    {
        $data = array('marca' => $datos['marca'], 'modelo' => $datos['modelo']);
        $this->db->insert('dispositivo', $data);
        return $this->db->insert_id();
    }

    public function actualizarDispositivo($datos)
    {
        $data = array('marca' => $datos['marca'], 'modelo' => $datos['modelo']);
        $this->db->where('IdDispositivo', $datos['id']);
        return $this->db->update('dispositivo', $data);
    }

    //ASIGNACIONES DISPOSITIVOS / TONER
    public function guardarDispton($datos)
    {
        $data = array('id_dispositivo' => $datos['idDispositivo'], 'id_toner' => $datos['idToner']);
        $this->db->insert('dispton', $data);
        return $this->db->insert_id();
    }

    public function eliminarDispton($datos)
    {
        $this->db->where('iddispton', $datos['idDispTon']);
        $this->db->delete('dispton');
    }

    public function getAsignacionDispTon($datos)
    {
        $sql_cat = 'SELECT t.id_categoria FROM toner t WHERE t.idtoner = ?';
        $consulta_cat = $this->db->query($sql_cat, array($datos['idToner']));
        $row = $consulta_cat->row();

        $sql = '   SELECT * FROM dispositivo d
                    JOIN dispton dt ON d.IdDispositivo = dt.Id_Dispositivo
                    JOIN toner t ON dt.Id_Toner = t.IdToner
                    WHERE d.IdDispositivo = ? AND t.Id_Categoria = ?';

        $consulta = $this->db->query($sql, array($datos['idDispositivo'], $row->id_categoria));
        return $consulta->result();
    }

}
