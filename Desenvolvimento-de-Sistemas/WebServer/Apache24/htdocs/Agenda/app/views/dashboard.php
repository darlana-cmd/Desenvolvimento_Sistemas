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

        <a href="dashboard.php"><img class="format-img" src="../..//public/img/casa.png" alt="">Dashboard</a>
        <a href="contatos.php"><img class="format-img" src="../..//public/img/contato.png" alt="">Contatos</a>
        <a href="#"><img class="format-img" src="../..//public/img/calendario.png" alt="">Compromissos</a>
        <a href="perfil.php"><img class="format-img" src="../..//public/img/user.png" alt="">Perfil</a>
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
                    <img src="../../public/img/sino.png" alt="Sino">
                </div>

                <img class="foto-perfil" src="../../public/img/user.png" alt="Foto">
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
            <div class="card-grande">
                <div class="card2">
                    <h4>Próximos compromissos</h4>

                    <div class="compromisso">
                        <div>
                            <h5>Reunião com cliente</h5>
                            <p>20/05/2024 - 09:00</p>
                        </div>
                        <button class="reuniao">Reunião</button>
                    </div>

                    <div class="compromisso">
                        <div>
                            <h5>Dentista</h5>
                            <p>21/05/2024 - 14:30</p>
                        </div>
                        <button class="pessoal">Pessoal</button>
                    </div>

                    <div class="compromisso">
                        <div>
                            <h5>Entrega do projeto</h5>
                            <p>22/05/2024 - 17:00</p>
                        </div>
                        <button class="trabalho">Trabalho</button>
                    </div>

                    <a href="#">Ver todos</a>
                </div>
                <div class="card2">
                    <h4>Contatos recentes</h4>

                    <div class="contato">
                        <img src="img/perfil.png" alt="Foto">
                        <div>
                            <h5>Maria Silva</h5>
                            <p>(11) 90000-6666</p>
                        </div>
                    </div>

                    <div class="contato">
                        <img src="img/perfil.png" alt="Foto">
                        <div>
                            <h5>Carlos Souza</h5>
                            <p>(11) 98888-7777</p>
                        </div>
                    </div>

                    <div class="contato">
                        <img src="img/perfil.png" alt="Foto">
                        <div>
                            <h5>Ana Oliveira</h5>
                            <p>(11) 97777-6666</p>
                        </div>
                    </div>

                    <a href="#">Ver todos</a>
                </div>
            </div>
        </div>

    </main>

</body>

</html>