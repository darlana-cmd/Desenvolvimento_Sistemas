<?php
class Contato
    {
        private string $email;
        private string $name;
        private string $tel;
        private object $pdo;

        function __construct()
        {
            include_once("Connect.php");
            $conexao = new Connect();
            $this->pdo = $conexao->conectarBanco();

        }

        public function CadastrarContato($email, $nome, $telefone)
        {
            $this->email = $email;
            $this->name = $nome;
            $this->tel = $telefone;


            $sql="INSERT INTO contatos (email, nome, telefone, ativo) VALUES (:email, :nome, :telefone, 'true');";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':telefone', $telefone);

            if($stmt->execute())
            {
               return (TRUE); 
            }
            else
            {
                return (FALSE);
            }
        }

        public function ListarTodosContatos()
        {
            $sql= "SELECT * FROM contatos ORDER BY nome ASC;";
            $stmt= $this->pdo->prepare($sql);
            if($stmt->execute())
            {
                $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
                return($result);
            }
            else
            {
                return (FALSE);
            }
        }

        public function ListarTodosUsuarios()
        {
            $sql= "SELECT * FROM usuarios ORDER BY id_usuarios ASC;";
            $stmt= $this->pdo->prepare($sql);
            if($stmt->execute())
            {
                $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
                return($result);
            }
            else
            {
                return (FALSE);
            }
        }

         public function EditarUsuario($id_usuario, $email)
        {
            $sql="UPDATE usuarios SET email = :email WHERE id_usuarios = :id;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id_usuario);
            $stmt->bindParam(':email', $email);
            if($stmt->execute())
            {
                echo '<script>
                    alert("Usuário atualizado com sucesso.");
                    window.location.href="http://localhost:8080/painel/app/views/listar_usuario.php";
                    </script>';
            }
            else{
                echo "Erro";
            }
        }

         public function ListarUmContato($id_contatos)
        {
            $sql= "SELECT * FROM contatos WHERE id_contatos = :id;";
            $stmt= $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id_contatos);
            if($stmt->execute())
            {
                $result= $stmt->fetch(PDO::FETCH_ASSOC);
                return($result);
            }
            else
            {
                return (FALSE);
            }
        }

        public function EditarContato($id, $nome, $email, $telefone, $arquivo)
    {
       
        $usuarioLogado = md5($nome);

        $pastaDestino = __DIR__ . "/../../fotos_contato/";

        if (!is_dir($pastaDestino)) {
            mkdir($pastaDestino, 0777, true);
        }
     
        $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
        $permitidas = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($extensao, $permitidas)) {
           return false;
        }

        $usuarioLimpo = preg_replace('/[^a-zA-Z0-9_\-]/', '', $usuarioLogado);

        $novoNomeArquivo = md5($usuarioLimpo) . "." . $extensao;



        $caminhoArquivo = $pastaDestino . $novoNomeArquivo;
        $url = "../../fotos_contato/" . $novoNomeArquivo;
        if (move_uploaded_file($arquivo['tmp_name'], $caminhoArquivo)) {

          

            $sql= "UPDATE contatos SET nome = :nome, email = :email, telefone = :tel, url = :url WHERE id_contatos = :id;";
            $stmt= $this->pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':tel', $telefone);
            $stmt->bindParam(':url', $url);
            $stmt->bindParam(':id', $id);

            if($stmt->execute())
            {
                return TRUE;
                
            }
            else
            {
               return FALSE;
            }

        



        }
    }

        
        public function ExcluirContato($id_contatos)
        {
            $sql="DELETE FROM contatos WHERE id_contatos = :id;";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id_contatos);
            if($stmt->execute())
            {
                echo '<script>
                    alert("Usuário excluido com sucesso.");
                    window.location.href="http://localhost:8080/Agenda/app/views/contatos.php";
                    </script>';
            }
            else{
                echo "Erro";
            }
        }

    }
?>