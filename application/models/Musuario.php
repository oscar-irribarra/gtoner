<?php

class Musuario extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuarios()
    {
        $consulta = $this->db->query('SELECT    u.idusuario As "idusuario", u.nombre AS "nombre",
                                                u.usuario AS "usuario", u.password AS "password",
                                                u.rol AS "rol", u.id_ubicacion AS "idubicacion",
                                                ub.nombre AS "ubicacion" FROM usuario u
                                                JOIN ubicacion ub ON u.id_ubicacion = ub.idubicacion');
        return $consulta->result();
    }

    public function guardarUsuario($datos)
    {
        $data = array('nombre' => $datos['nombre'],
            'usuario' => $datos['usuario'],
            'password' => md5($datos['pass']),
            'rol' => $datos['rol'],
            'id_ubicacion' => $datos['ubicacion']);

        return $this->db->insert('usuario', $data);
    }

    public function actualizarUsuario($datos)
    {
        if ($datos['pass'] == '') {
            $data = array('nombre' => $datos['nombre'],
                'usuario' => $datos['usuario'],
                'id_ubicacion' => $datos['ubicacion']);
        } else {
            $data = array('nombre' => $datos['nombre'],
                'usuario' => $datos['usuario'],
                'password' => md5($datos['pass']),
                'id_ubicacion' => $datos['ubicacion']);
        }
        $this->db->where('IdUsuario', $datos['idusuario']);
        return $this->db->update('usuario', $data);
    }

}
