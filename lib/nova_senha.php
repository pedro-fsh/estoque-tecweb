<?php

include("../config/banco.php");
session_start();

if(isset($_POST['enviar'])) {
  $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
  $confirma = filter_input(INPUT_POST, 'confirma', FILTER_SANITIZE_SPECIAL_CHARS);

  if($senha == null || $confirma == null) {
    echo '<script>
            alert("Os campos não podem estar vazios!");
            window.location.href = "../pages/recuperacao.html";
          </script>';
  }
  
  $email = $_SESSION['email'];
  if($senha == $confirma) {
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    $query = "UPDATE usuarios SET senha = '$hash' WHERE email = '$email'";
    try {
      mysqli_query($conex, $query);
      echo '<script>
              alert("Senha alterada com sucesso!");
              window.location.href = "../index.html";
            </script>';
    } catch (Exception $e){
      echo '<script>
            alert("Erro na conexão com o banco de dados");
            window.location.href = "../pages/recuperacao.html";
          </script>';
    }
  } else {
    echo '<script>
            alert("As senhas não conferem");
            window.location.href = "../pages/recuperacao.html";
          </script>';
  }
}