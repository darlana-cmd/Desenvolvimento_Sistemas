<?php
    class User 
    {
        private string $usuarios;
        private string $password;
        private $pdo;

        public function _construct()
        {
            include_once("ConectarProdutos.php");
            $obj = new ConectarProdutos();
            $this->pdo = $obj->conectarBanco();
        }

        public function getUser ($param1, $param2)
        {
            $this->usuario = $param1;
            $this->usuario = $param1;

            $sql = "SELECT * FROM users WHERE login =:login AND password = :pass AND ativo = true;";
            $stmt = $pdo ->prepare($sql);
            $stmt->bindValue (':login', $this->user);
            $stmt->bindValue (':pass', $this->password);

            if($stmt->execute())
            {
                $result = $stmt->fetch(PDO:FETCHE_ASSOC);
                if($result["login"]==$this->usuario)
                {
                    return TRUE;
                }
                else
                {
                    return FALSE;
                }
            }
            else
                return FALSE;
            
            

        }
    }

?>