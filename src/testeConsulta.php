<?php
session_start();
require 'conexao.php';

if (isset($_SESSION['idusuarios'])) {
    $id_usuario = $_SESSION['idusuarios'];

    $stmt = $conexao->prepare("SELECT p.*, u.* FROM pedidos p JOIN usuarios u ON p.idusuarios = u.idusuarios WHERE p.idusuarios = ?");
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
           
            $id_pedido = $row['id_pedido'];
            $nome = $row['nome'];
            $endereco = $row['endereco'];
            $produto = $row['produto'];
            $quantidade = $row['quantidade'];
            $descricao = $row['descricao'];
            $telefone = $row['telefone'];
            $midia = $row['midia'];
        }
    } else {
        echo "Nenhum pedido de coleta encontrado para este usuário.";
    }

    $stmt->close();
    $conexao->close();
} else {
    echo "Usuário não encontrado.";
    exit;
}
?>