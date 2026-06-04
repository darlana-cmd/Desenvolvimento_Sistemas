<?php
    session_name("Agenda");
    session_start();
    
    if(!isset ($_SESSION["login"]))
    {
        echo '<script>
                    window.location.href="http://localhost:8080/Agenda";
                    </script>';
    }

        $id=$_GET["var"];
 
        include_once("../models/Contato.php");

        $obj = new Contato();
        $resp = $obj->ListarUmContato($id);



        
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
    <h1 class="titulo">Alterar Contato!</h1>
    <p class="subtitulo">Preencha os dados abaixo para salvar o contato na sua agenda.</p>

    <form class="formulario" action="../controllers/editar_contato.php" method="POST" enctype="multipart/form-data">
      
      <div class="campo-grupo">
        <label for="foto" class="etiqueta">Foto do contato</label>
        <input type="file" id="foto" name="arquivo" class="input-arquivo" />
      </div>

       <div class="campo-grupo">
        <input hidden="text" name="id" class="campo-texto" value="<?=$resp["id_contatos"];?>">
      </div>

      <div class="campo-grupo">
        <label for="nome" class="etiqueta">Nome completo</label>
        <input type="text" name="nome" class="campo-texto" value="<?=$resp["nome"];?>">
      </div>

      <div class="campo-grupo">
        <label for="email" class="etiqueta">E-mail</label>
        <input type="email" name="email" class="campo-texto" value="<?=$resp["email"];?>">
      </div>

      <div class="campo-grupo">
        <label for="telefone" class="etiqueta">Telefone</label>
        <input type="tel" name="tel" class="campo-texto" value="<?=$resp["telefone"];?>">
      </div>

      <button type="submit" class="botao-cadastrar">Salvar alteração</button>
      
    </form>
    
    <a href="contatos.php" class="link-voltar">Voltar para a agenda</a>
  </div>

</body>
</html>