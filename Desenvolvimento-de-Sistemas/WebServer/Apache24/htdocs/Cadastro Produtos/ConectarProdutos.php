<?php
    class ConectarProdutos
    {
        private $host;//endereço onde o servidor de banco de dados está instalado.
        private $dbname;//nome da base de dados que iremos ultilizar.
        private $password;//senha do meu banco de dados.
        private $user;//é o usuário do banco de dados no postgre é postgres
        private $port;//porta onde é executado as conexões com o banco de dados padão do Postgres e 5432.


        function __construct()
        {
            $this->host = "localhost";
            $this->dbname = "CadastroProdutos";
            $this->password = "admin";
            $this->user = "postgres";
            $this->port = "5432";
        }

        public function ConectarBanco()
        {
            try
            {
                $PDO = new PDO("pgsql:host=".$this->host.";port=".$this->port.";dbname=".$this->dbname,$this->user,$this->password);   
                return($PDO);
            }
            catch(PDOException $erro)
            {
                $msg = "Falha no acesso com o PostGres: ".$erro->getMessage();
                echo $msg;
                
            }
        }

    }
?>