<?php

class Mimpresora extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //Trae las impresoras vinculadas/dependientes de cierto dispositivo $id
    public function getImpresoras($id)
    {
        $sql = 'SELECT i.idimpresora, i.serie, i.nfactura, i.fechacompra, i.estado
                FROM impresora i  WHERE i.id_dispositivo = ?';
        $consulta = $this->db->query($sql, array($id));
        return $consulta->result();
    }

    //Crud Impresoras
    public function guardarImpresora($datos)
    {
        $data = array('id_dispositivo' => $datos['iddispositivo'], 'serie' => $datos['serie'],
            'nfactura' => $datos['nfactura'], 'fechacompra' => $datos['fcompra']);
        $this->db->insert('impresora', $data);
        return $this->db->insert_id();
    }

    public function actualizarImpresora($datos)
    {
        $data = array('serie' => $datos['serie'], 'nfactura' => $datos['nfactura'],
            'fechacompra' => $datos['fcompra']);
        $this->db->where('IdImpresora', $datos['idimpresora']);
        return $this->db->update('impresora', $data);
    }

    public function guardarImpDep($datos)
    {
        $data = array('id_impresora' => $datos['idImpresora'], 'id_departamento' => $datos['idDepartamento']);
        $this->db->insert('impdep', $data);

        $data2 = array(
            'estado' => 1,
        );

        $this->db->where('idimpresora', $datos['idImpresora']);
        $this->db->update('impresora', $data2);

        return $this->db->insert_id();
    }

    public function getAsignacionImpDep($datos)
    {
        $sql = 'SELECT * FROM impresora i WHERE i.idimpresora = ? AND i.estado = ?';
        $consulta = $this->db->query($sql, array($datos['idImpresora'], 1));

        return $consulta->result();
    }

    public function getConsumoToner($serie)
    {
        $sql = 'SELECT p.id_toner as "id_toner" from pedido p
                JOIN impdep id ON p.id_impdep = id.idimpdep
                JOIN impresora i ON id.id_impresora = i.idimpresora
                WHERE i.serie = ? AND p.Estado = 1';

        $consulta = $this->db->query($sql, array($serie));
        return $consulta->result_array();
    }

}
