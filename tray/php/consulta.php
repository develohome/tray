<?php
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    include_once('../classes/usuarios.php');
    $u = new Usuario();
    if(!empty($nome) && !empty($email)){
        $u->conectar();
        if($u->login($nome, $email)){
            header('Location: ../views/main.php');
        }else{
            echo "<h1>Nome ou email errado<h1><a href='../index.php'><< Voltar</a>";
        }
    }else{
        echo '<h1>Existe campos em branco</h1><br><a href="../index.php"> << Voltar</a>';
    }
?>