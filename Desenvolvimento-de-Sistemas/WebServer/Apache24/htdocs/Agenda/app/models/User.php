<?php

    class User
    {
        private string $login;
        private string $password;
        private string $nome;
        private $pdo;

        function __construct()
        {
            include_once("Connect.php");
            $conexao = new Connect();
            $this->pdo = $conexao->conectarBanco();

        }

        public function ValidarLogin($email, $senha)
        {
            $this->login = $email;
            $this->password = $senha;

            $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha AND ativo = TRUE;";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $this->login);
            $stmt->bindParam(':senha', $this->password);
            $stmt->execute();
             
            $vetor = $stmt->fetch(PDO::FETCH_ASSOC);
            if(isset($vetor["email"]) && isset($vetor["senha"]))
            {
                return (TRUE);
            }
            else
            {
                return (FALSE);
            }

        }
         public function CadastrarUsuario($email, $senha, $nome)
        {
            $sql="INSERT INTO usuarios (email, senha, nome, ativo) VALUES (:email, :senha, :nome, 'true');";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':nome', $nome);
            if($stmt->execute())
            {
                echo '<script>
                    alert("Usuário cadastrado com sucesso.");
                    window.location.href="http://localhost:8080/Agenda/app/views/index.php";
                    </script>';
            }
            else{
                echo "Erro";
            }
        }
    }

?>