<?php
    session_start();
    
    // Dados de quem irá enviar o email
        $nome = 'Loja';
        $email = "Loja@gmail.com";
        $mensagem = "Total de vendas diárias";
        $data_envio = date('d/m/Y');
        $hora_envio = date('H:i:s');
    // Campo E-mail
        $arquivo = '';

    // emails para quem será enviado o formulário
        $emailenviar = $_SESSION['email'];
        $destino = $emailenviar;
        $assunto = "Vendas diárias";
    
    

    // formato do e-mail é html
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: $nome <$email>';

        $enviaremail = mail($destino, $assunto, $arquivo, $headers);
        if($enviaremail){
            $mgm = "E-MAIL ENVIADO COM SUCESSO!";
            echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
        } else {
            $mgm = "ERRO AO ENVIAR E-MAIL!";
            echo "";
        }
?>