<?php
    session_start();
    $valor = $_POST['valor'] ;
    if(!empty($valor)){
        include_once('../classes/usuarios.php');
        $u = new Usuario();
        $u->conectar();
        //$u->inserirVenda($valor);
        if($u->inserirVenda($valor)){
            header('Location: ../views/relatorio.php');
        }
        
    }else{
        echo 'Não foi possivel efetuar o cadastro';
    }
    $u->close();
?>