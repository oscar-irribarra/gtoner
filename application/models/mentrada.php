<?php

class Mentrada extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getEntradas()
    {
        $consulta = $this->db->query('SELECT * FROM entrada e JOIN toner t ON e.id_toner = t.idtoner ORDER BY e.identrada ASC' );
        return $consulta->result();
    }

    public function guardarEntrada($datos)
    {
        $fecha = date('Y-m-d');    
        $data = array('id_toner' => $datos['idtoner'], 'cantidad' => $datos['cantidad'], 'fecha' => $fecha);
            $this->db->insert('entrada',$data);  

      return $this->actualizarStock($datos);
    }

    public function actualizarStock($datos)
    {
        $sql = 'SELECT i.stock FROM inventario i WHERE i.id_toner = ?';
        $consulta = $this->db->query($sql, array($datos['idtoner']));
        $row = $consulta->row();

        $data = array(
            'stock' => ($row->stock + $datos['cantidad'])
        );
    
    $this->db->where('id_toner', $datos['idtoner']);
    return $this->db->update('inventario', $data);
    }
}