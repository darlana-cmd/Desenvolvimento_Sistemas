<?php
if (session_status() === PHP_SESSION_NONE) {
    session_name("Agenda");
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once("../models/Contato.php");

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $ativo = true; // Ativo por padrão

    // Resgata o ID do usuário logado na sessão (usa 1 se não encontrar)
    $id_usuario = $_SESSION["id_usuario"] ?? 1;

    $obj = new Contato();
    
    // CORREÇÃO: Passando as variáveis na ordem exata que a Model espera receber
    $resp = $obj->CadastrarContato($nome, $email, $telefone, $ativo, $id_usuario);

    if($resp == TRUE) {
        echo '<script>
            alert("Contato cadastrado com sucesso!");
            window.location.href="http://localhost:8080/Agenda/app/views/contatos.php";
        </script>';
    } else {
        echo '<script>
            alert("Não foi possível cadastrar o contato");
            window.location.href="http://localhost:8080/Agenda/app/views/cadastro_contato.php";
        </script>';
    }
}
?>