<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Agenda</title>
    <link href="../../public/css/dashboard.css" rel="stylesheet" type="text/css"/>
</head>
<body>

    <nav class="menu">
        <h2>Agenda</h2>

        <a href="#"><img class="format-img" src="../..//public/img/casa.png" alt="">Dashboard</a>
        <a href="#"><img class="format-img" src="../..//public/img/contato.png" alt="">Contatos</a>
        <a href="#"><img class="format-img" src="../..//public/img/calendario.png" alt="">Compromissos</a>
        <a href="#"><img class="format-img" src="../..//public/img/user.png" alt="">Perfil</a>
        <a href="#"><img class="format-img" src="../..//public/img/configuracao.png" alt="">Configuração</a>
        <a href="#"><img class="format-img" src="../..//public/img/SAIR.png" alt="">Sair</a>
    </nav>


   <main class="conteudo">

    <div class="topo">
        <div class="caixa-busca">
            <span class="lupa">🔍</span>
            <input type="text" placeholder="Buscar contatos, compromissos...">
        </div>

        <div class="usuario">
            <div class="notificacao">
                <img src="caminho_do_sino.png" alt="Sino">
            </div>

            <img class="foto-perfil" src="caminho_da_foto.png" alt="Foto">
        </div>
    </div>

    <div class="principais">
        <h1>Olá, João! 👋</h1>
        <p>Bem-vindo à sua agenda eletrônica.</p>

        <div class="cards">
            <div class="card">
                <h3>Contatos</h3>
                <h2>128</h2>
                <p>Total de contatos</p>
            </div>

            <div class="card">
                <h3>Compromissos</h3>
                <h2>15</h2>
                <p>Próximos 7 dias</p>
            </div>

            <div class="card">
                <h3>Tarefas</h3>
                <h2>8</h2>
                <p>Pendentes</p>
            </div>

            <div class="card">
                <h3>Concluídos</h3>
                <h2>23</h2>
                <p>Este mês</p>
            </div>
        </div>
    </div>

</main>

</body>
</html>
