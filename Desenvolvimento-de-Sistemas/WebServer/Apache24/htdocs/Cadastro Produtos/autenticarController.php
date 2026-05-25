<?php
    if ($_SERVER["REQUEST_METHOD"]== "POST")
    {
        require_once("User.php");
        $obj = new User ();
        $exec = $obj->getUser($login, $password);

        if($exec == true)
        {
            $msg = "Login realizado com sucesso!";
        }
        else
        {
            $msg = "Senha ou usuário invalido";
        }
    
    }
    else
    {
        header("Location: index.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv= "refresh" content="3;url=CadastroProdutos.html">
    <title>Redirecionando....</title>
</head>
<body>
    
<h2><?=$msg; ?></h2>
<p>("Redirecionando....")</p>
</body>
</html>