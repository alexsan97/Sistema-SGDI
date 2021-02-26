<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Sistema/models/m_usuario.php';


$model_usuario = new User();

$user = $_POST['user'];
$password = $_POST['password'];

$consultaUser = $model_usuario->getUsuario($user,$password);

#checks if the search brought some row and if it is one only row
if(sqlsrv_has_rows($consultaUser) != 1){
    echo'<script type="text/javascript">alert("No existe el usuario");window.location.href="../index.php";</script>';
}else{

    #creates sessions
        session_start();
        while($row = sqlsrv_fetch_array($consultaUser)){
            $_SESSION['id'] = $row['UserID'];
            $_SESSION['name'] = $row['UserName'];
            //$_SESSION['pass'] = $row['UserPassword'];
            $perfil = $row['UserPerfilID'];
        }

        $consultaPerfil = $model_usuario->getPerfil($perfil);
        while($row = sqlsrv_fetch_array($consultaPerfil)){
            //$_SESSION['Pname'] = $row['PerfilName'];
            $_SESSION['Pconfig'] = $row['PerfilConfig'];
            $_SESSION['Pindex'] = $row['PerfilIndex'];
            $_SESSION['Psearch'] = $row['PerfilSearch'];
            $_SESSION['PDownload'] = $row['PerfilDownload'];
            $_SESSION['PReindex'] = $row['PerfilReindex'];
        }
        

        #redirects user
        if($_SESSION['Pconfig'] != 0)
        header("Location: ../views/agencias.php");
        if($_SESSION['Pindex'] != 0)
        header("Location: ../views/indexacion.php");
        if($_SESSION['Psearch'] != 0)
        header("Location: ../views/dashboard.php");
        /*if($_SESSION['Psearch'] != 0)
        header("Location: ../index.php");
        if($_SESSION['Psearch'] != 0)
        header("Location: ../index.php");*/

}

?>