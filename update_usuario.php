<?php
    // isset -> serve para saber se uma variável está definida
include_once('conexao.php');
if(isset($_POST['update'])) 
{
    $id_usuario = $_POST['id_usuario'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $cnpj = $_POST['cnpj'];
    $dataNasc = $_POST['data_nascimento'];
    $senha = $_POST['senha'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $logradouro = $_POST['logradouro'];
    //$numeroR = $_POST['numeroR'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    
    $sqlInsert = "UPDATE usuarios 
    SET name='$name',email='$email',cpf='$cpf',cnpj='$cnpj',dataNasc='$dataNasc',senha='$senha',cidade='$cidade',estado='$estado',logradouro='$logradouro',bairro='$bairro',cep='$cep'
    WHERE idusuarios=$idusuarios";
    
    $result = $conexao->query($sqlInsert);
    print_r($result);
}
header('Location: sistema.php');

?>