<?php
    // classe que faz o controle do banco de dados ========================================
    class Usuario
    {
        private $pdo;
        // função para fazer a conexão com o banco de dados =================================
        public function conectar()
        {
            global $pdo;
            // fazer o tratamento da conexão, caso apresente algum erro a msg será apresentada
            try 
            {
                $pdo = new PDO("mysql:host=localhost;dbname=tray", "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Falha na conexão ". $e->getMessage();
            }
            
        }
       
        // função pada cadastrar um novo usuário ============================================
        public function cadastrar($nome, $email){
            global $pdo;
            
            // verificar se já está cadastrado
            $sql = $pdo->prepare("SELECT id FROM  users where nome= :n AND email = :e");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":e", $email);
            $sql->execute();
            if($sql->rowCount()>0){
                return false; // se já estiver cadastrado retorna falso
            }else{
                // se não estiver insere um novo usuário 
                $sql = $pdo->prepare("INSERT INTO users(nome, email) value(:n, :e)");
                $sql->bindValue(":n", $nome);
                $sql->bindValue(":e", $email);
                $sql->execute();
                return true;
            }
        }

        // função para fazer o login ======================================================

        public function login($nome, $email){
            global $pdo;
            $sql = $pdo->prepare("SELECT id, nome, email FROM users WHERE nome = :n AND email = :e"); // Retorna o id, nome e email se o nome e o email forem iguais ao que está no banco
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":e", $email);
            $sql->execute();
            if($sql->rowCount()>0){
                $dado = $sql->fetch();
                session_start();
                $_SESSION['id'] = $dado['id']; // cria uma sessão para id, nome e email
                $_SESSION['nome'] = $dado['nome'];
                $_SESSION['email'] = $dado['email'];
                return true;
            } else{
                return false;
            }
        }

        // função para fazer a consulta de usuários já cadastrado no banco e faz a listagem na tela de usuários
        public function consultaU(){
            global $pdo;
            $consulta = $pdo->query("SELECT id, nome, email FROM users;");
            $classes = 0;
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

                echo "<tr>"; 
                echo "<td><input type='text' disabled class='campo{$classes}' value='{$linha['nome']}'></td>"; // cria os dados da tabela com um input desabilitado que só será habilitado quando clicar no botão alterar
                echo "<td>{$linha['id']}</td>";
                echo "<td><input type='text' disabled class='campo{$classes}' value='{$linha['email']}'></td>";// cria os dados da tabela com um input desabilitado que só será habilitado quando clicar no botão alterar
                echo "<td>";
                echo "<button value='{$linha['id']}' class='alterar' name='botao'>Editar <i class='fa fa-pencil'></i></button>"; // habilita os campos do usuário correspondente ao botão editar
                echo "<button value='{$linha['id']}' class='excluir'>Excluir <i class='fa fa-trash'></i></button>";// faz a exclusão do usuário correspondente ao botão editar
                echo "</tr>";
                $classes++;
            }
        }

        // CONSULTAR A TABELA DE VENDAS ===========================================

        public function consultaV($id){
            global $pdo;
            $consulta = $pdo->query("SELECT * FROM listavendas where id = $id ;");

            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>"; 
                echo "<td>{$linha['nome']}</td>";
                echo "<td>{$linha['id']}</td>";
                echo "<td>{$linha['email']}</td>";
                echo "<td>R$ {$linha['comissao']}</td>";
                echo "<td>R$ ".number_format($linha['valor'], 2, ',', '.')."</td>";
                echo "<td>".$linha['datas']."</td>";
                echo "</tr>";
            }
        }
        // FUNÇÃO PARA FAZER A CONSULTA DIÁRIA ==================================================
        // FAZ A SOMA DO TOTAL DE VENDAS 
        public function consultadiaria($id){
            global $pdo;
            $sql = $pdo->prepare("SELECT sum(valor) as total, nome, email FROM listavendas WHERE id = :n and datas = :d");
            $sql->bindValue(":n", $id);
            $sql->bindValue(":d", date("Y-m-d"));
            $sql->execute();
            if($sql->rowCount()>0){
                $dado = $sql->fetch();
                // session_start();
                 $_SESSION['total'] = $dado['total'];
                return true;
            } else{
                echo "não foi enviado"; 
                return false;
            }
            //echo $id;
        }


        public function excluir($id){
            global $pdo;
            $stmt = $pdo->prepare('DELETE FROM users WHERE id = :id');
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            //echo $stmt->rowCount();
        }
        public function alterar($id, $nome, $email){
            global $pdo;
            $stmt = $pdo->prepare('UPDATE users SET nome = :nome, email = :email WHERE id = :id');
            $stmt->execute(array(
                ':id'   => $id,
                ':nome' => $nome,
                ':email' => $email ));
        }
        
        public function dadosAlterar($id)
        {
            global $pdo;
            $sql = $pdo->prepare("SELECT nome, email FROM users WHERE id = :n");
            $sql->bindValue(":n", $id);
            $sql->execute();
            if($sql->rowCount()>0){
                $dado = $sql->fetch();
                $dados[0] = $dado['nome'];
                $dados[1] = $dado['email'];
                
                return $dados;
            } else{
                return false;
            }
        }

        public function inserirVenda($valor){
            $id =  $_SESSION['id'];
            $nome = $_SESSION['nome'];
            $email =  $_SESSION['email'];
            $comissao =  number_format($valor * 0.085, 2);
            $valor =$valor;
            global $pdo;
            
            $sql = $pdo->prepare("INSERT INTO listavendas(id,nome, email,comissao, valor, datas) value(:i, :n, :e, :c, :v, :d)");
            $sql->bindValue(":i", $id);
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":c", $comissao);
            $sql->bindValue(":v", $valor);
            $sql->bindValue(":d", date('Y-m-d'));
            $sql->execute();
            return true;
        }
        
    }
    
?>