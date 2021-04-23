<?php
    include_once('./classes/usuarios.php');
    $u = new Usuario();
   
    $u->conectar();
    $u->alterar();
    $u->close();
?>