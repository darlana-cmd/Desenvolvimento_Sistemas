<?php
if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        require_once("Produto.php");
        $obj = new Produto ();
        $exec = $obj->cadastrarProduto($_POST["nome"],$_POST["preco"],$_POST["quant"],$_POST["id"]);
        
        if($exec == TRUE)
        {
            $msg = "Produto Cadastrado com sucesso!";
        }
        else
        {
            $msg = "Algo deu Errado teste novamente!";
        }
    }
    else
    {
        header("Location: CadastroProduto.html");
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