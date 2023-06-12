<?php
require 'conexao.php';
session_start(); 

$idusuarios = $_SESSION['idusuarios'];

if (isset($_POST['submit'])) {
	$id_pedido = $_POST["id_pedido"];
    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $produto = $_POST["produto"];
    $quantidade = $_POST["quantidade"];
    $descricao = $_POST["descricao"];
    $telefone = $_POST["telefone"];
    $midia = $_POST["midia"];

	$stmt = $conexao->prepare("INSERT INTO pedidos (id_pedido, idusuarios, nome, endereco, produto, quantidade, descricao, telefone, midia) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("iisssisss", $id_pedido, $idusuarios, $nome, $endereco, $produto, $quantidade, $descricao, $telefone, $midia);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<script>alert('Pedido de coleta enviado com sucesso!');</script>";

        header('Location: perfil_cliente.php');
        exit;
    } else {
        echo "<script>alert('Ocorreu um erro ao enviar o pedido de coleta. Por favor, tente novamente mais tarde.');</script>";
    }
    $stmt->close();
    $conexao->close();
}
?>
