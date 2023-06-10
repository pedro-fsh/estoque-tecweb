<?php

include("../config/banco.php");
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: ../lib/sessao_invalida.php");
}

if(isset($_POST['enviar'])) {
  $res1 = filter_input(INPUT_POST, 'pergunta1', FILTER_SANITIZE_SPECIAL_CHARS);
  $res2 = filter_input(INPUT_POST, 'pergunta2', FILTER_SANITIZE_SPECIAL_CHARS);
  $res3 = filter_input(INPUT_POST, 'pergunta3', FILTER_SANITIZE_SPECIAL_CHARS);
  $email = $_SESSION['email'];

  $query = "INSERT INTO recuperacao (email, res1, res2, res3) VALUES ('$email', '$res1', '$res2', '$res3')";

  try {
    mysqli_query($conex, $query);
    header('Location: ../pages/perfil.php');
  } catch (Exception $e){
    '<script>
            alert("Erro na conexão com o banco de dados. As respostas não foram salvas e você não poderá recuperar sua senha. Entre em contato com um administrador.");
            window.location.href = "../pages/perfil.php";
          </script>';
  }
}