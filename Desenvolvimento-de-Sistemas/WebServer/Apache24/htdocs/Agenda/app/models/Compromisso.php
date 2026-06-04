<?php
class Compromisso
{
    private $pdo;

    public function __construct()
    {
        include_once("Connect.php");

        $conexao = new Connect();
        $this->pdo = $conexao->conectarBanco();
    }

    public function CadastrarCompromisso( $titulo, $data, $hora, $local, $descricao)
   
    {
        $sql = "INSERT INTO compromissos (titulo, data_compromisso, hora_compromisso, local_compromisso, descricao)
        VALUES (:titulo, :data, :hora, :local, :descricao, :usuario)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':data', $data);
        $stmt->bindParam(':hora', $hora);
        $stmt->bindParam(':local', $local);
        $stmt->bindParam(':descricao', $descricao);


        if($stmt->execute()) {
            echo '<script>
                alert("Compromisso cadastrado com sucesso");
               window.location.href="http://localhost/Agenda/app/views/cadastro_compromisso.php";
            </script>';
        }
        else {
            echo "Compromisso não cadastrado... tente novamente.";
        }
    }


    }
?>