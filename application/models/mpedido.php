<?php

class mpedido extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('msalida');
    }

    public function getPedidos()
    {
        $consulta = $this->db->query('SELECT
                                      p.idpedido AS "idpedido", p.fecha AS "fecha", p.cantidad AS "cantidad",
                                      p.estado AS "estado", t.modelo AS "toner", d.nombre AS "departamento",
                                      u.nombre AS "ubicacion" FROM pedido p
                                      JOIN impdep id ON p.id_impdep = id.idimpdep
                                      JOIN departamento d ON id.id_departamento = d.iddepartamento
                                      JOIN ubicacion u ON d.id_ubicacion = u.idubicacion
                                      JOIN toner t ON p.id_toner = t.idtoner
                                      GROUP by p.idpedido');
        return $consulta->result();
    }
    //Entregar pedido (consulta stock y cambia estado del pedido 0 -> 1 entregado)
    public function guardarSalidaPedido($datos)
    {
        $sql = 'SELECT p.cantidad AS "cantidad", p.id_toner AS "toner",
                        id.id_departamento AS "departamento" FROM pedido p
                        JOIN impdep id ON p.id_impdep = id.idimpdep WHERE p.idpedido = ? GROUP by p.idpedido';

        $consulta = $this->db->query($sql, array($datos['idPedido']));
        $row = $consulta->row();

        $datos['iddepartamento'] = $row->departamento;
        $datos['idtoner'] = $row->toner;
        $datos['cantidad'] = $row->cantidad;

        //consultar stock del pedido (validacion)
        $sqlStock = 'SELECT i.stock From inventario i WHERE i.id_toner = ? AND i.id_ubicacion = ?';
        $consultaStock = $this->db->query($sqlStock, array($datos['idtoner'], $datos['idubicacionorigen']));
        $row2 = $consultaStock->row();

        if ($row2->stock > 0) {
            $this->msalida->guardarSalida($datos);
            $this->entregarPedido($datos);
            return 1;
        } else {
            //devuelve stock insuficiente
            return 0;
        }
    }

    public function entregarPedido($datos)
    {
        $data = array(
            'estado' => 1,
        );

        $this->db->where('idpedido', $datos['idPedido']);
        $this->db->update('pedido', $data);
    }
    //------------fin
    public function guardarPedido($datos)
    {
        $sql = '   SELECT id.idimpdep, t.idtoner FROM impdep id
                    JOIN impresora i ON id.id_impresora = i.idimpresora
                    JOIN dispton dt ON i.id_dispositivo = dt.id_dispositivo
                    JOIN toner t ON dt.id_toner = t.idtoner
                    WHERE i.serie = ? AND t.id_categoria = ?
                    Group by id.IdImpDep';

        $consulta = $this->db->query($sql, array($datos['Serie'], $datos['Ctoner']));
        $row = $consulta->row();

        if ($row != null) {
            $fecha = date('Y-m-d');
            $data = array('Id_ImpDep' => $row->idimpdep, 'Id_Toner' => $row->idtoner, 'cantidad' => 1, 'fecha' => $fecha, 'estado' => 0);
            return $this->db->insert('pedido', $data);
        } else {
            return 0;
        }
    }
//revisado hasta aqui
    public function getPedidos_dep($id)
    {
        $sql = 'SELECT p.idpedido AS "idpedido", p.fecha AS "fechapedido", p.cantidad AS "cantidadpedido",
                    p.estado AS "estadopedido", t.modelo AS "modelotoner", d.nombre AS "nombredep",
                    u.nombre AS "ubicaciondep" FROM pedido p
                    JOIN impdep id ON p.id_impdep = id.idimpdep
                    JOIN datosimp di ON id.id_datosimp = di.iddatosimp
                    JOIN departamento d ON id.id_departamento = d.iddepartamento
                    JOIN ubicacion u ON d.id_ubicacion = u.idubicacion
                    JOIN impton it ON it.id_impresora = di.id_impresora
                    JOIN toner t ON it.id_toner = t.idtoner WHERE u.idubicacion = ? GROUP by p.idpedido';

        $consulta = $this->db->query($sql, array($id));
        return $consulta->result();
    }

}
