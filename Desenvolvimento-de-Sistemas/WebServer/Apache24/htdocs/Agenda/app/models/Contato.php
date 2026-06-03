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
    }
?>