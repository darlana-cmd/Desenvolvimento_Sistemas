<?php
    session_name("Agenda");
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $id = $_POST["id"];
        $email = $_POST["email"];
        $nome = $_POST["nome"];
        $telefone = $_POST["tel"];
        $arquivo = $_FILES["arquivo"];
        
        include_once("../models/Contato.php");

        $obj = new Contato();
        $resp = $obj->EditarContato($id, $nome, $email,  $telefone,$arquivo);

        if($resp == TRUE)
        {
            header("Location: ../views/contatos.php");
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