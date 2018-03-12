<?php

class Mlogin extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($datos)
    {
        $sql = 'SELECT * FROM usuario u WHERE u.usuario = ? AND u.password = ? ';
        $consulta = $this->db->query($sql, array($datos['usuario'], md5($datos['contraseña'])));
        return $consulta->result();
    }
}
