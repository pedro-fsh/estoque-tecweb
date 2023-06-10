<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="../img/icone.png">
</head>

<body>
    <div class="container">
        <form action="../lib/nova_senha.php" class="formulario-login" id="formulario-login" method="post">
            <h2><img src="../img/icone.png" alt="Uma caixa"></h2>
            <label for="senha">Insira sua nova senha</label>
            <input type="password" name="senha" class="campo" placeholder="🔒 Senha">
            <input type="password" name="confirma" class="campo" placeholder="🔒 Confirmar Senha">
            <input type="submit" name="enviar" class="enviar" value="Alterar sua senha">
        </form>
    </div>
</body>

</html>