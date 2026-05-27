<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Agenda</title>
    <link href="../../public/css/login.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class=login-img>
        <img src="../../public/img/login-foto-usuario.png" alt="" />
        <h1>Agenda <br>Eletrônico</h1>
        <p>Sua vida organizada, seus contatos <br> sempre à mão.</p>
    </div>

    <div class=login>

        <div class="meio">
            <form action="">
            <table class="tabela-login">
                <tr>
                    <td >
                        <h2>Bem-vindo de volta!</h2>
                        <p>Entre com suas credenciais para acessar sua conta</p>
                    </td>
                </tr>
                <tr>
                    <td >
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="seu@email.com">
                    </td>
                </tr>
                <tr>
                    <td >
                        <label for="senha">Senha</label>
                        <input type="password" id="senha" name="senha" placeholder="Digite sua senha">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label >
                            <input type="checkbox" value="1" name="lembrar"> Lembrar-me
                        </label>
                    </td>
                    <td >
                        <a href="">Esqueceu sua senha?</a>
                    </td>
                </tr>
                <tr>
                    <td >
                        <button type="submit">Entrar</button>
                    </td>
                </tr>
                <tr>
                    <td >
                        <p >Não tem uma conta? <a href="">Cadastre-se</a></p>
                    </td>
                </tr>
            </table>
</form>

        </div>
    </div>

</body>

</html>