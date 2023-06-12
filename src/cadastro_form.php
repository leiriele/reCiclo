<?php
session_start();
include_once('conexao.php');

function validaCPF($cpf) {
    //Remove caracteres especiais
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    //Verifica se o CPF possui 11 dígitos
    if (strlen($cpf) != 11) {
        return false;
    }

    //Verifica se todos os dígitos são iguais
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    //Calcula o primeiro dígito verificador
    $soma = 0;
    for ($i = 0; $i < 9; $i++) {
        $soma += ($cpf[$i] * (10 - $i));
    }
    $resto = $soma % 11;
    $digito1 = ($resto < 2) ? 0 : 11 - $resto;

    //Calcula o segundo dígito verificador
    $soma = 0;
    for ($i = 0; $i < 10; $i++) {
        $soma += ($cpf[$i] * (11 - $i));
    }
    $resto = $soma % 11;
    $digito2 = ($resto < 2) ? 0 : 11 - $resto;

    //Verifica se os dígitos verificadores são válidos
    if ($cpf[9] != $digito1 || $cpf[10] != $digito2) {
        return false;
    }

    return true;
}

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

    if (!validaCPF($cpf)) {
        echo "<script>alert('CPF inválido. Por favor, insira um CPF válido.');</script>";
        echo "<script>window.location.href = 'cadastro_usuario.php';</script>";
        exit();
    }

    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('O email já está cadastrado. Por favor, insira outro email.');</script>";
        echo "<script>window.location.href = 'cadastro_usuario.php';</script>";
        exit();
    }
    
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
        echo "<script>window.location.href = 'cadastro_usuario.php';</script>";
        exit();
    }
}
?>