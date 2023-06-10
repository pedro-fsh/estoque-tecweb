<?php

include("../config/banco.php");
session_start();

if (isset($_POST['enviar'])) {
    // Filtra e valida os dados
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);

    if (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
        echo "<script> 
                alert('E-mail inválido'); 
                window.location.href = '../index.html';
              </script>";
        die;
    }
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    // Busca o hash e o id correspondente ao e-mail
    $query = "SELECT senha, id FROM usuarios WHERE email = '$email'";
    try {
        $resposta = mysqli_query($conex, $query);
    } catch (Exception $e) {
        echo "<script> 
                alert('Erro na consulta ao banco de dados'); 
                window.location.href = '../index.html';
              </script>";
        die;
    }

    // Checa senha e e-mail
    if (mysqli_num_rows($resposta) > 0) {
        $linha = mysqli_fetch_assoc($resposta);
        if (password_verify($senha, $linha['senha'])) { // Inicia a sessão e redireciona para o perfil
            $_SESSION['id'] = $linha['id'];
            header("Location: ../pages/perfil.php");
        } else {
            echo "<script> 
                    alert('Senha incorreta'); 
                    window.location.href = '../index.html';
                  </script>";
            die;
        }
    } else {
        echo "<script> 
                alert('E-mail não cadastrado'); 
                window.location.href = '../index.html';
              </script>";
        die;
    }
} else {
    echo "<script> 
            alert('Sessão inválida! Retorne a página de login'); 
            window.location.href = '../pages/cadastro.html';
          </script>";
}
