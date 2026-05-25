<?php

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        include_once("Produto.php");
        $obj = new Produto();
        $exec = $obj->listarProduto();

        if(!$exec)
        {
            $exec = [];
        }
    }
    else
    {
        header("Location: CadastroProduto.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CadastroProdutos.css">
    <title></title>
</head>

<body>
    <header>
        <img src="imagens/image-removebg-preview.png" alt="">

    </header>
   <body>

    <header>
        <img src="imagens/image-removebg-preview.png" alt="">
    </header>

    <nav>

        <h6>PRINCIPAL</h6>

        <!-- MENU PRODUTOS -->
        <div class="menu-produto">

            <p>
                <img src="imagens/produto.png" alt="">
                Produtos
            </p>

            <div class="submenu">

                <!-- CADASTRAR -->
                <a href="CadastroProdutos.html" class="link-menu">
                    Cadastrar Produto
                </a>

                <!-- LISTAR -->
                <form action="ListandoProdutos.php" method="post">

                    <button type="submit" class="botao-menu">
                        Listar Produtos
                    </button>

                </form>

            </div>

        </div>

        <!-- FORNECEDORES -->
        <p>
            <img src="imagens/fornecedor.png" alt="">
            Fornecedores
        </p>

    </nav>

    </form>
 <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($exec as $Produtos): ?>
            <tr>
                <td><?= $Produtos["id"]; ?></td>
                <td><?= $Produtos["nome"]; ?></td>
                <td><?= $Produtos["preco"]; ?></td>
                <td><?= $Produtos["quant"]; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="PaginaInicial.php"><button>VOLTAR</button></a>
</html>
