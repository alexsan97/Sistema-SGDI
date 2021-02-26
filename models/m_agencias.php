<?php

    require_once $_SERVER['DOCUMENT_ROOT'].'/Sistema/db/db.php';

    class Agencies {

        private $database;
        private $conexion;
        public function __construct(){
            $this->database = new DB();
            $this->conexion = $this->database->connect();
        }
        
        /*=============================================
        Obtener Registros Agencies
        =============================================*/
        public function getAgenciesPathRelease($baseName){         
            $conexion =$this->conexion;
        
            $sql = " select IDAgency,AgencyName,AgencyPathRelease ";
            $sql.= " FROM ".$baseName.".dbo.Agencies";
            //$sql.= " FROM dbo.Agencies";
            $sql.= " ORDER BY IDAgency ASC;";
                    
            try{
                $stmt = sqlsrv_query($conexion,$sql);
                $data = array();
                if(sqlsrv_has_rows( $stmt ))
                {              
                    $indice=0;
                    while ($row = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC))
                    {
                            $data[$indice]['IDAgency'] = $row['IDAgency'];
                            $data[$indice]['AgencyName'] = utf8_encode($row['AgencyName']);
                            $data[$indice]['AgencyPathRelease'] = utf8_encode($row['AgencyPathRelease']);
                        $indice++;
                    }
                    	
                    return $data;
                }
                else{                 
                    /*$estado="error";
                    $mensaje="No existe el registro";
                    array_push($data,$estado,$mensaje);*/
                    return $data;
                }
            }catch(Exception $e){
                echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                die( print_r( sqlsrv_errors(), true));
            }  
        }
    }
?>