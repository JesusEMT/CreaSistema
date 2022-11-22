<?php
class ConfigurarModel extends Query{                                  #heredados de clase Query
       
    //funcion constructor
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getEmpresa()
    {
        $sql = "SELECT * FROM empresa";
        $data = $this->select($sql);
        return $data;
    }

    public function modificarEmp(string $nombre, string $RFC ,string $telefono,string $direccion,string $num,string $email,string $mensaje,int $id )
    {
        //igualamos variables con valores de paremetros recibidos
        $this->nombre = $nombre;
        $this->RFC = $RFC;
        $this->telefono = $telefono;
        $this->direccion =$direccion;
        $this->num = $num;
        $this->mensaje = $mensaje;
        $this->email = $email;
        $this->id = $id;

        $sql = "UPDATE empresa SET nombre = ?, RFC = ?, telefono = ?,direccion = ?, num_dir_empresa = ?, email_empresa = ? , mensaje = ? WHERE ID = ?";
        $datos = array($this->nombre, $this->RFC, $this->telefono, $this->direccion, $this->num, $this->email, $this->mensaje, $this->id);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    
}
?>