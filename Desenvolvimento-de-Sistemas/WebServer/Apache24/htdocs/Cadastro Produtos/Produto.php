<?php
    
    class Produto
    {
        private string $nome;
        private string $quant;
        private string $preco;
        private string $id;

        public function cadastrarProduto($nomeProduto, $quantProduto, $precoProduto, $idProduto)
        {
            require_once("ConectarProdutos.php");
            $obj = new ConectarProdutos();
            $pdo = $obj->ConectarBanco();

            $this->nome = $nomeProduto;
            $this->quant = $quantProduto;
            $this->preco = $precoProduto;
            $this->id = $idProduto;

            $sql = "INSERT INTO Produtos (id, nome, preco, quant) VALUES (:id, :nome, :preco, :quant);";

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id',$this->id,PDO::PARAM_INT);
            $stmt->bindValue(':nome',$this->nome);
            $stmt->bindValue(':preco',$this->preco, PDO::PARAM_INT);
            $stmt->bindValue(':quant',$this->quant, PDO::PARAM_INT);

            if($stmt->execute())
                return TRUE;
            else
                return FALSE;
        }

        public function listarProduto()
        {
            require_once("ConectarProdutos.php");
            $obj = new ConectarProdutos();
            $pdo = $obj->conectarBanco();

            $sql = "SELECT * FROM Produtos;";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $tuplas = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $tuplas;
        }
    }
?>