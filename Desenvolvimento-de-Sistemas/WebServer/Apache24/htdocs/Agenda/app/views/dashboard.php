<?php 
include_once("../controllers/dashboard.php"); 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Agenda</title>
    <link href="../../public/css/dashboard.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <nav class="menu">
        <h2>Agenda</h2>
        <a href="dashboard.php"><img class="format-img" src="../../public/img/casa.png" alt="">Dashboard</a>
        <a href="contatos.php"><img class="format-img" src="../../public/img/contato.png" alt="">Contatos</a>
        <a href="compromissos.php"><img class="format-img" src="../../public/img/calendario.png" alt="">Compromissos</a>
        <a href="perfil.php"><img class="format-img" src="../../public/img/user.png" alt="">Perfil</a>
        <a href="calendario.php"><img class="format-img" src="../../public/img/configuracao.png" alt="">Agenda</a>
        <a href="index.php"><img class="format-img" src="../../public/img/SAIR.png" alt="">Sair</a>
    </nav>

    <main class="conteudo">
        <div class="principais">
            <h1>Olá, <?= isset($_SESSION["nome"]) ? $_SESSION["nome"] : "Usuário"; ?>! 👋</h1>
            <p>Bem-vindo à sua agenda eletrônica.</p>

            <div class="cards">
                <div class="card">
                    <h3>Contatos</h3>
                    <h2><?= isset($totalContatos) ? $totalContatos : 0; ?></h2>
                    <p>Total de contatos</p>
                </div>
                
                <div class="card">
                    <h3>Compromissos</h3>
                    <h2><?= isset($totalCompromissos) ? $totalCompromissos : 0; ?></h2>
                    <p>Total de compromissos</p>
                </div>
            </div>

            <div class="card-grande">
                <div class="card2">
                    <h4>Próximos compromissos</h4>

                    <?php if(empty($proximosCompromissos)): ?>
                        <p>Nenhum compromisso agendado.</p>
                    <?php else: ?>
                        <?php foreach($proximosCompromissos as $comp): ?>
                            <div class="compromisso">
                                <div>
                                    <h5><?= htmlspecialchars($comp['titulo']); ?></h5>
                                    <p><?= date('d/m/Y', strtotime($comp['data_compromisso'])); ?> - <?= substr($comp['hora_compromisso'], 0, 5); ?></p>
                                </div>
                                <button class="reuniao">Compromisso</button>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <a href="compromissos.php">Ver todos</a>
                </div>

                <div class="card2">
                    <h4>Contatos recentes</h4>

                    <?php if(empty($contatosRecentes)): ?>
                        <p>Nenhum contato cadastrado.</p>
                    <?php else: ?>
                        <?php foreach($contatosRecentes as $contato): ?>
                            <div class="contato">
                                <img src="../../public/img/user.png" alt="Foto">
                                <div>
                                    <h5><?= htmlspecialchars($contato['nome']); ?></h5>
                                    <p><?= htmlspecialchars($contato['telefone']); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <a href="contatos.php">Ver todos</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>