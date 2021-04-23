<?php
    session_start();
    
    include_once('../classes/usuarios.php');
    $u = new Usuario();
    $u->conectar();
    if($u->consultadiaria(10)){
        echo $_SESSION['total'] . '- '.date('Y-m-d');
    }
    
?>