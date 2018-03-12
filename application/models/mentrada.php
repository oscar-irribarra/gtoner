<?php

class Mentrada extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getEntradas()
    {
        $consulta = $this->db->query('SELECT * FROM entrada e JOIN toner t ON e.id_toner = t.idtoner ORDER BY e.identrada ASC');
        return $consulta->result();
    }

    public function getEntradasUbicacion($id)
    {
        $sql = 'SELECT s.IdSalida AS "idsalidas", s.Fecha AS "fechas", u.Nombre AS "destinos",
                d.Nombre AS "departamentos", t.Modelo AS "modelos", s.Cantidad AS "cantidads",
                (select ub.Nombre from ubicacion ub where ub.IdUbicacion = s.Id_UbicacionOrigen) AS "origens"
                FROM salida s
                JOIN departamento d ON s.Id_Departamento = d.iddepartamento
                JOIN ubicacion u ON d.id_ubicacion = u.idubicacion
                JOIN toner t ON s.id_toner = t.idtoner WHERE s.id_ubicacionorigen != ? AND d.id_ubicacion = ?';

        $consulta = $this->db->query($sql, array($id, $id));
        return $consulta->result();
    }

    public function guardarEntrada($datos)
    {
        $fecha = date('Y-m-d');
        $data = array('id_toner' => $datos['idtoner'], 'cantidad' => $datos['cantidad'], 'fecha' => $fecha);
        $this->db->insert('entrada', $data);

        return $this->actualizarStock($datos);
    }

    public function actualizarStock($datos)
    {
        $sql = 'SELECT i.stock FROM inventario i WHERE i.id_toner = ?';
        $consulta = $this->db->query($sql, array($datos['idtoner']));
        $row = $consulta->row();

        $data = array(
            'stock' => ($row->stock + $datos['cantidad']),
        );

        $this->db->where('id_toner', $datos['idtoner']);
        return $this->db->update('inventario', $data);
    }
}
