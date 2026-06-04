
  <?php
    session_name("Agenda");
    session_start();
    
    if(!isset($_SESSION["login"]))
    {
        echo '<script>
                    window.location.href="http://localhost:8080/Agenda/app/views";
                    </script>';
    }

 
        include_once("../models/User.php");

        $obj = new User();
        $resp = $obj->ListarUmUsuario($_SESSION["id"]);

        
?>  


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
        <a href="compromissos.php"><img class="format-img" src="../..//public/img/calendario.png" alt="">Compromissos</a>
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
 
    <form action="../controllers/editar_perfil.php" method="POST" enctype="multipart/form-data">
    <div class="perfil-content">
       

        <div class="perfil-card">
            

             <img src="<?=$resp["url"];?>" />
                <h2><?=$resp["nome"];?></h2>
                <br />
                <p><?=$resp["email"];?></p>
                <input id="foto" name="arquivo" type="file" hidden />
                <label  for="foto">Alterar foto</label>
        </div>

        <div class="perfil-form">
            <label>Nome completo</label>
            <input type="text" name="nome" value="<?=$resp["nome"];?>">

            <label>E-mail</label>
            <input type="email" name="email" value="<?=$resp["email"];?>">

            <label>Telefone</label>
            <input type="text" name="tel" value="<?=$resp["telefone"];?>">

            <label>Descrição pessoal</label>
            <textarea rows="5" name="descricao"><?=$resp["descricao"];?></textarea>

            <button class="salvar">Salvar alterações</button>
        </div>
        
    </div>
</form>
</div>
</body>
</html>