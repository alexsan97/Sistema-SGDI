<?php
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}else
if($status == PHP_SESSION_DISABLED){
    //Sessions are not available
}else
if($status == PHP_SESSION_ACTIVE){
    //Destroy current and start new one
    session_destroy();
    session_start();
}


if (!isset($_SESSION['id'])) {
    header('location:/Sistema/index.php');
    die;
} else {
    $username = $_SESSION["name"];
    $id = $_SESSION['id'];
    $perfilConfig = $_SESSION['Pconfig'];
    $perfilIndex = $_SESSION['Pindex'];
    $perfilSearch = $_SESSION['Psearch'];
    $perfilDownload = $_SESSION['PDownload'];
    $perfilReindex = $_SESSION['PReindex'];
     
}
 ?>