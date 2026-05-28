<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $nome = $_POST["nome"];
        
        include_once("../models/User.php");

        $obj = new User();
        $resp = $obj->CadastrarUsuario($email,$senha, $nome);

        if($resp == TRUE)
        {
            header("Location: ../views/index.php");
        }
        else
        {
            echo '<script>
                        alert("Não foi possível cadastrar seu usuário");
                        window.location.href="http://localhost/Agenda";
                </script>';
                
        }
    }
?>