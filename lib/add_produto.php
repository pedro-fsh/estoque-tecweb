<?php

include("../config/banco.php");
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../lib/sessao_invalida.php");
}

$meu_id = $_SESSION['id'];

if (isset($_POST['adicionar'])) {
    $cod = filter_input(INPUT_POST, 'cod', FILTER_SANITIZE_SPECIAL_CHARS);
    $item = filter_input(INPUT_POST, 'item', FILTER_SANITIZE_SPECIAL_CHARS);
    $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($quantidade < 1) {
        echo "<script> 
        alert('Quantidade não pode ser menor que 1'); 
        window.location.href = '../pages/inventario.php';
      </script>";
    }

    $query = "INSERT INTO produtos (codigo, item, quantidade, id) VALUES ('$cod', '$item', '$quantidade', '$meu_id')";
    
    $query2 = "INSERT INTO registros (codigo, id, qtde, tipo) VALUES ('$cod', '$meu_id', '$quantidade', '+')";

    try {
        mysqli_query($conex, $query);
        mysqli_query($conex, $query2);
        header("Location: ../pages/inventario.php");
    } catch (Exception $e) {
        echo "<script>
                alert('Erro ao adicionar o produto! Código ou item já existem.'); 
                window.location.href = '../pages/inventario.php';
              </script>";
        die;
    }
} else {
    header("Location: ../pages/inventario.php");
}
