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
    <title>Inventário</title>
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
                <h2>Inventário</h2>
                <h3><button class="btn btn-outline-success" id="addProduto" data-bs-toggle="modal" data-bs-target="#modalAdd">Adicionar Produto</button></h3>
            </div>
        </div>
        <div class="row flex-grow-1" id="cont-barra">
            <div class="col-md-2 border text-center" id="barra-lateral">
                <a href="./perfil.php" id="perfil"><img src="https://img.icons8.com/ios-filled/50/null/contacts.png" height="38px" width="38px" /> Perfil</a>
                <a role="link" aria-disabled="true" id="inventario">📁 Inventário</a>
                <a id="inventario" href="registro.php">🗄️ Registro</a>
                <a href="../lib/deslogar.php" id="sair">⬅️ Sair</a>
            </div>
            <div class="col-md-10 border" id="conteudo">
                <input class="form-control me-2 w-75" type="text" placeholder="Pesquisar produto" id="pesquisa">

                <div class="table-responsive w-75" id="tabela">
                    <table class="table table-hover" id="tabela">
                        <caption>Tabela de produtos</caption>
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Item</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">ID</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            $query = "SELECT * FROM produtos";
                            $resultado = mysqli_query($conex, $query);
                            while ($linha = mysqli_fetch_assoc($resultado)) { ?>
                                <tr class="tlinha">
                                    <td><?php echo $linha['codigo'] ?></td>
                                    <td class="item"><?php echo $linha['item'] ?></td>
                                    <td><?php echo $linha['quantidade'] ?></td>
                                    <td><?php echo $linha['id'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal adicionar produto -->
    <div class="modal fade" id="modalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Adicionar Produto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addProdForm" action="../lib/add_produto.php" method="post">
                        <label for="cod" class="form-label">Código</label>
                        <input type="text" name="cod" class="form-control mb-3">
                        <label for="item" class="form-label">Item</label>
                        <input type="text" name="item" class="form-control mb-3">
                        <label for="quantidade" class="form-label">Quantidade</label>
                        <input type="text" name="quantidade" class="form-control mb-3">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" name="adicionar" form="addProdForm">Adicionar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Editar item-->
    <div class="modal fade" id="modalItem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tituloModalItem" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tituloModalItem">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="corpoModalItem">
                    ...
                </div>
                <div class="modal-footer">
                    <form action="../lib/editar_produto.php" method="post">
                        <button type="submit" class="btn btn-danger" name="apagar" value="" id="botaoApagarProduto">Apagar Produto</button>
                        <button type="submit" class="btn btn-success" name="editar" value="" id="botaoEditarProduto">Editar Produto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalItem" style="display: none;" id="botaoModal">
        Launch static backdrop modal
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../js/filtrar.js"></script>
    <script src="../js/editar_produto.js"></script>
</body>

</html>