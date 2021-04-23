<?php
    $id = $_GET['i'];
    $nome = $_GET['n'];
    $email = $_GET['e'];
    include_once('../classes/usuarios.php');
    $u = new Usuario();
    $u->conectar();
    $u->alterar($id, $nome, $email);
    $u->close();
?>