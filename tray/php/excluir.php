<?php
    include_once('../classes/usuarios.php');
    $u = new Usuario();
    $user = $_GET['id'];
    $u->conectar();
    $u->excluir($user);
    $u->close();
    header('Location: ../views/usuarios.php');
?>