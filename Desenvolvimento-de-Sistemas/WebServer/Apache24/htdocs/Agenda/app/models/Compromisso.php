<?php

class Compromisso {
    private $pdo;

    public function __construct() {
        include_once("Connect.php");
        $conexao = new Connect();
        $this->pdo = $conexao->conectarBanco();
    }

    /**
     * Busca todos os compromissos de um usuário específico
     */
    public function ListarCompromissosDoUsuario($id_usuario) {
        $sql = "SELECT id_compromisso, titulo, data_compromisso, hora_compromisso, local_compromisso, descricao 
                FROM compromissos 
                WHERE id_usuario = :id_usuario 
                ORDER BY data_compromisso ASC, hora_compromisso ASC";
                
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Insere um novo compromisso associado ao usuário logado
     */
    public function CadastrarCompromisso($titulo, $data_compromisso, $hora_compromisso, $local_compromisso, $descricao, $id_usuario) {
        $sql = "INSERT INTO compromissos (titulo, data_compromisso, hora_compromisso, local_compromisso, descricao, id_usuario) 
                VALUES (:titulo, :data_compromisso, :hora_compromisso, :local_compromisso, :descricao, :id_usuario)";
                
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':data_compromisso', $data_compromisso);
        $stmt->bindParam(':hora_compromisso', $hora_compromisso);
        $stmt->bindParam(':local_compromisso', $local_compromisso);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
}
?>