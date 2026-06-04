<?php
if (session_status() === PHP_SESSION_NONE) {
    session_name("Agenda");
    session_start();
}

// Proteção da página
if(!isset($_SESSION["login"])) {
    header("Location: http://localhost:8080/Agenda");
    exit();
}

include_once("../models/Compromisso.php");

$id_usuario = $_SESSION["id_usuario"] ?? 1;

$obj = new Compromisso();
// Busca a lista de compromissos real do usuário logado
$compromissos = $obj->ListarCompromissosDoUsuario($id_usuario);

// Primeiro dia do mês atual
$primeiroDiaMes = date("Y-m-01");

// Dia da semana do primeiro dia (1 = Segunda ... 7 = Domingo)
$diaSemanaInicio = date("N", strtotime($primeiroDiaMes));

// Quantidade de dias do mês atual
$totalDiasMes = date("t");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calendário</title>
    <link href="../../public/css/calendario.css" rel="stylesheet" type="text/css" />
</head>
<body>

  <nav class="menu">
    <h2>Agenda</h2>
   <a href="dashboard.php"><img class="format-img" src="../..//public/img/casa.png" alt="">Dashboard</a>
    <a href="contatos.php"><img class="format-img" src="../..//public/img/contato.png" alt="">Contatos</a>
    <a href="compromissos.php"><img class="format-img" src="../..//public/img/calendario.png" alt="">Compromissos</a>
    <a href="perfil.php"><img class="format-img" src="../..//public/img/user.png" alt="">Perfil</a>
    <a href="calendario.php"><img class="format-img" src="../..//public/img/configuracao.png" alt="">Agenda</a>
    <a href="index.php"><img class="format-img" src="../..//public/img/SAIR.png" alt="">Sair</a>
  </nav>

  <div class="conteudo-principal">
    <h1>Calendário de Compromissos</h1>
    
    <div class="calendario">
        <div class="cabecalho">Seg</div>
        <div class="cabecalho">Ter</div>
        <div class="cabecalho">Qua</div>
        <div class="cabecalho">Qui</div>
        <div class="cabecalho">Sex</div>
        <div class="cabecalho">Sáb</div>
        <div class="cabecalho">Dom</div>

        <?php for($i = 1; $i < $diaSemanaInicio; $i++): ?>
            <div class="dia empty"></div>
        <?php endfor; ?>

        <?php for($dia = 1; $dia <= $totalDiasMes; $dia++): ?>
            <div class="dia">
                <div class="numero"><?= $dia ?></div>
                
                <?php if (!empty($compromissos)): ?>
                    <?php foreach ($compromissos as $compromisso): ?>
                        <?php $diaCompromisso = date("j", strtotime($compromisso["data_compromisso"])); ?>
                        <?php if ($diaCompromisso == $dia): ?>
                            <div class="evento">
                                <span><?= date('H:i', strtotime($compromisso["hora_compromisso"])) ?></span>
                                <strong><?= htmlspecialchars($compromisso["titulo"]) ?></strong>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endfor; ?>
    </div>
  </div>

</body>
</html>