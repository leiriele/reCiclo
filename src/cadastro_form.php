<?php
session_start();
include_once('conexao.php');

if (isset($_POST['submit1'])) {
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $senha = filter_input(INPUT_POST, "senha");
    $cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_STRING);
    $dataNasc = filter_input(INPUT_POST, "dataNasc");
    $cidade = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST, "estado", FILTER_SANITIZE_STRING);
    $logradouro = filter_input(INPUT_POST, "logradouro", FILTER_SANITIZE_STRING);
    $numeroN = filter_input(INPUT_POST, "numeroN", FILTER_SANITIZE_NUMBER_INT);
    $bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_NUMBER_INT);

    // Verificar se o email já está cadastrado
    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
       
        echo "<script>alert('O email já está cadastrado. Por favor, insira outro email.');</script>";
        echo "<script>window.location.href = 'cadastro_pt1.html';</script>";
        exit();
    }

    // Inserir o novo registro
    $stmt = $conexao->prepare("INSERT INTO usuarios (name, email, senha, cpf, dataNasc, cidade, estado, logradouro, numeroN, bairro, cep) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssi", $name, $email, $senha, $cpf, $dataNasc, $cidade, $estado, $logradouro, $numeroN, $bairro, $cep);
    $result = $stmt->execute();

    if ($result) {
      
        echo "<script>alert('Usuário cadastrado com sucesso.');</script>";
        header("Location: login.php");
        exit();
    } else {
        
        error_log("Erro ao cadastrar usuário: " . $stmt->error);
        echo "<script>alert('Ocorreu um erro ao cadastrar o usuário.');</script>";
        echo "<script>window.location.href = 'cadastro_pt1.html';</script>";
        exit();
    }
}
?>
