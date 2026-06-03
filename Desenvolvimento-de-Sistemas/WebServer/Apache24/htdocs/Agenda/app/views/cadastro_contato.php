<?php
    session_name("Agenda");
    session_start();
    
    if(!isset ($_SESSION["login"]))
    {
        echo '<script>
                    window.location.href="http://localhost:8080/painel";
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
  <title>Cadastrar Contato</title>
  <link href="../../public/css/cadastro_contato.css" rel="stylesheet" type="text/css" />
</head>
<body>

  <div class="container">
    <h1 class="titulo">Criar contato!</h1>
    <p class="subtitulo">Preencha os dados abaixo para salvar o contato na sua agenda.</p>

    <form class="formulario" action="../controllers/cadastrar_contato_controllers.php" method="POST">
      
      <div class="campo-grupo">
        <label for="foto" class="etiqueta">Foto do contato</label>
        <input type="file" id="foto" class="input-arquivo" accept="image/*">
      </div>

      <div class="campo-grupo">
        <label for="nome" class="etiqueta">Nome completo</label>
        <input type="text" name="nome" class="campo-texto" placeholder="Digite o nome completo">
      </div>

      <div class="campo-grupo">
        <label for="email" class="etiqueta">E-mail</label>
        <input type="email" name="email" class="campo-texto" placeholder="exemplo@email.com">
      </div>

      <div class="campo-grupo">
        <label for="telefone" class="etiqueta">Telefone</label>
        <input type="tel" name="telefone" class="campo-texto" placeholder="(00) 00000-0000">
      </div>

      <button type="submit" class="botao-cadastrar">Cadastrar Contato</button>
      
    </form>
    
    <a href="contatos.php" class="link-voltar">Voltar para a agenda</a>
  </div>

</body>
</html>