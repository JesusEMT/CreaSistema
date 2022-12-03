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

    public function getDatos(string $table)
    {
        $sql = "SELECT COUNT(*) AS total FROM $table";
        $data = $this->select($sql);
        return $data;
        
    }

    public function getVentas()
    {
        $sql = "SELECT COUNT(*) AS total FROM ventas WHERE fecha > CURDATE() ";
        $data = $this->select($sql);
        return $data;
    }


    public function CrearEmpresa()
    {
        //igualamos variables con valores de paremetros recibidos
        $this->nombre = "Sin especificar";
        $this->RFC = "Sin especificar";
        $this->telefono = "Sin especificar";
        $this->direccion = "Sin especificar";
        $this->num = "S/N";
        $this->mensaje = "Sin especificar";
        $this->email = "Sin especificar";
    

        $sql = "INSERT INTO empresa(nombre, RFC, telefono, direccion, num_dir_empresa, email_empresa, mensaje) VALUES (?,?,?,?,?,?,?)";   //query que se enviara con nombres de base de datos
        $datos = array($this->nombre, $this->RFC, $this->telefono, $this->direccion, $this->num, $this->email, $this->mensaje);
        $data = $this->save($sql, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
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


    public function getStockMinimo()
    {
        $sql = "SELECT * FROM productos WHERE cantidad < 40 ORDER BY cantidad DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getMasVendidos()
    {
        $sql = "SELECT dv.id_producto, dv.cantidad, p.ID, p.nombre, SUM(dv.cantidad) AS total FROM detalle_ventas dv INNER JOIN productos p ON p.ID = dv.id_producto GROUP BY dv.id_producto ORDER BY dv.cantidad  DESC LIMIT 10";
        $data = $this->selectAll($sql);
        return $data;
    }
    
}
?>