<?php
if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        require_once("Aluno.php");
        $obj = new Aluno ();
        $exec = $obj->cadastrarAluno($_POST["nome"],$_POST["email"]);
        
        if($exec == TRUE)
        {
            $msg = "Aluno Cadastrado com sucesso!";
        }
        else
        {
            $msg = "Algo deu Errado teste novamente!";
        }
    }
    else
    {
        header("Location: Cadastro_Aluno.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv= "refresh" content="3;url=Cadastro_Aluno.php">
    <title>Redirecionando....</title>
</head>
<body>
    
<h2><?=$msg; ?></h2>
<p>("Redirecionando....")</p>
</body>
</html>