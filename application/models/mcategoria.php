<?php

class Mcategoria extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
   
    public function getCategorias()
    {
        $consulta = $this->db->query('SELECT * FROM categoria');
        return $consulta->result();
    }
}