<?php

include("../lib/carregar_dados.php");
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
  <title>Registro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="../style/inventario.css">
</head>
<body>
<div class="container-fluid min-vh-100 d-flex flex-column">
        <div class="row">
            <div class="col-md-2 text-center" id="barra-usuario">
                <h2 id="usuario"><?php echo $nome; ?></h2>
            </div>
            <div class="col d-flex justify-content-between" id="barra-perfil">
                <h2>Registro</h2>
            </div>
        </div>
        <div class="row flex-grow-1" id="cont-barra">
            <div class="col-md-2 border text-center" id="barra-lateral">
                <a href="./perfil.php" id="perfil"><img src="https://img.icons8.com/ios-filled/50/null/contacts.png" height="38px" width="38px" /> Perfil</a>
                <a id="inventario" href="inventario.php">📁 Inventário</a>
                <a role="link" aria-disabled="true" id="inventario">🗄️ Registro</a>
                <a href="../lib/deslogar.php" id="sair">⬅️ Sair</a>
            </div>
            <div class="col-md-10 border" id="conteudo">
                <input class="form-control me-2 w-75" type="text" placeholder="Pesquisar registro" id="pesquisa">

                <div class="table-responsive w-75" id="tabela">
                    <table class="table table-hover" id="tabela">
                        <caption>Tabela de registros</caption>
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">ID</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Data</th>
                                <th scope="col">Tipo</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            $query = "SELECT * FROM registros";
                            $resultado = mysqli_query($conex, $query);
                            while ($linha = mysqli_fetch_assoc($resultado)) { ?>
                                <tr class="tlinha">
                                    <td><?php echo $linha['codigo'] ?></td>
                                    <td><?php echo $linha['id'] ?></td>
                                    <td><?php echo $linha['qtde'] ?></td>
                                    <td><?php echo $linha['data'] ?></td>
                                    <td class="tipo"><?php echo $linha['tipo'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="../js/filtrar_registro.js"></script>
  <script src="../js/editar_produto.js"></script>
</body>
</html>