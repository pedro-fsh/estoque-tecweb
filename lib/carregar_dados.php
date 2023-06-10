<?php

include("../config/banco.php");
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../lib/sessao_invalida.php");
}

$id = $_SESSION['id'];
$query = "SELECT nome, email FROM usuarios WHERE id = '$id'";

try {
    $resposta = mysqli_query($conex, $query);
    if (mysqli_num_rows($resposta) > 0) {
        $linha = mysqli_fetch_assoc($resposta);
        $nome = $linha['nome'];
        $email = $linha['email'];
    } else {
        echo "<script> 
            alert('Erro na consulta ao banco de dados'); 
            window.location.href = '../index.html';
          </script>";
        die;
    }
} catch (Exception $e) {
    echo "<script> 
            alert('Erro na consulta ao banco de dados'); 
            window.location.href = '../index.html';
          </script>";
    die;
}
