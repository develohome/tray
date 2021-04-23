<?php
    include_once("../classes/usuarios.php");
    $u = new Usuario();
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    if(!empty($nome) && !empty($email)){
        $u->conectar();
        $u->cadastrar($nome, $email);
    }
?>
<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('Location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Cadastro</title>
    <link rel="stylesheet" href="../_css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .cadastrato{
            width:200px;
            height:200px;
            border:1px solid #49868C;
            background-color:#A0D9D9;
            color:#49868C;
            display:flex;
            justify-content: space-around;
            align-items: center;
        }
    </style>
</head>
<body id='newuser'>
    <div class="container">
        <header>
            
        </header>
        <nav>
            <ul>
                <li>
                    <a href="../views/main.php">
                        <i class="fa fa-home"></i>
                        <span>inicio</span>
                    </a>
                </li>
                <li>
                    <a href="../views/novousuario.php" class="action">
                        <i class="fa fa-user-plus"></i>
                        <span>novo usuário</span>
                    </a>
                </li>
                <li>
                    <a href="../views/usuarios.php">
                        <i class="fa fa-users"></i>
                        <span>usuários</span>
                    </a>
                </li>
                <li>
                    <a href="../views/venda.php">
                        <i class="fa fa-shopping-bag"></i>
                        <span>Venda</span>
                    </a>
                </li>
                <li>
                    <a href="../views/relatorio.php">
                        <i class="fa fa-line-chart"></i>
                        <span>relatório</span>
                    </a></li>
                <li>
                    <a href="./sair.php">
                        <i class="fa fa-sign-out"></i>
                        <span>sair</span>
                    </a>
                </li>
            </ul>
        </nav>
        <main>
            <h1>
                <i class="fa fa-user-plus"></i>
                <span>novo usuário</span>
            </h1>
            <section class="main">
                <div class="cadastrado">
                    <h2>Cadastrado com sucesso</h2>
                </div>
            </section>
        </main>
    </div>
</body>
</html>