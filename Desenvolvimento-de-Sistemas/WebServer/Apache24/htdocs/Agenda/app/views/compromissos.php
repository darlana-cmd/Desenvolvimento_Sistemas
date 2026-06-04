<?php

if (session_status() === PHP_SESSION_NONE) {
    session_name("Agenda");
    session_start();
}

// Proteção da página: garante que está logado
if (!isset($_SESSION["login"])) {
    header("Location: http://localhost:8080/Agenda");
    exit();
}

// CORREÇÃO: Garanta que o caminho aponta corretamente subindo um nível e acessando models
include_once __DIR__ . "/../models/Compromisso.php";

$id_usuario = $_SESSION["id_usuario"] ?? 1;

$obj = new Compromisso();
// Busca a lista real vinda do banco de dados
$listaCompromissos = $obj->ListarCompromissosDoUsuario($id_usuario);

// Array auxiliar para converter o número do mês em texto descritivo curto
$meses = [
    '01' => 'JAN',
    '02' => 'FEV',
    '03' => 'MAR',
    '04' => 'ABR',
    '05' => 'MAI',
    '06' => 'JUN',
    '07' => 'JUL',
    '08' => 'AGO',
    '09' => 'SET',
    '10' => 'OUT',
    '11' => 'NOV',
    '12' => 'DEZ'
];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compromissos</title>
    <link href="../../public/css/compromisso.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <aside class="menu">
        <h2>Agenda</h2>
        <a href="dashboard.php"><img class="format-img" src="../..//public/img/casa.png" alt="">Dashboard</a>
        <a href="contatos.php"><img class="format-img" src="../..//public/img/contato.png" alt="">Contatos</a>
        <a href="compromissos.php"><img class="format-img" src="../..//public/img/calendario.png" alt="">Compromissos</a>
        <a href="perfil.php"><img class="format-img" src="../..//public/img/user.png" alt="">Perfil</a>
        <a href="calendario.php"><img class="format-img" src="../..//public/img/configuracao.png" alt="">Agenda</a>
        <a href="index.php"><img class="format-img" src="../..//public/img/SAIR.png" alt="">Sair</a>
    </aside>

    <main class="content">
        <div class="container">
            <div class="header">
                <h1>Compromissos</h1>
                <div class="top-actions">
                    <div class="search-box">
                        <input type="text" placeholder="Buscar compromissos...">
                    </div>
                    <a href="cadastro_compromisso.php">
                        <button class="btn-new">Novo Compromisso</button>
                    </a>
                </div>
            </div>

            <div class="tabs">
                <button class="active">Todos</button>
                <button>Pendentes</button>
                <button>Concluídos</button>
            </div>

            <div class="appointments">
                <?php
                if (!empty($listaCompromissos)):
                    foreach ($listaCompromissos as $comp):
                        $time = strtotime($comp['data_compromisso']);
                        $dia = date('d', $time);
                        $numMes = date('m', $time);
                        $txtMes = $meses[$numMes] ?? 'MAI';
                        $hora = date('H:i', strtotime($comp['hora_compromisso']));
                ?>
                        <div class="appointment">
                            <div class="date">
                                <span class="day"><?= $dia ?></span>
                                <span class="month"><?= $txtMes ?></span>
                            </div>

                            <div class="info">
                                <h3><?= htmlspecialchars($comp['titulo']) ?></h3>
                                <p><?= $hora ?> <?= !empty($comp['local_compromisso']) ? ' - ' . htmlspecialchars($comp['local_compromisso']) : '' ?></p>
                            </div>

                            <span class="tag reunion">Agendado</span>

                            <div class="actions">
                                <button class="edit">✏</button>
                                <a href="../controllers/excluir_compromisso.php?id=<?= $comp['id_compromisso']; ?>" class="btn-deletar">
                                    <button class="delete">🗑</button>
                                </a>
                            </div>
                        </div>
                    <?php
                    endforeach; // Finaliza o loop dos itens existentes
                else: // Entra aqui apenas se a lista vier completamente vazia do banco
                    ?>
                    <div class="appointment" style="justify-content: center; padding: 20px; color: #777;">
                        <p>Nenhum compromisso agendado.</p>
                    </div>
                <?php
                endif; // Finaliza a estrutura condicional por completo
                ?>
            </div>
        </div>
    </main>

</body>

</html>