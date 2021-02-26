<?php  
class DB {

     private $server;
     private $db;
     private $user;
     private $password;

     public function __construct(){
          $this->server     = "HOST\MSSQLSERVER2019";
          $this->db       = 'BOXDIGITAL';
          $this->user     = 'sa';
          $this->password = "5QLSiglo21";
     }
     //8451ba8a14d79753d34cb33b51ba46b4b025eb81

     public function connect(){
          
          $serverName = $this->server;  
          $connectionInfo = array( "Database"=> $this->db ,"UID" => $this->user , "PWD" => $this->password); 
          $conn = sqlsrv_connect( $serverName, $connectionInfo);
          
          try{
               $conn = sqlsrv_connect( $serverName, $connectionInfo);
               
               return $conn;
          }catch(Exception $e){
               echo 'Excepción capturada: ',  $e->getMessage(), "\n";
               //echo "Conexión no se pudo establecer.<br />";
               die( print_r( sqlsrv_errors(), true));
          }
     }
}  
?>  