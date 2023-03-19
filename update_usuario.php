<?php
    // isset -> serve para saber se uma variável está definida
include_once('conexao.php');
if(isset($_POST['update']))
{
    $id_usuario = $_POST['id_usuario'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $cnpj = $_POST['cnpj'];
    $dataNasc = $_POST['data_nascimento'];
    $senha = $_POST['senha'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $logradouro = $_POST['logradouro'];
    $numeroR = $_POST['numeroR'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    
    $sqlInsert = "UPDATE usuarios 
    SET nome='$nome',email='$email',cpf='$cpf',cnpj='$cnpj',dataNasc='$dataNasc',senha='$senha',cidade='$cidade',estado='$estado',logradouro='$logradouro',numeroR='$numeroR',bairro='$bairro',cep='$cep'
    WHERE id_usuarios=$id_usuarios";
    $result = $conexao->query($sqlInsert);
    print_r($result);
}
header('Location: sistema.php');

?>