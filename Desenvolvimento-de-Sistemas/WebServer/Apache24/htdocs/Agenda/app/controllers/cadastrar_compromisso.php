<?php
if (session_status() === PHP_SESSION_NONE) {
    session_name("Agenda");
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once("../models/Compromisso.php");

    $titulo = $_POST["titulo"] ?? "";
    $data_compromisso = $_POST["data_compromisso"] ?? "";
    $hora_compromisso = $_POST["hora_compromisso"] ?? "";
    $local_compromisso = $_POST["local_compromisso"] ?? "";
    $descricao = $_POST["descricao"] ?? "";
    $id_usuario = $_SESSION["id_usuario"] ?? 1;

    // VALIDAÇÃO CRÍTICA: Impede que strings vazias quebrem o banco de dados
    if (empty($titulo) || empty($data_compromisso) || empty($hora_compromisso)) {
        echo '<script>
            alert("Os campos Título, Data e Hora são obrigatórios!");
            window.location.href="http://localhost:8080/Agenda/app/views/cadastro_compromisso.php";
        </script>';
        exit();
    }

    $obj = new Compromisso();
    $resp = $obj->CadastrarCompromisso($titulo, $data_compromisso, $hora_compromisso, $local_compromisso, $descricao, $id_usuario);

    if ($resp == true) {
        echo '<script>
            alert("Compromisso agendado com sucesso!");
            window.location.href="http://localhost:8080/Agenda/app/views/compromissos.php";
        </script>';
    } else {
        echo '<script>
            alert("Não foi possível agendar o compromisso.");
            window.location.href="http://localhost:8080/Agenda/app/views/cadastro_compromisso.php";
        </script>';
    }
} else {
    header("Location: http://localhost:8080/Agenda/app/views/cadastro_compromisso.php");
    exit();
}
?>