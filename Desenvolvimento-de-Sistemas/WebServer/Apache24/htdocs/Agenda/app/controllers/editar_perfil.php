<?php
    session_name("Agenda");
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = $_POST["email"];
        $nome = $_POST["nome"];
        $telefone = $_POST["tel"];
        $descricao = $_POST["descricao"];
        
        include_once("../models/User.php");

        $obj = new User();
        $resp = $obj->EditarPerfil($nome, $email,  $telefone, $descricao);

        if($resp == TRUE)
        {
            header("Location: ../views/perfil.php");
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