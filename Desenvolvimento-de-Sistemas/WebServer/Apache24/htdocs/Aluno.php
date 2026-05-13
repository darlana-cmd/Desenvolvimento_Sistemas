<?php
    class Aluno
    {
        private string $nome;
        private string $email;

        public function Cadastrar_Aluno($nomeAluno, $emailAluno)
        {
            require_once("Conecte.php");
            $obj = new Conecte ();
            $pdo = $obj->ConectarBanco();


            $this->nome = $nomeAluno;
            $this->email = $emailAluno;

            $sql = "INSERT INTO alunos (nome, email) VALUES (:nome, :email)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':nome', $nomeAluno);
            $stmt->bindValue(':email', $emailAluno);

            $stmt->execute();

            return "Aluno Cadastrado com sucesso!";

        }
    
    }
?>