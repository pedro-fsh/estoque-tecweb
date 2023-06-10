<?php

include("../config/banco.php");
session_start();

if (isset($_POST['enviar'])) { // Se o formulário foi enviado
    // Valida e limpa as entradas
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
    $confirma = filter_input(INPUT_POST, 'confirma', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($senha != $confirma) { // Senhas não conferem
        echo "<script> 
                alert('Senhas não coincidem'); 
                window.location.href = '../pages/cadastro.html';
              </script>";
        die;
    } elseif (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) { // E-mail inválido
        echo "<script> 
                alert('E-mail inválido'); 
                window.location.href = '../pages/cadastro.html';
              </script>";
        die;
    } elseif (empty($nome) || empty($senha) || empty($confirma)) { // Campos vazios
        echo "<script> 
                alert('Campo vazio'); 
                window.location.href = '../pages/cadastro.html';
              </script>";
        die;
    }

    // Limpa o e-mail e cria o hash da senha
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $hash = password_hash($senha, PASSWORD_DEFAULT);

    // Cria a query para inserir os dados do usuário no banco de dados
    $query = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$hash')";

    // Tenta inserir os dados
    try {
        mysqli_query($conex, $query);
    } catch (Exception $e) {
        echo "<script>
                alert('E-mail já cadastrado'); 
                window.location.href = '../pages/cadastro.html';
              </script>";
        die;
    }

    // Recebe o ID e inicia a sessão
    $query = "SELECT id FROM usuarios WHERE email = '$email'";
    try {
        $resposta = mysqli_query($conex, $query);
        $linha = mysqli_fetch_assoc($resposta);
        $_SESSION['id'] = $linha['id'];
        $_SESSION['email'] = $email;
        header('Location: ../pages/perguntas.php');
    } catch (Exception $e) {
        echo "<script> 
                alert('Erro no início da sessão.'); 
                window.location.href = '../index.html';
              </script>";
        die;
    }
} else {
    echo "<script> 
            alert('Sessão inválida! Retorne a página de cadastro'); 
            window.location.href = '../pages/cadastro.html';
          </script>";
}
