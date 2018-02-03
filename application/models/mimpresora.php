<?php

class Mimpresora extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function guardarImpresora($datos)
    {
        $data = array( 'marca' => $datos['marca'], 'modelo' => $datos['modelo'] );
        $this->db->insert('impresora',$data);
       return  $this->db->insert_id(); 
    }

    public function getImpresoras()
    {
       $consulta = $this->db->query('SELECT * FROM impresora');
       return $consulta->result();
    }    

    public function getImpresora($id)
    {
       $sql = 'SELECT * FROM impresora i WHERE i.idimpresora = ?';
       $consulta = $this->db->query($sql, array($id));
       return $consulta->result();
    }   

    public function getImpresoraasignada($datos)
    {
       $sql = 'SELECT * FROM datosimp di WHERE di.iddatosimp = ? AND di.estado = ?';
       $consulta = $this->db->query($sql, array($datos['impresora'], 1));
       
       return $consulta->result();
    }    

    public function guardarImpton($datos)
    {
        $data = array( 'id_impresora' => $datos['idimpresora'], 'id_toner' => $datos['idtoner'] );
        $this->db->insert('impton',$data);
       return  $this->db->insert_id(); 
    }

    public function getImpton($id)
    {
        $sql = 'SELECT * FROM impton it 
        JOIN toner t on it.id_toner = t.idtoner 
        WHERE it.id_impresora = ?';

        $consulta = $this->db->query($sql, array($id));
        return $consulta->result();
    }

    public function getTonerasignado($datos)
    {
        $sql = 'SELECT * FROM impton it WHERE it.id_impresora = ? AND it.id_toner = ?';
        $consulta = $this->db->query($sql, array($datos['idimpresora'],$datos['idtoner']));
        return $consulta->result();
    }

    public function guardarDatosimpresora($datos)
    {
        $data = array( 'id_impresora' => $datos['idimpresora'], 'serie' => $datos['serie'], 
                       'nfactura' => $datos['nfactura'], 'fechacompra' => $datos['fcompra'] );
        $this->db->insert('datosimp',$data);
      
        return $this->db->insert_id();
    }

    public function getDatosimpresora($id)
    {
        $sql = 'SELECT di.iddatosimp, di.serie, di.nfactura, di.fechacompra, di.estado
                FROM datosimp di 
                WHERE di.id_impresora = ?';
        $consulta = $this->db->query($sql, array($id));
        return $consulta->result();
    }

    public function guardarImpDep($datos)
    {
        $data = array( 'id_datosimp' => $datos['impresora'], 'id_departamento' => $datos['departamento']);
        $this->db->insert('impdep',$data);   
        
        $data2 = array(
            'estado' => 1
        );
    
        $this->db->where('iddatosimp', $datos['impresora']);
        $this->db->update('datosimp', $data2);
        
       return $this->db->insert_id();
    }
   
}