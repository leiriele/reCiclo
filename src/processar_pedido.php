<?php
session_start();

include_once('conexao.php');

if (isset($_SESSION['idusuarios'])) {
  $idusuarios = $_SESSION['idusuarios'];

 // Consultar numero de telefone 
  $stmt = $conexao->prepare("SELECT telefone FROM pedidos WHERE idusuarios = ?");
  $stmt->bind_param("i", $idusuarios);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $pedido = $result->fetch_assoc();
    $telefone = $pedido['telefone'];

    echo $telefone;
  } else {
    echo "Número de telefone não encontrado para o usuário.";
  }

  $stmt->close();
  $conexao->close();
} else {
  echo "Usuário não autenticado.";
}
?>
