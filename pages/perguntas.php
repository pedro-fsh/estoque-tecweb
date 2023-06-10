<?php

session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../lib/sessao_invalida.php");
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" href="../img/icone.png">
    <style>
        label {
            margin-top: 8px;
            margin-bottom: 0px;
            margin-right: auto;
            margin-left: 22px;
        }
    </style>
</head>

<body>
    <div class="container" style="height: 680px; width: 550px;">
        <form action="../lib/perguntas_banco.php" class="formulario-perguntas" method="post">
            <h2><img src="../img/icone.png" alt="Uma caixa"></h2>
            <h3>Responda as perguntas abaixo</h3>
            <label for="pergunta1">Qual a sua comida preferida?</label>
            <input type="text" name="pergunta1" class="campo" placeholder="Resposta 1" style="margin: 10px auto;">   
            <label for="pergunta2">Qual o nome do meio da sua mãe?</label>
            <input type="text" name="pergunta2" class="campo" placeholder="Resposta 2" style="margin: 10px auto;">
            <label for="pergunta3">Qual o nome do seu tio favorito?</label>
            <input type="text" name="pergunta3" class="campo" placeholder="Resposta 3" style="margin: 10px auto;">

            <input type="submit" name="enviar" class="enviar" value="Enviar" style="margin-top: 20px;">
        </form>
    </div>
</body>

</html>