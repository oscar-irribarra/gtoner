<?php

class Mtoner extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function guardarToner($datos)
    {
        $data = array( 'marca' => $datos['marca'], 'modelo' => $datos['modelo'], 'id_categoria' => $datos['idcategoria'] );
            $this->db->insert('toner',$data);
        
       $data['idtoner'] = $this->db->insert_id();

       return $this->crearInventario($data);
    }

    public function crearInventario($data){
        $data = array( 'Id_Toner' => $data['idtoner'], 'Stock' => 0);

       return $this->db->insert('inventario',$data);  
    }

    public function getToneres()
    {
       $consulta = $this->db->query('SELECT * FROM toner t 
                                     JOIN inventario i on t.IdToner = i.Id_Toner
                                     JOIN categoria c on t.id_categoria = c.idcategoria');
        return $consulta->result();
    }

    public function getToner($id)
    {
        $sql ='SELECT * FROM toner t WHERE t.id_categoria = ?';
        $consulta = $this->db->query($sql, array($id));
        return $consulta->result();
    }

    public function getTonDep($id)
    {
        $sql = 'SELECT t.idtoner AS "tidtoner", t.marca AS "tmarca", t.modelo AS "tmodelo" FROM toner t
                JOIN impton it ON t.idtoner = it.id_toner
                JOIN impresora i ON it.id_impresora = i.idimpresora 
                JOIN datosimp di ON i.idimpresora = di.id_impresora
                JOIN impdep id ON di.iddatosimp = id.id_datosimp
                WHERE id.id_departamento = ?
                GROUP By t.idtoner';

        $consulta = $this->db->query($sql, array($id));
        return $consulta->result();
    }

    

}