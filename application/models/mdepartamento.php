<?php

class Mdepartamento extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function guardarDepartamento($datos)
    {
        $data = array( 'nombre' => $datos['nombre'], 'lugar' => $datos['lugar']);
        $this->db->insert('departamento',$data);
       return $this->db->insert_id();
    }

    public function getDepartamentos()
    {
        $consulta = $this->db->query('SELECT * FROM departamento');
        return $consulta->result();
    } 

    public function getDepartamento($id)
    {
        $sql = 'SELECT * FROM departamento d WHERE d.iddepartamento = ?';
        $consulta = $this->db->query($sql, array($id));        
        return $consulta->result();
    } 

    public function getImpDep($id)
    {
        $sql = 'SELECT * FROM impdep id JOIN datosimp di ON id.id_datosimp = di.iddatosimp 
        JOIN impresora i ON di.id_impresora = i.idimpresora WHERE id.Id_Departamento = ?';

        $consulta = $this->db->query($sql, array($id));
        return $consulta->result();
    }
}