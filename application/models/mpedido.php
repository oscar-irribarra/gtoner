<?php

class Mpedido extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('msalida');
    }

    public function getPedidos()
    {
        $consulta = $this->db->query('SELECT 
                                      p.idpedido AS "idpedido", p.fecha AS "fechapedido", p.cantidad AS "cantidadpedido",
                                      p.estado AS "estadopedido", t.modelo AS "modelotoner", d.nombre AS "nombredep", 
                                      d.lugar AS "lugardep" FROM pedido p
                                      JOIN impdep id ON p.id_impdep = id.idimpdep  
                                      JOIN datosimp di ON id.id_datosimp = di.iddatosimp
                                      JOIN departamento d ON id.id_departamento = d.iddepartamento
                                      JOIN impton it ON it.id_impresora = di.id_impresora
                                      JOIN toner t ON it.id_toner = t.idtoner 
                                      GROUP by p.idpedido');
        return $consulta->result();
    }

    public function guardarPedido($datos)
    {
        $sql = 'SELECT id.idimpdep FROM impdep id JOIN datosimp di ON id.id_datosimp = di.iddatosimp WHERE di.serie = ? AND di.estado = ?';
        $consulta = $this->db->query($sql, array($datos['serie'], 1));
        $row = $consulta->row();

        $fecha = date('Y-m-d');    
        $data = array('Id_ImpDep' => $row->idimpdep, 'cantidad' => 1, 'fecha' => $fecha, 'estado' => 1);
            $this->db->insert('pedido',$data);  
    }

    public function guardarSalidaPedido($id)
    {
        $sql = 'SELECT p.cantidad AS "cantidadpedido", t.idtoner AS "ttoner", 
                        d.iddepartamento AS "dep" FROM pedido p
                        JOIN impdep id ON p.id_impdep = id.idimpdep  
                        JOIN impresora i ON id.id_impresora = i.idimpresora
                        JOIN departamento d ON id.id_departamento = d.iddepartamento
                        JOIN impton it ON it.id_impresora = i.idimpresora
                        JOIN toner t ON it.id_toner = t.idtoner WHERE p.idpedido = ? GROUP by p.idpedido';

        $consulta = $this->db->query($sql, array($id));
        $row = $consulta->row();

        $datos['iddepartamento'] = $row->dep;
        $datos['idtoner'] = $row->ttoner;
        $datos['cantidad'] = $row->cantidadpedido;

        $this->msalida->guardarSalida($datos);

        return $this->entregarPedido($id);
    }

    public function entregarPedido($id)
    {
        $data = array(
            'estado' => 0
        );
    
    $this->db->where('idpedido', $id);
    return $this->db->update('pedido', $data);
    }
}
