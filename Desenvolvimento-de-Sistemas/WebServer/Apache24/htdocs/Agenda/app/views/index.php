<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Agenda</title>
    <link href="../../public/css/login.css" rel="stylesheet" type="text/css"/>
</head>
<body>

    <div class="login-img">
        <img src="../../public/img/login-foto-usuario.png" alt="Usuário">

        <h1>Agenda<br>Eletrônica</h1>

        <p>
            Sua vida organizada, seus contatos
            sempre à mão.
        </p>
    </div>

    <div class="login">

        <div class="meio">

            <h2>Bem-vindo de volta!</h2>

            <p class="sub">
                Entre com suas credenciais para acessar sua conta
            </p>

            <form action="../controllers/login.php" method="POST">

                <div class="campo">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="seu@email.com">
                </div>

                <div class="campo">
                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" placeholder="Digite sua senha">
                </div>

                <div class="opcoes">
                    <label>
                        <input type="checkbox" name="lembrar">
                        Lembrar-me
                    </label>

                    <a href="#">Esqueceu sua senha?</a>
                </div>

                <button type="submit">Entrar</button>

                <p class="cadastro">
                    Não tem uma conta?
                    <a href="cadastro.php">Cadastre-se</a>
                </p>

            </form>

        </div>

    </div>

</body>
</html>