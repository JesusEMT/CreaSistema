<?php
class Query extends Conexion{
    private $pdo, $con, $sql, $datos;
    public function __construct() {
        $this->pdo = new Conexion();
        $this->con = $this->pdo->conect();
    }
   
   
   //funcion select() para hacer consultas de la base de datos
    public function select(string $sql)                     
    {
        $this->sql = $sql;
        $resul = $this->con->prepare($this->sql);
        $resul->execute();
        $data = $resul->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    //funcion para obtener todos los datos
    public function selectAll(string $sql)
    {
        $this->sql = $sql;
        $resul = $this->con->prepare($this->sql);
        $resul->execute();
        $data = $resul->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }


    //funcion para registrar todos los datos
    public function save(string $sql, array $datos)         //recibe cadena sql y los datos
    {
        $this->sql = $sql;                                  //se lamacenan los argumentos recibidos
        $this->datos = $datos;
        $insert = $this->con->prepare($this->sql);          //accede a la conexion para preparar el insert envia el sql se guarda en $insert
        $data = $insert->execute($this->datos);             //se executa y se envia el array de datos    se guarada en $data
        if ($data) {                                        //Verifica si se ejecuto sin problemas el query
            $res = 1;                                       //valor de insert exitosa              
        }else{
            $res = 0;                                       //valor de instert fallo
        }
        return $res;
    }
}


?>