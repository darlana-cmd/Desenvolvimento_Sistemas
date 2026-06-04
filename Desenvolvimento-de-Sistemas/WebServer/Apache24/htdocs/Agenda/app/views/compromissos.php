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
    <a href="#"><img class="format-img" src="../..//public/img/configuracao.png" alt="">Configuração</a>
    <a href="#"><img class="format-img" src="../..//public/img/SAIR.png" alt="">Sair</a>
    </aside>

    <main class="content">

        <div class="container">

            <div class="header">
                <h1>Compromissos</h1>

                <div class="top-actions">
                    <div class="search-box">
                        <input type="text" placeholder="Buscar compromissos...">
                    </div>
                <a href="/Agenda/./app/./views//cadastro_compromisso.php">
                    <button class="btn-new">
                        Novo Compromisso
                    </button>
                </div>
                </a>
            </div>

            <div class="tabs">
                <button class="active">Todos</button>
                <button>Pendentes</button>
                <button>Concluídos</button>
            </div>

            <div class="appointments">

                <div class="appointment">
                    <div class="date">
                        <span class="day">20</span>
                        <span class="month">MAI</span>
                    </div>

                    <div class="info">
                        <h3>Reunião com cliente</h3>
                        <p>09:00 - 10:00</p>
                    </div>

                    <span class="tag reunion">Reunião</span>

                    <div class="actions">
                        <button class="edit">✏</button>
                        <button class="delete">🗑</button>
                    </div>
                </div>

                <div class="appointment">
                    <div class="date">
                        <span class="day">21</span>
                        <span class="month">MAI</span>
                    </div>

                    <div class="info">
                        <h3>Dentista</h3>
                        <p>14:30 - 15:30</p>
                    </div>

                    <span class="tag personal">Pessoal</span>

                    <div class="actions">
                        <button class="edit">✏</button>
                        <button class="delete">🗑</button>
                    </div>
                </div>

                <div class="appointment">
                    <div class="date">
                        <span class="day">22</span>
                        <span class="month">MAI</span>
                    </div>

                    <div class="info">
                        <h3>Entrega do projeto</h3>
                        <p>17:00 - 18:00</p>
                    </div>

                    <span class="tag work">Trabalho</span>

                    <div class="actions">
                        <button class="edit">✏</button>
                        <button class="delete">🗑</button>
                    </div>
                </div>

                <div class="appointment">
                    <div class="date">
                        <span class="day">23</span>
                        <span class="month">MAI</span>
                    </div>

                    <div class="info">
                        <h3>Academia</h3>
                        <p>07:00 - 08:00</p>
                    </div>

                    <span class="tag health">Saúde</span>

                    <div class="actions">
                        <button class="edit">✏</button>
                        <button class="delete">🗑</button>
                    </div>
                </div>

            </div>

        </div>

    </main>

</body