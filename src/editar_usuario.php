<!-- Atualiza usuario no banco -->
<?php
session_start();
include_once('conexao.php');

if (isset($_POST['submit'])) {
    $idusuarios = $_POST['idusuarios'];
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_STRING);
    $dataNasc = filter_input(INPUT_POST, "dataNasc");
    $cidade = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_STRING);
    $estado = filter_input(INPUT_POST, "estado", FILTER_SANITIZE_STRING);
    $logradouro = filter_input(INPUT_POST, "logradouro", FILTER_SANITIZE_STRING);
    $numeroN = filter_input(INPUT_POST, "numeroN", FILTER_SANITIZE_NUMBER_INT);
    $bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, "cep", FILTER_SANITIZE_NUMBER_INT);

$stmt = $conexao->prepare("UPDATE usuarios SET name = ?, email = ?, cpf = ?, dataNasc = ?, cidade = ?, estado = ?, logradouro = ?, numeroN = ?, bairro = ?, cep = ? WHERE idusuarios = ?");
$stmt->bind_param("sssssssisss", $name, $email, $cpf, $dataNasc, $cidade, $estado, $logradouro, $numeroN, $bairro, $cep, $idusuarios);
$stmt->execute();


if ($stmt->affected_rows > 0) {
    echo "<script>alert('Usuário atualizado com sucesso.');</script>";
    echo "<script>window.history.go(-1);</script>";
    exit;
} else {
    echo "<script>alert('Não foi possível atualizar o usuário.');</script>";
    echo "<script>window.location.href = 'editar_perfil.php';</script>";
    exit; 
}


}

$id = $_GET['idusuarios'];

$stmt = $conexao->prepare("SELECT * FROM usuarios WHERE idusuarios = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$linha = mysqli_fetch_array($resultado);
?>
