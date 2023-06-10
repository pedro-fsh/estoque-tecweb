<?php

include("../config/banco.php");
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../lib/sessao_invalida.php");
}

// Edituar um produto
if (isset($_POST['editar'])) {
    $idUsuario = $_SESSION['id'];
    $dadosAlterados = explode(';', $_POST['editar']);
    $idProd = $dadosAlterados[0];
    $codProd = $dadosAlterados[1];
    $quantidadeProd = $dadosAlterados[2];

    if ($quantidadeProd < 1) {
        echo "<script>
         alert('A quantidade do produto não pode ser menor que 1');
         window.location.href = '../pages/inventario.php';
         </script>";
        die;
    }

    $query = "UPDATE produtos 
              SET quantidade=$quantidadeProd
              WHERE codigo=$codProd";
    $query2 = "INSERT INTO registros (codigo, id, qtde, tipo) 
               VALUES ('$codProd', '$idUsuario', '$quantidadeProd', '#')";

    try {
        mysqli_query($conex, $query);
        mysqli_query($conex, $query2);
        header("Location: ../pages/inventario.php");
    } catch (Exception $e) {
        echo "<script>
                alert('Erro ao editar o produto!'); 
                window.location.href = '../pages/inventario.php';
              </script>";
        die;
    }
  // Apagar um produto  
} elseif (isset($_POST['apagar'])) {
    $dadosAlterados = explode(';', $_POST['apagar']);
    $idProd = $dadosAlterados[1];
    $codProd = $dadosAlterados[0];
    $quantidadeProd = $dadosAlterados[2];
    $idUsuario = $_SESSION['id'];

    $query = "DELETE FROM produtos WHERE codigo = '$codProd'";
    $query2 = "INSERT INTO registros (codigo, id, qtde, tipo) 
               VALUES ('$codProd', '$idUsuario', '$quantidadeProd', '-')";

    try {
        mysqli_query($conex, $query);
        mysqli_query($conex, $query2);
        header("Location: ../pages/inventario.php");
    } catch (Exception $e) {
        echo "<script>
                alert('Erro ao apagar o produto!'); 
                window.location.href = '../pages/inventario.php';
              </script>";
        die;
    }
} else {
    header("Location: ../pages/inventario.php");
}
