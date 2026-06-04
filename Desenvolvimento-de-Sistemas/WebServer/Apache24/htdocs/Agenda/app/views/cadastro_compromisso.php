<?php
session_name("Agenda");
session_start();

if (!isset($_SESSION["login"])) {
    echo '<script>
                    window.location.href="http://localhost:8080/Agenda";
                    </script>';
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Compromisso</title>
    <link href="../..//public//css//cadastro_compromisso.css" rel="stylesheet" type="text/css" />
</head>

<body>

    <div class="container">

        <a href="#" class="voltar">← Voltar</a>

        <h1>Novo Compromisso</h1>

        <div class="conteudo">

            <!-- Formulário -->
            <form class="card formulario" action="../controllers/cadastrar_compromisso.php" method="POST">>

                <div class="campo">
                    <label for="titulo">Título</label>
                    <input
                        type="text"
                        name="titulo"
                        placeholder="Digite o título do compromisso"
                        required>
                </div>

                <div class="campo">
                    <label for="descricao">Descrição</label>
                    <textarea
                        name="descricao"
                        placeholder="Detalhes sobre o compromisso..."></textarea>
                </div>

                <div class="linha">

                    <div class="campo">
                        <label for="data_compromisso">Data:</label>
                        <input type="date" id="data_compromisso" name="data_compromisso" required>
                    </div>

                    <div class="campo">
                        <label for="hora_compromisso">Hora:</label>
                        <input type="time" id="hora_compromisso" name="hora_compromisso" required>
                    </div>

                </div>

                <div class="botoes">
                    <button type="reset" class="cancelar">
                        Cancelar
                    </button>

                    <button type="submit" class="salvar">
                        Salvar Compromisso
                    </button>
                </div>

            </form>



            </aside>

        </div>

    </div>

</body>

</html>