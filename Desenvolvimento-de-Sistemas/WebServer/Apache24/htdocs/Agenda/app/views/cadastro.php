<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Eletrônica - Criar Conta</title>
    <link href="../../public/css/cadastro.css" rel="stylesheet" type="text/css"/>
</head>
<body>


        <div class="form-side">
            <div class="form-card">
                <h2>Crie sua conta!</h2>
                <p class="subtitle">Preencha os dados abaixo para se cadastrar e começar a usar.</p>

                <form action="../controllers/cadastrar_usuario.php" method="POST">
                    <div class="input-group">
                        <label for="nome">Nome completo</label>
                        <input type="text" name="nome" placeholder="Digite seu nome completo" required>
                    </div>

                    <div class="input-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" placeholder="seu@email.com" required>
                    </div>

                    <div class="input-group">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Crie uma senha" required>
                        <span class="helper-text">Mínimo de 6 caracteres</span>
                    </div>

                    <div class="input-group">
                        <label for="confirmar-senha">Confirmar senha</label>
                        <input type="password" id="confirmar-senha" placeholder="Confirme sua senha" required>
                    </div>

                    <button type="submit" class="btn-submit">Cadastrar</button>
                </form>

                <p class="login-link">Já tem uma conta? <a href="index.php">Entrar</a></p>
            </div>
        </div>
    </div>

</body>
</html>