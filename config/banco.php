<?php

$server = "localhost";
$user = "root";
$senha = "";
$nomeBanco = "estoque";

try {
    $conex = mysqli_connect($server, $user, $senha, $nomeBanco);
} catch (Exception $e) {
    echo "<script> 
            alert('Erro na conexão com o banco de dados');
            window.location.href = '../index.html'; 
          </script>";
}
