<?php
if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        require_once("Aluno.php");
        $obj = new Aluno ();
        $exec = $obj->Cadastrar_Aluno($_POST["nome"],$_POST["email"]);
        echo $exec;
    }
?>