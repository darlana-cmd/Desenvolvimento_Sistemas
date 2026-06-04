<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include_once("../models/Compromisso.php");

    $titulo = $_POST["titulo"];
    $data = $_POST["data"];
    $hora = $_POST["hora"];
    $local = $_POST["local"];
    $descricao = $_POST["descricao"];

    $obj = new Compromisso();
    $obj->CadastrarCompromisso($titulo, $data, $hora, $local, $descricao);
}
