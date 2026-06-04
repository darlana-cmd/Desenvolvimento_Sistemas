<?php
    session_name("Agenda");
    session_start();
    
    if(!isset($_SESSION["login"]))
    {
        echo '<script>
                    window.location.href="http://localhost:8080/Agenda";
                    </script>';
    }

 
        include_once("../models/Contato.php");

        $obj = new Contato();
        $resp = $obj->ListarTodosContatos();

        
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="../../public/css/contatos.css" rel="stylesheet" type="text/css" />
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

  <div class="caixa-principal">

  
    <div class="topo">
      <h2>Contatos</h2>
      <div class="meio-topo">
        <input type="text" class="campo-busca" placeholder="Buscar contatos...">
        <a href="cadastro_contato.php"><button class="btn-novo">+ Novo Contato</button></a>
      </div>
    </div>

    <table class="tabela">
      <thead>
        <tr>
          <th>imagem</th>
          <th>Nome</th>
          <th>Telefone</th>
          <th>E-mail</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
       <?php foreach($resp as $usuarios):?>
                <tr>

                  <td><img src="<?=$usuarios["url"];?>" class="img"/></td>
                    
                    <td><?= $usuarios["nome"]?></td>
                    <td><?= $usuarios["telefone"]?></td>
                    <td><?= $usuarios["email"]?></td>
                    <td><a href="editar_contato.php?var=<?=$usuarios["id_contatos"];?>" class=".btn-editar">Editar</a></td>
                    <td><a href="../controllers/excluir_contato.php?var=<?=$usuarios["id_contatos"];?>" class="btn-deletar">Excluir</a></td>

                </tr>
                    <?php endforeach?>
        
      </tbody>
    </table>

    <div class="paginas">
      <button class="seta">&lt;</button>
      <button class="num ativo">1</button>
      <button class="num">2</button>
      <button class="num">3</button>
      <button class="seta">&gt;</button>
    </div>

  </div>
</body>

</html>