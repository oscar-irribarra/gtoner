<?php

class Msalida extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getSalidas()
    {
        $consulta = $this->db->query('SELECT s.idsalida AS "sidsalida", s.fecha AS "sfecha" , d.nombre AS "dnombre" , 
                                        d.lugar AS "dlugar", t.modelo AS "tmodelo", s.cantidad AS "scantidad" FROM salida s 
                                        JOIN departamento d ON s.Id_Departamento = d.iddepartamento
                                        JOIN toner t ON s.id_toner = t.idtoner');
        return $consulta->result();
    }

    public function guardarSalida($datos)
    {
        $fecha = date('Y-m-d');    
        $data = array('id_departamento' => $datos['iddepartamento'], 
                        'id_toner' => $datos['idtoner'], 
                        'cantidad' => $datos['cantidad'],
                        'fecha'=> $fecha);

        $this->db->insert('salida', $data);

        return $this->actualizarStock($datos);
    }

    public function actualizarStock($datos)
    {
        $sql = 'SELECT i.stock FROM inventario i WHERE i.id_toner = ?';
        $consulta = $this->db->query($sql, array($datos['idtoner']));
        $row = $consulta->row();

        $data = array(
            'stock' => ($row->stock - $datos['cantidad'])
        );
    
    $this->db->where('id_toner', $datos['idtoner']);
    return $this->db->update('inventario', $data);
    }

  


}