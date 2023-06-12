<!-- Exclui pedido no banco -->
<?php
if (!empty($_GET['id'])) {
    include_once('conexao.php');
    $id_pedido = $_GET['id'];

    $stmt = $conexao->prepare("SELECT * FROM pedidos WHERE id_pedido = ?");
    $stmt->bind_param("i", $id_pedido);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $stmt->close();

        $stmt = $conexao->prepare("DELETE FROM pedidos WHERE id_pedido = ?");
        $stmt->bind_param("i", $id_pedido);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "success";
            exit;
        }
    }
}
echo "error";
?>
