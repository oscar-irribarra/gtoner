<?php

class Mcategoria extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCategorias()
    {
        $consulta = $this->db->query('SELECT * FROM categoria');
        return $consulta->result();
    }
}
