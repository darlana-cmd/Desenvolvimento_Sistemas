<?php

class User
{
    private string $login;
    private string $password;
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
        if (isset($vetor["email"]) && isset($vetor["senha"])) {
            $_SESSION["id"] = $vetor["id_usuarios"];
            $_SESSION["nome"] = $vetor["nome"];
            return (TRUE);
        } else {
            return (FALSE);
        }
    }
    public function CadastrarUsuario($email, $senha, $nome)
    {
        $sql = "INSERT INTO usuarios (email, senha, nome, ativo) VALUES (:email, :senha, :nome, 'true');";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':nome', $nome);
        if ($stmt->execute()) {
            echo '<script>
                    alert("Usuário cadastrado com sucesso.");
                    window.location.href="http://localhost:8080/Agenda/app/views/index.php";
                    </script>';
        } else {
            echo "Erro";
        }
    }

    public function EditarPerfil($nome, $email, $telefone, $descricao)
    {
        $usuarioLogado = $_SESSION["login"];

        $pastaDestino = __DIR__ . "/../../fotos_perfil/";

        if (!is_dir($pastaDestino)) {
            mkdir($pastaDestino, 0777, true);
        }

        if (!isset($_FILES['arquivo']) || $_FILES['arquivo']['error'] != 0) {
            return false;
        }

        $arquivo = $_FILES['arquivo'];

        $extensao = strtolower(pathinfo($arquivo['name'], PATHINFO_EXTENSION));
        $permitidas = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($extensao, $permitidas)) {
            return false;
        }

        $usuarioLimpo = preg_replace('/[^a-zA-Z0-9_\-]/', '', $usuarioLogado);

        $novoNomeArquivo = md5($usuarioLimpo) . "." . $extensao;



        $caminhoArquivo = $pastaDestino . $novoNomeArquivo;
        $url = "../../fotos_perfil/" . $novoNomeArquivo;

        if (move_uploaded_file($arquivo['tmp_name'], $caminhoArquivo)) {

            $sql= "UPDATE usuarios SET nome = :nome, email = :email, telefone = :tel, descricao = :descricao, url = :url WHERE id_usuarios = :id;";
            $stmt= $this->pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':tel', $telefone);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':url', $url);
            $stmt->bindParam(':id', $_SESSION["id"]);

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

     public function ListarUmUsuario($id_usuarios)
        {
            $sql= "SELECT * FROM usuarios WHERE id_usuarios = :id;";
            $stmt= $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id_usuarios);
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
}
