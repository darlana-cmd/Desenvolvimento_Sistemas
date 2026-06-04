<?php
class DashboardModel {
    private $pdo;

    public function __construct() {
        include_once("Connect.php");
        $conexao = new Connect();
        $this->pdo = $conexao->conectarBanco();
    }

    public function contarContatos($id_usuario) {
        $sql = "SELECT COUNT(*) as total FROM contatos WHERE id_usuario = :id_usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'] ?? 0;
    }

    public function contarCompromissos($id_usuario) {
        $sql = "SELECT COUNT(*) as total FROM compromissos WHERE id_usuario = :id_usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'] ?? 0;
    }

   public function buscarContatos($id_usuario) {
        $sql = "SELECT id_contatos, nome, email, telefone 
                FROM contatos 
                WHERE id_usuario = :id_usuario 
                ORDER BY nome ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarProximosCompromissos($id_usuario) {
        $sql = "SELECT id_compromisso, titulo, data_compromisso, hora_compromisso, local_compromisso FROM compromissos WHERE id_usuario = :id_usuario ORDER BY data_compromisso ASC LIMIT 3";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

     public function ExcluirContato($id_compromisso)
    {
        $sql = "DELETE FROM compromissos WHERE id_compromisso = :id;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id_compromisso);
        if ($stmt->execute()) {
            echo '<script>
                    alert("Usuário excluido com sucesso.");
                    window.location.href="http://localhost:8080/Agenda/app/views/contatos.php";
                    </script>';
        } else {
            echo "Erro";
        }
    }
}
?>