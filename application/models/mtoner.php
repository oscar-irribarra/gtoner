<?php

class Mtoner extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getToners()
    {
        $consulta = $this->db->query('SELECT    t.idtoner AS "idtoner", t.marca AS "marca", t.modelo AS "modelo",
                                                c.nombre AS "categoria", c.idcategoria AS "idcategoria" ,
                                                i.stock AS "stock", u.nombre AS "ubicacion"
                                     FROM toner t
                                     JOIN inventario i ON t.IdToner = i.Id_Toner
                                     JOIN categoria c ON t.id_categoria = c.idcategoria
                                     JOIN ubicacion u ON i.id_ubicacion = u.idubicacion');
        return $consulta->result();
    }

    public function guardarToner($datos)
    {
        $data = array('marca' => $datos['marca'], 'modelo' => $datos['modelo'], 'id_categoria' => $datos['idcategoria']);
        $this->db->insert('toner', $data);

        return $this->crearInventario($this->db->insert_id());
    }

    public function crearInventario($id)
    {
        $data = array('Id_Toner' => $id, 'Stock' => 0, 'id_ubicacion' => 1);

        return $this->db->insert('inventario', $data);
    }

    public function actualizarToner($datos)
    {
        $data = array('marca' => $datos['marca'], 'modelo' => $datos['modelo']);

        $this->db->where('IdToner', $datos['id']);
        return $this->db->update('toner', $data);
    }

    //-------------
    public function getToners_dep($id)
    {
        $sql = 'SELECT t.idtoner AS "idtoner", t.marca AS "marcatoner", t.modelo AS "modelotoner",
                 c.nombre AS "categoriatoner", c.idcategoria AS "idcategoriatoner" ,i.stock AS "stocktoner", u.nombre AS "ubicaciontoner",
                 u.idubicacion AS "idubicaciontoner"
                 FROM toner t
                 JOIN inventario i ON t.IdToner = i.Id_Toner
                 JOIN categoria c ON t.id_categoria = c.idcategoria
                 JOIN ubicacion u ON i.id_ubicacion = u.idubicacion WHERE u.idubicacion = ?';

        $consulta = $this->db->query($sql, array($id));
        return $consulta->result();
    }

    public function getToner($id)
    {
        $sql = 'SELECT * FROM toner t WHERE t.id_categoria = ?';
        $consulta = $this->db->query($sql, array($id));
        return $consulta->result();
    }

    public function getTonDep($id)
    {
        $sql1 = 'SELECT * FROM departamento d WHERE d.IdDepartamento = ?';

        $esbodega = $this->db->query($sql1, array($id));
        $row = $esbodega->row_array();

        if ($row['Nombre'] == 'Bodega') {

            $sqlw = 'SELECT t.idtoner AS "tidtoner", t.marca AS "tmarca", t.modelo AS "tmodelo" FROM toner t
                JOIN impton it ON t.idtoner = it.id_toner
                JOIN impresora i ON it.id_impresora = i.idimpresora
                JOIN datosimp di ON i.idimpresora = di.id_impresora
                JOIN impdep id ON di.iddatosimp = id.id_datosimp
                JOIN departamento d ON id.Id_Departamento = d.IdDepartamento
                JOIN ubicacion u ON d.Id_Ubicacion = u.IdUbicacion
                WHERE u.IdUbicacion = ?
                GROUP By t.idtoner';

            $id = $row['Id_Ubicacion'];
            $consulta = $this->db->query($sqlw, array($id));
        } else {
            $sql = 'SELECT t.idtoner AS "tidtoner", t.marca AS "tmarca", t.modelo AS "tmodelo" FROM toner t
                JOIN impton it ON t.idtoner = it.id_toner
                JOIN impresora i ON it.id_impresora = i.idimpresora
                JOIN datosimp di ON i.idimpresora = di.id_impresora
                JOIN impdep id ON di.iddatosimp = id.id_datosimp
                WHERE id.id_departamento = ?
                GROUP By t.idtoner';

            $consulta = $this->db->query($sql, array($id));
        }

        return $consulta->result();
    }

}
