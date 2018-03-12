<?php

class Msalida extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getSalidas()
    {
        $consulta = $this->db->query('SELECT s.idsalida AS "sidsalida", s.fecha AS "sfecha" , d.nombre AS "dnombre" ,
                                        u.nombre AS "dlugar", t.modelo AS "tmodelo", s.cantidad AS "scantidad",
                                        (select ub.Nombre from ubicacion ub where ub.IdUbicacion = s.Id_UbicacionOrigen) AS "dlugarorigen" FROM salida s
                                        JOIN departamento d ON s.Id_Departamento = d.iddepartamento
                                        JOIN ubicacion u ON d.id_ubicacion = u.idubicacion
                                        JOIN toner t ON s.id_toner = t.idtoner');
        return $consulta->result();
    }

    public function getSalidas_dep($id)
    {
        $sql = 'SELECT s.idsalida AS "sidsalida", s.fecha AS "sfecha" , d.nombre AS "dnombre" ,
                u.nombre AS "dlugar", t.modelo AS "tmodelo", s.cantidad AS "scantidad",
                (select ub.Nombre from ubicacion ub where ub.IdUbicacion = s.Id_UbicacionOrigen) AS "dlugarorigen" 											FROM salida s
                JOIN departamento d ON s.Id_Departamento = d.iddepartamento
                JOIN ubicacion u ON d.id_ubicacion = u.idubicacion
                JOIN toner t ON s.id_toner = t.idtoner
                WHERE Id_UbicacionOrigen = ?';

        $consulta = $this->db->query($sql, array($id));
        return $consulta->result();
    }
    //editado
    public function guardarSalida($datos)
    {
        $fecha = date('Y-m-d');
        $data = array('id_departamento' => $datos['iddepartamento'],
            'id_toner' => $datos['idtoner'],
            'cantidad' => $datos['cantidad'],
            'fecha' => $fecha,
            'id_ubicacionorigen' => $datos['idubicacionorigen']);

        $this->db->insert('salida', $data);

        $sql1 = 'SELECT * FROM departamento d WHERE d.iddepartamento = ?';
        $consulta1 = $this->db->query($sql1, array($datos['iddepartamento']));
        $row1 = $consulta1->row();

        if ($row1->Nombre == 'Bodega') {

            $sql = 'SELECT * FROM inventario i WHERE i.id_toner = ? AND i.id_ubicacion = ?';
            $consulta = $this->db->query($sql, array($datos['idtoner'], $datos['idubicacionsalida']));

            $row = $consulta->row();
            if ($row == null) {
                $this->crearInventario($datos);
                $this->actualizarStock($datos);
            } else {
                $this->actualizarStock2($datos);
                $this->actualizarStock($datos);
            }
        } else {
            $this->actualizarStock($datos);

        }
    }

    public function crearInventario($data)
    {
        $data = array('Id_Toner' => $data['idtoner'], 'Stock' => $data['cantidad'], 'id_ubicacion' => $data['idubicacionsalida']);

        $this->db->insert('inventario', $data);
    }

    public function actualizarStock($datos)
    {
        $sql = 'SELECT i.stock FROM inventario i WHERE i.id_toner = ? AND i.id_ubicacion = ?';
        $consulta = $this->db->query($sql, array($datos['idtoner'], $datos['idubicacionorigen']));
        $row = $consulta->row();

        $data = array(
            'stock' => ($row->stock - $datos['cantidad']),
        );

        $this->db->where('id_toner', $datos['idtoner']);
        $this->db->where('id_ubicacion', $datos['idubicacionorigen']);
        return $this->db->update('inventario', $data);
    }

    public function actualizarStock2($datos)
    {
        $sql = 'SELECT i.stock FROM inventario i WHERE i.id_toner = ? AND i.id_ubicacion = ?';
        $consulta = $this->db->query($sql, array($datos['idtoner'], $datos['idubicacionsalida']));
        $row = $consulta->row();

        $data = array(
            'stock' => ($row->stock + $datos['cantidad']),
        );

        $this->db->where('id_toner', $datos['idtoner']);
        $this->db->where('id_ubicacion', $datos['idubicacionsalida']);
        return $this->db->update('inventario', $data);
    }

}
