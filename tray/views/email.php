<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('Location: ../index.php');
    }
    include_once('../classes/usuarios.php');
    $u = new Usuario();
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
</head>
<body id='email'>
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
                    <a href="usuarios.php">
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
                    <a href="relatorio.php">
                        <i class="fa fa-line-chart"></i>
                        <span>relatório</span>
                    </a>
                </li>
                <li>
                    <a href="email.php" class="action">
                        <i class="fa fa-envelope"></i>
                        <span>email</span>
                    </a></li>
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
                <i class="fa fa-envelope"></i>
                <span>Email</span>
            </h1>
            <section class="main">
                <form action="../php/email.php" method="post">
                    <?php
                        $u->conectar();
                        if($u->consultadiaria($_SESSION['id'])){
                            if($_SESSION['total'] !== null){
                                echo "<h2>Olá, {$_SESSION['nome']}<h2>";
                                echo "<span>Email </span><input type='text'  name='Eemail' disabled value='".$_SESSION['email']."'></br>";
                                echo "<span>Total das vendas </span><input type='text' disabled value='R$ ".number_format($_SESSION['total'], 2, ',', '.')."'></br>";
                                echo "<input type='submit' value='Enviar'>";
                            }else{
                                echo "<p>Não foi feita nenhuma venda para o dia {date('Y-m-d')}</p>";
                            }
                        }
                        //<p>Seu total de vendas hoje (".date('Y-m-d').") é de R$ ".number_format($_SESSION['total'], 2, ',', '.')."</p>"
                    ?>
                </form>
            </section>
        </main>
    </div>
</body>
</html>