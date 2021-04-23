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
    <title>Usuários</title>
    <link rel="stylesheet" href="../_css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body id="user">
    <div class="msg">
        <h2>Excluido com sucesso !!!</h2>
    </div>
    <div class="container">
        <header>
        <h2>Olá, <?php echo $_SESSION['nome'];?></h2>
        </header>
        <nav>
            <ul>
                <li>
                    <a href="main.php">
                        <i class="fa fa-home"></i>
                        <span>inicio</span>
                    </a>
                </li>
                <li>
                    <a href="novousuario.php">
                        <i class="fa fa-user-plus"></i>
                        <span>novo usuário</span>
                    </a>
                </li>
                <li>
                    <a href="usuarios.php" class="action">
                        <i class="fa fa-users"></i>
                        <span>usuários</span>
                    </a>
                </li>
                <li>
                    <a href="venda.php">
                        <i class="fa fa-shopping-bag"></i>
                        <span>Venda</span>
                    </a>
                </li>
                <li>
                    <a href="relatorio.php" class="active">
                        <i class="fa fa-line-chart"></i>
                        <span>relatório</span>
                    </a>
                </li>
                <li>
                    <a href="email.php">
                        <i class="fa fa-envelope"></i>
                        <span>email</span>
                    </a>
                </li>
                <li>
                    <a href="../php/sair.php">
                        <i class="fa fa-sign-out"></i>
                        <span>sair</span>
                    </a>
                </li>
            </ul>
        </nav>
        <main>
            <h1>
                <i class="fa fa-users"></i>
                <span>usuários</span>
            </h1>
            <section class="main">
                <button id="btConfirma">Confirmar alteração</button>
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Funcional</th>
                            <th>Email</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include_once('../classes/usuarios.php');
                            $user = new Usuario();
                            $user->conectar();
                            $user->consultaU();
                        ?>
                    </tbody>
                </table>
                
            </section>
        </main>
    </div>
    
    <script src="../js/script.js"></script>
</body>
</html>