<?php

    require_once $_SERVER['DOCUMENT_ROOT'].'/Sistema/db/db.php';

    class User {

        private $database;
        private $conexion;
        public function __construct(){
            $this->database = new DB();
            $this->conexion = $this->database->connect();
        }
        
        public function getUsuario($user, $password){
            // $user = $_POST['user'];
            // $password = $_POST['password'];
            //include_once("../config/db.php");
            $conn =$this->conexion;
               
            $b= ".dbo.";
            $md1pass = sha1($password);
            $sql= "select * from " . $b . "Users where UserName = '$user' and UserPassword = '$md1pass' and UserEstado ='A'";

            try{
                $queryUser = sqlsrv_query($conn, $sql);
                return $queryUser;
            }catch(Exception $e){
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                //echo "Conexión no se pudo establecer.<br />";
                die( print_r( sqlsrv_errors(), true));
            }    
            
        }

        public function getPerfil($perfil){
            
            $conn =$this->conexion;
               
            $b= ".dbo.";
            $sql= "select * from " . $b . "UserPerfil where PerfilID = '$perfil' and Estado ='A'";

            try{
                $queryPerfil = sqlsrv_query($conn, $sql);
                return $queryPerfil;
            }catch(Exception $e){
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                echo "Conexión no se pudo establecer.<br />";
                die( print_r( sqlsrv_errors(), true));
            }    
            
        }

    }

?>