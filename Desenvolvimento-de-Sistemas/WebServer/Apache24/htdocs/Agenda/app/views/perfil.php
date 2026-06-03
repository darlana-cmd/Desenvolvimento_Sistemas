<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../../public/css/perfil.css" rel="stylesheet" type="text/css" />
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
<div class="perfil-container">

    <h1>Meu Perfil</h1>

    <div class="tabs">
        <a href="#" class="active">Informações Pessoais</a>
        <a href="#">Alterar Senha</a>
        <a href="#">Preferências</a>
    </div>

    <div class="perfil-content">

        <div class="perfil-card">
            <img src="../../public/img/user.png" alt="Foto de perfil">

            <h2>João da Silva</h2>
            <p>joao@email.com</p>

             <img class="foto-perfil" src="<?=$resp["url"];?>" />
                <h3><?=$resp["nome"];?></h3>
                <br />
                <p><?=$resp["email"];?></p>
                <br />
                <input id="foto" name="arquivo" type="file" hidden />
                <label  for="foto">Alterar foto</label>
        </div>

        <div class="perfil-form">
            <label>Nome completo</label>
            <input type="text" value="">

            <label>E-mail</label>
            <input type="email" value="">

            <label>Telefone</label>
            <input type="text" value="">

            <label>Descrição pessoal</label>
            <textarea rows="5"></textarea>

            <button class="salvar">Salvar alterações</button>
        </div>

    </div>

</div>
</body>
</html>