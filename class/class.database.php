<?php
$db = new Database();
$db->conexion();

class Database
{
    // specify your own database credentials
    public $conn;
    private $servdb = "localhost";
    private $database = "rodeli";
    private $userdb = "root";
    private $passdb = "root";
    private $opciones = array(
                            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                        );
 
    // get the database connection  port=60301;
    public function conexion(){
 
        $conn = null;
 
        try{
            $conn = new PDO("mysql:host=" . $this->servdb . ";dbname=" . $this->database, $this->userdb, $this->passdb, $this->opciones);
            //echo '<b>Conectado a</b> '.$conn->getAttribute(PDO::ATTR_CONNECTION_STATUS);
        }catch(PDOException $e){
            //echo "<b>Error de conexion:</b> " . $e->getMessage();
        }
        
        $this->conn = $conn; 
        return $conn;
    }
}
?>