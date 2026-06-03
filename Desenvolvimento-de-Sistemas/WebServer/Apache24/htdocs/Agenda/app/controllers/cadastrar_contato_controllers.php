<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = $_POST["email"];
        $nome = $_POST["nome"];
        $telefone = $_POST["telefone"];
        
        include_once("../models/Contato.php");

        $obj = new Contato();
        $resp = $obj->CadastrarContato($email,$nome, $telefone);

        if($resp == TRUE)
        {
            echo '<script>
                        alert("Contato cadastrado com sucesso!");
                        window.location.href="http://localhost/Agenda/app/views/contatos.php";
                </script>';
        }
        else
        {
            echo '<script>
                        alert("Não foi possível cadastrar contato");
                        window.location.href="http://localhost/Agenda/app/views/contatos.php";
                </script>';
                
        }
    }
?>