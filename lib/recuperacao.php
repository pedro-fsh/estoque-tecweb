<?php

include("../config/banco.php");
session_start();


if (isset($_POST['enviar'])) {
  $res1 = filter_input(INPUT_POST, 'pergunta1', FILTER_SANITIZE_SPECIAL_CHARS);
  $res2 = filter_input(INPUT_POST, 'pergunta2', FILTER_SANITIZE_SPECIAL_CHARS);
  $res3 = filter_input(INPUT_POST, 'pergunta3', FILTER_SANITIZE_SPECIAL_CHARS);

  if (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
    echo "<script> 
            alert('E-mail inválido'); 
            window.location.href = '../pages/cadastro.html';
          </script>";
    die;
  }
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $_SESSION['email'] = $email;

  $query = "SELECT * FROM recuperacao WHERE email = '$email'";
    try {
      $resposta = mysqli_query($conex, $query);
      if (mysqli_num_rows($resposta) > 0) {
        $linha = mysqli_fetch_assoc($resposta);
        $email_banco = $linha['email'];
        $res1_banco = $linha['res1'];
        $res2_banco = $linha['res2'];
        $res3_banco = $linha['res3'];
    } else {
        echo "<script> 
            alert('E-mail não encontrado'); 
            window.location.href = '../index.html';
          </script>";
        die;
    }
  } catch (Exception $e){
    echo "<script> 
            alert('Erro na consulta ao banco de dados'); 
            window.location.href = '../index.html';
          </script>";
    die;
  }

  if($res1 != $res1_banco || $res2 != $res2_banco || $res3 != $res3_banco) {
    echo "<script> 
            alert('Respostas não conferem!'); 
            window.location.href = '../index.html';
          </script>";
  } else {
    header("Location: ../pages/nova_senha.php");
  }
}