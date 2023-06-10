<?php

include("../lib/carregar_dados.php");
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../lib/sessao_invalida.php");
}

$query = "SELECT * FROM produtos WHERE id=$id";
$resultado = mysqli_query($conex, $query);
$meusProdutos = mysqli_num_rows($resultado);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Permissions-Policy" content="interest-cohort=()">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/perfil.css">
</head>

<body>
    <div class="container-fluid min-vh-100 d-flex flex-column">
        <div class="row">
            <div class="col-md-2 text-center" id="barra-usuario">
                <h2 id="usuario"><?php echo $nome; ?></h2>
            </div>
            <div class="col" id="barra-perfil">
                <h2>Perfil</h2>
            </div>
        </div>
        <div class="row flex-grow-1" id="cont-barra">
            <div class="col-md-2 border text-center" id="barra-lateral">
                <a role="link" aria-disabled="true" id="perfil"><img src="https://img.icons8.com/ios-filled/50/null/contacts.png" height="38px" width="38px" /> Perfil</a>
                <a href="./inventario.php" id="inventario">📁 Inventário</a>
                <a id="inventario" href="registro.php">🗄️ Registro</a>
                <a href="../lib/deslogar.php" id="sair">⬅️ Sair</a>
            </div>
            <div class="col-md-10 border" id="conteudo">
                <img src="../img/usuario.png" alt="Um cachorro">
                <h3>Dados do Usuário</h3>
                <div id="campos">
                    <fieldset disabled>
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control mb-3" id="nome" placeholder="<?php echo $nome; ?>">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" placeholder="<?php echo $id; ?>">
                    </fieldset>
                    <div class="vr"></div>
                    <fieldset disabled>
                        <label for="email" class="form-label">E-mail</label>
                        <input type="text" name="email" class="form-control mb-3" id="email" placeholder="<?php echo $email; ?>">
                        <label for="" class="form-label">Produtos Cadastrados</label>
                        <input type="text" class="form-control" placeholder="<?php echo $meusProdutos; ?>" id="ex1">
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>