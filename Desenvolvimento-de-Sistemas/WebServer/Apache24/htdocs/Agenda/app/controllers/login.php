<?php
    session_name("Agenda");
    session_start();
    

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        
        include_once("../models/User.php");

        $obj = new User();
        $resp = $obj->ValidarLogin($email,$senha);

        if($resp == TRUE)
        {
            $_SESSION["login"] = md5($email);
            header("Location: ../views/dashboard.php");
        }
        else
        {
            echo '<script>
                        alert("Senha ou Usuário inválido, tente novamente.");
                        window.location.href="http://localhost/Agenda";
                </script>';
                
        }
    }

    if(isset($_POST["lembrar"]))
        {
            $valor = base64_encode($email);
            $duracao = strtotime("+1 days");
            setcookie("lembrar,$valor,$duracao");
          
        }

        
?>