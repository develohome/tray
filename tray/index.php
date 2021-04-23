<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        *{
            padding:0;
            margin: 0;
            box-sizing: border-box;
        }
        form{

            width: 400px;
            border: 1px solid #797878;
            margin:30px auto;
            padding: 3rem 2rem;
        }
        h1{
            margin-bottom: 50px;
        }
        input{
            width: 100%;
            height: 40px;
            margin-bottom: 20px;
            outline: none;
            border-radius: 5px;
            border: 1px solid #797878;
            padding: 0 10px;
        }
        
        input[type='submit']{

        }
    </style>
</head>
<body>

    <form action="./php/consulta.php" method="post">
        <h1>Login</h1>
        <input type="text" name="nome" id="" placeholder="Nome">
        <input type="email" name="email" id=""  placeholder="Email">
        <input type="submit" value="ENTRAR">
    </form>
</body>
</html>